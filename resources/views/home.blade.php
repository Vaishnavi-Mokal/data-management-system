<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Management</title>
    <!-- plugins:css -->
    @include('Admin.includes.header')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     @include('Admin.includes.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
       @include('Admin.includes.sidebar')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
        <div class="container mt-5 ">
           
            <div class="card-deck">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><i class="fa fa-user f-left"></i> Admin Users</div>
                    <div class="card-body">
                        <h5 class="card-title">Total count</h5><br><span>{{$adminu}}</span>

                    </div>
                </div>
                <br>
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><i class="fa fa-user f-left"></i> Sales Team</div>
                    <div class="card-body">
                        <h5 class="card-title">Total count</h5><br><span>{{$salesu}}</span>

                    </div>
                </div>
                <br>
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><i class="fa fa-user f-left"></i> Inactive Users</div>
                    <div class="card-body">
                        <h5 class="card-title">Total count</h5><br><span>{{$inactive}}</span>

                    </div>

                </div>


            </div>
        </div>

    </div>

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('Admin.includes.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('Admin.includes.foot')
    <!-- End custom js for this page -->
  </body>
</html>