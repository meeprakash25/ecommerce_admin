@extends('layouts.app')


{{--status select button--}}





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
                <div class="card order-details  card-block d-flex">
                    <div class="card-header"><h6>Order Details</h6></div>
                    <div class="card-body">
                        @unless($order->count())
                            <h5>No Orders</h5>
                        @else

                            {!! Form::model($order,['method'=>'PATCH', 'action'=>['OrderController@update', $order->id], 'files'=>true]) !!}

                            <table class='table table-responsive'>
                                <tr>
                                    <th>ID</th>
                                    <td>{{$order->id}}
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$order->name}}
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$order->address}}
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{$order->city}}
                                </tr>
                                <tr>
                                    <th>Province</th>
                                    <td>{{$order->province}}
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$order->email}}
                                </tr>
                                <tr>
                                    <th>Shipping Type</th>
                                    <td>{{$order->shipping_type}}
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td>{{$order->date_time}}
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$order->phone}}
                                </tr>
                                <tr>
                                    <th>Order list</th>
                                    <td>
                                        <ul>
                                            @for($i=0;$i<count($order_list);$i++)
                                                @if($i == ((count($order_list))-1))
                                                    <br>
                                                    <li>
                                                        <bold>{{$order_list[$i]}}</bold>
                                                    </li>
                                                @else
                                                    <li>{{ $order_list[$i] }}</li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Comment</th>
                                    <td>{{$order['comment'] ?? 'No comment'}}
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        {!! Form::select('status', ['1'=>'Processed', '0'=>'Not Processed'], $order->status ? 1 : 0, ['class'=>'form-control']) !!}
                                        @if ($errors->has('status'))
                                            <span class="invalid-feedback" role="alert">
                                            <span class="badge badge-danger">{{ $errors->first('status') }}</span>
                                        </span>
                                    @endif
                                </tr>
                                </td>
                            </table>
                            <div class="form-group text-center">
                                {!! Form::submit('Save',['class'=>'btn btn-outline-dark']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
