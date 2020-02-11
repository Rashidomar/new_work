
<?php
    #require_once "../../includes/database.php";
    require_once "includes/user.php";
    require_once "includes/sessions.php";

    $user = new User();
    $session = new Session();

    if(isset($_POST['LogIn']))
	{
        
		$username = $_POST['username'];
        $password = $_POST['password'];
        
        $found_user = $user->user_authenticate($username, $password);

        if($found_user){

            foreach ($found_user as $user_detail) 
            {
                $user_detail['id'];
                $user_detail['username'];
    
            }
    
            $user_id = $user_detail['id'];
    
            $username = $user_detail['username'];
    

            $session_values = $session->create_session($user_id, $username);

            if($session_values['id'] && $session_values['username']){
                
                header('Location: index.php');	
            }

        }else{
            echo "Wrong Username and password";
        }

	}


?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<!-- Mirrored from demo.themenio.com/tokenwiz/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Feb 2019 16:49:18 GMT -->

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
                <h2 class="page-ath-heading">Sign in <small>with your TokenWiz Account</small></h2>
                <form action="" method="POST">
                    <div class="input-item">
                        <input type="text" name="username" placeholder="Your Username" class="input-bordered">
                    </div>
                    <div class="input-item">
                        <input type="password" name="password" placeholder="Password" class="input-bordered">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="input-item text-left">
                            <input class="input-checkbox input-checkbox-md" id="remember-me" type="checkbox">
                            <label for="remember-me">Remember Me</label>
                        </div>
                        <div><a href="forgot.html">Forgot password?</a>
                            <div class="gaps-2x"></div>
                        </div>
                    </div>
                    <input type="submit" name="LogIn" value="Sign In" class="btn btn-primary btn-block">
                    <!-- <input type="submit" value="Log In" name="submit" > -->
                </form>
                <div class="sap-text"><span>Or Sign In With</span></div>
                <ul class="row guttar-20px guttar-vr-20px">
                    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-facebook btn-block"><em class="fab fa-facebook-f"></em><span>Facebook</span></a></li>
                    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-google btn-block"><em class="fab fa-google"></em><span>Google</span></a></li>
                </ul>
                <div class="gaps-2x"></div>
                <div class="gaps-2x"></div>
                <div class="form-note">Don’t have an account? <a href="sign-up.php"> <strong>Sign up here</strong></a></div>
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
    <script src="assets/js/script7500.js?ver=103"></script>
</body>
<!-- Mirrored from demo.themenio.com/tokenwiz/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Feb 2019 16:49:24 GMT -->

</html>