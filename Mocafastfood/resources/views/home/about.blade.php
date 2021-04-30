@extends('layouts.home')

@section('title')
<title>Account</title>
@endsection

@section('css')

@endsection

@section('content')

<div class="section-contact" id="contact" style="padding: 0">
  <div class="container">
    <div class="contact-main">
     
      <div class="col-md-12 contact-in wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
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

  </div>
</div>

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

<div class="team-section" id="team">
  <div class="container">
    <h3 class="tittle">Location</h3>
    <div class="arrows-serve"><img src="{{asset('homepage/Assets/images/border.png')}}" alt="border"></div>
    <div class="box2">
      <div class="map wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".5s">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3727.917695765584!2d106.29552441437573!3d20.875367398374365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31359b5f990c2a5f%3A0xa043363a021bae80!2sHappy%20Coffee!5e0!3m2!1sen!2s!4v1604548290086!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>


@endsection

@section('js') 

@endsection