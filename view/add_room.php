<?php
    include "../classes/dbh.php";
    include "../classes/select.php";
?>

<div id="add_room" class="displays">
    <div class="info"></div>
    <div class="add_user_form" style="width:50%">
        <h3>Create room Categories</h3>
        <!-- <form method="POST" id="addUserForm"> -->
        <form class="addUserForm">
            <div class="inputs">
                <div class="data">
                    <label for="room_category">Room category</label>
                    <select name="room_category" id="room_category">
                        <option value=""selected required>Select room category</option>
                        <?php
                            $get_category = new selects();
                            $rows = $get_category->fetch_details('categories');
                            foreach($rows as $row){
                        ?>
                        <option value="<?php echo $row->category_id?>"><?php echo $row->category?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="data">
                    <label for="room">Room</label>
                    <input type="text" name="room" id="room" placeholder="Enter room name" required>
                </div>
            </div>
            <div class="inputs">
                <div class="data">
                    <button type="submit" id="add_room" name="add_room" onclick="addRoom()">Add room <i class="fas fa-house"></i></button>
                </div>
            </div>
        </form>    
    </div>
</div>
