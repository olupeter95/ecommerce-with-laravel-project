@extends('admin.admin_master')
@section('content')
<section class="content">
<div class="row">
             <div class="col-md-12">

            <div class="box">
             <div class="box-header with-border">
              <h3 class="box-title">Users List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th> 
                            <th>Phone</th> 
                            <th>Status</th> 
                            <th >Actions</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td><img src="{{ (!empty($user->profile_photo_path)) ? 
                                url('storage/upload/user_image/'.$user->profile_photo_path) : 
                                url('storage/upload/no_image.jpg')  }}" alt="no avatar" style="width:60px;height:60px"></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->onlineUser())
                                <span class="badge badge-pill badge-success">Active Now</span>
                                @else
                                <span class="badge badge-pill badge-danger">
                                    {{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}
                                </span>
                                @endif
                            </td>
                            <td width="30%">
                            <a href="" title="Edit Data" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="" id="delete" title="Delete Data" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
         <!-- /.box -->
    </div><!--- end col --->
</div>
</section>
@endsection
