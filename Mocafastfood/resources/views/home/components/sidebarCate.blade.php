    <div class="col-md-4 products-left">
      <div class="categories  " data-wow-delay=".5s">
        <h3>Categories</h3>
        <ul class="cate">
          @foreach ($categories as $category)
          <li><a href="{{ route('Mocafastfood.products', ['id'=> $category->id]) }}">{{ $category->name }}</a> <span>(15)</span></li>
          @endforeach
        </ul>
      </div>
    </div>