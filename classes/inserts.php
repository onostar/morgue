<?php
    session_start();
    class inserts extends Dbh{
        //check user exists method
        protected function checkUser($username){
            $check_user = $this->connectdb()->prepare("SELECT * FROM users WHERE username = :username");
            $check_user->bindValue("username", $username);
            $check_user->execute();

            if($check_user->rowCount() > 0){
                echo "<p class='exist'><span>$username</span> already exists!</p>";
                die();
            }
        }

        //insert user into database
        protected function setUser($fullname, $username, $role, $password){
            $set_user = $this->connectdb()->prepare("INSERT INTO users (full_name, username, user_role, user_password) VALUES (:full_name, :username, :user_role, :user_password)");
            $set_user->bindValue("full_name", $fullname);
            $set_user->bindValue("username", $username);
            $set_user->bindValue("user_role", $role);
            $set_user->bindValue("user_password", $password);
            $set_user->execute();
            if($set_user){
                echo "<p><span>$username</span> created successfully!</p>";
            }
        }

        //insert category

        protected function add_category($category, $price){
            //check if category exists
            $check_cat = $this->connectdb()->prepare("SELECT * FROM categories WHERE category = :category");
            $check_cat->bindValue("category", $category);
            $check_cat->execute();
            if(!$check_cat->rowCount() > 0){
                $add_cat = $this->connectdb()->prepare("INSERT INTO categories (category, price) VALUES (:category, :price)");
                $add_cat->bindValue("category", $category);
                $add_cat->bindValue("price", $price);
                $add_cat->execute();
                if($add_cat){
                    echo "<p><span>$category</span> Created successfully!</p>";
                }else{
                    echo "<p class='exist'><span>$category</span> cretaed failed!</p>";
                }
            }else{
                echo "<p class='exist'><span>$category</span> already exists!</p>";
            }
            
        }

        //add rooms with 2 columns
        protected function add_items($table, $column1, $column2, $value1, $value2){
            //check if item exists
            $check_item = $this->connectdb()->prepare("SELECT * FROM $table WHERE $column1 = :$column2 AND $column2 = :$column2");
            $check_item->bindValue("$column1", $value1);
            $check_item->bindValue("$column2", $value2);
            $check_item->execute();
            if(!$check_item->rowCount() > 0){
                $add_item = $this->connectdb()->prepare("INSERT INTO $table ($column1, $column2) VALUES (:$column1, :$column2)");
                $add_item->bindValue("$column1", $value1);
                $add_item->bindValue("$column2", $value2);
                $add_item->execute();
                if($add_item){
                    echo "<p><span>$value1</span> added successfully!</p>";
                }else{
                    echo "<p class='exist'><span>$value1</span> could not be created!</p>";
                }
            }else{
                echo "<p class='exist'><span>$value1</span> already exists!</p>";
            }
            
        }

        //check in
        protected function check_in_guest($posted, $room, $last_name, $first_name, $age, $gender, $contact, $address, $phone, $relationship, $cause, $check_in_date, $check_out_date, $amount){
            
            //check if already checkin
            $confirm_check = $this->connectdb()->prepare("SELECT * FROM check_ins WHERE last_name = :last_name AND first_name = :first_name");
            $confirm_check->bindValue("last_name", $last_name);
            $confirm_check->bindValue("first_name", $first_name);
            $confirm_check->execute();
            if(!$confirm_check->rowCount() > 0){
                $check_in = $this->connectdb()->prepare("INSERT INTO check_ins (last_name, first_name, room, age, gender, contact_person, contact_phone, contact_address, relationship, death_cause, check_in_date, check_out_date, amount_due, posted_by) VALUES (:last_name, :first_name, :room, :age, :gender, :contact_person, :contact_phone, :contact_address, :relationship, :death_cause, :check_in_date, :check_out_date, :amount_due, :posted_by)");
                $check_in->bindvalue("last_name", $last_name);
                $check_in->bindvalue("first_name", $first_name);
                $check_in->bindvalue("room", $room);
                $check_in->bindvalue("age", $age);
                $check_in->bindvalue("gender", $gender);
                $check_in->bindvalue("contact_person", $contact);
                $check_in->bindvalue("contact_phone", $phone);
                $check_in->bindvalue("contact_address", $address);
                $check_in->bindvalue("relationship", $relationship);
                $check_in->bindvalue("death_cause",$cause);
                $check_in->bindvalue("check_in_date",$check_in_date);
                $check_in->bindvalue("check_out_date",$check_out_date);
                $check_in->bindvalue("amount_due",$amount);
                $check_in->bindvalue("posted_by",$posted);
                $check_in->execute();
                if($check_in){
                    // update room status
                    $update_room = $this->connectdb()->prepare("UPDATE rooms SET room_status = 1 WHERE room_id = :room_id");
                    $update_room->bindValue("room_status", $room);
                    $update_room->execute();
                    if($update_room){
                        echo "<p><span>$last_name $first_name</span> Posted successfully</p>";
                    }else{
                        echo "<p><span>Room status not updated</p>";
                    }
                }else{
                    echo "<p><span>$last_name $first_name</span> could not check in</p>";
                }
            }else{
                echo "<p class='exist'><span>$last_name $first_name</span> already checked in</p>";
            }
        }
        //post payment
        protected function post_payment($posted, $guest, $mode, $bank, $sender, $amount_due, $amount_paid, $invoice){
            
            $payment = $this->connectdb()->prepare("INSERT INTO payments (guest, amount_due, amount_paid, sender, bank, payment_mode, posted_by, invoice) VALUES (:guest, :amount_due, :amount_paid, :sender, :bank, :payment_mode, :posted_by, :invoice)");
            $payment->bindValue("guest", $guest);
            $payment->bindValue("amount_due", $amount_due);
            $payment->bindValue("amount_paid", $amount_paid);
            $payment->bindValue("sender", $sender);
            $payment->bindValue("bank", $bank);
            $payment->bindValue("payment_mode", $mode);
            $payment->bindValue("posted_by", $posted);
            $payment->bindValue("invoice", $invoice);
            $payment->execute();
            if($payment){
                // update status and amount due
                $new_balance = $amount_due - $amount_paid;
                $update_status = $this->connectdb()->prepare("UPDATE check_ins SET status = 1, amount_due = :amount_due WHERE guest_id = :guest_id");
                $update_status->bindValue("amount_due", $new_balance);
                $update_status->bindValue("guest_id", $guest);
                $update_status->execute();
                /* if($update_status){
                    $_SESSION['success'] = "<p>Payment was successful! <i class='fas fa-thumbs-up'></i></p>";
                    // echo "<p>Payment was successful! <i class='fas fa-thumbs-up'></i></p>";
                    // header("Location:../view/users.php");
                }else{
                    echo "<p>Status update was not successful! <i class='fas fa-thumbs-down'></i></p>";

                } */

            }else{
                echo "<p class='exist'><span>Failed to insert payment</p>";
            }
        }
    }


    // add user controller
    class Add_userController extends inserts{
        private $fullname;
        private $username;
        private $role;
        private $password;

        public function __construct($fullname, $username, $role, $password)
        {
            $this->fullname = $fullname;
            $this->username = $username;
            $this->role = $role;
            $this->password = $password;
        }

        public function create_user(){
            $this->checkUser($this->username);
            $this->setUser($this->fullname, $this->username, $this->role, $this->password);
        }
    }

    //add categeory controller
    class add_category extends inserts{
        private $category;
        private $price;

        public function __construct($category, $price)
        {
            $this->category = $category;
            $this->price = $price;
        }
        public function add_cat(){
            $this->add_category($this->category, $this->price);
        }
    }

    //add items controller
    class add_items extends inserts{
        private $table;
        private $column1;
        private $column2;
        private $value1;
        private $value2;

        public function __construct($table, $column1, $column2, $value1, $value2)
        {
            $this->table = $table;
            $this->column1 = $column1;
            $this->column2 = $column2;
            $this->value1 = $value1;
            $this->value2 = $value2;
        }
        public function create_item(){
            $this->add_items($this->table, $this->column1, $this->column2, $this->value1, $this->value2);
        }
    }

    //controller for check in
    class check_in extends inserts{
        private $posted;
        private $room;
        private $last_name;
        private $first_name;
        private $age;
        private $gender;
        private $contact;
        private $phone;
        private $address;
        private $relationship;
        private $cause;
        private $amount;
        private $check_in_date;
        private $check_out_date;

        public function __construct($posted, $room, $last_name, $first_name, $age, $gender, $contact, $phone, $address, $relationship, $cause, $amount, $check_in_date, $check_out_date)
        {
            $this->posted = $posted;
            $this->room = $room;
            $this->last_name = $last_name;
            $this->first_name = $first_name;
            $this->address = $address;
            $this->relationship = $relationship;
            $this->age = $age;
            $this->gender = $gender;
            $this->contact = $contact;
            $this->phone = $phone;
            $this->cause = $cause;
            $this->amount = $amount;
            $this->check_in_date = $check_in_date;
            $this->check_out_date =$check_out_date;
        }

        public function check_in(){
            $this->check_in_guest($this->posted, $this->room, $this->last_name, $this->first_name, $this->age, $this->gender, $this->contact, $this->address, $this->phone, $this->relationship, $this->cause, $this->check_in_date, $this->check_out_date, $this->amount);
        }
    }

    //controller for payments
    class payments extends inserts{
        private $posted;
        private $guest;
        private $mode;
        private $bank;
        private $sender;
        private $amount_due;
        private $amount_paid;
        private $invoice;

        public function __construct($posted, $guest, $mode, $bank, $sender, $amount_due, $amount_paid, $invoice)
        {
            $this->posted = $posted;
            $this->guest = $guest;
            $this->mode = $mode;
            $this->bank = $bank;
            $this->sender = $sender;
            $this->amount_due = $amount_due;
            $this->amount_paid =$amount_paid;
            $this->invoice = $invoice;
        }

        public function payment(){
            $this->post_payment($this->posted, $this->guest, $this->mode, $this->bank, $this->sender, $this->amount_due, $this->amount_paid, $this->invoice);
        }
    }