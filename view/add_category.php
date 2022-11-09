<div id="add_category" class="displays">
    <div class="info"></div>
    <div class="add_user_form" style="width:50%">
        <h3>Create room Categories</h3>
        <!-- <form method="POST" id="addUserForm"> -->
        <form class="addUserForm">
            <div class="inputs">
                <div class="data">
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" placeholder="Enter category" required>
                </div>
                <div class="data">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" placeholder="50,000" required>
                </div>
            </div>
            <div class="inputs">
                <button type="submit" id="add_cat" name="add_cat" onclick="addCategory()">Add category <i class="fas fa-layer-group"></i></button>
            </div>
        </form>    
    </div>
</div>
