<?php
require_once 'MesinFactory.php';
require_once 'BahanBakuFactory.php';
require_once 'OperatorFactory.php';
require_once 'ProduksiFactory.php';
require_once 'QualityCheckFactory.php';

$mesin = new MesinFactory();
$bahan = new BahanBakuFactory();
$operator = new OperatorFactory();
$produksi = new ProduksiFactory();
$qcheck = new QualityCheckFactory();

$mesin->createMany(5);
$bahan->createMany(5);
$operator->createMany(5);
$produksi->createMany(10);
$qcheck->createMany(10);

echo "Data dummy produksi berhasil dibuat!";
?>
