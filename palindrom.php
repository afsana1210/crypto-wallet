<html>
<body>
<form action=stud.php method=get>
enter file name<input type="text" name=tf1><br></input>
<input type="submit" value="submit">
</form>
</body>
</html>
<?php
$fn=$_GET['tf1'];
$fh=fopen($fn,"r");
echo "<table border=1>.<tr><th>rollno</th><th>name</th><th>marks1</th><th>marks2</th><th>marks3</th><th>total</th><th>percentage</th>";
while($r=fgets($fh))
{
    $a=impolde("",$r);
 echo "<tr><td>".$a[0]."</td>";
 echo "<tr><td>".$a[1]."</td>";
 echo "<tr><td>".$a[2]."</td>";
 echo "<tr><td>".$a[3]."</td>";
 echo "<tr><td>".$a[4]."</td>";
 $t=$a[2]+$a[3]+$a[4];
 $p=$t/3;
 echo "<td>".$t."</td>";
 echo "<td>".$p."</td>";
}
?>