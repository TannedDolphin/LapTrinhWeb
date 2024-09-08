<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../pages/dangnhap.php');

    exit();
}
?>
<html>
<head>
	<title>GG Shoes | Quản lí sản phẩm</title>
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
				<a href="" class="header__sort-link">Quản lý sản phẩm</a>
			</li>
		</ul>

		<div class="container">
			<div class="grid wide">
				<div class="row sm-gutter grid-content">
					<div class="column l-2 me-0 s-0">
						<nav class="category">
							<h3 class="category-heading">
								<a>Quản lý sản phẩm</a>
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
							<span class="label" style="margin-right: 16px;"><h2><a href="themsp.php" style="color: red; font-size: 30px" >Thêm sản phẩm</a></h2></span>					
						</div>
						<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        $conn = mysqli_connect('localhost', 'root', '', 'dacs2');
 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(id) as total from sanpham');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $result = mysqli_query($conn, "SELECT * FROM sanpham LIMIT $start, $limit");
 
        ?>
						<!-- BÊN DƯỚI LÀ sản phẩm -->
						<div class="d-product">
						<div class="row sm-gutter">
										
						<?php
							while($row=mysqli_fetch_array($result)){
								if ($row['soluong'] > 0){
							echo '<div class="column l-2-4 me-4 s-6" >
							<a class="home-product-item" href="../pages/sanpham.php?id= '.$row['id'].'">>
								<div class="home-product-item__img" style="background-image:url(../'.$row['hinhanh'] .')">
								</div>
								<h4 class="home-product-item__name">'.$row['tensp'].'</h4>
								<div class="home-product-item__price">
									<div class="home-product-item__price-old">'.number_format($row['giasp'],3).'đ</div>
									<div class="home-product-item__price-new">'.number_format($row['giasp']-$row['giasp']*0.25,3).'đ</div>
								</div>
								<div class="home-product-item__action">
									<span class="home-product-item__like home-product-item__liked">
										<i class="home-product-item__like-none far fa-heart"></i>
										<i class="home-product-item__like-fill fas fa-heart"></i>
									</span>
									<div class="home-product-item__rating">
										<i class="home-product-item__star-gold fas fa-star"></i>
										<i class="home-product-item__star-gold fas fa-star"></i>
										<i class="home-product-item__star-gold fas fa-star"></i>
										<i class="home-product-item__star-gold fas fa-star"></i>
										<i class="home-product-item__star-gold fas fa-star"></i>
									</div>
									<span class="home-product-item__sold">Số lượng:'.$row['soluong'].'</span>
								</div>
								
								<div class="home-product-item__favorite">
									<i class="home-product-item__favorite-icon fas fa-check"></i>
									<span>Yêu thích</span>
								</div>
								<div class="home-product-item__sale">
									<span class="home-product-item__sale-percent">25%</span>
									<span class="home-product-item__sale-label">GIẢM
									</span>
								</div>
							</a>
							<ul class="pagination">
								<li>
								<a href="../sanpham/suasp.php?id= '.$row['id'].'">Sửa</a> - <a href="../sanpham/xoasp.php?id= '.$row['id'].'"style ="color: red	" >Xóa</a>
								</li>
							</ul>
						</div>';}
						else {
							echo '<div class="column l-2-4 me-4 s-6" >
							<a class="home-product-item" href="../pages/sanpham.php?id= '.$row['id'].'">>
								<div class="home-product-item__img" style="background-image:url(../'.$row['hinhanh'] .')">
								</div>
								<h4 class="home-product-item__name">'.$row['tensp'].'</h4>
								<div class="home-product-item__price">
									<div class="home-product-item__price-old">'.number_format($row['giasp'],3).'đ</div>
									<div class="home-product-item__price-new">'.number_format($row['giasp']-$row['giasp']*0.25,3).'đ</div>
								</div>
								<div class="home-product-item__action">
									<span class="home-product-item__like home-product-item__liked">
										<i class="home-product-item__like-none far fa-heart"></i>
										<i class="home-product-item__like-fill fas fa-heart"></i>
									</span>
									<div class="home-product-item__rating">
										<i class="home-product-item__star-gold fas fa-star"></i>
										<i class="home-product-item__star-gold fas fa-star"></i>
										<i class="home-product-item__star-gold fas fa-star"></i>
										<i class="home-product-item__star-gold fas fa-star"></i>
										<i class="home-product-item__star-gold fas fa-star"></i>
									</div>
									<span class="home-product-item__sold">Số lượng: Hết hàng</span>
								</div>
								
								<div class="home-product-item__favorite">
									<i class="home-product-item__favorite-icon fas fa-check"></i>
									<span>Yêu thích</span>
								</div>
								<div class="home-product-item__sale">
									<span class="home-product-item__sale-percent">25%</span>
									<span class="home-product-item__sale-label">GIẢM
									</span>
								</div>
							</a>
							<ul class="pagination">
								<li>
								<ul class="pagination">
								<li>
								<a href="../sanpham/suasp.php?id= '.$row['id'].'">Sửa</a> - <a href="../sanpham/xoasp.php?id= '.$row['id'].'"style ="color: red	" >Xóa</a>
								</li>
							</ul>
								</li>
							</ul>
						</div>';	
						}
						}
						?>
						
								</div>
								</div>
						<!-- BÊN trên LÀ sản phẩm -->
						<div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="../sanpham/quanlysp.php?page='.($current_page-1).'"> <font size="6px">
					<i class="page-control-icon fas fa-angle-left"></i></font>
			</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span><font size="6px">'.$i.'</font></span> | ';
                }
                else{
                    echo '<a href="../sanpham/quanlysp.php?page='.$i.'"><font size="6px">'.$i.'</font></a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="../sanpham/quanlysp.php?page='.($current_page+1).'">  <font size="6px">
					<i class="page-control-icon fas fa-angle-right"></i></font></a> ';
            }
           ?>
        </div>
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