{{-- vender --}}
<script type="text/javascript" src="{{ asset('') }}app-assets/vendors/js/vendors.min.js"></script>

{{-- theme js --}}
<script type="text/javascript" src="{{ asset('') }}app-assets/js/core/app-menu.js"></script>
<script type="text/javascript" src="{{ asset('') }}app-assets/js/core/app.js"></script>
<script type="text/javascript" src="{{ asset('') }}app-assets/js/scripts/components.js"></script>

{{-- page js --}}
@yield('script')

{{-- js message --}}
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $('#alert-message').hide()
        }, 5000)
    })
</script>