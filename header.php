<?php



$user_id = $_SESSION['user_id'];


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

if(isset($_GET['h'])){
   echo "<style> .header .header-2 .flex .navbar .ha{
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

if(isset($_GET['a'])){
   echo "<style> .header .header-2 .flex .navbar .aa{font-size: 2.5rem;
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

if(isset($_GET['s'])){
   echo "<style> .header .header-2 .flex .navbar .sa{
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

if(isset($_GET['c'])){
   echo "<style> .header .header-2 .flex .navbar .ca{
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}

if(isset($_GET['o'])){
   echo "<style> .header .header-2 .flex .navbar .oa{
      font-size: 260%;
      color:var(--purple);
   }
   </style>";
}
?>

<header class="header">
   <style>
.header .header-1 .flex .d{
   color:var(--red);
}
</style>

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <?php
         if(!isset($user_id)){
         echo "<p> New <a href='login.php'>Login</a> | <a href='register.php'>Register</a> </p>";
         }
         else {
            echo "<p><a class='d' href='logout.php'>Logout</a></p>";

         }
         ?>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">SJEC MARKET</a>

         <nav class="navbar">
            <a href="home.php?h" class="ha"><b>Home</b></a>
            <a href="about.php?a" class="aa"><b>About</b></a>
            <a href="shop.php?s" class="sa"><b>Shop</b></a>
            <a href="contact.php?c" class="ca"><b>Contact</b></a>
            <a href="orders.php?o" class="oa"><b>Orders</b></a>
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
            <p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">Logout</a>
         </div>
      </div>
   </div>

</header>

