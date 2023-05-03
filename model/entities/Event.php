<?php
    namespace Model\Entities;

    use App\Entity;

    final class Event extends Entity {

        private $id;
        private $titleEvent;
        private $description;
        private $place;
        private $dateStart;
        private $dateEnd;
        private $maxUsers;
        private $contribution;
        private $imgEvent;
        private $alt;
        private $user;
        private $category;

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
         * Get the value of titleEvent
         */ 
        public function getTitleEvent()
        {
            return $this->titleEvent;
        }

        /**
         * Set the value of titleEvent
         *
         * @return  self
         */ 
        public function setTitleEvent($titleEvent)
        {
            $this->titleEvent = $titleEvent;

            return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
            $this->description = $description;

            return $this;
        }

        /**
         * Get the value of place
         */ 
        public function getPlace()
        {
            return $this->place;
        }

        /**
         * Set the value of place
         *
         * @return  self
         */ 
        public function setPlace($place)
        {
            $this->place = $place;

            return $this;
        }

        /**
         * Get the value of dateStart
         */ 
        public function getDateStart()
        {
            $date = new \DateTime($this->dateStart);          // transforme la string en un objet
            $dateFr = date_format($date, 'd-m-Y H:i:s');
            return $dateFr;
        }

        /**
         * Set the value of dateStart
         *
         * @return  self
         */ 
        public function setDateStart($dateStart)
        {
            $this->dateStart = $dateStart;

            return $this;
        }

        /**
         * Get the value of dateEnd
         */ 
        public function getDateEnd()
        {
            $date = new \DateTime($this->dateEnd);
            $dateFr = date_format($date, 'd-m-Y H:i:s');
            return $dateFr;
        }

        /**
         * Set the value of dateEnd
         *
         * @return  self
         */ 
        public function setDateEnd($dateEnd)
        {
            $this->dateEnd = $dateEnd;

            return $this;
        }

        /**
         * Get the value of maxUsers
         */ 
        public function getMaxUsers()
        {
            return $this->maxUsers;
        }

        /**
         * Set the value of maxUsers
         *
         * @return  self
         */ 
        public function setMaxUsers($maxUsers)
        {
            $this->maxUsers = $maxUsers;

            return $this;
        }

        /**
         * Get the value of contribution
         */ 
        public function getContribution()
        {
            return $this->contribution;
        }

        /**
         * Set the value of contribution
         *
         * @return  self
         */ 
        public function setContribution($contribution)
        {
            $this->contribution = $contribution;

            return $this;
        }

        /**
         * Get the value of imgEvent
         */ 
        public function getImgEvent()
        {
            return $this->imgEvent;
        }

        /**
         * Set the value of imgEvent
         *
         * @return  self
         */ 
        public function setImgEvent($imgEvent)
        {
            $this->imgEvent = $imgEvent;

            return $this;
        }


        /**
         * Get the value of alt
         */ 
        public function getAlt()
        {
                return $this->alt;
        }

        /**
         * Set the value of alt
         *
         * @return  self
         */ 
        public function setAlt($alt)
        {
                $this->alt = $alt;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
            return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
            $this->user = $user;

            return $this;
        }

        /**
         * Get the value of category
         */ 
        public function getCategory()
        {
            return $this->category;
        }

        /**
         * Set the value of category
         *
         * @return  self
         */ 
        public function setCategory($category)
        {
            $this->category = $category;

            return $this;
        }
    }