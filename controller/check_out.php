<?php
    session_start();
    
    if(isset($_GET['guest'])){
        $guest = $_GET['guest'];

        // instantiate classes
        include "../classes/dbh.php";
        include "../classes/update.php";
        include "../classes/select.php";

        $check_out = new Update_table();
        $check_out->update('check_ins', 'status', 'guest_id', 2, $guest);
        // get room
        $get_room = new selects();
        $rooms = $get_room->fetch_details_group('check_ins', 'room', 'guest_id', $guest);
        $the_room = $rooms->room;
        //update room status
        $update_room = new Update_table();
        $update_room->update('rooms', 'room_status', 'room_id', 0, $the_room);
        if($update_room){
            $_SESSION['success'] = "<p>Guest Checked out successfully! <i class='fas fa-thumbs-up'></i></p>";
            header("Location: ../view/users.php");
        }else{
            $_SESSION['error'] = "<p>Failed to update room! <i class='fas fa-thumbs-up'></i></p>";
            header("Location: ../view/users.php");
        }
    }