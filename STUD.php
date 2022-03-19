<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kk";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
else{
    echo"connected";
}
?>


<html lang="en">
<head>
    <title>form design using php</title>
    <style>
        
        table{ width:75%;
            text:bold;
            margin:15px 15px 15px 100px;
        align:center;}
        
tbody tr:nth-child(odd) {
  background-color: #ff33cc;
}
.top:input{
    width:50%;

}

table {
    border-collapse: separate;
    border-spacing: 0 0.3em;
}
tr:input {
    
                border-collapse:separate;
                border-spacing:0 15px;
    padding:10px;
}
tbody tr:nth-child(even) {
  background-color: #e6d630	
;
}

table {
  background-color: #2cbade;
}
table {
  border: 4px solid green;
}
th, td {
  padding: 15px;
  text-align: left;
}
th, td {
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color: coral;}

th, td {
  padding: 15px;
  text-align: left;
}
.top{
    width:!important 50%;
    padding:5px;
}
body{


    background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);


    background="student-database-500x500.jpg"}
    </style>
</head>

<body>
    <h1 style="color:blue; text-align: center;"><b>Student Database Management System</b></h1>
    <form name="form1" action="" method="post">
        <table>
            <tr>
                <td><b>Enter Regno:</b></td>
                <td><input type="text" name="stuid"></td>
            </tr>
            <tr>
                <td><b>Name:</b></td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><b>Dept:</b></td>
                <td><input type="text" name="dname"></td>
            </tr>

            <tr class="top">
                <input style="color:green;" type="submit" name="sub1" value="insert">
                <input style="color:red;" type="submit" name="sub2" value="delete">
                <input style="color:brown;" type="submit" name="sub3" value="update">
                <input style="color:orange;"type="submit" name="sub4" value="display">
                <input style="color:skyblue;" type="submit" name="sub5" value="search">
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST["sub1"]))
{
    mysqli_query($conn,"insert into stud values('$_POST[stuid]','$_POST[name]','$_POST[dname]')");
    echo "record inserted succesfully";
}
if(isset($_POST["sub2"]))
{
    mysqli_query($conn,"delete from stud where stuid='$_POST[stuid]'");
    echo "record deleted succesfully";
}
if(isset($_POST["sub3"]))
{
    mysqli_query($conn,"update stud set dname='$_POST[dname]',name='$_POST[name]' where stuid='$_POST[stuid]'");
    echo "updated succesfully";
}

if(isset($_POST["sub4"]))
{
    $reg=mysqli_query($conn,"select * from stud");
    echo"<table border=1>";
        echo"<tr>";
        echo"<th>"; echo"Student id"; echo"</th>";
        echo"<th>"; echo"Name"; echo"</th>";
        echo"<th>"; echo"Dept name"; echo"</th>";
        echo"</tr>";
    while($row=mysqli_fetch_array($reg))
    {
        echo"<tr>";
        echo"<td>"; echo $row["stuid"]; echo"</td>";
        echo"<td>"; echo $row["name"]; echo"</td>";
        echo"<td>"; echo $row["dname"]; echo"</td>";
        echo"</tr>";
    }
    echo"</table>";
}


if(isset($_POST["sub5"]))
{
    $reg=mysqli_query($conn,"select * from stud where stuid='$_POST[stuid]'");
    echo"<table border=1>";
        echo"<tr>";
        echo"<th>"; echo"Student id"; echo"</th>";
        echo"<th>"; echo"Name"; echo"</th>";
        echo"<th>"; echo"Dept name"; echo"</th>";
        echo"</tr>";
    while($row=mysqli_fetch_array($reg))
    {
        echo"<tr>";
        echo"<td>"; echo $row["stuid"]; echo"</td>";
        echo"<td>"; echo $row["name"]; echo"</td>";
        echo"<td>"; echo $row["dname"]; echo"</td>";
        echo"</tr>";
    }
    echo"</table>";
}
?>
