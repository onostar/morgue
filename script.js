// toggle password
function togglePassword(){
    let pw = document.querySelectorAll(".password");
    pw.forEach(ps => {
       if(ps.type === "password"){
            ps.type = "text";
            document.querySelector(".icon").innerHTML = "<i class='fas fa-eye-slash'></i>";
            document.querySelector(".icon_txt").innerHTML = "Hide password";
       }else{
            ps.type = "password";
            document.querySelector(".icon").innerHTML = "<i class='fas fa-eye'></i>";
            document.querySelector(".icon_txt").innerHTML = "Show password";
       } 
    });
}

//toggle logout
$(document).ready(function(){
     $("#loginDiv").click(function(){
          $(".login_option").toggle();
     })
})

//toggle menu with more options
$(document).ready(function(){
     $(".addMenu").click(function(){
          $(".nav1Menu").toggle();
          //change icon from plus to miinus and vice versa
          let option_icon = document.querySelector(".options");
          if(document.querySelector(".nav1Menu").style.display == "block"){
               option_icon.innerHTML = "<i style='background:none; color:#fff!important; box-shadow:none!important;' class='fas fa-minus'></i>";
          }else{
               option_icon.innerHTML = "<i style='background:none; color:#fff!important; box-shadow:none!important;' class='fas fa-plus'></i>";
          }

     })
})
//toggle all submenu
function showMenu(menu){
     document.querySelectorAll(".subMenu").forEach(subMenu => {
          subMenu.style.display = "none";
     });
     document.querySelector(`#${menu}`).style.display = "block";
}
document.addEventListener("DOMContentLoaded", function(){
     document.querySelectorAll(".allMenus").forEach(menus =>{
          menus.onclick = function(){
               showMenu(this.dataset.menu);
          }
     })
})
//show payment mode forms
function showCash(){
     document.querySelectorAll(".payment_form").forEach(function(forms){
          forms.style.display = "none";
     })
     $("#cash").show();
}
function showPos(){
     document.querySelectorAll(".payment_form").forEach(function(forms){
          forms.style.display = "none";
     })
     $("#pos").show();
}
function showTransfer(){
     document.querySelectorAll(".payment_form").forEach(function(forms){
          forms.style.display = "none";
     })
     $("#transfer").show();
}
//show pages dynamically with xhttp request
function showPage(page){
     let xhr = false;
     if(window.XMLHttpRequest){
          xhr = new XMLHttpRequest();
     }else{
          xhr = new ActiveXObject("Microsoft.XMLHTTP");
     }
     if(xhr){
          xhr.onreadystatechange = function(){
               if(xhr.readyState == 4 && xhr.status == 200){
                    document.getElementById("contents").innerHTML = xhr.responseText;
               }
          }
          xhr.open("GET", page, true );
          xhr.send(null);
     }
}

//add users
function addUser(){
     let username = document.getElementById("username").value;
     let full_name = document.getElementById("full_name").value;
     let user_role = document.getElementById("user_role").value;
     // alert(hotel_address);
     if(full_name.length == 0 || full_name.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please enter user full name!");
          $("#full_name").focus();
          return;
     }else if(username.length == 0 || username.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please enter a username!");
          $("#username").focus();
          return;
     }else if(user_role.length == 0 || user_role.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please select user role!");
          $("#user_role").focus();
          return;
     }else{
          $.ajax({
               type : "POST",
               url : "../controller/add_users.php",
               data : {username:username, full_name:full_name, user_role:user_role},
               success : function(response){
               $(".info").html(response);
               }
          })
     }
     $("#usernane").val('');
     $("#full_name").val('');
     $("#user_role").val('');
     $("#full_name").focus();
     return false;
}

//add categories
function addCategory(){
     let category = document.getElementById("category").value;
     let price = document.getElementById("price").value;
     if(category.length == 0 || category.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please enter category!");
          $("#category").focus();
          return;
     }else if(price.length == 0 || price.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please enter category price!");
          $("#price").focus();
          return;
     }else{
          $.ajax({
               type : "POST",
               url : "../controller/add_category.php",
               data : {category:category, price:price},
               success : function(response){
               $(".info").html(response);
               }
          })
     }
     $("#category").val('');
     $("#category").focus();
     return false;
}
//add bank
function addBank(){
     let bank = document.getElementById("bank").value;
     let account_num = document.getElementById("account_num").value;
     if(bank.length == 0 || bank.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please input bank name!");
          $("#bank").focus();
          return;
     }else if(account_num.length == 0 || account_num.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please input account number!");
          $("#account_num").focus();
          return;
     }else{
          $.ajax({
               type : "POST",
               url : "../controller/add_bank.php",
               data : {bank:bank, account_num:account_num},
               success : function(response){
               $(".info").html(response);
               }
          })
     }
     $("#bank").val('');
     $("#account_num").val('');
     $("#bank").focus();
     return false;
}
//search for data within table
function searchData(data){
     let $row = $(".searchTable tbody tr");
     let val = $.trim(data).replace(/ +/g, ' ').toLowerCase();
     $row.show().filter(function(){
          var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
          return !~text.indexOf(val);
     }).hide();
}

// disale user
function disableUser(user_id){
     let disable = confirm("Do you want to disable this user?", "");
     if(disable){
          // alert(user_id);
          $.ajax({
               type: "GET",
               url : "../controller/disable_user.php?id="+user_id,
               success : function(response){
                    $("#disable_user").html(response);
               }
          })
          setTimeout(function(){
               $('#disable_user').load("disable_user.php #disable_user");
          }, 3000);
          return false;
     }
}

// activate disabled user
function activateUser(user_id){
     let activate = confirm("Do you want to activate this user account?", "");
     if(activate){
          $.ajax({
               type : "GET",
               url : "../controller/activate_user.php?user_id="+user_id,
               success : function(response){
                    $("#activate_user").html(response);
               }
          })
          setTimeout(function(){
               $("#activate_user").load("activate_user.php #activate_user");
          }, 3000);
          return false;
     }
}

// add rooms 
function addRoom(){
     let room_category = document.getElementById("room_category").value;
     let room = document.getElementById("room").value;
     if(room_category.length == 0 || room_category.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please enter room category!");
          $("#category").focus();
          return;
     }else if(room.length == 0 || room.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please enter room name");
          $("#room").focus();
          return;
     }else{
          $.ajax({
               type : "POST",
               url : "../controller/add_room.php",
               data : {room_category:room_category, room:room},
               success : function(response){
               $(".info").html(response);
               }
          })
     }
     $("#room_category").val('');
     $("#room").val('');
     $("#room").focus();
     return false;    
}

// get room
function getRooms(check_category){
     let check_in_category = check_category;
     if(check_in_category){
          $.ajax({
               type : "POST",
               url :"../controller/get_rooms.php",
               data : {check_in_category:check_in_category},
               success : function(response){
                    $("#check_in_room").html(response);
               }
          })
          return false;
     }else{
          $("#check_in_room").html("<option value'' selected>Select category first</option>")
     }
     
}

//get price for rooms
function getPrice(check_room){
     let check_in_room = check_room;
     // alert(check_room);
     // return;
     if(check_in_room){
          $.ajax({
               type : "POST",
               url :"../controller/get_price.php",
               data : {check_in_room:check_in_room},
               success : function(response){
                    $("#amount").html(response);
               }
          })
          return false;
     }else{
          $("#amount").html("<p>Please select room first</p>");
     }
     
}

//check in
function checkIn(){
     let posted_by = document.getElementById("posted_by").value;
     let check_in_category = document.getElementById("check_in_category").value;
     let check_in_room = document.getElementById("check_in_room").value;
     let last_name = document.getElementById("last_name").value;
     let first_name = document.getElementById("first_name").value;
     let age = document.getElementById("age").value;
     let gender = document.getElementById("gender").value;
     let contact_person = document.getElementById("contact_person").value;
     let contact_address = document.getElementById("contact_address").value;
     let contact_phone = document.getElementById("contact_phone").value;
     let relationship = document.getElementById("relationship").value;
     let death_cause = document.getElementById("death_cause").value;
     let check_in_date = document.getElementById("check_in_date").value;
     let check_out_date = document.getElementById("check_out_date").value;
     let amount_due = document.getElementById("amount_due").value;
     let today = new Date();
     if(check_in_category.length == 0 || check_in_category.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please select room category!");
          $("#check_in_category").focus();
          return;
     }else if(check_in_room.length == 0 || check_in_room.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please select room");
          $("#check_in_room").focus();
          return;
     }else if(last_name.length == 0 || last_name.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Enter Last Name");
          $("#last_name").focus();
          return;
     }else if(first_name.length == 0 || first_name.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Enter First Name");
          $("#first_name").focus();
          return;
     }else if(age.length == 0 || age.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Enter Age");
          $("#age").focus();
          return;
     }else if(gender.length == 0 || gender.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Select Gender");
          $("#gender").focus();
          return;
     }else if(contact_person.length == 0 || contact_person.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Enter contact person's name");
          $("#contact_person").focus();
          return;
     }else if(contact_address.length == 0 || contact_address.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Enter contact person's Address");
          $("#contact_address").focus();
          return;
     }else if(contact_phone.length == 0 || contact_phone.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Enter contact's Phone number");
          $("#contact_phone").focus();
          return;
     }else if(relationship.length == 0 || relationship.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Select Contact's relationship");
          $("#relationship").focus();
          return;
     }else if(death_cause.length == 0 || death_cause.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Select Cause of Death");
          $("#death_cause").focus();
          return;
     }else if(check_in_date.length == 0 || check_in_date.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Input Check in date");
          $("#check_in_date").focus();
          return;
     }else if(check_out_date.length == 0 || check_out_date.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please Input Check out date");
          $("#check_out_date").focus();
          return;
     }else if((new Date(check_in_date )).getTime() < today.getTime()){
          alert("Check in date cannot be lesser than todays date");
          $("#check_in_date").focus();
          return;
     }else if((new Date(check_in_date )).getTime() > (new Date(check_out_date)).getTime()){
          alert("Check in date cannot be greater than check out date");
          $("#check_in_date").focus();
          return;
     }else if(amount_due.length == 0 || amount_due.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please select room to display amount");
          $("#check_in_room").focus();
          return;
     }else{
          $.ajax({
               type : "POST",
               url : "../controller/check_in.php",
               data : {posted_by:posted_by,check_in_room:check_in_room, last_name:last_name, first_name:first_name, age:age, gender:gender, contact_person:contact_person, contact_address:contact_address, contact_phone:contact_phone, relationship:relationship, death_cause:death_cause, check_in_date:check_in_date, check_out_date:check_out_date, amount_due:amount_due},
               success : function(response){
               $(".info").html(response);
               }
          })
          $("#check_in_category").val('');
          $("#check_in_room").val('');
          $("#last_name").val('');
          $("#first_name").val('');
          $("#amount_due").val('');
          $("#check_in_date").val('');
          $("#check_out_date").val('');
          $("#days").html('');
          $("#last_name").focus();
          return false; 
     }
        
}

//calculate days from check in and check out
function calculateDays(){
     let check_in_date = document.getElementById("check_in_date").value;
     let check_out_date = document.getElementById("check_out_date").value; 
     let amount = document.getElementById("amount");
     let room_fee = document.getElementById("room_fee").value;
     let num_days = document.getElementById("days");
     firstDay = new Date(check_in_date);
     secondDay = new Date(check_out_date);
     days = secondDay.getTime() - firstDay.getTime();
     totalDays = days / (1000 * 60 * 60 * 24);
     newAmount = totalDays * parseInt(room_fee);
     amount.innerHTML = "<input type='number' name='amount_due' id='amount_due' value='"+newAmount+"'>";
     num_days.innerHTML = "<p>(Checking in for "+totalDays+" days)</p>";
     // alert(totalDays);
}

//post guest payment
function postPayment(){
     let posted_by = document.getElementById("posted_by").value;
     let guest = document.getElementById("guest").value;
     let payment_mode = document.getElementById("payment_mode").value;
     let bank_paid = document.getElementById("bank_paid").value;
     let sender = document.getElementById("sender").value;
     let guest_amount = document.getElementById("guest_amount").value;
     let amount_paid = document.getElementById("amount_paid").value;
     
     if(amount_paid.length == 0 || amount_paid.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please input amount paid!");
          $("#amount_paid").focus();
          return;
     // }else if(parseInt(amount_paid) < parseInt(guest_amount)){
     //      alert("Insufficient funds!");
     //      $("#guest_amount").focus();
     //      return;
     }else{
     $.ajax({
          type : "POST",
          url : "../controller/post_payments.php",
          data : {posted_by:posted_by, guest:guest, payment_mode:payment_mode, bank_paid:bank_paid, sender:sender, guest_amount:guest_amount, amount_paid:amount_paid},
          success : function(response){
               $("#all_payments").html(response);
          }
     })
          setTimeout(function(){
               $('#all_payments').load("post_payment.php?guest_id=+"+guest + "#all_payments");
          }, 3000);
     }
     return false;    

}
//post other payments for guest
function postOtherPayment(){
     let posted_by = document.getElementById("posted_by").value;
     let guest = document.getElementById("guest").value;
     let payment_mode = document.getElementById("payment_mode").value;
     let bank_paid = document.getElementById("bank_paid").value;
     let sender = document.getElementById("sender").value;
     let guest_amount = document.getElementById("guest_amount").value;
     let amount_paid = document.getElementById("amount_paid").value;
     
     if(amount_paid.length == 0 || amount_paid.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please input amount paid!");
          $("#amount_paid").focus();
          return;
     // }else if(parseInt(amount_paid) < parseInt(guest_amount)){
     //      alert("Insufficient funds!");
     //      $("#guest_amount").focus();
     //      return;
     }else{
     $.ajax({
          type : "POST",
          url : "../controller/post_payments.php",
          data : {posted_by:posted_by, guest:guest, payment_mode:payment_mode, bank_paid:bank_paid, sender:sender, guest_amount:guest_amount, amount_paid:amount_paid},
          success : function(response){
               $("#guest_details").html(response);
          }
     })
          setTimeout(function(){
               $('#guest_details').load("guest_details.php?guest_id=+"+guest + "#guest_details");
          }, 3000);
     }
     return false;    

}

//check out guest
function checkOut(guest){
     let checkout = confirm("Do you want to check out this guest?", "");
     if(checkout){
          // alert(user_id);
          window.open("../controller/check_out.php?guest="+guest, "_parent");
     }
}

//display change price form
function displayPriceForm(form){
     document.querySelectorAll(".priceForm").forEach(forms=>{
         forms.style.display = "none";
     })
     document.querySelector(`#${form}`).style.display = "flex";
 
 }
 
 //close price form
 function closeForm(){
     $(".closeForm").click(function(){
         $(".priceForm").hide();
     })
 }

 //change price
 function changePrice(){
     let category_id = document.getElementById("category_id").value;
     let price = document.getElementById("price").value;

     $.ajax({
          type : "POST",
          url : "../controller/edit_price.php",
          data: {category_id:category_id, price:price},
          success : function(response){
               $("#edit_price").html(response);
          }
     })
     setTimeout(function(){
          $("#edit_price").load("edit_price.php #edit_price");
     }, 3000);
     return false;
 }
//  search checkIns 
function searchCheckIns(){
     let from_date = document.getElementById('from_date').value;
     let to_date = document.getElementById('to_date').value;
     /* authentication */
     if(from_date.length == 0 || from_date.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please select a date!");
          $("#from_date").focus();
          return;
     }else if(to_date.length == 0 || to_date.replace(/^\s+|\s+$/g, "").length == 0){
          alert("Please select a date range!");
          $("#to_date").focus();
          return;
     }else{
          $.ajax({
               type: "POST",
               url: "../controller/search_checkins.php",
               data: {from_date:from_date, to_date:to_date},
               success: function(response){
               $(".new_data").html(response);
               }
          });
     }
     return false;
}