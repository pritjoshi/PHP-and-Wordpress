<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Simple HTML Form</title>
	<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style type="text/css">
        label {
            font-weight: bold;
            color: #300ACC;
        }

    </style>
	 <?php 
		
		
        if(!empty($_REQUEST['firstname'])){
            $firstname = $_REQUEST['firstname'];
        }
    else
    {
        $firstname = NULL;
        echo '<p class ="error"> Please enter your first name</p>';
    }
    
     if(!empty($_REQUEST['lastname'])){
            $lastname = $_REQUEST['lastname'];
        }
    else
    {
        $lastname = NULL;
        echo '<p class ="error"> Please enter your last name</p>';
    }
    
     
    
    if(isset($_REQUEST['payment']))
    {
        $payment = $_REQUEST['payment'];
        
        if ($payment == 'debit')
    {
        $message = '<p><strong> Debit</strong></p>';
    } elseif($payment == 'credit')
        {
        $message = '<p><strong> Credit</strong></p>';
    }
    else{
        $payment = NULL;
        echo '<p class = "error">Please Select debit or credit</p>';
    }
    }else 
    {
        $payment = null;
        echo '<p class = "error">Please select payment method</p>';
    }
    
    
    
    if($firstname && $lastname && $payment)
    {
        $servername = "localhost";
$username = "root";
$password = "";
$dbname = "store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (firstname, lastname, payment)
VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["payment"]."')";

        //shows alert msg if submits successfully, and redirects to inventory automatically after 3 seconds
if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('Thank you for shopping with us...');</script>
";
    echo "<meta http-equiv = 'refresh' content = '3; url =index.php' />";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();
		
		
		
    }else {
		
        echo '<p class = "error"> <strong>Please enter your details.</strong></p>';
    }
    
    

?>

</head>

<body>

    <form method="post">

        <fieldset>
            <legend>Checkout</legend>

            <p><label>First Name: <input type="text" name="firstname" size="20" maxlength="40"></label></p>

            <p><label>Last Name: <input type="text" name="lastname" size="20" maxlength="40"></label></p>


            <p><label for="">Payment method: </label><input type="radio" name="payment" value="debit"> Debit <input type="radio" name="payment" value="credit"> Credit</p>

        </fieldset>
	
	   		
		<input type="submit" name="submit" class="btn btn-success" value="Submit ">
		

</form>
       <button type='index' class="btn btn-primary" onClick="location.href='index.php'">Inventory</button>
    
</body>
</html>
