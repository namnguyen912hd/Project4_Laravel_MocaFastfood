@extends('layouts.home')

@section('title')
<title>Mocafastfood for everyone</title>
@endsection
@section('content')

<div class="banner-slider">
  <div class="callbacks_container">
    <ul class="rslides" id="slider4">
      <li>
        <div class="banner-info">
          <h3 class="wow slideInUp" data-wow-duration="1s" data-wow-delay=".3s">Welcome to</h3>
          <p class="wow slideInDown" data-wow-duration="1s" data-wow-delay=".3s">MOCAFASTFOOD</p>
          <div class="arrows wow slideInDown" data-wow-duration="1s" data-wow-delay=".2s"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border" /></div>
          <span class="wow slideInUp" data-wow-duration="1s" data-wow-delay=".3s">READY TO BE OPENED</span>
        </div>
      </li>
      <li>
        <div class="banner-info">
          <h3 class="wow slideInUp" data-wow-duration="1s" data-wow-delay=".3s">Fastfood</h3>
          <p class="wow slideInDown" data-wow-duration="1s" data-wow-delay=".3s">cho mọi người</p>
          <div class="arrows wow slideInDown" data-wow-duration="1s" data-wow-delay=".2s"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border" /></div>
          <span class="wow slideInUp" data-wow-duration="1s" data-wow-delay=".3s">READY TO BE OPENED</span>
        </div>
      </li>
      <li>
        <div class="banner-info">
          <h3 class="wow slideInUp" data-wow-duration="1s" data-wow-delay=".3s">Ngon miệng</h3>
          <p class="wow slideInDown" data-wow-duration="1s" data-wow-delay=".3s">giá cả hợp lí</p>
          <div class="arrows wow slideInDown" data-wow-duration="1s" data-wow-delay=".2s"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border" /></div>
          <span class="wow slideInUpslideInLeft" data-wow-duration="1s" data-wow-delay=".3s">READY TO BE OPENED</span>
        </div>
      </li>
    </ul>
  </div>
  <!--banner Slider starts Here-->
  <script src="{{asset('homepage/Assets/js/responsiveslides.min.js')}}"></script>
  <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider4").responsiveSlides({
              auto: true,
              pager: true,
              nav: false,
              speed: 500,
              namespace: "callbacks",
              before: function () {
                $('.events').append("<li>before event fired.</li>");
              },
              after: function () {
                $('.events').append("<li>after event fired.</li>");
              }
            });

          });
        </script>
        <!--banner Slider starts Here-->
      </div>

      <div class="down"><a class="scroll" href="#services"><img src="{{asset('homepage/Assets/images/down.png')}}" alt="" style="margin-top: -3em;"></a></div>

      <!--/products-->
      <div class="about" id="about">
        <div class="container">
          <!--/about-section-->
          <div class="about-section">
            <div class="col-md-7 ab-left">
              <div class="grid">
                <div class="h-f wow slideInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                  <figure class="effect-jazz">
                    <img src="{{asset('homepage/Assets/images/s1.jpg')}}" alt="img25" />
                    <figcaption>
                      <h4>MOCA <span>FastFood</span></h4>
                      <p>For everyone</p>

                    </figcaption>
                  </figure>

                </div>
                <div class="h-f wow slideInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                  <figure class="effect-jazz">
                    <img src="{{asset('homepage/Assets/images/s2.jpg')}}" alt="img25" />
                    <figcaption>
                      <h4>MOCA <span>FastFood</span></h4>
                      <p>For everyone</p>

                    </figcaption>
                  </figure>

                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
            <div class="col-md-5 ab-text">
              <h3 class="tittle wow slideInDown" data-wow-duration="1s" data-wow-delay=".3s">Event</h3>
              <div class="arrows-two wow slideInDown" data-wow-duration="1s" data-wow-delay=".5s"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border" /></div>
              <p class="wow slideInUp" data-wow-duration="1s" data-wow-delay=".3s">Ngay bây giờ, MocaFastfood đang diễn diễn ra các chương trình khuyến mại hấp dẫn với giá cả ưu đãi và các món ăn được chế biến công phu, ngon miệng từ đầu bếp chúng tôi...</p>
              <div class="start wow flipInX" data-wow-duration="1s" data-wow-delay=".3s">
                <a href="#" class="hvr-bounce-to-bottom">Read more</a>
              </div>
            </div>
            <div class="clearfix"> </div>
          </div>
          <!--//about-section-->
          <!--/about-section2-->
          <div class="about-section">
            <div class="col-md-5 ab-text two">
              <h3 class="tittle wow slideInDown" data-wow-duration="1s" data-wow-delay=".3s">About</h3>
              <div class="arrows-two wow slideInDown" data-wow-duration="1s" data-wow-delay=".5s"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border" /></div>
              <p class="wow slideInUp" data-wow-duration="1s" data-wow-delay=".3s">Cửa hàng MocaFastfood là một trong những cửa hàng bán đồ ăn nhanh có quy mô lớn nhất tại tỉnh Hải Dương với các món ăn ngon, chất lượng phục vụ tốt, món ăn đảm bảo chất lượng an toàn vệ sinh, an toàn thực phẩm </p>
              <div class="start wow flipInX" data-wow-duration="1s" data-wow-delay=".3s">
                <a href="#" class="hvr-bounce-to-bottom">Read more</a>
              </div>

            </div>
            <div class="col-md-7 ab-left">
              <div class="grid">
                <div class="h-f  wow slideInRight" data-wow-duration="1s" data-wow-delay=".2s">
                  <figure class="effect-jazz">
                    <img src="{{asset('homepage/Assets/images/s4.jpg')}}" alt="img25" />
                    <figcaption>
                      <h4>MOCA <span>FastFood</span></h4>
                      <p>For everyone</p>
                    </figcaption>
                  </figure>

                </div>
                <div class="h-f  wow slideInRight" data-wow-duration="1s" data-wow-delay=".2s">
                  <figure class="effect-jazz">
                    <img src="{{asset('homepage/Assets/images/s3.jpg')}}" alt="img25" />
                    <figcaption>
                      <h4>MOCA <span>FastFood</span></h4>
                      <p>For everyone</p>
                    </figcaption>
                  </figure>

                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
            <div class="clearfix"> </div>
          </div>
          <!--//about-section2-->
        </div>
      </div>
      <!--//products-->
      <!-- service-type-grid -->
      <div class="service" id="services">
        <div class="container">
          <h3 class="tittle">Our Services</h3>
          <div class="arrows-serve"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border"></div>
          <div class="inst-grids">
            <div class="col-md-3 services-gd text-center wow slideInLeft" data-wow-duration="1s" data-wow-delay=".3s">
              <div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
                <a href="#" class="hi-icon"><img src="{{asset('homepage/Assets/images/serve1.png')}}" alt=" " /></a>
              </div>
              <h4>Menu</h4>
              <p>Menu MocaFastfood với sự đa dạng món ăn </p>
            </div>
            <div class="col-md-3 services-gd text-center wow slideInDown" data-wow-duration="1s" data-wow-delay=".2s">
              <div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
                <a href="#" class="hi-icon"><img src="{{asset('homepage/Assets/images/serve2.png')}}" alt=" " /></a>
              </div>
              <h4>Đặt bàn</h4>
              <p>Bây giờ, mọi người có thể đặt bàn trước trên website của cửa hàng</p>
            </div>
            <div class="col-md-3 services-gd text-center wow slideInUp" data-wow-duration="1s" data-wow-delay=".2s">
              <div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
                <a href="#" class="hi-icon"><img src="{{asset('homepage/Assets/images/serve3.png')}}" alt=" " /></a>
              </div>
              <h4>Công thức nấu ăn</h4>
              <p>Mọi người có thể tìm hiểu các công thức nấu ăn ngon </p>
            </div>
            <div class="col-md-3 services-gd text-center wow slideInRight" data-wow-duration="1s" data-wow-delay=".3s">
              <div class="hi-icon-wrap hi-icon-effect-9 hi-icon-effect-9a">
                <a href="#" class="hi-icon"><img src="{{asset('homepage/Assets/images/serve4.png')}}" alt=" " /></a>
              </div>
              <h4>Tin tức cửa hàng</h4>
              <p>Hiểu thêm về cửa hàng</p>
            </div>
            <div class="clearfix"> </div>
          </div>

        </div>
      </div>
      <!-- //service-type-grid -->


      <!--start-services-->
      <div class="team-section" id="team">
        <div class="container">
          <h3 class="tittle">Our Chefs</h3>
          <div class="arrows-serve"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border"></div>
          <div class="box2">
            <div class="col-md-3 s-1 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".3s">
              <a href="#">
                <div class="view view-fifth">
                  <img src="{{asset('homepage/Assets/images/chef1.jpg')}}" alt="chef">
                  <div class="mask">
                    <h4>Đàm Văn Tiến</h4>
                    <p>Đầu bếp chính</p>
                    <p class="p2">Top 5 Master Cheft Việt Nam 2019</p>
                  </div>

                </div>
              </a>
              <h3>Đàm Tiến</h3>
            </div>
            <div class="col-md-3 s-2 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".3s">
              <a href="#">
                <div class="view view-fifth">
                  <img src="{{asset('homepage/Assets/images/chef2.jpg')}}" alt="chef">
                  <div class="mask">
                    <h4>Bùi Ngọc Anh</h4>
                    <p>Đầu bếp phụ</p>
                    <p class="p2">2 năm kinh nghiệp làm đầu bếp tại Nhật Bản</p>
                  </div>

                </div>
              </a>
              <h3>Ngọc Anh</h3>
            </div>
            <div class="col-md-3 s-3 wow slideInRight" data-wow-duration="1s" data-wow-delay=".3s">
              <a href="#">
                <div class="view view-fifth">
                  <img src="{{asset('homepage/Assets/images/chef3.jpg')}}" alt="chef">
                  <div class="mask">
                    <h4>Vũ Quý Thơi</h4>
                    <p>Đầu bếp phụ</p>
                    <p class="p2">Có kinh nghiệm làm việc tại Nhà hàng Maison Steak- Hà Nội</p>
                  </div>

                </div>
              </a>
              <h3>Thơi Vũ</h3>
            </div>
            <div class="col-md-3 s-4 wow slideInRight" data-wow-duration="1s" data-wow-delay=".3s">
              <a href="#">
                <div class="view view-fifth">
                  <img src="{{asset('homepage/Assets/images/chef4.jpg')}}" alt="chef">
                  <div class="mask">
                    <h4>Lê Thị Thùy Dương</h4>
                    <p>Đầu bếp phụ</p>
                    <p class="p2">Có kinh nghiệm làm việc tại Nhà hàng Tunglok Heen - Hà Nội </p>
                  </div>

                </div>
              </a>
              <h3>Thùy Dương</h3>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!--end-team-->
      <!--start-banner-bottom-->
      <!--/reviews-->
      <div id="review" class="reviews">
        <div class="col-md-6 test-left-img">
        </div>
        <div class="col-md-6 test-monials">
          <h3 class="tittle">Customer Feedback</h3>
          <div class="arrows-serve test"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border"></div>
          <!--//screen-gallery-->
          <div class="sreen-gallery-cursual">
            <!-- required-js-files-->
            <link href="{{asset('homepage/Assets/css/owl.carousel.css')}}" rel="stylesheet">
            <script src="{{asset('homepage/Assets/js/owl.carousel.js')}}"></script>
            <script>
              $(document).ready(function () {
                $("#owl-demo").owlCarousel({
                  items: 1,
                  lazyLoad: true,
                  autoPlay: true,
                  navigation: false,
                  navigationText: false,
                  pagination: true,
                });
              });
            </script>
            <!--//required-js-files-->

            <div id="owl-demo" class="owl-carousel">
              <div class="item-owl">
                <div class="test-review">
                  <p class="wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".4s"><img src="{{asset('homepage/Assets/images/left-quotes.png')}}" alt=""> Món ăn ngon miệng, giá cả hợp lí và chất lượng phục vụ tốt<img src="{{asset('homepage/Assets/images/right-quotes.png')}}" alt=""></p>
                  <img src="{{asset('homepage/Assets/images/t3.jpg')}}" class="img-responsive" alt="" />
                  <h5 class="wow bounceIn" data-wow-duration=".8s" data-wow-delay=".2s">Ngo Yen</h5>
                </div>
              </div>
              <div class="item-owl">
                <div class="test-review">
                  <p class="wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".4s"> <img src="{{asset('homepage/Assets/images/left-quotes.png')}}" alt="">Món ăn cửa hàng thực sự chất lượng và ngon. Cửa hàng có nhiều view đẹp và sang trọng ^^ <img src="{{asset('homepage/Assets/images/right-quotes.png')}}" alt=""></p>
                  <img src="{{asset('homepage/Assets/images/t2.jpg')}}" class="img-responsive" alt="" />
                  <h5 class="wow bounceIn" data-wow-duration=".8s" data-wow-delay=".2s">Duyen Do</h5>
                </div>
              </div>
              <div class="item-owl">
                <div class="test-review">
                  <p class="wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".4s"><img src="{{asset('homepage/Assets/images/left-quotes.png')}}" alt="">Món ăn ngon miệng, dịch vụ giao hàng của cừa hàng nhanh, chất lượng phục vụ tốt<img src="{{asset('homepage/Assets/images/right-quotes.png')}}" alt=""></p>
                  <img src="{{asset('homepage/Assets/images/t1.jpg')}}" class="img-responsive" alt="" />
                  <h5 class="wow bounceIn" data-wow-duration=".8s" data-wow-delay=".2s">Phuong Bui</h5>
                </div>
              </div>
            </div>
            <!--//screen-gallery-->
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
      <!--//reviews-->
      <!--reservation-->
      <div class="reservation" id="reservation">
        <div class="container">
          <div class="reservation-info">
            <h3 class="tittle reserve">
              Make a <br>
              Reservation
            </h3>

            <div class="arrows-reserve"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border"></div>
            <div class="book-reservation wow slideInUp" data-wow-duration="1s" data-wow-delay=".5s">
              <form>
                <div class="col-md-4 form-left">
                  <label><i class="glyphicon glyphicon-calendar"></i> Ngày :</label>
                  <input type="date">
                </div>
                <div class="col-md-4 form-left">
                  <label><i class="glyphicon glyphicon-user"></i> Số người :</label>
                  <select class="form-control">
                    <option>1 Person</option>
                    <option>2 People</option>
                    <option>3 People</option>
                    <option>4 People</option>
                    <option>5 People</option>
                    <option>More</option>
                  </select>
                </div>
                <div class="col-md-4 form-right">
                  <label><i class="glyphicon glyphicon-time"></i> Thời gian :</label>
                  <input type="time">
                </div>
                <div class="clearfix"> </div>
                <div class="make wow shake" data-wow-duration="1s" data-wow-delay=".5s">
                  <input type="submit" value="Make a Reservation">
                </div>
              </form>

            </div>
            <div class="clearfix"> </div>
          </div>
        </div>
      </div>
      <!--//reservation-->
      <!--Gallery-->

      <div class="gallery" id="gallery" >
        <div class="container"  ng-app="menuapp"  ng-controller="LoaiController" >
          <h3 class="tittle">Gallery</h3>
          <div class="arrows-serve"><img src="{{asset('homepage/Assets//images/border.png')}}" alt="border"></div>
          <div class="gallery-grids">      

            @foreach ($categories as $category)
              <div class="col-md-4 baner-top wow fadeInRight animated" data-wow-delay=".5s">
                <a href="{{ route('Mocafastfood.products', ['id'=> $category->id]) }}" >
                  <div class="gal-spin-effect vertical ">
                    <img src="{{asset('homepage/Assets//images/c4.jpg')}}" alt=" " />
                    <div class="gal-text-box">
                      <div class="info-gal-con">
                        <h4>{{ $category->name }}</h4>
                        <span class="separator"></span>
                        <p>click for details</p>
                        <span class="separator"></span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
            
            <div class="clearfix"> </div>
          </div>
        </div>
      </div>
      <script src="~/Scripts/Resource/AngularController/category.js"></script>
      <!-- //gallery -->
      <!--bottom-->
      <div class="bottom">
        <div class="container">
          <div class="bottom-top">
            <h3 class=" wow flipInX" data-wow-duration="1s" data-wow-delay=".3s">We Are Sharing</h3>
            <span>DELICIOUS Recipes</span>
            <p class="wow slideInDown" data-wow-duration="1s" data-wow-delay=".5s">Cửa hàng chúng tôi cung cấp cho khách hàng các công thức nấu ăn ngon miệng để mọi người có thể chế biến các món ăn theo ý thích của mình</p>
            <div class="start wow flipInX" data-wow-duration="1s" data-wow-delay=".3s">
              <a href="#" class="hvr-bounce-to-bottom">Read More</a>
            </div>
          </div>
        </div>
      </div>
      <!--/contact-->
      <div class="section-contact" id="contact">
        <div class="container">
          <div class="contact-main">
            <div class="col-md-6 contact-grid wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
              <h3 class="tittle wow bounceIn" data-wow-duration=".8s" data-wow-delay=".2s">Contact Us</h3>
              <div class="arrows-three"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border"></div>
              <p class="wel-text wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".4s">Ngay bây giờ, bạn có thể gửi các phản hồi hoặc đóng góp ý kiến về chất lượng món ăn, thái độ phục vụ, thời gian giao hàng,... của cửa hàng. Từ đó chúng tôi sẽ cải thiện và phục vụ khách hàng một cách tốt nhất.</p>
              <form id="filldetails">
                <div class="field name-box">
                  <input type="text" id="name" placeholder="Who Are You?" required="" />
                  <label for="name">Name</label>
                  <span class="ss-icon">check</span>
                </div>

                <div class="field email-box">
                  <input type="text" id="email" placeholder="example@email.com" required="" />
                  <label for="email">Email</label>
                  <span class="ss-icon">check</span>
                </div>

                <div class="field phonenum-box">
                  <input type="text" id="email" placeholder="Phone Number" required="" />
                  <label for="email">Phone</label>
                  <span class="ss-icon">check</span>
                </div>

                <div class="field msg-box">
                  <textarea id="msg" rows="4" placeholder="Your message goes here..." required="" /></textarea>
                  <label for="msg">Message</label>
                  <span class="ss-icon">check</span>
                </div>
                <div class="send wow shake" data-wow-duration="1s" data-wow-delay=".3s">
                  <input type="submit" value="Send">
                </div>

              </form>

            </div>
            <div class="col-md-6 contact-in wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
              <h4 class="info">Our Info </h4>
              <p class="para1">Cửa hàng MocaFastfood là một trong những cửa hàng bán đồ ăn nhanh có quy mô lớn nhất tại tỉnh Hải Dương với các món ăn ngon, chất lượng phục vụ tốt, món ăn đảm bảo chất lượng an toàn vệ sinh, an toàn thực phẩm </p>
              <div class="con-top">
                <h4>Info</h4>
                <ul>
                  <li>Cửa hàng MocaFastfood</li>
                  <li>Chủ quán: Bùi Ngọc Anh</li>
                  <li>Địa điểm: Gia Lộc-Hải Dương</li>
                  <li>Đầu bếp: Nguyễn Minh Hoàng</li>
                  <li>SDT:3698521475 </li>
                  <li>Thời gian: 7am to 11pm</li>
                  <li><a href="mailto:info@example.com">mocafastfood@gmail.com</a></li>
                </ul>
              </div>
              <div class="con-top two">
                <h4>Hỗ trợ khách hàng</h4>
                <ul>
                  <li>Hỗ trợ giao hàng</li>
                  <li>Thông tin chuyển khoản</li>
                  <li>Khuyễn mãi</li>
                  <li>Tin cửa hàng</li>
                  <li>Câu hỏi thường gặp </li>
                </ul>
              </div>
            </div>

            <div class="clearfix"> </div>
          </div>
          <!--map-->
          <div class="map wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".5s">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3727.917695765584!2d106.29552441437573!3d20.875367398374365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31359b5f990c2a5f%3A0xa043363a021bae80!2sHappy%20Coffee!5e0!3m2!1sen!2s!4v1604548290086!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
          <!--//map-->
        </div>
      </div>
      @endsection
