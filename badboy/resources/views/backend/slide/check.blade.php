@extends('backend.components.layout')
@section('head-title','Check')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
{{--            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">--}}

                    <img class="img-responsive thumbnail" style="height: 500px;width: 500px"  src="{{asset('upload/slide')}}/{{$slide->__get('image')}}">

{{--            </div>--}}
        </div>
    </div>
</div>
@endsection
