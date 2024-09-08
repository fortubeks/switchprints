<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="{{ asset('switchprints') }}/css/global.css" />
    <link rel="stylesheet" href="{{ asset('switchprints') }}/plugins/notifications/css/lobibox.min.css" />
    <link rel="stylesheet" href="{{ asset('switchprints') }}/plugins/datatable/css/dataTables.bootstrap5.min.css" />
    <!-- Push styles here -->
    @stack('styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,600;1,100&display=swap"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div id="main-wrapper"> 
            @yield('content')
  </div>

    <script src="{{ asset('switchprints') }}/js/jquery.min.js"></script>
    <!--notification js -->
    <script src="{{ asset('switchprints') }}/plugins/notifications/js/lobibox.min.js"></script>
    <script src="{{ asset('switchprints') }}/plugins/notifications/js/notifications.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('switchprints') }}/plugins/datatable/js/jquery.dataTables.min.js"></script>
	  <script src="{{ asset('switchprints') }}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

  </body>
</html>
