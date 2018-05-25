<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apply</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="resources/assets/bootstrap/js/bootstrap.js"></script>
    <link href="resources/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/assets/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</head>
<body>
    <header>
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
    </header>

    <div class="section apply-header">
        <div class="overlay"></div>
        <div class="apply-content">
            <div class="title3">Become a MyCut Barber</div>
            <div class="content2">
                Set your own schedule, manage your personal book of business and earn above-market compensation.
                Just a few of the many reasons to join the MyCut team.
            </div>
        </div>
    </div>

    <div class="section col-lg-12">
        <div class="apply-form col-lg-6">
            <div class="tagline col-lg-10">
                <div class="apply-form-title">APPLY TO JOIN OUR TEAM</div>
            </div>
            <form action="{{ url('/apply/store') }}" method="post" id="form-apply" enctype="multipart/form-data">
            {!! csrf_field() !!}
                <div class="col-lg-12">
                    <div class="col-lg-6 first">
                        <input type="text" placeholder="First name" name="first_name" id="first_name"/>
                    </div>
                    <div class="col-lg-6 last">
                        <input type="text" placeholder="Last name" name="last_name" id="last_name"/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <input type="text" placeholder="Email" name="email" id="email"/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <input type="password" placeholder="Password" name="password" id="password"/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <select name="country_code" id="country_code" style="float:left;width:20%">
                            <option value="+60" selected>+60</option>
                        </select>
                        <input type="text" style="float:left;width:80%;" placeholder="Mobile Number" name="phone" id="phone"/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6 first">
                        <select name="city" id="city">
                            <option value="george_town">George Town</option>
                            <option value="penang_island">Penang Island</option>
                            <option value="kuala_lumpur">Kuala Lumpur</option>
                            <option value="ipoh">Ipoh</option>
                            <option value="kuching">Kuching</option>
                            <option value="johor_bahru">Johor Bahru</option>
                            <option value="kota_kinabalu">Kota Kinabalu</option>
                            <option value="shah alam">Shah Alam</option>
                            <option value="malacca city">Malacca City</option>
                            <option value="alor_setar">Alor Setar</option>
                            <option value="miri">Miri</option>
                            <option value="petaling_jaya">Petaling Jaya</option>
                            <option value="Kuala Terengganu">Kuala Terengganu</option>
                        </select>
                    </div>
                    <div class="col-lg-6 last">
                        <input type="text" placeholder="Pin Code" name="pin_code" id="pin_code"/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <textarea placeholder="Short Business Description" name="description" id="description" style="height: 150px;max-height: 150px;max-width: 100%;"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <input type="text" placeholder="Certificate" name="certificate" id="certificate"/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <input type="text" placeholder="Experience" name="experience" id="experience"/>
                    </div>
                </div>
                <div class="col-lg-12" style="text-align: center;">
                    <div class="upload-photo">
                        <img class="prev-photo" id="prev-photo"/>
                        <div class="btn-photo-upload" id="btn-photo-upload">
                            <i class="fa fa-picture-o" aria-hidden="true"></i><br/>
                            Client Photo
                        </div>
                    </div>
                    <input type="file" name="client_photo" id="client_photo" style="display:none;"/>
                </div>
                <div class="col-lg-12" style="text-align:center;">
                    <h3>Add Service</h3>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="col-lg-7 left" style="margin-top: 8px;">
                            <div class="checkbox_wrapper" style="float:left;">
                                <input type="checkbox" name="barber_cut"/>
                                <label></label>
                            </div>
                            <div class="checkbox_label" style="float:left;">Barber Cut</div>
                        </div>
                        <div class="col-lg-5 right">
                            <div class="col-lg-5 input-price-label">
                                RM
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-price" name="price1" id="price1"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="col-lg-7 left" style="margin-top: 8px;">
                            <div class="checkbox_wrapper" style="float:left;">
                                <input type="checkbox" name="stylish_cut"/>
                                <label></label>
                            </div>
                            <div class="checkbox_label" style="float:left;">Stylish Cut</div>
                        </div>
                        <div class="col-lg-5 right">
                            <div class="col-lg-5 input-price-label">
                                RM
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-price" name="price2" id="price2"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="col-lg-7 left" style="margin-top: 8px;">
                            <div class="checkbox_wrapper" style="float:left;">
                                <input type="checkbox" name="long_cut"/>
                                <label></label>
                            </div>
                            <div class="checkbox_label" style="float:left;">Long Cut</div>
                        </div>
                        <div class="col-lg-5 right">
                            <div class="col-lg-5 input-price-label">
                                RM
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-price" name="price3" id="price3"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="col-lg-7 left" style="margin-top: 8px;">
                            <div class="checkbox_wrapper" style="float:left;">
                                <input type="checkbox" name="beard_trim"/>
                                <label></label>
                            </div>
                            <div class="checkbox_label" style="float:left;">Beard Trim</div>
                        </div>
                        <div class="col-lg-5 right">
                            <div class="col-lg-5 input-price-label">
                                RM
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-price" name="price4" id="price4"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="col-lg-7 left" style="margin-top: 8px;">
                            <div class="checkbox_wrapper" style="float:left;">
                                <input type="checkbox" name="kids_cut"/>
                                <label></label>
                            </div>
                            <div class="checkbox_label" style="float:left;">Kids Cut</div>
                        </div>
                        <div class="col-lg-5 right">
                            <div class="col-lg-5 input-price-label">
                                RM
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-price" name="price5" id="price5"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" style="text-align: center;">
                    <div class="btn-register" id="btn-apply-new">Register</div>
                </div>
            </form>
        </div>
    </div>

    <div class="copyright">
        <div class="address col-lg-6">
            29 Jalan Setia Indah U13/12Q , Seksyen U13 Setia Alam, 40170 Shah Alam
        </div>
        <div class="contacts col-lg-6">
            <div class="contact-item col-lg-2">PRIVACY</div>
            <div class="contact-item col-lg-2">TERMS</div>
            <div class="contact-item col-lg-4">
                <i class="fa fa-phone" aria-hidden="true"></i>
                +6016-3646491
            </div>
            <div class="contact-item col-lg-4">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                9 am to 12 pm (daily) We're Open on Public Holidays
            </div>
        </div>
    </div>
</body>
</html>

<script>
$(function() {
    $('#btn-photo-upload').click(function() {
        $('#client_photo').click();
    });

    $('#prev-photo').click(function() {
        $('#client_photo').click();
    });

    $('#client_photo').on('change', function(e) {
        var fileInput = this;
        if (fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#prev-photo').attr('src', e.target.result);
            }
            $('#btn-photo-upload').css('display', 'none');
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            $('#btn-photo-upload').css('display', 'block');
        }
    });

    $('#form-apply').validate({
        rules: {
			'first_name': { required: true },
            'last_name': { required: true },
	        'email': { required: true, email: true },
			'password': { required: true },
			'phone': { required: true },
			'pin_code': { required: true },
			'description': { required: true },
			'certificate': { required: true },
            'experience': { required: true },
        },
        messages: {
			'first_name': {required: "Please input your first name."},
            'last_name': {required: "Please input your last name."},
            'email': {required: "Please input your email.", email: "Please input correct email."},
			'password': {required: "Please input your password."},
			'phone': {required: "Please input your phone number."},
            'pin_code': {required: "Please input your pin code."},
            'description': {required: "Please input your short business description."},
            'certificate': {required: "Please input your certificate."},
            'experience': {required: "Please input your experience."},
        },
        submitHandler: function (frm) {
            frm.submit();
        },
        success: function (e) {
        //
        }
    });

    $('#btn-apply-new').click(function() {
        $('#form-apply').submit();
    });
});
</script>
