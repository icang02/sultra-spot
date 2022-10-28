<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>SultraSpot | Landing Page</title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap"
    rel="stylesheet">


  <link rel="icon" type="image/x-icon" href="{{ asset('sneat/img/favicon/logo.png') }}" />
  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="{{ asset('rhea/vendors/plyr/plyr.css') }}" rel="stylesheet">
  <link href="{{ asset('rhea/css/theme.css') }}" rel="stylesheet" />

</head>

<body>

  @yield('main-content')

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="{{ asset('rhea/vendors/@popperjs/popper.min.js') }}"></script>
  <script src="{{ asset('rhea/vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('rhea/vendors/is/is.min.js') }}"></script>
  <script src="{{ asset('rhea/vendors/plyr/plyr.polyfilled.min.js') }}"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="{{ asset('rhea/js/theme.js') }}"></script>

</body>

</html>
