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
      // .addValidator('filemaxsize', {
      //       requirementType: 'string',
      //       validateNumber: function (value, requirement) {
      //           var reqs = req.split('|');
      //           var input = $('input[type="file"][name="'+reqs[0]+'"]');
      //           var maxsize = reqs[1];
      //           var max_bytes = maxsize * 1000000, file = input.files[0];
      //
      //           return file.size <= max_bytes;
      //       },
      //       messages: {
      //           en: 'The file size is too big. Please upload not more than 5MB'
      //       }
      // });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/legacy.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.date.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.time.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-kit/1.1.3/sticky-kit.min.js"></script>
<script src="/resources/assets/public/js/app.min.js"></script>
