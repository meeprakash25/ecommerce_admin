@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Dashboard</h3></div>

                <div class="card-body">
                    <div class = "row justify-content-around">
                        <div class = "col-lg-3 col-md-4 col-sm-6">
                            <div class = "card text-center mb-3 sr-icon">
                                <div class = "card-body">
                                    <h6>Order List</h6>
                                    <h1 class = "display-4">
                                        <i class = "fa fa-shopping-cart fa-lg"></i> 3
                                    </h1>
                                    <a href = "{{route('orders.index')}}" class = "btn btn-outline-dark">View</a>
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-3 col-md-4 col-sm-6">
                            <div class = "card text-center mb-3 sr-icon">
                                <div class = "card-body">
                                    <h6>Category</h6>
                                    <h1 class = "display-4">
                                        <i class = "fa fa-folder fa-lg"></i> 4
                                    </h1>
                                    <a href = "{{route('categories.index')}}" class = "btn btn-outline-dark">View</a>
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-3 col-md-4 col-sm-6">
                            <div class = "card text-center mb-3 sr-icon">
                                <div class = "card-body">
                                    <h6>Products</h6>
                                    <h1 class = "display-4">
                                        <i class = "fa fa-bars fa-lg"></i> 6
                                    </h1>
                                    <a href = "" class = "btn btn-outline-dark">View</a>
                                </div>
                            </div>
                        </div>
                        <div class = "col-lg-3 col-md-4 col-sm-6">
                            <div class = "card text-center mb-3 sr-icon">
                                <div class = "card-body">
                                    <h6>Setting</h6>
                                    <h1 class = "display-4">
                                        <i class = "fa fa-gear fa-lg mb-3"></i>
                                    </h1>
                                    <a href = "" class = "btn btn-outline-dark mt-5">View</a>
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
