<?php
error_reporting(0);
include('../../php/db_connect.php');
session_start();
if (isset($_POST['ajax_request']) && $_SESSION['admin_active'] == True){
    if(isset($_POST['get_order_details'])){
        $order_id = $_POST['order_id'];
        $order_query = mysqli_query($spizy_db_con,"SELECT * FROM order_data WHERE id = '$order_id'");
        $order_query_array = mysqli_fetch_array($order_query);
        $order_details = json_decode($order_query_array['order_details']);
        $order_quantity = json_decode($order_query_array['order_quantity']);
        $count = 0;
        $response = "
            <table class='table table-border rounded-3 checkout-table' style='float: none; margin: auto;'>
            <tbody>
                <tr>
                    <th class='cart_table_desc'>Item</th>
                    <th class='cart_table_desc'>Quantity</th>
                </tr>";
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
                    <td>
                    <h5 class="order-quantity">'.$order_quantity[$count].'</h5>
                    </td>
                </tr>';
        $count = $count + 1;
        }
        $response .= " </tbody></table>";
        echo $response;
    }elseif (isset($_POST['register_chef'])) {
        $chef_name = $_POST['register_name'];
        $chef__email = $_POST['register_email'];
        $chef_pass = $_POST['register_password'];
        $query = mysqli_query($spizy_db_con,"INSERT INTO chef_data (name, email, password) VALUES ('$chef_name', '$chef__email', '$chef_pass')");
        if($query){
            echo "<script>  
                Swal.fire({
                    icon: 'success',
                    title: 'Created Successfully !!!',
                    position: 'top-end',
                    toast: true,
                    padding: '0.3em',
                    showConfirmButton: false,
                    timer: 3000,
                    background: 'rgba(255, 255, 255, 1)'
                });
                setTimeout(() => {
                    window.open('manage_chef.php','_parent')
                },2000);
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
}