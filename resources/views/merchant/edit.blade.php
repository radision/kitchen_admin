
@extends('app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Merchant</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <form name="edit_form" id="edit_form" method="post" action="/merchant/edit/{{ $merchant_id }}" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $merchant->title }}">
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea name="desc" class="form-control" id="desc">{{ $merchant->desc }}</textarea>
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
