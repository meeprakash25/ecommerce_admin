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
                            <i class="fa fa-plus"></i> Register new User
                        </a>
                    </div>
                </section>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h6>Users</h6></div>

                    <div class="card-body align-items-center d-flex justify-content-center">
                        @unless($users->count())
                            <h5>No users</h5>
                        @else
                            <table class="table table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Updated</th>
                                    <th>Created</th>
                                    <th colspan="3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{--<img class="img-responsive img-rounded" width="100"--}}
                                            {{--src="{{$user->image ? asset('/images/user/'.$user->image->name) : 'http://placehold.it/100x100'}}" alt="">--}}
                                        </td>
                                        <td><a href="{{route('users.profile',$user->id)}}">{{$user->name}}</a></td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>...</td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>{{$user->updated_at->diffForHumans()}}</td>
                                        <td><a href="{{route('users.edit',$user->id)}}">Edit Details</a></td>
                                        <td><a href="{{route('users.change-password',$user->id)}}">Change Password</a>
                                        </td>
                                        <td>
                                            <a href="{{route('users.confirm-delete',$user->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-9 align-self-md-start">
                                    {{--pagination--}}
                                    {{$users->links()}}
                                </div>
                                @if($users->count()>$paginate_number)
                                    <div class="col-md-3 text-muted align-self-md-start">
                                        <small><strong> Total items {{$users->total()}}</strong>
                                            <p>in this page {{$users->count()}} item(s)</p>
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
