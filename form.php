<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng tin rao bán hàng</title>
	<?php include("database.php") ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="header">
		<div id="logo">
			<a href="form.php"><img src="images/logo-design-kerala.png" width="80px"></a>
		</div>
		<div id="menu">
			<ul>
				<li><a href="#">TRANG CHỦ</a></li>
				<li><a href="#">CÔNG NGHỆ</a></li>
				<li><a href="#">THỜI TRANG</a></li>
				<li><a href="#">PHỤ KIỆN</a></li>
				<li><a href="#">ĐĂNG TIN</a></li>
			</ul>
		</div>
	</div>

	<div id="main-content">

		<h2 class="main-text">VUI LÒNG NHẬP ĐẦY ĐỦ THÔNG TIN VÀO BIỂU MẪU</h2>

		<form id="form-dang-tin" action="action/xlthemhang.php" method="post">
			<div class="form-group">
				<label for="ma-san-pham">Mã sản phẩm:</label>
				<input type="main-text" name="ma_san_pham" id="ma-san-pham" class="form-control">
				<p id="error-ma-san-pham" class="error"></p>
			</div>

			<div class="form-group">
				<label for="ten-san-pham">Tên sản phẩm:</label>
				<input name="ten_san_pham" id="ten-san-pham" maxlength="50" placeholder="VD: iphone X" class="form-control">
			</div>

			<div class="form-group">
				<label>Tình trạng:</label>
				<input type="radio" value="Còn hàng" name="tinh_trang" checked>Còn hàng
				<input type="radio" value="Hết hàng" name="tinh_trang">Hết hàng
			</div>

			<div class="form-group">
				<label for="thuong-hieu">Thương hiệu:</label>
				<select id="thuong-hieu" name="thuong_hieu" class="form-control">
					<?php
					$sth=$conn->prepare('Select * From thuonghieu');
					$sth->execute();
					while($row=$sth->fetch(PDO::FETCH_ASSOC)){
					?>
						<option value=<?= $row['id'] ?>><?= $row['ten'] ?></option>
					<?php
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="loai-hang">Loại hàng:</label>
				<select id="loai-hang" name="loai_hang" class="form-control">
					<?php 
					$sth=$conn->prepare('Select * From loaihang');
					$sth->execute();
					while($row=$sth->fetch(PDO::FETCH_ASSOC)){
					?>
						<option value=<?= $row['id'] ?>><?= $row['ten'] ?></option>
					<?php
					}
					?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="mo-ta">Mô tả:</label>
				<textarea id="mo-ta" name="mo_ta" rows="5" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<label>Màu sắc:</label>
				<?php
				$sth=$conn->prepare('Select * From mausac');
				$sth->execute();
				while($row=$sth->fetch(PDO::FETCH_ASSOC)){
				?>
					<label><input type="checkbox" name="mau_sac" value=<?= $row['id'] ?>><?= $row['ten'] ?></label>
				<?php
				}
				?>
			</div>

			<div class="form-group">
				<label for="ngay-san-xuat">Ngày sản xuất:</label>
				<input type="date" name="ngay_san_xuat" id="ngay-san-xuat" class="form-control">
			</div>

			<div class="form-control">
				<label for="email">Email liên hệ:</label>
				<input type="email" name="email" id="email">
			</div>

			<div class="form-group">
				<label for="dien-thoai">Điện thoại:</label>
				<input type="main-text" name="dien_thoai" id="dien-thoai" class="form-control">
			</div>

			<div class="action">
				<button id="btn-dang-tin" type="submit" class="btn-primary">Đăng tin</button>
			</div>
		</form>
	</div>

	<script type="text/javascript">
		document.getElementById('btn-dang-tin').addEventListener('click', function(e){
			document.getElementById('error-ma-san-pham').innerText = '';
			var $ma_sp=document.getElementById('ma-san-pham').value;
			if($ma_sp==''){
				document.getElementById('error-ma-san-pham').innerText='Vui lòng điền mã sản phẩm';
				document.getElementById('ma-san-pham').focus();
				e.preventDefault();
			}
		})
	</script>
</body>
</html>