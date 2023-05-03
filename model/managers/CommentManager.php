<?php
    namespace Model\Managers;

    use App\Manager;
    use App\DAO;

    class CommentManager extends Manager {
        protected $className = "Model\Entities\Comment";
        protected $tableName = "comment";

        public function __construct()
        {
            parent::connect();
        }

        
        public function findCommentByIdUser($id) {
            $CommentManager = new CommentManager();

            $sql = "SELECT *
                    FROM ". $this->tableName ." c
                    WHERE c.user_id = :id";
        
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }

    }