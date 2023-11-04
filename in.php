<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--- google fonts Link ---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---- icon cdn link---->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        <?php require_once("ind.js"); ?>
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="style/index.css">
</head>

<body>

    <!--- owl carsoul ---->



    <!----ecommerce ------>


    <header>

        <nav>

            <img src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2018/12/logo1-free-img.png"
                class="logo">

            <ul class="menu-bar-side">
                <li>everything</li>
                <li>women</li>
                <li>men</li>
                <li>accessories</li>
            </ul>

            <ul class="menu-bar">
                <li>about</li>
                <li>contect us</li>
                <li>&#36;0.00</li>
                <li><i class='fas fa-shopping-cart'></i></li>
                <li><i class='fas fa-user-alt'></i></li>
            </ul>

            <i class="fa fa-bars"></i>
        </nav>


        <div class="content">

            <h2 class="heading">
                Raining Offers For Hot Summer!
            </h2>

            <h4>
                25% Off On All Products
            </h4>

            <button class="shopNow">
                shop now
            </button>
            <button class="findMore">
                find more
            </button>

        </div>

    </header>
    <!--- end header --->


    <section>

        <div class="brands">
            <div class="carousel owl-carousel">
                <div class="card card-1">
                    <img
                        src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2022/08/client-logo-5.png">
                </div>
                <div class="card card-2">
                    <img
                        src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2021/03/client-logo-2.png">
                </div>
                <div class="card card-3">
                    <img
                        src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2021/03/client-logo-3.png">
                </div>
                <div class="card card-4">
                    <img
                        src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2021/03/client-logo-4.png">
                </div>
                <div class="card card-5">
                    <img
                        src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2022/08/client-logo-5.png">
                </div>
                <div class="card card-6">
                    <img
                        src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2022/08/client-logo-5.png">
                </div>
            </div>
        </div>
        <!--- brands logo ---->


        <div class="discount">
            <div class="discount-box">
                <h3>20% Off On Tank Tops</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac dictum.</P>
                <button>shop now</button>
            </div>

            <div class="discount-box">
                <h3>Latest Eyewear For You</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac dictum.​</P>
                <button>shop now</button>
            </div>

            <div class="discount-box">
                <h3>Let's Lorem Suit Up!</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac dictum.</P>
                <button>check out</button>
            </div>

        </div>
        <!---discount ----->


        <div class="featured-Products">

            <h2>Featured Products</h2>

            <div class="product">
                <img src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2021/03/sports-shoe3-400x400.jpg"
                    class="product-photo">

                <i class="fa fa-shopping-basket basket"></i>

                <p class="sale">Sale!</p>

                <div class="product-content">
                    <p class="name">
                        DNK Yellow Shoes
                    </p>
                    <p class="category">
                        Men
                    </p>
                    <p class="price">
                        <span>&#36;150.00</span>
                        &#36;120.00
                    </p>
                    <p class="stars">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </p>
                </div>
            </div>
            <div class="product">
                <img src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2021/03/sports-shoe1-400x400.jpg"
                    id="sheochange">

                <i class="fa fa-shopping-basket basket"></i>

                <div class="product-content">
                    <p class="name">
                        DNK Blue Shoes
                    </p>
                    <p class="category">
                        Men
                    </p>
                    <p class="price">
                        &#36;200.00
                    </p>
                    <div class="colors-option">
                        <span class="sheos sheoActive"
                            onclick="sheoColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2021/03/sports-shoe1-400x400.jpg','0')"></span>
                        <span class="sheos"
                            onclick="sheoColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2017/12/sports-shoe4-300x300.jpg','1')"></span>
                        <span class="sheos"
                            onclick="sheoColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2021/03/sports-shoe2-300x300.jpg','2')"></span>
                    </div>
                    <p class="stars">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </p>
                </div>
            </div>
            <div class="product">
                <img
                    src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2017/12/product-m-jeans1-400x400.jpg">

                <i class="fa fa-shopping-basket basket"></i>

                <div class="product-content">
                    <p class="name">
                        Dark Brown Jeans
                    </p>
                    <p class="category">
                        Men
                    </p>
                    <p class="price">
                        &#36;150.00
                    </p>
                    <p class="stars">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </p>
                </div>
            </div>
            <div class="product">
                <img
                    src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2017/12/product-w-jeans2-400x400.jpg">

                <i class="fa fa-shopping-basket basket"></i>

                <div class="product-content">
                    <p class="name">
                        Blue Denim Jeans
                    </p>
                    <p class="category">
                        Women
                    </p>
                    <p class="price">
                        &#36;150.00
                    </p>
                    <p class="stars">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </p>
                </div>
            </div>
            <div class="product">
                <img src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2017/12/product-w-jeans1-400x400.jpg"
                    class="product-photo">

                <i class="fa fa-shopping-basket basket"></i>

                <p class="sale">Sale!</p>

                <div class="product-content">
                    <p class="name">
                        Blue Denim Shorts
                    </p>
                    <p class="category">
                        Women
                    </p>
                    <p class="price">
                        <span>&#36;150.00</span>
                        &#36;130.00
                    </p>
                    <p class="stars">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </p>
                </div>
            </div>
            <div class="product">
                <img src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2017/12/product-accessory1-300x300.jpg"
                    id="bracelet">

                <i class="fa fa-shopping-basket basket"></i>

                <div class="product-content">
                    <p class="name">
                        Boho Bangle Bracelet
                    </p>
                    <p class="category">
                        Accessories
                    </p>
                    <p class="price">
                        &#36;150.00
                    </p>
                    <div class="colors-option">
                        <span class="bracelets braceletActive" style="background:#03C2DC;"
                            onclick="braceletColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2017/12/product-accessory1-300x300.jpg','0')"></span>
                        <span class="bracelets"
                            onclick="braceletColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2022/08/product-accessory1-c-300x300.jpg','1')"></span>
                        <span class="bracelets" style="background:#DC5C03;"
                            onclick="braceletColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2022/08/product-accessory1-b-300x300.jpg','2')"></span>
                    </div>
                    <p class="stars">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </p>
                </div>
            </div>
            <div class="product">
                <img src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2022/08/product-bag3-c-300x300.jpg"
                    id="bag">

                <i class="fa fa-shopping-basket basket"></i>

                <div class="product-content">
                    <p class="name">
                        Bright Red Bag
                    </p>
                    <p class="category">
                        Accessories
                    </p>
                    <p class="price">
                        &#36;100.00 – &#36;140.00
                    </p>
                    <div class="colors-option">
                        <span class="bag bagActive"
                            onclick="bagColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2022/08/product-bag3-c-300x300.jpg','0')"></span>
                        <span class="bag" style="background:#DC5C03;"
                            onclick="bagColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2022/08/product-bag3-d-300x300.jpg','1')"></span>
                        <span class="bag" style="background:#D103BE;"
                            onclick="bagColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2022/08/product-bag3-b-300x300.jpg','2')"></span>
                        <span class="bag" style="background:#D11C03;"
                            onclick="bagColorChange('https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2017/12/product-bag3-300x300.jpg','3')"></span>
                    </div>
                    <p class="stars">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </p>
                </div>
            </div>
            <div class="product">
                <img
                    src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2017/12/product-bag1-400x400.jpg">

                <i class="fa fa-shopping-basket basket"></i>

                <div class="product-content">
                    <p class="name">
                        Light Brown Purse
                    </p>
                    <p class="category">
                        Accessories
                    </p>
                    <p class="price">
                        &#36;150.00
                    </p>
                    <p class="stars">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </p>
                </div>
            </div>

        </div>
        <!---featured products ----->


        <div class="limited-Offer">
            <div class="offer-content">
                <div class="content-box">
                    <p class="offer">
                        Limited Time Offer
                    </p>
                    <h3>
                        Special Edition
                    </h3>
                    <p class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper
                        mattis, pulvinar dapibus leo.
                    </p>
                    <p class="offer">
                        Buy This T-shirt At 20% Discount, Use Code OFF20
                    </p>
                    <button>shop now</button>
                </div>
            </div>
        </div>
        <!---- limited offer---->


        <div class="info">

            <div class="info-section">
                <img
                    src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2018/12/globe-free-img.png">

                <h3>Worldwide Shipping</h3>
                <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>

            </div>
            <div class="info-section">
                <img
                    src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2018/12/quality-free-img.png">

                <h3>Best Quality</h3>
                <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>

            </div>
            <div class="info-section">
                <img src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2018/12/tag-free-img.png">

                <h3>Best Offers</h3>
                <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>

            </div>
            <div class="info-section">
                <img
                    src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2018/12/lock-free-img.png">

                <h3>Secure Payments</h3>
                <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>

            </div>

        </div>
        <!---- info ---->

    </section>



</body>
<footer>

    <div class="offer-info">
        SALE UP TO 70% OFF FOR ALL CLOTHES & FASHION ITEMS, ON ALL BRANDS.
    </div>
    <!--- offer-info ---->


    <div class="footer-info">

        <div class="container">
            <img
                src="https://websitedemos.net/brandstore-02/wp-content/uploads/sites/150/2018/12/logo@2x-free-img-120x40.png">

            <h2>The best look anytime, anywhere.</h2>
        </div>
        <div class="container">

            <h5>For Her</h5>
            <ul>
                <li>Women Jeans</li>
                <li>Tops and Shirts</li>
                <li>Women Jackets</li>
                <li>Heels and Flats</li>
                <li>Women Accessories</li>
            </ul>
        </div>
        <div class="container">

            <h5>For Him</h5>
            <ul>
                <li>Men Jeans</li>
                <li>Men Shirts</li>
                <li>Men Shoes</li>
                <li>Men Accessories</li>
                <li>Men Jackets</li>
            </ul>
        </div>
        <div class="container">

            <h5>Subscribe</h5>

            <form>
                <input type="text" placeholder="Your email address..." class="name">
                <input type="submit" class="submit" value="Subscribe">
            </form>
        </div>

    </div>
    <!--- footer-info ---->

    <div class="footer-copyright">

        <div class="copyright">
            Copyright © 2023 Brandstore. Powered by Brandstore.
        </div>

        <div class="social">
            <i class="fa fa-facebook-f"></i>
            <i class="fa fa-youtube-play"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-google"></i>
        </div>

    </div>
    <!--- footer-copyright ---->

</footer>

</html>