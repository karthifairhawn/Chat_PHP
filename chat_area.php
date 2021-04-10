<?php 
session_start();

include 'php/db_conn.php';
if(!isset($_GET['userid'])){
    header('Location:index.php');
}else{
    $userid = mysqli_real_escape_string($conn,$_GET['userid']);
    $fetch_user_details = mysqli_query($conn,"SELECT * FROM user_info WHERE id='$userid'");
    $fetch_user_details_res= mysqli_fetch_assoc($fetch_user_details);
    
}
?>
















<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="css/chat_area.css">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">



</head>
<body>
    <div class="wrapper">
        
            <div class="header">
                <a href="users.php"><i class="fas fa-arrow-left	"></i></a>
                <img class="own-img" src="img/user_images/<?php echo $fetch_user_details_res['image']?>">
                <div class="name_status">
                    <span class="own-name"><?php echo $fetch_user_details_res['fname']?></span>
                    <span class="own-status"><?php echo $fetch_user_details_res['a_status']?></span>
                </div>                                
            </div>
            
            <!-- Chat Area -->
            <div class="chat-box">
                <div class="chat-outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                    </div>
                </div>
                
            </div>

            <form id="msg-form" autocomplete=off>
            
                <div class="send-msg-area">                    
                    <input name="outgoing_id" id="outgoing_id" type="text" value="<?php echo $_SESSION['id']?>" hidden>
                    <input name="incoming_id"  id="incoming_id" type="text" value="<?php echo $userid?>" hidden>
                    <input name="message" type="text" id="send-msg" class="send-msg" placeholder="Enter text to send">
                    <button name="submit" type="submit" id="send-msg-btn" class="send-msg-btn"><i class="fab fa-telegram"></i></button>
                    </div>
                </div>
            </form>
            
            <!-- Chat Area End-->
            
            
            <script src="js/chat.js"></script>
            <script src="js/update_chat.js"></script>
    </div>
    
</body>


</html>