<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!--Toast Style-->
  <link rel="stylesheet" href="{{asset('backend/plugins/toastr/toastr.min.css')}}">
   <livewire:styles />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('layouts.partials.nav')
  @include('layouts.partials.sidebar')
   <div class="content-wrapper">
    {{ $slot }}
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  @include('layouts.partials.footer')
</div>
<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js')}}"></script>

<!--Toast JS-->
<script src="{{ asset('backend/plugins/toastr/toastr.min.js')}}"></script>

<script type="text/javascript">
    
    $(document).ready(function(){

        toastr.options = {
            "progressBar": true,
            "positionClass": "toast-top-right",
          }

          window.addEventListener("hide-form", event => {
            $('#form').modal("hide");
            toastr.success(event.detail.message, 'Success');
          });

    });

    window.addEventListener("show-form", event =>{
      $("#form").modal("show");
    });

    window.addEventListener("show-delete-modal", event =>{
      $("#cofirmationForm").modal("show");
    });


     window.addEventListener("hide-delete-modal", event => {
            $('#cofirmationForm').modal("hide");
            toastr.success(event.detail.message, 'Success');
          });
  
</script>
 <livewire:scripts />
</body>
</html>
