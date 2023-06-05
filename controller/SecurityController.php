<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CategoryManager;
    use Model\Managers\CommentManager;
    use Model\Managers\EventManager;
    use Model\Managers\ParticipateManager;
    use Model\Managers\UserManager;
    
    
    class SecurityController extends AbstractController implements ControllerInterface{

        public function index(){           
           
            return [
                "view" => VIEW_DIR."home.php"
            ];
        }
        
        public function addUser() {
           
            $userManager = new UserManager();

            if (isset($_POST['submit'])) {
                
                $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS);
                $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $confirmUserPW = filter_input(INPUT_POST, "confirmUserPW", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if ($password != $confirmUserPW) {
                    
                    echo "Vos mots de passes sont différents.";

                } else {
            
                    $data = [
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'email' => $email,
                        'pseudo' => $pseudo,
                        'password' => password_hash($password, PASSWORD_DEFAULT)
                    ];

                    if (!$userManager->findOneByEmail($email) && !$userManager->findUserByPseudo($pseudo)) {

                        $userManager->add($data);

                        return [
                            "view" => VIEW_DIR."/home.php"
                        ];                        
                    } else {

                        echo "Veuillez choisir un autre email et pseudo";
                    }
                }                
            }

            return [
                "view" => VIEW_DIR."security/register.php"
            ];
        }

        
        public function updateStatus($id)
        {
            $userManager = new UserManager;

            $userManager->findOneById($id);

            if (isset($_POST['submit'])) {
                $status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $userManager->updateStatus($id, $status);

                $this->redirectTo('security', 'listUsers');
            }
            
            return [
                "view" => VIEW_DIR."security/updateStatus.php",
                "data" => [
                    "user" => $userManager->findOneById($id),
                ]
            ];
        }


        public function connexion() {

            $eventManager = new EventManager;
            $userManager = new UserManager;

            if (isset($_POST['submit'])) {
                
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, "userPassW", FILTER_VALIDATE_REGEXP, array(
                    "options" => array("regexp" => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d\s])[^\s]{12,}$/')
                ));

                if ($userManager->findOneByEmail($email) && password_verify($password, $userManager->findOneByEmail($email)->getPassword())) {
                    Session::setUser($userManager->findOneByEmail($email));
                    return [
                        "view" => VIEW_DIR."/event/listEvents.php",
                        "data" => [
                            "events" => $eventManager->findAll(["dateStart", "DESC"]),
                            "featuredEvent" => $eventManager->findFeaturedEvent(),
                            "findNextEvent" => $eventManager->findNextEvent(),
                            "findPassedEvent" => $eventManager->findPassedEvent(),
                        ]
                    ];
                } else {

                }
            }
            return [

                "view" => VIEW_DIR."security/login.php"
            ];
        }

        public function deconnexion() {

            Session::removeUser();

            return [

                "view" => VIEW_DIR."/home.php"
            ];
        }

        public function listUsers() {
            $userManager = new UserManager;

            $userManager->findAll();

            return [
                "view" => VIEW_DIR."security/listUsers.php",
                "data" => [
                    "users" => $userManager->findAll()
                ]
            ];
        }

        public function removeUser($id) {
            $userManager = new UserManager;

            $userManager->removeById($id);

            return [
                "view" => VIEW_DIR."security/listUsers.php",
                "data" => [
                    "users" => $userManager->findAll()
                ]
            ];
        }

        public function removeUserById($pseudo)
        {
            $userManager = new UserManager;

            $userManager->removeUserById($pseudo);

            return [
                "view" => VIEW_DIR."security/listUsers.php",
                "data" => [
                    "users" => $userManager->findAll()
                ]
            ];
        }

        public function profileUser($id) {

            $userManager = new UserManager;
            $eventManager = new EventManager;
            $commentManager = new CommentManager;

            $userManager->findOneById($id);

            return [
                "view" => VIEW_DIR."security/profileUser.php",
                "data" => [
                    "user" => $userManager->findOneById($id),
                    "findEventByIdUser" => $eventManager->findEventByIdUser($id),
                    "comments" => $commentManager->findCommentByIdUser($id)
                ]
            ];
        }

        public function addEvent($id) {

            $userManager = new UserManager;
            $eventManager = new EventManager;

            $userManager->findOneById($id);

            return [
                "view" => VIEW_DIR."security/addEvent.php",
                "data" => [
                    "user" => $userManager->findOneById($id)
                ]
            ];
        }

        public function findAllUsers() {

            $userManager = new UserManager;

            return [
                "view" => VIEW_DIR."security/listUsers.php",
                "data" => [
                    "user" => $userManager->findAll()
                ]
            ];
        }

        public function removeCommentById($id)
        {
            $commentManger = new CommentManager();
            $id_event = $commentManger->findOneById($id)->getEvent()->getId();
            $commentManger->delete($id);
            // redirectTo construct the link (index.php?ctrl=event&action=detailEvent&id=id_event)
            $this->redirectTo('event', 'detailEvent', $id_event);
        }
    }
?>