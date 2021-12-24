<?php
error_reporting(0);
include('../../php/db_connect.php');
session_start();
$user_active_id = $_SESSION['user_active_id'];
if (isset($_POST['ajax_request'])){
    if(isset($_POST['confirm_generate_order'])){
        $user_name = $_POST['user_name'];
        $user_contact = $_POST['user_contact'];
        $user_add = $_POST['user_add'];
        $message = $_POST['message'];
        $order_id = $_POST['order_id'];
        $query = mysqli_query($spizy_db_con,"INSERT INTO door_bell_data (order_id,user_id,name,contact,address,message) VALUES ('$order_id', '$user_active_id', '$user_name', '$user_contact', '$user_add', '$message')");
        if($query){
            // $query = mysqli_query($spizy_db_con,"SELECT * FROM order_data WHERE user_id = '$user_active_id' order by id desc limit 1");
            // $query_array = mysqli_fetch_array($query);
            // $dummy = $query_array['id'];
            echo "<script>  
                Swal.fire({
                    icon: 'success',
                    title: 'Transferring Order',
                    position: 'top-end',
                    toast: true,
                    padding: '0.3em',
                    showConfirmButton: false,
                    timer: 3000,
                    background: 'rgba(255, 255, 255, 1)'
                    });
                    window.open('order-payment.php?order_id=$order_id','_parent');
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