<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Online Test | Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
        type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url(); ?>assets/admin/pages/css/login.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"
        id="style_color" />
    <link href="<?php echo base_url(); ?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<style>
    .eye_icon {
        position: absolute;
        right: 15px;
        top: 64%;
        transform: translateY(-116%);
        cursor: pointer;
        width: 14px;
        height: 9px;
    }

    .popup-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #f44336;
        /* Red */
        color: white;
        padding: 15px 25px;
        border-radius: 8px;
        z-index: 9999;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        font-weight: bold;
        font-family: Arial, sans-serif;
        animation: fadeInOut 3s ease-in-out forwards;
    }

    @keyframes fadeInOut {
        0% {
            opacity: 0;
        }

        10% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }
</style>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="login">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="menu-toggler sidebar-toggler">
    </div>
    <!-- END SIDEBAR TOGGLER BUTTON -->

    <!-- BEGIN LOGIN -->
    <div class="form-body">
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form action="<?php echo base_url('intern_login'); ?>" method="post" class="login-form">
                <div class="page-logo">
                    <div class="">
                        <a href="<?php ?>"><img src="<?php echo base_url(); ?>images/moon_logo.png" alt="logo"
                                class="logo-default" style="margin: 0px; height:55px;"></a>
                    </div>

                </div>
                <h3 class="form-title" style="color: #953735 !important;">Intern Login</h3>
                <input type="hidden" name="key" id="keyValue"
                    value="<?php echo isset($key_string) ? $key_string : 'null'; ?>" />
                <input type="hidden" name="user_role" id="user_role" value="4" />
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <span><?php echo $this->session->flashdata('error'); ?></span>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label>Login Id</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control" type="text" name="username" placeholder="Enter Your Login ID"
                            id="useremail" autocomplete="on" required />
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-icon pass">
                        <i class="fa fa-lock"></i>
                        <input class="form-control pass" type="password" name="password"
                            placeholder="Enter Your Password" id="userpass" autocomplete="on" required />
                        <img src="./images/eye-close.png" class="eye_icon" id="togglePassword">
                    </div>
                </div>

                <div class="form-actions" style="text-align:right;">
                    <button type="submit" class="btn btn-success uppercase">Login</button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <div class="copyright" style="color: black !important;">
                Do you have an account?
                <a href="<?= base_url('register_now') ?>" style="color: blue; text-decoration: underline;">Register
                    Now</a>
            </div>

        </div>
        <div class="copyright" style="color: black !important;">
            © 2025 Moonsez and Management Consultants LLP. All rights reserved.
        </div>
    </div>
    <div class="alert alert-danger alert-wrong-user" style="display:none;"></div>


    <!-- END LOGIN -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
        type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/jquery.crypt.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function () {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Login.init();
            Demo.init();
        });
    </script>
    <script>
        document.getElementById("togglePassword").addEventListener("click", function () {
            var passwordField = document.getElementById("userpass");
            var eyeIcon = document.getElementById("togglePassword");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.src = "./images/vector.png";  // Open eye image
            } else {
                passwordField.type = "password";
                eyeIcon.src = "./images/eye-close.png"; // Closed eye image
            }
        });
    </script>

    <script>
        document.querySelector('.login-form').addEventListener('submit', function (event) {
            var username = document.getElementById('useremail').value.trim();
            var password = document.getElementById('userpass').value.trim();

            if (username === '' || password === '') {
                alert('Enter Login ID and Password');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>

    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>