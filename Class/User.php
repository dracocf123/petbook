<?php
include_once 'Database.php';
Class User extends Database{
      public function login($un,$pw){
            $sql = "select * from tbl_user where username='$un' and password='$pw'";
         $data = $this->conn->query($sql);
         return $data;
      }
   }
?>