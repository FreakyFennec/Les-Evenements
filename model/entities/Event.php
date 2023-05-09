<?php
    namespace Model\Entities;

    use App\Entity;

    final class Event extends Entity {

        private $id;
        private $titleEvent;
        private $description;
        private $address;
        private $zipcode;
        private $city;
        private $country;
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
         * Get the value of address
         */ 
        public function getAddress()
        {
            return $this->address;
        }

        /**
         * Set the value of address
         *
         * @return  self
         */ 
        public function setAddress($address)
        {
            $this->address = $address;

            return $this;
        }

        /**
         * Get the value of zipcode
         */ 
        public function getZipcode()
        {
            return $this->zipcode;
        }

        /**
         * Set the value of zipcode
         *
         * @return  self
         */ 
        public function setZipcode($zipcode)
        {
            $this->zipcode = $zipcode;

            return $this;
        }

        /**
         * Get the value of city
         */ 
        public function getCity()
        {
            return $this->city;
        }

        /**
         * Set the value of city
         *
         * @return  self
         */ 
        public function setCity($city)
        {
            $this->city = $city;

            return $this;
        }       

        /**
         * Get the value of dateStart
         */ 
        public function getDateStart()
        {
            // Transform the string in an object.
            $date = new \DateTime($this->dateStart); 
            
            // Creat object IntlDateFormatter for formate the date in french.
            $dateFormatter = new \IntlDateFormatter(
                'fr_FR',
                \IntlDateFormatter::LONG,       // Const who specifie the objcet format.
                \IntlDateFormatter::NONE        // Const who specifie the objcet format.
            );

            // Set the time zone to use.
            $dateFormatter->setTimeZone('Europe/Paris');

            // Format the date with IntlDateFormatter.
            // 
            $dateFr = $dateFormatter->format($date);
            
            // Set the french format
            $dateFr = date_format($date, 'd M Y');

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
            $dateFr = date_format($date, 'd M Y');
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

        /**
         * Get the value of country
         */ 
        public function getCountry()
        {
                return $this->country;
        }

        /**
         * Set the value of country
         *
         * @return  self
         */ 
        public function setCountry($country)
        {
                $this->country = $country;

                return $this;
        }
    }