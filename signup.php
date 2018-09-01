
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
    <form class="form-signin" action="signin.php">
      <img class="mb-4" src="wallet.png" alt="" width="92" height="92">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
	<label for="inputEmail" class="sr-only">First Name</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="First Name" required="" autofocus="">
	<label for="inputEmail" class="sr-only">Last Name</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Last Name" required="" autofocus="">      
	<label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>
  

</body>
</html>
