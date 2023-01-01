<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.inc.admin.head')

<body>
    

    <div class="container-scroller">
        
        <!-- partial:partials/_navbar.html -->
    @include('layouts.inc.admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
           @include('layouts.inc.admin.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
               
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- plugins:js -->
  @include('layouts.inc.admin.scripts')
</body>

</html>