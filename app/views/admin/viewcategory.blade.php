@extends ('admin.dashboard')
@section('page_heading','View Categories');
@section('content')
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Category Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach($listcategories as $categories)
        <tr>
            <td>{{$categories->id}}</td>
            <td>{{ucwords($categories->category_name)}}</td>
            <td>{{$categories->category_slug}}</td>
            <td>            
                <a href="{{URL::to('/')}}/admin/edit-category/{{$categories->id}}" class="btn btn-success btn-circle" style="padding-top: 8px;"><i class="fa fa-edit"></i></a>            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@stop