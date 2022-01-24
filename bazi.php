<!DOCTYPE html>
<html>
<head>
<meta  charset="utf-8" http-equiv="content-type" content="text/html" />
<title>PRVA BAZA</title>
</head>
<body>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
<h3> Add a new product: </h3>
<br>

<p> Name: <input type="text" name="name" /> <br> <BR>
Price: <input type="text" name="price" /> <br> <BR> 
Manufacturer: <input type="text" name="man" /> <br> <Br>
Country of origin: <input type="text" name="country" /> <br>
<br>
<input type="submit" name="sub" value="Add New" />
</p>
</form>
<?php
if(isset($_POST['sub']))
{

$name = $_POST['name'];
$price = $_POST['price'];
$man = $_POST['man'];
$country = $_POST['country']; 

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "klient";
                                                                      
  $conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection
                                                
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // Check connection so die se proveruva dali e uspesna KONEKCIJATA ako ne e ke ja prekine 
  }
  
  $sql = "INSERT INTO product (name, price, manufacturer, country_of_origin) 
  VALUES ('$name', $price, '$man', '$country')";
  
  if (mysqli_query($conn, $sql))  // izvrsuvanje na UPPI
  {
    echo "Податоците се успешно внесени";
  } 
  else 
  {
    echo "Грешка " . $sql . "<br>" . mysqli_error($conn);
  }
  
  $sifra = 0;
  $sifra = ($kod * 5)+7+1999;
  echo "Шifrata e" . $sifra;
  /////////////////////////////////////////zatvori konekcija !!!!!!!!!!!!
  
$sql = "SELECT * FROM product";

if ($result = mysqli_query($conn, $sql)) // ima if bidejki ima poveke atributi
 {
          echo " <table border='1px'>"   ;
          echo " <th> ID </th> ";
          echo " <th> NAME  </th>  ";
          echo " <th> Price </th> " ;
          echo " <th> Manufacturer </th> " ;
          echo " <th> Country_of_origin </th> " ;
          echo " </tr>" ;

  while ($row = mysqli_fetch_row($result)) // ima WHILE bidejki proveruvame za poveke atributi i KORISNICI
  { 
    echo " <tr bgcolor='yellow'> " ;
    echo " <td> $row[0] </td> ";
    echo " <td> $row[1] </td> " ;
    echo " <td> $row[2] </td>";
    echo " <td> $row[3]</td> ";
    echo " <td> $row[4] </td> ";
    echo " </tr> ";
  
  }
         echo " </table>";
   mysqli_free_result($result); //  NE ZABRAVAJ //////////////////////////////////////////////
 }

mysqli_close($conn); //  zataranje na konekcija 

}
  
?>

</body>
</html>
