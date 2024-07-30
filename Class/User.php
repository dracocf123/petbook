<?php
include_once 'Database.php';
Class User extends Database{

// SELECT FUNCTION
   public function login($un, $pw){
      $sql = "select * from tbl_user where username='$un' and password='$pw'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function displaytable1(){
      $sql = "select * from tbl_pet_status";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function displaytable2($stat){
      $sql = "select * from tbl_pet_status where status='$stat'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function displayforshelterpet(){
      $sql = "SELECT * FROM tbl_pet_status WHERE date_reg <= DATE_SUB(CURDATE(), INTERVAL 7 DAY) and status = 'Inviewing'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function petdisplay($ptype){
      $sql = "select tbl_pet.pet_id, tbl_pet.pet_image, tbl_pet.pet_gender, tbl_pet.pet_name 
      from tbl_pet inner join
      tbl_pet_status on tbl_pet.pet_id = tbl_pet_status.pet_id
      where pet_type = '$ptype' and tbl_pet_status.status = 'Inviewing'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function petalldisplay(){
      $sql = "select tbl_pet.pet_id, tbl_pet.pet_image, tbl_pet.pet_gender, tbl_pet.pet_name, tbl_pet.pet_breed, tbl_pet.pet_type
      from tbl_pet inner join
      tbl_pet_status on tbl_pet.pet_id = tbl_pet_status.pet_id
      where tbl_pet_status.status = 'Inviewing'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function petdisplaytouser($uid){
      $sql = "select tbl_pet.pet_id, tbl_pet.pet_image, tbl_pet.pet_gender, tbl_pet.pet_name, tbl_pet.pet_breed, tbl_pet.pet_type
      from tbl_pet 
      inner join tbl_pet_status on tbl_pet.pet_id = tbl_pet_status.pet_id
      where tbl_pet_status.status = 'Inviewing' and tbl_pet.user_id != '$uid'";
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
   public function dstatus(){
      $sql = "select count(pet_id) as pidc,status as pstat from tbl_pet_status group by status";
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
      $sql = "select * from tbl_pet
      inner join tbl_user_info
      on tbl_pet.user_id = tbl_user_info.user_id
      where pet_id = '$pid'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function mypetposted($uid){
      $sql = "select tbl_pet.pet_id,tbl_pet.pet_image,tbl_pet.pet_name,tbl_pet.pet_gender,tbl_pet.pet_breed,tbl_pet.pet_image 
      FROM tbl_pet 
        INNER JOIN tbl_pet_status ON tbl_pet.pet_id = tbl_pet_status.pet_id
        INNER JOIN tbl_user_info ON tbl_pet.user_id = tbl_user_info.user_id
        WHERE tbl_pet.user_id = '$uid' and tbl_pet_status.status = 'Inviewing'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function mypetpostedrequest($uid){
         $sql = "select tbl_pet.pet_id, tbl_pet.pet_name, tbl_pet.pet_image, tbl_user_info.first_name, tbl_user_info.last_name, tbl_user_info.birthday, tbl_user_info.gender, tbl_user_info.address, tbl_user_info.email, tbl_user_info.contact, tbl_user_info.profile_image, tbl_pet_status.status FROM tbl_pet 
         INNER JOIN tbl_pet_status ON tbl_pet.pet_id = tbl_pet_status.pet_id
         INNER JOIN tbl_adoption on tbl_adoption.foster_user_id = tbl_pet.user_id
         INNER JOIN tbl_user_info on tbl_adoption.adopter_user_id = tbl_user_info.user_id
         WHERE tbl_pet.user_id = '$uid' and tbl_pet_status.status = 'Coordinating' group by tbl_pet.pet_id";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function mypetpostedpickup($uid){
      $sql = "select tbl_pet.pet_id, tbl_pet.pet_name, tbl_pet.pet_image, tbl_user_info.first_name, tbl_user_info.last_name, tbl_user_info.birthday, tbl_user_info.gender, tbl_user_info.address, tbl_user_info.email, tbl_user_info.contact, tbl_user_info.profile_image, tbl_pet_status.status FROM tbl_pet 
        INNER JOIN tbl_pet_status ON tbl_pet.pet_id = tbl_pet_status.pet_id
        INNER JOIN tbl_adoption on tbl_adoption.foster_user_id = tbl_pet.user_id
        INNER JOIN tbl_user_info on tbl_adoption.adopter_user_id = tbl_user_info.user_id
        WHERE tbl_pet.user_id = '$uid' and tbl_pet_status.status = 'Pickup/Delivery' GROUP BY tbl_pet.pet_id";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function petadoptionrequest($uid){
      $sql = "select * from tbl_adoption 
      inner join tbl_user_info on tbl_adoption.foster_user_id = tbl_user_info.user_id
      inner join tbl_pet on tbl_pet.pet_id = tbl_adoption.pet_id
      where tbl_adoption.adopter_user_id = '$uid'";
      $data = $this->conn->query($sql);
      return $data;
   }

// INSERT FUNCTION
   public function signup($fn, $ln, $ad, $gen, $bday, $em, $cn, $un, $pw){
      $uid1 = uniqid();
      $uid2 = mt_rand(1000, 9999);
      $uid = strtoupper('U'.$uid1.'-'.$uid2);
      $sql = "insert into tbl_user_info values(NULL,'$uid','$fn','$ln','$bday','$gen','$ad','$em','$cn','user.png');";
      $sql.= "insert into tbl_user values(NULL,'$uid','$un','$pw','user')";
     if($this->conn->multi_query($sql)){
        return 'Sign Up Success!';
     }else{
        return $this->conn->error;
     }
   }
   public function petreg($uid, $pname, $ptype, $breed, $pgender, $img, $des){
      $pid = strtoupper('PT00'.uniqid());
      $statusid = mt_rand(1000, 9999);
      $sql = "insert into tbl_pet values(NULL,'$pid','$uid','$pname','$ptype','$breed','$pgender','$img','$des');";
      $sql.= "insert into tbl_pet_status values(NULL,'$statusid','$pid','Inviewing',CURRENT_DATE())";
      if($this->conn->multi_query($sql)){
         return 'Register Success!';
      }else{
         return $this->conn->error;
      }
   }
   public function adoptionrequest($fuid, $auid, $pid){
      $aid = strtoupper('ADPT'.uniqid());
      $sql = "insert into tbl_adoption values(NULL,'$aid','$fuid','$auid','$pid','Coordinating');";
      $sql.= "update tbl_pet_status set status='Coordinating' where pet_id='$pid'";
      if($this->conn->multi_query($sql)){
         return 'Request Sent! Please Wait for Approval';
      }else{
         return $this->conn->error;
      }
   }
   public function contactus($em, $cn, $mess){
      $mid = strtoupper('MSG'.uniqid());
      $sql = "insert into tbl_message values(NULL,'$mid','$em','$cn','$mess')";
      if($this->conn->query($sql)){
         return 'Message Sent!';
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
   public function coordinationaccept($petaccept){
      $sql = "update tbl_adoption set status='Pickup/Delivery' where pet_id='$petaccept';";
      $sql.= "update tbl_pet_status set status='Pickup/Delivery' where pet_id='$petaccept'";
     if($this->conn->multi_query($sql)){
        return 'Request Accepted!';
     }else{
        return $this->conn->error;
     }
   }  
   public function coordinationcancel($petaccept){
      $sql = "update tbl_adoption set status='Inviewing' where pet_id='$petaccept';";
      $sql.= "update tbl_pet_status set status='Inviewing' where pet_id='$petaccept'";
     if($this->conn->multi_query($sql)){
        return 'Request Canceled!';
     }else{
        return $this->conn->error;
     }
   }  
   public function adopted($adoptedpet){
      $sql = "update tbl_adoption set status='Adopted' where pet_id='$adoptedpet';";
      $sql.= "update tbl_pet_status set status='Adopted' where pet_id='$adoptedpet'";
     if($this->conn->multi_query($sql)){
        return 'Request Accepted!';
     }else{
        return $this->conn->error;
     }
   }  

// DELETE FUNCTION
public function deletepost($pid){
   $sql = "DELETE FROM tbl_pet WHERE pet_id = '$pid';";
   $sql.= "DELETE FROM tbl_pet_status WHERE pet_id = '$pid';DELETE FROM tbl_adoptionWHERE pet_id = '$pid'";
  if($this->conn->multi_query($sql)){
     return 'Request Accepted!';
  }else{
     return $this->conn->error;
  }
}  
   
   
  
   
}
?>