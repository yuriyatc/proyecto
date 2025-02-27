<?php
	$page_title='Agregar producto';
	require_once('includes/load.php');
	page_require_level(2);
	$all_categories=find_all('categories');
	$all_photo=find_all('media');
?>
<?php
	if(isset($_POST['add_product'])){
		$req_fields=array('product-title','product-categorie','product-quantity','buying-price','saleing-price','id_supplier');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_name=remove_junk($db->escape($_POST['product-title']));
			$p_cat=remove_junk($db->escape($_POST['product-categorie']));
			$p_qty=remove_junk($db->escape($_POST['product-quantity']));
			$p_buy=remove_junk($db->escape($_POST['buying-price']));
			$p_sale=remove_junk($db->escape($_POST['saleing-price']));
			$p_supplier=remove_junk($db->escape($_POST['id_supplier']));
			if(is_null($_POST['product-photo'])||$_POST['product-photo']===""){
				$media_id='0';
			}else{
				$media_id=remove_junk($db->escape($_POST['product-photo']));
			}
			$date=make_date();
			$query="INSERT INTO products (";
			$query.=" name,quantity,buy_price,sale_price,categorie_id,media_id,date,id_supplier";
			$query.=") VALUES (";
			$query.=" '{$p_name}','{$p_qty}','{$p_buy}','{$p_sale}','{$p_cat}','{$media_id}','{$date}','{$p_supplier}'";
			$query.=")";
			$query.=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
			if($db->query($query)){
				$session->msg('s',"Producto agregado.");
				redirect('add_product.php',false);
			}else{
				$session->msg('d','Producto no agragado.');
				redirect('product.php',false);
			}
		} else{
			$session->msg("d",$errors);
			redirect('add_product.php',false);
		}
	}
	if(isset($_POST['back'])){
		header("Location: product.php");
	}
?>
<?php include_once('layouts/header.php'); ?>
<center><img src="libs/images/logo.jpg" alt="logo"></center><br>
<div class="row">
	<div class="col-md-12">
		<?php echo display_msg($msg); ?>
	</div>
</div>
<div class="row" style="margin-left:20%;">
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span>
					<span>Agregar producto</span>
				</strong>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<form method="post" action="add_product.php" class="clearfix">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-th-large"></i>
								</span>
								<input type="text" class="form-control" name="product-title" placeholder="Descripción">
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<select class="form-control" name="product-categorie">
										<option value="">Selecciona una categoría</option>
										<?php foreach ($all_categories as $cat): ?>
										<option value="<?php echo (int)$cat['id'] ?>">
										<?php echo $cat['name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-6">
									<select class="form-control" name="product-photo">
										<option value="">Selecciona una imagen</option>
										<?php foreach ($all_photo as $photo): ?>
										<option value="<?php echo (int)$photo['id'] ?>">
										<?php echo $photo['file_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-shopping-cart"></i>
										</span>
										<input type="number" class="form-control" name="product-quantity" placeholder="Cantidad">
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" step="0.01" class="form-control" name="buying-price" placeholder="Precio de compra">
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-usd"></i>
										</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" step="0.01" class="form-control" name="saleing-price" placeholder="Precio de venta">
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-usd"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="glyphicon glyphicon-briefcase"></i>
									</span>
									<input type="number" class="form-control" name="id_supplier" placeholder="Proveedor">
								</div>
							</div>
							<div class="col-md-4">
							</div>
						</div>
						<button type="submit" name="add_product" class="btn btn-danger" style="margin-left:200px">Agregar producto</button>
						<button type="submit" name="back" class="btn btn-primary" style="margin-left:200px">Volver atras</button>
					</form>
				</div>
			</div>
		</div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>