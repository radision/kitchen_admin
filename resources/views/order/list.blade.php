@extends('app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Order</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Goods</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Op</th>
            </tr>
@foreach ($orders as $row)
            <tr>
                <td>{{ $row->order_id }}</td>
                <td>{{ $row->consumer_mobile_id }}</td>
                <td>{{ $row->address_id }}</td>
                <td>{{ $row->goods_id }}</td>
                <td>{{ $row->quantity }}({{ $row->amount }})</td>
                <td>{{ date('Y-m-d H:i:s', $row->created_at) }}</td>
                <td><a href="/order/detail/{{ $row->order_id }}" class="btn btn-default">Detail</a></td>
            </tr>
@endforeach
        </table>
    </div>
</div>
@endsection
