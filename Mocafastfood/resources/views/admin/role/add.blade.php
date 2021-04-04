
@extends('layouts.admin')

@section('title')
<title>Add role</title>
@endsection

@section('css')

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partial.admin.content-header', ['name' => 'role', 'key'=>'Add'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
          <form action="{{ route('roles.store') }}" method="post">
            <div class="col-md-12">
              @csrf
              <div class="form-group">
                <label>Tên menu:</label>
                <input type="text" name="name" class="form-control" placeholder="nhập tên role" value="{{old('name')}}">
              </div>

              <div class="form-group">
                <label>Mô tả:</label>
                <textarea name="display_name" class="form-control" >{{old('display_name')}}</textarea>           
              </div>
            </div>

            <div class="col-md-12" >
              <div class="row">
                <div class="col-md-12">
                  <label>
                    <input type="checkbox" class="checkAll">
                    Check All
                  </label>
                </div>
                @foreach ($permissionsParent as $permissionsItem)
                  <div class="card border-primary col-md-12" style="padding: 0">
                    <div class="card-header" style="background-color:#007bff;width: 100%; color: #fff">
                      <label>
                        <input type="checkbox" class="checkbox_wrapper" value="">
                      </label>
                      {{$permissionsItem->name}}
                    </div>
                    <div class="row">
                      @foreach ($permissionsItem->permissionsChildren as $permissionChildrenItem)
                        <div class="card-body text-primary md-3 col-md-3" >
                          <h5 class="card-title">
                            <label>
                              <input type="checkbox" class="checkbox_children" name="permissionID[]" value="{{$permissionChildrenItem->id}}">
                            </label>
                            {{$permissionChildrenItem->name}}
                          </h5>
                        </div>
                      @endforeach
                    </div>  
                  </div>
                @endforeach
              </div>           
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>    
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
  <script type="text/javascript" src="{{ asset('vendors/role/add.js') }}"></script>
@endsection
