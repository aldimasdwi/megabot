@extends('admin.layouts.master')

@section('title', __('static.suggestion.edit_suggestion'))

@section('content')
    <div class="row">
        <div class="col-sm-10 col-xxl-8 mx-auto">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('static.suggestion.edit_suggestion') }}</h5>
                </div>
                {!! Form::open([
                    'route' => ['suggestion.update',$suggestion->id],
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                <div class="card-body">
                    <div class="form-group row">
                        {!! Form::label('question', __('static.suggestion.suggestion') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-9 col-md-8">
                            {!! Form::text('question', isset($suggestion->question)? $suggestion->question : old('question'), ['class' => 'form-control']) !!}
                            @error('question')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('suggestion_category', __('static.suggestion_category.suggestion_category') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-9 col-md-8">
                            <select class="form-control" id="suggestion_category" name="suggestion_category_id">
                                <option value="">{{ __('static.suggestion.select_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $suggestion->suggestion_category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('suggestion_category_id')
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
