@extends('admin.layouts.master')

@section('title', __('static.suggestion.all_suggestions'))

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-sm-row flex-column gap-sm-0 gap-2 align-items-sm-center">
            <h5>{{ __('static.suggestion.all_suggestions') }}</h5>
            <div class="btn-popup ms-sm-auto ms-0 mb-0">
                <a href="{{ route('suggestion.create') }}" class="btn btn-primary">{{ __('static.create') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
@endsection

@push('js')
    {!! $dataTable->scripts() !!}
@endpush
