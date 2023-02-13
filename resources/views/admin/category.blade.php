<!DOCTYPE html>
<html lang="en">
  <head>
  	@include('admin.css')
    <style type="text/css">
      .div_center{
        text-align: center;
        padding-top: 40px;
      }
      .h2_font{
        font-size: 40px;
        padding-bottom: 40px;
      }
      .input_color{
        color: white;
        background-color: transparent !important;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
     <div class="main-panel">
        <div class="content-wrapper">

          @if(session()->has('message'))

          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
          </div>

          @endif

          <div class="div_center">
            <h2 class="h2_font">Add Category</h2>
            <!-- <form action="{{url('add_category')}}" method="POST">
              @csrf
              <input type="text" class="input_color" name="category" placeholder="write category name">
              <input type="submit" name="submit" class="btn btn-primary" value="add category">
            </form> -->
          </div>


          <div class="row">
              <div class="col-md-6 grid-margin stretch-card offset-3">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{url('add_category')}}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Category Name</label>
                        <input type="text" name="category" class="form-control" id="exampleInputUsername1" placeholder="Category Name">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Add Category</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card offset-3">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th><b>Category Name.</b></th>
                      <th><b>Action</b></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($data as $cat)


                    <tr>
                      <td>{{$cat->category_name}}</td>
                      <td><a onclick="return confirm('Are you sure to delete {{$cat->category_name}} category')" href="{{url('delete_category',$cat->id)}}"><label class="badge badge-danger">Delete</label></a></td>
                    </tr>

                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>



        </div>
      </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>