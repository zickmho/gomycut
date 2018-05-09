<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mycut</title>

    <link href="{{url('resources/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('resources/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{url('resources/assets/css/intlTelInput.css')}}" rel="stylesheet">
    <link href="{{url('resources/assets/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script src="{{url('resources/assets/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{url('resources/assets/js/booking.js')}}"></script>
    <script src="{{url('resources/assets/js/intlTelInput.js')}}"></script>
    <script src="{{url('resources/assets/js/utils.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-dark ">
    <a href="{{url('/')}}"><img class="navbar-brand" src="{{url('resources/assets/imgs/logo.png')}}"/></a>
    <div class="navbar-left menu-item" >
        <i class="fa fa-lock" style="font-size: 50px;color: green">
            <span style="font-size: 14px;vertical-align: middle;color: seagreen;">100% SECURE PAYMENT</span>
        </i>
    </div>
    <div class="navbar-right menu-item" id="btn-back">
        <i class="fa fa-long-arrow-left" style="font-weight:bold;font-size: 50px;">
            <p style="display: inherit;font-size: 14px;font-weight: bold;position: relative;top: 50%;transform: translateY(-90%);-ms-transform: translateY(-90%);transform: translateY(-90%);">GO BACK</p>
        </i>
    </div>
</div>

<div class="container-fluid" style="padding-top: 10%;padding-bottom: 10%;background-color: #ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container-fluid overflow-hidden">
        <div class="container booking-form ng-scope" style="min-width:970px;">
            <div class="row col-sm-12" style="display: -webkit-box; display: -webkit-flex; display: -ms-flexbox;display: flex;">
                <div class="col-sm-8">
                    <div class="booking-content ng-scope">
                        <div class="booking-progress">
                            <div class="row progress-header">
                                <div class="col-sm-4 text-center"><span>Book a session</span></div>
                                <div class="col-sm-4 text-center"><span>Make a payment</span></div>
                                <div class="col-sm-4 text-center"><span>Check your status</span></div>
                            </div>
                            <div class="row progress-header">
                                <div class="col-sm-4 text-center step-1">
                                    <span>&nbsp;</span>
                                    <div class="gap-sm"></div>
                                    <div class="svg-badge">
                                        <div class="circle-badge"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center step-2">
                                    <span>&nbsp;</span>
                                    <div class="gap-sm"></div>
                                    <div class="svg-badge">
                                        <div class="circle-badge"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center step-3">
                                    <span>&nbsp;</span>
                                    <div class="gap-sm"></div>
                                    <div class="svg-badge">
                                        <div class="circle-badge deselect"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                </div>
                            </div>
                        </div>
                        @if(1 == 0)
                        <div class="payment-detail col-sm-12">
                            <h3>Payment</h3>
                            <div class="gap-sm"></div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <div class="select-service select-payment-type selected" id="pay-with-card" type="1" onclick="selectPaymentType(this)">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <img class="img-responsive" src="{{url('resources/assets/imgs/icon-pay-card-white.png')}}">
                                            </div>
                                            <div class="col-xs-9">
                                                <strong>Credit card</strong><br>
                                                Visa or Mastercard. Enjoy discount and greater convenience
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <div class="select-service select-payment-type" id="pay-with-cash" type="2" onclick="selectPaymentType(this)">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <img class="img-responsive" src="{{url('resources/assets/imgs/icon-pay-cash-gray.png')}}">
                                            </div>
                                            <div class="col-xs-9">
                                                <strong>Bank Transfer</strong><br>
                                                Pay via FPX Transfer, M2U, CIMB Click and 9+ Banks
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Discount Code</h3>
                            <p>Please insert the discount code if any.</p>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <input type="text" class="form-control input-lg" placeholder="Discount code" id="discount-code">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <button class="btn btn-default btn-block btn-lg">Apply discount</button>
                                </div>
                            </div>
                        </div>
                        <div class="credit-card-details tab-content col-sm-12">
                            <div role="tabpanel" class="tab-pane active" id="payCard">
                                <h3 class="text-primary">Credit Card Details</h3>
                                <p ng-if="brantreeInit" class="ng-scope">Enter your card information below.</p>
                            </div>
                        </div>
                        @endif
                        <div class="payment-detail col-sm-12">
                            <h3>Payment</h3>
                            <div class="gap-sm"></div>
                            <div class="panel panel-default">
                                @if ($message = Session::get('success'))
                                    <div class="custom-alerts alert alert-success fade in">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                        {!! $message !!}
                                    </div>
                                    <?php Session::forget('success');?>
                                @endif

                                @if ($message = Session::get('error'))
                                    <div class="custom-alerts alert alert-danger fade in">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                        {!! $message !!}
                                    </div>
                                    <?php Session::forget('error');?>
                                @endif
                                <div class="panel-heading">Paywith Paypal</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{url('paypal')}}" >
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                            <label for="amount" class="col-sm-3 control-label">Amount</label>

                                            <div class="col-sm-6">
                                                <input id="amount" type="text" class="form-control" name="amount" value="{{ $session_data->total_price }}" readonly>
                                            </div>
                                            <label for="amount" class="col-sm-3 control-label" style="text-align: left">RM</label>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6 col-sm-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Paywith Paypal
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="well">
                                <label class="padding-side" style="padding:5px 20px;">
                                    <strong>Please note our refund policy as below</strong>
                                </label>
                                <div style="padding:5px 20px">
                                    <table class="table table-bordered">
                                        <tbody><tr>
                                            <td>Before 12:00PM the day before</td><td>100%</td>
                                        </tr><tr>
                                            <td>After 12:00PM the day before</td><td>75%</td>
                                        </tr><tr>
                                            <td>On the same day</td><td>No refund</td>
                                        </tr>
                                        </tbody></table>
                                </div>
                                <ol>
                                    <li>You may cancel your booking by informing us via SMS or our live chat agent.</li>
                                    <li>Facebook message/comment will not be considered as cancellation notice.</li>
                                    <li>Rescheduling is also considered as cancellation. You will receive a refund and a new booking will have to be made.</li>
                                </ol>
                            </div>
                        </div>
                        @if(1 == 0)
                        <div class="payment-detail col-sm-12">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="booking-summary ng-scope">
                        <div class="booking-sidebar">
                            <h3>your booking summary</h3>
                            <div class="booking-list col-sm-12">
                                <div class="top-border">
                                    <table id="booking-details" class="booking-table">
                                        <tr class="senior">
                                            <td>Haircut (Senior)</td>
                                            <td>0</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                        <tr class="junior">
                                            <td>Haircut (Junior)</td>
                                            <td>0</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                        <tr class="beard">
                                            <td>Beard Trim</td>
                                            <td>0</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                        <tr class="kids">
                                            <td>Kid's Cut</td>
                                            <td>0</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="booking-account col-sm-12">
                                <div class="top-border">
                                    <table id="booking-account" class="booking-table">
                                        <tr class="subtotal">
                                            <td>SUBTOTAL</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                        <tr class="discount">
                                            <td>DISCOUNT</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                        <tr class="total">
                                            <td>TOTAL</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="booking-address-info col-sm-12">
                                <div class="summary-address top-border">
                                    <div class="subtitle">Address:</div>
                                    <div class="subcontent-address"></div>
                                </div>
                                <div class="summary-remark">
                                    <div class="subtitle">Remarks:</div>
                                    <div class="subcontent-remark"></div>
                                </div>
                                <div class="summary-date">
                                    <div class="subtitle">Book & Date:</div>
                                    <div class="subcontent-date"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    function selectPaymentType(elem) {
        var type = elem.getAttribute('type');
        if (type == 1) {
            $('#pay-with-card').addClass('selected');
            $('#pay-with-cash').removeClass('selected');
            $('#pay-with-card img').prop('src', '{{url('resources/assets/imgs/icon-pay-card-white.png')}}');
            $('#pay-with-cash img').prop('src', '{{url('resources/assets/imgs/icon-pay-cash-gray.png')}}');
        } else {
            $('#pay-with-cash').addClass('selected');
            $('#pay-with-card').removeClass('selected');
            $('#pay-with-card img').prop('src', '{{url('resources/assets/imgs/icon-pay-card-gray.png')}}');
            $('#pay-with-cash img').prop('src', '{{url('resources/assets/imgs/icon-pay-cash-white.png')}}');
        }
        //console.log($('#pay-with-card img'));
    }

    function InputAddress(session_data) {
        var city = session_data.city;
        var postcode = session_data.postcode;
        var house_no = session_data.house_unit_no;
        var street = session_data.address;
        var remark = session_data.remarks;
        var date = session_data.request_date;
        var time = session_data.request_time;

        var address = ''; //house_no + ', ' + city + ', ' + postcode + ', ' + street;
        if (house_no != '') {
            address = house_no;
        }
        if (city != '') {
            if (address) {
                address += ', ' + city;
            } else {
                address = city;
            }
        }
        if (postcode != '') {
            if (address) {
                address += ', ' + postcode;
            } else {
                address = postcode;
            }
        }
        if (street) {
            if (address) {
                address += ', ' + street;
            } else {
                address = street;
            }
        }
        $('.subcontent-address').html(address);
        $('.subcontent-remark').html(remark);
        $('.subcontent-date').html(date + ' ' + time);
        //console.log(address);
    }

    function InputPrices(session_data) {
        var booking_table = document.getElementById('booking-details');
        for(var i = 0; i < 4; i++) {
            var targetItem = booking_table.rows[i];
            var countCell = targetItem.cells[1];
            var priceCell = targetItem.cells[2];
            var price = 0;
            if (i == 0) {//150
                countCell.innerHTML = session_data.senior_cut;
                priceCell.innerHTML = 'RM ' + (price * 150);
            } else if (i == 1) {//90
                countCell.innerHTML = session_data.junior_cut;
                priceCell.innerHTML = 'RM ' + (price * 90);
            } else if (i == 2) {//40
                countCell.innerHTML = session_data.beard_trim;
                priceCell.innerHTML = 'RM ' + (price * 40);
            } else if (i == 3) {//50
                countCell.innerHTML = session_data.kids_cut;
                priceCell.innerHTML = 'RM ' + (price * 50);
            }
        }

        var accountResult = document.getElementById('booking-account');
        var subtotalItem = accountResult.rows[0];
        var discountItem = accountResult.rows[1];
        var totalItem = accountResult.rows[2];
        subtotalItem.cells[1].innerHTML = 'RM ' + session_data.price;
        discountItem.cells[1].innerHTML = 'RM ' + session_data.discount;
        totalItem.cells[1].innerHTML = 'RM ' + session_data.total_price;
    }

    $(function() {
        var session_data = {!! $session_data !!};
    if (session_data) {
        //console.log(session_data);
        InputAddress(session_data);
        InputPrices(session_data);
    }
    });

    $('#btn-apply').click(function() {
        window.location.href = "{{url('/apply')}}";
    });
</script>