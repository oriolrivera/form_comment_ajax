<?php
//Defino mi variable mensaje
$msg = $_POST['msg'];

//Si no esta vacia
if(!empty($msg)){
   //Conecto con la base de datos
   $cx = mysql_connect("localhost", "user", "password") or die("Error connect: ".mysql_error());
   //Selecciono la base de datos
   mysql_select_db("wall") or die("Error select db: ".mysql_error());
   //Inserto el mensaje al tabla
   mysql_query("INSERT INTO message (message) VALUES ('".$msg."')", $cx);
}
?>