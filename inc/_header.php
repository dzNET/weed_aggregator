<?php
function connectDB() {
  $mysqli = new mysqli("host", "user", "password", "db_name");
  if ($mysqli->connect_error) {
    die("Ошибка подключения : " . $mysqli->connect_error);
  }
  return $mysqli;
}

function insertItem($tab, $param){
  $mysqli  = connectDB();
  $ins     = implode("', '", $param);
  $sql = "INSERT INTO $tab VALUES ('$ins')";
  if ($res = $mysqli->query($sql)) {
    $mysqli->close;
    return true;
  }else print_r($mysqli->error);
}

function insertPrice($pr_param){
  $mysqli   = connectDB();
  $query    = "SELECT *  FROM search WHERE shop = '$pr_param[0]' AND good = '$pr_param[1]'";
  $ins = implode("', '", $pr_param);
  $pr_query = "INSERT INTO search VALUES ('$ins')";
  if ($res = $mysqli->query($query)) {
    if ($res->num_rows == 0) {
      if ($req = $mysqli->query($pr_query)) {
        $mysqli->close;
        return true;
      }else print_r($mysqli->error);
    }
  }else print_r($mysqli->error);
}

function get_option($name){
  $mysqli   = connectDB();
  $br_query = "SELECT *  FROM $name WHERE ln LIKE '%'";
  if ($record = $mysqli->query($br_query)) {
    if ($record->num_rows > 0) {
      while ($res = $record->fetch_assoc()) {
        echo '<option value="'.$res['name'].'">'.$res['name'].'</option>';
      }
    }
  } $mysqli->close;
}

function getInfo($tab, $name){
  $mysqli = connectDB();
  $query  = "SELECT *  FROM $tab WHERE ln LIKE '%$name%'";
  if ($res = $mysqli->query($query)) {
    if ($res->num_rows > 0) {
      $info = $res->fetch_assoc();
      $mysqli->close;
      return $info;
    }
  }else print_r($mysqli->error);
}

function getAllInfo($tab, $col, $name){
  $mysqli = connectDB();
  $query  = "SELECT *  FROM $tab WHERE $col LIKE '%$name%'";
  if ($res = $mysqli->query($query)) {
    if ($res->num_rows > 0) {
      $i = 0;
      while ($tmp = $res->fetch_assoc()) {
        $i++;
        $info[$i] = $tmp;
      }
      $mysqli->close;
      return $info;
    }
  }else print_r($mysqli->error);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>test weed agregator</title>
    <meta name  = "viewport" content="width=device-width, initial-scale=1.0">
    <meta name  = "description" content="">
    <meta name  = "author" content="">
    <link href  = "/css/bootstrap.min.css" rel="stylesheet">
    <link rel   = "shortcut icon" href="/img/favicon.png">
    <link href  = "/js/jquery-ui.css" rel="stylesheet">
    <script src = "/js/external/jquery/jquery.js"></script>
		<script src = "/js/jquery-ui.js"></script>
    <style type = "text/css">
      #navi {
        background-color: #E8E8E8;
      }
    </style>
</head> 
<body>
<div class="container">
  <nav id="navi" class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/index.php">Weed Agregator</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/search">Поиск по магазинам</a></li>
          <li><a href="/breeder">Бридеры </a></li>
          <li><a href="/strains">Сорта </a></li>
          <li><a href="/shops">Магазины </a></li>
          <li><a href="/admin">Админка </a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="row">
    <div class="col-md-12">
