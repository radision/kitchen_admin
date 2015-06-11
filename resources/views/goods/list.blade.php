
@extends('app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Goods</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Merchant</th>
                <th>Title</th>
                <th>Desc</th>
                <th>Created At</th>
                <th>Op</th>
            </tr>
@foreach ($list as $row)
            <tr>
                <td>{{ $row->goods_id }}</td>
                <td>
                    <img src="/upload/{{ $row->picture_url }}" height='100'>
                </td>
                <td>
@foreach ($merchants as $merchant)
    @if ($row->merchant_id == $merchant->merchant_id)
        {{ $merchant->title }}
    @endif
@endforeach
                </td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->desc }}</td>
                <td>{{ date('Y-m-d H:i:s', $row->created_at) }}</td>
                <td><a href="/goods/edit/{{ $row->goods_id }}" class="btn btn-default">Edit</a></td>
            </tr>
@endforeach
        </table>
    </div>
</div>
@endsection
