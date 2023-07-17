@extends('admin.layouts.master')

@section('title', __('static.suggestion_category.edit_suggestion_category'))

@section('content')
    <div class="row">
        <div class="col-sm-10 col-xxl-8 mx-auto">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('static.suggestion_category.edit_suggestion_category') }}</h5>
                </div>
                {!! Form::open([
                    'route' => ['category.update',$category->id],
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                <div class="card-body">
                    <div class="form-group row">
                        {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-9 col-md-8">
                            {!! Form::text('name',isset($category->name)? $category->name : old('name'), ['class' => 'form-control']) !!}
                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
