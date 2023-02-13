<!DOCTYPE html>
<html lang="en">
  <head>
  	@include('admin.css')
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


          	<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> Product Title </th>
                            <th> Description </th>
                            <th> Category </th>
                            <th> Quantity </th>
                            <th> Price </th>
                            <th> Discount Price </th>
                            <th> Product Image </th>
                            <th> delete </th>
                            <th> Edit </th>
                          </tr>
                        </thead>
                        <tbody>

                        	@foreach($product as $product)




                          <tr>
                            <td> {{$product->title}} </td>
                            <td> {{$product->description}} </td>
                            <td> {{$product->category}} </td>
                            <td> {{$product->quantity}} </td>
                            <td> {{$product->price}} </td>
                            <td> {{$product->descount_price}} </td>

                            <td> <img style="height:80px;width: 150px; border-radius: 0%" src="product/{{$product->image}}"> </td>

                            <td> <a onclick="return confirm('do you sure want to delete {{$product->title}}')" href="{{url('/delete_product',$product->id)}}"><span class="badge badge-danger">Delete</span></a> </td>

                            <td> <a href="{{url('/update_product',$product->id)}}"><span class="badge badge-danger">Edit</span></a> </td>
                          </tr>


                          @endforeach

                        </tbody>
                      </table>
                    </div>
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