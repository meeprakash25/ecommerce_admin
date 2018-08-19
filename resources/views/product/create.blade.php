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
                    <div class="card-header"><h6>Add Product</h6></div>

                    <div class="card-body">
                        @unless($categories->count())
                            <h5>Please add a <a href="{{route('categories.create')}}">category</a> first before adding a
                                product</h5>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="{{ action('ProductController@store') }}" aria-label="{{ __('Add Product') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name" class="">{{ __('Product Name:') }}</label>
                                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
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
                                                                <label for="category" class="">{{ __('Category:') }}</label>

                                                                <select id="category" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" autofocus>
                                                                    @forelse($categories as  $id => $productname)
                                                                        <option value="{{$id}}">{{$productname}}</option>
                                                                    @empty
                                                                        <option value="">{{__('Add a category first')}}</option>
                                                                    @endforelse
                                                                </select>
                                                                @if ($errors->has('category_id'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('category_id') }}</span>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-">
                                                            <div class="form-group">
                                                                <label for="stock" class="">{{ __('Stock:') }}</label>
                                                                <input id="stock" type="text" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}" name="stock" value="{{ old('stock') }}" required autofocus>

                                                                @if ($errors->has('stock'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('stock') }}</span>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-">
                                                            <div class="form-group">
                                                                <label for="price" class="">{{ __('Price:') }}</label>

                                                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>

                                                                @if ($errors->has('price'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('price') }}</span>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-">
                                                            <div class="form-group">
                                                                <label for="status" class="">{{ __('Status:') }}</label>

                                                                <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required autofocus>
                                                                    <option value="1">Available</option>
                                                                    <option value="0">Not Available</option>
                                                                </select>
                                                                @if ($errors->has('status'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('status') }}</span>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-">
                                                            <div class="form-group">
                                                                <label for="image" class="">{{ __('Image:') }}</label>

                                                                <input type="file" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required>

                                                                @if ($errors->has('image'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <span class="badge badge-danger">{{ $errors->first('image') }}</span>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="description" class="">{{ __('Description:') }}</label>

                                                            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus>{{ old('description') }}</textarea>

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
                                                                        {{ __('Add') }}
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
                                    </form>
                                </div>
                            </div>
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    <script src="../plugins/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
            height: 200
        });
    </script>
@endsection
