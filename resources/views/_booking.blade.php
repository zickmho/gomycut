<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mycut</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="resources/assets/bootstrap/js/bootstrap.js"></script>
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
<div class="navbar navbar-default">
    <div class ="container-fluid">
        <div class ="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{url('/')}}"><img class="navbar-brand" src="resources/assets/imgs/logo.png"/></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <!--div class="navbar-left menu-item">
                        <a href="#how-it-work">HOW IT WORKS</a>
                        <a href="{{url('pricing')}}">PRICING</a>
                    </div>
                    <div class="navbar-right menu-item" id="btn-apply">BECOME A BARBER</div>
                </div-->
            <ul class="nav navbar-nav navbar-left">
                <li class="active">
                    <a href="#how-it-work">HOW IT WORKS</a>
                </li>
                <li class="active">
                    <a href="{{url('pricing')}}">PRICING</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="#how-it-work">BECOME A BARBER</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="container-fluid" style="padding-top: 10%;padding-bottom: 10%;background-color: white">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container-fluid overflow-hidden">
        <div class="container booking-form ng-scope" style="min-width:100%;">
            <div class="row col-lg-12" style="display: -webkit-box; display: -webkit-flex; display: -ms-flexbox;display: flex;">
                <div class="col-lg-8">
                    <div class="booking-content ng-scope">
                        <div class="booking-progress">
                            <div class="row progress-header">
                                <div class="col-sm-4 text-center step-1">
                                    <span>Book a session</span>
                                    <div class="gap-sm"></div>
                                    <div class="svg-badge">
                                        <div class="circle-badge"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center step-2">
                                    <span>Make a payment</span>
                                    <div class="gap-sm"></div>
                                    <div class="svg-badge">
                                        <div class="circle-badge deselect"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center step-3">
                                    <span>Check your status</span>
                                    <div class="gap-sm"></div>
                                    <div class="svg-badge">
                                        <div class="circle-badge deselect"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">

                                </div>
                            </div>
                        </div>
                        @if(!Auth::check())
                        <div class="login-panel col-sm-12">
                            <div class="col-sm-12">
                                <!--div class="col-sm-6" style="padding-top: 10px;">Been here before?</div>
                                <div class="col-sm-6"><input type="button" class="btn-warning" id="login-button" value="LOGIN NOW" onclick="doLogin(this)"></div-->
                            </div>
                        </div>
                        @endif
                        <div class="service-detail col-sm-12">
                            <h3>Service Required</h3>
                            <div class="gap-sm">Choose Service required.</div>
                            <div class="checkbox col-sm-12">
                                <label class="col-lg-5 col-md-12 col-sm-12 col-xs-12"><input type="checkbox" service="1" name="service-type-senior" onchange="ServiceSelect(this)">THE PREMIUM CUT</label>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[1]" class="form-control input-number" value="0" min="0" max="100" service="1">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <label class="col-lg-2 col-md-6 col-sm-12 col-xs-12 service-price">RM 150</label>
                            </div>
                            <div class="checkbox col-sm-12">
                                <label class="col-lg-5 col-md-12 col-sm-12 col-xs-12"><input type="checkbox" service="2" name="service-type-junior" onchange="ServiceSelect(this)">THE NORMAL CUT</label>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[2]">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[2]" class="form-control input-number" value="0" min="0" max="100" service="2">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[2]">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <label class="col-lg-2 col-md-6 col-sm-12 col-xs-12 service-price">RM 90</label>
                            </div>
                            <div class="checkbox col-sm-12">
                                <label class="col-lg-5 col-md-12 col-sm-12 col-xs-12"><input type="checkbox" service="3" name="service-type-beard" onchange="ServiceSelect(this)">SHAVE AND SHAPE</label>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[3]">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[3]" class="form-control input-number" value="0" min="0" max="100" service="3">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[3]">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <label class="col-lg-2 col-md-6 col-sm-12 col-xs-12 service-price">RM 70</label>
                            </div>
                            <div class="checkbox col-sm-12">
                                <label class="col-lg-5 col-md-12 col-sm-12 col-xs-12"><input type="checkbox" service="4" name="service-type-kids" onchange="ServiceSelect(this)">BEARD TRIM</label>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[4]">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[4]" class="form-control input-number" value="0" min="0" max="100" service="4">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[4]">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <label class="col-lg-2 col-md-6 col-sm-12 col-xs-12 service-price">RM 40</label>
                            </div>
                            <div class="checkbox col-sm-12">
                                <label class="col-lg-5 col-md-12 col-sm-12 col-xs-12"><input type="checkbox" service="4" name="service-type-kids-cut" onchange="ServiceSelect(this)">KID'S CUT</label>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[4]">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[4]" class="form-control input-number" value="0" min="0" max="100" service="4">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[4]">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <label class="col-lg-2 col-md-6 col-sm-12 col-xs-12 service-price">RM 50</label>
                            </div>
                        </div>
                        <form class="booking-contact col-md-12" id="booking-contact">
                            <h3 class="">Contact Information</h3>
                            <div class="gap-sm">This information will be used to contact you about your booking.</div>
                            <div class="contact-information">
                                <div class="col-md-12">
                                    <div class="col-lg-3 col-sm-12 col-xs-12">
                                        <input type="text" name="contact-title" id="contact-title" placeholder="Title">
                                    </div>
                                    <div class="col-lg-9 col-sm-12 col-xs-12">
                                        <input type="text" name="contact-name" id="contact-name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-lg-8 col-sm-12 col-xs-12">
                                        <input type="text" name="contact-email" id="contact-email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-lg-5 col-sm-12 col-xs-12">
                                        <input type="text" name="contact-phone" id="contact-phone" placeholder="Phone No">
                                    </div>
                                    <div class="col-lg-7 col-sm-12 col-xs-12">
                                        <input type="submit" class="btn-warning" value="Verify my number" >
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="booking-address second-view col-sm-12" style="display: none;">
                            <h3 class="">Your Address</h3>
                            <div class="gap-sm">Tell us where you want us to send the barber.</div>
                            <div class="address-information">
                                <div class="col-sm-12">
                                    <div class="col-sm-4">City</div>
                                    <div class="col-sm-4">Postcode</div>
                                    <div class="col-sm-4">House/Unit no</div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-4"><input type="text" name="city" id="city" onchange="InputAddress(this)"></div>
                                    <div class="col-sm-4"><input type="text" name="postcode" id="postcode" onchange="InputAddress(this)"></div>
                                    <div class="col-sm-4"><input type="text" name="house-no" id="house-no" onchange="InputAddress(this)"></div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-12">Address</div>
                                    <div class="col-sm-12"><textarea class="col-sm-12" style="height: 100px;" name="address" id="address" placeholder="Street" onchange="InputAddress(this)"></textarea></div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-12">Remark</div>
                                    <div class="col-sm-12"><input type="text" name="remark" id="remark" onchange="InputAddress(this)"></div>
                                </div>
                            </div>
                        </div>
                        <div class="request-time second-view col-sm-12" style="display: none;">
                            <h3 class="">When do you want us to come</h3>
                            <div class="gap-sm">Tell us your preferred date & time.</div>
                            <div class="time-information">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">Select date</div>
                                    <div class="col-sm-6">Select time</div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <input type="text" name="date" id="datePicker" onchange="SelectDate()">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="time" id="time" onchange="SelectDate()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="agreement second-view col-sm-12" style="display: none;">
                            <div class="checkbox">
                                <label class="col-sm-12 gap-sm"><input type="checkbox" class="agree-privacy-policy">
                                    By clicking the Book Now button you are agreeing to our <a>Term of Service</a> and <a>Privacy Policy</a>
                                </label>
                            </div>
                            <div class="pay-information">
                                <div class="col-sm-12">
                                    <input type="button" class="book-now disabled " value="BOOK NOW" onclick="BookNow(this)" disabled="disabled">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 hideX">
                    <div class="booking-summary ng-scope">
                        <div class="booking-sidebar">
                            <h3>your booking summary</h3>
                            <div class="booking-list col-sm-12">
                                <div class="top-border">
                                    <table id="booking-details" class="booking-table">
                                        <tr class="senior">
                                            <td>THE PREMIUM CUT</td>
                                            <td>0</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                        <tr class="junior">
                                            <td>THE NORMAL CUT</td>
                                            <td>0</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                        <tr class="beard">
                                            <td>SHAVE & SHAPE</td>
                                            <td>0</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                        <tr class="kids">
                                            <td>BEARD TRIM</td>
                                            <td>0</td>
                                            <td class="last">RM 0</td>
                                        </tr>
                                        <tr class="kids-cut">
                                            <td>KID'S CUT</td>
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
        <form id="confirm-request" action="{{url('request-booking')}}" method="post" style="display: none;">
            {!! csrf_field() !!}
            <input name="service-type-senior" id="request-service-type-senior">
            <input name="service-type-junior" id="request-service-type-junior">
            <input name="service-type-beard" id="request-service-type-beard">
            <input name="service-type-kids" id="request-service-type-kids">
            <input name="senior-count" id="request-senior-count">
            <input name="junior-count" id="request-junior-count">
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
    function SelectDate() {
        var date = $('#datePicker').val();
        var time = $('#time').val();
        //console.log(time);
        $('.subcontent-date').html(date + ' ' +time);
        $('#request-date').val(date);
        $('#request-time').val(time);
    }
    function InputAddress(elem) {
        var city = $('#city').val();
        var postcode = $('#postcode').val();
        var house_no = $('#house-no').val();
        var street = $('#address').val();
        var remark = $('#remark').val();

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
        //console.log(address);
    }
    function verifyPhone() {
        var phoneInput = document.getElementsByName('contact-phone');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var phoneNo = $("#contact-phone").intlTelInput("getNumber");
        var title = $("#contact-title").val();
        var name = $('#contact-name').val();
        var email = $('#contact-email').val();
        var result = 0;

        //console.log(ntlNumber);
        $.ajax({
            type: 'POST',
            url: '{{url('verifyPhone')}}',
            data: {_token: CSRF_TOKEN, phoneNo: phoneNo, name: name, title: title, email: email},
            success: function(data) {
                //console.log(data);
                var jc = $.confirm({
                    theme: 'light',
                    closeIcon: true,
                    title : 'Verify your mobile number',
                    content: '' +
                    '<form action="" class="formName verify-code-form">' +
                    '<div class="form-group">' +
                    '<label style="font-weight: lighter;">We have sent a 4 digit verification code to you mobile phone. Please enter it here. </br></br>' +
                    '<strong>Why is this necessary?</strong>. We need to make ensure that the phone number that you enter is valid so we can' +
                    'contact you directly in case of any changes.</label>' +
                    '<input type="text" placeholder="----" class="name form-control input-code" name="input-code" required style="text-align: center;" maxlength="4"/>' +
                    '<label class="label-resent hidden">Verification code resent to '+ phoneNo + '</label>' +
                    '<label class="label-invalid hidden">Verification code invalid. Please try again. </label></div>' +
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
                                $('.label-resent').removeClass('hidden');
                                $('.label-invalid').addClass('hidden');
                                return false;
                            }
                        },
                        verify: {
                            text : 'Verify my number',
                            btnClass:'btn-blue',
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
                                    //console.log('response ' + response);
                                    if (response == 1) {
                                        result = true;
                                        $('.second-view').attr('style', 'display:block');
                                        $('#contact-title').readOnly = true;
                                        $('#contact-name').readOnly = true;
                                        $('#contact-email').readOnly = true;
                                        $('#contact-phone').readOnly = true;
                                        jc.close();
                                    } else {
                                        result = false;
                                        $('.label-resent').addClass('hidden');
                                        $('.label-invalid').removeClass('hidden');
                                    }
                                    answered = true;
                                }).fail(function (){
                                    $('.label-resent').addClass('hidden');
                                    $('.label-invalid').removeClass('hidden');
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

    function doLogin(elem) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.confirm({
            theme: 'light',
            closeIcon: true,
            title : 'Login',
            content: '' +
            '<form action="" class="formName" id="login-form">' +
            '{!! csrf_field() !!}' +
            '<div class="form-group">' +
            '<input type="text" placeholder="Email" class="form-control email" name="email" required/>' +
            '<input type="text" placeholder="Password" class="form-control password" name="password" required/>' +
            '<label class="label-invalid hidden">Login failed </label></div>' +
            '</form>',
            buttons: {
                ResendCode: {
                    text: 'LOGIN',
                    btnClass:'btn-blue',
                    action: function(){
                        $.ajax({
                            type: 'POST',
                            url: '{{url('dologin')}}',
                            data: {_token: CSRF_TOKEN, email:$('#login-form .email').val(), password:$('#login-form .password').val()},
                            success: function(data) {
                                if (data == 1) {
                                    //console.log(data);
                                } else {
                                    $('.label-invalid').addClass('hidden');
                                }
                            }
                        });
                        return false;
                    }
                },
                cancel: {
                    text : 'CANCEL',
                    action: function(){
                        $.ajax({
                            type: 'POST',
                            url: '{{url('dologout')}}',
                            data: {_token: CSRF_TOKEN, email:$('#login-form .email').val(), password:$('#login-form .password').val()},
                            success: function(data) {
                                //console.log(data);
                            }
                        });
                        return false;
                    }
                }
            }
        });
    }

    function BookNow(elem) {
        var main_content = document.createElement('DIV');
        var booking_list = $('.booking-list').clone();
        var booking_account = $('.booking-account').clone();
        var booking_address = $('.booking-address-info').clone();
        main_content.appendChild(booking_list[0]);
        main_content.appendChild(booking_account[0]);
        main_content.appendChild(booking_address[0]);
        //console.log(main_content);
        $.confirm({
            theme:'white',
            title : 'YOUR BOOKING SUMMARY',
            content: main_content,
            buttons: {
                edit: {
                    text: 'EDIT'
                },
                confirm: {
                    text: 'CONFIRM BOOKING',
                    btnClass:'btn-blue',
                    action: function () {
                        //$('#request-service-type-senior').val();
                        //$('#request-service-type-junior').val();
                        //$('#request-service-type-beard').val();
                        //$('#request-service-type-kids').val();
                        //$('#request-senior-count').val();
                        //$('#request-junior-count').val();
                        //$('#request-beard-count').val();
                        //$('#request-kids-count').val();

                        $('#request-city').val($('#city').val());
                        $('#request-postcode').val($('#postcode').val());
                        $('#request-house-unit-no').val($('#house-no').val());
                        $('#request-address').val($('#address').val());
                        $('#request-remark').val($('#remark').val());
                        //$('#request-date').val($('#datePicker').val());
                        //$('#request-time').val($('#time').val());
                        $('#confirm-request').submit();
                        //$('#total-price').val();
                    }
                }
            }
        });
    }

    $('#booking-contact').submit(function(){
        verifyPhone();
        return false;
    });

    $('#booking-contact input').prop('required', true);

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
    $('.input-number').change(function() {

        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        serviceType = $(this).attr('service');
        isChecked = $('.checkbox')[serviceType - 1].getAttribute('checked');
        if (isChecked == 'true') {
            addBooking(serviceType);
        }
    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $('#datePicker').bootstrapMaterialDatePicker({
        format : 'YYYY-MM-DD',
        minDate : new Date(),
        time : false
    });

    $('#time').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });

    $('#contact-phone').intlTelInput({
        preferredCountries: ['my', 'cn'],
    });

    $('.agree-privacy-policy').change(function() {
        var value = this.checked;
        //console.log(value);
        if (value == true) {
            $('.book-now').isDisabled = false;
            $('.book-now').prop('disabled', false);
            $('.book-now').addClass('btn-warning');
            $('.book-now').removeClass('disabled');
        } else {
            $('.book-now').isDisabled = true;
            $('.book-now').prop('disabled', true);
            $('.book-now').removeClass('btn-warning');
            $('.book-now').addClass('disabled');
        }
    });

</script>
