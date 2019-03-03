<?php
   require("utils.php");
   $myPDO = new PDO('pgsql:host=localhost;dbname=cryptowallet','postgres','postgres');
    
   if($_POST)
   { 
     $first_name=$_POST['first_name'];
     $last_name=$_POST['last_name'];
     $email_id=$_POST['email_id'];
     $password=$_POST['password'];
     $role='user';
     //$myPDO = new PDO('pgsql:host=localhost;dbname=cryptowallet','postgres','postgres');
    if(!empty($first_name) && !empty($last_name ) && !empty($email_id) && !empty($password))
    {  // echo "data"; 
      //$myPDO->query("insert into users(first_name,last_name,email,password) values('$first_name','$last_name','$email_id','$password')") ;
      $sql = "insert into users(first_name,last_name,email,password,role) values(?,?,?,?,?)";
      $data = $myPDO->prepare($sql)->execute([$first_name, $last_name, $email_id, $password, $role]);
    // print_r($data);
      //die("no data");
      redirect("signin.php"); 
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="wallet.png">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="signup.php" method="post">
      <img class="mb-4" src="wallet.png" alt="" width="92" height="92">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
	<label for="inputEmail" class="sr-only">First Name</label>
      <input type="text" id="inputEmail" class="form-control" name="first_name" placeholder="First Name" required="" autofocus="" pattern="[A-Za-z]{3}">
	<label for="inputEmail" class="sr-only">Last Name</label>
      <input type="text" id="inputEmail" class="form-control" name="last_name" placeholder="Last Name" required="" autofocus="" pattern="[A-Za-z]{3}">      
	<label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name="email_id" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
      <p class="mt-5 mb-3 text-muted">© 2018-2019</p>
    </form>
  

</body>
</html>

