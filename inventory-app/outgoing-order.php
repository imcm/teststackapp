<h1>My Inventory Manager - Orders</h1>

<?php
include_once('menu.php');
?>


    <?php
      $servername = "192.168.50.148";
      $username = "root";
      $password = "VMware1!";
      $dbname = "inventory";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT OrderDate, ProductLabel, NumberShipped, First, Last FROM orders LEFT JOIN products ON orders.ProductId = products.id ORDER BY OrderDate DESC";
      $result = $conn->query($sql);

      echo "<TABLE>";    

      echo "<TR><TH><b>Order Date</b></TH>";
      echo "<TH><b>Product</b></TH>";
      echo "<TH><b>Number Shipped</b></TH>";
      echo "<TH><b>First</b></TH>";
      echo "<TH><b>Last</b></TH></TR>"; 
     
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
        echo "<TR>
                <TD>".$row["OrderDate"]."</TD>
                <TD>".$row["ProductLabel"]."</TD>
                <TD>".$row["NumberShipped"]."</TD>
                <TD>".$row["First"]."</TD>
                <TD>".$row["Last"]."</TD>
        </TR>";
        }
        echo "</TABLE>";
      } else {
          echo "No results";
      }
      $conn->close();
    ?>
<?php
include_once('footer.php');
?>

