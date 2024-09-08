<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$password = $_POST['password'];


	$conn =	mysqli_connect("localhost", "root", "", "dacs2");
	$sql = "UPDATE taikhoan SET password='$password' WHERE id=".$_GET['id'];
	$ketqua2 = mysqli_query($conn, $sql);
	mysqli_close($conn);
	header("location: ../taikhoan.php");
}
?>
<html>
<head>
	<title>GG Shoes | Trang chủ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/grid.css">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script type="text/javascript" src="../javascript.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

</head>
<body>
<form action="" method="POST">
	<div class="app">
	<?php
    include '../filter/header2.php';
?>
		</form>
		<form action="" method="POST">
		<?php
	include '../filter/header-mobile.php';
?>
</form>
		

<?php
    include '../filter/navigation-bar2.php';
?>

		

		<ul class="header__sort-bar">
			<li class="header__sort-item">
				<a href="" class="header__sort-link">Liên quan</a>
			</li>
			<li class="header__sort-item">
				<a href="" class="header__sort-link">Mới nhất</a>
			</li>
			<li class="header__sort-item">
				<a href="" class="header__sort-link">Bán chạy</a>
			</li>
			<li class="header__sort-item">
				<a href="" class="header__sort-link">Giá</a>
			</li>
		</ul>

		<div class="container">
			<div class="grid wide">
				<div class="row sm-gutter grid-content">
					<div class="column l-2 me-0 s-0">
						<nav class="category">
							<h3 class="category-heading">
								<p align="center">***</p>
								<a href="themdm.php">Đổi mật khẩu</a>
								<p></p>
								<p align="center">***</p>
							</h3>
							<ul class="category-list">
								<li class="category-item category-item--active">
									<a href="./quanlydm.php" ><- Quay lại </a>
								</li>
							</ul>
						</nav>
					</div>
				
						<!-- BÊN DƯỚI LÀ sản phẩm -->
				<div class="product-detail-decribe" >
					<div class="product-detail-describe__detail">  
                    <h1>Đổi mật khẩu</h1>
	<?php
		$conn2 = mysqli_connect("localhost", "root", "", "dacs2");
		$sql2 = "SELECT * FROM taikhoan where id=".$_GET['id'];
		$ketqua = mysqli_query($conn2, $sql2);
		$thongtinsv = mysqli_fetch_array($ketqua);
	?>
<div >
	<form action="" method="POST" >
    <table >
    <tr><td>Nhập mật khẩu mới:     <input type="text" name="password" value="<?php echo $thongtinsv['password']; ?>"></td>	</tr>
	<tr><td align="center">   <input type="submit" value="Đổi mật khẩu"></td>      </tr>
    </table>         
	</form>
	</div>
					</div>	
				</div>
				</div>	
				</div>
										<!-- BÊN trên LÀ sản phẩm -->
<?php
    include '../filter/footer.php';
?>
		<div class="scroll-to-top" onclick="scrollToTop();">
			<i class="scroll-to-top-icon fas fa-chevron-up"></i>
		</div>
	</div>
</body>

</html>