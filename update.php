<?php
	$conn=mysqli_connect('localhost','pjuser','1234','awscop');	

	settype($_GET['id'], 'integer');
	$a=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AWSCOP</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
	<div id="header">
		<div id="logo">
			<a href="index.php"><img src="images/logo.png" alt="LOGO"></a>
		</div><!--logo-->
		<ul id="navigation">
			<li><a href="create.php">Resistration</a></li>
			<li><a href="print.php">View/Modify</a></li>
		</ul><!--navigation-->
	</div><!--header-->
	<div id="contents">
		<p id="inputcenter">Enter Information</p>
		<?php
			$sql="SELECT * FROM employee_salary WHERE id=$a";
			$result=mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$filtered = array(
	            'name' => htmlspecialchars($row['name']),
			    'position' => htmlspecialchars($row['position']),
			    'base' => htmlspecialchars($row['base_pay']),
			    'extra' => htmlspecialchars($row['extra_pay'])
        	);
		?>
		<p>
	  		<form id="inputcenter" action="update_process.php?id=<?php echo $_GET['id'] ?>" method="post">
				<p><input type="text" name="name" placeholder="Name" value="<?= $filtered['name'] ?>"></p>
				<p><input type="text" name="position" placeholder="Position" value="<?= $filtered['position'] ?>"></p>
				<p><input type="text" name="basic" placeholder="Base_Pay" value="<?= $filtered['base'] ?>"></p>
				<p><input type="text" name="extra" placeholder="Extra_Pay" value="<?= $filtered['extra'] ?>"></p>
				<p><input type="submit" value="edit"></p>
			</form>
		</p>
	</div><!--contents-->
	<div id="footer">
		<div id="links">
			<li>
				<h4>When Something Wrong</h4>
				<ul>
					<li>TEL : 0212345678</li>
					<li>E-MAIL : aws123@gmail.com</li>
				</ul>
			</li>
			<li>
				<h4>Social Links</h4>
				<ul id="connect">
					<li>
						<a href="https://twitter.com/" target="_blank">Twitter</a>
					</li>
					<li>
						<a href="https://www.facebook.com/" target="_blank">Facebook</a>
					</li>
				</ul><!--connect-->
			</li>
		</div><!--links-->
		<p class="footnote">
			© 2020. Hong Su Min all rights reserved.
		</p>
	</div><!--footer-->
	</div><!--page-->
</body>
</html>