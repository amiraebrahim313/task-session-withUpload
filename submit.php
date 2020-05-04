<?php
require 'function.php';
require 'session.php';
clear();
//this page for checking if the data is enterd correctly or not 
$username=post('name');//call the name and password and... and store it in the varaible to use it easly
$email=post('email');
$password=post('password');
$confirm_password=post('confirm_password');
$checkbox=post('checkbox');
if(!$username){
    //if not user name or .... then  there is error then call function store error()to store the error
    // in the array
    store_error('name','name is required');
    
}
if (!$email){
    store_error('email','email is required');
}
if (!$password){
    store_error('password','password is required');
} 
$length=strlen($password);
if($length<8){
    store_error('password','minimum password is 8 char');
}
if ($confirm_password!= $password){
    store_error('confirm_password','confirm_password didnt match password');

}
if(!$confirm_password){
    store_error('confirm_password','confirm_password is required');
}



// upload imge
if(isset($_POST['submit'])){
    $file=$_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];
   
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array('jpg','jpeg','png','pdf');
    if(in_array($fileActualExt,$allowed)){
       if($fileError===0){
           if($fileSize<100000000){
             $fileNameNew=uniqid('',true).'.'.$fileActualExt;
             $fileDestination='uploads/'. $fileNameNew;
             move_uploaded_file($fileTmpName, $fileDestination);
             header("location:register.php?uploadsucsess");
           }else{
               echo "your file is too big!";
           }
       }else{
           echo "There was an error uploading you file";
       }
    }else{
        echo "you cant upload files of this type!";
    }
}



// if(isset($_POST['upload'])){
//   $file=  $_FILES['file'];
//   print_r($file);
// }



// $target_dir = "D:\xx\htdocs\task-session\upload";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }




//if there is error the function check error return true if there is error 
//and if there is error  we go to the page of register to enter the data again
if(check_error()){
    redirect_to('register.php');
}elseif($checkbox){
        require 'cookie.php';
    
}else {
    // if not any error ---> go to session to store the data of user 
    add('user',[
        'name'=>$username,
        'email'=>$email,
        'password'=>$password,
        // 'D:\xx\htdocs\task-session\upload',

    ]);
    //after we store in session we go to the page of index
    redirect_to('index.php');
}


