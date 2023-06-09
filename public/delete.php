<?php
$conn = mysqli_connect('localhost', 'root', '', 'contact_db');

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $delete = "DELETE FROM `contact_form` WHERE `id`='$id'";
   mysqli_query($conn, $delete);
   header('location: contact.php');
}
?>