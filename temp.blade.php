<div class="col-">
    <div class="form-group">
        {!! Form::label('image', 'Image (leave empty if update not required):') !!}
        {!! Form::file('image', null, ['class'=>'form-control-file']) !!}
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                <span class="badge badge-danger">{{ $errors->first('image') }}</span>
            </span>
        @endif
    </div>
</div>