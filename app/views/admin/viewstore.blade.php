@extends ('admin.dashboard')
@section('page_heading','View Stores');
@section('content')
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Store Id</th>
            <th>Store Name</th>
            <th>Slug</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach($liststores as $stores)
        <tr>
            <td>{{$stores->id}}</td>
            <td>{{ucwords($stores->store_name)}}</td>
            <td>{{$stores->store_slug}}</td>
            <td>
                <a href="{{URL::to('/')}}/admin/edit-store/{{$stores->id}}" class="btn btn-success btn-circle" style="padding-top: 8px;"><i class="fa fa-edit"></i></a>            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@stop