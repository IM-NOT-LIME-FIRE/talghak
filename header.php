<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
  <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="https://basalam.com/talghakk" target="_blank" class="fa-sharp fa-regular fa-hand"></a>
            <a href="https://instagram.com/talghakk?igshid=YmMyMTA2M2Y=" target="_blank" class="fab fa-instagram"></a>
         </div>
         <p> <a href="login.php">ورود</a> | <a href="register.php">ساخت اکانت</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="index.php" class="logo">طلقک</a>

         <nav class="navbar">
            <a href="orders.php">سفارشات</a>
            <a href="contact.php">ارتباط باما</a>
            <a href="shop.php">فروشگاه</a>
            <a href="about.php">درباره</a>
            <a href="index.php">خانه</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>نام کاربری : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>ایمیل : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">خروج از حساب</a>
         </div>
      </div>
   </div>

</header>