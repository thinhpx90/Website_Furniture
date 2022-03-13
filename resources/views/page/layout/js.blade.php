<script src="{{ asset('') }}page-assets/js/jquery.min.js"></script>
<script src="{{ asset('') }}page-assets/js/jquery.bootstrap.js"></script>
<script src="{{ asset('') }}page-assets/js/jquery.magnific-popup.js"></script>
<script src="{{ asset('') }}page-assets/js/jquery.owl.carousel.js"></script>
<script src="{{ asset('') }}page-assets/js/jquery.ion.rangeSlider.js"></script>
<script src="{{ asset('') }}page-assets/js/jquery.isotope.pkgd.js"></script>
<script src="{{ asset('') }}page-assets/js/main.js"></script>
<script src="{{ asset('') }}custom/js/cart.js"></script>
<script>
    $(document).ready(function(){
        @if (session('status'))
            $(".alert-warning").toggleClass('in out');
            setTimeout(function(){
                $(".alert").alert('close')
            }, 5000)
        @endif
    })
</script>
