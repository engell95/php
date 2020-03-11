<?php
	//conexion a la base de datos 
	class Database
	{
	    public static function connectDB()
	    {	
	    	//usuario por defecto root sin pass apuntando a la base de datos dbyota!.
	    	try {
 				$pdo = new PDO('mysql:host=localhost;dbname=dbyota', 'root', '');
	        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        	return $pdo;
			} catch (PDOException $e) {
    			echo $e->getMessage();
			}	
	    }
	}
?>