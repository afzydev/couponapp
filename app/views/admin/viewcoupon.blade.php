@extends ('admin.dashboard')
@section('page_heading','View Coupon');
@section('content')
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Coupon Id</th>
            <th>Coupon Name</th>
            <th>Coupon Code</th>
            <th>Category</th>
            <th>Store</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
    @foreach($listcoupons as $coupons)
        <tr>
            <td>{{$coupons->id}}</td>
            <td>{{ucwords($coupons->coupon_name)}}</td>
            <td>{{ucwords($coupons->coupon_code)}}</td>
            <td>{{$coupons->category->category_name}}</td>
            <td>{{$coupons->store->store_name}}</td>
            <td>
                <a href="{{URL::to('/')}}/admin/edit-coupon/{{$coupons->id}}" class="btn btn-success btn-circle" style="padding-top: 8px;"><i class="fa fa-edit"></i></a>            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@stop