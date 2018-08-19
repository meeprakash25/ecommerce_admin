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
                <section id="action-add-new">
                    <div class="row bg-light m-1 pull-left">
                        <a href="{{route('products.create')}}" class="btn btn-light btn-block">
                            <i class="fa fa-plus"></i> Add new Product
                        </a>
                    </div>
                </section>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h6>Product</h6></div>

                    <div class="card-body align-self-center">
                        @unless($products->count())
                            <h5>No products</h5>
                        @else
                            <table class="table table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="image t-center">
                                                <div class="row">
                                                    <div class="col-6">
                                                        @forelse($product->images as $image)
                                                            <a class="item-image hov-img-zoom" href="{{asset('images/product/'.$image->name)}}" data-lightbox="gallery_{{$product->id}}">
                                                                <img class="" src="{{asset('images/product/'.$image->name)}}" alt="{{$product->name}}"></a>
                                                        @empty
                                                            <img class="img-responsive img-rounded" width="50"
                                                                 src="{{'http://placehold.it/50x50'}}" alt="">
                                                        @endforelse
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <a href="{{route('products.add-image',$product->id)}}">Add
                                                                                                               image</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->stock}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->status ? 'Available' : 'Not Available'}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->created_at->diffForHumans()}}</td>
                                        <td>{{$product->updated_at->diffForHumans()}}</td>
                                        <td><a href="{{route('products.edit',$product->id)}}">Edit</a></td>
                                        <td><a href="{{route('products.confirm-delete',$product->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-9 align-self-md-start">
                                    {{--pagination--}}
                                    {{$products->links()}}
                                </div>
                                @if($products->count()>$paginate_number)
                                    <div class="col-md-3 text-muted align-self-md-end">
                                        <small><strong> Total items {{$products->total()}}</strong>
                                            <p>in this page {{$products->count()}} item(s)</p>
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

@section('footer')
    @parent
    <script src="{{asset('js/j-query.js')}}"></script>
    <script src="{{asset('plugins/lightbox2/js/lightbox.min.js')}}"></script>
@endsection