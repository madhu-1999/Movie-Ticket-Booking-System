<?php 
	 require_once "config.php";
	 $query  = "select mname from movies where mname like '%" .$_GET['q']. "%'";
	 mysqli_query($conn,$query) or die("Error quering database");
	 $result = mysqli_query($conn,$query);
	 if(mysqli_num_rows($result)){
	 while($row = mysqli_fetch_array($result)){
	 	 echo "<option>" . $row["mname"] . "</option>";
	 }
	}
	else{
	    echo "<option>No matches found</option>";
	}

	 //close connection
	 mysqli_close($conn);
?>