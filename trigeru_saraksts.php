<?php
require_once("config.php");
echo '<link rel="stylesheet" href ="stili.css">';
echo '
<a href = "books.html">Atpakaļ</a>';


echo "<h2> 3 Trigeru skripti </h2>";
echo "<h3> 1. Trigeris </h3>";
echo ' <pre> 
drop trigger if exists restrict_gads;
DELIMITER $$
CREATE TRIGGER restrict_gads BEFORE INSERT ON lasīšanasgads
FOR EACH ROW
BEGIN
SET NEW.gads=2023;
END
$$ DELIMITER ;
</pre>';
echo "<h3> 2. Trigeris </h3>";
echo ' <pre> 
drop trigger if exists nosaukumaGarums
DELIMITER $$
CREATE TRIGGER nosaukumaGarums BEFORE INSERT ON grāmatas
FOR EACH ROW
BEGIN
if (length(new.nosaukums) > 99) then set new.nosaukums = "Nosaukums par garu!";
END if;
end
$$ DELIMITER ;
</pre>';
echo "<h3> 3. Trigeris </h3>";
echo '
<pre>drop trigger if exists checkYear;
DELIMITER $$
CREATE TRIGGER checkYear BEFORE INSERT ON grāmatas
FOR EACH ROW
BEGIN
if (NEW.izdošanas_gads > 2023) then set NEW.izdošanas_gads = 2023;
END if;
end
$$ DELIMITER ;
</pre>

';

echo'<br>';
echo '
<a href = "tabulas_izvele_ierakstam.php">Trigeru darbības pārbaude</a>';
echo'<br>';
?>