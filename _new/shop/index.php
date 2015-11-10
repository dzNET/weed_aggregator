<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_header.php';
?>
<div class="col-md-offset-4 col-md-4">
  <div class="dataTable_wrapper">
		<?php
      $shop = basename(realpath("."));
      $shInfo  = getInfo('shops', $shop);
      echo '<img align="left" src="'.$shInfo['img'].'"/><h3 align="center">'.$shInfo['name'].'</h3><p align="center">'.$shInfo['description'].'</p>';
      echo '<a href="'.$shInfo['link'].'"> >> Homepage </a><br /><p>'.$shInfo['contact'].'</p>';
		?>
  </div>
</div>
<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_footer.php';
?>