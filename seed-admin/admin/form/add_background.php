<?php 
session_start();
if (empty($_SESSION['this_user_id'])) {
   $_SESSION['errorLogin'] = "Access Denied!";
   header('location: login.php');
   exit();
} else {
   include '../classes/Crud.php';
   $crud = new Crud();
   date_default_timezone_set("Asia/Kolkata");
   $today = date("Y-m-d");
   $time = date("H:i:s");
   $sessionName =  $_SESSION['this_user_name'];
   $userType = $_SESSION['userType'];
   $userID = $_SESSION['this_user_id'];
}

if(isset($_POST['ajax'])){

    extract($_POST);

        $target_dir = "images/background/";
        $target_file1 = $target_dir . md5(time()).basename($_FILES["Image1"]["name"]);
        $target_file2 = $target_dir . md5(time()).basename($_FILES["Image2"]["name"]);
        $uploadOk = 1;
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
        
        $check1 = getimagesize($_FILES["Image1"]["tmp_name"]);
        $check2 = getimagesize($_FILES["Image2"]["tmp_name"]);
        if($check1 !== false && $check2!==false) {
            $uploadOk = 1;
        } else{
            $uploadOk = 0;
        } 
            // Allow certain file formats
        if(($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") || ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" ) ) {
         
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $data["errorMessage"]="something wrong with file.";
        // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["Image1"]["tmp_name"], "../".$target_file1) && move_uploaded_file($_FILES["Image2"]["tmp_name"], "../".$target_file2)) {

              // $_SESSION['message']= "The file ". basename( $_FILES["aboutImage"]["name"]). " has been uploaded.";
                $data = [
                    'image1' => $target_file1,
                    'image2' => $target_file2,
                    'head' =>$head,
                    'title' =>$title,
                    'description' =>$text,
                    'date_uploaded' =>$today,           
                ];
               
                    $create = $crud->Create($data,"background");

                    if($create) {
                        $data["successMessage"]="Data uploaded successfully.";
                    } else {
                        $data["errorMessage"]="Error uploading Data.";
                    }                                 

            } else {
                $data["errorMessage"]="file can't move to the folder.";
            }
        }

    echo json_encode($data);
    exit();
}
?>


