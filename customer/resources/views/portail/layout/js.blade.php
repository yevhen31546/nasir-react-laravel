
<script src="{{asset('assets-front/js/jquery.js')}}"></script>
<script src="{{asset('assets-front/js/plugins.js')}}"></script>
<script src="{{asset('assets-front/js/functions.js')}}"></script>
<script src="{{asset('assets-front/js/components/bs-select.js')}}"></script>
<script src="{{asset('assets-front/js/components/bs-switches.js')}}"></script>
<script src="{{asset('assets-front/js/components/rangeslider.min.js')}}"></script>
<script src="{{asset('assets-front/js/components/datepicker.js')}}"></script>
<script src="{{asset('assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/js/vendors/jquery-validation.init.js')}}" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="{{asset('assets/vendors/general/jquery-validation/dist/localization/messages_fr.js')}}" type="text/javascript"></script>
<script>
    function redirection(data){
        if(data.code==498){
           window.location = "{{ url('/login') }}"; 
        }
        if(data.code==500){
           console.log(data.message) 
        }
    }
</script>