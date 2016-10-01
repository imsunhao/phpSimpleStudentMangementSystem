<?php 
    class SqlHelper {
        public $conn;
        public $dbname="stuadminsystem";
        public $username="root";
        public $password="";
        public $host="localhost";
        public function __construct(){
        //注意，构造函数这里是两个下划线
            $this->conn=mysql_connect($this->host,$this->username,$this->password);
            if(!$this->conn){
                die("连接失败".mysql_error());
            }
            mysql_select_db("$this->dbname");
        }
        //执行dql语句
        public function execute_sql($sql){
            $res=mysql_query($sql) or die("fuck!".mysql_error());
            return $res;
        }
        //执行dml语句
        public function execute_dml($sql){
            $b=mysql_query($sql,$this->conn);
            if(!$b){
                return 0;
            }else{
                if(mysql_affected_rows($this->conn>0)){
                    return 1;
                }else{
                    return 2;
                }
            }
        }
        //关闭连接的方法
        public function close_connect(){
            if(!empty($this->conn))$this->conn;
        }
        
        public function execute_dql2($sql){
	        $arr=array();
	        $i=0;
	        $res=mysql_query($sql,$this->conn) or die (mysql_error());
	        while($row=mysql_fetch_assoc($res)){
	            $arr[$i++]=$row;
	        }
	        return $arr;
	        mysql_free_result($res);
	    }
    }
?>
