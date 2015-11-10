<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_header.php';
?>
<div class="col-md-offset-3 col-md-6">
	<h3>Поиск сорта в магазинах</h3>
	<form method="post">
		<input name="stamm" type="text" placeholder="для примера... test" /><br />
<!--	  <label for="amount">Цветение от </label>
	  <input type="text" id="amount" readonly style="border:0; color:#9E9E9E; font-weight:bold;">
	  <input name="fader" type="hidden" id="fader">
	  <div id="slider"></div><br />-->
		<input type="submit" value="Найти магазин" />
	</form>
	<div class="dataTable_wrapper">
	  <table class="table table-striped table-bordered table-hover">
	    <thead>
	      <tr>
	      	<th>Сорт</th>
	        <th>Магазин</th>
	        <th>Наличие</th>
	        <th>1 seed</th>
	        <th>3 seed</th>
	      </tr>
	    </thead>
			<?php
			if (isset($_POST['stamm'])) {
				connectDB();
				$stammBuy = getAllInfo('search', 'description', $_POST['stamm']);
	      while($j < count($stammBuy)) {
	        $j++;
	        $ln = json_decode($stammBuy[$j]['description']);
	        echo '
	          <tbody>
	            <tr>
	              <td><a href="'.$ln->ln.'">'.$stammBuy[$j]['good'].'</a></td>
	              <td><a href="/shops/'.strtolower(str_replace(" ","",$stammBuy[$j]['shop'])).'">'.$stammBuy[$j]['shop'].'</a></td>
						    <td>'.$stammBuy[$j]['pres']. '</td>
						    <td>'.$stammBuy[$j]['price1']. '</td>
						    <td>'.$stammBuy[$j]['price2']. '</td>
	            </tr>
	          </tbody>
	        ';
	      }
			}
			?>
		    </table>
	</div>
</div>
<?php 
include $_SERVER["DOCUMENT_ROOT"].'/inc/_footer.php';
?>