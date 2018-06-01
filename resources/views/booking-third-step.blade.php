<?php $ogTitle = 'Book for Haircut' ?>
<?php $ogURL = 'booking' ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Booking</title>
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
                                <li class="done">
                                    <div class="h4 progress-bar-indicator">
                                        <i class="icon icon--check"></i>
                                    </div>
                                    <div class="h5 progress-bar-step  mb-0  text-white">
                                        Book A Session
                                    </div>
                                </li>
                                <li class="done">
                                    <div class="h4 progress-bar-indicator">
                                        <i class="icon icon--check"></i>
                                    </div>
                                    <div class="h5 progress-bar-step  mb-0  text-white">
                                        Make A Payment
                                    </div>
                                </li>
                                <li class="active">
                                    <div class="h4 progress-bar-indicator">
                                        3
                                    </div>
                                    <div class="h5 progress-bar-step  mb-0  text-white">
                                        Check your status
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="box  payment-success  mb-3  pt-3  pb-5  px-3">

                            <div class="alert alert-success  alert-payment-success  mb-3" role="alert">
                                <span class="check-success  d-inline-block">
                                    <i class="icon icon--check"></i>
                                </span>
                                We had received your payment. Thank you
                            </div>

                            <small class="text-muted pb-2 d-block">
                                Our system will send you an email regarding the details of your booking. Our barber will get to your location based on your booking date and time provided.<br/>
                            </small>

                            <small class="text-muted">If you wish to cancel your booking please read our refund policy below.</small>

                        </div>

                        <div class="box  refund-policy  mb-3">
                            <h4 class="mb-4">
                                Please note our refund policy as below
                            </h4>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Before 12:00PM the day before</td>
                                    <td>100%</td>
                                </tr>
                                <tr>
                                    <td>After 12:00PM the day before</td>
                                    <td>75%</td>
                                </tr>
                                <tr>
                                    <td>On the same day</td>
                                    <td class="is-invalid">No refund</td>
                                </tr>
                            </table>
                            <ol>
                                <li>You may cancel your booking by informing us via SMS or our live chat agent.</li>
                                <li>Facebook message/comment will not be considered as cancellation notice.</li>
                                <li>Rescheduling is also considered as cancellation. You will receive a refund and a new booking will have to be made.</li>
                            </ol>
                        </div>

                    </div>

                    <div class="col-md-4  d-none  d-md-block  booking-sidebar">

                        <div class="booking-sidebar__content">
                            <h4>Here's detail of your booking</h4>
                            <div class="summary-service">
                                <ul>
                                    <li id="summary-premium-cut" class="booking-summary d-flex" data-summary="quant[1]" style="display:none !important;">
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
                                    <li id="summary-normal-cut"  class="booking-summary d-flex" data-summary="quant[2]" style="display:none !important;">
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
                                    <li id="summary-shave-shape" class="booking-summary d-flex" data-summary="quant[3]" style="display:none !important;">
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
                                    <li id="summary-beard-trim" class="booking-summary d-flex" data-summary="quant[4]" style="display:none !important;">
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
                                    <li id="summary-kids-cut" class="booking-summary d-flex" data-summary="quant[5]" style="display:none !important;">
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

        @include('partials/script')


        <script>

            function BookingCategory(session_data) {
                if(session_data.senior_cut) {
                    $('#summary-premium-cut').addClass('active').show();
                    $('#summary-premium-cut .booking-category-sum').html(session_data.senior_cut);
                    $('#summary-premium-cut .booking-price-sum span').html(session_data.senior_cut * 150);
                }
                if(session_data.junior_cut) {
                    $('#summary-normal-cut').addClass('active').show();
                    $('#summary-normal-cut .booking-category-sum').html(session_data.senior_cut);
                    $('#summary-normal-cut .booking-price-sum span').html(session_data.senior_cut * 90);
                }
                if(session_data.shave_cut) {
                    $('#summary-shave-shape').addClass('active').show();
                    $('#summary-shave-shape .booking-category-sum').html(session_data.shave_cut);
                    $('#summary-shave-shape .booking-price-sum span').html(session_data.shave_cut * 70);
                }
                if(session_data.beard_trim) {
                    $('#summary-beard-trim').addClass('active').show();
                    $('#summary-beard-trim .booking-category-sum').html(session_data.beard_trim);
                    $('#summary-beard-trim .booking-price-sum span').html(session_data.beard_trim * 50);
                }
                if(session_data.kids_cut) {
                    $('#summary-kids-cut').addClass('active').show();
                    $('#summary-kids-cut .booking-category-sum').html(session_data.kids_cut);
                    $('#summary-kids-cut .booking-price-sum span').html(session_data.kids_cut * 70);
                }
            }

            // prefill the sidebar address description
            function InputAddress(session_data) {

                if(session_data.house_unit_no && session_data.address && session_data.postcode && session_data.city) {
                    $('#address-information').html(
                        session_data.house_unit_no +' '+
                        session_data.address +' '+
                        session_data.postcode +' '+
                        session_data.city //+' '+
                        // $('#state').val()
                    )
                }

                if(session_data.total_price) {
                    $('#total span').html(session_data.total_price);
                }
                else {
                    $('#total span').html('No description');
                }

                if(session_data.remarks) {
                    $('#address-remarks').html(session_data.remarks);
                }
                else {
                    $('#address-remarks').html('No description');
                }

                if(session_data.request_date && session_data.request_time) {
                    $('#book-date-time').html(session_data.request_date +' '+ session_data.request_time);
                }
                else {
                    $('#book-date-time').html('No description');
                }

            }

            $(document).ready(function(){

                var session_data = {!! $session_data !!};
                if (session_data) {
                    // console.log(session_data);
                    InputAddress(session_data);
                    BookingCategory(session_data);
                }
                else {
                    // console.log('no session date');
                }

            });
        </script>

    </body>
</html>
