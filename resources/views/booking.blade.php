<?php $ogTitle = 'Book for Haircut' ?>
<?php $ogURL = 'booking' ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Booking</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
        <link href="{{url('resources/assets/css/intlTelInput.css')}}" rel="stylesheet">
        @include('partials/head')

    </head>
    <body>

        @include('partials/header')

        <section class="booking-section  py-5  my-4">
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="container  container-small">
                <div class="row">
                    <div class="col-md-8  booking-main">

                        <div class="booking-progress-bar  mb-3  p-1  py-3  p-sm-3">
                            <ul class="mb-0">
                                <li class="active">
                                    <div class="h4 progress-bar-indicator">
                                        1
                                    </div>
                                    <div class="h5 progress-bar-step  mb-0  text-white">
                                        Book A Session
                                    </div>
                                </li>
                                <li>
                                    <div class="h4 progress-bar-indicator">
                                        2
                                    </div>
                                    <div class="h5 progress-bar-step  mb-0  text-white">
                                        Make A Payment
                                    </div>
                                </li>
                                <li>
                                    <div class="h4 progress-bar-indicator">
                                        3
                                    </div>
                                    <div class="h5 progress-bar-step  mb-0  text-white">
                                        Check your status
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- service required -->
                        <div class="service-required  box  mb-3">

                            <div class="box-heading">
                                <h4 class="box-heading-title  u-no-letter-spacing  text-uppercase">Service required</h4>
                                <p class="box-heading-subtitle  text-muted">Choose the haircut service</p>
                            </div>

                            <div class="booking-service  my-4">

                                <div class="booking-service__row  d-sm-flex  align-items-center">
                                    <div class="booking-service__type">
                                        <span class="zicons-info  icon--16  text-muted  d-none  d-sm-inline-block  mr-2"  data-toggle="tooltip" data-placement="top" title="Have your haircut by our senior and experienced barber"></span> Premium Cut
                                    </div>
                                    <div class="booking-service__price">
                                        RM150
                                    </div>
                                    <div class="d-sm-none  u-text-8  mt-1  text-muted">
                                        Have your haircut by our senior and experienced barber
                                    </div>
                                    <div class="booking-service__total">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button"  data-type="minus" data-field="quant[1]" disabled>
                                                    <span class="icon--16  zicons-minus"></span>
                                                </button>
                                            </div>
                                            <input id="service-premium" class="form-control  input-number" type="number" name="quant[1]" min="0" max="10" value="0" data-price="150" required>
                                            <div class="input-group-append">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button" data-type="plus" data-field="quant[1]">
                                                    <span class="icon--16  zicons-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="booking-service__row  d-sm-flex  align-items-center">
                                    <div class="booking-service__type">
                                        <span class="zicons-info  icon--16  text-muted  d-none  d-sm-inline-block  mr-2"  data-toggle="tooltip" data-placement="top" title="Have your haircut by our junior yet profesional barber"></span>
                                        Normal Cut
                                    </div>
                                    <div class="booking-service__price">
                                        RM90
                                    </div>
                                    <div class="d-sm-none  u-text-8  mt-1  text-muted">
                                        Have your haircut by our junior yet profesional barber
                                    </div>
                                    <div class="booking-service__total">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button"  data-type="minus" data-field="quant[2]" disabled>
                                                    <span class="icon--16  zicons-minus"></span>
                                                </button>
                                            </div>
                                            <input class="form-control  input-number" type="number" name="quant[2]" min="0" max="10" value="0" data-price="90" required>
                                            <div class="input-group-append">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button" data-type="plus" data-field="quant[2]">
                                                    <span class="icon--16  zicons-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="booking-service__row  d-sm-flex  align-items-center">
                                    <div class="booking-service__type">
                                        <span class="zicons-info  icon--16  text-muted  d-none  d-sm-inline-block  mr-2"  data-toggle="tooltip" data-placement="top" title="Stylish your head by customized shaved style"></span>
                                        Shave and Shape
                                    </div>
                                    <div class="booking-service__price">
                                        RM70
                                    </div>
                                    <div class="d-sm-none  u-text-8  mt-1  text-muted">
                                        Stylish your head by customized shaved style
                                    </div>
                                    <div class="booking-service__total">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button"  data-type="minus" data-field="quant[3]" disabled>
                                                    <span class="icon--16  zicons-minus"></span>
                                                </button>
                                            </div>
                                            <input class="form-control  input-number" type="number" name="quant[3]" min="0" max="10" value="0" data-price="70" required>
                                            <div class="input-group-append">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button" data-type="plus" data-field="quant[3]">
                                                    <span class="icon--16  zicons-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="booking-service__row  d-sm-flex  align-items-center">
                                    <div class="booking-service__type">
                                        <span class="zicons-info  icon--16  text-muted  d-none  d-sm-inline-block  mr-2"  data-toggle="tooltip" data-placement="top" title="Have your beard trim by our profesional barber"></span>
                                        Beard Trim
                                    </div>
                                    <div class="booking-service__price">
                                        RM50
                                    </div>
                                    <div class="d-sm-none  u-text-8  mt-1  text-muted">
                                        Have your beard trim by our profesional barber
                                    </div>
                                    <div class="booking-service__total">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button"  data-type="minus" data-field="quant[4]" disabled>
                                                    <span class="icon--16  zicons-minus"></span>
                                                </button>
                                            </div>
                                            <input class="form-control  input-number" type="number" name="quant[4]" min="0" max="10" value="0" data-price="50" required>
                                            <div class="input-group-append">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button" data-type="plus" data-field="quant[4]">
                                                    <span class="icon--16  zicons-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="booking-service__row  d-sm-flex  align-items-center">
                                    <div class="booking-service__type">
                                        <span class="zicons-info  icon--16  text-muted  d-none  d-sm-inline-block  mr-2"  data-toggle="tooltip" data-placement="top" title="For kids age 12 years old below"></span>
                                        Kid's Cut
                                    </div>
                                    <div class="booking-service__price">
                                        RM70
                                    </div>
                                    <div class="d-sm-none  u-text-8  mt-1  text-muted">
                                        For kids age 12 years old below
                                    </div>
                                    <div class="booking-service__total">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button"  data-type="minus" data-field="quant[5]" disabled>
                                                    <span class="icon--16  zicons-minus"></span>
                                                </button>
                                            </div>
                                            <input class="form-control  input-number" type="number" name="quant[5]" min="0" max="10" value="0" data-price="70" required>
                                            <div class="input-group-append">
                                                <button class="btn  btn-outline-secondary  btn-number" type="button" data-type="plus" data-field="quant[5]">
                                                    <span class="icon--16  zicons-plus"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="summary-total text-right  d-block  d-md-none  py-3">
                                <div class="float-left">
                                    <strong>Total</strong>
                                </div>
                                <div id="total">RM <span class="total">0</span></div>
                            </div>

                        </div>

                        <!-- contact information -->
                        <div class="contact-information  box  mb-3">
                            <form id="booking-contact">
                                <div class="box-heading">
                                    <h4 class="box-heading-title  u-no-letter-spacing  text-uppercase">Booking Information</h4>
                                    <p class="box-heading-subtitle  text-muted">We will use your personal information to contact you</p>
                                </div>

                                <div class="contact-information__form">
                                    <div class="form-group">
                                        <label for="name">Fullname</label>
                                        <input type="text" class="form-control" id="contact-name" name="contact-name" placeholder="Fullname" required  data-parsley-required-message="Please fill in your name"  data-parsley-pattern="^[A-z ]+$"  data-parsley-pattern-message="Please enter your name in alphabet only">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Email Address</label>
                                                <input type="email" class="form-control" id="contact-email" name="contact-email" placeholder="Email Address"  required  data-parsley-required-message="Please fill in your email address" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Mobile Number</label>
                                                <input type="tel" class="form-control" id="contact-phone" name="contact-phone" required  data-parsley-required-message="Your mobile number is required" data-parsley-errors-container="#booking-mobile-error">
                                                <div id="booking-mobile-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="btn-verify-number" class="form-group  mt-2  mb-2">
                                        <button type="submit" class="btn mb-2 btn-primary-green  btn-block">Verify My Number</button>
                                        <small class="text-muted">Before proceed with booking, we require your mobile number to be verify. 4 digits number will be send to your phone</small>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <form id="second-step-booking" data-parsley-validate>
                            <!-- address information -->
                            <div class="second-view  address-information  box  mb-3" style="display: none;">

                                <div class="box-heading">
                                    <h4 class="box-heading-title  u-no-letter-spacing">Address Information</h4>
                                    <p class="box-heading-subtitle  text-muted">Tell us where you want us to send our barber</p>
                                </div>

                                <div class="alert  alert-warning  u-text-6">
                                    At the meantime, our service only covers Selangor and Kuala Lumpur only
                                </div>

                                <div class="row  row-xs">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Unit No</label>
                                            <input id="unit-no" type="text" class="form-control" name="unit-no" placeholder="No 44" required  data-parsley-required-message="Please enter unit no.">
                                        </div>
                                    </div>
                                    <div class="col-md-10">

                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea id="street-address" class="form-control" name="address" rows="2" cols="80" placeholder="Jalan Mayang Sari P10/30" required   data-parsley-required-message="Please enter address information"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row  row-xs">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Postcode</label>
                                            <input id="postcode" type="number" class="form-control" name="postcode" placeholder="21020" required  data-parsley-required-message="Please enter postcode" data-parsley-minlength="5"  data-parsley-maxlength="5" data-parsley-minlength-message="Postcode require 5 digits" data-parsley-maxlength-message="Postcode exceeded 5 digits">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input id="city" type="text" class="form-control" name="city" placeholder="Setia Alam" required  data-parsley-required-message="Please enter your city">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-control" name="state" id="state" required  data-parsley-required-message="Please select state">
                                                <option value="">Select state</option>
                                                <option value="Selangor">Selangor</option>
                                                <option value="Kuala Lumpur">Kuala Lumpur</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label>Address Remarks</label>
                                    <input id="remark" type="text" class="form-control" name="remark" value="" placeholder="Eg: Meet me at guard house">
                                </div>

                            </div>

                            <!-- booking information -->
                            <div class="second-view  booking-information  box  mb-3" style="display: none;">

                                <div class="box-heading">
                                    <h4 class="box-heading-title  u-no-letter-spacing">Booking Date & Time</h4>
                                    <p class="box-heading-subtitle  text-muted">Tell us your preferred date & time of your haircut</p>
                                </div>

                                <div class="row  row-xs">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="zicons-calendar"></span>
                                                    </div>
                                                </div>
                                                <input id="datePicker" type="text" class="form-control  booking-datepicker" name="date" placeholder="Click to select date" required  data-parsley-required-message="Please select booking date" data-parsley-group="datepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select time</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="zicons-clock"></span>
                                                    </div>
                                                </div>
                                                <input id="timePicker" disabled type="text" class="form-control  booking-timepicker" name="time" placeholder="Click to select time" required  data-parsley-required-message="Please select booking time" data-parsley-group="timepicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <small class="text-muted">We only accept booking for 2 days in advanced including today. Earliest booking time available is 4 hours from current time</small>
                            </div>

                            <!-- agree policy -->
                            <div class="second-view  terms-information  box  mb-3" style="display: none;">

                                <div class="form-check  pl-0  mb-4">
                                    <!-- <input class="form-check-input" id="terms-acceptance" type="checkbox" name="" value=""> -->
                                    <label class="form-check-label" for="terms-acceptance">By clicking book now button, I hereby agree to the <a href="/terms-and-conditions" target="_blank">Terms of Service</a> and <a href="/privacy-policy" target="_blank">Privacy Policy</a></label>
                                </div>

                                <button id="btn-book-now" class="btn  btn-primary-green  btn-block" type="submit">
                                    Book Now
                                </button>

                            </div>
                        </form>

                    </div>
                    <div class="col-md-4  d-none  d-md-block  booking-sidebar">

                        <div class="booking-sidebar__content">
                            <h4>Your Booking Summary</h4>
                            <div class="summary-service">
                                <ul>
                                    <li id="summary-premium-cut" class="booking-summary d-flex" data-summary="quant[1]">
                                        <div class="font-weight-bold">
                                            Premium Cut
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>0</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            0
                                        </div>
                                        <input type="hidden" class="amount">
                                    </li>
                                    <li id="summary-normal-cut"  class="booking-summary d-flex" data-summary="quant[2]">
                                        <div class="font-weight-bold">
                                            Normal Cut
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>0</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            0
                                        </div>
                                        <input type="hidden" class="amount">
                                    </li>
                                    <li id="summary-shave-shape" class="booking-summary d-flex" data-summary="quant[3]">
                                        <div class="font-weight-bold">
                                            Shave and Shape
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>0</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            0
                                        </div>
                                        <input type="hidden" class="amount">
                                    </li>
                                    <li id="summary-beard-trim" class="booking-summary d-flex" data-summary="quant[4]">
                                        <div class="font-weight-bold">
                                            Beard Trim
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>0</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            0
                                        </div>
                                        <input type="hidden" class="amount">
                                    </li>
                                    <li id="summary-kids-cut" class="booking-summary d-flex" data-summary="quant[5]">
                                        <div class="font-weight-bold">
                                            Kid's Cut
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>0</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            0
                                        </div>
                                        <input type="hidden" class="amount">
                                    </li>
                                </ul>
                            </div>

                            <div class="summary-total  my-3  py-3  px-1  font-weight-bold">
                                <div id="subtotal" class="o-tile  py-1">
                                    <div class="o-tile__body">
                                        Subtotal
                                    </div>
                                    <div class="o-tile__right">
                                        RM<span class="subtotal">0</span>
                                    </div>
                                </div>

                                <div id="discount" class="o-tile  py-1">
                                    <div class="o-tile__body">
                                        Discount
                                    </div>
                                    <div class="o-tile__right">
                                        RM<span class="discount">0</span>
                                    </div>
                                </div>

                                <div id="total" class="o-tile  py-1">
                                    <div class="o-tile__body">
                                        Total
                                    </div>
                                    <div class="o-tile__right">
                                        RM<span class="total">0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="summary-address-booking">
                                <div class="form-group">
                                    <label class="font-weight-bold">Address: </label>
                                    <div id="address-information" class="text-muted">No description</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Address Remarks: </label>
                                    <div id="address-remarks" class="text-muted">No description</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Book Date & Time: </label>
                                    <div id="book-date-time" class="text-muted">No description</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <form id="confirm-request" action="{{url('request-booking')}}" method="post" style="display:none;">
            {!! csrf_field() !!}
            <!-- <input name="service-type-senior" id="request-service-type-senior">
            <input name="service-type-junior" id="request-service-type-junior">
            <input name="service-type-beard" id="request-service-type-beard">
            <input name="service-type-kids" id="request-service-type-kids"> -->
            <input name="senior-count" id="request-senior-count">
            <input name="junior-count" id="request-junior-count">
            <input name="shave-count" id="request-shave-count">
            <input name="beard-count" id="request-beard-count">
            <input name="kids-count" id="request-kids-count">

            <input name="city" id="request-city">
            <input name="postcode" id="request-postcode">
            <input name="house-unit-no" id="request-house-unit-no">
            <input name="address" id="request-address">
            <input name="remark" id="request-remark">

            <input name="date" id="request-date">
            <input name="time" id="request-time">

            <input name="price" id="request-price">
            <input name="total-price" id="total-price">
            <input name="discount" id="request-discount">
        </form>

        @include('partials/script')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
        <script src="{{url('resources/assets/js/intlTelInput.js')}}"></script>
        <script src="{{url('resources/assets/js/utils.js')}}"></script>

        <script>

            $(document).ready(function(){

                $('.booking-datepicker').pickadate({
                    min: true,
                    max: 2,
                    formatSubmit: 'yyyy-mm-dd',
                    hiddenName: true,
                    onSet: function(){
                        $('#second-step-booking').parsley().validate('datepicker')
                    }
                });

                var bookingTime = $('.booking-timepicker').pickatime({
                    min: [7,30],
                    max: [23,30],
                    interval: 15,
                    formatSubmit: 'HH:i',
                    hiddenName: true,
                    onSet: function(){
                        $('#second-step-booking').parsley().validate('timepicker')
                    }
                });

                var timePicker = bookingTime.pickatime('picker');

                $('.booking-datepicker').on('change', function(){

                    timePicker.set('clear');

                    if($(this).val() != '') {
                        $('#timePicker').removeAttr('disabled');
                    }
                    else {
                        $('#timePicker').attr('disabled',true);
                    }


                    var currentHours = parseInt(new Date().getHours());
                    var currentMinutes = parseInt(new Date().getMinutes());

                    var thisDate = $('input[type="hidden"][name="date"]').val();

                    var date = new Date();
                    var month = date.getMonth()+1;
                    var day = date.getDate();

                    var output = date.getFullYear() + '-' +
                        ((''+month).length<2 ? '0' : '') + month + '-' +
                        ((''+day).length<2 ? '0' : '') + day;

                    // check if selected date = todays date - disable booking from +4h from current time
                    if(thisDate == output) {

                        // if try to book during 8pm onwards disable the time
                        if(currentHours >= 20) {
                            timePicker.set('min', [00,00]);
                            timePicker.set('max', [00,00]);
                            timePicker.set('disable', [00,00]);
                        }
                        // if try to book minutes over 31, hours available is 5 hours onwards
                        else if(currentMinutes >= 31) {
                            timePicker.set('min', [currentHours + 5,00]);
                            timePicker.set('max',[23,30]);
                            timePicker.set('disable', false);
                        }
                        // else, hours available is 4 hours onwards
                        else {
                            timePicker.set('min', [currentHours + 4,00]);
                            timePicker.set('max',[23,30]);
                            timePicker.set('disable', false);
                        }
                    }
                    // other than today
                    else {
                        timePicker.set('disable', false);
                        timePicker.set('min',[7,30]);
                        timePicker.set('max',[23,30]);
                    }

                });


                $('.booking-datepicker, .booking-timepicker').on('change',function(){
                    $('#request-date').val($('input[type="hidden"][name="date"]').val());
                    $('#request-time').val($('input[type="hidden"][name="time"]').val());

                    $('#book-date-time').html(
                        $('.booking-datepicker').val() +' '+$('.booking-timepicker').val()
                    )
                });


                // verify phone Number
                function verifyPhone() {
                    var phoneInput = document.getElementsByName('contact-phone');
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var phoneNo = $("#contact-phone").intlTelInput("getNumber");
                    // var title = $("#contact-title").val();
                    var name = $('#contact-name').val();
                    var email = $('#contact-email').val();
                    var result = 0;

                    //console.log(ntlNumber);
                    $.ajax({
                        type: 'POST',
                        url: '{{url('verifyPhone')}}',
                        data: {_token: CSRF_TOKEN, phoneNo: phoneNo, name: name, /*title: title,*/ email: email},
                        success: function(data) {
                            //console.log(data);

                            $('#btn-verify-number button').attr('disabled', false).text('Verify My Number');
                            var jc = $.confirm({
                                theme: 'light',
                                closeIcon: true,
                                bgOpacity: '.6',
                                title : '<span class="font-weight-bold">Verify your mobile number</span>',
                                content: '<hr class=" mt-1 mb-3"/>' +
                                '<form action="" class="formName verify-code-form">' +
                                '<div class="form-group">' +
                                'We have sent a 4 digit verification code to your mobile phone '+phoneNo+'. Please enter it here. </br></br>' +
                                '<span class="font-weight-bold">Why is this necessary?</span>.<div class="text-muted  u-text-6  mb-3"> We need to make sure that the phone number that you enter is valid so we can ' +
                                'contact you directly in case of any changes.</div>' +
                                '<input type="tel" autocomplete="off" placeholder="----" class="name form-control input-code" name="input-code" required style="text-align: center;" maxlength="4"/>' +
                                '<div class="alert  alert-success  d-none  my-2  label-resent u-text-6 ">Verification code resent to '+ phoneNo + '</div>' +
                                '<div class="alert my-2 alert-danger  label-invalid  d-none  u-text-6">Verification code invalid. Please try again. </label></div>' +
                                '</form>',
                                buttons: {
                                    ResendCode: {
                                        text: 'Resend Code',
                                        action: function(e){
                                            $.ajax({
                                                type: 'POST',
                                                url: '{{url('verifyPhone')}}',
                                                data: {_token: CSRF_TOKEN, phoneNo: phoneNo},
                                                success: function(data) {
                                                    //console.log(data);
                                                }
                                            });
                                            $('.input-code').val('').focus();
                                            $('.label-resent').removeClass('d-none');
                                            $('.label-invalid').addClass('d-none');
                                            return false;
                                        }
                                    },
                                    verify: {
                                        text : 'Verify number',
                                        btnClass:'btn btn-primary-green',
                                        isAjaxLoading: true,
                                        isAjax: true,
                                        action: function(e) {
                                            jc.hideLoading();
                                            var verifyCode = $('.input-code').val();
                                            var answered = false;
                                            $.ajax({
                                                type: 'POST',
                                                url: '{{url('verifyCode')}}',
                                                cache: false,
                                                data: {_token: CSRF_TOKEN, verifyCode: verifyCode, phoneNo: phoneNo },
                                            }).done(function (response){
                                                //console.log('response ', response, typeof response);
                                                if (response === '1') {
                                                    result = true;

                                                    $('#contact-name').attr('readonly', true);
                                                    $('#contact-email').attr('readonly', true);
                                                    $('#contact-phone').attr('readonly', true);


                                                    $('.second-view').attr('style', 'display:block');

                                                    $('html,body').delay(800).animate({
                                                        scrollTop : $('.address-information').offset().top - 200
                                                    }, 500, function(){
                                                        $('#btn-verify-number').hide();
                                                    });

                                                    // $('#contact-title').readOnly = true;
                                                    // $('#contact-name').readOnly = true;
                                                    // $('#contact-email').readOnly = true;
                                                    // $('#contact-phone').readOnly = true;



                                                    jc.close();
                                                } else {
                                                    result = false;
                                                    $('.label-resent').addClass('d-none');
                                                    $('.label-invalid').removeClass('d-none');
                                                }
                                                answered = true;
                                            }).fail(function (){
                                                $('.label-resent').addClass('d-none');
                                                $('.label-invalid').removeClass('d-none');
                                                result = false;
                                                answered = true;
                                            });

                                            return result;
                                        }
                                    }
                                }
                            });
                        },
                        error: function(error) {

                        }
                    });
                }

                function BookNow() {
                    var main_content = document.createElement('DIV');
                    var booking_list = $('.summary-service').clone();
                    var booking_account = $('.summary-total').clone();
                    var booking_address = $('.summary-address-booking').clone();
                    main_content.appendChild(booking_list[0]);
                    main_content.appendChild(booking_account[0]);
                    main_content.appendChild(booking_address[0]);
                    //console.log(main_content);
                    $.confirm({
                        theme:'white',
                        title : 'YOUR BOOKING SUMMARY',
                        content: main_content,
                        bgOpacity: '.6',
                        buttons: {
                            edit: {
                                text: 'EDIT'
                            },
                            confirm: {
                                text: 'CONFIRM BOOKING',
                                btnClass:'btn-primary-green',
                                action: function () {

                                    $('#request-city').val($('#city').val());
                                    $('#request-postcode').val($('#postcode').val());
                                    $('#request-house-unit-no').val($('#unit-no').val());
                                    $('#request-address').val($('#street-address').val());
                                    $('#request-remark').val($('#remark').val());
                                    $('#request-date').val();
                                    $('#request-time').val();
                                    $('#confirm-request').submit();
                                    //$('#total-price').val();
                                }
                            }
                        }
                    });
                }

                $('#btn-book-now').on('click', function(){

                    if($('input[name="quant[1]"]').val() == '0' && $('input[name="quant[2]"]').val() == '0' && $('input[name="quant[3]"]').val() == '0' && $('input[name="quant[4]"]').val() == '0' && $('input[name="quant[5]"]').val() == '0') {
                        alert('Ops, seems like your forget to choose service. Please choose any services by clicking (+) button');
                        $('html,body').animate({
                            scrollTop: $('.service-required').offset().top - 50
                        });
                        $('.service-required').addClass('blinking');

                        setTimeout(function(){
                            $('.service-required').removeClass('blinking');
                        },4000);

                        return false;
                    }

                    $('#second-step-booking').parsley().validate();
                    if($('#second-step-booking').parsley().isValid()) {
                        BookNow();
                        return false;
                    }

                })
                $('#booking-contact').parsley();


                $('#booking-contact').submit(function(){

                    $(this).parsley().validate();

                    if ($(this).parsley().isValid()) {
                        $('#btn-verify-number button').attr('disabled', true).text('Please wait..');
                        verifyPhone();
                        return false;
                    }
                });


                $('.btn-number').click(function(e){
                    e.preventDefault();

                    fieldName = $(this).attr('data-field');
                    type      = $(this).attr('data-type');
                    var input = $("input[name='"+fieldName+"']");
                    var currentVal = parseInt(input.val());
                    if (!isNaN(currentVal)) {
                        if(type == 'minus') {

                            if(currentVal > input.attr('min')) {
                                input.val(currentVal - 1).change();
                            }
                            if(parseInt(input.val()) == input.attr('min')) {
                                $(this).attr('disabled', true);
                            }

                        } else if(type == 'plus') {

                            if(currentVal < input.attr('max')) {
                                input.val(currentVal + 1).change();
                            }
                            if(parseInt(input.val()) == input.attr('max')) {
                                $(this).attr('disabled', true);
                            }

                        }
                    } else {
                        input.val(0);
                    }
                });

                $('.input-number').focusin(function(){
                    $(this).data('oldValue', $(this).val());
                });

                $('#contact-phone').intlTelInput({
                    // preferredCountries: ['my'],
                    onlyCountries: ['my'],
                    allowDropdown: false
                });

                $('.input-number').change(function() {

                    minValue =  parseInt($(this).attr('min'));
                    maxValue =  parseInt($(this).attr('max'));
                    valueCurrent = parseInt($(this).val());
                    price = parseInt($(this).data('price'));

                    name = $(this).attr('name');
                    if(valueCurrent >= minValue) {
                        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
                    } else {
                        alert('Sorry, the minimum value is 0 and cannot be empty');
                        $(this).val($(this).data('oldValue'));
                    }
                    if(valueCurrent <= maxValue) {
                        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
                    } else {
                        alert('Sorry, the maximum value is 10');
                        $(this).val($(this).data('oldValue'));
                    }

                    if($(this).val() != 0 ){
                        $('.booking-summary[data-summary="'+name+'"]').addClass('active');
                    }
                    else {
                        $('.booking-summary[data-summary="'+name+'"]').removeClass('active');
                    }

                    $('.booking-summary[data-summary="'+name+'"] .booking-category-sum').html(valueCurrent);
                    $('.booking-summary[data-summary="'+name+'"] .booking-price-sum span').html(price * valueCurrent);
                    $('.booking-summary[data-summary="'+name+'"]').find('.amount').val(price * valueCurrent);
                    // serviceType = $(this).attr('service');
                    // isChecked = $('.checkbox')[serviceType - 1].getAttribute('checked');
                    // if (isChecked == 'true') {
                    //     addBooking(serviceType);
                    // }

                    subTotal(total);

                    var discount = 0;

                    $('#request-senior-count').val($('.input-number[name="quant[1]"]').val());
                    $('#request-junior-count').val($('.input-number[name="quant[2]"]').val());
                    $('#request-shave-count').val($('.input-number[name="quant[3]"]').val());
                    $('#request-beard-count').val($('.input-number[name="quant[4]"]').val());
                    $('#request-kids-count').val($('.input-number[name="quant[5]"]').val());

                    $('#request-price').val($('#subtotal .subtotal').html());
                    $('#total-price').val($('#total .total').html() - discount);
                    $('#request-discount').val(discount);
                });

                // calculate all total prices
                function subTotal(total) {
                    var total = 0;

                    $('.amount').each(function(){
                        var thisValue = $(this).val();

                        total += parseFloat(thisValue||0);
                    });

                    $('#subtotal .subtotal').html(total);
                    $('#total .total').html(total);
                }

                // prefill the sidebar address description
                $('#street-address, #postcode, #city, #unit-no, #state').on('keyup blur change', function(){
                    $('#address-information').html(
                        $('#unit-no').val() +' '+
                        $('#street-address').val() +' '+
                        $('#postcode').val() +' '+
                        $('#city').val() +' '+
                        $('#state').val()
                    )

                    // if all is empty put no description text
                    if($('#unit-no').val() == '' && $('#street-address').val() == '' && $('#postcode').val() == '' && $('#city').val()  == '' && $('#state').val() == '') {
                        $('#address-information').html('No description');
                    }
                });

                $('#remark').on('keyup blur', function(){
                    if($(this).val() != '') {
                        $('#address-remarks').html($('#remark').val());
                    }
                    else {
                        $('#address-remarks').html('No description');
                    }

                });
            });


        </script>

    </body>
</html>
