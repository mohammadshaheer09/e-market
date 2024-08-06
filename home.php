<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      .image{
         width: 300px;
         height: 30rem;
         object-fit: contain;
         margin:auto;
      }


      .home{
   min-height: 70vh;
   background:linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url(./images/sjec.jpg) no-repeat;
   background-size: cover;
   background-position: center;
   display: flex;
   align-items: center;
   justify-content: center;
}

   </style>

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3 class="text-shrink">Organic Vegetables and Fruits</h3>
      <p>Have a Healthy Life "HEALTH IS WEALTH"</p>
      <a href="about.php" class="white-btn">Discover More</a>
   </div>

</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="row">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?><div class="col-md-6 m-auto p-0">
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><h1><?php echo $fetch_products['name']; ?></h1></div>
      <div class="price"><h1><?php echo $fetch_products['price']; ?>/-</h1></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
     </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>
   </section>
   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">Load More</a>
   </div>
 


<section class="about">

   <div class="flex">

      <div class=" image1">
         <img src="images/sjec.jpg" alt="">
      </div>

      <div class="content">
         <h3>About us</h3>
         <p>We provide organic native products</p>
         <a href="about.php" class="btn">Read More</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>Have Any Questions?</h3>
      <p>Contact us here</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>