<!-- <?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ./pages/dangnhap.php');

    exit();
}
?> -->
<html>
<head>
	<title>GG Shoes | Trang chủ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/grid.css">
	<link rel="stylesheet" type="text/css" href="./css/responsive.css">
	<link rel="stylesheet" type="text/css" href="./main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script type="text/javascript" src="./javascript.js"></script>
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
		<div class="slideshow">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  				<ol class="carousel-indicators">
   					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
   					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
   					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
   					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  				</ol>
  				<div class="carousel-inner">
    				<div class="carousel-item active">
    					 <img class="d-block w-100 h-50 h-50" src="https://cf.shopee.sg/file/73cfec97ad7a6b6a5574d404f70cd7f6" alt="First slide">
   					</div>
    				<div class="carousel-item">
      					<img class="d-block w-100 h-50" src="https://cf.shopee.sg/file/c304cae0e031106e356858f48882bdd6" alt="Second slide">
    				</div>
    				<div class="carousel-item">
     					<img class="d-block w-100 h-50" src="https://cf.shopee.sg/file/928775f4fa44e1775763975971144679" alt="Third slide">
   					</div>
   					<div class="carousel-item">
     					<img class="d-block w-100 h-50" src="https://cf.shopee.sg/file/b362f6a1bfe49823caabe068362c4c21" alt="Fourth slide">
   					</div>
  				</div>
  				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
   					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
   					<span class="sr-only">Previous</span>
  				</a>
  				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
   					<span class="carousel-control-next-icon" aria-hidden="true"></span>
   					<span class="sr-only">Next</span>
  				</a>
			</div>
			
		</div>


		<div style="display: flex; align-items: center;" class="container">
			<div class="grid wide">
				<div class="row sm-gutter grid-content">
					<div class="column l-10 me-12 s-12">
						<div class="home-filter">
							<span class="label" style="margin-right: 16px;">Các sản phẩm bán chạy </span>
							
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
						<div class="home-product">
						<div class="row sm-gutter">
						<?php
							while($row=mysqli_fetch_assoc($result)){
								if ($row['soluong'] > 0 ){
							echo '<div class="column l-2-4 me-4 s-6" >
							<a class="home-product-item" href="./pages/sanpham.php?id= '.$row['id'].'">
								<div class="home-product-item__img" style="background-image:url('.$row['hinhanh'] .')">
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
						</div>';}
						else {
							echo '<div class="column l-2-4 me-4 s-6" >
							<a class="home-product-item" href="../pages/sanpham.php?id= '.$row['id'].'">>
								<div class="home-product-item__img" style="background-image:url('.$row['hinhanh'] .')">
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
						</div>';	
						}
						}
						?>
								</div>
								</div>
						<!-- BÊN trên LÀ sản phẩm -->
						
	
		
		<div class="pagenation">
           <?php 
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="./index.php?page='.($current_page-1).'"> <font size="6px">
					<i class="page-control-icon fas fa-angle-left"></i></font>
			</a>  ';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span><font size="6px">'.$i.'</font></span>   ';
                }
                else{
                    echo '<a href="./index.php?page=  '.$i.'  "><font size="6px">'.$i.'</font></a> | ';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="./index.php?page='.($current_page+1).'">  <font size="6px">
					<i class="page-control-icon fas fa-angle-right"></i></font></a>';
            }
           ?>
        </div>
				
		</div>	
						</div>
					</div>					
				</div>
			</div>
		</div>

		<?php
    include 'filter/footer.php';
?>
		<div class="scroll-to-top" onclick="scrollToTop();">
			<i class="scroll-to-top-icon fas fa-chevron-up"></i>
		</div>
	</div>
</body>

</html>