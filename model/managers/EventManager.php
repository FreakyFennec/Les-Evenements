<?php
    namespace Model\Managers;

    use App\Manager;
    use App\DAO;

    class EventManager extends Manager {

        protected $className = "Model\Entities\Event";
        protected $tableName = "event";

        public function __construct()
        {
            parent::connect();
        }


        public function findFeaturedEvent() {

            $sql = "SELECT *
                    FROM ".$this->tableName." e
                    ORDER BY e.dateStart DESC
                    LIMIT 1";
            
            return $this->getOneOrNullResult(
                DAO::select($sql, [], false),
                $this->className
            );
        }

        public function findNextEvent() {
            $sql = "SELECT *
                    FROM ".$this->tableName." e
                    WHERE e.dateStart >= CURRENT_DATE
                    LIMIT 6";

            return $this->getMultipleResults(
                DAO::select($sql, [], true),
                $this->className
            );
        }

        public function findPassedEvent() {
            $sql = "SELECT *
                    FROM ".$this->tableName." e
                    WHERE e.dateStart < CURRENT_DATE
                    LIMIT 6";

            return $this->getMultipleResults(
                DAO::select($sql, [], true),
                $this->className
            );
        }

        public function findEventByIdUser($id) {
            $eventManager = new EventManager();

            $sql = "SELECT *
                    FROM ". $this->tableName ." e
                    WHERE e.user_id = :id";
        
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }

        public function findCommentByIdUser($id) {
            $commentManager = new CommentManager();

            $sql = "SELECT *
                    FROM ". $this->tableName ." c
                    WHERE c.user_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }
    }