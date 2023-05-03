<?php
    namespace Model\Entities;

    use App\Entity;

    final class Participate extends Entity {
        private $id;
        private $event;

        public function __construct($data)
        {
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
    }