@extends('backend.components.layout')
@section('content')


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    THÊM CỬA HÀNG
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
                <form method="post" action="{{url('admin/store/save')}}">
                    @csrf
                    @method("POST")
                    <label for="email_address">Khu vực</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="area" id="">
                                <option value="4">Khu vực khác</option>
                                <option value="1">Hà Nội</option>
                                <option value="2">HCM</option>
                                <option value="3">Đà Nẵng</option>
                            </select>
                        </div>
                    </div>
                    <label for="password">Tên cửa hàng</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="text" name="store_name"   placeholder="Nhập tên cửa hàng">
                        </div>
                    </div>
                    <label for="password">Địa chỉ</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="text" name="address"   placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                    <label for="password">SĐT</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="number" name="phone"   placeholder="Nhập số điện thoại cửa hàng">
                        </div>
                    </div>

                    <br>
                    <button class="btn btn-primary m-t-15 waves-effect" type="submit">THÊM MỚI</button>
                </form>
            </div>
        </div>
    </div>
@endsection
