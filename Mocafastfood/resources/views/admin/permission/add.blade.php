
@extends('layouts.admin')

@section('title')
  <title>Admin Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'Permission', 'key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <form action="{{ route('permissions.store') }}" method="post">
              @csrf
              
              <div class="form-group">
                <label >Chọn module:</label>
                <select class="form-control" name="module_parent" >

                  <option>Chọn tên module</option>
                  @foreach (config('permissions.table_module') as $moduleItem)
                    <option value="{{$moduleItem }}" >{{$moduleItem }}</option>
                  @endforeach
                  
                </select>
              </div>

              <dic class="form">
                <div class="row">


                  @foreach (config('permissions.module_children') as $moduleChildrenItem)
                     <div class="col-md-3">
                        <label for="">
                          <input type="checkbox" value="{{$moduleChildrenItem}}" name="module_children[]">
                          {{$moduleChildrenItem}}
                        </label>
                      </div>
                  @endforeach
                 

           
                </div>
              </dic>
              
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


