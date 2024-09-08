<?php
session_start();
?>

<html>
<head>
	<title>GG Shoes | Thanh toán</title>
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
				<a href="" class="header__sort-link">Thanh toán</a>
			</li>
		
		</ul>

	
					
						<!-- BÊN DƯỚI LÀ sản phẩm -->
                        <div align = "center">
      <h4>Chúc mừng bạn đã mua hàng thành công</h4>
      <a href="../index.php"><input type="button" value="Quay lại trang chủ"></a>
    </div>
    <?php
        $ngaymua = date('Y-m-d');

        $conn = mysqli_connect("localhost", "root", "", "dacs2");
        $sql ="INSERT INTO donhang(iduser,tongtien,trangthai,ngaymua,diachi) VALUES( $_SESSION[id], $_SESSION[total], 'Đã thanh toán','$ngaymua','$_SESSION[diachi]')";
        $ketqua=mysqli_query($conn,$sql);
        $id =  mysqli_insert_id($conn);
       


        foreach ($_SESSION['cart'] as $key => $value)
        {
            $sql = "INSERT INTO chitietdonhang(iddonhang, idsp, soluong) VALUES ($id, $key, $value)";
            $ketqua1 = mysqli_query($conn, $sql);

            $sql = "UPDATE sanpham SET soluong = soluong - $value Where id = $key";
            $ketqua2 = mysqli_query($conn, $sql);

            $sql = "UPDATE thongke SET tongtien = tongtien + $_SESSION[total], soluongsp=soluongsp+$value  Where id=1";
            $ketqua2 = mysqli_query($conn, $sql);
        }
        
        unset($_SESSION['cart']);
    ?>
  </div>
						<!-- BÊN trên LÀ sản phẩm -->
								
							</div>	
						</div>

						
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