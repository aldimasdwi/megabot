@isset($data)
    @isset($edit)
        <a href="{{ route($edit, $data->id) }}">
            <i class="edit-icon ri-edit-box-line"></i>
        </a>
    @endisset

    @isset($select)
        <input type="checkbox" name="row" class="rowClass" value="{{ $data->id }}" id="rowId' . {{ $data->id }} . '">
    @endisset

    @isset($status)
        <form method="PUT">
            <div class="form-check form-switch">
                <input class="form-check-input" name="status" type="checkbox" value="{{ $data->id }}"
                    id="status"@if ($data->status == true) checked @endif
                    @if ($data->role == 'admin') disabled @endif>
            </div>
        </form>
    @endisset

    @isset($image)
        <img src="{{ $character->image_url }}" alt="">
    @endisset

    @isset($delete)
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#confirmationModal{{ $data->id }}">
            <i class="remove-icon ri-delete-bin-line"></i>
        </a>
        <!-- Delete Confirmation -->
        <div class="modal fade" id="confirmationModal{{ $data->id }}" tabindex="-1"
            aria-labelledby="confirmationModalLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel{{ $data->id }}">
                            {{ __('static.confirmation') }}
                        </h5>
                        {!! Form::button(null, ['class' => 'btn-close', 'data-bs-dismiss' => 'modal']) !!}
                    </div>
                    <div class="modal-body text-start">
                        <img class="delete-gif" src="http://127.0.0.1:8000/admin/images/gif/delete.gif" alt="">
                        {{ __('static.delete_message') }}
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['route' => [$delete, $data->id], 'method' => 'DELETE']) !!}

                        {!! Form::button(__('static.cancel'), ['class' => 'btn btn-secondary cancel', 'data-bs-dismiss' => 'modal']) !!}

                        {!! Form::submit(__('static.delete'), ['class' => 'btn btn-primary delete']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endisset

@endisset
