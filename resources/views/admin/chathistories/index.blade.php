@extends('admin.layouts.master')

@section('title', __('static.chat_histories.all_chat_histories'))

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('static.chat_histories.all_chat_histories') }}</h5>
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
