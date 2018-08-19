@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-3">
                <!-- ACTIONS -->
                <div class="row no-gutters pull-right">
                    <div class="col-4">
                        <section id="action-back">
                            <div class="row bg-light m-1">
                                <a href="{{route('/')}}" class="btn btn-light btn-block">
                                    <i class="fa fa-home"></i>
                                </a>
                            </div>
                        </section>
                    </div>
                    <div class="col-4">
                        <section id="action-back">
                            <div class="row bg-light m-1">
                                <a href="{{route('/')}}" class="btn btn-light btn-block">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                            </div>
                        </section>
                    </div>
                    <div class="col-4">
                        <section id="action-forward">
                            <div class="row bg-light m-1">
                                <a href="{{ URL::previous()}}" class="btn btn-light btn-block">
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <form action="{{URL::to('/orders/search')}}" method="POST">
                    <div class="row justify-content-center m-0 p-0">
                        {{csrf_field()}}
                        <div class="input-group col-md-12">
                            <input class="form-control py-2 border-right-0 border" name="query" value="{{ old('query') }}" type="search" placeholder="search categories by name">
                            <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                {{--<section id="action-add-new">--}}
                {{--<div class="row bg-light m-1 pull-left">--}}
                {{--<a href="{{route('categories.create')}}" class="btn btn-light btn-block">--}}
                {{--<i class="fa fa-plus"></i> Add new Category--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</section>--}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h6>Order List</h6></div>

                    <div class="card-body">
                        @unless($orders->count())
                            <h5>No Orders</h5>
                        @else
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Shipping</th>
                                    <th>Delivery Date</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Ordered</th>
                                    <th>Updated</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->city}}</td>
                                        <td>{{$order->shipping_type}}</td>
                                        <td>{{$order->date_time}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>@if($order->status ==1)
                                                <span class='badge badge-primary'>PROCESSED</span>
                                            @else
                                                <span class='badge badge-danger'>NOT PROCESSED</span>
                                            @endif
                                        </td>
                                        <td>{{$order->created_at->diffForHumans()}}</td>
                                        <td>{{$order->updated_at->diffForHumans()}}</td>
                                        <td><a href="{{route('orders.show',$order->id)}}">detail</a></td>
                                        <td>
                                            <a href="{{route('orders.confirm-delete',$order->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-9">
                                    {{--pagination--}}
                                    {{$orders->links()}}
                                </div>
                                @if($orders->count()>=$paginate_number)
                                    <div class="col-md-3 text-muted align-self-md-start">
                                        <small><strong> Total items {{$orders->total()}}</strong>
                                            <p>in this page {{$orders->count()}} item(s)</p>
                                        </small>
                                    </div>
                                @endif
                            </div>
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
