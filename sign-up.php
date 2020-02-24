
<?php
    #require_once "../../includes/database.php";
    require_once "includes/user.php";
    require_once "includes/sessions.php";

    $user = new User();

    $errors = array();

	if(isset($_POST['submit']))
	{
        
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $found = $user->check_user($username, $email);

        if($found->num_rows === 0)
        {
           $new_user = $user->user_register($fullname,$username, $email, $password);

           if($new_user)
           {
                header('Location: signup-success.php');
    
           }else{
    
                $errors[] = "Unsuccessful... Something went wrong.";
            }
        }else{
    
            $errors[] = "Username and Email already exist";
        }

	}

?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<!-- Mirrored from demo.themenio.com/tokenwiz/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Feb 2019 16:49:32 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fully featured and complete ICO Dashboard template for ICO backend management."><!-- Fav Icon -->
    <link rel="shortcut icon" href="images/favicon.png"><!-- Site Title  -->
    <title>TokenWiz - ICO User Dashboard Admin Template</title><!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="assets/css/vendor.bundle7500.css?ver=103">
    <link rel="stylesheet" href="assets/css/style7500.css?ver=103" id="layoutstyle">
    <!-- <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-91615293-2', 'auto');
        ga('send', 'pageview');
    </script> -->
</head>

<body class="page-ath">
    <div class="page-ath-wrap">
        <div class="page-ath-content">
            <div class="page-ath-header"><a href="index-2.html" class="page-ath-logo"><img src="images/logo.png" srcset="images/logo2x.png 2x" alt="logo"></a></div>
            <div class="page-ath-form">
                <h2 class="page-ath-heading">Sign up <small>Create New TokenWiz Account</small></h2>
                <form action="#" method="POST" id="SignUp_Form">
                    <div class="input-item">
                        <input type="text" placeholder="Full Name" name="fullname" class="input-bordered">
                    </div>
                    <div class="input-item">
                        <input type="text" placeholder="Username"  name="username" class="input-bordered">
                    </div>                   
                    <div class="input-item">
                        <input type="text" placeholder="Your Email" name="email"class="input-bordered">
                    </div>
                    <div class="input-item">
                        <input type="password" placeholder="Password" name="password" class="input-bordered">
                    </div>
                    <?php
                            if ($errors) {
                                foreach ($errors as $error) {
                                     echo "<div class='alert alert-primary' role='alert'>"
                                    .$error 
                                    ."</div>";
                                }
                            }
                        ?>
                    <input type="submit" name="submit" value="Create Account" class="btn btn-primary btn-block">
                </form>
                <div class="sap-text"><span>Or Sign Up With</span></div>
                <ul class="row guttar-20px guttar-vr-20px">
                    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-facebook btn-block"><em class="fab fa-facebook-f"></em><span>Facebook</span></a></li>
                    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-google btn-block"><em class="fab fa-google"></em><span>Google</span></a></li>
                </ul>
                <div class="gaps-2x"></div>
                <div class="gaps-2x"></div>
                <div class="form-note">Already have an account ? <a href="sign-in.php"> <strong>Sign in instead</strong></a></div>
            </div>
            <div class="page-ath-footer">
                <ul class="footer-links">
                    <li><a href="regular-page.html">Privacy Policy</a></li>
                    <li><a href="regular-page.html">Terms</a></li>
                    <li>&copy; 2018 TokenWiz.</li>
                </ul>
            </div>
        </div>
        <div class="page-ath-gfx">
            <div class="w-100 d-flex justify-content-center">
                <div class="col-md-8 col-xl-5"><img src="images/ath-gfx.png" alt="image"></div>
            </div>
        </div>
    </div><!-- JavaScript (include all script here) -->
    <script src="assets/js/jquery.bundle7500.js?ver=103"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/script7500.js?ver=103"></script>
</body>
<!-- Mirrored from demo.themenio.com/tokenwiz/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Feb 2019 16:49:32 GMT -->

</html>