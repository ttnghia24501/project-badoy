@extends('backend.components.layout')
@section('head-title','Check')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <p class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                         <img src="{{asset('upload/'.$product->__get('product_avatar'))}}" alt=""  style=" width:100%;height:100%;">
                </p>
                <p class="col-lg-8 col-md-8 col-sm-6 col-xs-12" style="width: 100%" >
                    <p><b>ID:</b> {{$product->__get('id')}} </p><br/>
                    <p><b>Tên sản phẩm: </b> {{$product->__get('product_name')}} </p><br/>
                    <p><b>Mô tả: </b>{{$product->__get('product_description')}}</p><br/>
                    <p><b>Giá: </b>{{$product->__get('price')}}</p><br/>
                    <p><b>Khuyến mãi(%): </b>{{$product->__get('sale_price')}}</p><br/>
                    <p><b>Ưu tiên: </b>{{$product->__get('new')}}</p><br/>
                    <p><b>Trạng thái: </b>{{$product->__get('status')}}</p><br/>
                    <p><b>Thành phần: </b>{{$product->__get('ingredient')}}</p><br/>
                    <p><b>Created at: </b>{{$product->__get('created_at')}}</p><br/>
                    <p><b>Updated at: </b>{{$product->__get('updated_at')}}</p><br/>

                </p>
            </div>
        </div>
    </div>

@endsection
