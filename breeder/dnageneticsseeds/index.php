<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_header.php';
?>
<div class="col-md-offset-4 col-md-4">
  <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Stamm</th>
        </tr>
      </thead>
      <?php
        $breederName = basename(realpath("."));
        $brInfo  = getInfo('breeders', $breederName);
        echo '<img align="left" src="'.$brInfo['img'].'"/><h3 align="center">'.$brInfo['name'].'</h3><p align="center">'.$brInfo['description'].'</p>';
        echo '<a href="'.$brInfo['link'].'"> >> Homepage </a>';
        $brStamm = getAllInfo('strains', 'ln', $breederName);
        $j = 0;
        while($j < count($brStamm)) {
          $j++;
          echo '
            <tbody>
              <tr>
                <td><a href="' . $brStamm[$j]['ln'] . '">' . $brStamm[$j]['name'] . '</a></td>
              </tr>
            </tbody>
          ';
        }
      ?>
        </table>
  </div>
</div>
<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_footer.php';
?>