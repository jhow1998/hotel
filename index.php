<?php

include 'components/config.php';

if(isset($_POST['check'])){
    $check_in = $_POST['check_in'];
    $check_in = filter_var($check_in,FILTER_SANITIZE_STRING);

    $total_rooms = 0;

    $check_bookings = $pdo->prepare("SELECT * FROM `bookings` WHERE check_in = ? ");
    $check_bookings->execute([$check_in]);

    while ($fetch_bookings = $check_bookings->fetch(PDO::FETCH_ASSOC)) {
        $total_rooms += $fetch_bookings['rooms'];
    }

    if($total_rooms >= 30){
        $warning_msg[] = 'os quartos não estão disponíveis';
    }else{
       $success_msg[] = 'os quartos estão disponíveis'; 
    }
}

if(isset($_POST['book'])){
    $booking_id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name,FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email,FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number,FILTER_SANITIZE_STRING);
    $rooms = $_POST['rooms'];
    $rooms = filter_var($rooms,FILTER_SANITIZE_STRING);
    $check_in = $_POST['check_in'];
    $check_in = filter_var($check_in,FILTER_SANITIZE_STRING);
    $check_out = $_POST['check_out'];
    $check_out = filter_var($check_out,FILTER_SANITIZE_STRING);
    $adults = $_POST['adults'];
    $adults = filter_var($adults,FILTER_SANITIZE_STRING);
    $childs = $_POST['childs'];
    $childs = filter_var($childs,FILTER_SANITIZE_STRING);

    $total_rooms = 0;

    $check_bookings = $pdo->prepare("SELECT * FROM `bookings` WHERE check_in = ? ");
    $check_bookings->execute([$check_in]);

    while ($fetch_bookings = $check_bookings->fetch(PDO::FETCH_ASSOC)) {
        $total_rooms += $fetch_bookings['rooms'];
    }

    if($total_rooms >= 30){
        $warning_msg[] = 'os quartos não estão disponíveis';
    }else{
      $verify_bookings = $pdo->prepare("SELECT * FROM `bookings` WHERE user_id = ? AND name = ? AND email = ? AND number = ? AND rooms = ? AND check_in = ? AND check_out = ? AND adults = ? AND childs = ?");
      $verify_bookings->execute([$user_id,$name,$email,$number,$rooms,$check_in,$check_out,$adults,$childs]);

      if($verify_bookings->rowCount() > 0){
        $warning_msg[] = 'quarto já reservado!';
      }else{
        $book_room = $pdo->prepare("INSERT INTO `bookings`(booking_id,user_id,name,email,number,rooms,check_in,check_out,adults,childs) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $book_room->execute([$booking_id,$user_id,$name,$email,$number,$rooms,$check_in,$check_out,$adults,$childs]);
        $success_msg[]= 'quarto reservado com sucesso !';
      }

    }

    if(isset($_POST['enviar'])){
        $id = create_unique_id();
        $name = $_POST['name'];
        $name = filter_var($name,FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email,FILTER_SANITIZE_STRING);
        $number = $_POST['number'];
        $number = filter_var($number,FILTER_SANITIZE_STRING);
        $message = $_POST['message'];
        $message = filter_var($message,FILTER_SANITIZE_STRING);

        $verify_message = $pdo->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
        $verify_message->execute([$name , $email , $number , $message]);

        if($verify_message->rowCount() > 0){
            $warning_msg[] = 'message sent already !';
        }else{
            $insert_message = $pdo->prepare("INSERT INTO `messages`(id,name,email,number,message) VALUES(?,?,?,?,?) ");
            $insert_message->execute([$id,$name,$email,$number,$message]);
            $success_msg[] = 'message send succesfuly!';
        }
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- font font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- swiper carrousel cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <title>Reservar Hotel</title>
</head>
<body>
   <?php include 'components/user_header.php';?>
    <!-- home inicio  -->

    <section class="home" id="inicio">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="box swiper-slide">
                    <img src="images/home-img-1.jpg" alt="">
                    <div class="flex">
                        <h3>quartos de luxo</h3>
                        <a href="#availability" class="btn">verificar disponibilidade</a>
                    </div>
                </div>

                <div class="box swiper-slide">
                    <img src="images/home-img-2.jpg" alt="">
                    <div class="flex">
                        <h3>comidas & drinks</h3>
                        <a href="#reservation" class="btn">verificar disponibilidade</a>
                    </div>
                </div>

                <div class="box swiper-slide">
                    <img src="images/home-img-3.jpg" alt="">
                    <div class="flex">
                        <h3>Melhores vistas</h3>
                        <a href="#contact" class="btn">verificar disponibilidade</a>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- home fim  -->

    <!-- availability section inicio -->
    
    <section class="availability" id="reserva">
        
        <form action="" method="post" >
 
            <div class="flex">
                <div class="box">
                    <p>check in <span>*</span></p>
                    <input type="date" name="check_in" class="input" required>
                </div>
                <div class="box">
                    <p>check out<span>*</span></p>
                    <input type="date" name="check_out" class="input" required>
                </div>
                <div class="box">
                    <p>adultos<span>*</span></p>
                    <select name="adults" class="input">
                        <option value="1">1 adulto</option>
                        <option value="2">2 adultos</option>
                        <option value="3">3 adultos</option>
                        <option value="4">4 adultos</option>
                        <option value="5">5 adultos</option>
                        <option value="6">6 adultos</option>
                    </select>
                </div>
                <div class="box">
                    <p>criança<span>*</span></p>
                    <select name="childs" class="input">
                        <option value="-">0 criança</option>
                        <option value="1">1 criança</option>
                        <option value="2">2 crianças</option>
                        <option value="3">3 crianças</option>
                        <option value="4">4 crianças</option>
                        <option value="5">5 crianças</option>
                        <option value="6">6 crianças</option>
                    </select>
                </div>
                <div class="box">
                    <p>quartos<span>*</span></p>
                    <select name="rooms" class="input">
                        <option value="1">1 quarto</option>
                        <option value="2">2 quartos</option>
                        <option value="3">3 quartos</option>
                        <option value="4">4 quartos</option>
                        <option value="5">5 quartos</option>
                        <option value="6">6 quartos</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="verificar disponibilidade" name="check" class="btn">
        </form>

    </section>

    <!-- availability section fim -->
    <!-- inicio section about -->
    <section class="about" id="sobre">
        <div class="row">
            <div class="image">
                <img src="images/about-img-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>melhores equipes</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laudantium debitis perspiciatis?</p>
                <a href="" class="btn">façe sua reserva</a>
            </div>
        </div>

        <div class="row revers">
            <div class="image">
                <img src="images/about-img-2.jpg" alt="">
            </div>
            <div class="content">
                <h3>melhores comidas</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laudantium debitis perspiciatis?</p>
                <a href="#contact" class="btn">contate-nos</a>
            </div>
        </div>

        <div class="row">
            <div class="image">
                <img src="images/about-img-3.jpg" alt="">
            </div>
            <div class="content">
                <h3>Piscinas</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laudantium debitis perspiciatis?</p>
                <a href="#availability" class="btn">verificar disponibilidade</a>
            </div>
        </div>
    </section>    
       
    <!-- fim section about -->
    <!-- serviços section inicio -->
    <section class="services" id="servicos">

        <div class="box-container">

            <div class="box">
                <img src="images/icon-1.png" alt="">
                <h3>comida & drinks</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, quibusdam.</p>
            </div>

            <div class="box">
                <img src="images/icon-2.png" alt="">
                <h3>comida & drinks</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, quibusdam.</p>
            </div>

            <div class="box">
                <img src="images/icon-3.png" alt="">
                <h3>comida & drinks</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, quibusdam.</p>
            </div>

            <div class="box">
                <img src="images/icon-4.png" alt="">
                <h3>comida & drinks</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, quibusdam.</p>
            </div>

            <div class="box">
                <img src="images/icon-5.png" alt="">
                <h3>comida & drinks</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, quibusdam.</p>
            </div>

            <div class="box">
                <img src="images/icon-6.png" alt="">
                <h3>comida & drinks</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, quibusdam.</p>
            </div>

        </div>



    </section>
    <!-- serviços section fim -->
    <!-- inicio reservation section -->
    <section class="reservation" id="reserva">
        <form action="" method="post" >
            <h3>faça sua reserva </h3>
            <div class="flex">
                <div class="box">
                    <p>Seu nome <span>*</span></p>
                    <input type="text" name="name" maxlength="50" placeholder="coloque seu nome" class="input" required>
                </div>
                <div class="box">
                    <p>Seu email <span>*</span></p>
                    <input type="text" name="email" maxlength="50" placeholder="coloque seu email" class="input" required>
                </div>
                <div class="box">
                    <p>Seu numero <span>*</span></p>
                    <input type="text" name="number" maxlength="10" min="0" max="999999" placeholder="coloque seu email" class="input" required>
                </div>
                <div class="box">
                    <p>quartos<span>*</span></p>
                    <select name="rooms" class="input">
                        <option value="1">1 quarto</option>
                        <option value="2">2 quartos</option>
                        <option value="3">3 quartos</option>
                        <option value="4">4 quartos</option>
                        <option value="5">5 quartos</option>
                        <option value="6">6 quartos</option>
                    </select>
                </div>
                <div class="box">
                    <p>check in <span>*</span></p>
                    <input type="date" name="check_in" class="input" required>
                </div>
                <div class="box">
                    <p>check out<span>*</span></p>
                    <input type="date" name="check_out" class="input" required>
                </div>
                <div class="box">
                    <p>adultos<span>*</span></p>
                    <select name="adults" class="input">
                        <option value="1">1 adulto</option>
                        <option value="2">2 adultos</option>
                        <option value="3">3 adultos</option>
                        <option value="4">4 adultos</option>
                        <option value="5">5 adultos</option>
                        <option value="6">6 adultos</option>
                    </select>
                </div>
                <div class="box">
                    <p>criança<span>*</span></p>
                    <select name="childs" class="input">
                        <option value="-">0 criança</option>
                        <option value="1">1 criança</option>
                        <option value="2">2 crianças</option>
                        <option value="3">3 crianças</option>
                        <option value="4">4 crianças</option>
                        <option value="5">5 crianças</option>
                        <option value="6">6 crianças</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="reserva agora" name="book" class="btn">
        </form>
    </section>
    <!-- fim reservation section -->
    <!-- galeria inicio -->

    <section class="gallery" id="galeria">
        <div class="swiper gallery-slider">
            <div class="swiper-wrapper">
                <img src="images/gallery-img-1.jpg" alt="" class="swiper-slide">
                <img src="images/gallery-img-2.webp" alt="" class="swiper-slide">
                <img src="images/gallery-img-3.webp" alt="" class="swiper-slide">
                <img src="images/gallery-img-4.webp" alt="" class="swiper-slide">
                <img src="images/gallery-img-5.webp" alt="" class="swiper-slide">
                <img src="images/gallery-img-6.webp" alt="" class="swiper-slide">
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- galeria fim -->
    <!-- inicio contato -->
    <section class="contact" id="contato">
        <div class="row">
            <form action="" method="post">
                <h3>envie sua mensagem</h3>
                <input type="text" name="name" required maxlength="50" placeholder="coloque seu nome" class="box">
                <input type="email" name="email" required maxlength="50" placeholder="coloque seu email" class="box">
                <input type="number" name="number" required maxlength="9" min ="0" max="999999999" placeholder="coloque seu numero" class="box">
                <textarea name="message" class="box"required maxlength="1000" placeholder="coloque sua mensagem" cols="30" rows="10"></textarea>
                <input type="submit" value="enviar" name="send" class="btn">
            </form>

            <div class="faq">
                <h3 class="title">perguntas frequentes</h3>
                <div class="box active">
                    <h3>como cancelar ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, blanditiis unde!</p>
                </div>
                <div class="box">
                    <h3>como cancelar ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, blanditiis unde!</p>
                </div>
                <div class="box">
                    <h3>como cancelar ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, blanditiis unde!</p>
                </div>
                <div class="box">
                    <h3>como cancelar ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, blanditiis unde!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- fim contato -->
    <!-- inicio reviews -->
    <section class="reviews" id="reviews">
        <div class="swiper reviews-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide  box">
                    <img src="images/pic-1.png" alt="">
                    <h3>joseph robert</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, recusandae illum.</p>
                </div>

                <div class="swiper-slide box">
                    <img src="images/pic-2.png" alt="">
                    <h3>joseph robert</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, recusandae illum.</p>
                </div>

                <div class="swiper-slide box">
                    <img src="images/pic-3.png" alt="">
                    <h3>joseph robert</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, recusandae illum.</p>
                </div>

                <div class="swiper-slide box">
                    <img src="images/pic-4.png" alt="">
                    <h3>joseph robert</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, recusandae illum.</p>
                </div>

                <div class="swiper-slide box">
                    <img src="images/pic-5.png" alt="">
                    <h3>joseph robert</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, recusandae illum.</p>
                </div>

                <div class="swiper-slide box">
                    <img src="images/pic-6.png" alt="">
                    <h3>joseph robert</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, recusandae illum.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- fim reviews -->
    

<?php include 'components/footer.php';?>
<!-- script do swiper     -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- script do alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="assets/js/script.js"></script>

<?php include 'components/message.php' ?>
    
</body>
</html>