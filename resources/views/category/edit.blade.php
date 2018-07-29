@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h6>Edit Category</h6></div>

                    <div class="card-body">
                        {!! Form::model($category,['method'=>'PATCH', 'action'=>['CategoryController@update', $category->id], 'files'=>true]) !!}

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
