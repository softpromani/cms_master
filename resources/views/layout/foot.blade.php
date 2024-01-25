 <!-- BEGIN: Vendor JS-->
 <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
 <!-- BEGIN Vendor JS-->

 <!-- BEGIN: Page Vendor JS-->
 <!-- END: Page Vendor JS-->

 <!-- BEGIN: Theme JS-->
 <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
 <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
 <!-- END: Theme JS-->

 <!-- BEGIN: Page JS-->
 <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-toastr.js') }}"></script>
 <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
 <!-- END: Page JS-->

 <script>
     $(document).ready(function() {
         if (feather) {
             feather.replace({
                 width: 14,
                 height: 14
             });
         }
     });
     // success message popup notification

     @if (session()->has('success'))
         toastr['success']("{{ session()->get('success') }}", 'success!', {
             closeButton: true,
             tapToDismiss: false,
             rtl: false
         });
     @endif
     // info message popup notification
     @if (session()->has('info'))
         toastr['info']("{{ session()->get('info') }}", 'info!', {
             closeButton: true,
             tapToDismiss: false,
             rtl: false
         });
     @endif
     // warning message popup notification
     @if (session()->has('warning'))
         toastr['warning']("{{ session()->get('warning') }}", 'Warning!', {
             closeButton: true,
             tapToDismiss: false,
             rtl: false
         });
     @endif
     // error message popup notification
     @if (session()->has('error'))
         toastr['error']("{{ session()->get('error') }}", 'Error!', {
             closeButton: true,
             tapToDismiss: false,
             rtl: false
         });
     @endif
 </script>
