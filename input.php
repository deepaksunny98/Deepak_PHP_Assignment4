<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    
$username=$_REQUEST['username'];
$message=$_REQUEST['message'];
   
if(empty ($username) or empty($message) )
        {
		 echo "One of the input not entered..!";
		}
    else
    {
         require('mysqli_oop_connect.php');
        
        $q = "INSERT INTO messages VALUES(? , ?)";
        $st=$mysqli->prepare($q);
        
        $st->bind_param('ss',$username,$message);
        
        $username=strip_tags($_POST['username']);
        $messsage=strip_tags($_POST['message']);
        
        $st->execute();
        
        if($st->affected_rows == 1)
        {
            echo "Your Message has been posted.";
        }
        else
        {
            echo '<p>' . $st->error . '</p>';
        }
        
        $st->close();
        unset($st);
        
        $mysqli->close();
	    unset($mysqli);
        
    }
}
?>