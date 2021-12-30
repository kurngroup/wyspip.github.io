<?php 
    include "koneksi.php";

    function registrasi($data){
      global $connect;

      $nama = mysqli_real_escape_string($connect, $data["name"]);
      $gift = mysqli_real_escape_string($connect, $data["select"]);
      $massage = mysqli_real_escape_string($connect, $data["massage"]);

      //tambahkan user ke database

       mysqli_query($connect, "INSERT INTO gift VALUES ('$nama', '$gift', '$massage')");
       return mysqli_affected_rows($connect);

    }
    if(isset($_POST["submit"])){
      if(registrasi($_POST) > 0){
           echo '<script language="javascript">
                alert ("Terima kasih telah memberikan sesuatu untukku 😊!");
                alert ("Tunggu balasan dariku!")
                window.location="donate.php";
                </script>';
      }
      else{
          echo '<script language="javascript">
                alert ("Yah 😥 coba lagi dong!");
                window.location="donate.php";
                </script>';
      }
}
    
?>



<!DOCTYPE HTML>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
    <title>Gift</title>
    
  </head>
  <body>
    <style type="text/css">
      body{
        text-align: center;
        background:radial-gradient(circle at top left, red, brown, darkred, maroon);
        height: 100%;
        display: flex;
        background-attachment: fixed;
      }
      .main{
        margin-top:15%;
        left:5%;
        right:5%;
        position: absolute;
        background: rgba(255,255,255,0.3);
        padding: 30px;
        border-radius: 20px;
      }
     .main marquee{
        color:blue;
        font-size: 20px;
        background:rgba(255,255,255,0.5);
        border-radius: 10px;
        border: 1px blue solid;
      }
      .main h1{
        color:red;
        border-bottom: 5px solid;
        border-radius: 30px;
        padding: 20px;
        font-size: 70px;
        border-color: white;
        width: 100%;
        background: pink;
      }
      .main h2{
        color: white;
        font-size: 35px;
      }
      .list{
        color: pink;
        margin-left: 20%;
        width: 60%;
        font-size: 30px;
      }
      .list p{
        padding: 25px;
      }
      .input{
        background:rgba(255,255,255,0.3);
        padding: 20px;
        border-radius: 10px;
        box-sizing: border-box;
      }
      .field{
        padding: 10px;
      }
      .field input{
        padding: 10px;
        background:rgba(255,255,255,0.35) ;
        border:none;
        outline: none;
        border-bottom: 1px solid white;
        border-radius: 20px;
        width: 30%;
        color: white;
        transition: .5s;
      }
      .field input:hover{
        background: #F7A8B9;
      }
      .field label{
        color: white;
        font-size: 26px;
        pointer-events: none;
        transition: .5s;

      }
      .field.required {
        content:"*";
        color:red;
      }
      .field select{
        padding: 10px;
        border: none;
        outline: none;
        background: rgba(255,255,255,0.35);
        border-radius: 20px;
        color: red;
        font-size: 15px;
      }
       input[type="submit"]{
        width: 14%;
        height: 50px;
        border:1px solid;
        background: red;
        border-radius:15px;
        font-size: 18px;
        color: white;
        font-weight: 700;
        cursor:pointer;
        transition: .5s;
      }
      input[type="submit"]:hover{
        background: pink;
        color: red;
      }
      .footer{
        left: 0;
        bottom: 0px;
        padding: 5px;
        width: 100%;
        position: fixed;
        color: white;
        text-align: center;
        font-size: 16px;
        background: rgba(204,0,0, 0.3);
      }
      .header{
        left: 0px;
        top: 0px;
        width: 100%;
        height: 30px;
        position: fixed;
        text-align: left;
        padding: 20px;
        z-index:9999;
        transition: .5s;
      }
      .header:hover{
        background:rgba(204,0,0, 0.4);
      }
      .header a{
        text-decoration: none;
        color: white;
        font-size: 20px;
        padding-inline: 30px;
        transition: .5s;
        border-radius: 10px;

       }
      .header a:hover{
        background: pink;
        color: red;
      }
     
    </style>
    <div class="header">
      <a href="index.php">Home</a> 
      <a href="donate.php">Gift</a>
      
    </div>
    <div class = "main">
    <marquee  onmouseout="this.start()" onmouseover="this.stop()">Today is the birthday of my sista and my friend, Happy birthday to youu 🎉 Thank you for being the brightest person I know 😊. Hope to see you shine for years on!👋🎊</marquee>
    <h1> 🎁 SEND A GIFT AND SOME MESSAGE</h1>
    <h2>Before 2021 ends, tell me something you always wanted to say 😊</h2>
    <form class="input" method="POST">
    <div class="field">
      <div><label>Name*</label></div>
      <input type="text" name="name" required>
    </div>
    <div class="field">
       <div><label>Gift*</label></div>
       <td><select name="select">
      <div>
       <option value="Love">Love</option>
       <option value="Heart">Heart</option>
       <option value="Food">Food</option>
       <option value="Energy">Energy</option>
       <option value="Drink">Drink</option>
       <option value="Soul">Soul</option>
      </div>
      
      </select>
      </td>
      <div class="field">
        <div><label>Message</label></div>
        <div><input name="massage"style="border-radius: 10px;width: 40%" type="text" ></div>
      </div>
     
      <div><input name="submit" type= "submit" value="send"></div>
      
    </form>

    <h3 style="margin-bottom: 7%;color: white;font-size: 30px;margin-top:5%;"><i>Thank you for being a good person</i></h3>

    <div class="footer">
      <li>Powered by Kurnadishm.inc</li>
      <b>®2021-2022</b>
    </div>
   
    </div>

  </body>

</html>