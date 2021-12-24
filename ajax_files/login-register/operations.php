<?php
session_start();
include('../../php/db_connect.php');
error_reporting(0);
if (isset($_POST['ajax_request'])){
    if($_POST['register_user']){
        $register_name = $_POST['register_name'];
        $register_email = $_POST['register_email'];
        $register_password = $_POST['register_password'];
        $register_address = $_POST['register_address'];
        $query = mysqli_query($spizy_db_con,"INSERT INTO user_data (name,email,password,address) VALUES ('$register_name','$register_email','$register_password','$register_address')");
            if($query){
                $_SESSION['user_registered_success'] = True;
                $response = "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Registration Successful !!!',
                            position: 'top-end',
                            toast: true,
                            padding: '0.3em',
                            showConfirmButton: false,
                            timer: 3000,
                            background: 'rgba(255, 255, 255, 1)'
                            });
                        </script>";
                $response .= '<script>setTimeout(() => {
                            $("#user_login_register_modal").modal("show");
                            $(".register_tab").removeClass("show");
                            $(".register_tab").removeClass("active");
                            $(".login_tab").addClass("active");
                            $(".login_tab").addClass("show");
                        }, 2000)</script>';
                echo $response;
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
    }elseif($_POST['login_user']){
        $login_email = $_POST['login_email'];
        $login_password = $_POST['login_password'];
        $query = mysqli_query($spizy_db_con,"SELECT * FROM user_data WHERE email = '$login_email' AND password = '$login_password'");
        $fetch_query = mysqli_fetch_array($query);
            if($fetch_query > 0){
                $_SESSION['user_active'] = True;
                $_SESSION['user_active_id'] = $fetch_query['id'];
                $response = "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful !!!',
                            position: 'top-end',
                            toast: true,
                            padding: '0.3em',
                            showConfirmButton: false,
                            timer: 3000,
                            background: 'rgba(255, 255, 255, 1)'
                            });
                        </script>";
                echo $response;
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
    }elseif ($_POST['login_chef']) {
        $login_email = $_POST['login_email'];
        $login_password = $_POST['login_password'];
        $query = mysqli_query($spizy_db_con,"SELECT * FROM chef_data WHERE email = '$login_email' AND password = '$login_password'");
        $fetch_query = mysqli_fetch_array($query);
            if($fetch_query > 0){
                $_SESSION['chef_active'] = True;
                $_SESSION['chef_active_id'] = $fetch_query['id'];
                $response = "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful !!!',
                            position: 'top-end',
                            toast: true,
                            padding: '0.3em',
                            showConfirmButton: false,
                            timer: 3000,
                            background: 'rgba(255, 255, 255, 1)'
                            });
                        </script>";
                echo $response;
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
    }elseif ($_POST['login_admin']) {
        $login_email = $_POST['login_email'];
        $login_password = $_POST['login_password'];
        $query = mysqli_query($spizy_db_con,"SELECT * FROM admin_data WHERE email = '$login_email' AND password = '$login_password'");
        $fetch_query = mysqli_fetch_array($query);
            if($fetch_query > 0){
                $_SESSION['admin_active'] = True;
                $_SESSION['admin_active_id'] = $fetch_query['id'];
                $response = "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful !!!',
                            position: 'top-end',
                            toast: true,
                            padding: '0.3em',
                            showConfirmButton: false,
                            timer: 3000,
                            background: 'rgba(255, 255, 255, 1)'
                            });
                        </script>";
                echo $response;
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
}else{
    echo "<script>window.open('../../index.php','_parent')</script>";
}
?>