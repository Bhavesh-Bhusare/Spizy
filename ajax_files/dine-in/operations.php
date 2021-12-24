<?php
error_reporting(0);
include('../../php/db_connect.php');
session_start();
$user_active_id = $_SESSION['user_active_id'];
if (isset($_POST['ajax_request'])){
    if(isset($_POST['confirm_generate_order'])){
        $order_id = $_POST['order_id'];
        $dine_in_email = $_POST['dine_in_email'];
        $dine_in_message = $_POST['dine_in_message'];
        $dine_in_phone = $_POST['dine_in_phone'];
        $dine_in_date = $_POST['dine_in_date'];
        $dine_in_time = $_POST['dine_in_time'];
        $dine_in_place = $_POST['dine_in_place'];
        $dine_in_name = $_POST['dine_in_name'];
        $dine_in_person = $_POST['dine_in_person'];
        $query = mysqli_query($spizy_db_con,"INSERT INTO dine_in_data (order_id, name, email, contact, message, person, date, time) VALUES ('$order_id', '$dine_in_name', '$dine_in_email', '$dine_in_phone', '$dine_in_message', '$dine_in_person', '$dine_in_date', '$dine_in_time')");
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