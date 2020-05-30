@extends('backend.components.layout')
@section('content')


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    THÊM SẢN PHẨM
                </h2>
                {{--                <ul class="header-dropdown m-r--5">--}}
                {{--                    <li class="dropdown">--}}
                {{--                        <a class="dropdown-toggle" role="button" aria-expanded="true" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">--}}
                {{--                            <i class="material-icons">more_vert</i>--}}
                {{--                        </a>--}}
                {{--                        <ul class="dropdown-menu pull-right">--}}
                {{--                            <li><a class=" waves-effect waves-block" href="javascript:void(0);">Action</a></li>--}}
                {{--                            <li><a class=" waves-effect waves-block" href="javascript:void(0);">Another action</a></li>--}}
                {{--                            <li><a class=" waves-effect waves-block" href="javascript:void(0);">Something else here</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                {{--                </ul>--}}
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    @foreach($errors->all() as $err)
                        <strong>{{$err}}</strong> ...
                    @endforeach
                </div>
            @endif
            <div class="body">
                <form method="POST" action="{{route('savePro')}}" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <label for="text">Tên Bánh</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="text" name="product_name"   placeholder="Nhập tên bánh">
                        </div>
                    </div>
                    <label for="text"> Mô Tả</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="text" name="product_description"   placeholder="Mô tả về sản phẩm">
                        </div>
                    </div>
                    <label for="double">Giá Tiền</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="number" name="price"   placeholder="Nhập giá tiền">
                        </div>
                    </div>
                    <label for="double">Khuyến Mãi</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="number" name="sale_price"   placeholder="Số % khuyến mãi">
                        </div>
                    </div>
                    <label for="double">Ưu tiên</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="new" id="">
                                <option value="1">Hàng mới</option>
                                <option value="2">Hàng cũ</option>
                            </select>
                        </div>
                    </div>
                    <label for="email_address">Trạng Thái</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="status" id="">
                                <option value="1">Ẩn </option>
                                <option value="2">Hiện</option>
                            </select>
                        </div>
                    </div>
                    <label for="double">Thành Phần</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="text" name="ingredient">
                        </div>
                    </div>
                    <label for="double">Hình ảnh</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="file" name="product_avatar">
                        </div>
                    </div>
                    <label for="double">ID Type</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="number" name="id_type" >
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary m-t-15 waves-effect" type="submit">THÊM MỚI</button>
                </form>
            </div>
        </div>
    </div>
@endsection

