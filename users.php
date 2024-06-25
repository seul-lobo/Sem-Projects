<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: signIn.php");
    }
?>


<?php include_once "header.php";?>

<html>
    <head>
        <style>
            /* Cookies Styles */

            .cookie_box{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 400px;
                padding: 20px;
                text-align: center;
                background: #fff;
                border-radius: 20px;
                box-shadow: 0 0 15px rgba(0,0,0,0.3);
            }

            .cookie_box.hide{
                display: none;
            }

            .cookie_box img{
                width: 70px;
                display: inline-block;
                vertical-align: middle;
                margin-right: 30px;
            } 

            .cookie_box h3{
                display: inline-block;
                vertical-align: middle;
                margin: 0;
                font-size: 30px;
            }

            .cookie_box p{
                font-size: 15px;
            }

            .cookie_box button{
                padding: 8px 25px;
                background: #027cb7;
                color: #fff;
                font-size: 18px;
                border: 0;
                outline: 0;
                cursor: pointer;
            }

            .cookie_box button:focus{
                background: #054d6f;
            }
        </style>
    </head>
<body>
    <!-- Cookies code  -->
    <div class="cookie_box" id="cookie_box">
        <img src="cookie.png" alt="">
        <h3>Cookie Policy</h3>
        <p>This website can store cookies on your browser and disclose information 
            in accordance with our cookie policy. <a href="#">Learn More </a>
        </p>
        
        <button id="activeBtn">Accept</button>
    </div>
    <div class="wrapper">
        <section class="users">
            <header>
            <?php 
                include_once "php-backend/config.php";
                $sql=mysqli_query($conn , "SELECT * FROM users WHERE unique_id={$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
                <div class="content">
                    <img src="php-backend/images/<?php echo $row['img'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname']." ".$row['lname'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="php-backend/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">LogOut</a>
            </header>
            <div class="search">
                <span class="text">Search a user</span>
                <input type="text" placeholder="Enter a name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list"></div>    
        </section>
    </div>

    <script src="javascript/users-search.js"></script>
    <script src="javascript/cookie.js"></script>
</body>
</html>