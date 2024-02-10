<?php
include('header.php');
?>
        <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="home-v1.html">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>My Account
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="customer-login-form">
                                                <span class="or-text">or</span>
                                                <div id="customer_login" class="u-columns col2-set">
                                                    <div class="u-column1 col-1">
                                                        <h2>Register</h2>
                                                        <form class="register" id="customer_register" name="register" method="post">
                                                            <p class="before-register-text reg_mob_row">
                                                                Create new account today to reap the benefits of a personalized shopping experience.
                                                            </p>
                                                            <p class="form-row form-row-wide reg_mob_row">
                                                                <label for="reg_email">Mobile No
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="text" value="" id="reg_mobile" autocomplete="off" name="mobileno" class="woocommerce-Input woocommerce-Input--text input-text">
                                                            </p>
                                                            <p class="form-row reg_mobile_error reg_mob_row">
                                                            </p>
                                                            <p class="form-row form-row-wide reg_mob_row">
                                                                <label for="reg_pass">Password
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="password" value="" id="reg_password" name="password" class="woocommerce-Input woocommerce-Input--text input-text">
                                                            </p>
                                                            <p class="form-row reg_mobilep_error reg_mob_row">
                                                            </p>
                                                            <p class="form-row reg_mob_row">
                                                                <input type="submit" class="woocommerce-Button button" name="register" value="Get Otp" />
                                                            </p>
                                                            <div class="register-benefits reg_mob_row">
                                                                <h3>Sign up today and you will be able to :</h3>
                                                                <ul>
                                                                    <li>Speed your way through checkout</li>
                                                                    <li>Track your orders easily</li>
                                                                    <li>Keep a record of all your purchases</li>
                                                                </ul>
                                                            </div>
                                                        </form>
                                                        <form id="customer_register_otp" class="reg_otp_row" style="display: none;">
                                                            <p class="form-row form-row-wide reg_otp_row">
                                                                <label for="reg_otp">OTP</label>
                                                                <input type="text" value="" id="reg_mobile_otp" name="mobileno" class="woocommerce-Input woocommerce-Input--text input-text">
                                                                <input type="hidden" id="reg_mobileotp">
                                                            </p>
                                                            <p class="form-row reg_mobileotp_error reg_otp_row">
                                                            </p>
                                                            <p class="form-row reg_otp_row">
                                                                <input type="submit" class="woocommerce-Button button" name="register" value="Register" />
                                                            </p>
                                                        </form>
                                                        <!-- .register -->
                                                    </div>
                                                    <div class="u-column2 col-2">
                                                        <h2>Login</h2>
                                                        <form method="post" id="customer_mob_login" class="woocomerce-form woocommerce-form-login customer_mob_login login">
                                                            <p class="form-row form-row-wide">
                                                                <label for="username">Mobile No
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="text" class="input-text" name="username" id="login_mobile" value="" />
                                                            </p>
                                                            <p class="form-row form-row-wide login_mobile_error login_mob_row">
                                                            </p>
                                                            <p class="form-row form-row-wide">
                                                                <label for="password">Password
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input class="input-text" type="password" name="password" id="login_password" />
                                                            </p>
                                                            <p class="form-row form-row-wide login_mobilep_error login_mob_row">
                                                            </p>
                                                            <p class="form-row">
                                                                <input class="woocommerce-Button button" type="submit" value="Login" name="login">
                                                                <label for="rememberme" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me
                                                                </label>
                                                            </p>
                                                            <p class="woocommerce-LostPassword lost_password">
                                                                <a href="#">Lost your password?</a>
                                                            </p>
                                                        </form>
                                                        <!-- .woocommerce-form-login -->
                                                    </div>
                                                    <!-- .col-1 -->
                                                    
                                                    <!-- .col-2 -->
                                                </div>
                                                <!-- .col2-set -->
                                            </div>
                                            <!-- .customer-login-form -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                                <!-- .hentry -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>
<?php
include('footer.php');
?>
<script>
$('#customer_register').submit(function(e){
    e.preventDefault();
    if(!$('#reg_mobile').val().match('[0-9]{10}'))  {
        $('#reg_mobile').focus().val('');
        $('.reg_mobile_error').html('<span class="text-danger">Mobile No is Invalid</span>');
        return;
    }else{
        if((!$('#reg_password').val())){
            $('#reg_password').focus().val('');
            $('.reg_mobilep_error').html('<span class="text-danger">Enter Password</span>');
            return;  
        }else{
            mobile = $('#reg_mobile').val();
            password = $('#reg_password').val();
            $('.reg_mobile_error').html('');
            var data = { "type" : "1", "regMobile" : mobile, "regpassword" : password, "sessionId" : "<?PHP if(isset($_GET["sessionId"])){ echo $_GET["sessionId"]; } ?>"};
            $.ajax({
                type: "POST",
                url: 'calls/regMobile.php',
                data: data,
                success: function(data){
                    if(data == 1){
                        $('#reg_mobileotp').val(mobile);
                        $('.reg_mob_row').hide();
                        $('.reg_otp_row').show();
                    }
                    if(data == 2){
                        $('.reg_mobile_error').html('<span class="text-danger">Mobile No is Already Registerd. Please Login!</span>');            
                    }
                }
            });
        }
    }
});

$('#customer_register_otp').submit(function(e){
    e.preventDefault();
    if(!$('#reg_mobile_otp').val().match('[0-9]{4}')){
        $('#reg_mobile_otp').focus().val('');
        $('.reg_mobile_error').html('<span class="text-danger">Enter 4 Digit Valid OTP</span>');
        return;
    }else{
        $('.reg_mobile_error').html('');
        mobile_otp = $('#reg_mobile_otp').val();
        mobileotp = $('#reg_mobileotp').val();
        var data = { "type" : "2", "mobile_otp" : mobile_otp, "regMobile" : mobileotp, "sessionId" : "<?PHP if(isset($_GET["sessionId"])){ echo $_GET["sessionId"]; } ?>"};
        $.ajax({
            type: "POST",
            url: 'calls/regMobile.php',
            data: data,
            success: function(data){
                if(data == 1){
                    $('.reg_mobileotp_error').html('<span class="text-success">Please wait Redirecting...</span>');
                    <?PHP   if(isset($_GET["refPage"])){
                                $location = $_GET["refPage"];
                            }else{
                                $location = "myaccount.php";
                            }
                            echo "location.replace('".$location."');";
                    ?>
                }
                if(data == 2){
                    $('.reg_mobileotp_error').html('<span class="text-danger">Invalid OTP</span>');
                }
            }
        });
    }
});

$('#customer_mob_login').submit(function(e){
    e.preventDefault();
    if(!$('#login_mobile').val().match('[0-9]{10}'))  {
        $('#login_mobile').focus().val('');
        $('.login_mobile_error').html('<span class="text-danger">Mobile No is Invalid</span>');
        return;
    }else{
        if((!$('#login_password').val())){
            $('#login_password').focus().val('');
            $('.login_mobilep_error').html('<span class="text-danger">Enter Password</span>');
            return;  
        }else{
            mobile = $('#login_mobile').val();
            password = $('#login_password').val();
            $('.login_mobile_error').html('');
            var data = { "type" : "1", "loginMobile" : mobile, "loginpassword" : password, "sessionId" : "<?PHP if(isset($_GET["sessionId"])){ echo $_GET["sessionId"]; } ?>"};
            $.ajax({
                type: "POST",
                url: 'calls/loginMobile.php',
                data: data,
                success: function(data){
                    if(data == 1){
                        $('#login_mobile').val('').focus();
                        $('#login_password').val('');
                        $('.login_mobile_error').html('<span class="text-danger">Invalid Account Details</span>');
                    }
                    if(data == 2){
                        $('.reg_mobileotp_error').html('<span class="text-success">Please wait Redirecting...</span>');
                    <?PHP   if(isset($_GET["refPage"])){
                                $location = $_GET["refPage"];
                            }else{
                                $location = "myaccount.php";
                            }
                            echo "location.replace('".$location."');";
                    ?>       
                    }
                }
            });
        }
    }
});
</script>