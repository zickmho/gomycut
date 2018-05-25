<?php $ogTitle = 'MyCut - Become Our Barber' ?>
<?php $ogURL = 'become-our-barber' ?>

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

        <section class="join-us-form py-5">
            <div class="container  container-x-small">

                @if (Session::get('duplicate'))
                    <div class="alert alert-danger mb-4" role="alert">
                        {{Session::get('duplicate')}}
                    </div>
                @endif

                <form class="" action="{{ url('/apply/store') }}" method="post" id="form-apply" enctype="multipart/form-data" data-parsley-validate>
                    {!! csrf_field() !!}

                    <h4 class="text-uppercase">Your information</h4>

                    <div class="form-group">
                        <input class="form-control" type="text" name="first_name" required placeholder="Fullname as per IC" data-parsley-required-message="Please fill in your name"  data-parsley-pattern="^[A-z ]+$"  data-parsley-pattern-message="Please enter your name in alphabet only">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" required placeholder="Email Address" data-parsley-required-message="Your email is required" data-parsley-type-message="Please enter a valid email address (eg. john@email.com)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+60</span>
                                    </div>
                                    <input class="form-control" type="tel" name="phone" required data-parsley-required-message="Your mobile number is required" data-parsley-errors-container="#phone-error" placeholder="Mobile Number" data-parsley-pattern="^[0-9]*$"  data-parsley-pattern-message="Please enter a valid phone number (eg. 0123456789) without (-)">
                                </div>
                                <div id="phone-error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="city" required placeholder="Current city of stay" data-parsley-required-message="Current city is required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="number" name="pin_code" required placeholder="Postcode" data-parsley-required-message="Postcode is required" data-parsley-minlength="5" data-parsley-maxlength="5" data-parsley-minlength-message="Postcode require 5 digits" data-parsley-maxlength-message="Postcode exceeded 5 digits">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <textarea class="form-control" required name="description" rows="3" cols="80" placeholder="Tell us a little bit about yourself" data-parsley-required-message="Just tell us brief introduction about you"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Upload your photo</label>
                        <input class="form-control-file" type="file" name="client_photo" required accept=".png, .jpeg, .jpg" data-parsley-filemaxsize="client_photo|5" data-parsley-required-message="Please upload your own photo">
                        <small class="text-muted">Please upload the file size not more than 5MB. Format JPG/PNG</small>
                    </div>

                    <h4 class="text-uppercase mt-4">Working Background</h4>

                    <div class="form-group">
                        <input class="form-control" type="text" name="certificate" value="" placeholder="Certificate" required data-parsley-required-message="Certificate is required">
                        <small class="form-text  text-muted">Let us know if you have gain any certificate. If its more than 1, separate it with a comma (,). If no, just put none.</small>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="experience" rows="3" cols="80" placeholder="Experiences" required data-parsley-required-message="Experiences is required"></textarea>
                        <small class="form-text  text-muted">Tell us your years of experience as barbers, any competition that you have entered or anything that you are proud of with.</small>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-block  btn-primary" type="submit" name="button">Send My Registration</button>
                    </div>

                    <div class="my-5">
                        <small class="text-muted  d-block h6">
                            What happens next?
                        </small>
                        <small class="text-muted">Once you submit your registration information, MyCut team will be reviewing your registration information and if you are getting shortlisted, we will require you to meet us for a small interview and a coffee session. Yes, we do love coffee.</small>
                    </div>

                </form>
            </div>
        </section>

        @include('partials/footer')

        @include('partials/script')
    </body>
</html>
