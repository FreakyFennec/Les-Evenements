<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity {
        private $id;
        private $firstName;
        private $lastName;
        private $email;
        private $pseudo;
        private $password;
        private $status;
        private $banish;
        private $registerDate;

        public function __construct($data) {
            $this->hydrate($data);
        }
        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of firstName
         */ 
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * Set the value of firstName
         *
         * @return  self
         */ 
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;

            return $this;
        }

        /**
         * Get the value of lastName
         */ 
        public function getLastName()
        {
            return $this->lastName;
        }

        /**
         * Set the value of lastName
         *
         * @return  self
         */ 
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;

            return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
            $this->email = $email;

            return $this;
        }

        /**
         * Get the value of pseudo
         */ 
        public function getPseudo()
        {
            return $this->pseudo;
        }

        /**
         * Set the value of pseudo
         *
         * @return  self
         */ 
        public function setPseudo($pseudo)
        {
            $this->pseudo = $pseudo;

            return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
            $this->password = $password;

            return $this;
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
            return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
            $this->status = $status;

            return $this;
        }

        public function hasRole($role)
        {
            if($role == $this->status){

                return $this->status;
            }
        }

        /**
         * Get the value of banish
         */ 
        public function getBanish()
        {
            return $this->banish;
        }

        /**
         * Set the value of banish
         *
         * @return  self
         */ 
        public function setBanish($banish)
        {
            $this->banish = $banish;

            return $this;
        }
        
        public function __toString() {
            return $this->pseudo;
        }

        /**
         * Get the value of registerDate
         */ 
        public function getRegisterDate()
        {
            return $this->registerDate;
        }

        /**
         * Set the value of registerDate
         *
         * @return  self
         */ 
        public function setRegisterDate($registerDate)
        {
            $this->registerDate = $registerDate;

            return $this;
        }
    }