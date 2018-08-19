@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row  no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Dashboard</h3></div>

                <div class="card-body">
                    <div class = "row no-gutters justify-content-around">
                        <div class = "col-lg-2 col-md-4 col-sm-6">
                            <div class = "card text-center mb-3 sr-icon">
                                <div class = "card-body">
                                    <h6>Order List</h6>
                                    <h1 class = "display-4">
                                        <i class = "fa fa-shopping-cart fa-lg"></i> <p>3</p>
                                    </h1>
                                    <a href = "{{route('orders.index')}}" class = "btn btn-outline-dark">View</a>
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-2 col-md-4 col-sm-6">
                            <div class = "card text-center mb-3 sr-icon">
                                <div class = "card-body">
                                    <h6>Categories</h6>
                                    <h1 class = "display-4">
                                        <i class = "fa fa-folder fa-lg"></i> <p>4</p>
                                    </h1>
                                    <a href = "{{route('categories.index')}}" class = "btn btn-outline-dark">View</a>
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-2 col-md-4 col-sm-6">
                            <div class = "card text-center mb-3 sr-icon">
                                <div class = "card-body">
                                    <h6>Products</h6>
                                    <h1 class = "display-4">
                                        <i class = "fa fa-bars fa-lg"></i> <p>6</p>
                                    </h1>
                                    <a href = "{{route('products.index')}}" class = "btn btn-outline-dark">View</a>
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-2 col-md-4 col-sm-6">
                            <div class = "card text-center mb-3 sr-icon">
                                <div class = "card-body">
                                    <h6>App Settings</h6>
                                    <h1 class = "display-4">
                                        <i class = "fa fa-gear fa-lg mb-4"></i>
                                    </h1>
                                    <a href = "{{route('settings.index')}}" class = "btn btn-outline-dark mt-5">View</a>
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-2 col-md-4 col-sm-6">
                            <div class = "card text-center mb-3 sr-icon">
                                <div class = "card-body">
                                    <h6>Users</h6>
                                    <h1 class = "display-4">
                                        <i class = "fa fa-users fa-lg mb-4"></i>
                                    </h1>
                                    <a href = "{{route('users.index')}}" class = "btn btn-outline-dark mt-5">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
