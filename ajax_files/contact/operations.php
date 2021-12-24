<?php
error_reporting(0);
include('../../php/db_connect.php');
session_start();
$user_active_id = $_SESSION['user_active_id'];
if (isset($_POST['ajax_request'])){
    if(isset($_POST['submit_contact'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['comments'];
        $date = date_default_timezone_set('Asia/Kolkata');
        $created_date = date("Y/m/d");
        $created_time = date("H:i:s");
        $query = mysqli_query($spizy_db_con,"INSERT INTO contact_us_data (user_id, name, email, phone, message,date,time) VALUES ('$user_active_id', '$name', '$email', '$phone', '$message','$created_date','$created_time')");
        if($query){
            echo "<script>  
                Swal.fire({
                    icon: 'success',
                    title: 'Submitted !!!',
                    position: 'top-end',
                    toast: true,
                    padding: '0.3em',
                    showConfirmButton: false,
                    timer: 3000,
                    background: 'rgba(255, 255, 255, 1)'
                    });
                    setTimeout(() => {
                        window.open('index.php','_parent')
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