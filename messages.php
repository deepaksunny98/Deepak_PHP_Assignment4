<?php
   
    echo '<h1>Your Message</h1>';
    require('mysqli_oop_connect.php');    
    $q = "SELECT * from messages";

    $r = $mysqli->query($q); 

    // Count the number of returned rows:
    $num = $r->num_rows;
    if ($num > 0) 
     { 
      // If it runs OK, display the records.
      //  echo "<p>There are currently $num registered users.</p>\n";

    echo '<table width="80%">
	<thead>
	<tr><td align="left"><strong>User Name</strong></td><td align="left"><strong>Messages</strong></td></tr>
	</thead>
	<tbody>
';
        
    // Fetch and print all the records:
	while ($row = $r->fetch_object())
    {
		echo '<tr><td align="left">' . $row->username . '</td><td align="left">' . $row->message . '</td></tr>
		';
	}

	echo '</tbody></table>'; 

	$r->free(); 
 	unset($r);

  } 
else 
{ 
    // If no records were returned.

	echo '<p class="error">There are currently no users .</p>';

}

// Close the database connection.
$mysqli->close();
unset($mysqli);


?>
