
<?php
   require("utils.php");
   session_start();
   if(!isset($_SESSION["email"]))
 {
  redirect("signin.php");
 }

   $myPDO = new PDO('pgsql:host=localhost;dbname=cryptowallet','postgres','postgres');
  
   if($_POST)
   { //print_r($_POST);die;
     $currency_id=$_POST['currency_id'];
     $exchange_name=$_POST['exchange_name'];
     $current_rate=$_POST['current_rate'];
     $quantity=$_POST['quantity'];
     $total_value=$_POST['total_value'];
     $date=$_POST['date'];
     $time=$_POST['time'];
     $uid=$_SESSION["uid"];
    
     if(!empty($currency_id) && !empty($exchange_name ) && 
    !empty($current_rate) && !empty($quantity) &&
     !empty($total_value) && !empty($date) && !empty($time) )
    {   
      $sql = "insert into purchase (uid, currency_id, exchange_name, current_rate, quantity, total_value, date, time) values(?,?,?,?,?,?,?,?)";
      $data = $myPDO->prepare($sql)->execute([$uid, $currency_id, $exchange_name, $current_rate, $quantity, $total_value, $date, $time]);
      redirect("dashboard.php");
    }
  }
   $result = $myPDO->query("select * from currency");
   
  ?>
<!doctype html>
<?php
// https://api.coinmarketcap.com/v2/ticker/?convert=INR&limit=10&sort=rank
?>
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
    <script>
      function getTotalValue() {
        var total = document.getElementById("Current_rate").value * document.getElementById("quantity").value;
        document.getElementById("total_value").value = total;
      }
    </script>
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top fixed-top  " >
  
  <a class="navbar-brand" href="dashboard.php" > 
    <img src="wallet.png" width="35" height="35" alt="">
    Crypto Wallet
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Enter Coin Name" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  </nav>
  <div class="container">
  <div style="margin-top:4rem"></div></div>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-offset-4"></div>
<div class="col-md-04 ">

<form class="form-horizontal" role="form" id="exchange_coin" action="coin.php" method="post">
<h2 class="form-signin-heading">Enter Exchange Information</h2>
<div class="form-group">
    <label for="currency_id" class="col-md-08 control-label">Currency Name</label>
    <div class="col-md-08">
       <select class="form-control" name="currency_id" required>
<?php
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
   echo '<option value="'.$row['id'].'">'.$row['currency_name']." (".$row['currency_abbrivation']." )".'</option>';
}
 ?> 
   </select>
   </div>
   </div>
   <div class="form-group">
    <label for="exchange_name" class="col-md-08 control-label">Exchange Name </label>
    <div class="col-md-08">
      <input type="text" class="form-control" id="exchange_name" placeholder="Exchange Name" name="exchange_name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Current_rate " class="col-md-08 control-label">Current Rate </label>
    <div class="col-md-08">
      <input type="text" class="form-control" id="Current_rate" placeholder="Current Rate " name="current_rate" required>
    </div>
  </div>
  <div class="form-group">
    <label for="quantity " class="col-md-08 control-label">Quantity </label>
    <div class="col-md-08">
      <input type="text" class="form-control" onblur="getTotalValue()" id="quantity" placeholder="Quantity  " name="quantity" required>
    </div>
  </div>
  <div class="form-group">
    <label for="total_value " class="col-md-08 control-label">Total Value </label>
    <div class="col-md-08">
      <input type="text" value="" class="form-control" id="total_value" placeholder="Total Value  " name="total_value" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Date " class="col-md-08 control-label">Date </label>
    <div class="col-md-08">
      <input type="date" class="form-control" id="Date" placeholder="Date " name="date" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Time " class="col-md-08 control-label">Time </label>
    <div class="col-md-08">
      <input type="time" class="form-control" id="Time" placeholder="Time " name="time" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-6 col-lg-6">
      <button type="submit" class="btn btn-success">Submit</button>&nbsp
      <button type="reset" class="btn btn-success">Reset</button>
    </div>
  </div>
</form>
</div>
<div class="col-md-04"></div>
</div>
</div>
</body>
</html>
 
 
   