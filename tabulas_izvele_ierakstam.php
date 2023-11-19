<?php
require_once("config.php");
echo '<link rel="stylesheet" href ="stili.css">';
echo '
<a href = "books.html">Atpakaļ</a>
<h3>DB Tabulas izvēle</h3>';
$vaicajums = "show tables";
$rezultats=$conn->query($vaicajums);  //objekts
//1.rinda
$i = 1;
while($rinda = $rezultats->fetch_assoc()){
echo $i.". ".$rinda["Tables_in_goodreadsdb"];
echo "</br>";
$i++;
}

//forma
echo "</br>";
echo '
<form action="ieraksta_izveide.php" method="post">
<label for="table">Ievadiet tabulas nosaukumu</label>
<input required type="text" name="table" >
<input type="submit" value="Tabulas saturs">
</form>
';
?>