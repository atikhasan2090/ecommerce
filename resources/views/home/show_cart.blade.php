<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/logo.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>


         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->


             @if(session()->has('message'))

            <div class="alert alert-success container">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{session()->get('message')}}
            </div>

            @endif
         
         	<div class="container my-5">
     			<div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Product Title</th>
                        <th>Product quantity</th>
                        <th>image</th>
                        <th>price</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $total_price = 0 ?>
                    	@foreach($carts as $cart)
                      <tr>
                        <td>{{$cart->products_title}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td><img src="/product/{{$cart->image}}" style="width: 100px;"></td>
                        <td>{{$cart->price}}</td>
                        <td><a onclick="return confirm('are you sure want to delete {{$cart->products_title}} form cart ?')" class="btn btn-danger" href="{{url('/remove_cart',$cart->id)}}">remove</a></td>
                      </tr>
                      <?php $total_price += $cart->price ?>
                      @endforeach
                      <tr>
                        <td></td>
                        <td></td>
                        <th>Total</th>
                        <th>{{$total_price}}</th>
                        <td></td>
                      </tr>
                    </tbody>
                   
                  </table>


                  <hr>

                  @if(count($carts)>0)
                  <div>
                    <h1 style="font-size: 18px; font-weight: bold; margin-bottom: 10px; margin-top: 10px;">Proceed to checkout</h1>

                    <a class="btn btn-primary" href="{{url('cash_order')}}">Cash on delivery</a>
                    <a class="btn btn-primary" href="">Pay with Bank </a>
                  </div>
                  @endif
                </div>
			</div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>