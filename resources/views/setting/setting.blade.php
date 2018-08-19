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

                {{--<form action="{{URL::to('/users/search')}}" method="POST">--}}
                {{--<div class="row justify-content-center m-0 p-0">--}}
                {{--{{csrf_field()}}--}}
                {{--<div class="input-group col-md-12">--}}
                {{--<input class="form-control py-2 border-right-0 border" name="query" value="{{ old('query') }}" type="search" placeholder="search users by name or email">--}}
                {{--<span class="input-group-append">--}}
                {{--<button class="btn btn-outline-secondary border-left-0 border" type="submit">--}}
                {{--<i class="fa fa-search"></i>--}}
                {{--</button>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</form>--}}

            </div>
            <div class="col-md-3">
                {{--<section id="action-add-new">--}}
                {{--<div class="row bg-light m-1 pull-left">--}}
                {{--<a href="{{route('products.create')}}" class="btn btn-light btn-block">--}}
                {{--<i class="fa fa-plus"></i> Add new Product--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</section>--}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h6>Settings</h6></div>
                    <div class="card-body align-self-center">
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Tax</th>
                                <th>Currency</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$settings->tax}}</td>
                                <td>{{$settings->currency}}</td>
                                <td>{{$settings->created_at->diffForHumans()}}</td>
                                <td>{{$settings->updated_at->diffForHumans()}}</td>
                                <td><a href="{{route('settings.edit',$settings->id)}}">Edit</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection