@extends('layouts.admin')
@section('title')
    Orders
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">New Orders</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td> {{ date('d-m-Y', strtotime($item->created_at))  }} </td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td
                                            style="{{ $item->status == 0 ? 'color: red; text-color: pink;' : 'color: green; text-color: lightgreen;' }}">
                                            {{ $item->status == 0 ? 'Pending' : 'Completed' }}
                                        </td>

                                        <td>
                                            <a href="{{ url('admin/view_order/'.$item->id) }}"
                                                class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
