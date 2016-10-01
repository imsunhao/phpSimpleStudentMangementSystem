<?php 
require_once 'SqlHelper.class.php';
class AdminService{
    public function checkAdmin($id,$password){
        $sql="select name,password from admin where id=$id";
        //创建一个SqlHelper对象
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_sql($sql);
        if($row=mysql_fetch_assoc($res)){
            //比对密码
            if(md5($password)==$row['password']){
                return $row['name'];
            }
        }
        //释放资源
        mysql_free_result($free);
        //关闭连接
        $sqlHelper->close_connect();
        return false;
    }
}
?>