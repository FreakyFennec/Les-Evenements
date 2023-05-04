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
                    "findPassedEvent" => $eventManager->findPassedEvent()
                ]
            ];        
        }

        public function detailEvent($id)
        {
            $userManager = new UserManager();
            $eventManager = new EventManager(); // The object $eventManager contain an instanciation of EventManager.
            echo '<pre>';
            //var_dump($id);
            var_dump($eventManager->detailEvent($id));
            echo '</pre>';
            $detailEvent = $eventManager->detailEvent($id);

            return [
                "view" => VIEW_DIR."event/detailEvent.php",
                "data" => [
                    "user" => $userManager->findOneById($id),
                    "findEventByIdUser" => $eventManager->findEventByIdUser($id),
                    "detailEvent" => $eventManager->detailEvent($id),
                ]
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
