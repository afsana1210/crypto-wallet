
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

    
  </head>

  <body class="text-center">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top fixed-top  " >
  <a class="navbar-brand" href="#">Crypto Wallet</a>
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
  <div style="margin-top:4rem"></div>
  <?php
  $currency = array('BTC', 'ETH', 'REM', 'SIA', 'DBC', 'XRP', 'REQ', 'RPX');
  foreach($currency as $value) {
    ?>
    <div class="flex-row">
        <div class="d-flex justify-content-center">
            <div class="card text-white bg-dark mb-3 clearfix" style="max-width: 50rem;margin-top:1rem">
                <div class="card-header"><?php echo $value?></div>
                    <div class="card-body">
                        <h5 class="card-title">Dark card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
  <!-- Content here -->
   
</body>
</html>

