@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Confirm Delete</div>

                    <div class="card-body">

                        DELETE Category

                        {!! Form::open(['method'=>'DELETE', 'action'=>['CategoryController@destroy', $id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Cancel',['class'=>'btn btn-danger pull-right col-sm-3']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-outline-danger pull-right col-sm-3']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
