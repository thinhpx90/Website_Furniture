<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title')</title>
{{-- css theme --}}
<link rel="stylesheet" href="{{ asset('') }}app-assets/css/bootstrap.css">
<link rel="stylesheet" href="{{ asset('') }}app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" href="{{ asset('') }}app-assets/css/colors.css">
<link rel="stylesheet" href="{{ asset('') }}app-assets/css/components.css">

{{-- css page --}}
<link rel="stylesheet" href="{{ asset('') }}app-assets/css/core/menu/menu-types/vertical-menu.css">

{{-- vendor --}}
<link rel="stylesheet" href="{{ asset('') }}app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" href="{{ asset('') }}app-assets/vendors/css/extensions/shepherd-theme-default.css">

{{-- icon --}}
<link rel="stylesheet" href="{{ asset('') }}icon/css/all.css">

{{-- custom css --}}
@yield('css')
