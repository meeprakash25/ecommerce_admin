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
                                <a href="{{route('products.index')}}" class="btn btn-light btn-block">
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

                <form action="{{URL::to('/products/search')}}" method="POST">
                    <div class="row justify-content-center m-0 p-0">
                        {{csrf_field()}}
                        <div class="input-group col-md-12">
                            <input class="form-control py-2 border-right-0 border" name="query" value="{{ old('query') }}" type="search" placeholder="search products by name">
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
                    <div class="card-header"><h6>Edit Category</h6></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::model($product,['method'=>'PATCH', 'action'=>['ProductController@update', $product->id], 'files'=>true]) !!}
                                {{  Form::hidden('url',URL::previous())  }}
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {!! Form::label('name', 'Product Name:') !!}
                                                    {!! Form::text('name', null, ['class'=>['form-control', $errors->has('name') ? ' is-invalid' : '' ]]) !!}
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <span class="badge badge-danger">{{ $errors->first('name') }}</span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                                <div class="col-">
                                                    <div class="form-group">
                                                        {!! Form::label('category_id', 'Category:') !!}
                                                        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
                                                        @if ($errors->has('category_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('category_id') }}</span>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-">
                                                    <div class="form-group">
                                                        {!! Form::label('stock', 'Stock:') !!}
                                                        {!! Form::text('stock', null, ['class'=>['form-control', $errors->has('stock') ? ' is-invalid' : '' ]]) !!}
                                                        @if ($errors->has('stock'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('stock') }}</span>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-">
                                                    <div class="form-group">
                                                        {!! Form::label('price', 'Price:') !!}
                                                        {!! Form::text('price', null, ['class'=>['form-control', $errors->has('price') ? ' is-invalid' : '' ]]) !!}
                                                        @if ($errors->has('price'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('price') }}</span>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-">
                                                    <div class="form-group">
                                                        {!! Form::label('status', 'Status:') !!}
                                                        {!! Form::select('status', ['1'=>'Available', '0'=>'Not Available'], $product->status ? 1 : 0, ['class'=>'form-control']) !!}
                                                        @if ($errors->has('status'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('status') }}</span>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{--<div class="col-">--}}
                                                {{--<div class="form-group">--}}
                                                {{--{!! Form::label('image', 'Image (leave empty if update not required):') !!}--}}
                                                {{--{!! Form::file('image', null, ['class'=>'form-control-file', $errors->has('image') ? ' is-invalid' : '']) !!}--}}
                                                {{--@if ($errors->has('image'))--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<span class="badge badge-danger">{{ $errors->first('image') }}</span>--}}
                                                {{--</span>--}}
                                                {{--@endif--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                            </div>


                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    {!! Form::label('description', 'Description:') !!}
                                                    {!! Form::textarea('description', null, ['class'=>['form-control','id'=>'description', $errors->has('description') ? ' is-invalid' : '' ]]) !!}
                                                    @if ($errors->has('description'))
                                                        <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('description') }}</span>
                                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mt-3">
                                            <div class="card-header"><h6>Add</h6></div>
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-outline-dark">
                                                                {{ __('Update') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-outline-danger">
                                                                {{ __('Clear') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    <script src="../../plugins/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            height: 160
        });
    </script>
@endsection