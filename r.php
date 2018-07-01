<html>
<center>
<h1>Simple Url Shortener</h1>
<form method=POST>
<input name=u placeholder=https://google.com>
<input type=submit>
<br>

<?php

// Simple Url Shortener
// By Viloid
// sec7or ~ Surabaya Hacker Link

if(isset($_POST['u'])){
$id = acak(6);
$u = $_POST['u'];
sv("db.txt",$id.'="'.$u.'"');
print "<a href=".$_SERVER['PHP_SELF']."?x=".$id.">".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?x=".$id."</a>";
}

if(isset($_GET['x'])){
$g = $_GET['x'];
$f = file_get_contents("db.txt");
preg_match('/'.$g.'="(.*?)"/',$f,$d);
// Logger ip visitor
sv("logip.txt",date('d-M-Y H:i:s')." | ".$_SERVER['REMOTE_ADDR']." | ".$d[1]);
header('location: '.$d[1]);
}

function acak($p){ 
$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
$cp = strlen($chars); 
$res = '';
for($i=0;$i<$p;$i++){ 
$res .= $chars[rand(0,$cp-1)];
} 
return $res; 
}

function sv($l,$d){
$fp = fopen($l, 'a');
fwrite($fp,$d."\n");
fclose($fp);
}
