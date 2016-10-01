<?php
require_once 'AddminService.class.php';
$id=$_POST['id'];
$password=$_POST['password'];
$adminService=new AdminService();
$name=$adminService->checkAdmin($id,$password);
if($name!=""){  //合法
    header("Location:stuManager.php?name=$name");
    exit();
}else{  //非法
    header("Location:login.php?errnum=1");
    exit();
}
?>