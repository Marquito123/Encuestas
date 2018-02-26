<?php  
$ftp = ftp_connect("ftp.bls.gov");
if (!$ftp) die('could not connect.');

// login
$r = ftp_login($ftp, "anonymous", "");
if (!$r) die('could not login.');

// enter passive mode
$r = ftp_pasv($ftp, true);
if (!$r) die('could not enable passive mode.');

// get listing
$r = ftp_rawlist($ftp, "/pub/time.series/la/");
var_dump($r);
?>