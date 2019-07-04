<html>
<head>
<title>Table with database</title>
<center>
<h1>ALL USERS</h1>
<style>
body
{
	background-image: url("4.jpeg");
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
}
table
  {
   border-collapse: collapse;
   height:50px;
   width: 50%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
  } 
  th
  {
   height:10px;
   background-color: #588c7e;
   color: white;
  }
  a
  {
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
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
  <th>Id</th> 
  <th>Username</th> 
  <th>Balance</th>
</tr>
<?php
$host="127.0.0.1";
$username="root";
$password="";
$db_name="credit_management";
$conn=new mysqli($host,$username,$password,$db_name);
if($conn->connect_error)
{
	die("connection failed".$conn->connect_error);
}
$sql ="SELECT id, username,balance FROM credit";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
while($row = $result->fetch_assoc()) 
{
	echo "<tr class='info'><td>".$row["id"]. "</td><td>" . $row["username"] . "</td><td>".$row["balance"]. "</td> <td>";
}
echo "</table>";
}
else 
{
echo "0 results";
}
$conn->close();
?>
<center><a href="http://localhost/form/credit_management/110.php">TRANSFER CREDIT</a><br>
</table>
<center>
</body>
</html>


	