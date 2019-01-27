<?php
 require("utils.php");
  session_start();
  error_reporting(0);
  // if(!isset($_SESSION["email"]))
  // {
  //   redirect("signin.php");
  // }
  $myPDO = new PDO('pgsql:host=localhost;dbname=cryptowallet','postgres','postgres');
  $currency = $myPDO->query("select * from currency");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="wallet.png">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body class="text-center">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top fixed-top  " >
  
  <a class="navbar-brand" href="dashboard.php" > 
    <img src="wallet.png" width="35" height="35" alt="">
    Crypto Wallet
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <form action="coin.php" style="padding-right:50px;">
      <button class="btn btn-outline-success" type="submit">Add Purchase</button>
    </form >
    <form class="form-inline my-2 my-lg-0">
      <select class="form-control" name="currency_id">
        <option value="">All Coins</option>
        <?php
        while ($row = $currency->fetch(PDO::FETCH_ASSOC)) {
          echo '<option '.($_GET['currency_id'] == $row['id'] ? 'selected=selected' : '').' value="'.$row['id'].'">'.$row['currency_name']." (".$row['currency_abbrivation']." )".'</option>';
        }
        ?> 
      </select>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
    <form action="signout.php">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
    </form >
  
  </nav>
  <?php
  // de8f599b-1bbe-451d-8d4a-e359354551b4
  $response = file_get_contents("https://api.coinmarketcap.com/v2/ticker/?convert=INR&limit=20&sort=rank");
  // $response = file_get_contents("https://api.coinmarketcap.com/v2/listings/");
  $result = json_decode($response, true);
  $data = array_values($result["data"]);
  
  function getLatestPrice($data,$symbol)
  {
    $t=False;
  foreach ($data as $key => $value) {
   foreach($value as $newKey => $newValue) {
       if($newKey=="symbol")
       {
        if($newValue==$symbol){
          $t=True;}}
          if($t==True && $newKey=="quotes")
           {
           foreach($newValue as $lKey => $lValue) {
             if($lKey=="INR")
             {
              foreach($lValue as $wKey => $wValue)
              {
                if($wKey=="percent_change_24h")
                 return $wValue;
              }
             }    
          }
        }
    }
  }
} ?>
  <div class="container">
  <div style="margin-top:4rem"></div>
  <?php
  if (!empty($_GET['currency_id'])) {
    $search = " and purchase.currency_id =".$_GET['currency_id'];
  } else {
    $search = "";
  }

  $query = "
    select currency_name,currency_abbrivation ,purchase.exchange_name,
    purchase.current_rate,purchase.quantity,purchase.total_value,date,time
    from currency
    right JOIN purchase on currency.id=purchase.currency_id
    WHERE purchase.uid=".$_SESSION['uid'].$search ;
  
  $countQuery = $myPDO->prepare($query);
  $countQuery->execute();
  $count = $countQuery->rowCount();

  $currency = $myPDO->query($query);

  if ($count == 0) {
    ?>
    <div class='jumbotron'>
      <h3>You have not added any details for your cryptocurrency purchases.</h3>
      <form action="coin.php" style="padding-right:50px;">
        <button class="btn btn-outline-success" type="submit">Add Purchase</button>
      </form >
    </div>
  <?php
  }
  // echo $variable = "<script>document.write(latestPrice)</script>";
  while ($row = $currency->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="flex-row" style="min-width: 200px;">
        <div class="d-flex justify-content-center">
            <div class="card text-white bg-dark mb-3 clearfix" style="width: 35rem;">
              <div class="card-body">
                <span class="float-left">
                  <?php echo $row['currency_name']."(".$row["currency_abbrivation"].")"."<br> ".$row['quantity']." ". $row['exchange_name']; ?><br>
                </span>
                <span class="float-right">
                  <?php echo $row['total_value']." <br>".$row["date"]." ".$row["time"];?></span>
                  <?php $priceChange=getLatestPrice($data,$row["currency_abbrivation"]);
                  if($priceChange>0) {
                    echo "<span style=\"color: #27ae60;\"><b>".$priceChange."</b></span>";
                  } else {
                   echo "<span style=\"color: #c0392b;\"><b>".$priceChange."</b></span>";
                  }
                  ?>
              </div>
            </div>
        </div>
    <div>
    <?php
    }
    ?>
  <!-- Content here -->
   
</body>
</html>

