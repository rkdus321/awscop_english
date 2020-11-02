<?php
	$conn=mysqli_connect('localhost','pjuser','1234','awscop');
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
		<p>Search By Name</p>
		<p>
			<form action="search.php" method="post">
				<input type="text" name="name" placeholder="Name">
				<input type="submit" value="Search">
			</form>
		</p>
		<table>
    		<thead>
      			<tr>
        			<th>id</th><th>Name</th><th>Position</th><th>Base_Pay</th><th>Extra_Pay</th><th>Tax_Rate</th><th>Salary</th><th></th><th></th>
     			</tr>
    		</thead>
      		<?php
	        	$sql = "SELECT * FROM employee_salary";
		        $result = mysqli_query($conn, $sql);
		        while( $row = mysqli_fetch_array($result)) {
		          	$filtered = array(
			            'id' => htmlspecialchars($row['id']),
			            'name' => htmlspecialchars($row['name']),
			            'position' => htmlspecialchars($row['position']),
			            'base' => htmlspecialchars($row['base_pay']),
			            'extra' => htmlspecialchars($row['extra_pay']),
			            'tax' => htmlspecialchars($row['tax_rate']),
			            'salary' => htmlspecialchars($row['salary'])
		        	);
	      	?>
    		<tbody>
			<tr>
			    <td><?= $filtered['id'] ?></td>
			    <td><?= $filtered['name'] ?></td>
			    <td><?= $filtered['position'] ?></td>
			    <td><?= $filtered['base'] ?></td>
			    <td><?= $filtered['extra'] ?></td>
			    <td><?= $filtered['tax'] ?></td>
			    <td><?= $filtered['salary'] ?></td>
			    <td><a href="update.php?id=<?php echo $filtered['id'] ?>">수정</a></td>
          		<td>
            		<form action="delete.php" method="post" onsubmit="if(!confirm('Sure?')){return false;}">
              			<input type="hidden" name="id" value="<?= $filtered['id'] ?>">
              			<input type="submit" value="delete">         
            		</form>
            	</td>
			</tr>
        	<?php
            	}
        	?>
  		</table>
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