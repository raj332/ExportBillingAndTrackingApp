<nav class="navbar navbar-expand-lg navbar-light bg-light m-0 p-0" style="font-weight:bold; overflow:hidden">
    <div class="container-fluid p-0">
      <h1> <a class="navbar-brand  bg-dark m-0" href="./index.php"  style=" font-size:1.8rem; color:white;padding:1rem">S<font color="#dc3545">R</font> EXPORTS</a></h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse m-0" id="navbarSupportedContent" >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./admin1.php">Admin-portal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./admin2.php">Shiping rates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./admin3.php">Check Bills</a>
          </li>
        </ul>
        <div class="d-flex">
          <span id="username" class=" p-3">User : <?php session_start();
                                                      echo $_SESSION["username"] ?></span>
          <a href="./login.php"> <button class="btn btn-danger mx-2 p-3 px-4" style=" border-radius:0;font-weight:bold;">Logout</button></a>
        </div>
      </div>
    </div>
  </nav>