<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel</title>

</head>
<style>
   @font-face {
    font-family: "Poppins Medium";
    src: url(Poppins/Poppins-Medium.ttf);
    }
   *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins Medium";
   }
   .container{
         display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        flex-direction: column;
   }
   .card{
      width: 300px;
   }
   .login-card{
      position: relative;
      height: 40px;
      line-height: 40px;
   }
   .login-card-2{
      padding-top: 20px;
      position: relative;
      height: 40px;
      line-height: 40px;
   }
   input{
      position: absolute;
      width: 100%;
      outline: none;
      font-size: 14px;
      padding: 9px 15px;
      border-radius: 10px;
      border: 2px black solid;
      background: transparent;
      transition: 0.1s ease;
      z-index: 1111;
   }
   .labelline{
      position: absolute;
      font-size: 14px;
      padding: 0;
      margin: 0 15px;
      background-color: white;
      transition: 0.2s ease;
   }
   input:focus,
   input:valid{
      color: red;
      border: 4px solid red;
   }
   input:focus + .labelline,
   input:valid + .labelline{
      color: red;
      height: 30px;
      line-height: 30px;
      padding: 0 5px;
      transform: translate(-10px,-13px) scale(0.75);
      z-index: 1111;
   }
   button{
      padding: 10px;
      border-radius: 10px;
      background-color: #0077b6;
      margin-top: 30px;
      color: white;
      width: 120px;
   }
   button:hover{
      cursor: pointer;
   }
</style>
<body>
   <form method="POST">
      <div class="container">
         <h1>Admin Panel</h1>
         <div class="card">
            <div class="login-card">
               <input type="text" name="un" required>
               <div class="labelline">Username</div>
            </div>
            <div class="login-card-2">
               <input type="password" name="pw" required>
               <div class="labelline">Password</div>
            </div>
         </div>
         <button type="submit" name="btnlogin">LOGIN</button>
      </div>
   </form>
</body>
</html>
<?php
include_once 'Class/User.php';
$u = new User();
if(isset($_POST['btnlogin'])){
 $un = $_POST['un'];
 $pw = $_POST['pw'];
 $data = $u->login($un, $pw);    
   if($row = $data->fetch_assoc()){
     $_SESSION['role'] = $row['role'];
     $_SESSION['id_num'] = $row['id_number'];
       if($row['role']=='admin'){
           echo '
             <script>
               window.open("Admin/adminhome.php","_self");  
             </script>  
           ';
      }  
   }  
}
?>