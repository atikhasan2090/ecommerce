      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$product->id)}}" class="option1">
                           Product Details
                           </a>
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
                     <div class="img-box" style="width:100%; height:100%;">
                        <img style="width: 100%;height: 100%" src="product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->title}}
                        </h5>
                        @if($product->descount_price!=null)
                        <h6 style="color:#002c3e;">
                           Discount Price
                           <br>
                           ${{$product->descount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color: #f7444e;">
                           Price
                           <br>
                           ${{$product->price}}
                        </h6>
                        @else
                        <h6 style="color:#002c3e;">
                           Price
                           <br>
                           ${{$product->price}}
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}
            
         </div>
      </section>