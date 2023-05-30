<?php

$conn = mysqli_connect('localhost','root','','contact_db') or die('connection failed');

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
   
   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Our Personal Portfolio Website</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

   <!-- aos css link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" data-aos="zoom-out">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>


<header class="header">

   <div id="menu-btn" class="fas fa-bars"></div>

   <a href="index.php" class="logo">Portfolio</a>

   <nav class="navbar">
      <a href="index.php">home</a>
      <a href="about us.php">about us</a>
      <a href="our educational background.php">our educational background</a>
      <a href="goal.php">our goal</a>
      <a href="profile of samantha.php">portfolio</a>
      <a href="contact.php">contact</a>
   </nav>

   <div class="follow">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
      <a href="#" class="fab fa-linkedin"></a>
      <a href="#" class="fab fa-github"></a>
   </div>

</header>

<section class="about" id="about">

 <div class="edu-exp">

      <h1 class="heading" data-aos="fade-up"> <span>Educational Background of pauline luz maigting</span> </h1>

      <div class="row">

         <div class="box-container">

            <h3 class="title" data-aos="fade-right">education</h3>

            <div class="box" data-aos="fade-right">
               <span>( 2014 - 2015 )</span>
               <h3>Primary</h3>
               <p>Bantay Elemetary School</p>
            </div>

            <div class="box" data-aos="fade-right">
               <span>( 2018 - 2019 )</span>
               <h3>Secondary</h3>
               <p>Marinduque National High School</p>
            </div>

             <div class="box" data-aos="fade-right">
               <span>( 2020 - 2021 )</span>
               <h3>Secondary</h3>
               <p>Marinduque  National High School</p>
            </div>
            
             <div class="box" data-aos="fade-right">
              <h3> <a href="education of kristuf.php"> click this for educational of kristuf lamonte</a></h3>
            </div>
            </div>

         </div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- aos js link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

   AOS.init({
      duration:800,
      delay:300
   });

</script>
   
</body>
</html>