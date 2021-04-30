
@extends('layouts.admin')

@section('title')
  <title>Admin Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'setting', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            
              <a href="{{ route('settings.create') }}" class="btn btn-success float-sm-right m-2">Add</a>
                    
          </div>
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Config Key</th>
                  <th scope="col">Config Value</th>
                  <th scope="col">Action</th>
                 
                </tr>
              </thead>
              <tbody>

                @foreach ($settings as $setting)
                  <tr>
                    <th scope="row">{{ $setting->id }}</th>
                    <td>{{ $setting->config_key }}</td>
                     <td>{{ $setting->config_value }}</td>
                    <td>
                     
                          <a href="{{ route('settings.edit', ['id'=> $setting->id]) }}" class="btn btn-default">Edit</a>
                     
                     
                        {{-- <a href="{{ route('settings.delete', ['id'=> $setting->id]) }}" class="btn btn-danger">Delete</a> --}}
                        <a href="" class="btn btn-danger action_delete"
                            data-url = "{{ route('settings.delete', ['id'=> $setting->id]) }}"
                        >Delete</a>
                    
                      
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>        
          <div class="col-md-12">
             {{ $settings -> links() }}
          </div>
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
  <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('vendors/adminDelete.js') }}"></script>
  <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
@endsection

