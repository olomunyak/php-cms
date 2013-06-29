<?php

try {
	$pdo = new PDO('mysql:host=localhost;dbname=cms', 'cms', 'cms');	
} catch (PDOException $e) {
	exit('Database error.');
}


?>