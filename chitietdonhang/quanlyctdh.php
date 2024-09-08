<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../pages/dangnhap.php');

    exit();
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
				<a href="" class="header__sort-link">Chi tiết đơn hàng</a>
			</li>>
		</ul>

		<div class="container">
			<div class="grid wide">
				<div class="row sm-gutter grid-content">
					<div class="column l-2 me-0 s-0">
						<nav class="category">
							<h3 class="category-heading">
								<a >Quản lý chi tiết đơn hàng</a>
							</h3>
							<ul class="category-list">
								<li class="category-item category-item--active">
									<a href="../admin.php" ><- Quay lại </a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="column l-10 me-12 s-12">
						<div class="home-filter">
							<span class="label" style="margin-right: 16px;">  </span>
							<button class="home-filter-btn btn"></button>
							<button class="home-filter-btn btn btn--active"></button>
							<button class="home-filter-btn btn"></button>
						</div>
						
						<!-- BÊN DƯỚI LÀ sản phẩm -->
						<div class="d-product">
						<div class="row sm-gutter">
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
<thead>
<tr>
	<th>STT</th>
	<th >ID đơn hàng</th>
	<th >ID sản phẩm</th>
	<th >Số lượng</th>
	<th colspan="2"></th>
</tr>
</thead>
<tbody>
<?php
	
	$conn =	mysqli_connect("localhost", "root", "", "dacs2");
	$sql= "SELECT * FROM chitietdonhang ";
	$ketqua = mysqli_query($conn, $sql);
	$stt = 1;
	while ($row = mysqli_fetch_array($ketqua)) {
		echo "<tr>";
		echo "<td>".$stt."</td>";
		echo "<td>".$row['iddonhang']."</td>";
		echo "<td>".$row['idsp']."</td>";
		echo "<td>".$row['soluong']."</td>";
		echo '<td><a href=" xoactdh.php?id= '.$row['id'].'">Xóa</a></td>';
		echo "</tr>";
		$stt++;
	}

	mysqli_close($conn);
?>
</tbody>
</table>
</div>
						
								</div>
								</div>
						<!-- BÊN trên LÀ sản phẩm -->
						
							</div>	
						</div>

						<ul class="pagination">
							
						</ul>
					</div>					
				</div>
			</div>
		</div>

		<?php
    include '../filter/footer.php';
?>
		<div class="scroll-to-top" onclick="scrollToTop();">
			<i class="scroll-to-top-icon fas fa-chevron-up"></i>
		</div>
	</div>
</body>

</html>