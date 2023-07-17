@extends('admin.layouts.master')

@section('title', __('static.character.create_character'))

@section('content')
    <div class="row">
        <div class="col-sm-10 col-xxl-8 mx-auto">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('static.character.create_character') }}</h5>
                </div>
                {!! Form::open([
                    'route' => 'character.store',
                    'method' => 'POST',
                    'files' => true,
                    'enctype' => 'multipart/form-data',
                    'class' => 'needs-validation user-add',
                ]) !!}
                <div class="card-body">
                    <div class="form-group row">
                        {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-9 col-md-8">
                            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label(
                            'character_image',
                            __('static.character.character') . ' <span>*</span>',
                            ['class' => 'col-xl-3 col-md-4'],
                            false,
                        ) !!}
                        <div class="col-xl-9 col-md-8">
                            {!! Form::file('character_image', [
                                'class' => 'form-control',
                                'files' => true,
                                'multiple' => false,
                            ]) !!}
                            @error('character_image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('shadow_color', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        {{-- <div class="col-xl-8 col-md-1"> changes --}}
                        <div class="col-xl-9 col-md-8">
                            <div class="d-flex w-100 color-form">
                                {!! Form::text('shadow_color', old('shadow_color'), [
                                    'class' => 'form-control',
                                    'id' => 'shadow_color',
                                ]) !!}
                                {!! Form::color('color_picker', old('color_picker'), [
                                    'class' => 'form-control fill-color',
                                    'id' => 'color_picker',
                                ]) !!}

                            </div>
                            @error('shadow_color')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-end">
                            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
