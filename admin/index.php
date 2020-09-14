<?php

   session_start();

        //     $hash = md5('Furazarcia4252');
        //  var_dump($hash);
        

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>



body {
    font-family: "Lato", sans-serif;

    background: url('../images/proba.jpg') no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: black;
    overflow-x: hidden;
    padding-top: 20px;
    opacity:0.9;
    text-align: center;
}

 label {

    font-weight: bold;
    font-size: 20px;

 }


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 30%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #33cc33;
    
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #33cc33;
}

</style>

<div class="sidenav">
         <div class="login-main-text">
            <h1>Fura Żarcia<br></h1>
            <h5>Panel administracyjny</h5>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="POST" action="login.php">
                  <div class="form-group">
                     <label>Login</label>
                     <input name="login" type="text" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Hasło</label>
                     <input name="password" type="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black">Zaloguj</button>
               </form>
            </div>
         </div>
      </div>

        


         