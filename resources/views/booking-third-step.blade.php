<?php $ogTitle = 'Book for Haircut' ?>
<?php $ogURL = 'booking' ?>

<?php $date = new DateTime($session_data->request_date);
    $newDateFormat = $date->format('D, d M, Y');
    $time = new DateTime($session_data->request_time);
    $newTimeFormat = $time->format('h:i A');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Book A Haircut</title>
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
                                        <i class="zicons-tick"></i>
                                    </div>
                                    <div class="h5 progress-bar-step  mb-0  text-white">
                                        Book A Session
                                    </div>
                                </li>
                                <li class="done">
                                    <div class="h4 progress-bar-indicator">
                                        <i class="zicons-tick"></i>
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

                        <div class="box  payment-success  mb-3  pt-3  pb-4  px-3">

                            <div class="alert alert-success  alert-payment-success  mb-3" role="alert">
                                <span class="check-success  d-inline-block">
                                    <i class="zicons-tick"></i>
                                </span>
                                We had received your payment. Thank you
                            </div>

                            <div class="text-muted pb-2 u-text-6">
                                Our system will send you an email regarding the details of your booking. Once payment is verified, we will be contacting you to send our barber to your location based on the booking date and time provided.<br/>
                            </div>

                            <div class="d-block  d-sm-none  mb-3">
                                <hr class="my-3">
                                <h4 class="mb-0">Your booking date & time: </h4>
                                <div class="text-muted">{{$session_data->request_date ? $newDateFormat : ''}} -  {{$session_data->request_time ? $newTimeFormat : ''}}</div>
                                <hr class="my-3">
                            </div>

                            <div class="text-muted  u-text-6">If you wish to cancel your booking please read our refund policy below.</div>

                        </div>

                        <div class="box  refund-policy  mb-3">
                            <h4 class="mb-4  u-no-letter-spacing">
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

                        <h4>Here's detail of your booking</h4>
                        <div class="booking-sidebar__content">
                            <div class="summary-service">
                                <ul>
                                    <li id="summary-premium-cut" class="booking-summary d-flex {{ $session_data->senior_cut ? 'active' : ''}}" data-summary="quant[1]" style="{{ $session_data->senior_cut ? '' : 'display:none !important;'}}">
                                        <div class="font-weight-bold">
                                            Premium Cut
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>{{ $session_data->senior_cut ? $session_data->senior_cut * 180 : '0'}}</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            {{ $session_data->senior_cut or '0'}}
                                        </div>
                                        <input type="hidden" class="amount" value="{{ $session_data->senior_cut ? $session_data->senior_cut * 180 : '0'}}">
                                    </li>
                                    <li id="summary-normal-cut"  class="booking-summary d-flex  {{ $session_data->junior_cut ? 'active' : ''}}" data-summary="quant[2]" style="{{ $session_data->junior_cut ? '' : 'display:none  !important;'}}">
                                        <div class="font-weight-bold">
                                            Normal Cut
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>{{ $session_data->junior_cut ? $session_data->junior_cut * 120 : '0'}}</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            {{ $session_data->junior_cut or '0'}}
                                        </div>
                                        <input type="hidden" class="amount" value="{{ $session_data->junior_cut ? $session_data->junior_cut * 120 : '0'}}">
                                    </li>
                                    <li id="summary-shave-shape" class="booking-summary d-flex  {{ $session_data->shave_cut ? 'active' : ''}}" data-summary="quant[3]" style="{{ $session_data->shave_cut ? '' : 'display:none !important;'}}">
                                        <div class="font-weight-bold">
                                            Shave and Shape
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>{{ $session_data->shave_cut ? $session_data->shave_cut * 70 : '0'}}</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            {{ $session_data->shave_cut or '0'}}
                                        </div>
                                        <input type="hidden" class="amount" value="{{ $session_data->shave_cut ? $session_data->shave_cut * 70 : '0'}}">
                                    </li>
                                    <li id="summary-beard-trim" class="booking-summary d-flex  {{ $session_data->beard_trim ? 'active' : ''}}" data-summary="quant[4]" style="{{ $session_data->beard_trim ? '' : 'display:none !important;'}}">
                                        <div class="font-weight-bold">
                                            Beard Trim
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>{{ $session_data->beard_trim ? $session_data->beard_trim * 50 : '0'}}</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            {{ $session_data->beard_trim or '0'}}
                                        </div>
                                        <input type="hidden" class="amount" value="{{ $session_data->beard_trim ? $session_data->beard_trim * 50 : '0'}}">
                                    </li>
                                    <li id="summary-kids-cut" class="booking-summary d-flex {{ $session_data->kids_cut ? 'active' : ''}}" data-summary="quant[5]" style="{{ $session_data->kids_cut ? '' : 'display:none !important;'}}">
                                        <div class="font-weight-bold">
                                            Kid's Cut
                                        </div>
                                        <div class="booking-price-sum">
                                            RM<span>{{ $session_data->kids_cut ? $session_data->kids_cut * 50 : '0'}}</span>
                                        </div>
                                        <div class="booking-category-sum  font-weight-bold  text-right">
                                            {{ $session_data->kids_cut or '0'}}
                                        </div>
                                        <input type="hidden" class="amount" value="{{ $session_data->kids_cut ? $session_data->kids_cut * 80 : '0'}}">
                                    </li>
                                </ul>
                            </div>

                            <div class="summary-total  my-3  py-2  px-1  font-weight-bold">
                                <div id="subtotal" class="o-tile  py-1">
                                    <div class="o-tile__body">
                                        Subtotal
                                    </div>
                                    <div class="o-tile__right">
                                        RM<span class="subtotal">{{$session_data->price or '0'}}</span>
                                    </div>
                                </div>

                                <div id="discount" class="o-tile  py-1">
                                    <div class="o-tile__body">
                                        Discount
                                    </div>
                                    <div class="o-tile__right">
                                        RM<span class="discount">{{$session_data->discount or '0'}}</span>
                                    </div>
                                </div>

                                <div id="total" class="o-tile  py-1">
                                    <div class="o-tile__body">
                                        Total
                                    </div>
                                    <div class="o-tile__right">
                                        RM<span class="total">{{$session_data->total_price or '0'}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="summary-address-booking">
                                <div class="form-group">
                                    <label class="font-weight-bold">Address: </label>
                                    <div id="address-information" class="text-muted">
                                        {{$session_data->house_unit_no or ''}}  {{$session_data->address or ''}}  {{$session_data->postcode or ''}} {{$session_data->city or ''}} {{$session_data->state or ''}}

                                        @if (!$session_data->house_unit_no && !$session_data->address && !$session_data->postcode && !$session_data->city && !$session_data->state)
                                            No description
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Address Remarks: </label>
                                    <div id="address-remarks" class="text-muted">{{$session_data->remarks or 'No description'}}</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Book Date & Time: </label>
                                    <div id="book-date-time" class="text-muted">
                                        <?php $date = new DateTime($session_data->request_date);
                                            $newDateFormat = $date->format('D, d M, Y');
                                            $time = new DateTime($session_data->request_time);
                                            $newTimeFormat = $time->format('h:i A');
                                        ?>
                                        {{$session_data->request_date ? $newDateFormat : ''}}, {{$session_data->request_time ? $newTimeFormat : ''}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('partials/script')


    </body>
</html>
