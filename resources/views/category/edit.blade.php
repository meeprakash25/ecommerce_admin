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
                                <a href="{{route('categories.index')}}" class="btn btn-light btn-block">
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

                <form action="{{URL::to('/categories/search')}}" method="POST">
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
                    <div class="card-header"><h6>Edit Category</h6></div>

                    <div class="card-body">
                        {!! Form::model($category,['method'=>'PATCH', 'action'=>['CategoryController@update', $category->id], 'files'=>true]) !!}
                        {{  Form::hidden('url',URL::previous())  }}
                        <div class="form-group row">
                            {!! Form::label('name', 'Category Name' ,['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class'=>['form-control', $errors->has('name') ? ' is-invalid' : '' ]]) !!}
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <span class="badge badge-danger">{{ $errors->first('name') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('image', 'Image',['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) !!}
                            <div class="col-md-6">
                                {!! Form::file('image', null, ['class'=>'form-control-file']) !!}
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <span class="badge badge-danger">{{ $errors->first('image') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-group">
                                    {!! Form::submit('Update',['class'=>'btn btn-outline-secondary']) !!}
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
