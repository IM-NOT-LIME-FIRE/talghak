<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>سفارشات</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/1.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>سفارش ها</h3>
   <p> <a href="home.php">خانه</a> / سفارش ها </p>
</div>

<section class="placed-orders">

   <h1 class="title">سفارش های انجام شده</h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> گذاشته شده در : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> نام : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> شماه تلفن : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> ایمیل : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> ادرس : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> روش پرداخت : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> کالا ها : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> قیمت کل : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> کدرهگیری : <span><?php echo $fetch_orders['code']; ?></span> </p>
         <p> وضعیت : <span style="color:<?php if($fetch_orders['payment_status'] == 'انجام شده'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">هنوز سفارشی ندارید</p>';
      }
      ?>
   </div>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>