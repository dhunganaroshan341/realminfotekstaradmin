@php
    $isAdmin = auth()->check() && auth()->user()->role === 'Admin';
@endphp

@if ($isAdmin)
    <!-- Show to logged-in admin only -->
    <button title="Change Password" type="button" class="btn p-0 m-0 mx-1 bg-transparent border-0 text-info resetUserBtn"
        data-id="{{ $data->id }}">
        <i class="fas fa-lock"></i>
    </button>

    <button title="Edit" type="button" class="btn p-0 m-0 mx-1 bg-transparent border-0 text-warning editUserButton"
        data-action="edit" data-id="{{ $data->id }}">
        <i class="fas fa-pencil-alt"></i>
    </button>

    <button title="Delete" type="button" class="btn p-0 m-0 mx-1 bg-transparent border-0 text-danger deleteData"
        data-id="{{ $data->id }}">
        <i class="fas fa-trash-alt"></i>
    </button>
@endif
