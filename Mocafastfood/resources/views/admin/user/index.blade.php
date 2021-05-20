
@extends('layouts.admin')

@section('title')
  <title>User Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'Người dùng/', 'key'=>'danh sách'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @can('user-add')
              <a href="{{ route('users.create') }}" class="btn btn-success float-sm-right m-2">Thêm</a>
            @endcan  
            
          </div>
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                @php
                  $stt = 1
                @endphp
                @foreach ($users as $user)
                  <tr>
                    <th scope="row">{{$stt++}}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->telnumber }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @can('user-edit')
                          <a href="{{ route('users.edit', ['id'=> $user->id]) }}" class="btn btn-default">Sửa</a>
                      @endcan
                      @can('user-delete')
                         <a href=""  class="btn btn-danger action_delete" data-url = "{{ route('users.delete', ['id'=> $user->id]) }}">Xóa</a>
                      @endcan
                      
                     
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>        
          <div class="col-md-12">
             {{ $users -> links() }}
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
