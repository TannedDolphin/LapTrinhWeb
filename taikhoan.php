<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ./pages/dangnhap.php');

    exit();
}
?>
<html>
<head>
	<title>TT Shoes | Tài khoản</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/grid.css">
	<link rel="stylesheet" type="text/css" href="./css/responsive.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script type="text/javascript" src="javascript.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<form action="" method="POST">
	<div class="app">
	<?php
    include 'filter/header.php';
?>
		</form>
		<form action="" method="POST">
		<?php
	include 'filter/header-mobile.php';
?>
</form>
		

<?php
    include 'filter/navigation-bar.php';
?>

		
						<!-- BÊN DƯỚI LÀ sản phẩm -->
				<div class="product-detail-decribe" >
					<div class="product-detail-describe__detail">  
						<style>
				.page{
				max-width: 60em;
				margin: 0 auto;
				}
				table th,
				table td{
				text-align: left;
				}
				table.layout{
				width: 100%;
				border-collapse: collapse;
				}
				table.display{
				margin: 1em 0;
				}
				table.display th,
				table.display td{
				border: 1px solid #B3BFAA;
				padding: .5em 1em;
				}

				table.display th{ background: #D5E0CC; }
				table.display td{ background: #fff; }

				table.responsive-table{
				box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
				}
			</style>
<div class="page">
<table class="layout display responsive-table">
<img class="anh" src="./img/username.png" alt="">

<thead>
<tr>
	<th>Tên tài khoản</th>
	<th >Họ và tên</th>
	<th >Số điện thoại</th>
	<th >Địa chỉ</th>
	<th></th>
</tr>
</thead>
<tbody>
<?php

		echo "<tr>";
		echo "<td>".$_SESSION['username']."</td>";
		echo "<td >".$_SESSION['hoten']."</td>";
		echo "<td >0".$_SESSION['sdt']."</td>";
		echo "<td> ".$_SESSION['diachi']."</td><hr width='40%'>";
		echo '<td><a href=" ./pages/doimk.php?id= '.$_SESSION['id'].'">Đổi mật khẩu</a></td>';
		echo "</tr>";


?>
</tbody>
</table>
</div>
						<div >
							<style>
								.admin{
									text-align: center;
									font-size: 20px;
									color: #2c2c2c;
									letter-spacing: .05em;
									text-shadow: 4px 4px 0px #d5d5d5, 7px 7px 0px rgba(0, 0, 0, 0.2);
									padding-top: 40px;
									font-weight: bold;
								}
							</style>
							<a href="admin.php" class='footer-item-link'><div class="admin"> Quản trị viên</div></a>
						</div>
					</div>	
				</div>
				
						<!-- BÊN trên LÀ sản phẩm -->
						<?php
    include 'filter/footer.php';
?>
		<div class="scroll-to-top" onclick="scrollToTop();">
			<i class="scroll-to-top-icon fas fa-chevron-up"></i>
		</div>
	</div>
</body>

</html>