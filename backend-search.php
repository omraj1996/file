<head>
   <link rel="stylesheet" href="../AdminLTE.min.css">
</head>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "om");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$query = mysqli_real_escape_string($link, $_REQUEST['query']);
 
if(isset($query)){
    // Attempt select query execution
    $sql = "SELECT * FROM loginmaster WHERE userid LIKE '" . $query . "%'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
			echo "<table>";
            while($row = mysqli_fetch_array($result)){
								$loc=$row['filepath'];
								echo "<tr>";
								if($row['filepath']=="")
								{
									
									echo ' <td>
										
											<img  class="img-circle" height="40" width="40" src="../uploads/default1.jpg"></td>';
												echo '<td>'.$row['userid'].'</td>';
										
										
										
												
								
								}
								else
								{
									//echo'<img  class="img-circle" height="30" width="30" src='$loc'>';
									echo ' <td> 
												<img  class="img-circle" height="40" width="40" src="'.$loc.'"></td>';
												echo '<td>'.$row['userid'].'</td>';
											
													
									
									}
								
							
                //echo "<p>" . $row['userid'] . "</p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found for <b>$query</b></p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
 
// close connection
mysqli_close($link);
?>