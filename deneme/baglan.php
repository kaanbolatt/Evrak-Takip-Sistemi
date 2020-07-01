<?php 

try {

	$db=new PDO("mysql:host=localhost;dbname=denemee;charset=utf8",'root','123nk123');
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}


 ?>