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
            <div class="row" id="proBanner">
              
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-plus"></i>
                </span> User Management
              </h3>
            </div>

            <div class="row">
            @if(Session::has('success'))
                <div class="alert alert-success"> {{Session::get('success')}} </div>
            @endif
            @if(Session::has('errMesg'))
                <div class="alert alert-danger"> {{Session::get('errMesg')}} </div>
            @endif

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    <form class="forms-sample" action="{{route('UpdateUser')}}" method="post">
                        @csrf()
                        <input type="hidden" name="userid" value="{{$users['id']}}"/>
                      <div class="form-group">
                        <label for="exampleInputName1">First Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter First Name" name="firstname" value="{{$users['firstname']}}">
                      </div>
                      @if($errors->has('firstname'))
                            <label class="alert alert-danger">{{$errors->first('firstname')}}</label>
                        @endif

                      <div class="form-group">
                        <label for="exampleInputName1">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Last Name" name="lastname" value="{{$users['lastname']}}">
                      </div>
                      @if($errors->has('lastname'))
                            <label class="alert alert-danger">{{$errors->first('lastname')}}</label>
                        @endif

                      <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Email ID" name="email" value="{{$users['email']}}">
                      </div>
                      @if($errors->has('email'))
                            <label class="alert alert-danger">{{$errors->first('email')}}</label>
                        @endif


                      <div class="form-group">
                            <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="active" value="{{$users['status']}}">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Active
                            </label>

                            </div>
                            <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="in-active" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                In-Active
                            </label>
                            </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectAssetType">Roles</label>
                        <select class="form-control" id="exampleSelectAssetType" name="role">
                            <!-- foreach render types  -->
                          <option value="{{$selectedtype['role-name']}}">{{$selectedtype['role-name']}}</option>
                            @foreach($roles as $role)
                            <option value="{{$role['role-name']}}">{{$role['role-name']}}</option>
                          @endforeach
                          
                          
                        </select>
                      </div>            
                      @if($errors->has('role'))
                            <label class="alert alert-danger">{{$errors->first('role')}}</label>
                        @endif
          
                      
                      
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <button class="btn btn-primary">Cancel</button>
                    </form>
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