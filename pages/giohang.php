<?php
session_start();
if(isset($_POST['submit']))
{       $total = $_POST["total"];
        foreach($_POST['qty'] as $key=>$value)
    {
        if( ($value == 0) and (is_numeric($value)))
            {
                unset ($_SESSION['cart'][$key]);
            }
        else if(($value > 0) and (is_numeric($value)))
            {
                $_SESSION['cart'][$key]=$value;
            }
    }
        header("location:../pages/giohang.php");
}
?>

<html>
<head>
	<title>TT Shoes | Trang chủ</title>
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
				<a href="" class="header__sort-link" style="font-size: large;">Giỏ hàng</a>
			</li>
		</ul>
						<!-- BÊN DƯỚI LÀ sản phẩm -->
						
		<div class="footer">
			<div class="grid wide">
						<?php
					$total=0;
					$ok=1;
					if(isset($_SESSION['cart']))
					{
							foreach($_SESSION['cart'] as $k => $v)
						{
							if(isset($k))
							{
							$ok=2;
							}
						}
								}
							if($ok == 2)
					{
							echo "<form action='../pages/giohang.php' method='post'>";
							foreach($_SESSION['cart'] as $key=>$value)
							{
								$item[]=$key;
							}
							$str=implode(",",$item);
							$conn = mysqli_connect("localhost", "root", "", "dacs2");
							$sql ="SELECT * from sanpham where id in ($str)";
							$query=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_array($query))
						{
							echo "<div>";
							echo "<h5>$row[tensp]</h5>";
							echo "Giá sản phẩm: ".number_format($row['giasp'],3)."đ<br />";
							echo "<p align='right'>Số lượng: <input type='text'name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row['id']]}'> - ";
							echo "<a href='../pages/delcart.php?productid=$row[id]'>Xóa</a></p>";
							echo "<p align='right'> Giá tiền cho món hàng: ".number_format($_SESSION['cart'][$row['id']]*$row['giasp'],3)." đ</p>";
							echo "<hr></div>";
							$total += $_SESSION['cart'][$row['id']]*$row['giasp'];    
						}
							echo "<div class='pro' align='right'>";
							echo "<b>Tổng tiền cho các món hàng: <font color='red'>".number_format($total,3)." đ</font></b><hr>";
							$_SESSION['total']= $total;     
					?>

						<a href="../pages/thanhtoan.php" > <p> <input type="button" value="Thanh toán"></p></a>
						
							<?php

							
							echo "<input type='submit' align='left' name='submit' value='Cập nhật giỏ hàng'>";
							echo "<div class='pro' align='center'>";
							echo "<b><a href='../index.php'>Mua sắm tiếp</a> - <a href='../pages/delcart.php?productid=0'>Xóa bỏ giỏ hàng</a></b>";
						
					}
					else
					{
							echo "<div class='pro'>";
							echo "<p align='center'>Bạn không có món hàng nào trong giỏ hàng <br/><a href='../index.php'>Mua giày mới nào!</a></p>";
							echo "</div>";
					}

					?>
   
								</div>
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