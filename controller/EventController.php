<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
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
            $eventManager = new EventManager(); // The object $eventManager contain an instanciation of EventManager.
           
            $detailEvent = $eventManager->detailEvent($id);

            return [
                "view" => VIEW_DIR."event/detailEvent.php",
                "data" => [
                    "user" => $userManager->findOneById($id),
                    "findEventByIdUser" => $eventManager->findEventByIdUser($id),
                    "findOneById" => $eventManager->findOneById($id),
                ]
            ];
        }

        public function addEvent()
        {
            $eventManager = new EventManager;

            if (isset($_POST['submit'])) {

                $titleEvent = filter_input(INPUT_POST, "titleEvent", FILTER_SANITIZE_SPECIAL_CHARS);
                $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
                $zipcode = "zipcode";
                $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
                $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
                $country = filter_input(INPUT_POST, "country", FILTER_SANITIZE_SPECIAL_CHARS);
                $dateStart = filter_input(INPUT_POST, "dateStart", FILTER_SANITIZE_SPECIAL_CHARS);
                $dateEnd = filter_input(INPUT_POST, "dateEnd", FILTER_SANITIZE_SPECIAL_CHARS);
                $maxUsers = "maxUsers";
                $constribution = "constribution";
                $imgEvent = filter_input(INPUT_POST, "imgEvent", FILTER_SANITIZE_SPECIAL_CHARS);
                $alt = filter_input(INPUT_POST, "alt", FILTER_SANITIZE_SPECIAL_CHARS);
                $user_id = "user_id";
                $category_id = filter_input(INPUT_POST, "category_id", FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return [
                "view" => VIEW_DIR."security/addEvent"
            ];
        }

        public function removeUser() {

            $userManager = new UserManager();

            if (isset($_POST['submit'])) {
                
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $data = [
                    'email' => $email
                ];

                $pseudo = $userManager->removeByEmail($data);
                
            }
            
            return [
                "view" => VIEW_DIR."event/listUsers.php",
                "data" => [
                    "user" => $userManager->findAll(["pseudo", "ASC"])
                ]
            ];
        }

    }
