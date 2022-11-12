<?php 

    class Update_table extends Dbh{
        public function update($table, $column, $condition, $value, $condition_value){
            $update = $this->connectdb()->prepare("UPDATE $table SET $column = :$column WHERE $condition = :$condition");
            $update->bindValue("$column", $value);
            $update->bindValue("$condition", $condition_value);
            $update->execute();
            /* if($update){
                echo "<div class='info'><p>Updated successfully! <i class='fas fa-check'></i></p></div>";
            }else{
                echo "<div class='info'><p class='exist'>Update failed! <i class='fas fa-ban'></i></p></div>";
            } */
        }
        public function update_multiple($table, $column1, $value1, $column2, $value2, $column3, $value3, $column4, $value4, $column5, $value5, $condition, $condition_value){
            $update = $this->connectdb()->prepare("UPDATE $table SET $column1 = :$column1, $column2 = :$column2, $column3 = :$column3, $column4 = :$column4, $column5 = :$column5 WHERE $condition = :$condition");
            $update->bindValue("$column1", $value1);
            $update->bindValue("$column2", $value2);
            $update->bindValue("$column3", $value3);
            $update->bindValue("$column4", $value4);
            $update->bindValue("$column5", $value5);
            $update->bindValue("$condition", $condition_value);
            $update->execute();
            /* if($update){
                echo "<div class='info'><p>Updated successfully! <i class='fas fa-check'></i></p></div>";
            }else{
                echo "<div class='info'><p class='exist'>Update failed! <i class='fas fa-ban'></i></p></div>";
            } */
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