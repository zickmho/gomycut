<header class="header">
    <div class="header-top  d-lg-flex  align-items-center  d-none">
        <div class="container">
            <ul class="p-2 d-flex  mb-0  justify-content-end  align-items-center">
                <li class="mr-4">
                    Our Hotline : 03-1234567
                </li>
                <li class="mr-2">
                    <a href="https://www.facebook.com/MyCutMalaysia" target="_blank" class="text-white">
                        <span class="icon icon--social-facebook"></span>
                    </a>
                </li>
                <li class="mr-2">
                    <a href="https://www.instagram.com/mycutmalaysia/" class="text-white" target="_blank">
                        <span class="icon icon--social-instagram"></span>
                    </a>
                </li>
                <!-- <li class="mr-2">
                    <a href="#" class="text-white" target="_blank">
                        <span class="icon icon--social-twitter"></span>
                    </a>
                </li>
                <li class="mr-2">
                    <a href="#" class="text-white" target="_blank">
                        <span class="icon icon--social-youtube"></span>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container  d-flex  align-items-center">
            <nav class="nav-left  u-right-auto  d-none  d-lg-block">
                <ul class="d-flex  align-items-center">
                    <li class="mr-5">
                        <a class="how-it-work-link" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="mr-5">
                        <a href="{{url('/pricing')}}">Pricing</a>
                    </li>
                    <li class="mr-5">
                        <a href="{{url('/our-barbers')}}">Our Barbers</a>
                    </li>
                </ul>
            </nav>
            <div class="mobile-hamburger  d-lg-none">
                <button class="mobile-hamburger__button">
                    <span></span>
                </button>
            </div>
            <a href="{{url('/')}}" class="logo-main">
                <div class="logo-wrapper">
                    <img src="resources/assets/public/images/logo-mycut.png" alt="mycut logo" class="img-fluid">
                </div>
            </a>
            <nav class="nav-right  u-left-auto">
                <ul class="d-flex  align-items-center">
                    <li class="mr-3  d-none  d-sm-block">
                        Need a haircut?
                    </li>
                    <li>
                        <a href="{{url('/booking')}}" class="btn  btn-secondary">Book Now</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="mobile-nav  pt-5  pb-3">
        <div class="container">
            <ul class="mobile-nav__list  mx-3">
                <li>
                    <a href="#" class="how-it-work-link">How It Works</a>
                </li>
                <li>
                    <a href="{{url('/pricing')}}">Pricing</a>
                </li>
                <li>
                    <a href="{{url('/our-barbers')}}">Our Barbers</a>
                </li>
                <hr class="rule"></hr>
                <li>
                    <a href="{{url('/become-our-barber')}}">Join our barber team</a>
                </li>
            </ul>
        </div>
    </div>
</header>
