<?php 
include 'db_conn.php';
$output="";
$searchTerm = mysqli_real_escape_string($conn,$_POST['searchTerm']);

$query = mysqli_query($conn, "SELECT * FROM user_info WHERE fname LIKE '%$searchTerm%' OR lname LIKE '%$searchTerm%'");
if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_assoc($query)){
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


}else{
    $output.="User Not Found";
}
echo $output;



?>