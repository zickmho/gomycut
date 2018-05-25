<?php $ogTitle = 'MyCut - Thank you' ?>
<?php $ogURL = 'thank-you' ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Become Our Barber</title>

        @include('partials/head')
    </head>
    <body>

        @include('partials/header')

        <section class="page-banner  join-us  text-center">
            <div class="container  container-small">
                <h1 class="h2  text-white  text-uppercase">Become our Barber</h1>
                <p class="text-white">Join us. We’re honored to partner with some of the best barbers in the country. Set your own schedule, manage your personal book of business and earn above-market compensation. Just a few of the many reasons to join the MyCut team.</p>
            </div>
        </section>

        <section class="py-5">
            <div class="container  container-x-small">

                @if (Session::get('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif

            </div>
        </section>

        @include('partials/footer')

        @include('partials/script')
    </body>
</html>
