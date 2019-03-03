
<?php
  session_start();
   require("utils.php");
   
   $myPDO = new PDO('pgsql:host=localhost;dbname=cryptowallet','postgres','postgres');

   if($_POST)
    {
      $email_id=$_POST['email_id'];
      $password=$_POST['password'];
      // $result = $myPDO->query("select * from signup where email='$email_id' and password='$password'") ;
     // $result = $myPDO->query("select * from signup limit 1") ;
      $stmt = $myPDO->prepare("SELECT * FROM users WHERE email=:email_id AND password=:password");
      $stmt->execute(['email_id' => $email_id, 'password' => $password]); 
      $user = $stmt->fetch();
      $_SESSION["email"]= $user["email"];
      $_SESSION["uid"]=$user["uid"];
      $_SESSION["role"]=$user["role"];
       if( $_SESSION["role"] == 'user')
       {
        redirect("dashboard.php");
       }
       else
        {
          redirect("admin_user.php");
        } 
     // if($result > 0)
            
              
        
       /* else   {  
            ?><script type="text/javascript">location.href = 'errorp.php';</script><?php
           }*/
     
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
   <!--database code -->
   
  <body class="text-center">
    <form class="form-signin" action="signin.php" method="post">
      <img class="mb-4" src="wallet.png" alt="" width="92" height="92">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name="email_id" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	<p ><a href=signup.php>New user Register</a></p>
     
      <p class="mt-5 mb-3 text-muted">© <?php include("copyright.php");?></p>
    </form>
  

</body>
</html>

