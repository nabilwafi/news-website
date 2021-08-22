<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.partials.head')
  
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      
      @include('admin.partials.sidebar')
      
      <!-- partial -->
      
      <div class="container-fluid page-body-wrapper">
        
        <!-- partial:partials/_navbar.html -->
        
        @include('admin.partials.header')
        
        <!-- partial -->
        
        @yield('admin.panel')
        
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    @include('admin.partials.script')
  </body>
</html>