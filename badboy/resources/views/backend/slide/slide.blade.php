@extends('backend.components.layout')
@section('head-title','Slide')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DANH SÁCH CÁC SILDE

                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a class=" waves-effect waves-block" href="{{route('new-slide')}}">Thêm mới slide</a></li>

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
                        <thead class="text-center">
                        <tr>
                            <th>STT</th>
                            <th>Tiêu Đề</th>
                            <th>Ảnh</th>
                            <th>Trạng Thái</th>
                            <th>Ngày tạo</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slide as $value)
                            <tr >
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$value->__get('slide_title')}}</td>
                                <td>
                                    <img  src="{{asset('upload/slide')}}/{{$value->__get('image')}}" width="80px" alt="">
                                </td>
                                @if($value->__get('status')==1)
                                    <td><p class="btn bg-red btn-block btn-xs waves-effect" style="width: 60%">Ẩn</p></td>
                                @elseif($value->__get('status')==2)
                                    <td><p class="btn bg-teal btn-block btn-xs waves-effect" style="width: 60%">Hiện</p></td>

                                @endif
                                <td>{{$value->__get('created_at')}}</td>
                                <td>
                                    <a href="{{url("admin/slide/check/{$value->__get("id")}")}}" class="label bg-green">Check</a>
                                    <a href="{{url("admin/slide/edit/{$value->__get("id")}")}}" class="label bg-blue">Edit</a>
                                    <a href="{{url("admin/slide/delete/{$value->__get("id")}")}}" class="label bg-red">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
