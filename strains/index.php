<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_header.php';
$strain = getAllInfo('strains', 'ln', '%');
$j = 0;
?>
<div class="col-md-offset-4 col-md-4">
  <h3>Всего сортов - <?php echo count($strain); ?></h3>
	<div class="dataTable_wrapper">
	  <table class="table table-striped table-bordered table-hover">
	    <thead>
	      <tr>
	        <th>Сорт</th>
	        <th>Бридер</th>
	      </tr>
	    </thead>
			<?php
				while($j < count($strain)) {
					$j++;
					echo '
					  <tbody>
			        <tr>
			          <td><a href="' . $strain[$j]['ln'] . '">' . $strain[$j]['name'] . '</a></td>
			          <td><a href="/breeder/' . strtolower(str_replace(" ","",$strain[$j]['seedbank'])) . '">'.$strain[$j]['seedbank'].'</a></td>
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