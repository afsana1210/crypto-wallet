<?php
$u=$_POST['tf1'];
$p=$_POST['tf2'];
     #DB::connect('dbname=afs12') or die("unable to connect");
     $myPDO = new PDO('pgsql:host=localhost;dbname=afs12','postgres','postgres');

     echo "connect..";
    $myPDO->query("insert into user1 values('$u','$p')") ;
     echo "successfully inserted";
?>