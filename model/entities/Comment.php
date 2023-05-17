<?php
    namespace Model\Entities;

    use App\Entity;
	use IntlDateFormatter;

    final class Comment extends Entity {

        private $id;
        private $titleComment;
        private $comment;
        private $creationDate;
        private $event;
        private $user;

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
         * Get the value of titleComment
         */ 
        public function getTitleComment()
        {
                return $this->titleComment;
        }

        /**
         * Set the value of titleComment
         *
         * @return  self
         */ 
        public function setTitleComment($titleComment)
        {
                $this->titleComment = $titleComment;

                return $this;
        }

        /**
         * Get the value of comment
         */ 
        public function getComment()
        {
                return $this->comment;
        }

        /**
         * Set the value of comment
         *
         * @return  self
         */ 
        public function setComment($comment)
        {
                $this->comment = $comment;

                return $this;
        }

        /**
         * Get the value of creationDate
         */ 
        public function getCreationDate()
        {
			if ($this->creationDate instanceof \DateTime) {
				$date = $this->creationDate;
			} else {
				$date = new \DateTime($this->creationDate);
			}
			

			// Create object  IntlDateFormatter for formate the date in french.
			$dateFormatter = new \IntlDateFormatter(
					'fr_FR',                        // Define the local
					IntlDateFormatter::FULL,        // Const who specifie the objcet format.
					IntlDateFormatter::FULL,        // Const who specifie the objcet format.
					'Europe/Paris',                 // Time zone
					IntlDateFormatter::GREGORIAN,   // Calendar type
					//
					'EEEE d MMMM y'               // Display format
			);

			$dateFr = $dateFormatter->format($date);

			return $dateFr;
        }

        /**
         * Set the value of creationDate
         *
         * @return  self
         */ 
        public function setCreationDate($creationDate)
        {
                $this->creationDate = new \DateTime($creationDate);

                return $this;
        }

        /**
         * Get the value of event
         */ 
        public function getEvent()
        {
                return $this->event;
        }

        /**
         * Set the value of event
         *
         * @return  self
         */ 
        public function setEvent($event)
        {
                $this->event = $event;

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
    }