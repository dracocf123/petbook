<?php
include_once 'Database.php';
Class User extends Database{
      public function login($un,$pw){
            $sql = "select * from tbl_user where username='$un' and password='$pw'";
         $data = $this->conn->query($sql);
         return $data;
      }
      public function signup($fn, $ln, $un, $pw){
         $uid1 = uniqid();
         $uid2 = mt_rand(1000, 9999);
         $uid = strtoupper('U'.$uid1.'-'.$uid2);
         $sql = "insert into tbl_user_info values(NULL,'$uid','$fn','$ln','bday');";
         $sql.= "insert into tbl_user values(NULL,'$uid','$un','$pw','user')";
        if($this->conn->multi_query($sql)){
           return 'Sign Up Success!';
        }else{
           return $this->conn->error;
        }
   }
   }
?>