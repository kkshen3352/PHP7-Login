<?php
require_once("db_connect.php");

$email=$_POST["email"];
$pas=$_POST["pas"];

// $email="lmccullough@beer.com";
// $pas=1234;

$sql="SELECT * FROM member WHERE email='$email'";
$result=$connect->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    if($pas==$row["pas"]){
        $userData=array(
            "email"=>$email
        );
        $_SESSION["user"]=$userData;
        $data=array(
            "status"=>1,
            "message"=>"登入成功",
        );
}else{
    $data=array(
        "status"=>0,
        "message"=>"密碼錯誤"
    );
}
    
}else{
    $data=array(
        "status"=>0,
        "meaasge"=>"帳號不存在"
    );
}
echo json_encode($data)

// $data=array(
//     "email"=>$email,
//     "pas"=>$pas
// );
// echo json_encode($data);
?>