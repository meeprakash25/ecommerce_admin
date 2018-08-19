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
                <section id="action-add-new">
                    <div class="row bg-light m-1 pull-left">
                        <a href="{{route('categories.create')}}" class="btn btn-light btn-block">
                            <i class="fa fa-plus"></i> Add new Category
                        </a>
                    </div>
                </section>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h6>Category</h6></div>

                    <div class="card-body align-self-center">
                        @unless($categories->count())
                            <h5>No categories</h5>
                        @else
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            @if($category->image->category_id)
                                                <a class="item-image hov-img-zoom" href="{{asset('images/category/'.$category->image->name)}}" data-lightbox="gallery_{{$category->id}}">
                                                    <img class="" src="{{$category->image ? asset('/images/category/'.$category->image->name) : 'http://placehold.it/100x100'}}" alt=""></a>
                                            @else
                                                <img class="img-responsive img-rounded" width="50"
                                                     src="{{'http://placehold.it/50x50'}}" alt="">
                                            @endif
                                        </td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>{{$category->updated_at->diffForHumans()}}</td>
                                        <td><a href="{{route('categories.edit',$category->id)}}">Edit</a></td>
                                        <td>
                                            <a href="{{route('categories.confirm-delete',$category->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-9 align-self-md-start">
                                    {{--pagination--}}
                                    {{$categories->links()}}
                                </div>
                                @if($categories->count()>$paginate_number)
                                    <div class="col-md-3 text-muted align-self-md-start">
                                        <small><strong> Total items {{$categories->total()}}</strong>
                                            <p>in this page {{$categories->count()}} item(s)</p>
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
