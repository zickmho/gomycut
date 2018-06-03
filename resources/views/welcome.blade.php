<?php $ogTitle = 'MyCut - Skip the queue, get your haircut done at your own place!' ?>
<?php $ogURL = '' ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My Cut Malaysia</title>

        @include('partials/head')
    </head>
    <body class="homepage">

        @include('partials/header')

        <section class="homepage-hero  d-flex  align-items-center  flex-column">
            <div class="container">
                <div class="hero-wrapper  d-flex  align-items-center  flex-column  justify-content-center">
                    <h1 class="text-uppercase  text-center  text-white">Skip The Barbershop</h1>
                    <p class="text-center mb-5">Our premium & profesional barbers come to your home, office or wherever life takes you</p>
                    <div class="hero-action">
                        <a href="{{url('/booking')}}" class="btn  btn-primary">
                            Book your haircut session now
                        </a>
                        <!-- <div class="action-divider  mt-4  mb-4  text-center  text-white">
                            <span>or</span>
                        </div>
                        <a href="#" class="action-video">
                            <span class="icon  icon--video"></span>
                            Watch Our Video
                        </a> -->
                        <a href="#how-it-works" class="learn-more  text-white  d-none  d-sm-block">Learn More</a>
                    </div>
                </div>
            </div>

            <video class="mycut-video  d-none  d-sm-block" autoplay loop>
                <source src="resources/assets/public/images/mycut-web-video-small.mp4" type="video/mp4">
            </video>

            <div class="hero-overlay"></div>
        </section>

        <section class="how-it-work" id="how-it-works">
            <div class="container">
                <h2 class="text-center">Steps to look sharp and handsome</h2>
                <div class="row  pt-5">
                    <div class="col-md-4  mb-5  pl-4  pr-4">
                        <div class="hows-sprites  how-sprites--services  mb-5  mx-auto"></div>
                        <h3 class="text-center">Choose your service</h3>
                        <p class="text-center">Select your preferred service on our booking section, service vary from Premium,  normal haircut, shaving and more</p>
                    </div>
                    <div class="col-md-4  mb-5  pl-4  pr-4">
                        <div class="hows-sprites  how-sprites--location  mb-5  mx-auto"></div>
                        <h3 class="text-center">Tell Us When & Where</h3>
                        <p class="text-center">Let us know when and where is your location for us to send our barber. Earliest booking time is 4 hours from current time</p>
                    </div>
                    <div class="col-md-4  mb-5  pl-4  pr-4">
                        <div class="hows-sprites  how-sprites--relax  mb-5  mx-auto"></div>
                        <h3 class="text-center">Sit Back & Relax</h3>
                        <p class="text-center">Alert for a knock at your door. Sit back and enjoy the cut! No cash required</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="why-my-cut">
            <div class="container">
                <h2 class="text-center pb-sm-5">Why choose MyCut service?</h2>

                <div class="why-wrapper pt-5">

                    <div class="true-partners  d-md-flex  align-items-center">
                        <figure class="figure">
                            <img src="resources/assets/public/images/true-partners.png" alt="True Partners" class="img-fluid">
                        </figure>
                        <div class="why-facts  position-relative">
                            <div class="arrow-wrapper  d-none  d-md-block">
                                <img src="resources/assets/public/images/arrow-line.svg" alt="arrow">
                            </div>
                            <h3 class="mb-4">True Partners</h3>
                            <p>Mycut offers barbers and stylists 80% commission, so you know your ringgit are going to the right place</p>
                        </div>
                    </div>

                    <div class="convenient-haircut  d-md-flex  align-items-center">
                        <figure>
                            <img src="resources/assets/public/images/convenient-haircut.png" alt="Convenient Haircut" class="img-fluid">
                        </figure>
                        <div class="why-facts  position-relative">
                            <div class="arrow-wrapper  d-none  d-md-block">
                                <img src="resources/assets/public/images/arrow-line.svg" alt="arrow">
                            </div>
                            <h3 class="mb-4">Convenient Haircut</h3>
                            <p>Say goodbye to barbershop cold calls, lengthy wait times, and travel to and from appointments</p>
                        </div>
                    </div>

                    <div class="personalize-style  d-md-flex  align-items-center">
                        <figure>
                            <img src="resources/assets/public/images/personalize-style.png" alt="Personalize Style" class="img-fluid">
                        </figure>
                        <div class="why-facts  position-relative">
                            <div class="arrow-wrapper  d-none  d-md-block">
                                <img src="resources/assets/public/images/arrow-line.svg" alt="arrow">
                            </div>
                            <h3 class="mb-4">Personalize Style</h3>
                            <p>Choose the service best suited for your needs, our barber is professional and skillful enough to give you the hair looks you desire</p>
                        </div>
                    </div>
            </div>
        </section>

        <section class="our-barber">
            <div class="container-fluid  px-0">
                <div class="row  align-items-center  mx-0">
                    <div class="col-md-7  our-barbers-images">
                        <img src="resources/assets/public/images/our-barbers.png" alt="Our barbers" class="img-fluid">
                    </div>
                    <div class="col-md-5  our-barbers-content">
                        <h3 class="mb-4  mt-3">Meet our Experienced & Skillful Barber</h3>
                        <p class="mb-4">Our selected MyCut barbers has gone through background checking with us. They are experienced and skillful. Plus they are very friendly too.</p>
                        <a href="{{url('/our-barbers')}}" class="btn  btn-outline-primary">View our stylists profile</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="customer-testimonial">
            <div class="container">
                <div class="text-center  mb-4">
                    <img src="resources/assets/public/images/user-hafizuddin.png" alt="User Testimonial" width="80" height="80">
                </div>
                <p class="testimonial-text  text-center  mb-4">I’m glad that now I don’t have to queue and spend my precious time just for getting my haircut at hair salon. MyCut barbers managed to came on time plus they were very friendly and skillful too</p>
                <div class="testimonial-from  text-center">
                    <div class="d-inline-block">
                        Hafizuddin, Shah Alam
                    </div>
                </div>
            </div>
        </section>

        @include('partials/cta-bottom')

        @include('partials/footer')

        @include('partials/script')
    </body>
</html>
