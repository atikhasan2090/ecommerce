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
      <base href="/public">
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style type="text/css">
         .product-description-container {
  display: flex;
  align-items: center;
  justify-content: center;
}

.product-image {
  width: 200px;
  height: 200px;
  margin-right: 20px;
}

.product-info {
  text-align: left;
}

.product-title {
  font-size: 36px;
  margin-bottom: 10px;
}

.product-price {
  font-size: 24px;
  color: #f00;
  margin-bottom: 20px;
}

.product-brand {
  font-size: 18px;
  margin-bottom: 20px;
}

.product-description {
  font-size: 18px;
  margin-bottom: 20px;
}

.add-to-cart-btn {
  padding: 10px 20px;
  background-color: #0f0;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}


      </style>
   </head>
   <body>
      <div class="">

         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         


      <div class="container" style="margin-top:50px;">
         <div class="product-description-container">
           <img class="product-image" src="product/{{$product->image}}" alt="Product Image">
           <div class="product-info">
             <h2 class="product-title">{{$product->title}}</h2>
             @if($product->descount_price!=null)
                        <h6 style="color:#002c3e;">
                           Discount Price
                           ${{$product->descount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color: #f7444e;">
                           Price
                           ${{$product->price}}
                        </h6>
                        @else
                        <h6 style="color:#002c3e;">
                           Price
                           ${{$product->price}}
                        </h6>
                        @endif
             <p class="product-brand"><b>Category: {{$product->category}}</b></p>
             <p class="product-description">{{$product->description}}</p>
             <form class="mt-3" method="post" action="{{url('add_cart',$product->id)}}">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input  type="number" value="1" name="quantity" min="1" max="{{$product->quantity}}">
                                 </div>
                                 <div class="col-md-4">
                                    <input class="btn btn-primary" type="submit" value="add to cart">
                                 </div>
                              </div>
                           </form>
           </div>
         </div>
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