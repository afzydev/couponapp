@extends ('admin.dashboard')
@section('page_heading','View Users');
@section('content')
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>User Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach($user as $users)
        <tr>
            <td>{{$users->id}}</td>
            <td>{{ucwords($users->name)}}</td>
            <td>{{$users->email}}</td>
            <td>{{ucwords($users->user_type)}}</td>
            <td>            
                <a href="{{URL::to('/')}}/admin/edit-user/{{$users->id}}" class="btn btn-success btn-circle" style="padding-top: 8px;"><i class="fa fa-edit"></i></a>            
            </td>
        </tr>
    @endforeach

        <tr>
            <td colspan="5">
                <?php if(count($user)!=0) { echo $user->links(); }  ?>
            </td>
        </tr>
    
    </tbody>
</table>
</div>
@stop