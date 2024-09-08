<?php
session_start();

$connect = mysqli_connect("localhost","root","","dacs2") or die('Not connect');
date_default_timezone_set("Asia/Bangkok"); // Thiết lập múi giờ chuẩn
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['submit'])) {
    if ($_FILES['uploadFile']['name'] != NULL) {
        // Kiểm tra file up lên có phải là ảnh không
        if ($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
            
            // Nếu là ảnh tiến hành code upload
            $path = "img/"; // Ảnh sẽ lưu vào thư mục images
            $tmp_name = $_FILES['uploadFile']['tmp_name'];
            $name = $_FILES['uploadFile']['name'];
            // Upload ảnh vào thư mục images
            move_uploaded_file($tmp_name, $path . $name);
            $hinhanh = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                      // Insert ảnh vào cơ sở dữ liệu
          
           
}


  $tensp = $_POST['tensp'];
  $giasp = $_POST['giasp'];
  $mota = $_POST['mota'];
  $soluong = $_POST['soluong'];
  $iddanhmuc = $_POST['iddanhmuc'];

  $conn =	mysqli_connect("localhost", "root", "", "dacs2");
  $sql= "INSERT INTO sanpham (tensp, giasp, mota,hinhanh,soluong,iddanhmuc) VALUES ('$tensp',  $giasp, '$mota','$hinhanh',$soluong,$iddanhmuc)";
  $ketqua = mysqli_query($conn, $sql);
  }}
  mysqli_close($conn);
  header("location: ../sanpham/quanlysp.php");
}
?>
<html>
<head>
	<title>GG Shoes | Thêm sản phẩm</title>
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
								<a href="themsp.php">Thêm sản phẩm</a>
							</h3>
							<ul class="category-list">
								<li class="category-item category-item--active">
									<a href="../sanpham/quanlysp.php" ><- Quay lại </a>
								</li>
							</ul>
						</nav>
					</div>
				
						<!-- BÊN DƯỚI LÀ sản phẩm -->
				<div class="product-detail-decribe" align="center">
					<div class="product-detail-describe__detail">  
					<table>
	<form action="" enctype="multipart/form-data" method="POST">
	<tr> <td>	Tên sản phẩm: </td>
	<td><input type="text" name="tensp" size="100"></td>
	</tr>
	<tr> 	<td>Giá sản phẩm:      </td>
	<td><input type="text" name="giasp" size="100"></td>
	</tr>
	<tr> 	<td>Mô tả: 	  </td>
  <td ><textarea name="mota" id="editor" cols="30" rows="10"></textarea></td>
  <script type="text/javascript"  name="mota">
        ClassicEditor.create( document.querySelector( '#editor' ) )
  </script>
  </tr>

  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong" size="100"></td>
  </tr>

  <tr> 	
    <td>Hình ảnh: </td>
    <td>Chọn file ảnh: <input type="file" name="uploadFile"><br></td>
	</tr>

  <tr>
    <td>Danh mục</td>
    <td>
  <select name="iddanhmuc">
			<?php 
				$conn2 =	mysqli_connect("localhost", "root", "", "dacs2");
				$sql2= "SELECT * FROM danhmuc";
				$ketqua2 = mysqli_query($conn2, $sql2);
				while($row2 = mysqli_fetch_array($ketqua2))
				{
					echo '<option value = "'.$row2['id'].'">'.$row2['tendanhmuc'].'</option>';
				}
			?>
		</select>
    </td>
  </tr>
  
	<tr>
		<td></td>	 
 <td align="center"> <input type="submit" name="submit"  value="Thêm sản phẩm" ></td>
         
	</tr>
		         
	</form>
	</table>
  </div>
					</div>	
				</div>
				</div>	
				</div>
										<!-- BÊN trên LÀ sản phẩm -->
		<div class="footer">
			<div class="grid wide">
				<div class="row">
					<div class="column l-2-4 me-4 s-6">
						<h3 class="footer__heading">Chăm sóc khách hàng</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="" class="footer-item-link">Trung tâm trợ giúp</a>
							</li>
							<li class="footer-item">
								<a href="" class="footer-item-link">TT Mail</a>
							</li>
							<li class="footer-item">
								<a href="" class="footer-item-link">Hướng dẫn mua hàng</a>
							</li>
						</ul>
					</div>
					<div class="column l-2-4 me-4 s-6">
						<h3 class="footer__heading">Giới thiệu</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="" class="footer-item-link">Giới thiệu</a>
							</li>
							<li class="footer-item">
								<a href="" class="footer-item-link">Tuyển dụng</a>
							</li>
							<li class="footer-item">
								<a href="" class="footer-item-link">Điều khoản</a>
							</li>
						</ul>
					</div>
					<div class="column l-2-4 me-4 s-6">
						<h3 class="footer__heading">Tiêu chí</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a  class="footer-item-link">Chất lượng</a>
							</li>
							<li class="footer-item">
								<a  class="footer-item-link">Giá tốt nhất</a>
							</li>
							<li class="footer-item">
								<a  class="footer-item-link">Tất cả vì khách hàng</a>
							</li>
						</ul>
					</div>
					<div class="column l-2-4 me-4 s-6">
						<h3 class="footer__heading">Theo dõi</h3>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="" class="footer-item-link">
									<i class="fab fa-facebook"></i>
									Facebook
								</a>
							</li>
							<li class="footer-item">
								<a href="" class="footer-item-link">
									<i class="fab fa-instagram"></i>
									Instagram
								</a>
							</li>
						</ul>
					</div>
					<div class="column l-2-4 me-4 s-6">
						<h3 class="footer__heading">Liên hệ với chúng tôi</h3>
						<input class="footer__input" type="text" placeholder="Email address">
						<input type="submit" value="Gửi">
					</div>
				</div>
			</div>
			<div class="footer__bottom">
				<div class="grid wide">
					<p>© 2021 - Bản quyền thuộc về công ty TT Shoes</p>
				</div>
			</div>
		</div>
		<div class="scroll-to-top" onclick="scrollToTop();">
			<i class="scroll-to-top-icon fas fa-chevron-up"></i>
		</div>
	</div>
</body>

</html>