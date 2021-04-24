<?php 
    session_start();
    $output="";
    $logged_in_user_id = $_SESSION['id'];
    include 'db_conn.php';
    $select_users_query=("SELECT * FROM user_info WHERE NOT id=$logged_in_user_id");
    $select_users_query_res = mysqli_query($conn,$select_users_query);

    if(mysqli_num_rows($select_users_query_res)==1){
        echo "No user data found";
    }elseif(mysqli_num_rows($select_users_query_res)>0){
        while($row=mysqli_fetch_assoc($select_users_query_res)){
            $row_id = $row['id'];            
            $last_message_query = "SELECT * FROM messages WHERE 
            incoming_msg_id= '$row_id' OR 
            outgoing_msg_id='$row_id' AND 
            (incoming_msg_id='$logged_in_user_id' OR 
            incoming_msg_id='$logged_in_user_id') 
            ORDER BY id desc LIMIT 1";

            $last_message_query_exec = mysqli_query($conn,$last_message_query);
            $last_message_query_exec_result = mysqli_fetch_assoc($last_message_query_exec);            
            if(mysqli_num_rows($last_message_query_exec)==0){
                $last_msg_to_show = "No Message Available";
            }else{
                if(strlen($last_message_query_exec_result['message']) > 28){
                    $last_msg_to_show = substr($last_message_query_exec_result['message'], 0, 28).'...';
                    
                }else{
                    $last_msg_to_show = $last_message_query_exec_result['message'];
                }
            }
                
            ($logged_in_user_id = $row_id) ? $you = "You: " : $you ="";
            if($row['a_status'] == "Active Now"){
                 $status='-active-s';
            }else{
                $status="-off";
            } 
            
            

            $output.='<a href="chat_area.php?userid='.$row['id'].'" class="user-child">
                    <img class="own-img" src="img/user_images/'.$row['image'].'">
                    <div class="name_status">
                        <span class="own-name">'.$row['fname'].' '.$row['lname'].'</span>
                        <span class="own-status user-one-mesans">'.$you.$last_msg_to_show.'</span>
                    </div>   
                    <div class="users-status'.$status.'">
                        <i class="fa fa-circle"></i>
                    </div>     
                    </a>';
        }
    }
    echo $output;
?>