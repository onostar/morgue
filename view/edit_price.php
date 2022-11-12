<?php

    include "../classes/dbh.php";
    include "../classes/select.php";
    
    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
    }

?>
    <div class="info"></div>
<div class="displays allResults" id="edit_price">
    <h2>Edit Room prices</h2>
    <hr>
    <div class="search">
        <input type="search" id="searchGuestPayment" placeholder="Enter keyword" onkeyup="searchData(this.value)">
    </div>
    <table id="priceTable" class="searchTable">
        <thead>
            <tr style="background:var(--moreColor)">
                <td>S/N</td>
                <!-- <td>Restaurant Name</td> -->
                <td>Rom category</td>
                <td>Price</td>
                <td></td>
            </tr>
        </thead>

        <?php
            $n = 1;
            $select_cat = new selects();
            $rows = $select_cat->fetch_details('categories');
            foreach($rows as $row):
        ?>
        <tbody>
            <tr>
                <td style="text-align:center;"><?php echo $n?></td>
                
                <td><?php echo $row->category?></td>
                <td>
                    <?php echo "₦ ". number_format($row->price);?>
                </td>
                <td class="prices">
                    <a style="color:var(--secondaryColor)!important" href="javascript:void(0)" data-form="check<?php echo $row->category_id?>" class="each_prices" onclick="displayPriceForm(this.dataset.form)">Modify Price <i class="fas fa-pen" style="color:green;"></i></a>
                    <section method="POST" id="check<?php echo $row->category_id?>" class="priceForm" >
                        <input type="hidden" name="category_id" id="category_id" value="<?php echo $row->category_id?>">
                        <input type="text" name="price" id="price" title="Click to edit price" value="<?php echo $row->price;?>" required>
                        <button type="submit" name="change_prize" id="changePrize" class="changePrizes" onclick="changePrice()"><i class="fas fa-check"></i></button>
                        <button><a href="javascript:void(0)" class="closeForm"><i class="fas fa-window-close" onclick="closeForm()"></i></a></button>
            </section>
                </td>
            </tr>
        </tbody>

        <?php $n++; endforeach;?>
    </table>
    
    <?php
        if(gettype($rows) == "string"){
            echo "<p class='no_result'>'$rows'</p>";
        }
    ?>
</div>