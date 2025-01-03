<!DOCTYPE html>
<html>
<head>
	
	<style>
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			margin-top: 20px;
		}

		.card {
			width: 300px;
			margin: 10px;
			border: 1px solid gray;
			border-radius: 10px;
			box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
			padding: 10px;
			text-align: center;
		}

		input[type="text"] {
			width: 80%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer; 
			position:fixed;
			margin-left: 15px;
			margin-top: 7px;
			
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

	</style>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    
</head>
<body>
	
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.html">Find your way</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link text-primary" href="office.php">Office</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary" href="contact.html">Contact</a>
              </li>
			  
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
	<form class="form-1 " method="post">
		<label for="search">Search:</label>
		<input type="text" name="search" id="search" placeholder="Search...">
		<input type="submit" name="submit" value="Submit" >
	
	</form>
</div>
	
<?php

$con = new PDO("mysql:host=localhost;dbname=CCISMapDB",'root','');

if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM `names` WHERE name = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {
        ?>
<p class="container"> all names are stored in the CCISMapDB database </p>
<div class = container>
                <div class=card><h2><?php echo $row->name; ?>
                <?php echo $row->location;?></h2></div>

	        <br><br><br>

	        <br><br><br>
	        
<?php 
    }
    else{ $sth = $con->prepare("SELECT * FROM `names` WHERE location = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {
        ?>
<p class="container"> all locathon are stored in the CCISMapDB database </p>
<div class = container>
                <div class=card><h2><?php echo $row->name; ?>
                <?php echo $row->location;?></h2></div>

	        <br><br><br>

	        <br><br><br>
	        
<?php 

    	}else{ 
            print("<div class = container>
                <div class=card><h2>Does not exist try again</h2></div>
<div class = container>"); 
        }
        


}}else{}

?>


<?php

$query2 = "SELECT * FROM names";
 $database = mysqli_connect( "localhost",  "root", "" );
if ( !$database )
   die( "<p>Could not connect to database</p></body></html>" );

if ( !mysqli_select_db( $database, "CCISMapDB" ) )
   die( "<p>Could not open CCISMapDB </p>
      </body></html>" );

if ( !( $result = mysqli_query(  $database, $query2 ) ) ) 
{
   print( "<p>Could not execute query!</p>" );
   die( mysqli_error() . "</body></html>" );
}
print( "<div class = container>" );

   for ( $counter = 0; $row = mysqli_fetch_row( $result );
      ++$counter )
   {
      print( "<div class=card><h2>" );

      foreach ( $row as $key => $value ) 
         print( "<p>$value</p>" );

      print( "</h2></div>" );
   }

   mysqli_close( $database );


        ?>
		

	</div>        
</body>
</html>
