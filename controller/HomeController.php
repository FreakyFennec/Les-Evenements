<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\EventManager;
    use Model\Managers\UserManager;
    
    class HomeController extends AbstractController implements ControllerInterface{

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
                      
        public function users(){
            $this->restrictTo("admin");

            $manager = new UserManager();
            $users = $manager->findAll(['registerdate', 'DESC']);

            return [
                "view" => VIEW_DIR."security/listUsers.php",
                "data" => [
                    "users" => $users
                ]
            ];
        }

        public function admin() {
            $this->restrictTo("admin");

            $manager = new UserManager();

            return [
                "view" => VIEW_DIR."security/admin.php"
            ];
        }

        public function rules(){
            
            return [
                "view" => VIEW_DIR."rules.php"
            ];
        }

        public function legalNotices()
        {
            return [
                "view" => VIEW_DIR."legalNotices.php",
            ];
        }

        /*public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            include(VIEW_DIR."ajax.php");
        }*/
    }
