<h1>My Inventory Manager - Products</h1>

<?php
    function isNegative() {
     // if($num < 0)
        return "red";
    //  else
      //  return "blue";
}

?>

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
      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      echo "<TABLE>";
      echo "<TR><TH><b>Product Name</b></TH>";
      echo "<TH><b>Part Number</b></TH>";
      echo "<TH><b>Label</b></TH>";
      echo "<TH><b>Starting Inventory</b></TH>";
      echo "<TH><b>Inventory Received</b></TH>";
      echo "<TH><b>Inventory Shipped</b></TH>";
      echo "<TH><b>Inventory On Hand</b></TH>";
      echo "<TH><b>Minimum Required</b></TH></TR>";

        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
        echo "<TR>
                <TD>".$row["ProductName"]."</TD>
                <TD>".$row["PartNumber"]."</TD>
                <TD>".$row["ProductLabel"]."</TD>
                <TD>".$row["StartingInventory"]."</TD>
                <TD>".$row["InventoryReceived"]."</TD>
                <TD>".$row["InventoryShipped"]."</TD>
                <TD>".$row["InventoryOnHand"]."</TD>
                <TD>".$row["MinimumRequired"]."</TD>
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

