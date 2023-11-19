<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<title>Procedūras</title>
<link rel="stylesheet" href ="stili.css"> 
</head>
<body>
<a href = "books.html">Atpakaļ</a>
<h3>3 procedūras</h3>

<h4>1. Procedūra </h4>
<p>Procedūra, kurā ievada grāmatas nosaukumu un tā izvadīs, vai tā ir laba grāmata. </p>
<pre> 
DROP PROCEDURE IF EXISTS cikLabaGrāmata; 
DELIMITER $$
CREATE PROCEDURE cikLabaGrāmata(nosaukums text)
BEGIN 
        SET @field = nosaukums;
        SET @text=CONCAT('select vērtējums into @x from grāmatas, reitings
where reitings.idreitings = grāmatas.idreitings and nosaukums = "', @field, ' "');
		PREPARE stmt from @text;
		EXECUTE stmt;
        IF (@x=1) then SELECT "Nevienam neieteiktu" as 'Vērtējuma apraksts';
		ELSEif(@x=2) then
			SELECT "Nav laba grāmata" as 'Vērtējuma apraksts';
		ELSEif(@x=3) then
			SELECT "Viduvēja grāmata" as 'Vērtējuma apraksts';
		ELSEif(@x=4) then
			SELECT "Laba grāmata" as 'Vērtējuma apraksts';
		else select "Lieliska grāmata!" as 'Vērtējuma apraksts';
		END IF;
end
$$ DELIMITER ;
CALL cikLabaGrāmata("The Stranger");

</pre>

<h4>2. Procedūra </h4>
<p>Procedūra, kas izvadīs grāmatas biezumu, ja ievadīs tas id. </p>
<pre> 
DROP PROCEDURE IF EXISTS cikBiezaGrāmata; 
DELIMITER $$
CREATE PROCEDURE cikBiezaGrāmata(id int)
BEGIN 
        SET @field = id;
        SET @text=CONCAT('select lpp_skaits into @x from grāmatas where idgrāmatas = ', @field);
		PREPARE stmt from @text;
		EXECUTE stmt;
        IF (@x < 100) then SELECT "Ļoti plāna" as 'Grāmatas biezums';
		ELSEif(@x < 300) then
			SELECT "Vidēja grāmata" as 'Grāmatas biezums';
		ELSEif(@x < 500) then
			SELECT "Bieza grāmata" as 'Grāmatas biezums';
		ELSEif(@x > 500) then
			SELECT "Ļoti bieza grāmata" as 'Grāmatas biezums';
		END IF;
end
$$ DELIMITER ;
CALL cikBiezaGrāmata(232);

</pre>

<h4>3. Procedūra </h4>
<p>Ievadod valsts id, izvada visus autorus no attiecīgās valsts </p>
<pre> 
DROP PROCEDURE IF EXISTS kadiAutori; 
DELIMITER $$
CREATE PROCEDURE kadiAutori(id int)
BEGIN 
        SET @field = id;
        SET @text=CONCAT('select uzvārds, vārds, valstis.nosaukums from autori, valstis where valstis.idvalstis=autori.idvalstis
		and valstis.idvalstis = ', @field);
		PREPARE stmt from @text;
		EXECUTE stmt;
end
$$ DELIMITER ;
CALL kadiAutori(9);

</pre>

<br>
<form action="proceduras_rezultats.php" method="post">
<label for="ieraksts"><b>Ievadiet proceduru: </b></label>
<br>
<textarea name="ieraksts" required rows="4" cols="80"></textarea>
<br><br>
<input type="submit" value="Proceduras izpilde">
</form>

</body>
</html>