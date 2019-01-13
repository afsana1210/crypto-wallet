<?php
     #DB::connect('dbname=afs12') or die("unable to connect");
     $myPDO = new PDO('pgsql:host=localhost;dbname=afs12','postgres','postgres');

     echo "connect..";
    foreach($myPDO->query("select * from user1") as $r)
     {
        echo $r[0];
        echo $r[1];
     }
?>