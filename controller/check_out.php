<?php
    session_start();
    
    if(isset($_GET['guest'])){
        $guest = $_GET['guest'];

        // instantiate classes
        include "../classes/dbh.php";
        include "../classes/update.php";

        $check_out = new Update_table();
        $check_out->update('check_ins', 'status', 'guest_id', 2, $guest);
        $_SESSION['success'] = "<p>Guest Checked out successfully! <i class='fas fa-thumbs-up'></i></p>";
        header("Location: ../view/users.php");
    }