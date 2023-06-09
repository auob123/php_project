<?php

$conn = mysqli_connect('localhost','root','','contact_db');

if(isset($_POST['update'])){

   $id = $_POST['id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $number = $_POST['number'];
   $plan = $_POST['plan'];
   $address = $_POST['address'];
   $message = $_POST['message'];

   $update = "UPDATE `contact_form` SET `name`='$name',`email`='$email',`number`='$number',`plan`='$plan',`address`='$address',`message`='$message' WHERE `id`='$id'";

   mysqli_query($conn, $update);

   header('location:contact.php');

}

if(isset($_GET['id'])){
   $id = $_GET['id'];
   $select = "SELECT * FROM `contact_form` WHERE `id`='$id'";
   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact - Update Record</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<section class="contact">
   
   <h1 class="heading">Update Record</h1>

   <form action="" method="post">

      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <div class="flex">

         <div class="inputBox">
            <span>Name</span>
            <input type="text" placeholder="Enter your name" name="name" value="<?php echo $row['name']; ?>" required>
         </div>

         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="Enter your email" name="email" value="<?php echo $row['email']; ?>" required>
         </div>

         <div class="inputBox">
            <span>Number</span>
            <input type="number" placeholder="Enter your number" name="number" value="<?php echo $row['number']; ?>" required>
         </div>

         <div class="inputBox">
            <span>Choose Plan</span>
            <select name="plan">
               <option value="basic"<?php if($row['plan'] == 'basic'){echo ' selected';} ?>>Basic Plan</option>
               <option value="premium"<?php if($row['plan'] == 'premium'){echo ' selected';} ?>>Premium Plan</option>
               <option value="ultimate"<?php if($row['plan'] == 'ultimate'){echo ' selected';} ?>>Ultimate Plan</option>
            </select>
         </div>

         <div class="inputBox">
            <span>Address</span>            
            <textarea name="address" placeholder="Enter your address" required cols="30" rows="10"><?php echo $row['address']; ?></textarea>
         </div>

         <div class="inputBox">
            <span>Message</span>            
            <textarea name="message" placeholder="Enter your message" required cols="30" rows="10"><?php echo $row['message']; ?></textarea>
         </div>

      </div>

      <input type="submit" value="Update Record" name="update" class="btn">

   </form>

</section>

<?php @include 'footer.php'; ?>

</div>

</body>
</html>
