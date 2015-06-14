@extends('app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Merchant</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Desc</th>
                <th>Shipping</th>
                <th>Created At</th>
                <th>Op</th>
            </tr>
@foreach ($list as $row)
            <tr>
                <td>{{ $row->merchant_id }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->desc }}</td>
                <td>{{ $row->shipping }}</td>
                <td>{{ date('Y-m-d H:i:s', $row->created_at) }}</td>
                <td><a href="/merchant/edit/{{ $row->merchant_id }}" class="btn btn-default">Edit</a></td>
            </tr>
@endforeach
        </table>
    </div>
</div>
@endsection
