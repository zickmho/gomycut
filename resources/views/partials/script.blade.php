
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script src="/bower_components/bootstrap4/assets/js/vendor/popper.min.js"></script>
<script src="/bower_components/bootstrap4/dist/js/bootstrap.min.js"></script>
<script>
    window.ParsleyConfig = {
        errorsWrapper: '<div class="form-error"></div>',
        errorTemplate : '<span></span>',
        errorClass: 'is-invalid',
        successClass: 'is-valid'
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
<script>
    window.Parsley
      .addValidator('filemaxsize', function (val, req) {
          var reqs = req.split('|');
          var input = $('input[type="file"][name="'+reqs[0]+'"]');
          var maxsize = reqs[1];
          var max_bytes = maxsize * 1000000, file = input[0].files[0];

          return file.size <= max_bytes;

      }, 32)
      .addMessage('en', 'filemaxsize', 'The file size is too big. Please upload not more than 5MB');
            
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/legacy.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.date.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.time.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-kit/1.1.3/sticky-kit.min.js"></script>
<script src="/resources/assets/public/js/app.min.js"></script>
