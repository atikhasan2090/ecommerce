<!DOCTYPE html>
<html lang="en">
  <head>
  	<base href="/public">
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
      input{
      	background-color: transparent !important;
      }
      input:focus{
      	color: #2563eb !important;
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

        	<div class="div_center">
            	<h2 class="h2_font">Update Product</h2>
            </div>

            @if(session()->has('message'))

              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
              </div>

            @endif


            <div class="row">
            	<div class="col-md-10 offset-1 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{url('update_product_submission',$product->id)}}" method="POST" enctype="multipart/form-data">

                    	@csrf

                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Product Title :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="exampleInputUsername2" name="title" value="{{$product->title}}" placeholder="Write a title" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Product Description :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="exampleInputUsername2" name="description" value="{{$product->description}}" placeholder="Write a description" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Product Price :</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="exampleInputMobile" placeholder="product price" value="{{$product->price}}" name="price" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Discount Price :</label>
                        <div class="col-sm-10">
                          <input type="number" min="0" class="form-control" id="exampleInputMobile" placeholder="Discount price" value="{{$product->descount_price}}" name="dis_price">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Product Quantity :</label>
                        <div class="col-sm-10">
                          <input type="number" min="0" class="form-control" id="exampleInputMobile" placeholder="Quantity" value="{{$product->quantity}}" name="quantity" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Product Category :</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="category" required>
                          	<option value="{{$product->category}}" selected>{{$product->category}}</option>

                          	@foreach($category as $cat)
	                          <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
	                         @endforeach

                        </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Current Product Image :</label>
                        <div class="col-sm-10">
                          <img src="product/{{$product->image}}" style="width: 100px; height:80px;">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Change Product Image :</label>
                        <div class="col-sm-10">
                          <input type="file" name="image">
                        </div>
                      </div>

                      <button type="submit" value="Add Product" class="btn btn-primary mr-2">Submit</button>

                    </form>
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