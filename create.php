<?php
    $error_data="";
    include "php/db_conn.php" ;
    $fname = $lname = $email = $pass = '';
    $random_id=rand(time(),1000000);
    $error=false;

   

    if(isset($_POST['s_name'])){
        echo $_POST['s_name'];
        if(empty($_POST['s_name'])){
            $error=true;            
        }else{
            $fname = mysqli_real_escape_string($conn,$_POST['s_name']);
        }
    }
    
    if(isset($_POST['lname'])){
        if(empty($_POST['lname'])){
            $error=true;
        }else{
            $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        }
    }

    if(isset($_POST['email'])){
        if(empty($_POST['email'])){
            $error=true;
        }else{
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $fetch_all_email = mysqli_query($conn,"SELECT * FROM user_info WHERE email = '$email'");
            if(mysqli_num_rows($fetch_all_email)>0){
                $error=true;
                $error_data = "Email Already Exist";
                
                
            }
        }
    }

    if(isset($_POST['pass'])){
        if(empty($_POST['pass'])){
            $error=true;
        }else{
            $pass = mysqli_real_escape_string($conn,$_POST['pass']);
        }
    }

    if(isset($_POST['submit'])){
        if(isset($_FILES['file'])){
            $img_name =  mysqli_real_escape_string($conn,$_FILES['file']['name']);
            $img_type =  mysqli_real_escape_string($conn,$_FILES['file']['type']);
            $img_temp_name =  mysqli_real_escape_string($conn,$_FILES['file']['tmp_name']);
            $img_explode =  explode(".",$img_name);
            $img_ext =  end($img_explode);
            

            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

            if(in_array($img_ext,$allowed_extensions)==True){
                $time = time();
                $new_img_name = $time.$img_name;
                move_uploaded_file($img_temp_name,"img/user_images/".$new_img_name);
            }else{
                $error_data=$error_data." "."Please upload 'jpg', 'jpeg', 'png' or 'gif'";
            }
        }else{
            $error_data="Please Select a file";
        }
    }

    if(isset($_POST['submit']) && $error==false){
        $query = "INSERT INTO user_info(id,fname,lname,email,pass,a_status,image) VALUES('$random_id','$fname','$lname','$email','$pass','active','$new_img_name')";
        if (mysqli_query($conn,$query)){
            $query_2 = mysqli_query($conn, "SELECT * FROM user_info WHERE email='$email'");
            $query_2_res = mysqli_fetch_assoc($query_2);
            if($query_2_res>0){
                $_SESSION['id'] =  $query_2_res['id'];   
                header("Location:users.php");
            }else{
            echo "Not Inserted";
           }
        }else{
            echo "Error"; 
        }
        
} 

?>












<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="css/login.css">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    

</head>


<body>
    <div class="wrapper">
        <form action="create.php" class="form" method="POST" enctype="multipart/form-data">
            <label class="header">Chat App</label>
            <hr>
            <div class="field error-message" id="error-msg">
               
            </div>
            <div class="name-field">
               
                <div class="field">
                    <label class="field ">First Name</label>            
                    <input type="text" name="s_name" id="s_name" class="field name-field-in" placeholder="First Name" required>
                </div>

                <div class="field">
                    <label class="field">Last Name</label>
                    <input type="text" id="lname" name="lname" class="field name-field-in" placeholder="Last Name" required>
                </div>
            </div>

            <div class="field">
                <label class="field">Email</label>
                <input type="email" id="email" class="field" name="email" placeholder="Email" required>
            </div>

            <div class="field">
                <label class="field">Password</label>                        
                <input id="pass" type="password" name="pass" class="field" name="pass" placeholder="Password" required>
                <i class="far fa-eye" id="pass-hide"></i>
                
            </div>

            <div class="field">
                <label class="field ">Select Image</label>    
                <input class="img" type="file" name="file" required>
            </div>
            <div class="field submit">
                <input type="submit" name="submit" id="submit" class="submit-btn" value="Chat Now!">
            </div>
            <hr>
            
            <div class="field login-now">
                Already have an account ? <a> Login Now</a>
            </div>
        
        </form>
    </div>
    <script src="js/main.js"></script>
    <script src="js/error-msg-create.js"></script>
    <script>
        var error = "<?php echo $error_data ?>";
        if (error!=""){
            errorBox.style.display = "flex";
            errorBox.innerHTML = error;
        }

    </script>
</body>


</html>