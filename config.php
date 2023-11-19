<?php
echo "<meta charset='utf-8'>";
$dblocation='localhost'; //mainīgais
#$dbuser='';
#$dbpasswd="";
//$dbname = "books_db";
$conn = new mysqli($dblocation, $dbuser, $dbpasswd);
if ($conn->connect_error) {
    echo "Nevar savienoties ar DB: " . $conn->connect_error;
      } 
    //else echo "Savienojums ar DB ir izveidots!";
//kodējums DB
//echo "<br/>Kodējums: ". $conn->character_set_name();//apskatiit kodējumu
$conn->set_charset("utf8");//uzliek kodējumu utf8
//echo "<br/>Kodējums: ". $conn->character_set_name();//apskatiit kodējumu
$vaicajums="use goodreadsdb";
$resultats=$conn->query($vaicajums);

/*//--------------------------------------------------
//1.
$vaicajums="select 2+2";
//2.
$resultats=$conn->query($vaicajums);
//3.
$rinda=$resultats->fetch_assoc();
//print_r($rinda);
echo "<br/>".$vaicajums." = ".$rinda["2+2"];


$vaicajums="select pow(2,8)";
$resultats=$conn->query($vaicajums); //objekts
$rinda=$resultats->fetch_assoc(); //1.rezultata rinda
echo "<br/>".$vaicajums." = ".$rinda["pow(2,8)"];
*/

?>