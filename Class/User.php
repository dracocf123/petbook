<?php
include_once 'Database.php';
Class User extends Database{

// SELECT FUNCTION
   public function login($un, $pw){
      $sql = "select * from tbl_user where username='$un' and password='$pw'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function petdisplay($ptype){
      $sql = "select * from tbl_pet where pet_type='$ptype'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function petalldisplay(){
      $sql = "select * from tbl_pet ";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function userhomedisplay($uid){
      $sql = "select * from tbl_pet where user_id != '$uid'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function userinfo($uid){
      $sql = "select * from tbl_user_info where user_id = '$uid'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function dtp(){
      $sql = "select count(pet_id) as pidc,pet_type as ptc from tbl_pet group by pet_type";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function displayallstatus(){
      $sql = "select * from tbl_status";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function displaybreed($type){
      $sql = "select * from tbl_breed where pet_type='$type'";
      $data = $this->conn->query($sql);
      return $data;
   }

   public function petviewinfo($pid){
      $sql = "select * from tbl_pet where pet_id = '$pid'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function petadoptionrequest($uid){
      $sql = "select adoption_id, pet_id, status , first_name, last_name
      from tbl_adoption 
      inner join tbl_user_info 
      on tbl_adoption.adopter_user_id = tbl_user_info.user_id
      where tbl_adoption.adopter_user_id = '$uid'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function petforadoption($uid){
      $sql = "select adoption_id, pet_id, status , first_name, last_name
      from tbl_adoption 
      inner join tbl_user_info 
      on tbl_adoption.adopter_user_id = tbl_user_info.user_id
      where tbl_adoption.foster_user_id = '$uid' and status='Pending'";
      $data = $this->conn->query($sql);
      return $data;
   }

// INSERT FUNCTION
   public function signup($fn, $ln, $ad, $bday, $un, $pw){
      $uid1 = uniqid();
      $uid2 = mt_rand(1000, 9999);
      $uid = strtoupper('U'.$uid1.'-'.$uid2);
      $sql = "insert into tbl_user_info values(NULL,'$uid','$fn','$ln','$bday','$ad','');";
      $sql.= "insert into tbl_user values(NULL,'$uid','$un','$pw','user')";
     if($this->conn->multi_query($sql)){
        return 'Sign Up Success!';
     }else{
        return $this->conn->error;
     }
   }
   public function petreg($uid, $pname, $ptype, $breed, $pgender, $img, $des){
      $pid = strtoupper('PT00'.uniqid());
      $sql = "insert into tbl_pet values(NULL,'$pid','$uid','$pname','$ptype','$breed','$pgender','$img');";
      $sql.= "insert into tbl_pet_status values(NULL,'$pid','Pending','$des')";
      if($this->conn->multi_query($sql)){
         return 'Register Success!';
      }else{
         return $this->conn->error;
      }
   }
   public function adoptionrequest($fuid, $auid, $pid){
      $aid = strtoupper('ADPT'.uniqid());
      $sql = "insert into tbl_adoption values(NULL,'$aid','$fuid','$auid','$pid','Pending')";
      if($this->conn->query($sql)){
         return 'Request Sent! Please Wait for Approval';
      }else{
         return $this->conn->error;
      }
   }
   public function addbreeddog($breed,$type){
      $bid = strtoupper('BRD'.uniqid());
      $sql = "insert into tbl_breed values(NULL,'$bid','$type','$breed')";
      if($this->conn->query($sql)){
         return 'Breed Added!';
      }else{
         return $this->conn->error;
      }
   }
   public function addbreedcat($breed,$type){
      $bid = strtoupper('BRD'.uniqid());
      $sql = "insert into tbl_breed values(NULL,'$bid','$type','$breed')";
      if($this->conn->query($sql)){
         return 'Breed Added!';
      }else{
         return $this->conn->error;
      }
   }
   public function addstatus($stat){
      $sid = 'STS'.rand(1000,9999);
      $sql = "insert into tbl_status values(NULL,'$sid','$stat')";
      if($this->conn->query($sql)){
         return 'Status Added!';
      }else{
         return $this->conn->error;
      }
   }

// UPDATE FUNCTION
   public function updateimage($uid, $img){
      $sql = "update tbl_user_info set profile_image='$img' where user_id='$uid'";
     if($this->conn->query($sql)){
        return 'Upload Success!';
     }else{
        return $this->conn->error;
     }
   }  
   public function requestaccepted($aid){
      $sql = "update tbl_adoption set status='Adopted' where adoption_id='$aid'";
     if($this->conn->query($sql)){
        return 'Request Accepted!';
     }else{
        return $this->conn->error;
     }
   }  

// DELETE FUNCTION
   
   
   
  
   
}
?>