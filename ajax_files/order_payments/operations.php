<?php
error_reporting(0);
include('../../php/db_connect.php');
session_start();
$user_active_id = $_SESSION['user_active_id'];
if (isset($_POST['ajax_request'])){
    if(isset($_POST['payment_success'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $cnum = $_POST['cnum'];
        $total = $_POST['total'];
        $order_id = $_POST['order_id'];
        $date = date_default_timezone_set('Asia/Kolkata');
        $created_date = date("Y/m/d");
        $created_time = date("H:i:s");
        $query = mysqli_query($spizy_db_con,"INSERT INTO payment_data (order_id, user_id, fname, lname, cnum, total_amount,date,time,payment_status) VALUES ('$order_id', '$user_active_id', '$fname', '$lname', '$cnum', '$total','$created_date','$created_time',1)");
        if($query){
            $query = mysqli_query($spizy_db_con,"SELECT * FROM payment_data WHERE user_id = '$user_active_id' order by id desc limit 1");
            $query_array = mysqli_fetch_array($query);
            $dummy = $query_array['id'];
            $order_query = mysqli_query($spizy_db_con,"SELECT * FROM order_data WHERE id = '$order_id'");
            while ($order_query_array = mysqli_fetch_array($order_query)){
                $order_details = json_decode($order_query_array['order_details']);
                foreach ($order_details as $value){
                $query = mysqli_query($spizy_db_con,"UPDATE cart_data SET status = '1' WHERE dish_id = '$value'");
                echo $value;
                }
            }
            echo "<script>  
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Payment Success !!!',
                            text: 'Order & Payment Recieved Successfully',
                            footer: 'Redirecting Home.....',
                            timer: 5000
                        });
                        setTimeout(() => {
                            window.open('index.php','_parent')
                        },2000);
                    }, 1500);
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