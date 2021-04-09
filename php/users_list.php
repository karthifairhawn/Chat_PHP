<?php 
    session_start();
    $output="";
    include 'db_conn.php';
    $select_users_query=("SELECT * FROM user_info WHERE 1=1");
    $select_users_query_res = mysqli_query($conn,$select_users_query);
    if(mysqli_num_rows($select_users_query_res)==1){
        echo "No user data found";
    }elseif(mysqli_num_rows($select_users_query_res)>0){
        while($row=mysqli_fetch_assoc($select_users_query_res)){
            $output.='<a href="#" class="user-child">
                    <img class="own-img" src="img/user_images/'.$row['image'].'">
                    <div class="name_status">
                        <span class="own-name">'.$row['fname'].' '.$row['lname'].'</span>
                        <span class="own-status user-one-mesans">The Message was send.</span>
                    </div>   
                    <div class="users-status">
                        <i class="fas fa-circle"></i>
                    </div>     
                    </a>';
        }
    }
    echo $output;

    








?>