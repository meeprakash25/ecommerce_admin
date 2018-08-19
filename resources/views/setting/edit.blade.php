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
                                <a href="{{route('settings.index')}}" class="btn btn-light btn-block">
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

            </div>
            <div class="col-md-3">

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h6>Edit Settings</h6></div>

                    <div class="card-body">
                        {!! Form::model($setting,['method'=>'PATCH', 'action'=>['SettingController@update',$setting->id]]) !!}
                        {{  Form::hidden('url',URL::previous())  }}
                        <div class="form-group row">
                            {!! Form::label('tax', 'Tax:' ,['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) !!}
                            <div class="col-md-6">
                                {!! Form::text('tax', null, ['class'=>['form-control', $errors->has('tax') ? ' is-invalid' : '' ]]) !!}
                                @if ($errors->has('tax'))
                                    <span class="invalid-feedback" role="alert">
                                        <span class="badge badge-danger">{{ $errors->first('tax') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('currency', 'Currency:' ,['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) !!}
                            <div class="col-md-6">
                                {!! Form::select('currency', $currency_pair, null, ['class'=>['form-control', $errors->has('currency') ? ' is-invalid' : '' ]]) !!}
                                @if ($errors->has('currency'))
                                    <span class="invalid-feedback" role="alert">
                                        <span class="badge badge-danger">{{ $errors->first('currency') }}</span>
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