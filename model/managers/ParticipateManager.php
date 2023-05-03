<?php
    namespace Model\Managers;

    use App\Manager;
    use App\DAO;

    class ParticipateManager extends Manager {

        protected $className = "Model\Entities\Participate";
        protected $tableName = "participate";

        public function __construct()
        {
            parent::connect();
        }
        
    }