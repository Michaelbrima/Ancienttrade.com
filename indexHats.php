<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="stylesheet.css">
</head> 

<body> 
<div id="header"> 

<img src="AT-logo.jpg" alt="">

<h1>Ancienttrade.com</h1>

</div>

<ul class="tabs"> 

	<li data-tab-target="#home" class="active tab">Home</li> <!--we put 
	the 'active' alass on whichever tab is going to be active from the 
	begining-->
	<!--<li data-tab-target="#pricing" class="tab">Pricing</li>
	<li data-tab-target="#about" class="tab">About</li>-->
	<li data-tab-target="#hats" class="tab">Hats</li>
	<li data-tab-target="#tshirts" class="tab">T-shirts</li>
	<li data-tab-target="#pants" class="tab">Pants</li>
	<li data-tab-target="#bandb" class="tab">Blankets and Bedsheets</li>

</ul>

<br>

<div class="filterbar"> 
	<p>Order By:</p>
	
	<ul> 
		<li><button>A to Z</button>
		<li><button>Order of Entry</button>
	</ul>

</div>

<div class="tab-content"> 

	<div id="home" data-tab-content class="active"> <!--data attribute 'data-tab-target'-->
	
		<h1>Home</h1>
		
		<br>
		
		<p>Clothing currently available:</p>
		
		<br>
		
		<div id="hProductEntry">
		
		<h2>Product Entry</h2>
		<p>Fill out this form and push the 'submit' button to add a new entry.</p>
		<form action="index.php" method="POST">
			<label for="title" >Product Title:</label>
			<input type="text" id="title" name="title" placeholder="Product title here"/>
			
			<br>
			
			<label for="description">Description:</label>
			<br>
			<textarea id="description" name="description" placeholder="Please provide a short product description in this box." rows="2" cols="30"></textarea>
			
			<br>
			
			<label for="price">Price:</label>
			<input type="int"  placeholder="(USD)" name="price" min="0.00" max="1000.00" step="0.01" />
			
			<br>
			
			<label for="image">Please select an image to use:</label> 
			<input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"/>
			<br>
			<img id="imagePreview" src="" alt="Image Preview" style="display:none; width:200px;"/>
			
			<br>
			
			<input type="submit" value="Submit">
		</form>
		
		</div>
	
	</div>
	
	<div id="pricing" data-tab-content> 
	
		<h1>Pricing</h1>
		<p>Some information on pricing.</p>
	
	</div>
	
	<div id="about" data-tab-content> 
	
		<h1>About</h1>
		<p>Let me tell you about me.</p>
	
	</div>
	
	<div id="hats" data-tab-content> 
	<div id="hProductEntry">
		
		<h2>Product Entry</h2>
		<p>Fill out this form and push the 'submit' button to add a new entry.</p>
		<form action="indexHats.php" method="POST">
			<label for="title" >Product Title:</label>
			<input type="text" id="title" name="title" placeholder="Product title here"/>
			
			<br>
			
			<label for="description">Description:</label>
			<br>
			<textarea id="description" name="description" placeholder="Please provide a short product description in this box." rows="2" cols="30"></textarea>
			
			<br>
			
			<label for="price">Price:</label>
			<input type="int"  placeholder="(USD)" name="price" min="0.00" max="1000.00" step="0.01" />
			
			<br>
			
			<label for="image">Please select an image to use:</label> 
			<input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"/>
			<br>
			<img id="imagePreview" src="" alt="Image Preview" style="display:none; width:200px;"/>
			
			<br>
			
			<input type="submit" value="Submit">
		</form>
		
		</div>
		<h1>Hats:</h1>
		<p>Clothing currently available:
		<?php 
$username = "tester99"; 
$password = "tester99"; 
$database = "at_db"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM hats";


echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Value1</font> </td> 
          <td> <font face="Arial">Value2</font> </td> 
          <td> <font face="Arial">Value3</font> </td> 
          <td> <font face="Arial">Value4</font> </td> 
          <td> <font face="Arial">Value5</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["col1"];
        $field2name = $row["col2"];
        $field3name = $row["col3"];
        $field4name = $row["col4"];
        $field5name = $row["col5"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
		<?php 
		$host = "localhost";
		$username = "tester99";
		$password = "tester99";
		$database = "at_db";
		
		$mysqli = new mysqli($host, $username, $password, $database);
		$query = "SELECT * FROM hats";
		
		//echo '<table border="0" cellspacing="2" cellpadding="2">
		//<tr>
		//	<td> <font face="Arial">Title</font> </td>
		//	<td> <font face="Arial">Description</font> </td>
		//	<td> <font face="Arial">Price</font> </td>
		//	<td> <font face="Arial">Image</font> </td>
		//</tr>';
		
		//if ($result = mysqli->query($query)) {
		if ($result ->num_rows >0) {
			while ($row = $result->fetch_assoc()){
			echo '<tr><td>'. $row["id"] . '</td><td>'. $row["Title"] .'</td><td>'. $row["Description"] .'</td><td>'. $row["Price"] .'</td><td>'. $row["Image"] .'</td></tr>';
			}
			
			//echo "</table>";
			$result->free();
		}
		?>
		
		<?php 
		$conn = mysqli_connect("localhost", "tester99", "tester99", "at_db");
		$result = mysqli_query($conn, "SELECT * FROM hats");
		$data = $result->fetch_all(MYSQLI_ASSOC);
		?>
		
		<table border="1">
		<tr>
			<th>id</th>
			<th>Title</th>
			<th>Description</th>
			<th>Price</th>
			<th>Image</th>
		</tr>
		<?php foreach($data as $row): ?>
		<tr>
			<td><?= htmlspecialchars($row['id']) ?></td>
			<td><?= htmlspecialchars($row['Title']) ?></td>
			<td><?= htmlspecialchars($row['Description']) ?></td>
			<td><?= htmlspecialchars($row['Price']) ?></td>
			<td><?= htmlspecialchars($row['Image']) ?></td>
		</tr>
		<?php endforeach ?>
		</table>
		
		<?php
$host    = "localhost";
$user    = "tester99";
$pass    = "tester99";
$db_name = "at_db";

//create connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = mysqli_connect($host, $user, $pass, $db_name);

//get results from database
$result = mysqli_query($connection, "SELECT * FROM hats");

//showing property
echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    echo '<td>' . htmlspecialchars($property->name) . '</td>';  //get field name for header
}
echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_row($result)) {
    echo '<tr>';
    foreach ($row as $item) {
        echo '<td>' . htmlspecialchars($item) . '</td>'; //get items 
    }
    echo '</tr>';
}
echo "</table>";

?>

<?php

	$conn = mysqli_connect("localhost", "tester99", "tester99", "at_db");
	$result = mysqli_query($conn, "SELECT * FROM hats");
	
	$query = "SELECT * FROM hats;";
	$queryResult = $conn->query($query);
	echo "<table>";
	while ($queryRow = $queryResult->fetch_row()){
		echo "<tr>";
		foreach($queryRow as $value) {
			echo "<td>".htmlspecialchars($value)."</td>";
		}
			echo "</tr>";
	}
	echo "</table>";
	?>
	
	<?php
	
	$db = mysqli_connect("localhost","tester99","tester99","at_db"); 
	
		$records = mysqli_query($db,"select * from hats"); // fetch data from database 
 
while($data = mysqli_fetch_array($records)) 
{ 
?> 
	  <tr> 
		<td><?php echo $data['id']; ?></td> 
		<td><?php echo $data['title']; ?></td> 
		<td><?php echo $data['description']; ?></td>
		<td><?php echo $data['price']; ?></td>
		<td><?php echo $data['image']; ?></td> 
	  </tr>	 
	<?php 
	} 
	?> 
	</table> 
	 
	<?php mysqli_close($db); // Close connection ?> 
		
		</p>
		
		<br>
		
		
	
	</div>	


	<div id="tshirts" data-tab-content> 
	
		<h1>T-Shirts:</h1>
		<p>Clothing currently available:</p>
		
		<br>
		
		<div id="hProductEntry">
		
		<h2>Product Entry</h2>
		<p>Fill out this form and push the 'submit' button to add a new entry.</p>
		<form action="indexT-shirts.php" method="POST">
			<label for="title" >Product Title:</label>
			<input type="text" id="title" name="title" placeholder="Product title here"/>
			
			<br>
			
			<label for="description">Description:</label>
			<br>
			<textarea id="description" name="description" placeholder="Please provide a short product description in this box." rows="2" cols="30"></textarea>
			
			<br>
			
			<label for="price">Price:</label>
			<input type="int"  placeholder="(USD)" name="price" min="0.00" max="1000.00" step="0.01" />
			
			<br>
			
			<label for="image">Please select an image to use:</label> 
			<input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"/>
			<br>
			<img id="imagePreview" src="" alt="Image Preview" style="display:none; width:200px;"/>
			
			<br>
			
			<input type="submit" value="Submit">
		</form>
		
		</div>
	
	</div>

	<div id="pants" data-tab-content> 
	
		<h1>Pants:</h1>
		<p>Clothing currently available:</p>
		
		<br>
		
		<div id="hProductEntry">
		
		<h2>Product Entry</h2>
		<p>Fill out this form and push the 'submit' button to add a new entry.</p>
		<form action="indexPants.php" method="POST">
			<label for="title" >Product Title:</label>
			<input type="text" id="title" name="title" placeholder="Product title here"/>
			
			<br>
			
			<label for="description">Description:</label>
			<br>
			<textarea id="description" name="description" placeholder="Please provide a short product description in this box." rows="2" cols="30"></textarea>
			
			<br>
			
			<label for="price">Price:</label>
			<input type="int"  placeholder="(USD)" name="price" min="0.00" max="1000.00" step="0.01" />
			
			<br>
			
			<label for="image">Please select an image to use:</label> 
			<input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"/>
			<br>
			<img id="imagePreview" src="" alt="Image Preview" style="display:none; width:200px;"/>
			
			<br>
			
			<input type="submit" value="Submit">
		</form>
		
		</div>
	
	</div>

	<div id="bandb" data-tab-content> 
	
		<h1>Blankets and Bedsheets:</h1>
		<p>Clothing currently available:</p>
		
		<br>
		
		<div id="hProductEntry">
		
		<h2>Product Entry</h2>
		<p>Fill out this form and push the 'submit' button to add a new entry.</p>
		<form action="indexB&B.php" method="POST">
			<label for="title" >Product Title:</label>
			<input type="text" id="title" name="title" placeholder="Product title here"/>
			
			<br>
			
			<label for="description">Description:</label>
			<br>
			<textarea id="description" name="description" placeholder="Please provide a short product description in this box." rows="2" cols="30"></textarea>
			
			<br>
			
			<label for="price">Price:</label>
			<input type="int"  placeholder="(USD)" name="price" min="0.00" max="1000.00" step="0.01" />
			
			<br>
			
			<label for="image">Please select an image to use:</label> 
			<input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"/>
			<br>
			<img id="imagePreview" src="" alt="Image Preview" style="display:none; width:200px;"/>
			
			<br>
			
			<input type="submit" value="Submit">
		</form>
		
		</div>
	
	</div>



</div>

<?php

$title = $_POST["title"];
$description = $_POST["description"];
$price = $_POST["price"];
//$price = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT); //checks to verify whether a value is filled or not (null)
$image = $_POST["image"];


//print_r($_POST); // prints out form data to php file on browser

//var_dump($title, $description, $price, $image); //to see results in array form

$host = "localhost";
$dbname = "at_db";
$username = "tester99";
$password = "tester99";

$conn = mysqli_connect(hostname: $host, 
				username: $username, 
				password: $password, 
				database: $dbname);
				
if (mysqli_connect_errno()){ //'mysqli_connect_errno' checks to see if there
// is an error with connecting to the mysql database (if no error, it 
//returns 0)
	die("Connection error " . mysqli_connect_error());// 'mysqli_connect_error
// gives message of what the error of the attempt to connect to the mysql database was	
}

//else:

//echo "Connection successful"; //Writes out "Connection successful to php file in browser.


$sql = "INSERT INTO hats (Title, Description, Price, Image)
	VALUES (?, ?, ?, ?)"; //we shouldnt put dollar sign values here and use 
//	a prepared statement instead in order to prevent sql injection (or an 
//  attacker inserting sql code by inserting single quote characters in the form data
// Connecting values to the placeholders in the 'sql' string is known as 
// binding

$stmt =mysqli_stmt_init($conn); //we pass the connection into 
//'mysqli_stmt_init' as an arguement in order to create a prepared statement
// object

//mysqli_stmt_prepare($stmt, $sql) 

if ( ! mysqli_stmt_prepare($stmt, $sql)) { //returns a boolean success value that basicallystates whether the information entered into the form was saved successfully
	die(mysqli_error($conn));
}


mysqli_stmt_bind_param($stmt, "sssb",
						$title,
						$description,
						$price,
						$image);
						
mysqli_stmt_execute($stmt);

echo "The record has been saved.";


?>

</body>

</html>

