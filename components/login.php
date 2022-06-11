<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <style>
  
  html,
  body {
      margin: 0px;
      padding: 0px;
      font-family: Geneva, Tahoma, sans-serif
}

</style>
  </head>
  <body >
    <nav class="navbar navbar-expand-lg navbar-light bg-light m-0 p-0" style="font-weight:bold; overflow:hidden">
      <div class="container-fluid p-0 m-0">
      <h1> <a class="navbar-brand  bg-dark m-0" href="./index.php"  style=" font-size:1.8rem; color:white;padding:1rem">S<font color="#dc3545">R</font> EXPORTS</a></h1>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse m-0" id="navbarSupportedContent" style="padding:0.7rem">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section >
        <div class="container py-4 my-4" >
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card " style="border:none" >
                <div class="card-body pt-5 px-5" >
      
                  <div class="mb-md-3 mt-md-4 pb-3">
      <form action="login.php" method="POST">
                    <h2 class="fw-bold mb-2 text-uppercase text-center">Login</h2>
                    <p class=" mb-5 text-center">Please enter your login and password!</p>
      
                    <div class="form-outline form-white mb-4">
                        <label class="form-label left" for="username">Username</label>
                      <input type="text" id="usernamefield" name="username" class="form-control form-control-lg" required />

                    </div>
                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="typePasswordX">Password</label>
 <input type="password" id="password" name="password"class="form-control form-control-lg" required />
                     
                    </div>
      
                    <p class="small mb-3 pb-lg-2 text-center"><a class="text-dark" href="#!">Forgot password?</a></p>
      <div class="text-center">
                    <button class="btn btn-outline-danger btn-lg px-5 "style="border:3px solid #dc3545;border-radius:0;font-weight:bold" name="loginbtn" type="submit">Login</button>
                </div>
      </form>     
                  </div>
      
                 
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

  </body>
  <script src="./js/jquery.min.js"></script>
    <script src="./js/validation.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"
  ></script>
  


</html>
<?php include "dbconnection.php"?>
<?php
if(isset($_POST["loginbtn"]))
{
  $username= $_POST["username"];
  
  $pass= $_POST["password"];
  $sql="select * from usertbl where username='".$username."' and password='".$pass."'";
  $res = mysqli_query($con,$sql);

  $count =mysqli_num_rows($res);
   
  if($count == 1){
    session_start();
    $_SESSION["username"]=$username;
    if(strcmp($username,"raj123")==0){
    
      header("Location:  admin1.php");
      exit;
    }else{
      header("Location: billing.php");
      exit;
    }
    
    
  }else
{
  ?><script>alert("Wrong username or password!!")</script><?php
}
}
?>