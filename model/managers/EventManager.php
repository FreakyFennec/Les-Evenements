<?php
    namespace Model\Managers;

    use App\Manager;
    use App\DAO;

    class EventManager extends Manager {

        protected $className = "Model\Entities\Event";
        protected $tableName = "event";

        // Constructor who call the methode connect().
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
                    LIMIT 8";

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

        public function detailEvent($id) {
            $eventManager = new EventManager();

            $sql = "SELECT *
                    FROM ".$this->tableName." e
                    WHERE e.id_event = :id";
            
            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }

        public function update($id, $data)
        {
            /* echo '<pre>';
            var_dump($id);
            echo '</pre>'; */
            
            $sql = "UPDATE event
                    SET titleEvent = :titleEvent,
                        description = :description,
                        zipcode = :zipcode,
                        address = :address,
                        city = :city,
                        country = :country,
                        dateStart = :dateStart,
                        dateEnd = :dateEnd,
                        maxUsers = :maxUsers,
                        contribution = :contribution,
                        imgEvent = :imgEvent,
                        alt = :alt,
                        user_id = :user_id,
                        category_id = :category_id
                    WHERE id_event = :id_event";

            //var_dump($data); die;

            DAO::update($sql, [
                'id_event' => $id,
                'titleEvent' => $data['titleEvent'],
                'description' => $data['description'],
                'zipcode' => $data['zipcode'],
                'address' => $data['address'],
                'city' => $data['city'],
                'country' => $data['country'],
                'dateStart' => $data['dateStart'],
                'dateEnd' => $data['dateEnd'],
                'maxUsers' => $data['maxUsers'],
                'contribution' => $data['contribution'],
                'imgEvent' => $data['imgEvent'],
                'alt' => $data['alt'],
                'user_id' => $data['user_id'],
                'category_id' => $data['category_id']
            ]);
        }

        public function insertParticipation($data) {
            $sql = "
                INSERT INTO participate (user_id, event_id)
                VALUES (:user_id, :event_id)";
            
            DAO::insert($sql, [
                'user_id' => $data['user_id'],
                'event_id' => $data['event_id']
            ]);
        }

        public function countParticipants($data) {
            $sql = "
                SELECT COUNT(*) AS nbrParticipants
                FROM participate
                WHERE event_id = :event_id";

            
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