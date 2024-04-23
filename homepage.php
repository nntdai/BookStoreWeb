<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./css/homepage.css">
    <!-- Boostrap v5 -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        @media screen and (min-width: 576px) {
            .sanpham_carousel .carousel-inner{
                display: flex;
            }

            .sanpham_carousel .carousel-item{
                display: block;
                margin-right: 0;
                flex: 0 0 calc(100% / 4);   
                margin: 0 .5rem;
            }
            
        }
        

        .img-wrapper {
            max-width: 100%;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

       .sanpham_carousel .carousel-control-prev,.sanpham_carousel .carousel-control-next {
            width: 6vh;
            height: 6vh;
            background-color: #e1e1e1;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: .5;
        }
       .sanpham_carousel .carousel-control-prev:hover, 
       .sanpham_carousel .carousel-control-next:hover {
            background-color: #e1e1e1;
            opacity: 1;
        }

    </style>
</head>
<body>
    <!-- Header -->
    <?php   require("./homepage_pages/header.php"); ?>

    <!-- Body -->
    <?php require("./homepage_pages/body.php"); ?> 
    
    <!-- Footer -->
    <?php require("./homepage_pages/footer.php"); ?> 

    <?php 
        include("./taikhoan/frmdangnhap.php");
        include("./taikhoan/frmdangki.php");
        include("./taikhoan/statusModal.php"); 
    ?>
</body>
<script src="./js/homepage.js"></script>
<script>
    $(window).on("resize", function() {
        window.location.reload();
    });
    $(document).ready(function() {
        let sanPhamCarousel = document.querySelectorAll('.sanpham_carousel');
        if (window.matchMedia('(min-width: 576px)').matches) {
            $(sanPhamCarousel).each(function(index, element) {
                let carousel = new bootstrap.Carousel(element, {
                    interval: 1
                });

                //get element's carousel-inner width
                let carouselWidth = $(element).find('.carousel-inner').width();
                //get element's carousel-item width
                let carouselItemWidth = $(element).find('.carousel-item').width();
                let scrollPosition = 0;
                $(element).find('.carousel-control-prev').click(function() {
                    if(scrollPosition > 0) {
                        scrollPosition -= carouselItemWidth;
                        $(element).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
                    }
                });
                $(element).find('.carousel-control-next').click(function() {
                    if(scrollPosition < carouselWidth - carouselItemWidth) {
                        scrollPosition += carouselItemWidth;
                        $(element).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
                    }
                    else {
                        scrollPosition = 0;
                        $(element).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
                    }
                });
            });
        } else {
            $(sanPhamCarousel).each(function(index, element) {
                $(element).addClass("slide");
            });
        }
        
        setInterval(function() {
            $("#khuyenmai_carousel").find('.carousel-control-next').click();
        }, 3000);
    });
</script>
</html>