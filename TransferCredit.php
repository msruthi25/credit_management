<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>transparent login form</title>
    <style>
        body
		{
            margin: 0;
            padding: 0;
        }
        body:before
		{
            content: '';
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("4.jpeg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            -webkit-filter: blur(10px);
            -moz-filter: blur(10px);
            -o-filter: blur(10px);
            -ms-filter: blur(10px);
            filter: blur(10px);
        }
        .contact-form
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 500px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
       
        .contact-form h2
		{
            margin: 0;
            padding: 0 0 20px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }
        .contact-form p
        {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #fff;
        }
        .contact-form input
        {
            width: 100%;
            margin-bottom: 20px;
        }
        .contact-form input[type="number"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .contact-form input[type="submit"] {
            height: 30px;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 20px;
            border: none;
            outline: none;
            margin-top: 15%;
        }
        .contact-form a
        {
            color: black;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
        input[type="checkbox"]
		{
            width: 20%;
        }

    </style>
</head>
<body>
    <div class="contact-form">
        <h2>TRANSFER CREDIT</h2>
        <form action="" method="post">
            <input type="number" name="id1" placeholder="Enter id - From">
		    <input type="number" name="id2" placeholder="Enter id - To">
			<input type="number" name="amount" placeholder="Enter the amount">
            <input type="submit" name="search" value="Submit">
         </form>
	</div>
</body>
</html>
<?php
if(isset($_POST['search']))
{
   $id1 = $_POST['id1'];
   $id2 = $_POST['id2'];
   $amount=$_POST['amount'];
   $connect=mysqli_connect("127.0.0.1", "root", "","credit_management");
   $query1 ="SELECT `balance` FROM `credit` WHERE `id` = $id1";
   $result = mysqli_query($connect, $query1);
   if(mysqli_num_rows($result)>0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $balance1 = $row['balance'];
      }  
    }
	$query2 = "SELECT `balance` FROM `credit` WHERE `id` = $id2";
	$result = mysqli_query($connect, $query2);
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $balance2 = $row['balance'];
      }  
    }
	$balance3=$balance1-$amount;
	$balance4=$balance2+$amount;
	$query3 = "UPDATE credit SET balance='$balance3' WHERE id= $id1";
if($connect->query($query3) != TRUE)
{
   echo "Error updating record:".$conn->error;
}
$query3 = "UPDATE credit SET balance='$balance4' WHERE id= $id2";
if($connect->query($query3) != TRUE)
{
echo "Error updating record: " . $conn->error;
}
else
	echo "<p><center>TRANSFERED CREDIT</p>";
}
?>
