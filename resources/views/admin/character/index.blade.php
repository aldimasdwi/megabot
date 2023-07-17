@extends('admin.layouts.master')

@section('title', __('static.character.all_characters'))

@section('content')
    <div class="card">
        <div class="card-header d-flex card-header d-flex flex-sm-row flex-column gap-sm-0 gap-2 align-items-sm-center">
            <h5>{{ __('static.character.all_characters') }}</h5>
                <div class="btn-popup ms-auto mb-0">
                    <a href="{{ route('character.create') }}" class="btn btn-primary">{{ __('static.create') }}</a>
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
