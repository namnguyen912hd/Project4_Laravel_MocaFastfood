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

                            <li class="active"><a data-hover="Home" href="{{ route('Mocafastfood.index') }}">Home</a></li>
                            <li><a data-hover="About" href="/Moca/Index" class="scroll">About</a></li>
                            <li><a data-hover="Gallery" href="{{ route('Mocafastfood.products', ['id'=> 1 ]) }}" >Gallery</a></li>
                            <li><a data-hover="Contact" href="/Moca/Index" class="scroll">Contact</a></li>
                            
                            <?php
                            $user = Auth::user();
                            if($user != NULL){ 
                               ?>
                               <li><a data-hover="Cart" href="{{ route('Mocafastfood.showCart') }}">Cart</a></li>
                               <li><a data-hover="Order" href="#">Order</a></li>
                               <li><a data-hover="Account" href="{{ route('Mocafastfood.Account') }}" >Account</a></li>
                               <?php
                           }else{
                               ?>
                               <li><a data-hover="LogIn" href="{{ route('Mocafastfood.LogIn') }}" >LogIn</a></li>
                               <li><a data-hover="SignUp" href="{{ route('Mocafastfood.SignUp') }}" >SignUp</a></li>
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



