<?php

$conn = mysqli_connect('localhost','root','','contact_db');

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $number = $_POST['number'];
   $plan = $_POST['plan'];
   $address = $_POST['address'];
   $message = $_POST['message'];
      // create operation 
   $insert = "INSERT INTO `contact_form`(`name`, `email`, `number`, `plan`, `address`, `message`) VALUES ('$name','$email','$number','$plan','$address','$message')";

   mysqli_query($conn, $insert);

   header('location:contact.php');

}
// READ operation
// Retrieve all data from database
$select = "SELECT * FROM `contact_form`";
$result = mysqli_query($conn, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

<?php @include 'header.php'; ?>

<section class="contact">

   <h1 class="heading">contact us</h1>

   <form action="" method="post">

      <div class="flex">

         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>

         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>

         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>

         <div class="inputBox">
            <span>choose plan</span>
            <select name="plan">
               <option value="basic">basic plan</option>
               <option value="premium">premium plan</option>
               <option value="ultimate">ultimate plan</option>
            </select>
         </div>

         <div class="inputBox">
            <span>your address</span>            
            <textarea name="address" placeholder="enter your address" required cols="30" rows="10"></textarea>
         </div>

         <div class="inputBox">
            <span>your message</span>            
            <textarea name="message" placeholder="enter your message" required cols="30" rows="10"></textarea>
         </div>

      </div>

      <input type="submit" value="send message" name="send" class="btn">

   </form>
   <form class="crud">
    <!-- READ operation -->
      <?php if(mysqli_num_rows($result) > 0): ?>
      <table>
         <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Email</th>
               <th>Number</th>
               <th>Plan</th>
               <th>Address</th>
               <th>Message</th>
               <th>Action</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['name']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['number']; ?></td>
               <td><?php echo $row['plan']; ?></td>
               <td><?php echo $row['address']; ?></td>
               <td><?php echo $row['message']; ?></td>
               <!-- UPDATE operation -->
               <td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
               <!-- DELETE operation -->
               <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
            <?php endwhile; ?>
         </tbody>
      </table>
      <?php endif; ?>
            </form>

</section>

<?php @include 'footer.php'; ?>

</div>















<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>