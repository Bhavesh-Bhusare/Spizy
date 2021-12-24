<?php
error_reporting(0);
session_start();
if($_SESSION['admin_active'] == True)
{
    $admin_active = "True";
    $admin_active_id = $_SESSION['admin_active_id'];
}else
{
    $admin_active = "False";
}
include('../php/db_connect.php');
if($_SESSION['admin_active'] == True){
$order_details = mysqli_query($spizy_db_con,"SELECT * FROM order_data");
$payment_details = mysqli_query($spizy_db_con,"SELECT * FROM payment_data");
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Spizy | Admin | Homepage</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment-with-locales.min.js"></script>
    <script src="https://getdatepicker.com/5-4/theme/js/tempusdominus-bootstrap-4.js"></script>
    <link rel="stylesheet" href="https://getdatepicker.com/5-4/theme/css/tempusdominus-bootstrap-4.css">
    <link type="text/css" rel="stylesheet" href="../css/reset.css">
    <link type="text/css" rel="stylesheet" href="../css/plugins.css">
    <link type="text/css" rel="stylesheet" href="../css/style.css">
    <link type="text/css" rel="stylesheet" href="../css/color.css">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="../images/restaurant.png">
</head>
<script>
function view_order_details(id) {
    var order_id = id;
    var ajax_request = true;
    var get_order_details = true;
    $.ajax({
            url: '../ajax_files/admin_operations/operations.php',
            type: 'POST',
            data: {
                ajax_request: ajax_request,
                get_order_details: get_order_details,
                order_id : order_id
            },
            beforeSend: function () {
                ajax_start();
            },
            complete: function () {
                ajax_complete();
            },
            success: function (response) {
                    $('.order_details_ajax_response').html(response);
                    setTimeout(() => {
                        $('#order_details_modal').modal('show');
                    }, 1500);
                }
        })
    }
</script>

<body>
    <div class="modal fade" id="user_login_register_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal-border">
                <div class="modal-header custom_modal_text_head">
                    <h5 class="modal-title" id="staticBackdropLabel">Login with Your Credentials</h5>
                    <div type="button" class="close" onclick="window.open('index.php','_parent')">
                        <i class="far fa-times-circle" data-dismiss="modal" aria-label="Close"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="tab-pane fade show active login_tab" id="pills-login" role="tabpanel"
                        aria-labelledby="pills-login-tab">
                        <div class="login_register-form-holder">
                            <div class="mt-4" id="login_register-form">
                                <input type="text" class="login_email" placeholder="E-mail">
                                <input type="password" class="login_password" placeholder="Password" value=''>
                                <button type="button" id="login_button" class="btn custom-button-sm">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="order_details_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal-border">
                <div class="modal-header custom_modal_text_head">
                    <h5 class="modal-title" id="staticBackdropLabel">Order Details</h5>
                    <div type="button" class="close">
                        <i class="far fa-times-circle" data-dismiss="modal" aria-label="Close"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="order_details_ajax_response"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="loader">
        <?php include('loader.php')?>
    </div>
    <!--================= main start ================-->
    <div id="main">
        <!--=============== header ===============-->
        <header>
            <div class="header-inner">
                <div class="container">
                    <div class="logo-holder">
                        <a href="index.php">
                            <img src="../images/logo.jpg" class="respimg logo-vis" alt="">
                            <img src="../images/logo2.jpg" class="respimg logo-notvis" alt="">
                        </a>
                    </div>
                    <!--Navigation -->
                    <div class="nav-holder" style="margin-top: 20px;">
                        <nav>
                            <ul>
                                <?php
                                    if($_SESSION['admin_active'] == True)
                                    {
                                        echo "<li><a href='manage_chef.php'>Manage Chef</a></li>";
                                        echo "<li><a href='view_contacts.php'>Contact Queries</a></li>";
                                        echo "<li><a href='logout.php'>Logout</a></li>";
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!--header end-->
        <!--=============== wrapper ===============-->
        <div id="wrapper">
            <div class="content">
                <section class="parallax-section header-section">
                    <div class="bg bg-parallax" style="background-image:url(../images/bg/32.jpg)"
                        data-top-bottom="transform: translateY(300px);"
                        data-bottom-top="transform: translateY(-300px);"></div>
                    <div class="overlay"></div>
                    <div class="container">
                        <h2>Hello</h2>
                        <h3>
                            <?php $query = mysqli_query($spizy_db_con,"SELECT * FROM admin_data WHERE id = '$admin_active_id'");
                            $dummy_array = mysqli_fetch_array($query);
                            if($dummy_array > 0){
                                echo $dummy_array['name'];
                            }else{
                                echo "Not Found";
                            } ?>
                        </h3>
                    </div>
                </section>
                <section style="max-height:1000px;">
                    <div class="triangle-decor"></div>
                    <div class="container">
                    <div class="section-title">
                        <h3>Order Details</h3>
                        <div class="separator color-separator"></div>
                    </div>
                        <table class="table table-border rounded-3 checkout-table" style="box-shadow: 0 .5rem 1rem rgb(197 157 95)!important; max-width: 1050px; float: none; margin: auto;">
                            <tbody style="padding:50px 0px;height: 450px;overflow: auto;">
                                <tr>
                                    <th class="cart_table_desc">ID</th>
                                    <th class="cart_table_desc">Customer Name</th>
                                    <th class="cart_table_desc">Total Amount</th>
                                    <th class="cart_table_desc">Type</th>
                                    <th class="cart_table_desc">Date</th>
                                    <th class="cart_table_desc">Time</th>
                                    <th class="cart_table_desc">Details</th>
                                    <?php
                                        if($_SESSION['admin_active'] == True){
                                        $response = '';
                                        while ($order_details_query = mysqli_fetch_array($order_details)){
                                        $user_id = $order_details_query['user_id'];
                                        $user_details = mysqli_query($spizy_db_con,"SELECT * FROM user_data WHERE id = '$user_id'");
                                        $user_details_query = mysqli_fetch_array($user_details); 
                                        $response .= 
                                        '<tr>
                                            <td>
                                                <h5 class="product-name">'.$order_details_query['id'].'</h5>
                                            </td>
                                            <td>
                                                <h5 class="product-name">'.$user_details_query['name'].'</h5>
                                            </td>
                                            <td>
                                                <h5 class="order-money">&#8377; '.$order_details_query['total_amount'].'</h5>
                                            </td>
                                            <td>
                                                <h5 class="product-name">'.$order_details_query['type'].'</h5>
                                            </td>
                                            <td>
                                            <h5 class="order-quantity">'.$order_details_query['date'].'</h5>
                                            </td>
                                            <td>
                                            <h5 class="order-quantity">'.$order_details_query['time'].'</h5>
                                            </td>
                                            <td class="pr-remove">
                                            <button class="btn add-to-cart-button-sm" onclick="view_order_details('.$order_details_query['id'].')" style="padding: 8px;margin-left: 0px;height: 30px;font-size: 11px;"><i class="fas fa-info-circle"></i></button>
                                        </td>
                                        </tr>';
                                        } 
                                        echo $response;
                                    }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <div class="bold-separator">
                    <span></span>
                </div>
                <section style="max-height:1000px;">
                    <div class="triangle-decor"></div>
                    <div class="container">
                    <div class="section-title">
                        <h3>Payment Details</h3>
                        <div class="separator color-separator"></div>
                    </div>
                        <table class="table table-border rounded-3 checkout-table" style="box-shadow: 0 .5rem 1rem rgb(197 157 95)!important; max-width: 1050px; float: none; margin: auto;">
                            <tbody style="padding:50px 0px;height: 450px;overflow: auto;">
                                <tr>
                                    <th class="cart_table_desc">ID</th>
                                        <th class="cart_table_desc">Order ID</th>
                                        <th class="cart_table_desc">First Name</th>
                                        <th class="cart_table_desc">Last Name</th>
                                        <th class="cart_table_desc">Card Number</th>
                                        <th class="cart_table_desc">Total Amount</th>
                                        <th class="cart_table_desc">Date</th>
                                        <th class="cart_table_desc">Time</th>
                                        <?php
                                            if($_SESSION['admin_active'] == True){
                                            $response = '';
                                            while ($payment_details_query = mysqli_fetch_array($payment_details)){
                                            $response .= 
                                            '<tr>
                                                <td>
                                                    <h5 class="product-name">'.$payment_details_query['id'].'</h5>
                                                </td>
                                                <td>
                                                    <h5 class="product-name">'.$payment_details_query['order_id'].'</h5>
                                                </td>
                                                <td>
                                                    <h5 class="product-name">'.$payment_details_query['fname'].'</h5>
                                                </td>
                                                <td>
                                                    <h5 class="product-name">'.$payment_details_query['lname'].'</h5>
                                                </td>
                                                <td>
                                                    <h5 class="order-money">'.$payment_details_query['cnum'].'</h5>
                                                </td>
                                                <td>
                                                    <h5 class="order-money">&#8377; '.$payment_details_query['total_amount'].'</h5>
                                                </td>
                                                <td>
                                                <h5 class="order-quantity">'.$payment_details_query['date'].'</h5>
                                                </td>
                                                <td>
                                                <h5 class="order-quantity">'.$payment_details_query['time'].'</h5>
                                                </td>
                                            </tr>';
                                            } 
                                            echo $response;
                                        }
                                    ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <!-- wrapper end -->
    </div>
    <!-- Main end -->
    <!--=============== scripts  ===============-->
    <script type="text/javascript" src="../js/plugins.js"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
</body>
<script>
    $('document').ready(function () {
        setTimeout(() => {
            pload();
        }, 2000);

        $('#login_button').on("click", function () {
            var login_email = $('.login_email').val();
            var login_password = $('.login_password').val();
            if (login_email != '' && login_password != '') {
                var ajax_request = true;
                var login_admin = true;
                $.ajax({
                    url: '../ajax_files/login-register/operations.php',
                    type: 'POST',
                    data: {
                        ajax_request: ajax_request,
                        login_admin: login_admin,
                        login_email: login_email,
                        login_password: login_password,
                    },
                    beforeSend: function () {
                        $('#user_login_register_modal').css("opacity", 0);
                        ajax_start();
                    },
                    complete: function () {
                        ajax_complete();
                    },
                    success: function (response) {
                        $("#user_login_register_modal").modal("hide");
                        $('#main').append(response);
                        window.open('index.php', '_parent');
                    }
                })
            }
        })

        var check_admin_state = '<?php echo $admin_active ?>';
        if (check_admin_state == "True") {
            var state = true;
        } else {
            setTimeout(() => {
                $('#user_login_register_modal').modal('show');
            }, 2500);
        }
    })
</script>

</html>