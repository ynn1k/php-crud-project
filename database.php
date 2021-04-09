<?php

$pdo = new PDO('mysql:host=db001229.mydbserver.com;port=3306;dbname=usr_p584568_1','p584568d1', '2of-o2ku_ykqtM');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;
