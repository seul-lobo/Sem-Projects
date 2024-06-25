<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){  //if user is logged in
        header("location: users.php");
    }
?>

<?php include_once "header.php";?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chatting Web App</header>
            <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select Display Picture</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Happy Chatting!" name="submit">
                </div>
            </form>

            <div class="link">Already Signed Up with us? <a href="signIn.php">Sign In!</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
    
</body>
</html>