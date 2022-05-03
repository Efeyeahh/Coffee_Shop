<?php

$db_name = 'mysql:host=localhost;dbname=contact-db';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

if(isset($_POST['send'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);

    $guests = $_POST['guests'];
    $guests = filter_var($guests, FILTER_SANITIZE_STRING);

    $select_contact = $conn->prepare("SELECT * FROM `contact-form` WHERE name = ? AND number = ? AND guests = ?");
    $select_contact->execute([$name, $number, $guests]);

    if($select_contact->rowCount() > 0){
        $message[] = 'message sent already!';
    }else{
        $insert_contact = $conn->prepare("INSERT INTO `contact-form`(name, number, guests) VALUES(?,?,?)");
        $insert_contact->execute([$name, $number, $guests]);
        $message[] = 'message sent successfully';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
</head>
<body>
    
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

    <header class="header">

        <section class="flex">

          <a href="#home" class="logo"><img src="Image/logo.png" alt=""></a>

          <nav class="navbar">
              <a href="#home">home</a>
              <a href="#about">about</a>
              <a href="#menu">menu</a>
              <a href="#gallery">gallery</a>
              <a href="#team">team</a>
              <a href="#contact">contact</a>
          </nav>

          <div id="menu-btn" class="fas fa-bars"></div>

        </section>

    </header>

    <div class="home-bg">

        <section class="home" id="home">

            <div class="content">
                <h3>coffee heaven</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Pariatur facilis eaque laborum cumque sapiente repellendus.</p>
                <a href="#about" class="btn">about us</a>
            </div>

        </section>

    </div>

    <section class="about" id="about">

        <div class="image">
            <img src="Image/about-img.svg" alt="">
        </div>

        <div class="content">
            <h3>A cup of coffee can complate your day</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, dolore aliquam culpa nam mollitia 
            quidem temporibus quod. Aspernatur sint, itaque ea voluptates rerum dignissimos a perferendis dolore beatae excepturi maxime!</p>
            <a href="#menu" class="btn">our menu</a>
        </div>

    </section>

    <section class="facility">

        <div class="heading">
            <img src="Image/heading-img.png" alt="">
            <h3>our facility</h3>
        </div>

        <div class="box-container">

            <div class="box">
                <img src="Image/icon-1.png" alt="">
                <h3>coffee beans</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, expedita.</p>
            </div>

            <div class="box">
                <img src="Image/icon-2.png" alt="">
                <h3>varieties of coffees</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, expedita.</p>
            </div>

            <div class="box">
                <img src="Image/icon-3.png" alt="">
                <h3>breakfast and sweets</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, expedita.</p>
            </div>

            <div class="box">
                <img src="Image/icon-4.png" alt="">
                <h3>read go to coffee</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, expedita.</p>
            </div>

        </div>

    </section>

    <section class="menu" id="menu">

        <div class="heading">
            <img src="Image/heading-img.png" alt="">
            <h3>popular menu</h3>
        </div>

        <div class="box-container">

        <div class="box">
            <img src="Image/menu-1.png" alt="">
            <h3>love you coffee</h3>
        </div>

        <div class="box">
            <img src="Image/menu-2.png" alt="">
            <h3>cappuccino</h3>
        </div>

        <div class="box">
            <img src="Image/menu-3.png" alt="">
            <h3>mocha coffee</h3>
        </div>

        <div class="box">
            <img src="Image/menu-4.png" alt="">
            <h3>frappuccino</h3>
        </div>

        <div class="box">
            <img src="Image/menu-5.png" alt="">
            <h3>black coffee</h3>
        </div>

        <div class="box">
            <img src="Image/menu-6.png" alt="">
            <h3>love heart coffee</h3>
        </div>

    </div>

    </section>

    <section class="gallery" id="gallery">

        <div class="heading">
            <img src="Image/heading-img.png" alt="">
            <h3>our gallery</h3>
        </div>

        <div class="box-container">
            <img src="Image/gallery-1.webp" alt="">
            <img src="Image/gallery-2.webp" alt="">
            <img src="Image/gallery-3.webp" alt="">
            <img src="Image/gallery-4.webp" alt="">
            <img src="Image/gallery-5.webp" alt="">
            <img src="Image/gallery-6.webp" alt="">
        </div>

    </section>

    <section class="team" id="team">

        <div class="heading">
            <img src="Image/heading-img.png" alt="">
            <h3>our team</h3>
        </div>

        <div class="box-container">

            <div class="box">
                <img src="Image/our-team-1.jpg" alt="">
                <h3>John deo</h3>
            </div>

            <div class="box">
                <img src="Image/our-team-2.jpg" alt="">
                <h3>John deo</h3>
            </div>

            <div class="box">
                <img src="Image/our-team-3.jpg" alt="">
                <h3>John deo</h3>
            </div>

            <div class="box">
                <img src="Image/our-team-4.jpg" alt="">
                <h3>John deo</h3>
            </div>

            <div class="box">
                <img src="Image/our-team-5.jpg" alt="">
                <h3>John deo</h3>
            </div>

            <div class="box">
                <img src="Image/our-team-6.jpg" alt="">
                <h3>John deo</h3>
            </div>

        </div>

    </section>

    <section class="contact" id="contact">

        <div class="heading">
            <img src="Image/heading-img.png" alt="">
            <h3>contact us</h3>
        </div>

        <div class="row">

            <div class="image">
                <img src="Image/contact-img.svg" alt="">
            </div>

            <form action="" method="post">
                <h3>book a table</h3>
                <input type="text" name="name" required class="box" maxlength="20" placeholder="name...">
                <input type="number" name="number" required class="box" min="0" max="99999999999" placeholder="number..." onkeypress="if(this.value.lenght == 10) return false">
                <input type="number" name="guests" required class="box" min="0" max="99" placeholder="how many guests..." onkeypress="if(this.value.lenght == 2) return false">
                <input type="submit" name="send" value="send message" class="btn">
            </form>

        </div>

    </section>

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>our email</h3>
                <p>efebuyuktatar23@gmail.com</p>
                <p>efebuyuktatar23@gmail.com</p>
            </div>

            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>our number</h3>
                <p>+905747676523</p>
                <p>+905747907651</p>
            </div>   
              
            <div class="box">
                <i class="fas fa-clock"></i>
                <h3>opening hours</h3>
                <p>07:00am to 09:00pm</p>
            </div>     
              
            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>shop location</h3>
                <p>kayseri, turkey</p>
            </div>     

        </div>

        <div class="credit"> &copy; copyright @ 2022 by <span>Efe Büyüktatar</span> | all rights reserved!</div>

    </section>
   
    
    <script src="script.js">

    </script>
</body>
</html>