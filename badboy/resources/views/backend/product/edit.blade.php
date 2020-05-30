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
                </div>

                @if(session('thong_bao'))
                    <div class="header">
                        <div class="alert alert-success">
                            {{session('thong_bao')}}
                        </div>
                    </div>
                @endif

                <div class="body table-responsive">
                    <form method="post" action="{{url("admin/product/update/{$product->__get("id")}")}}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                    <table class="table table-striped">
                        <tbody>
                        <label for="text">Tên Bánh</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="{{$product->__get("product_name")}}" type="text" name="product_name"   placeholder="Nhập tên bánh">
                            </div>
                        </div>
                        <label for="text"> Mô Tả</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="{{$product->__get("product_description")}}" type="text" name="product_description"   placeholder="Mô tả về sản phẩm">
                            </div>
                        </div>
                        <label for="double">Giá Tiền</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="{{$product->__get("price")}}" type="number" name="price"   placeholder="Nhập giá tiền">
                            </div>
                        </div>
                        <label for="double">Khuyến Mãi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="{{$product->__get("sale_price")}}" type="number" name="sale_price"   placeholder="Số % khuyến mãi">
                            </div>
                        </div>
                        <label for="double">Mặt Hàng Mới</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="new" id="">
                                    <option value="1" {{(($product->__get("new"))==1)? 'selected':' '}}>Hàng mới</option>
                                    <option value="2" {{(($product->__get("new"))==2)? 'selected':' '}}>Hàng cũ</option>
                                </select>
                            </div>
                        </div>
                        <label for="email_address">Trạng Thái</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="status" id="">
                                    <option value="1" id="radio_1" type="radio" {{($product->__get("status")==1)? 'checked':''}}>Ẩn </option>
                                    <option value="2" id="radio_2" type="radio" {{($product->__get("status")==1)? 'checked':''}}>Hiện</option>
                                </select>
                            </div>
                        </div>
                        <label for="double">Thành Phần</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="{{$product->__get("ingredient")}}" type="text" name="ingredient">
                            </div>
                        </div>
                        <label for="double">Hình ảnh</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" type="file" name="product_avatar"  >
                            </div>
                            <img src="{{asset('upload/product')}}/{{$product->__get("product_avatar")}}" width="100px" alt="">
                        </div>
                        <label for="double">ID Type</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" id="" value="{{$product->__get("id_type")}}" type="number" name="id_type" >
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary m-t-15 waves-effect" type="submit">CẬP NHẬT</button>

                        </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


