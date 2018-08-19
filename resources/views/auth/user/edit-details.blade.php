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
                                <a href="{{route('users.index')}}" class="btn btn-light btn-block">
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

                <form action="{{URL::to('/users/search')}}" method="POST">
                    <div class="row justify-content-center m-0 p-0">
                        {{csrf_field()}}
                        <div class="input-group col-md-12">
                            <input class="form-control py-2 border-right-0 border" name="query" value="{{ old('query') }}" type="search" placeholder="search users">
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
                    <div class="card-header">Confirm Delete</div>

                    <div class="card-body">

                        Delete Category: <p class="d-inline">{{strtoupper($user_name)}}</p>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['UserController@update', $id]]) !!}
                        {{--{{  Form::hidden('url',URL::previous())  }}--}}
                        <div class="form-group">
                            <a href="{{route('users.index')}}" class="btn btn-outline-dark pull-right col-sm-3 m-1">Cancel</a>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-outline-danger pull-right col-sm-3 m-1']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
