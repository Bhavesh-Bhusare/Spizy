<?php
error_reporting(0);
include('../../php/db_connect.php');
session_start();
$user_active_id = $_SESSION['user_active_id'];
if (isset($_POST['ajax_request'])){
    if(isset($_POST['get_cart_details'])){
        $cart_query = mysqli_query($spizy_db_con,"SELECT * FROM cart_data WHERE user_id = '$user_active_id' and status = '0'");
            if($cart_query){
                $response = '<div class="col-sm-12">
                                <table class="table table-border checkout-table" style="border: ">
                                    <tbody>
                                        <tr>
                                            <th class="cart_table_desc">Item</th>
                                            <th class="cart_table_desc hidden-xs">Price</th>
                                            <th class="cart_table_desc">Quantity</th>
                                            <th class="cart_table_desc">Total</th>
                                            <th class="cart_table_desc">Remove</th>
                                        </tr>';
                                        $total = 0;
                while ($cart_query_array = mysqli_fetch_array($cart_query)){
                    $new_dish_id = $cart_query_array['dish_id'];
                    $dish_query = mysqli_query($spizy_db_con,"SELECT * FROM menu_data WHERE id = '$new_dish_id'");
                    $dish_query_array = mysqli_fetch_array($dish_query);
                    $total = $total + $cart_query_array['dish_amount'];
                    $response .= '<tr>
                        <td>
                            <h5 class="product-name">'.$dish_query_array['name'].'</h5>
                            <input class="hidden_dish_id" type="hidden" value='.$dish_query_array['id'].'></input>
                            <input class="hidden_dish_quantity" type="hidden" value='.$cart_query_array['dish_quantity'].'></input>
                        </td>
                        <td class="hidden-xs">
                            <h5 class="order-money">&#8377;'.$dish_query_array['price'].'</h5>
                        </td>
                        <td>
                        <h5 class="order-quantity">'.$cart_query_array['dish_quantity'].'</h5>
                        </td>
                        <td>
                            <h5 class="order-money ">&#8377;'.$cart_query_array['dish_amount'].'</h5>
                        </td>
                        <td class="pr-remove">
                            <button class="add-to-cart-button-sm" onclick="remove_dish('.$cart_query_array['id'].')" style="padding: 8px;margin-left: 0px;height: 30px;font-size: 11px;"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>';
                }
                $grand_total = $total + 50;
                $response .= '</tbody>
                                </table>
                                <input class="hidden_total_amount" type="hidden" value='.$total.'></input>
                                <input class="hidden_grand_amount" type="hidden" value='.$grand_total.'></input>
                            </div>';
                echo $response;
            }
    }
    else if(isset($_POST['remove_dish'])){
        $cart_id = $_POST['cart_id'];
        $query = mysqli_query($spizy_db_con,"DELETE from cart_data WHERE id = '$cart_id'");
        if($query){
            echo "<script>  
                Swal.fire({
                    icon: 'success',
                    title: 'Removed Sucessfully',
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
                    title: 'Something went Wrong !!!',
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
    else if(isset($_POST['cart_total'])){
        $response = '<div class="col-sm-5 col-sm-offset-7">
                        <div class="cart-totals">
                            <h4>Cart Totals</h4>
                            <table class="table table-border checkout-table">
                                <tbody>
                                    <tr>
                                        <th>Cart Subtotal:</th>
                                        <td>$40.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Total:</th>
                                        <td>$2.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$42.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-lg btn-block btn-round btn-d">Proceed to
                                Checkout</button>
                        </div>
                    </div>';
    }
    elseif (isset($_POST['generate_order'])) {
        $dish_id_array =  $_POST['dish_id_array_proper'];
        $dish_quantity_array = $_POST['dish_quantity_array_proper'];
        $grand_total = $_POST['total_amount'];
        $date = date_default_timezone_set('Asia/Kolkata');
        $created_date = date("Y/m/d");
        $created_time = date("H:i:s");
        $query = mysqli_query($spizy_db_con,"INSERT into order_data (user_id, order_details,order_quantity, total_amount, date, time,type) VALUES ('$user_active_id', '$dish_id_array','$dish_quantity_array','$grand_total', '$created_date','$created_time','Door-Bell')");
        if($query){
            $query = mysqli_query($spizy_db_con,"SELECT * FROM order_data WHERE user_id = '$user_active_id' order by id desc limit 1");
            $query_array = mysqli_fetch_array($query);
            $dummy = $query_array['id'];
            echo "<script>  
                Swal.fire({
                    icon: 'success',
                    title: 'Order Generated',
                    position: 'top-end',
                    toast: true,
                    padding: '0.3em',
                    showConfirmButton: false,
                    timer: 3000,
                    background: 'rgba(255, 255, 255, 1)'
                    });
                    window.open('door-bell.php?order_id=$dummy','_parent');
                </script>";
        }else{
            echo "<script>  
                Swal.fire({
                    icon: 'error',
                    title: 'Something went Wrong !!!',
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
    elseif (isset($_POST['generate_order_dinein'])) {
        $dish_id_array =  $_POST['dish_id_array_proper'];
        $dish_quantity_array = $_POST['dish_quantity_array_proper'];
        $grand_total = $_POST['total_amount'];
        $date = date_default_timezone_set('Asia/Kolkata');
        $created_date = date("Y/m/d");
        $created_time = date("H:i:s");
        $query = mysqli_query($spizy_db_con,"INSERT into order_data (user_id, order_details,order_quantity, total_amount, date, time,type) VALUES ('$user_active_id', '$dish_id_array','$dish_quantity_array','$grand_total', '$created_date','$created_time','Dine-In')");
        if($query){
            $query = mysqli_query($spizy_db_con,"SELECT * FROM order_data WHERE user_id = '$user_active_id' order by id desc limit 1");
            $query_array = mysqli_fetch_array($query);
            $dummy = $query_array['id'];
            echo "<script>  
                Swal.fire({
                    icon: 'success',
                    title: 'Order Generated',
                    position: 'top-end',
                    toast: true,
                    padding: '0.3em',
                    showConfirmButton: false,
                    timer: 3000,
                    background: 'rgba(255, 255, 255, 1)'
                    });
                    window.open('dine-in.php?order_id=$dummy','_parent');
                </script>";
        }else{
            echo "<script>  
                Swal.fire({
                    icon: 'error',
                    title: 'Something went Wrong !!!',
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
    else if(isset($_POST['get_cart_details_method'])){
        $order_id = $_POST['order_id'];
        $order_query = mysqli_query($spizy_db_con,"SELECT * FROM order_data WHERE id = '$order_id'");
        if($order_query){
            $response = '<div class="col-sm-12">
                            <table class="table table-border checkout-table" style="border: ">
                                <tbody>
                                    <tr>
                                        <th class="cart_table_desc">Item</th>
                                        <th class="cart_table_desc hidden-xs">Price</th>
                                        <th class="cart_table_desc">Quantity</th>
                                        <th class="cart_table_desc">Total</th>
                                    </tr>';
                                    $total = 0;
            while ($order_query_array = mysqli_fetch_array($order_query)){
                $order_details = json_decode($order_query_array['order_details']);
                foreach ($order_details as $value){
                $query = mysqli_query($spizy_db_con,"SELECT * FROM cart_data WHERE dish_id = '$value'");
                $query_array = mysqli_fetch_array($query);
                $dummy = $query_array['dish_id'];
                $dish_query = mysqli_query($spizy_db_con,"SELECT * FROM menu_data WHERE id = '$dummy'");
                $dish_query_array = mysqli_fetch_array($dish_query);
                $response .= '<tr>
                    <td>
                        <h5 class="product-name">'.$dish_query_array['name'].'</h5>
                    </td>
                    <td class="hidden-xs">
                        <h5 class="order-money">&#8377;'.$dish_query_array['price'].'</h5>
                    </td>
                    <td>
                    <h5 class="order-quantity">'.$query_array['dish_quantity'].'</h5>
                    </td>
                    <td>
                        <h5 class="order-money ">&#8377;'.$query_array['dish_amount'].'</h5>
                    </td>
                </tr>';
                }
            }
            $response .= '</tbody>
                            </table>
                        </div>';
            echo $response;
        }
    }
}else
{
    echo "<script>window.open('../../index.php','_parent')</script>";
}
?>  