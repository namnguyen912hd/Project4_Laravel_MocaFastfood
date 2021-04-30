
@extends('layouts.admin')

@section('title')
  <title>Admin Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'setting', 'key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <form action="{{ route('settings.update', ['id'=> $setting->id]) }}" method="post">
              @csrf
              <div class="form-group">
                <label>Config Key:</label>
                <input type="text" name="config_key" value="{{ $setting->config_key }}" class="form-control" placeholder="nhập config key"
                >
              </div>
              <div class="form-group">
                <label>Config Value:</label>
                <input type="text" name="config_value" value="{{ $setting->config_value }}" class="form-control" placeholder="nhập config key"
                >
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


