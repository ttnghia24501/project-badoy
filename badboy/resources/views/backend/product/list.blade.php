@extends('backend.components.layout')
@section('head-title','Product')
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DANH SÁCH SẢN PHẨM
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a class=" waves-effect waves-block" href="{{route('newPro')}}">Thêm mới Sản Phẩm</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>

                @if(session('thong_bao'))
                    <div class="header">
                        <div class="alert alert-success">
                            {{session('thong_bao')}}
                        </div>
                    </div>
                @endif

                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Khuyến mãi(%)</th>
                            <th>Ưu tiên</th>
                            <th>Trạng thái</th>
                            <th>Thành phần</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $value)
                            <tr>
                                <td>{{$value->__get('id')}}</td>
                                <td>{{$value->__get('product_name')}}</td>
                                <td><img src="{{asset('upload/'.$value->__get('product_avatar'))}}" alt=""width="50px"></td>
                                <td>{{$value->__get('product_description')}}</td>
                                <td>{{$value->__get('price')}}</td>
                                <td>{{$value->__get('sale_price')}}</td>
                                <td>{{$value->__get('new')}}</td>
                                <td>{{$value->__get('status')}}</td>
                                <td>{{$value->__get('ingredient')}}</td>
                                <td>{{$value->__get('created_at')}}</td>
                                <td>{{$value->__get('updated_at')}}</td>
                                <td>
                                    <a href="{{url("admin/product/check/{$value->__get("id")}")}}" class="label bg-green">Check</a>
                                    <a href="{{url("admin/product/edit/{$value->__get("id")}")}}" class="label bg-blue">Edit</a>
                                    <a href="{{url("admin/product/delete/{$value->__get("id")}")}}" class="label bg-red">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $products ->links() !!}
            </div>
        </div>
    </div>
@endsection


