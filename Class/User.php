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
   public function transactions(){
      $sql = "select * from transactions";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function report2(){
      $sql = "SELECT tbl_pet.pet_breed AS breed, COUNT(tbl_pet.pet_breed) AS most 
                FROM tbl_pet 
                INNER JOIN tbl_pet_status ON tbl_pet.pet_id = tbl_pet_status.pet_id 
                WHERE tbl_pet_status.status = 'Adopted'
                GROUP BY tbl_pet.pet_breed 
                ORDER BY most DESC 
                LIMIT 1";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function report1(){
      $sql = "SELECT pet_breed AS breed, COUNT(pet_breed) AS most 
                FROM tbl_pet
                GROUP BY pet_breed 
                ORDER BY most DESC 
                LIMIT 1";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function myadoptionrequest($uid){
      $sql = "select tbl_application.pet_id as pet_id, tbl_application.application_date as date, tbl_application.status as status, tbl_pet.user_id as user_id, tbl_pet.pet_image as petimg,tbl_pet.pet_name as name
      from tbl_application
      inner join tbl_pet on tbl_application.pet_id = tbl_pet.pet_id
      where tbl_application.user_id = '$uid'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function application(){
      $sql = "select * from tbl_application 
      inner join tbl_user_info on tbl_application.user_id = tbl_user_info.user_id";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function application2(){
      $sql = "SELECT 
    tbl_pet.pet_image AS petimg, 
    tbl_user_info.profile_image as userimg, 
    tbl_pet.pet_name AS petn, 
    tbl_user_info.first_name AS fn, 
    tbl_user_info.last_name AS ln, 
    COUNT(tbl_application.user_id) AS appcount
      FROM tbl_pet
      INNER JOIN tbl_user_info ON tbl_pet.user_id = tbl_user_info.user_id
      LEFT JOIN tbl_application ON tbl_pet.pet_id = tbl_application.pet_id
      GROUP BY 
      tbl_pet.pet_id";
      $data = $this->conn->query($sql);
      return $data;
   }
   
   public function submission(){
      $sql = "select * from tbl_pet
      inner join tbl_pet_status on tbl_pet.pet_id = tbl_pet_status.pet_id";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function pet($pid){
      $sql = "select * from tbl_pet where pet_id = '$pid'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function adopterform($uid){
      $sql = "select tbl_application.application_id as apid, tbl_application.user_id as adopterid, tbl_pet.pet_id as petid, tbl_pet.pet_name as pname, tbl_pet.pet_image, tbl_application.status as status, tbl_user_info.first_name as fname,tbl_user_info.last_name as lname
      from tbl_application 
      inner join tbl_pet on tbl_pet.pet_id = tbl_application.pet_id
      inner join tbl_user_info on tbl_user_info.user_id = tbl_application.user_id
      where tbl_pet.user_id='$uid' and status = 'Review' ";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function displaysubmission($pid){
      $sql = "select * from tbl_pet
      inner join tbl_pet_status on tbl_pet.pet_id = tbl_pet_status.pet_id
      inner join tbl_user_info on tbl_pet.user_id = tbl_user_info.user_id
      where tbl_pet.pet_id = '$pid'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function displayapplicationform($appid){
      $sql = "select * from tbl_application 
      inner join tbl_user_info on tbl_application.user_id = tbl_user_info.user_id 
      where application_id = '$appid'";
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
   public function displayallshelter(){
      $sql = "select * from tbl_pet_status where status = 'Shelter'";
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
   public function chatprofile($recieverid){
      $sql = "select * from tbl_user_info where user_id = '$recieverid'";
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
   public function reqcount($uid){
      $sql = "select * from tbl_user where id_number='$uid'";
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
      $sql = "select tbl_pet.pet_id,tbl_pet.pet_image,tbl_pet.pet_name,tbl_pet.pet_gender,tbl_pet.pet_breed, tbl_pet_status.status
      FROM tbl_pet 
        INNER JOIN tbl_pet_status ON tbl_pet.pet_id = tbl_pet_status.pet_id
        INNER JOIN tbl_user_info ON tbl_pet.user_id = tbl_user_info.user_id
        WHERE tbl_pet.user_id = '$uid'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function mypetpostedpickup($uid){
      $sql = "select tbl_application.application_id as apid, tbl_application.user_id as adopterid, tbl_pet.pet_id as petid, tbl_pet.pet_name as pname, tbl_pet.pet_image, tbl_application.status as status, tbl_application.user_id as rid,  tbl_user_info.first_name as fname, tbl_user_info.last_name as lname
      from tbl_application 
      inner join tbl_pet on tbl_pet.pet_id = tbl_application.pet_id
      inner join tbl_user_info on tbl_user_info.user_id = tbl_application.user_id
      where tbl_pet.user_id='$uid' and status = 'Pickup/Delivery'";
      $data = $this->conn->query($sql);
      return $data;
   }
   public function mypetpostedpickup1($uid){
      $sql = "select tbl_application.application_id as apid, tbl_application.user_id as adopterid, tbl_pet.pet_id as petid, tbl_pet.pet_name as pname, tbl_pet.pet_image, tbl_application.status as status, tbl_application.user_id as rid,  tbl_user_info.first_name as fname, tbl_user_info.last_name as lname
      from tbl_application 
      inner join tbl_pet on tbl_pet.pet_id = tbl_application.pet_id
      inner join tbl_user_info on tbl_user_info.user_id = tbl_application.user_id
      where tbl_pet.user_id='$uid' and status = 'Coordinating'";
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
   public function getDetailsByLabel($type, $label) {
      if ($type === 'posted') {
          $query = "SELECT * FROM tbl_pet_status WHERE ptc = ?";
      } else {
          $query = "SELECT * FROM tbl_pet_status WHERE pstat = ?";
      }
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param('s', $label);
      $stmt->execute();
      return $stmt->get_result();
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
   public function petreg($uid, $pname, $ptype, $breed, $pgender, $petImage, $govId, $selfie, $des) {
      // Generate unique IDs
      $pid = strtoupper('PT00' . uniqid());
      $statusid = mt_rand(1000, 9999);
      // Prepare SQL statements
      $sql = "INSERT INTO tbl_pet VALUES (NULL, '$pid', '$uid','$govId', '$selfie', '$pname', '$ptype', '$breed', '$pgender', '$petImage', '$des');";
      $sql .= "INSERT INTO tbl_pet_status VALUES (NULL, '$statusid', '$pid', 'Pending', CURRENT_DATE())";
      // Execute SQL queries
      if ($this->conn->multi_query($sql)) {
          return 'Register Success!';
      } else {
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
   public function applicationrequestsend($uid,$pid,$ocp ,$house ,$own ,$alg ,$perm ,$res ,$fin ,$sec ,$hh ,$reas){
      $appid = 'APPLICATION-ID'.rand(1000,9999);
      $sql = "insert into tbl_application values(NULL,'$appid','$uid','$pid',CURDATE(),'Pending','$ocp','$house','$own','$alg','$perm','$res','$fin','$sec','$hh','$reas');";
      $sql.= "UPDATE tbl_user SET request_count = request_count + 1 WHERE id_number = '$uid'";
      if($this->conn->multi_query($sql)){
         return 'Application Send! Wait for the Approval.';
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
   public function submissionaccept($petid){
      $sql = "update tbl_pet_status set status='Inviewing' where pet_id='$petid'";
     if($this->conn->query($sql)){
        return 'Submission Accepted!';
     }else{
        return $this->conn->error;
     }
   }  
   public function submissiondeny($petid){
      $sql = "update tbl_pet_status set status='Denied' where pet_id='$petid'";
     if($this->conn->query($sql)){
        return 'Submission Rejected!';
     }else{
        return $this->conn->error;
     }
   }
   public function applicationaccept($aid){
      $sql = "update tbl_application set status='Review' where application_id ='$aid'";
     if($this->conn->query($sql)){
        return 'Application Accepted!';
     }else{
        return $this->conn->error;
     }
   }  
   public function applicationdecline($aid){
      $sql = "update tbl_application set status='Decline' where application_id='$aid'";
     if($this->conn->query($sql)){
        return 'Application Decline!';
     }else{
        return $this->conn->error;
     }
   }  
   public function adoptionreject($appid){
      $sql = "update tbl_application set status='Decline' where application_id='$appid'";
     if($this->conn->query($sql)){
        return 'Application Decline!';
     }else{
        return $this->conn->error;
     }
   }  
   public function adoptionrequest($fuid,$appid, $auid, $pid){
      $aid = strtoupper('ADPT'.uniqid());
      $sql = "insert into tbl_adoption values(NULL,'$aid','$appid','$fuid','$auid','$pid');";
      $sql.= "update tbl_pet_status set status='Coordinating' where pet_id='$pid'; 
      update tbl_application set status='Coordinating' where pet_id='$pid'";
      if($this->conn->multi_query($sql)){
         return 'Application Approved!';
      }else{
         return $this->conn->error;
      }
   }
   public function changetoshelter($pid){
      $sql = "update tbl_pet_status set status='Shelter' where pet_id='$pid'";
     if($this->conn->query($sql)){
        return 'Pet Moved To Shelter!';
     }else{
        return $this->conn->error;
     }
   }  
   public function coordinationaccept($apptopick, $pettopick){
      $sql = "update tbl_application set status='Pickup/Delivery' where application_id='$apptopick';";
      $sql.= "update tbl_pet_status set status='Pickup/Delivery' where pet_id='$pettopick'";
     if($this->conn->multi_query($sql)){
        return 'Request Accepted!';
     }else{
        return $this->conn->error;
     }
   }  
   public function adopted($apptopick, $pettopick){
      $sql = "update tbl_application set status='Adopted' where application_id='$apptopick';";
      $sql.= "update tbl_pet_status set status='Adopted' where pet_id='$pettopick'";
     if($this->conn->multi_query($sql)){
        return 'Request Accepted!';
     }else{
        return $this->conn->error;
     }
   }  

// DELETE FUNCTION
public function deletepost($pid){
   $sql = "DELETE FROM tbl_pet WHERE pet_id = '$pid';";
   $sql.= "DELETE FROM tbl_pet_status WHERE pet_id = '$pid';DELETE FROM tbl_adoption WHERE pet_id = '$pid'";
  if($this->conn->multi_query($sql)){
     return 'Request Accepted!';
  }else{
     return $this->conn->error;
  }
}  
   
public function cancelpet($petaccept){
   $sql = "DELETE FROM tbl_pet WHERE pet_id = '$petaccept';";
   $sql.= "DELETE FROM tbl_pet_status WHERE pet_id = '$petaccept'";
  if($this->conn->multi_query($sql)){
     return 'Delete Success!';
  }else{
     return $this->conn->error;
  }
}  


}
?>