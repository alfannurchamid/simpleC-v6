<?php


require "vendor/autoload.php";

use App\SQLiteConnection as SQLiteConnection;
use App\SQLiteQuerySelect as SQLiteQuerySelect;
use App\SQLiteTabulation;

$pdo = (new SQLiteConnection())->connect();
$sqlite = new SQLiteQuerySelect($pdo);


$pdo1 = (new SQLiteConnection())->connect1();
$selector1 = new SQLiteQuerySelect($pdo1);
$sqlite1 = new SQLiteTabulation($pdo1);

$pdo2 = (new SQLiteConnection())->connect2();
$sqlite2 = new SQLiteQuerySelect($pdo2);
$selector2 = new SQLiteTabulation($pdo2);


?>
<!DOCTYPE html>
<html lang="id">

<head>
  <?php include "inclution/heading.php"; ?>
  <script>
    $(document).ready(function() {
      $(".preloader").fadeOut('slow');


      <?php
      if (isset($_GET["bu"])) {
        if ($_GET["bu"] = "o") {
          echo '$("#hBtn1").modal("show");';
        }
      }

      ?>
    });
  </script>

</head>

<body>


  <?php


  $us = $selector1->getUser();



  foreach ($us as $dtus) {
    $user = $dtus['username_id'];
    $pass = $dtus['password_id'];
    $desaku = $dtus['desa'];
    $kepala = $dtus['kepala'];
    $kab = $dtus['kab'];
  }






  include "inclution/header.php";
  ?>
  <div class="preloader" id="loadIt">
    <div class="loading">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
      <h3><strong>Memuat Data...</strong></h3>
    </div>
  </div>
  <div class="content">

    <?php
    $page = $_GET["page"];
    switch ($page) {
      case "persil":
        $aset = $sqlite->getAsetList();
        $sub = "";
        include_once "rePage/persilA.php";
        break;
      case "warga":
        $tables = $sqlite->getWargaList();
        $title = "DATA LETTER C";
        include_once "rePage/personList.php";
        break;
      case "spptkini":
        $th1 = $sqlite2->getSpptMaxTh();
        foreach ($th1 as $tb1) {
          $th = $tb1['tahun'];
        }
        $tables = $sqlite2->getSpptKini();
        include_once "rePage/spptkini.php";
        break;
      case "sppthap":
        if (isset($_POST['semua'])) {
          $tables = $sqlite2->getSppthapSem();
        } else {
          if (isset($_POST['tahun'])) {
            $th = $_POST['tahun'];
          } else {
            $th1 = $sqlite2->getSpptMaxTh();
            foreach ($th1 as $tb1) {
              $th = $tb1['tahun'];
            }
          }
          $thai = trim($th);
          $tables = $sqlite2->getSppthap($thai);
        }
        include_once "rePage/sppt_hapus.php";
        break;
      case "spptbar":
        if (isset($_POST['semua'])) {
          $tables = $sqlite2->getSpptbarSem();
        } else {
          if (isset($_POST['tahun'])) {
            $th = $_POST['tahun'];
          } else {
            $th1 = $sqlite2->getSpptMaxTh();
            foreach ($th1 as $tb1) {
              $th = $tb1['tahun'];
            }
          }
          $thai = trim($th);
          $tables = $sqlite2->getSpptbar($thai);
        }
        include_once "rePage/sppt_baru.php";
        break;
      case "spptubah":
        if (isset($_POST['semua'])) {
          $tables = $sqlite2->getSpptubahSem();
        } else {
          if (isset($_POST['tahun'])) {
            $th = $_POST['tahun'];
          } else {
            $th1 = $sqlite2->getSpptMaxTh();
            foreach ($th1 as $tb1) {
              $th = $tb1['tahun'];
            }
          }
          $thai = trim($th);
          $tables = $sqlite2->getSpptubah($thai);
        }
        include_once "rePage/sppt_ubah.php";
        break;
      case "petikan":
        $tables = $sqlite->getPetikanList();
        $title = "DATA PETIKAN LETTER C";
        include_once "rePage/personList.php";
        break;
      case "populate":
        include_once "rePage/populate.php";
        break;
      case "kategori":
        $q = $_GET["q"];
        $sub = $q;
        $aset = $sqlite->getAsetByKategori($q);
        include_once "rePage/persilA.php";
        break;
      case "riwayat":
        $q = $_GET["q"];
        $riwayatAset = $sqlite->getRiwayatByaset($q);
        include_once "rePage/persilR.php";
        break;
      case "profiling":
        $q = $_GET["q"];
        $r = $_GET["r"];
        $kolektor = $sqlite->readKolektor($q);
        foreach ($kolektor as $klek) {
          if ($klek['petikan_id'] !== '') {
            $c = $klek['petikan_id'];
          } else {
            $c = '';
          }
        }
        $riwayatAset = $sqlite->getRiwayatByWarga($q, $c);
        $warga = $sqlite->getWargaById($q);
        $aset = $sqlite->getAsetByWarga($q);
        $petikan = $sqlite->getPetikanByWargaId($q);
        $images = $sqlite->readBolob($q);
        include_once "rePage/profiling.php";
        break;
      case "profiling_sppt":
        $nop = $_GET['nop'];
        $riwayatSppt = $sqlite2->getSpptByRiwayatNop($nop);
        $Sppt = $sqlite2->getSpptByNop($nop);

        if (count($Sppt) == 0) {
          $Sppt = $sqlite2->getSpptByNopMin($nop);
        }


        include_once "rePage/profiling_sppt.php";
        break;
      case "tambahkan":
        $asetCount = $sqlite->getAsetCountTotal();
        include_once "rePage/tambahkan.php";
        break;
      case "aturan":
        include_once "rePage/aturan.php";
        break;
      case "home":
        include_once "rePage/home.php";
        break;
      case "sppt":
        $asetCountSppt = $sqlite2->getSpptCountTotal();
        include_once "rePage/sppt.php";
        break;
      case "backup":
        $dir = 'db/';
        $zip_file = 'Backup_simpleC.zip';

        // Get real path for our folder
        $rootPath = realpath($dir);

        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
          new RecursiveDirectoryIterator($rootPath),
          RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
          // Skip directories (they would be added automatically)
          if (!$file->isDir()) {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);

            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
          }
        }

        // Zip archive will be created only after closing object
        $zip->close();


        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($zip_file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zip_file));
        readfile($zip_file);
        break;
    }
    ?>

  </div>
</body>

</html>
<script>