<?php
    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CommentManager;
    use Model\Managers\EventManager;
    use Model\Managers\UserManager;
    
    class EventController extends AbstractController implements ControllerInterface{

        public function index(){         

            $eventManager = new EventManager();

            return [
                "view" => VIEW_DIR."event/listEvents.php",
                "data" => [
                    "events" => $eventManager->findAll(["dateStart", "DESC"]),
                    "featuredEvent" => $eventManager->findFeaturedEvent(),
                    "findNextEvent" => $eventManager->findNextEvent(),
                    "findPassedEvent" => $eventManager->findPassedEvent(),
                ]
            ];
        }

        public function detailEvent($id)
        {
            $userManager = new UserManager();
            $eventManager = new EventManager(); // The object $eventManager contain an Instanciation of EventManager.
            $commentManager = new CommentManager();
           
            $detailEvent = $eventManager->detailEvent($id);

            return [
                "view" => VIEW_DIR."event/detailEvent.php",
                "data" => [
                    "user" => $userManager->findOneById($id),
                    "findEventByIdUser" => $eventManager->findEventByIdUser($id),
                    "findOneById" => $eventManager->findOneById($id),
                    "findCommentById" => $commentManager->findCommentById($id),
                ]
            ];
        }
        

        public function addEvent()
        {

            // Instantiation of EventManager putting in variable eventManager.
            $eventManager = new EventManager;
            // Variable containing id of user. It comes from the class SESSION
            $user = Session::getUser();

            // 

            // Verify is there is a submit.
            if (isset($_POST['submit'])) {

                // Name of the columns placed in the super global $_POST that is stored in the variable.
                $titleEvent = filter_input(INPUT_POST, "titleEvent", FILTER_SANITIZE_SPECIAL_CHARS);
                $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
                $zipcode = filter_input(INPUT_POST, "zipcode", FILTER_SANITIZE_NUMBER_INT);
                $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
                $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
                $country = filter_input(INPUT_POST, "country", FILTER_SANITIZE_SPECIAL_CHARS);
                $dateStart = filter_input(INPUT_POST, "dateStart", FILTER_SANITIZE_SPECIAL_CHARS);
                $dateEnd = filter_input(INPUT_POST, "dateEnd", FILTER_SANITIZE_SPECIAL_CHARS);
                $maxUsers = filter_input(INPUT_POST, "maxUsers", FILTER_SANITIZE_NUMBER_INT);
                $contribution = filter_input(INPUT_POST, "contribution", FILTER_SANITIZE_NUMBER_INT);
                $imgEvent = filter_input(INPUT_POST, "imgEvent", FILTER_SANITIZE_SPECIAL_CHARS);
                $alt = filter_input(INPUT_POST, "alt", FILTER_SANITIZE_SPECIAL_CHARS);
                $user_id = filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_NUMBER_INT);
                $category_id = filter_input(INPUT_POST, "category", FILTER_SANITIZE_NUMBER_INT);
    
                // Verify there are filtered datas
                if ($titleEvent &&
                    $description &&
                    $zipcode &&
                    $address &&
                    $city &&
                    $country &&
                    $dateStart &&
                    $dateEnd &&
                    $maxUsers &&
                    $contribution &&
                    $imgEvent &&
                    $alt &&
                    $category_id) {
    
                    // This associative array contain the columns name and de values.
                    $data = [
                        'titleEvent' => $titleEvent,
                        'description' => $description,
                        'zipcode' => $zipcode,
                        'address' => $address,
                        'city' => $city,
                        'country' => $country,
                        'dateStart' => $dateStart,
                        'dateEnd' => $dateEnd,
                        'maxUsers' => $maxUsers,
                        'contribution' => $contribution,
                        'imgEvent' => $imgEvent,
                        'alt' => $alt,
                        'user_id' => $user->getId(),
                        'category_id' => $category_id,
                    ];
                    // Here we tell to eventManager to execute method add with attribut $data.
                    $eventManager->add($data);

                    $this->redirectTo('event', 'addEvent');
                } // fin filter_input
            } // fin submit

            return [
                "view" => VIEW_DIR."security/addEvent.php"
            ];
        }

        public function addComment($id)
        {
            // Instantiation of EventManager putting in variable eventManager.
            $commentManager = new CommentManager();
            // Variable containing id of user. It comes from the class SESSION
            $user = Session::getUser();

            // Verify is there is a submit.
            if (isset($_POST['submit'])) {

                // Name of the columns placed in the super global $_POST that is stored in the variable.
                $titleComment = filter_input(INPUT_POST, 'titleComment', FILTER_SANITIZE_SPECIAL_CHARS);
                $comment = filter_input(INPUT_POST, 'comment',FILTER_SANITIZE_SPECIAL_CHARS);

                // Verify there are filtered datas
                if($titleComment && $comment) {

                    // Associative array containing datas.
                    $data = [
                        'titleComment' => $titleComment,
                        'comment' => $comment,
                        'event_id' => $id,
                        'user_id' => $user->getId(),
                    ];
                }

                // Here we tell to eventManager to execute method add with attribut $data.
                $commentManager->add($data);
                // And redirection to (view, method, id) with empty imput.
                $this->redirectTo('event', 'detailEvent', $id);
            }
        }

        public function updateEvent(int $id)
        {
            $eventManager = new EventManager;

            if (isset($_POST['sumbit'])) {

                // Name of the columns placed in the super global $_POST that is stored in the variable.
                $titleEvent = filter_input(INPUT_POST, "titleEvent", FILTER_SANITIZE_SPECIAL_CHARS);
                $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
                $zipcode = filter_input(INPUT_POST, "zipcode", FILTER_SANITIZE_NUMBER_INT);
                $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
                $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
                $country = filter_input(INPUT_POST, "country", FILTER_SANITIZE_SPECIAL_CHARS);
                $dateStart = filter_input(INPUT_POST, "dateStart", FILTER_SANITIZE_SPECIAL_CHARS);
                $dateEnd = filter_input(INPUT_POST, "dateEnd", FILTER_SANITIZE_SPECIAL_CHARS);
                $maxUsers = filter_input(INPUT_POST, "maxUsers", FILTER_SANITIZE_NUMBER_INT);
                $contribution = filter_input(INPUT_POST, "contribution", FILTER_SANITIZE_NUMBER_INT);
                $imgEvent = filter_input(INPUT_POST, "imgEvent", FILTER_SANITIZE_SPECIAL_CHARS);
                $alt = filter_input(INPUT_POST, "alt", FILTER_SANITIZE_SPECIAL_CHARS);
                $user_id = filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_NUMBER_INT);
                $category_id = filter_input(INPUT_POST, "category", FILTER_SANITIZE_NUMBER_INT);

                // Verify there are filtered datas
                if ($titleEvent &&
                    $description &&
                    $zipcode &&
                    $address &&
                    $city &&
                    $country &&
                    $dateStart &&
                    $dateEnd &&
                    $maxUsers &&
                    $contribution &&
                    $imgEvent &&
                    $alt &&
                    $category_id) {
                        
                    // This associative array contain the columns name and de values.
                    $data = [
                        'titleEvent' => $titleEvent,
                        'description' => $description,
                        'zipcode' => $zipcode,
                        'address' => $address,
                        'city' => $city,
                        'country' => $country,
                        'dateStart' => $dateStart,
                        'dateEnd' => $dateEnd,
                        'maxUsers' => $maxUsers,
                        'contribution' => $contribution,
                        'imgEvent' => $imgEvent,
                        'alt' => $alt,
                        'user_id' => $user->getId(),
                        'category_id' => $category_id,
                    ];
                    $eventManager->update($data);

                    $this->redirectTo('event', 'updateEvent');
                } // fin filter_input
            } // fin submit
            
            return [
                "view" => VIEW_DIR."security/updateEvent.php"
            ];
        }

        public function removeUser() {

            $userManager = new UserManager();

            if (isset($_POST['submit'])) {
                
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($email) {
                    $data = [
                        'email' => $email
                    ];
    
                    // Here we tell to eventManager to execute method add with attribut $data.
                    $pseudo = $userManager->removeByEmail($data);
                    // redirection to (view, method, id) with empty imput.
                    $this->redirectTo('users', 'listUsers', $email);
                }                
            }
        }
    }
