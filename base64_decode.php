<?php
$str='This is an encoded string';
echo base64_encode($str);
echo "<br>";
echo base64_decode('NzI0MDg4NDJkMWJlY2U2YjI1ZDFmZmJhYWYwODZkMjd8MjM0NS5teXNpdGVzLjE1d3ouY29tfDMyNTAzNjgwMDAwfDMuMA==');
echo "<br>";
echo base64_encode("72408842d1bece6b25d1ffbaaf086d27|localhost|32503680000|3.0");
echo "<br>";
echo time();
//NzI0MDg4NDJkMWJlY2U2YjI1ZDFmZmJhYWYwODZkMjd8MjM0NS5teXNpdGVzLjE1d3ouY29tfDMyNTAzNjgwMDAwfDMuMA==
?>
