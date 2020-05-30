@extends('backend.components.layout')
@section('head-title','New Slide')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    THÊM SLIDE
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
                    @foreach($errors->all() as $err)
                        <strong>{{$err}}</strong> ...
                    @endforeach
                </div>
            @endif
            <div class="body">
                <form method="post" action="{{route('save-slide')}}" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <label for="">Trạng Thái</label>
                    <div class="form-group">
                            <div class="demo-radio-button">
                                <input name="status" value="1" id="radio_1" type="radio" checked="">
                                <label for="radio_1">Ẩn</label>
                                <input name="status" value="2" id="radio_2" type="radio">
                                <label for="radio_2">Hiện</label>
                            </div>
                    </div>
                    <label for="">Tiêu Đề</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control" id="" type="text" name="slide_title"   placeholder="Nhập tên cửa hàng">
                        </div>
                    </div>
                    <label for="">Chon ảnh</label>
                    <!-- Button trigger modal -->
                    <a class="btn btn-primary" data-toggle="modal" href="#modelId">anh</a>
{{--                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">--}}
{{--                        Launch--}}
{{--                    </button>--}}
                    <input type="text" name="image" id="img">


                    <div class="form-group">
                        <div class="form-line">

                            <input class="form-control" id="" type="file" name="image"   >
                        </div>
                    </div>


                    <br>
                    <button class="btn btn-primary m-t-15 waves-effect" type="submit">THÊM MỚI</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
        <div class="modal-dialog" style="width: 90%;height: 90%" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="700px" src="{{url('filemanager')}}/dialog.php?field_id=img" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

