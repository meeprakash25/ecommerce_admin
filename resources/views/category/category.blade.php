@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{URL::to('/categories')}}" method="POST">
            <div class="row pb-3 justify-content-center">
                {{csrf_field()}}
                <div class="input-group col-md-4">
                    <input class="form-control py-2 border-right-0 border" name="query" type="search" placeholder="search by name">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </form>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h6>Category</h6></div>

                    <div class="card-body">
                        @unless($categories->count())
                            <h5>No categories</h5>
                        @else
                            {{--@if(isset($query))--}}
                            {{--{{$query}}--}}
                            {{--@endif--}}
                            <h6>{{$categories->total()}} total items</h6>
                            <p>in this page ({{$categories->count()}} items)</p>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <img class="img-responsive img-rounded" width="100"
                                                 src="{{$category->image ? $category->image->name : 'http://placehold.it/100x100'}}" alt="">
                                        </td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>{{$category->updated_at->diffForHumans()}}</td>
                                        <td><a href="{{route('categories.edit',$category->id)}}">Edit</a></td>
                                        <td><a href="{{route('categories.confirm-delete',$category->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$categories->links()}}
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
