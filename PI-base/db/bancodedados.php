<?php

$db_host = "pi-edumax.database.windows.net";
$db_name = "PI-II";
$db_user = "edumaxi";
$db_pass = "megawareS2";
$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";
if(!$db = odbc_connect($dsn, $db_user, $db_pass)){

	echo "ERRO AO CONECTAR AO BANCO DE DADOS";
	exit();
}
?>