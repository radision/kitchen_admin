
@extends('app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Goods</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <form name="edit_form" id="edit_form" method="post" action="/goods/edit/{{ $goods->goods_id }}" class="form-horizontal" enctype='multipart/form-data'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Merchant</label>
            <div class="col-sm-10"> {{ $merchant->title }} </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Image</label>
            <div class="col-sm-10">
                <input type="file" name="image">
                <img src="/upload/{{ $goods->picture_url }}" height="100">
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $goods->title }}">
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea name="desc" class="form-control" id="desc">{{ $goods->desc }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Save</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
