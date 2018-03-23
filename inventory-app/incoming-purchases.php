<h1>My Inventory Manager - Purchases</h1>

<?php
include_once('menu.php');
?>

<a href="incoming-form.php">Add an order</a>

    <?php

      require "config.php";
      $conn = new mysqli($host, $username, $password, $dbname);
      if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT PurchaseDate, ProductLabel, NumberReceived, supplier FROM purchases LEFT JOIN products ON purchases.ProductId = products.id LEFT JOIN suppliers ON purchases.SupplierId = suppliers.id ORDER BY PurchaseDate DESC";
      $result = $conn->query($sql);

      echo "<TABLE>";
      echo "<TR><TH><B>Date of Purchase</B></TH>";
      echo "<TH><B>Product</B></TH>";
      echo "<TH><B>Number Received</B></TH>";
      echo "<TH><B>Supplier</B></TH></TR>";

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
        echo "<TR>
                <TD>".$row["PurchaseDate"]."</TD>
                <TD>".$row["ProductLabel"]."</TD>
                <TD>".$row["NumberReceived"]."</TD>
                <TD>".$row["supplier"]."</TD>
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
