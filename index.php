<?php
session_start();
$error_data="";

if(isset($_POST['submit'])){
    include 'php/db_conn.php';
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    $query = "SELECT * FROM user_info WHERE email='$email' and pass='$password'";
    $query_1_res=mysqli_query($conn,$query);
    if($query_1_res){
        $query_1_res_ass = mysqli_fetch_assoc($query_1_res);
        if($query_1_res_ass>0){
            $_SESSION['id'] =  $query_1_res_ass['id'];   
            $set_active_query = "UPDATE user_info SET a_status='Active Now' WHERE id={$query_1_res_ass['id']}";
            mysqli_query($conn,$set_active_query);
            header("Location:users.php");
        }else{
            $error_data = "Email or Password Incorrect";            
        }
    }else{
        $error_data = "Database Error".mysqli_error($conn);
        echo $error_data;
    }
}



?>















<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="css/login.css">    
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


</head>


<body>
    <div class="wrapper">
        <form action="index.php" method="POST" class="form" enctype="multipart/form-data>
            <label class="header">Chat App</label>
            <hr>
            <div class="field error-message" id="error-msg">
                <label>Error Message</label>
            </div>
            <div class="field">
                <label class="field">Email</label>
                <input type="email" class="field" name="email" placeholder="Email" required>
            </div>

            <div class="field">
                <label class="field" >Password</label>                        
                <input type="password" class="field" id="pass" name="pass" placeholder="Password">
                <i class="far fa-eye" id="pass-hide"></i>
            </div>


            <div class="field submit">
                <input type="submit" name="submit" class="submit-btn" value="Chat Now!">
            </div>
            <hr>
            
            <div class="field login-now">
                Don't have an account ? <a href="create.php"> Create Now</a>
            </div>
        
        </form>
    </div>
    <script src="js/main.js"></script>
    <script>
        var error_data = '<?php echo $error_data ?>';
        const errorBox = document.getElementById("error-msg");
        console.log(error_data);
        if (error_data!=""){
            errorBox.style.display = "flex";
            errorBox.innerHTML = error_data;
        }

    </script>

</body>



</html>