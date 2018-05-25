<?php $ogTitle = 'MyCut - Pricing' ?>
<?php $ogURL = 'pricing' ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pricing</title>

        @include('partials/head')
    </head>
    <body>

        @include('partials/header')

        <section class="page-banner  homecut-collage  text-center">
            <div class="container">
                <h1 class="h2  text-white  text-uppercase">Pricing</h1>
                <p class="text-white">We offer range of price based on different haircut type by our Senior and Junior barber</p>
            </div>
        </section>

        <section class="pricing-list  py-5">
            <div class="container  container-small">
                <div class="o-tile  mb-4">
                    <div class="o-tile__body  pr-2">
                        <h3 class="h2  text-uppercase  mb-1">The Premium Cut</h3>
                        <p>Have your haircut by our senior & experienced barber</p>
                    </div>
                    <div class="o-tile__right  text-right">
                        <span class="h2">RM 150</span>
                    </div>
                </div>

                <div class="o-tile  mb-4">
                    <div class="o-tile__body  pr-2">
                        <h3 class="h2  text-uppercase  mb-1">The Normal Cut</h3>
                        <p>Have your haircut by our junior yet profesional barber</p>
                    </div>
                    <div class="o-tile__right  text-right">
                        <span class="h2">RM 90</span>
                    </div>
                </div>

                <div class="o-tile  mb-4">
                    <div class="o-tile__body  pr-2">
                        <h3 class="h2  text-uppercase  mb-1">Shave & Shape</h3>
                        <p>Stylish your head by customized shaved style</p>
                    </div>
                    <div class="o-tile__right  text-right">
                        <span class="h2">RM 70</span>
                    </div>
                </div>

                <div class="o-tile  mb-4">
                    <div class="o-tile__body  pr-2">
                        <h3 class="h2  text-uppercase  mb-1">Beard Trim</h3>
                        <p>Have your beard trim by our profesional barber</p>
                    </div>
                    <div class="o-tile__right  text-right">
                        <span class="h2">RM 50</span>
                    </div>
                </div>

                <div class="o-tile  mb-4">
                    <div class="o-tile__body  pr-2">
                        <h3 class="h2  text-uppercase  mb-1">KIDS CUT</h3>
                        <p>For kids age 12 years old below</p>
                    </div>
                    <div class="o-tile__right  text-right">
                        <span class="h2">RM 70</span>
                    </div>
                </div>
            </div>
        </section>

        @include('partials/cta-bottom')

        @include('partials/footer')

        @include('partials/script')
    </body>
</html>
