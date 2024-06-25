<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){  //if user is logged in
        header("location: users.php");
    }
?>

<?php include_once "header.php";?>
<body>
    <div class="wrapper">
        <section class="form signin">
            <header>Realtime Chatting Web App</header>
            <form action="#">
                <div class="error-txt"></div>
                
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Happy Chatting!">
                </div>
            </form>

            <div class="link">Not yet Signed Up? <a href="index.php">Sign Up!</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signin.js"></script>
    
</body>
</html>