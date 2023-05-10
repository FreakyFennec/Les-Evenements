<?php

    namespace Model\Managers;

    use App\Manager;
    use App\DAO;
    use EventManager;
    use CommentManager;
    use ParticipateManager;

    class UserManager extends Manager {

        protected $className = "Model\Entities\User";
        protected $tableName = "user";

        public function __construct()
        {
            parent::connect();
        }

        public function findOneByEmail($email)
        {
            $sql = "SELECT *
                    fROM ". $this->tableName ." a
                    WHERE a.email = :email";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['email' => $email], false),
                $this->className
            );
        }

        public function findUserByPseudo($pseudo) {

            $userManager = new UserManager;

            $sql = "SELECT 'pseudo'
                    FROM " . $this->tableName . " u
                    WHERE u.pseudo = :pseudo";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['pseudo' => $pseudo]),
                $this->className
            );
        }

        public function findOneByPassword($password) {

            $userManager = new UserManager;

            $sql = "SELECT 'password'
                    FROM " . $this->tableName . " u
                    WHERE u.password = :password";
            
            return $this->getOneOrNullResult(
                DAO::select($sql, ['password' => $password]),
                $this->className
            );
        }

        public function findAllUsers() {

            $userManager = new UserManager;

            $sql = "SELECT id_user, email, pseudo
                    FROM " . $this->tableName . " u
            ";

            return $this->getMultipleResults(
                DAO::select($sql, [], true),
                $this->className
            );
        }

        public function removeById($id) {

            $userManager = new UserManager;

            $sql = "DELETE FROM ".$this->tableName." WHERE id_user = :id";
            DAO::delete($sql, ['id' => $id]);
          
        }
        

        public function removeByEmail($email) {
            $userManager = new UserManager;

            $sql = "DELETE FROM ". $this->tableName ." WHERE email_user = :email";
            DAO::delete($sql, ['email' => $email]);
        }

        public function removeByPseudo(string $pseudo)
        {
            // $userManager = new UserManager;
            // $eventManager = new EventManager;
            // $participateManager = new ParticipateManager;
            // $commentManger = new CommentManager;

            // Retrive id.
            $sql1 = "SELECT id_user 
                    FROM user  
                    WHERE pseudo = :pseudo";
            $id_user = DAO::select($sql1, ['pseudo' => $pseudo]);

            // Delete participate.
            $sql2 ="DELETE p 
                    FROM participate p 
                    INNER JOIN event e ON p.event_id = e.id_event 
                    WHERE e.user_id = :id_user";
            DAO::delete($sql2, ['id_user' => $id_user]);

            // Delete comment by id.
            $sql3 = "DELETE c
                    FROM comment c
                    INNER JOIN event e
                    ON c.event_id = e.id_event
                    WHERE e.user_id = :id_user";
            DAO::delete($sql3, ['id_user' => $id_user]);

            // Delete eventByUser.
            $sql4 = "DELETE 
                    FROM event WHERE user_id = :id";
            DAO::delete($sql4, ['id' => $id_user]);

            // Update table comment
            $sql5 = "UPDATE comment 
                    SET user_id = NULL
                    WHERE user_id = :id";

            // Delete user by pseudo.
            $sql6 = "DELETE 
                    FROM " . $this->tableName . " WHERE pseudo = :pseudo";
            DAO::delete($sql6, ['pseudo' => $pseudo]);
        }
    }