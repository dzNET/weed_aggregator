<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_header.php';
$breeder = getAllInfo('breeders', 'ln', '%');
$j = 0;
?>
<div class="col-md-offset-3 col-md-6">
 <h3>Всего бридеров - <?php echo count($breeder); ?></h3>
	<div class="dataTable_wrapper">
	  <table class="table table-striped table-bordered table-hover">
	    <thead>
	      <tr>
	        <th>Бридер</th>
	        <th>Домашняя страница</th>
	      </tr>
	    </thead>
			<?php 
				while($j < count($breeder)) {
					$j++;
					echo '
					  <tbody>
			        <tr>
			          <td><a href="' . $breeder[$j]['ln'] . '">' . $breeder[$j]['name'] . '</a></td>
			          <td><a href="' . $breeder[$j]['link'] . '">home</a></td>
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