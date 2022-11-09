<?php 

    class Update_table extends Dbh{
        public function update($table, $column, $condition, $value, $condition_value){
            $update = $this->connectdb()->prepare("UPDATE $table SET $column = :$column WHERE $condition = :$condition");
            $update->bindValue("$column", $value);
            $update->bindValue("$condition", $condition_value);
            $update->execute();
            if($update){
                echo "<div class='info'><p>Updated successfully! <i class='fas fa-check'></i></p></div>";
            }else{
                echo "<div class='info'><p class='exist'>Update failed! <i class='fas fa-ban'></i></p></div>";
            }
        }
    }

    //controller for update
    /* class update_controller extends Update_table{
        private $table;
        private $column;
        private $condition;
        private $condition_value;
        private $value;

        public function __construct($table, $column, $condition, $condition_value, $value){
            $this->table = $table;
            $this->column = $column;
            $this->condition = $condition;
            $this->condition_value = $condition_value;
            $this->value = $value;
        }

        public function update_table(){
            $this->update($this->table, $this->column, $this->condition, $this->value, $this->condition_value);
            
        }
    } */