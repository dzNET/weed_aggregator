<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_header.php';
?>
<div class="col-md-offset-4 col-md-4">
  <div class="dataTable_wrapper">
    <?php
      $stamm = basename(realpath("."));
      $stInfo  = getInfo('strains', $stamm);
      echo '<img align="left" src="'.$stInfo['img'].'"/><h3 align="center">'.$stInfo['name'].'</h3><p align="center">'.$stInfo['description'].'</p>';
    ?>
  </div>
</div>
<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_footer.php';
?>