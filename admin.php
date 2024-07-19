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
      padding: 0 15px;
      line-height: 40px;
      border-radius: 10px;
      border: 2px black solid;
      background: transparent;
      transition: 0.1s ease;
      z-index: 1111;
   }
   .labelline{
      position: absolute;
      font-size: 13px;
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
      transform: translate(-13px,-13px) scale(0.75);
      z-index: 1111;
   }
   button{
      padding: 10px;
      border-radius: 10px;
      background-color: #0077b6;
      position: absolute;
      bottom: 20px;
      color: white;
      width: 120px;
   }
   button:hover{
      cursor: pointer;
   }
</style>
<body>
   <div class="container">
   <h1>Admin Panel</h1>
      <div class="card">
         <div class="login-card">
            <input type="text" required>
            <div class="labelline">Username</div>
         </div>
         <div class="login-card-2">
            <input type="text" required>
            <div class="labelline">Password</div>
         </div>
      </div>
      <button type="button">LOGIN</button>
   </div>
</body>
</html>