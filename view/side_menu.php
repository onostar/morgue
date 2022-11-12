<aside class="main_menu" id="mobile_log">
    <div class="login">
        <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
        <div class="login_option">
            <div>
                <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                <!-- <h3>OR</h3>
                <a href="registration.php" id="signupBtn">Member Registration</a> -->
            </div>
        </div>
    </div>
    <nav>
        <h3><a href="users.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
        <ul>
            <?php if($role == "Admin"){?>

            <li><a href="javascript:void(0);" class="allMenus" title="Administrator Setup menu" data-menu="adminMenu"><span><i class="fas fa-gem"></i> Admin menu</span> <span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu" id="adminMenu">   
                    <li><a href="javascript:void(0);" title="Add users" class="page_navs" onclick="showPage('add_user.php')"><i class="fas fa-user-plus"></i> Add Users</a></li>
                    <li><a href="javascript:void(0);" title="Disable users" class="page_navs" onclick="showPage('disable_user.php')"><i class="fas fa-user-slash"></i> Disable user</a></li>
                    <li><a href="javascript:void(0);" title="Activate users" class="page_navs" onclick="showPage('activate_user.php')"><i class="fas fa-user-check"></i> Activate user</a></li>
                    <li><a href="javascript:void(0);" title="Add categories" class="page_navs" onclick="showPage('add_category.php')"><i class="fas fa-layer-group"></i> Add Categories</a></li>
                    <li><a href="javascript:void(0);" title="Add rooms" class="page_navs" onclick="showPage('add_room.php')"><i class="fas fa-house"></i> Add Rooms</a></li>
                    <li><a href="javascript:void(0);" title="Add banks" class="page_navs" onclick="showPage('add_bank.php')"><i class="fas fa-bank"></i> Add Bank</a></li>
                    <li><a href="javascript:void(0);" title="Edit room prices" class="page_navs" onclick="showPage('edit_price.php')"><i class="fas fa-coins"></i> Edit room prices</a></li>
                </ul>
            </li>

            <?php }?>
            <li><a href="javascript:void(0);" class="allMenus" title="Front desk menu" data-menu="frontDesk"><span><i class="fas fa-gem"></i> Front Desk </span><span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu" id="frontDesk">
                    <li><a href="javascript:void(0);" title="Check in guest" class="page_navs" onclick="showPage('check_in.php')"><i class="fas fa-right-to-bracket"></i> Check in guest</a></li>
                    <li><a href="javascript:void(0);" title="Check out guest" class="page_navs" onclick="showPage('check_out.php')"><i class="fas fa-door-open"></i> Check out guest</a></li>
                    <li><a href="javascript:void(0);" title="Cancel guest checkin" class="page_navs" onclick="showPage('cancel_checkin.php')"><i class="fas fa-power-off"></i> Cancel check in</a></li>
                    <li><a href="javascript:void(0);" title="Extend guest stay" class="page_navs" onclick="showPage('extend_stay.php')"><i class="fa-solid fa-calendar-plus"></i> Extend stay</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="allMenus" title="Front desk menu" data-menu="payments"><span><i class="fas fa-gem"></i> Payments </span><span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu" id="payments">
                    <li><a href="javascript:void(0);" title="Guest payments" class="page_navs" onclick="showPage('guest_payment.php')"><i class="fas fa-money-check-dollar"></i> New Guest payment</a></li>
                    <li><a href="javascript:void(0);" title="Add payments" class="page_navs" onclick="showPage('other_payment.php')"><i class="fas fa-hand-holding-dollar"></i> Make payment</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="allMenus" title="General Reports" data-menu="reports"><span><i class="fas fa-gem"></i> Reports </span><span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu" id="reports">
                    <li><a href="javascript:void(0);" title="List of rooms" class="page_navs" onclick="showPage('room_list.php')"><i class="fas fa-list-check"></i> Room List</a></li>
                    <li><a href="javascript:void(0);" title="List of rooms" class="page_navs" onclick="showPage('Bank_list.php')"><i class="fas fa-bank"></i> Bank List</a></li>
                    <li><a href="javascript:void(0);" title="List of rooms" class="page_navs" onclick="showPage('guest_list.php')"><i class="fas fa-users"></i> Current guest List</a></li>
                    <li><a href="javascript:void(0);" title="List of rooms" class="page_navs" onclick="showPage('checkin_report.php')"><i class="fas fa-gauge"></i> Check in report</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
<aside class="mobile_menu" id="mobile_log">
    <div class="login">
        <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
        <div class="login_option">
            <div>
                <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                <!-- <h3>OR</h3>
                <a href="registration.php" id="signupBtn">Member Registration</a> -->
            </div>
        </div>
    </div>
    <nav>
        <h3><a href="users.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
        <ul>        
            
            
        </ul>
    </nav>
</aside>