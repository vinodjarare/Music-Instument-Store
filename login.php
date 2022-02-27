<title>Login | Sign Up</title>
<style>
    .navigation {
        background-color: #222;
    }
</style>
<?php
    include 'includes/session.php';
    include 'includes/header.php';
?>
<body>
<?php include 'includes/navbar.php'; ?>    
<section class="login_container">
    <div class="login">
        <div class="login_header">
            <h3>My Account</h3>
        </div>
        <div class="login-page">
            <div class="signup-form">
            <div class="toggle-radio">
                <div><input type="radio" name="toggle-btn" id="login"><label for="login">Login</label></div>
                <div><input type="radio" name="toggle-btn" id="register"><label for="register">Register</label></div>
            </div>
                <form action="register.php" method="POST"  class="register-form">
                    
                    <?php 
                        if(isset($_SESSION['error'])) {
                            echo "<p class='error'>".$_SESSION['error']."</p>";
                        } 
                    ?>
                    <label for="fname">First Name (Required):</label>
                    <input type="text" name="fname" autofocus="autofocus" value="<?php echo (isset($_SESSION['fname'])) ? $_SESSION['fname'] : '' ?>" required >
                    <label for="lname">Last Name (Required):</label>
                    <input type="text" name="lname" value="<?php echo (isset($_SESSION['lname'])) ? $_SESSION['lname'] : '' ?>" required />
                    <label for="pnum">Mobile No. (1234567890) (Required):</label>
                    <input type="tel" name="pnum" value="<?php echo (isset($_SESSION['pnum'])) ? $_SESSION['pnum'] : '' ?>" required />
                    <label for="email">Email (Required):</label>
                    <input type="email" name="email" id="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required >
                    <label for="psswd">Password (Required):</label>
                    <input type="password" name="psswd" id="psswd" minlength="8" maxlength="24" required >
                    <p class="message">Minimum 8 character, with atleast 1 number and letter</p>
                    <label for="ver_passwd">Verify Password (Required):</label>
                    <input type="password" name="ver_passwd" id="ver_passwd" required >
                    <label for="captcha">Captcha (Required):</label>
                    <input type="text" name="captcha" required>
                    <div class="captcha">
                    <a href="login.php#/register"><img src="includes/captcha.php" alt="captcha"></a>
                    </div>
                    <p class="message">By creating an account, you agree to Instrumentals.com's <a href="#">Terms & Conditions </a>
                    and <a href="#">Privacy Policy.</a></p>
                    <button type="submit" name="signup">sign up</button>
                </form>
                
                <form action="./verify.php" method="POST" class="login-form active">
                
                <?php 
                    if(isset($_SESSION['error'])) {
                        echo "<p class='error'>".$_SESSION['error']."</p>";
                    } 
                ?>
                <label for="uname">Email (Required):</label>
                <input type="email" name="email" id="mail" required/>
                <label for="pswd">Password (Required):</label>
                <input type="password" name="pswd" id="pswd" required/>
                <button name="login" type="submit">login</button>
                <!-- <p class="message">Not registered? <a href="#">Create an account</a></p> -->
                </form>
            </div>
        </div>
    </div>
</section>
<a href="#header" class="goto_top scroll_link">
    <svg>
      <use xlink:href="./images/sprite.svg#icon-arrow-up"></use>
    </svg>
  </a>
<?php 
    include 'includes/newsletter.php'; 
    include 'includes/footer.php';
?>
</body>
<?php include 'includes/scripts.php'; ?>
<script src="libraries/js/index.js"></script>
<script>
    // Login Form
    // $('.message a').click(function(){
    //     $('.login-page form').animate({height: "toggle", opacity: "toggle"}, "slow");
    // });
    // $('.toggle-radio #login').click(function () {
    //     $('.login-page form').animate({height: "toggle", opacity: "toggle"}, "slow");
    // });
    const register = document.getElementById("register");
    const login = document.getElementById("login");
    const registerForm = document.querySelector(".register-form");
    const loginForm = document.querySelector(".login-form");

    if(window.location.href.indexOf("register") != -1) {
        $('.login-form').css("display", "none");
        $('.register-form').css("display", "block");
        register.checked = true;
    }
    else if(window.location.href.indexOf("login") != -1) {
        $('.register-form').css("display", "none");
        $('.login-form').css("display", "block");
        login.checked = true;
    }

    login.addEventListener("click", () => {
        $('.register-form').css("display", "none");
        $('.login-form').css("display", "block");
    });
    
    register.addEventListener("click", () => {
        $('.login-form').css("display", "none");
        $('.register-form').css("display", "block");
    });
</script>