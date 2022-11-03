<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- swiper carrousel cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <title>Reservar Hotel</title>
</head>
<body>
    <!-- header section starts -->
    <section class="header">

        <div class="flex">
            <a href="#inicio" id="inicio" class="logo">Hotels And Resolts</a>
            <a href="#reserva" class="btn">verificar disponibilidade</a>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>

        <nav class="navbar">
            <a href="#inicio">inicio</a>
            <a href="#sobre">sobre</a>
            <a href="#servicos">serviços</a>
            <a href="#reserva">reserva</a>
            <a href="#galeria">galeria</a>
            <a href="#contato">contato</a>
            <a href="#reviews">reviews</a>
        </nav>

    </section>
    <!-- header section end -->
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
                    <select name="adults" class="input">
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
                    <select name="room" class="input">
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
                    <select name="adults" class="input">
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
                    <select name="room" class="input">
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
                <input type="number" name="numero" required maxlength="9" min ="0" max="99999" placeholder="coloque seu numero" class="box">
                <textarea name="msg" class="box"required maxlength="1000" placeholder="coloque sua mensagem" cols="30" rows="10"></textarea>
                <input type="submit" value="enviar" class="btn">
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
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <a href=""><i class="fas fa-phone"></i>(21)11111-2222</a>
                <a href=""><i class="fas fa-phone"></i>(21)12345-2222</a>
                <a href=""><i class="fas fa-envelope"></i>email:joseph.robert.carvalho@gmail.com</a>
                <a href=""><i class="fas fa-market-alt"></i>Rio de janeiro , Rio de Janeiro - 25555-555</a>
            </div>
            <div class="box">
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#reservation">reservation</a>
                <a href="#gallery">gallery</a>
                <a href="#contact">contact</a>
                <a href="#reviews">reviews</a>
            </div>
            <div class="box">
                <a href="">facebook <i class="fab fa-facebook-f"></i></a>
                <a href="">twitter <i class="fab fa-twitter"></i></a>
                <a href="">instagram <i class="fab fa-instagram"></i></a>
                <a href="">linkedin <i class="fab fa-linkedin"></i></a>
                
            </div>
        </div>
        <div class="credit">&copy; copyright @2022 by joseph robert | all right reseved! </div>
    </footer>




<!-- script do swiper     -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>
    
</body>
</html>