<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$oId = $_POST['oId'];
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
	} else {	
		//updating the table
		$sql = "UPDATE orders SET cName=:cName, cAddress=:cAddress, stocks=:stocks, cContact=:cContact, pName=:pName, pPrice=:pPrice, pDesc=:pDesc WHERE  oId=:oId";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':oId', $oId);
		$query->bindparam(':cName', $cName);
		$query->bindparam(':cAddress', $cAddress);
		$query->bindparam(':stocks', $stocks);
		$query->bindparam(':cContact', $cContact);
		$query->bindparam(':pName', $pName);
		$query->bindparam(':pPrice', $pPrice);
		$query->bindparam(':pDesc', $pDesc);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$oId = $_GET['oId'];

//selecting data associated with this particular id
$sql = "SELECT * FROM orders WHERE oId=:oId";
$query = $dbConn->prepare($sql);
$query->execute(array(':oId' => $oId));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$cName = $_POST['cName'];
	$address= $_POST['cAddress'];
	$contact= $_POST['cContact'];	
	$pName = $_POST['pName'];
	$pPrice = $_POST['pPrice'];
	$pDesc = $_POST['pDesc'];	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Customer Name</td>
				<td><input type="text" name="cName" value="<?php echo $cName;?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="cAddress" value="<?php echo $cAddress;?>"></td>
			</tr>
			<tr> 
				<td>Contact</td>
				<td><input type="text" name="cContact" value="<?php echo $cContact;?>"></td>
			</tr>
			<tr> 
				<td>Product Name</td>
				<td><input type="text" name="pName" value="<?php echo $pName;?>"></td>
			</tr>
			<tr> 
				<td>Product Price</td>
				<td><input type="text" name="pPrice" value="<?php echo $pPrice;?>"></td>
			</tr>
			<tr> 
				<td>Product Description</td>
				<td><input type="text" name="pDesc" value="<?php echo $pDesc;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="oId" value=<?php echo $_GET['oId'];?>></td>
				<td><input class="btn btn-success" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
