<?php
    namespace Model\Managers;

    use App\Manager;
    use App\DAO;

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
    }