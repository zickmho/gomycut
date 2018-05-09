<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mycut</title>

    <link href="resources/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/assets/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="{{url('/')}}"><img class="navbar-brand" src="resources/assets/imgs/logo.png"/></a>
            <div class="navbar-left menu-item">
                <a href="#how-it-work">How it works</a>
                <a href="{{url('pricing')}}">Pricing</a>
            </div>
            <div class="navbar-right menu-item gold-border" id="btn-apply">BECOME A BARBER</div>
        </div>
        <div class="overlay"></div>
        <div class="header-content">
            @if (Session::get('message'))
                <div class="alert alert-succes">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="header-title">
                SKIP THE BARBERSHOP
                <div class="header-sub-title">
                    Our premium & professional barbers come to your home, office or wherever life takes you
                </div>
            </div>
            <br /><br />
                <div style="width: 323px;margin: auto;">
                    <a href="/booking" style="border: solid 2px;color: #000000;" class="btn btn-block btn-default btn-warning btn-lg btn-book text-uppercase btn-home-hero f-book">BOOK TO YOU </a>
                </div>
                <br /><br />
            <div class="app-links">
                <img class="app-store-badge" src="resources/assets/imgs/app-store.png"/>
                <img class="app-store-badge" src="resources/assets/imgs/play-store.png"/>
            </div>
        </div>
    </header>

    <div class="section how-it-work" id="how-it-work">
        <div class="title1">Steps to Look Sharp & Handsome</div>
        <div class="section-content col-lg-12">
            <div class="col-lg-4">
                <div class="image-title">
                    <p>1.</p>
                    <img src="resources/assets/imgs/1.png"/>
                </div>
                <div class="title2">Choose Your Service</div>
                <div class="content">Search your area to view available barbers near you and send your preferred barber a booking request</div>
            </div>
            <div class="col-lg-4">
                <div class="image-title">
                    <p>2.</p>
                    <img src="resources/assets/imgs/2.png"/>
                </div>
                <div class="title2">Tell Us When & Where</div>
                <div class="content">Your barber will confirm your booking and travel to your location within 30 mins</div>
            </div>
            <div class="col-lg-4">
                <div class="image-title">
                    <p>3.</p>
                    <img src="resources/assets/imgs/3.png"/>
                </div>
                <div class="title2">Sit Back & Relax</div>
                <div class="content">Alert for a knock at your door. Sit back and enjoy the cut! No cash required</div>
            </div>
        </div>
    </div>

    <div class="section carousel" id="carousel">
        <div class="overlay"></div>
        <div class="carousel-top col-sm-12">
            <div class="carousel-item selected col-sm-3" id="carousel-tab-1">HAPPY BARBERS</div>
            <div class="carousel-item col-sm-3" id="carousel-tab-2">CONVENIENT HAIRCUTS</div>
            <div class="carousel-item col-sm-3" id="carousel-tab-3">PERSONALIZE STYLE</div>
        </div>
        <div class="carousel-content col-sm-4" id="carousel-content-1">
            <div class="title3">True Partners</div>
            <div class="content2">Mycut offers barbers and stylists 80% commission, so you know your ringgit are going to the right place.</div>
        </div>
        <div class="carousel-content col-sm-4" id="carousel-content-2" style="display: none;">
            <div class="title3">A Better Barbershop</div>
            <div class="content2">Say goodbye to barbershop cold calls, lengthy wait times, and travel to and from appointments.</div>
        </div>
        <div class="carousel-content col-sm-4" id="carousel-content-3" style="display: none;">
            <div class="title3">Tailor Fit</div>
            <div class="content2">Match with the barbers best suited for your needs by setting personal hair preferences, or search by barber to find your go-to grooming pro.</div>
        </div>
    </div>

    <div class="testimonials">
        <video class="home-video" width="100%" autoplay controls>
            <source src="./resources/assets/imgs/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="section download-app">
        <div class="download-app-img col-lg-6">
            <img src="resources/assets/imgs/screenshot.png"/>
        </div>
        <div class="download-app-link col-lg-6">
            <div class="title4">Subscribe!!</div>
            <div class="content3">for more information</div>
            <form class="col-lg-12" id="subscribe-form" action="{{url('subscribe/store')}}">
                {!! csrf_field() !!}
                <div class="col-lg-6" style="padding:0 !important;">
                    <input type="text" name="email" placeholder="example:user@gmail.com"/>
                </div>
                <div class="col-lg-3" style="padding:0 !important;">
                    <button type="submit" class="btn-subscribe">Subscribe</button>
                </div>
                <div class="col-lg-3"></div>
            </form>
            <br />
            <div class="content3">Download for iPhone or Android.</div>
            <br /><br />
            <div class="app-links">
                <img class="app-store-badge" src="resources/assets/imgs/app-store.png"/>
                <img class="app-store-badge" src="resources/assets/imgs/play-store.png"/>
            </div>
            <br />
            <div class="title4">#GetMyCut</div>
        </div>
    </div>

    <div class="section footer">
        <div class="footer-container col-lg-6">
            <div class="footer-menu">About</div>
            <div class="footer-menu-item">FAQ</div>
            <div class="footer-menu-item">Download</div>
        </div>
        <div class="footer-container col-lg-6">
            <div class="footer-menu">Become a Barber</div>
            <div class="footer-menu-item" id="footer-btn-apply">Want to join our team?</div>
        </div>
    </div>

    <div class="copyright">
        <div class="address col-lg-6">
            @ 2017 79 Madison Ave, Fl. 2, New York, NY 10016
        </div>
        <div class="contacts col-lg-6">
            <div class="contact-item col-lg-2">PRIVACY</div>
            <div class="contact-item col-lg-2">TERMS</div>
            <div class="contact-item col-lg-4">
                <i class="fa fa-phone" aria-hidden="true"></i>
                (212) 252-2083
            </div>
            <div class="contact-item col-lg-4">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                CONTACT US
            </div>
        </div>
    </div>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5a6a16a5d7591465c7071813/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>

<script>
$(function() {
$('#carousel-tab-1').click(function() {
        $(this).addClass('selected');
        $('#carousel-tab-2').removeClass('selected');
        $('#carousel-tab-3').removeClass('selected');

        $('#carousel-content-1').css('display', 'block');
        $('#carousel-content-2').css('display', 'none');
        $('#carousel-content-3').css('display', 'none');

        $('#carousel').css('background-image', 'url(resources/assets/imgs/carousel1.jpg)');
    });

    $('#carousel-tab-2').click(function() {
        $(this).addClass('selected');
        $('#carousel-tab-1').removeClass('selected');
        $('#carousel-tab-3').removeClass('selected');

        $('#carousel-content-1').css('display', 'none');
        $('#carousel-content-2').css('display', 'block');
        $('#carousel-content-3').css('display', 'none');

        $('#carousel').css('background-image', 'url(resources/assets/imgs/carousel2.jpg)');
    });

    $('#carousel-tab-3').click(function() {
        $(this).addClass('selected');
        $('#carousel-tab-1').removeClass('selected');
        $('#carousel-tab-2').removeClass('selected');

        $('#carousel-content-1').css('display', 'none');
        $('#carousel-content-2').css('display', 'none');
        $('#carousel-content-3').css('display', 'block');

        $('#carousel').css('background-image', 'url(resources/assets/imgs/carousel3.jpg)');
    });

    $('#btn-apply').click(function() {
        window.location.href = "{{url('/apply')}}";
    });

    $('#footer-btn-apply').click(function() {
        window.location.href = "{{url('/apply')}}";
    });

    $('#subscribe-form').validate({
        rules: {
            'email': {required: true}
        },
        messages: {
            'email': {required: "Please input email."}
        },
        submitHandler: function (form) {
            var url = form.getAttribute('action');
            $.ajax({
                type: 'POST',
                url: url,
                data: $('#subscribe-form').serialize(),
                success: function(response) {
                    $.alert({
                        title: 'Subscribe',
                        content: response
                    });
                }
            })
        },
        success: function (e) {
            //
        }
    });
});
</script>
