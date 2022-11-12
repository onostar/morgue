<?php

    $bank = ucwords(htmlspecialchars(stripslashes($_POST['bank'])));
    $acn = htmlspecialchars(stripslashes(($_POST['account_num'])));

    //instantiate class
    
    include "../classes/dbh.php";
    include "../classes/inserts.php";

    $add_bank = new add_items('banks', 'bank', 'account_number', $bank, $acn);
    $add_bank->create_item();