<?php
    class Category{
        private PDO $db;
        private string $name;
        private string $type;


        public function __construct(PDO $db){
            $this->db = $db;
        }


        public function setName(string $name){
            $this->name = $name;
        }

        public function setType(string $type){
            $this->type = $type;
        }



        public function create():bool{
            $stmt = $this->db->prepare("INSERT INTO categories(name,type) VALUES(:name,:type)");
            return $stmt->execute([':name'=>$this->name,':type'=>$this->type])? true : false;
        }


        public function getAll():array{
            $stmt = $this->db->prepare("SELECT * FROM categories order by name");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getByType(string $type):array{
            $stmt= $this->db->prepare("SELECT * FROM categories WHERE type = :type order by name");
            $stmt->execute([':type'=>$type]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>