@extends('layouts.home')

@section('title')
<title>Product Detail</title>
@endsection

@section('css')

<link href="{{ asset('homepage/Assets/css/products.css')}}" rel="stylesheet" />

<link href="{{ asset('homepage/Assets/css/products.css')}}" rel="stylesheet" />
@endsection

@section('content')
<!-- breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb breadcrumb1 animated wow " data-wow-delay=".5s">
      <li><a href="{{ route('Mocafastfood.index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
      <li class="active"><a href="{{ route('Mocafastfood.products', ['id'=>  optional($product->category) ->id ]) }}">{{ optional($product->category) ->name }}</a></li>
      <li class="active">{{ $product->name }}</li>
    </ol>
  </div>
</div>
<!-- //breadcrumbs -->
<!-- single -->
<div class="single">
  <div class="container">
    <div class="col-md-12 single-right">
      <div class="col-md-5 single-right-left animated  " data-wow-delay=".5s">
        <div class="flexslider">
          <ul class="slides">
            <li data-thumb="{{$product->feature_image_path}}">
              <div class="thumb-image"> <img src="{{$product->feature_image_path}}" data-imagezoom="true" class="img-responsive"> </div>
            </li>
            @foreach ($product->productImages as $productImageItem)
            <li data-thumb="{{$productImageItem->image_path}}">
              <div class="thumb-image"> <img src="{{$productImageItem->image_path}}" data-imagezoom="true" class="img-responsive"> </div>
            </li>
            @endforeach

          </ul>
        </div>
        <!-- flixslider -->
        <script defer src="{{ asset('homepage/Assets/js/jquery.flexslider.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('homepage/Assets/css/flexslider.css')}}" type="text/css" media="screen" />
        <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                          $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                          });
                        });
                      </script>
                      <!-- flixslider -->
                    </div>
                    <div class="col-md-7 single-right-left simpleCart_shelfItem animated wow " data-wow-delay=".5s">
                      <h3>{{$product->name}}</h3>
                      
                      <div class="description">
                        <h5>Tags:
                          @foreach ($product->tags as $tagItem)
                          <a href="{{ route('Mocafastfood.getProductsbyTag', ['id'=> $tagItem->id] ) }}" style="background-color:#EFA52C;color: white;border-radius: 5px;margin: .1em;padding: .2em;">  {{$tagItem->name}}</a>
                          @endforeach
                        </h5>
                      </div>

                      <div class="color-quality">
                        <div class="color-quality-left">
                          <h5>Đơn giá : </h5>
                          <h4><span class="item_price">{{number_format($product->price)}}</span>&nbsp đ</h4>
                        </div>
                        <div class="color-quality-right" style="padding-top: 0.1em">
                          <h5>Số lượng :</h5>
                          <input type="number" value="1" name="quantityPro" min="1" style="width: 20%">
                        </div>
                        <div class="clearfix"> </div>
                      </div>
                      <div class="description">
                        <h5>Phí ship: 17,000 đ</h5>
                        <p>*Note: Chỉ ship khu vực gia lộc</p>
                      </div>
{{--                       <div class="occasional">
                        <h5>Tổng tiền :</h5>
                        <h4><span class="item_price">{{number_format($product->price+17000)}}</span>&nbsp đ</h4>
                      </div> --}}
                      <div class="occasion-cart">
                        <?php
                        $user = Auth::user();
                        if($user != NULL){ 
                         ?>
                         <a class="item_add add_to_cart"
                         href="#"
                         data-url = "{{ route('Mocafastfood.addToCart', ['id'=> $product->id] ) }}"
                         >add to cart </a>
                         <?php
                       }else{
                         ?>
                         <a class="item_add"
                         {{-- href="{{ route('Mocafastfood.productdetail', ['id'=> $product->id]) }}" --}}
                         href="/" 
                         >
                       add to cart </a>
                       <?php 
                     }
                     ?>
                   </div>
                   <div class="social">
                    <div class="social-left">
                      <h5>Share on:</h5>
                    </div>
                    <div class="social-right">
                      <strong>
                        <a href=""><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>&nbsp&nbsp
                        <a href=""><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>&nbsp&nbsp
                        <a href=""><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                      </strong>

                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </div>
                <div class="clearfix"> </div><br>
                <div class="bootstrap-tab animated wow " data-wow-delay=".5s">
                  <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                      <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(2)</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                        <h5>{{$product->name}}</h5>
                        <p>{{$product->content}}</p>
                      </div>
                      <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                        <div class="bootstrap-tab-text-grids">
                          <div class="bootstrap-tab-text-grid">
                            <div class="bootstrap-tab-text-grid-left">
                              <img src="images/4.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="bootstrap-tab-text-grid-right">
                              <ul>
                                <li><a href="#">Admin</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
                              </ul>
                              <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p>
                            </div>
                            <div class="clearfix"> </div>
                          </div>
                          <div class="bootstrap-tab-text-grid">
                            <div class="bootstrap-tab-text-grid-left">
                              <img src="images/5.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="bootstrap-tab-text-grid-right">
                              <ul>
                                <li><a href="#">Admin</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
                              </ul>
                              <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p>
                            </div>
                            <div class="clearfix"> </div>
                          </div>
                          <div class="add-review">
                            <h4>add a review</h4>
                            <form>
                              <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                              <input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                              <input type="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
                              <textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                              <input type="submit" value="Send">
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="clearfix"> </div>
              </div>
            </div>
            <!-- //single -->
            <!-- single-related-products -->
            <br><br><br>
            <div class="single-related-products">
              <div class="container">
                <h3 class="animated wow " data-wow-delay=".5s">Related Products</h3>

                <div class="new-collections-grids">
                  <div class="row">
                    <div class="col-md-12">
                     <?php

                     if(count($relatedProducts) <= 4){ 
                       ?>
                       @foreach ($relatedProducts as $relatedProduct)
                       <div class="col-md-3 products-right-grids-bottom-grid">
                        <div class="new-collections-grid1 products-right-grid1 animated wow " data-wow-delay=".5s">
                          <div class="new-collections-grid1-image">
                            <a href="single.html" class="product-image"><img src="{{$relatedProduct->feature_image_path}}" alt=" " class="img-responsive" style="height: 260px"></a>
                            <div class="new-collections-grid1-image-pos products-right-grids-pos">
                              <a href="{{ route('Mocafastfood.productdetail', ['id'=> $relatedProduct->id]) }}">Quick View</a>
                            </div>
                          </div>
                          <h4><a href="{{ route('Mocafastfood.productdetail', ['id'=> $relatedProduct->id]) }}">{{$relatedProduct->name}}</a></h4>
                          <p>--------</p>
                          <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                            <p>
                              <span class="item_price">{{ number_format($relatedProduct->price) }} đ</span>

                              <?php
                              $user = Auth::user();
                              if($user != NULL){
                               ?>
                               <a class="item_add add_to_cart"
                               href="#"
                               data-url = "{{ route('Mocafastfood.addToCart', ['id'=> $relatedProduct->id] ) }}"
                               >add to cart </a>
                               <?php
                             }else{
                               ?>
                               <a class="item_add"
                               {{-- href="{{ route('Mocafastfood.productdetail', ['id'=> $product->id]) }}" --}}
                               href="/" 
                               >
                             add to cart </a>
                             <?php 
                           }
                           ?>


                            </p>
                          </div>
                        </div>
                      </div>
                     @endforeach
                     <?php
                   }else{
                     ?>
                     @for ($i = 0; $i <4 ; $i++)
                     <div class="col-md-3 products-right-grids-bottom-grid">
                      <div class="new-collections-grid1 products-right-grid1 animated wow " data-wow-delay=".5s">
                        <div class="new-collections-grid1-image">
                          <a href="single.html" class="product-image"><img src="{{$relatedProducts[$i]->feature_image_path}}" alt=" " class="img-responsive" style="height: 260px"></a>
                          <div class="new-collections-grid1-image-pos products-right-grids-pos">
                            <a href="{{ route('Mocafastfood.productdetail', ['id'=> $$relatedProducts[$i]->id]) }}">Quick View</a>
                          </div>

                        </div>
                        <h4><a href="{{ route('Mocafastfood.productdetail', ['id'=> $$relatedProducts[$i]->id]) }}">{{$$relatedProducts[$i]->name}}</a></h4>
                        <p>--------</p>
                        <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                          <p>
                            <span class="item_price">{{ number_format($$relatedProducts[$i]->price) }} đ</span>

                            <?php
                            $user = Auth::user();
                            if($user != NULL){
                             ?>
                             <a class="item_add add_to_cart"
                             href="#"
                             data-url = "{{ route('Mocafastfood.addToCart', ['id'=> $$relatedProducts[$i]->id] ) }}"
                             >add to cart </a>
                             <?php
                           }else{
                             ?>
                             <a class="item_add"
                             {{-- href="{{ route('Mocafastfood.productdetail', ['id'=> $product->id]) }}" --}}
                             href="/" 
                             >
                           add to cart </a>
                           <?php 
                         }
                         ?>


                       </p>
                     </div>
                     @endfor
                     <?php 
                   }
                   ?>

                 </div>
               </div>
               
               <div class="clearfix"> </div>
             </div>
           </div>
         </div>
         <!-- //single-related-products -->


         @endsection

         @section('js') 
         <script src="{{ asset('homepage/Assets/js/jquery.min.js')}}"></script>
         <script type="text/javascript" src="{{ asset('homepage/Assets/js/bootstrap-3.1.1.min.js')}}"></script>
         <script src="{{ asset('homepage/Assets/js/imagezoom.js')}}"></script>
         <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
         <script type="text/javascript" src="{{ asset('vendors/cart/add_to_cart.js')}}"></script>
         @endsection


