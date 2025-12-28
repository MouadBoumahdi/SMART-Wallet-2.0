<?php
    class Income{
        private PDO $db;
        private int $user_id;
        private float $montant;
        private string $income_date;
        private string $type;



        public function __construct(PDO $db){
            $this->db = $db;
        }

        public function setUserId(int $user_id): void {
        $this->user_id = $user_id;
        }

        public function setMontant(float $montant): void {
            $this->montant = $montant;
        }

        public function setIncomeDate(string $date): void {
            $this->income_date = $date;
        }

        public function setDescription(string $description): void {
            $this->description = trim($description) ;
        }


        public function getbyid(int $id):array{
            $stmt = $this->db->prepare("SELECT * FROM incomes where id = :id");
            $stmt->execute([':id'=>$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function create():bool{
            $stmt = $this->db->prepare("
                INSERT INTO incomes(user_id, montant, income_date, description)
                VALUES(:user_id, :montant, :income_date, :description)
            ");      
            
            return $stmt->execute([
                ':user_id' => $this->user_id,
                ':montant' => $this->montant,
                ':income_date' => $this->income_date,
                ':description' => $this->description
            ]);
        }



        public function getAll(int $user_id): array {
            $stmt = $this->db->prepare("
                SELECT * FROM incomes 
                WHERE user_id = :user_id 
                ORDER BY income_date DESC
            ");
            $stmt->execute([':user_id' => $user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        public function update(int $id): bool {
            $stmt = $this->db->prepare("
                UPDATE incomes 
                SET montant=:montant, income_date=:income_date, description=:description
                WHERE id=:id
            ");
            return $stmt->execute([
                ':montant' => $this->montant,
                ':income_date' => $this->income_date,
                ':description' => $this->description,
                ':id' => $id
            ]);
        }



        public function delete(int $id): bool {
            $stmt = $this->db->prepare("DELETE FROM incomes WHERE id = :id");
            return $stmt->execute([':id' => $id]);
        }


        public function getCategoryByType():array{
            $stmt = $this->db->prepare("SELECT * FROM categories where type= 'income'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>