
<!DOCTYPE html>
<html lang="en">
    @include('admin.admincss')
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html  header -->
        
        @include('admin.header')
        <!-- partial -->
        
        @include('admin.main')
      
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
        @include('admin.adminjs')
  </body>
</html>