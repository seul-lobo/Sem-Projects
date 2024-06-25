<?php 
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //checking email
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){   //if email is valid
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            //if email alreafy exists in db
            if(mysqli_num_rows($sql) > 0){
                echo "$email - Already taken!";
            }
            else{
                //file upload check
                if(isset($_FILES['image'])){ //if file uploaded
                    $img_name = $_FILES['image']['name'];   //getting img name
                    $img_type = $_FILES['image']['type'];   //getting img type
                    $tmp_name = $_FILES['image']['tmp_name'];   //used to save file in our folder

                    //exploding img to get extension
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);   //we get extension here
                    
                    $extentions = ['png' , 'jpeg' , 'jpg']; //valid exts
                    if(in_array($img_ext,$extentions) === true){    //if ext match
                        $time = time(); //for unique img file names

                        //moving uploaded file to our folder - actual file is saved here
                        //I don't upload uploaded file in db I just save url 
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"images/".$new_img_name)){  //if user upload img, move to my folder
                            $status = "Active Now"; //once user signed up
                            $random_id = rand(time(),10000000); //creating random id for users

                            //inserting data in db
                            $sql2 = mysqli_query($conn , "INSERT INTO users (unique_id,fname,lname,email,password,img,status)
                                VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                            if($sql2){  //if data inserted ok
                                $sql3 = mysqli_query($conn , "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }
                            else{
                                echo "Something went wrong!";
                            }
                        }  
                    }
                    else{
                        echo "Please select an Image file! - png,jpeg,jpg";
                    }
                }
                else{
                    echo "Please select an Image file!";
                }
            }
        }
        else{
            echo "$email - This is not a valid email!";
        }
    }
    else{
        echo "All input fields are required!";
    }
?>