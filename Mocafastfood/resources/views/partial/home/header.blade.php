<div class="banner" id="home">
    <div class="header-bottom wow " data-wow-duration="1s" data-wow-delay=".3s">
        <div class="container">
            <div class="fixed-header">
                <!--logo-->
                <div class="logo">
                    <a href="{{ route('Mocafastfood.index') }}"><h1>M<span>ocafastfood</span></h1></a>
                    <p>Take and Eat</p>
                </div>
                <!--//logo-->
                <div class="top-menu">
                    <span class="menu"> </span>
                    <nav class="link-effect-4" id="link-effect-4">  
                        <ul>

                            <li class="active"><a  href="{{ route('Mocafastfood.index') }}">Trang chủ</a></li>
                            <li><a  href="{{ route('Mocafastfood.about') }}" >Liên hệ</a></li>
                            <li><a  href="{{ route('Mocafastfood.products', ['id'=> 3]) }}" >Sản phẩm</a></li>
                            
                            
                            <?php
                            $user = Auth::user();
                            if($user != NULL){ 
                               ?>
                               <li><a  href="{{ route('Mocafastfood.showCart') }}">Giỏ hàng</a></li>
                               <li><a  href="{{ route('Mocafastfood.orderStatus') }}">Đơn hàng</a></li>
                               <li><a  href="{{ route('Mocafastfood.Account') }}" >Tài khoản</a></li>
                               <?php
                           }else{
                               ?>
                               <li><a  href="{{ route('Mocafastfood.LogIn') }}" >Đăng nhập</a></li>
                               <li><a  href="{{ route('Mocafastfood.SignUp') }}" >Đăng kí</a></li>
                               <?php 
                           }
                           ?>

                       </ul>
                   </nav>
               </div>
               <!-- script-for-menu -->
               <script>
                $("span.menu").click(function () {
                    $(".top-menu ul").slideToggle("slow", function () {
                    });
                });
            </script>
            <!-- script-for-menu -->

            <div class="clearfix"></div>
            <script>
                $(document).ready(function () {
                    var navoffeset = $(".header-bottom").offset().top;
                    $(window).scroll(function () {
                        var scrollpos = $(window).scrollTop();
                        if (scrollpos >= navoffeset) {
                            $(".header-bottom").addClass("fixed");
                        } else {
                            $(".header-bottom").removeClass("fixed");
                        }
                    });

                });
            </script>
        </div>
    </div>
</div>

</div>



