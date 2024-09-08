<?php
session_start();
if (!$_SESSION['login']) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: ./pages/dangnhap.php');
}
if ($_SESSION['login']&& $_SESSION['login']!='admin') {
    header("location: index.php");
}
?>
<html>
<head>
	<title>TT Shoes | Quản trị viên</title>
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

		<ul class="header__sort-bar">
			<li class="header__sort-item">	
				<a href="" class="header__sort-link">Quản trị viên</a>
			</li>
		</ul>

	
				
						<!-- BÊN DƯỚI LÀ sản phẩm -->
				<div class="product-detail-decribe" style="align-items: center;">
					<div class="product-detail-describe__detail">
						<img src="./img/admin.png" width="200" height="150" alt="" >  
					<h2 style="color: red;" class="a">Quản trị viên</h2>
                    <hr width="500px">
						
						<style>


.page{
  max-width: 60em;
  margin: 0 auto;
}
table th,
table td{
  text-align: center;
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

	</style>
	<div class="page" style = >
<table class="layout display responsive-table">
	<thead>
		<th style="font-size: large;">Các chức năng của Admin</th>
	</thead>
    <tbody>

        <tr>
            <th class="actions">
						<a href="./taikhoan/quanlytk.php">Quản lý tài khoản</a><br>
			</th>
        </tr>
		<tr>
            <th class="actions">
			<a href="./sanpham/quanlysp.php">Quản lý sản phẩm</a><br>
			</th>
        </tr>
		<tr>
            <th class="actions">
			<a href="./donhang/quanlydh.php">Quản lý đơn hàng</a><br>
			</th>
        </tr>
		<tr>
            <th class="actions">
			<a href="./chitietdonhang/quanlyctdh.php">Quản lý chi tiết đơn hàng</a>
			</th>
        </tr>
		<tr>
            <th class="actions">
			<a href="./pages/thongke.php">Thống kê tháng</a>
			</th>
        </tr>

						
            </th>
        </tr>

       

    </tbody>
</table>
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