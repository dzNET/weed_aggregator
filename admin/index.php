<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"].'/inc/_header.php';
if (!isset($_SESSION['login'])) {
	if (isset($_POST['username'])) { $login 	 = $_POST['username']; if ($login 	 == '') { unset($login);} } 
	if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') { unset($password);} }
	if ($login && $password) {
	  $login 		= htmlspecialchars($login);
	  $password = htmlspecialchars($password);
	  $login 		= trim($login);
	  $password = trim($password);

	  $mysqli 	= connectDB();
	  $query 		= "SELECT *  FROM admins WHERE login = '$login'";
	  $record 	= $mysqli->query($query);
	  if ($record->num_rows == 0) {
      echo '
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Пользователь не найден!
        </div>
      ';
	  }
	  else {
	  	$res = $record->fetch_assoc();
      if ($res['password'] == $password) {
        $_SESSION['login'] =  $login;
        header('Location: /admin/index.php');
      }
      else {
        echo '
          <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Не верный пароль!!
          </div>
        ';
      }
	  }
	}
	?>
	<div class="col-md-offset-4 col-md-4">
		<div class="login-panel panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Войдите под админом</h3>
		  </div>
		  <div class="panel-body">
		    <form role="form" action="index.php" method="post">
		      <fieldset>
						<div class="form-group">
						  <input class="form-control" required placeholder="Логин" name="username" type="text" autofocus>
						</div>
						<div class="form-group">
						  <input class="form-control" required placeholder="Пароль" name="password" type="password" value="">
						</div>
						<button type="submit" class="btn btn-lg btn-success btn-block" data-target="#myModal" data-toggle="modal">Войти</button>
		      </fieldset>
		    </form>
		  </div>
		</div>
	</div>
<?php } 
if (isset($_SESSION['login'])) { ?>
	<h3>Панель Администратора</h3>
	<hr/>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h5><strong>добавить новый прайс</strong></h5>
			<?php 
				if (isset($_POST['price'])) {
					$des = getAllInfo('strains', 'ln', strtolower(str_replace(" ","",$_POST['sr_stamm'])));
					$pr_param = array(
						$shop					= $_POST['sr_shop'],
						$good					= $_POST['sr_stamm'],
						$pres					= $_POST['sr_pres'],
						$price1				= $_POST['sr_price1'].' '.$_POST['sr_price1val'],
						$price2				= $_POST['sr_price2'].' '.$_POST['sr_price2val'],
						$description	= json_encode($des, JSON_UNESCAPED_UNICODE)
					);
					if (insertPrice($pr_param)) {
						echo '
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				      ЗАВЕРШЕНО!<br />
				    </div>';
					}
					else {
			  		echo '
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			        Такая запись уже есть....<br />
			      </div>';
					}
				}
			?>
			<form method="post">
				<select name="sr_stamm" required>
					<option selected disabled>Выберите Сорт</option>
					<?php get_option('strains'); ?>
				</select>
				<select name="sr_shop" required>
					<option selected disabled>Выберите Магазин</option>
					<?php get_option('shops'); ?>
				</select>
		    <label><input type="radio" name="sr_pres" value="yes" checked> Yes </label>
		    <label><input type="radio" name="sr_pres" value="no"> No </label>
				<input name="sr_price1" type="text" required placeholder="цена за 1 семочку" />
				<select name="sr_price1val" required>
					<option selected>RUB</option>
					<option>UAH</option>
					<option>USD</option>
				</select>
				<input name="sr_price2" type="text" required placeholder="цена за 3 семочки" />
				<select name="sr_price2val" required>
					<option selected>RUB</option>
					<option>UAH</option>
					<option>USD</option>
				</select>
				<input name="price" type="submit" value="Добавить" />
			</form>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-4">
			<h5><strong>добавить новый сидбанк</strong></h5>
			<?php
				if (isset($_POST['breeder'])) {
					$br_param = array(
						$name 				= $_POST['brname'],
						$link				  = $_POST['brlink'],
						$description	= $_POST['brdes'],
						$ln 					= '/breeder/'.strtolower(str_replace(" ","",$_POST['brname'])),
						$img  				= $_POST['brimg']
					);
				  $dir     = $_SERVER["DOCUMENT_ROOT"].$ln;
				  $file    = $_SERVER["DOCUMENT_ROOT"].'/_new/breeder/index.php';
				  $cpfile  = $dir.'/index.php';
				  if (!is_dir($dir)) {
				    mkdir($dir, 0777, true);
				  }
				  if (!file_exists($cpfile)) {
				    if (!copy($file, $cpfile)) {
				  		echo '
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				        Не удалось добавить Бридера...<br />
				      </div>';
				    }
				    else {
							if (insertItem('breeders', $br_param)) {
								echo '
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						      ЗАВЕРШЕНО!<br />
						    </div>';
							}
							else {
					  		echo '
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					        Ошибка базы...<br />
					      </div>';
							}
				    }
				  }
				  else { echo '
						<div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				      Бридер уже существует!<br />
				    </div>';
				  }
				}
			?>
			<form method="post">
				<input name="brname" type="text" required placeholder="название сидбанка" />
				<input name="brlink" type="url" required placeholder="ссылка на домашнюю" /><br/>
				<input name="brimg" type="url" required placeholder="ссылка на картинку" />
				<textarea name="brdes" rows="6" cols="22" required placeholder="Описание сидбанка... максимум 300 символов!"></textarea><br/>
				<input name="breeder" type="submit" value="Добавить" />
			</form>
		</div>
		<div class="col-md-4">
			<h5><strong>добавить новый магазин</strong></h5>
			<?php 
				if (isset($_POST['shop'])) {
					$sh_param = array(
						$name					= $_POST['shname'],
						$link					= $_POST['shlink'],
						$contact			= $_POST['shcont'],
						$description	= $_POST['shdes'],
						$ln						= '/shops/'.strtolower(str_replace(" ","",$name)),
						$img 					= $_POST['shimg']
					);
				  $dir     = $_SERVER["DOCUMENT_ROOT"].$ln;
				  $file    = $_SERVER["DOCUMENT_ROOT"].'/_new/shop/index.php';
				  $cpfile  = $dir.'/index.php';
				  if (!is_dir($dir)) {
				    mkdir($dir, 0777, true);
				  }
				  if (!file_exists($cpfile)) {
				    if (!copy($file, $cpfile)) {
				  		echo '
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				        Не удалось добавить Магазин...<br />
				      </div>';
				    }
				    else {
							if (insertItem('shops', $sh_param)) {
								echo '
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						      ЗАВЕРШЕНО!<br />
						    </div>';
							}
							else {
					  		echo '
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					        Ошибка базы...<br />
					      </div>';
							}
				    }
				  }
				  else { echo '
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				      Магазин уже существует!<br />
				    </div>';
				  }
				}
			?>
			<form method="post">
				<input name="shname" type="text" required placeholder="название магазина" />
				<input name="shlink" type="url" required placeholder="ссылка на домашнюю" />
				<input name="shimg" type="url" required placeholder="ссылка на картинку" />
				<input name="shcont" type="text" required placeholder="контакты" />
				<textarea name="shdes" rows="6" cols="22" required placeholder="Описание магазина... максимум 300 символов!"></textarea><br/>
				<input name="shop" type="submit" value="Добавить" />
			</form>
		</div>
		<div class="col-md-4">
			<?php 
				if (isset($_POST['stamm'])) {
					$st_param = array(
						$stamm 				= $_POST['stname'],
						$seedbank			= $_POST['seedbank'],
						$type					= $_POST['type'],
						$genetic			= $_POST['genetic'],
						$harvest			= $_POST['harv'],
						$flowering		= $_POST['flow'],
						$thc					= $_POST['thc'],
						$sain					= $_POST['sain'],
						$description	= $_POST['stdes'],
						$ln						= '/breeder/'.strtolower(str_replace(" ","",$seedbank)).'/'.strtolower(str_replace(" ","",$stamm)),
						$img 					= $_POST['stimg']
					);
				  $dir     = $_SERVER["DOCUMENT_ROOT"].$ln;
				  $file    = $_SERVER["DOCUMENT_ROOT"].'/_new/stamm/index.php';
				  $cpfile  = $dir.'/index.php';
				  if (!is_dir($dir)) {
				    mkdir($dir, 0777, true);
				  }
				  if (!file_exists($cpfile)) {
				    if (!copy($file, $cpfile)) {
				  		echo '
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				        Не удалось добавить Cорт..<br />
				      </div>';
				    }
				    else {
							if (insertItem('strains', $st_param)) {
								echo '
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						      ЗАВЕРШЕНО!<br />
						    </div>';
							}
							else {
					  		echo '
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					        Ошибка базы...<br />
					      </div>';
							}
				    }
				  }
				  else { echo '
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				      Сорт уже существует!<br />
				    </div>';
				  }
				}
			?>
			<h5><strong>добавить новый сорт</strong></h5>
			<form method="post">
				<input name="stname" type="text" required placeholder="название сорта" /><br/>
				<select name="seedbank" required>
					<option selected disabled>Выберите Бридера</option>
					<?php get_option('breeders'); ?>
				</select><br/>
				<input name="stimg" type="url" required placeholder="ссылка на картинку" />
				<input name="type" type="text" required placeholder="тип" />
				<input name="genetic" type="text" required placeholder="генетика" />
				<input name="harv" type="text" required placeholder="Сбор урожая" />
				<input name="flow" type="text" required placeholder="Цветение" />
				<input name="thc" type="text" required placeholder="ТГК" />
				<input name="sain" type="text" required placeholder="Sativa / Indica" /><br/>
				<textarea name="stdes" rows="6" cols="22" required placeholder="Описание сорта...      максимум 300 символов!"></textarea><br/>
				<input name="stamm" type="submit" value="Добавить" />
			</form>
		</div>
	</div>
	<hr/>
<?php }
include $_SERVER["DOCUMENT_ROOT"].'/inc/_footer.php';
?>
