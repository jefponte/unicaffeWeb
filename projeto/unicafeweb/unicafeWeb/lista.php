<?php

include_once './dao/DAO.php';
include_once './dao/UniCafe.php';
include_once './dao/MaquinaLabDao.php';

$unicafe = new UniCafe();
echo $unicafe->dialoga("desliga(LABTI30)");

//$unicafe = new UniCafe();
//echo $unicafe->dialoga("getMaquinas()");
?>