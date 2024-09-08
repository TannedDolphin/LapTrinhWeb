<?php
session_start();
?>

<html>
<head>
	<title>GG Shoes | Liên hệ</title>
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

	
					
						<!-- BÊN DƯỚI LÀ sản phẩm -->
		<style>
        .footer{
            font-size: 18;
        }
        .h3{
            text-align: center;
            color: red;
        }
        .h4{
            color: blue;
        }
        </style>
		<div class="footer">
			<div class="grid wide">
                <h3 class="h3">Liên hệ Website bán giày online</h3><br>
                <div>
                   <p>Facebook: <a href="../index.php">Cửa hàng giày GG Shoes</a></p> 
                </div>
                <div class="contact">
						<p>Hotline: 0123456789</p>
						<p>Email: <a href="mailto:22H1120032@gmail.com" style="color: #333;">GGShop@gmail.com</a></p>
				</div>
               <p>Mọi thắc mắc hay đóng góp ý kiến xin khách hàng hãy liên hệ với cửa hàng chúng tôi!</p>
               <p>Cảm ơn quý khách đã tin tưởng cửa hàng!</p>



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