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

<div class="container-fluid" style="padding-top: 10%;padding-bottom: 10%;background-color: #333">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container-fluid overflow-hidden">
        <div class="container ng-scope" style="min-width:360px;">
            <div class="row col-lg-12" style="display: -webkit-box; display: -webkit-flex; display: -ms-flexbox;display: flex;">
                <div class="pricing-content ng-scope">
                    <table class="pricing-table">
                        <tr>
                            <td class="col-sm-8">
                                <div class="pricing-title">THE PREMIUM CUT</div>
                                <div class="pricing-detail">Have your haircut by our senior & experienced barber</div>
                            </td>
                            <td><div class="pricing-title">RM 150</div></td>
                        </tr>
                        <tr>
                            <td class="col-sm-8">
                                <div class="pricing-title">THE NORMAL CUT</div>
                                <div class="pricing-detail">Have your haircut by our junior yet professional barber</div>
                            </td>
                            <td><div class="pricing-title">RM 90</div></td>
                        </tr>
                        <tr>
                            <td class="col-sm-8">
                                <div class="pricing-title">SHAVE & SHAPE</div>
                                <div class="pricing-detail">Stylish your head by customized shaved style</div>
                            </td>
                            <td><div class="pricing-title">RM 70<div></td>
                        </tr>
                        <tr>
                            <td class="col-sm-8">
                                <div class="pricing-title">BEARD TRIM</div>
                                <div class="pricing-detail"></div>
                            </td>
                            <td><div class="pricing-title">RM 50<div></td>
                        </tr>
                        <tr>
                            <td class="col-sm-8">
                                <div class="pricing-title">KIDS CUT</div>
                                <div class="pricing-detail">(12 Years old below)</div>
                            </td>
                            <td><div class="pricing-title">RM 70<div></td>
                        </tr>
                    </table>
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

</script>
