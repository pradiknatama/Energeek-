<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Energeek Test</title>

  <link rel="stylesheet" type="text/css" href="/dropzone/css/dropzone.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  @stack("style")

  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/css/adminlte.min.css">

 <style>
     .button:hover {
    background: #fff !important;
    color: #F1416C;
    text-decoration: none;
}
 </style>
</head>
<body class="hold-transition sidebar-mini" style="background: #F9FAFC;">
<div class="wrapper" >
    <div class="container-fluid"  >
        @yield("content")
    </div>

</div>
<!-- ./wrapper -->
<div class="container-fluid">
   
</div>
<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/dropzone/js/dropify.min.js') }}"></script>
<script src="{{ asset('/dropzone/js/dropzone.js') }}"></script>

@stack('script')
<!-- Page specific script -->
@include('sweetalert::alert')
</body>
</html>
