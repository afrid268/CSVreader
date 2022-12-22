<?php

$con = mysqli_connect("localhost","root","Mysql@077","student");

if($con)
{
    $file=$_FILES['csvfile']['tmp_name'];
    $handle=fopen($file,"r");
    $i=0;
    while(($cont=fgetcsv($handle,1000,","))!==false)
    {
        $table=rtrim($_FILES['csvfile']['name'],".csv");
        if($i==0)
        {
            $roll_no=$cont[0];
            $name=$cont[1];
            $std=$cont[2];
            $remarks=$cont[3];
            $percentage=$cont[4];
            $query="CREATE TABLE $table ($roll_no INT,$name VARCHAR(50),$std INT,$remarks VARCHAR(50),$percentage INT);";
            
            mysqli_query($con,$query);
        }
    else
{
    $query="INSERT INTO $table ($roll_no,$name,$std,$remarks,$percentage) VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]','$cont[4]')";
    
    mysqli_query($con,$query);
    
}

$i++;
    }
    echo '<script>alert("CSV file uploaded to database!!!")</script>';
    
    
}

    else
    {
        echo"connection failed!!";
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    
  </head>
  <body>
  <style>
        body{
                background:#ade0aa;
                text-align: center;
            }
        </style>
   
    <h1>Welcome </h1>
    <a href="stati.php">view statistic reports for student database</a><br><br>
    <br><br>
    
  
  </body>
</html>