</head>
<div class="form-style-6"
<h1>Add an order</h1>

<form method="post">
  <label>First Name</label>
  <input type="text" name="first" id="first" required="required"/><br><br>
  <label>Last Name</label>
  <input type="text" name="last" id="last" required="required"/><br><br>
  <label>Product ID</label>
  <input type="text" name="productid" id="productid" required="required"/><br><br>
  <label>Quantity</label>
  <input type="text" name="quantity" id="quantity" required="required"/><br><br>

  <input type="submit" value="Submit" name="submit"/>

</form>

<a href="incoming-purchases.php">Back to Incoming Purchases</a>
        </div>
</head>

<?php

  if(isset($_POST["submit"])){

    require "config.php";
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO orders (First, Last, ProductId, NumberShipped, OrderDate)
    VALUES ('".$_POST["first"]."','".$_POST["last"]."','".$_POST["productid"]."','".$_POST["quantity"]."',CURDATE())";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
?>
