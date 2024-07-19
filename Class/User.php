<?php
include_once 'Database.php';
Class User extends Database{
   public function login($un, $pw){
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
   public function petreg($uid, $pname, $ptype, $pgender, $img){
         $pid = strtoupper('PT00'.uniqid());
         $sql = "insert into tbl_pet values(NULL,'$pid','$uid','$pname','$ptype','$pgender','$img')";
        if($this->conn->query($sql)){
           return 'Register Success!';
        }else{
           return $this->conn->error;
        }
   }
   public function petdisplay($ptype){
      $sql = "select * from tbl_pet where pet_type='$ptype'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function petalldisplay(){
      $sql = "select * from tbl_pet";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function dtp(){
      $sql = "select count(pet_id) as pidc,pet_type as ptc from tbl_pet group by pet_type";
      $data = $this->conn->query($sql);
      return $data;
   }
}
?>