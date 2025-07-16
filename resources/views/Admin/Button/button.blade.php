@if (Route::currentRouteName() === 'admin.user')
    @if ($data->role !== 'User')
        <!-- Show all buttons for roles other than 'User' -->
        <button title="Change Password" type="button"
            class="btn p-0 m-0 mx-1 bg-transparent border-0 text-info resetUserBtn" data-id="{{ $data->id }}">
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
@else
    <!-- Default buttons for all roles on other routes -->
    <button title="Edit" type="button" class="btn p-0 m-0 mx-1 bg-transparent border-0 text-warning editUserButton"
        data-id="{{ $data->id }}">
        <i class="fas fa-pencil-alt"></i>
    </button>

    <button title="Delete" type="button" class="btn p-0 m-0 mx-1 bg-transparent border-0 text-danger deleteData"
        data-id="{{ $data->id }}">
        <i class="fas fa-trash-alt"></i>
    </button>
@endif
