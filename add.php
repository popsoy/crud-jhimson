<html>
<head>
	<title>Add Data</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<div class="container">
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$cName = $_POST['cName'];
	$address= $_POST['cAddress'];
	$contact= $_POST['cContact'];	
	$pName = $_POST['pName'];
	$pPrice = $_POST['pPrice'];
	$pDesc = $_POST['pDesc'];
	
		
	// checking empty fields
	if(empty($cName) || empty($address) || empty($contact) || empty($pName) || empty($pPrice) || empty($pDesc)) {
		
		if(empty($cName)) {
			echo "<h4 class=\"text-danger\">Customer Name field is empty.</h4><br/>";
		}
		if(empty($address)) {
			echo "<h4 class=\"text-danger\">Address field is empty.</h4><br/>";
		}
		if(empty($contact)) {
			echo "<h4 class=\"text-danger\">Contact field is empty.</h4><br/>";
		}

		if(empty($productname)) {
			echo "<h4 class=\"text-danger\">Product Name field is empty.</h4><br/>";
		}
		
		if(empty($price)) {
			echo "<h4 class=\"text-danger\">Price field is empty.</h4><br/>";
		}

		if(empty($pDesc)) {
			echo "<h4 class=\"text-danger\">Product Description field is empty.</h4><br/>";
		}
		
	
		
		//link to the previous page
		echo "<br/><a class=\"btn btn-primary\" href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO customers(cName, cAddress, cContact, pName, pPrice, pDesc) VALUES(:cName, :cAddress, :cContact, :pName, :pPrice, :pDesc )";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':cName', $cName);
		$query->bindparam(':cAddress', $cAddress);
		$query->bindparam(':stocks', $stocks);
		$query->bindparam(':cContact', $cContact);
		$query->bindparam(':pName', $pName);
		$query->bindparam(':pPrice', $pPrice);
		$query->bindparam(':pDesc', $pDesc);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<h2 class=\"text-success\">Data added successfully.</h2>";
		echo "<br/><h2 class=\"text-success\"><a href='index.php'>View Result</a></h2>";
	}
}
?>
</div>
</body>
</html>
