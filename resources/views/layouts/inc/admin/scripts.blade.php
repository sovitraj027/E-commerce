<!-- plugins:js -->
<script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/template.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<script src="{{asset('admin/js/data-table.js')}}"></script>
<script src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/js/dataTables.bootstrap4.js')}}"></script>
<!-- End custom js for this page-->

<script src="{{asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}" defer></script> --}}
@include('layouts.inc.admin.toaster')
@livewireScripts
@yield('custom_js')
@stack('inlinejs')
@yield('scripts')

