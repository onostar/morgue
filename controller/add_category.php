<?php

    $category = ucwords(htmlspecialchars(stripslashes($_POST['category'])));
    $price = htmlspecialchars(stripslashes(($_POST['price'])));

    //instantiate class
    
    include "../classes/dbh.php";
    include "../classes/inserts.php";

    $add_cat = new add_category($category, $price);
    $add_cat->add_cat();