<?php

include 'config.php';

session_start();

$id = "";
   if(isset($_GET["id"])){
   $id = $_GET["id"];
   }
$product_id = "";
   if(isset($_GET["product_id"])){
   $id = $_GET["product_id"];
   }

$product_price = "price";
if(isset($_SESSION["price"])){
   $id = $_SESSION["price"];
   }
$product_name = "name";
if(isset($_SESSION["name"])){
   $id = $_SESSION["name"];
   }
$product_image = "image";
if(isset($_SESSION["image"])){
   $id = $_SESSION["image"];
   }

$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');
if($conn)
   echo 'ok';

$sql= "SELECT * FROM `products` WHERE id = '$id'  \n";
$query = mysqli_query($conn,$sql);
if($query)
   echo 'inserted';


?>


<?php
include 'config.php';



$user_id = $_SESSION['user_id'];



if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

   $result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/1.css">

</head>
<body>

   
   <?php include 'header.php'; ?>


   <section class="home-d">
   <div class="container-d">
   <h2 class="title-name">Product detail</h2>

   <?php
      if ($result->num_rows > 0)
      {
         while($row = $result->fetch_assoc())
         {

            ?>
   
         <div class="row">
            <div class="col-md-5">
            <img  src="uploaded_img/<?php echo $row['image']; ?>" />
            </div>

            <div class="col-md-7">
            <h4><?php echo $row['name']; ?> </h4>
            <h4><?php echo $row['detail']; ?> </h4>
            <div>تومان<?php echo $row['price']; ?></div>
            <input type="submit" value="خرید" name="add_to_cart" class="btn">
            </div>
            <div class="col-md-8">
            </div>
         </div>
            <?php

         }
      }
   ?>



   </div>
   </section>
<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
   var
persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
englishNumbers  = [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g],
fixNumbers = function (str)
{
  if(typeof str === 'string')
  {
    for(var i=0; i<10; i++)
    {
      str = str.replace(englishNumbers[i], i).replace(persianNumbers[i], i);
    }
  }
  return str;
};
</script>
</body>
</html>