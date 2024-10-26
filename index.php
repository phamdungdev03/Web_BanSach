<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Trang chủ - Website bán sách</title>
	<link rel="stylesheet" href="./style.css">
	<link rel="shortcut icon" href="./hinh_anh/Books Store.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
	<?php
	session_start();
	require("./header_page.php");
	?>
	<div class="container">
		<main>

			<?php

			require("./hot_sanpham.php");
			?>

			<?php
			require("./card_sanpham.php");
			?>

		</main>

	</div>
	<?php
	require("./footer.php");
	?>
	<script src="script.js">
	</script>
</body>

</html>