<?php
error_reporting(0);
include('../../php/db_connect.php');
session_start();
$user_active_id = $_SESSION['user_active_id'];
if (isset($_POST['ajax_request'])){
    if(isset($_POST['get_plate_details'])){
        $dish_id = $_POST['ajax_dish_id'];
        $fetch_details_query = mysqli_query($spizy_db_con,"SELECT * FROM menu_data WHERE id = '$dish_id'");
        $fetch_details_query_array = mysqli_fetch_array($fetch_details_query);
        $response = '<div class="row">
                        <div class="menu-item-desc justify-content-center d-flex pb-3" style="font-size:20px">'.$fetch_details_query_array['name'].'</div>
                        <div class="d-flex justify-content-evenly" style="padding: 10px 25px;">
                            <input type="hidden" id="active_dish_id" value='.$fetch_details_query_array['id'].'>
                            <div class="input-group" style="width:120px">
                                <span class="input-group-btn">
                                    <button type="button" class="btn custom-button-xsm" id="minus_dish">
                                        <span class="fas fa-minus text-white"></span>
                                    </button>
                                </span>
                                <input type="number" class="form-control" id="active_dish_quantity" style="height: 30px; margin-top: 2px;" value="1" min="1" max="10">
                                <span class="input-group-btn">
                                    <button type="button" class="btn custom-button-xsm" id="plus_dish">
                                    <span class="fas fa-plus text-white"></span>
                                    </button>
                                </span>
                            </div>
                            <input type="hidden" id="active_dish_price_static" value='.$fetch_details_query_array['price'].'>
                            <input type="hidden" id="active_dish_price_hidden" value='.$fetch_details_query_array['price'].'>
                        <div class="menu-item-prices" id="active_dish_price" style="font-size:20px; font-weight: 600;">&#8377;'.$fetch_details_query_array['price'].'</div>
                        </div>
                    </div>';
        echo $response;
    }
    elseif(isset($_POST['confirm_dish_details'])){
        $dish_id = $_POST['ajax_dish_id'];
        $dish_quantity = $_POST['ajax_dish_quantity'];
        $dish_amount = $_POST['ajax_dish_amount'];
        $submit_cart_query = mysqli_query($spizy_db_con,"INSERT INTO cart_data (user_id, dish_id, dish_amount, dish_quantity) VALUES ('$user_active_id', '$dish_id', '$dish_amount', '$dish_quantity')");
        if($submit_cart_query){
            echo "<script>  
            Swal.fire({
                icon: 'success',
                title: 'Added Sucessfully',
                position: 'top-end',
                toast: true,
                padding: '0.3em',
                showConfirmButton: false,
                timer: 3000,
                background: 'rgba(255, 255, 255, 1)'
                });
            </script>";
        }else{
            echo "<script>  
            Swal.fire({
                icon: 'error',
                title: 'Something Went Wrong !!!',
                position: 'top-end',
                toast: true,
                padding: '0.3em',
                showConfirmButton: false,
                timer: 3000,
                background: 'rgba(255, 255, 255, 1)'
                });
            </script>";
        }
    }
}else{
    echo "<script>window.open('../../index.php','_parent')</script>";
}
?>