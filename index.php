<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Trang chủ - Website bán sách</title>
	<link rel="stylesheet" href="./style.css">
	<link rel="shortcut icon" href="./hinh_anh/logo.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
	<?php
	session_start();
	require("./header_page.php");
	?>
	<div class="container">
		<?php
		require("./hot_sanpham.php");
		?>

	</div>
	<?php 
		require("./thu_moi.php");
	?>

	<div class="container">
		<?php
		require("./card_sanpham.php");
		?>
	</div>
	<?php 
		require("./blog_home.php");
	?>

	<?php
		require("./footer.php");
	?>
	<script src="script.js">
	</script>
</body>

</html>