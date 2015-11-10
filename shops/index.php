<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_header.php';
$shops = getAllInfo('shops', 'ln', '%');
$j = 0;
?>
<div class="col-md-offset-4 col-md-4">
 <h3>Всего магазинов - <?php echo count($shops); ?></h3>
  <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Магазин </th>
        <th>Домашняя страница </th>
        <th>Контакты </th>
      </tr>
    </thead>
      <?php 
        while($j < count($shops)) {
          $j++;
          echo '
            <tbody>
              <tr>
                <td><a href="'.$shops[$j]['ln'].'">'.$shops[$j]['name'] . '</a></td>
                <td><a href="'.$shops[$j]['link'].'">home</a></td>
                <td>'.$shops[$j]['contact'].'</td>
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