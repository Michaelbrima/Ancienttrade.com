<!DOCTYPE html>

<html>
 
<head> 



<script src="script.js" defer></script> <!--defer allows for javascript to run after html is loaded-->

<link type="text/css" rel="stylesheet" href="stylesheet.css">

<title>Ancienttrade.com</title>

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">-->



</head>



<body>



<div id="header"> 

<img src="AT-logo.jpg" alt="">

<h1>Ancienttrade.com</h1>

</div>
<!--
<div id="navbar"> 

	<ul id="navigation"> 
		<li><a class="current" href="index.html">Home</a></li>
		<li><a href="indexHats.html">Hats and Headgear</a></li>
		<li><a href="">T-shirts</a></li>
		<li><a href="">Pants</a></li>
		<li><a href="">Blankets and Bedsheets</a></li>
	</ul>
	
</div>
-->



<div class="newTabs"> 

	<input type="radio" class="tabs__radio" name="tabs-example" id="tab3"> <!--'checked' attribute means that this radio option will always be the foirst one viewed or rendered-->
	<label for="tab3" class="tabs__label">Hats</label>
	<div class="tabs__content">
	
		<div id="hProductEntry">
		
			<h2>Product Entry</h2>
			<p>Fill out this form and push the 'submit' button to add a new entry.</p>
			<form action="" method="POST">
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
			
			<?php
			if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image'])) {
			$title = $_POST["title"];
			$description = $_POST["description"];
			$price = $_POST["price"];
			//$price = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT); //checks to verify whether a value is filled or not (null)
			$image = $_POST["image"];
			//print_r($_POST); // prints out form data to php file on browser
			//var_dump($title, $description, $price, $image); //to see results in array form
			$host = "sql5.freesqldatabase.com";
			$dbname = "sql5742492";
			$username = "sql5742492";
			$password = "mfuTDlqvg4";
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
		}

			?>
		
		</div>
	
		
		<div id="products">
			<h1>Hats:</h1>
			<p>Clothing currently available:  </p>
			

			
			<?php 
			$conn = mysqli_connect("sql5.freesqldatabase.com", "sql5742492", "mfuTDlqvg4", "sql5742492");
			$result = mysqli_query($conn, "SELECT * FROM hats");
			$data = $result->fetch_all(MYSQLI_ASSOC);
			?>
			
			<table border="1" cellspacing="2" cellpadding="10" style="width:100%">
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
		
		</div>


	
	
		
		
	</div>

	<input type="radio" class="tabs__radio" name="tabs-example" id="tab4"> <!--'checked' attribute means that this radio option will always be the foirst one viewed or rendered-->
	<label for="tab4" class="tabs__label">T-Shirts</label>
	<div class="tabs__content">
	
			<div id="hProductEntry">
		
			<h2>Product Entry</h2>
			<p>Fill out this form and push the 'submit' button to add a new entry.</p>
			<form method="POST">
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
	
		
		<div id="products">
			<h1>T-Shirts:</h1>
			<p>Clothing currently available:  </p>
			

			
			<?php 
			$conn = mysqli_connect("sql5.freesqldatabase.com", "sql5742492", "mfuTDlqvg4", "sql5742492");
			$result = mysqli_query($conn, "SELECT * FROM tshirts");
			$data = $result->fetch_all(MYSQLI_ASSOC);
			?>
			
			<table border="1" cellspacing="2" cellpadding="10" style="width:100%">
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
		
		</div>
	
	</div>

	<input type="radio" class="tabs__radio" name="tabs-example" id="tab5"> <!--'checked' attribute means that this radio option will always be the foirst one viewed or rendered-->
	<label for="tab5" class="tabs__label">Pants</label>
	<div class="tabs__content">
	
				<div id="hProductEntry">
		
			<h2>Product Entry</h2>
			<p>Fill out this form and push the 'submit' button to add a new entry.</p>
			<form method="POST">
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
	
		
		<div id="products">
			<h1>Pants:</h1>
			<p>Clothing currently available:  </p>
			

			
			<?php 
			$conn = mysqli_connect("sql5.freesqldatabase.com", "sql5742492", "mfuTDlqvg4", "sql5742492");
			$result = mysqli_query($conn, "SELECT * FROM pants");
			$data = $result->fetch_all(MYSQLI_ASSOC);
			?>
			
			<table border="1" cellspacing="2" cellpadding="10" style="width:100%">
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
		
		</div>
	
	</div>
	
	<input type="radio" class="tabs__radio" name="tabs-example" id="tab6"> <!--'checked' attribute means that this radio option will always be the foirst one viewed or rendered-->
	<label for="tab6" class="tabs__label">Blankets and Bedsheets</label>
	<div class="tabs__content">
	
				<div id="hProductEntry">
		
			<h2>Product Entry</h2>
			<p>Fill out this form and push the 'submit' button to add a new entry.</p>
			<form method="POST">
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
	
		
		<div id="products">
			<h1>Blankets and Bedsheets:</h1>
			<p>Clothing currently available:  </p>
			

			
			<?php 
			$conn = mysqli_connect("sql5.freesqldatabase.com", "sql5742492", "mfuTDlqvg4", "sql5742492");
			$result = mysqli_query($conn, "SELECT * FROM blanketsandbedsheets");
			$data = $result->fetch_all(MYSQLI_ASSOC);
			?>
			
			<table border="1" cellspacing="2" cellpadding="10" style="width:100%">
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
		
		</div>
	
	</div>
	
</div>


<div id="footer"> 

 &copy; 2024 Ancienttrade.com

</div>

</body>

</html>
