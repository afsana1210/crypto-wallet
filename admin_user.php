<?php
 require("utils.php");
  session_start();
  if(!isset($_SESSION["email"]))
  {
    redirect("signin.php");
  }
  if(isset($_SESSION['email']) && $_SESSION['role'] != 'admin') {
    redirect("dashboard.php");
  }
 //die(); 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="wallet.png">

    <title>Admin User</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body class="text-center">
  <!-- select uid,first_name,last_name,email,role from users where role !='admin' -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top fixed-top  " >
  
  <a class="navbar-brand" href="dashboard.php" > 
    <img src="wallet.png" width="35" height="35" alt="">
    Crypto Wallet
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <form action="admin_user.php" style="padding-right:50px;">
      <button class="btn btn-outline-success" type="submit">Users</button>
    </form >
    <form action="dashboard.php" style="padding-right:50px;">
      <button class="btn btn-outline-success" type="submit">Dashboard</button>
    </form >
    <form action="coin.php" style="padding-right:50px;">
      <button class="btn btn-outline-success" type="submit">Add Purchase</button>
    </form >
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Enter Coin Name" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
    <form action="signout.php">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
    </form >
  
  </nav>
    <div class="container">
  <div style="margin-top:4rem"></div>
  <?php

    $myPDO = new PDO('pgsql:host=localhost;dbname=cryptowallet','postgres','postgres');

    $stmt = $myPDO->query("select uid,first_name,last_name,email,role from users
    where role !='admin'");

?>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while ($user =  $stmt->fetch(PDO::FETCH_ASSOC)) {
  ?>
    <tr>
      <th scope="row"><?php echo $user['uid']; ?></th>
      <td><a href="<?php echo "admin_purchase.php?uid=".$user['uid'] ?>"><?php echo $user['first_name']." ".$user['last_name']; ?></a></td>
      <td><?php echo $user['email']; ?></td>
      <td><?php echo $user['role']; ?></td>
    </tr>
    <?php 
        }
    ?>
  </tbody>
</table>
</div>
</body>
</html>

