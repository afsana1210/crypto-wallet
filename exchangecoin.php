
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
    <form class="form-signin" action="signin.php" method="post">
      <img class="mb-4" src="wallet.png" alt="" width="92" height="92">
      <h1 class="h3 mb-3 font-weight-normal">crypto-wallet</h1>
      <form class="form-inline">
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">coin Name</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected>BTC</option>
    <option value="1">ETH</option>
    <option value="2">REM</option>
    <option value="3">SIA</option>
    <option value="4">DBC</option>
    <option value="5">XRP</option>
    <option value="6">REQ</option>
    <option value="7">RPX</option>
    <option value="8">LTC</option>
    <option value="9">MAN</option>
    <option value="10">WWB</option>
    
  </select>
  <form>
  <div class="form-group row">
    <label for="inputexchange" class="col-sm-3 col-form-label"> Exchange  </label>
    <div class="col-sm-10">
      <input type="exchangename" class="form-control" id="exchange" placeholder="exchangename">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputRate" class="col-sm-3 col-form-label">CurrentRate</label>
    <div class="col-sm-10">
      <input type="CurrentRate" class="form-control" id="inputRate" placeholder="Rate">
    </div>
  </div>
  <div class="form-group row">
    <label for="inpuQuantity"class="col-sm-3 col-form-label"> Quantity  </label>
    <div class="col-sm-10">
      <input type="Quantity" class="form-control" id="inputQuantity" placeholder="Quantity">
    </div>
  </div>
  </form>
  <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>
  

</body>
</html>


 <lable for="Current_rate :">Current Rate : </lable>
    <input type="text" name="current_rate"  ></input><br><br>
    <lable for="quantity " >Quantity : </lable>
    <input type="text" name="quantity"  ></input><br><br>
    <lable for="total_value :">Total Value : </lable>
    <input type="text" name="total_value" ></input>
    <lable for="Date :">Date : </lable>
    <input type="date" name="date" ></input><br><br>
    <lable for="Time :">Time : </lable>
    <input type="time" name="time" ></input><br><br>
     <input type="submit" name="submit"></input>
    </body>
    </html>
