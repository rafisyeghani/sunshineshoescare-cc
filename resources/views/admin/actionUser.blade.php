{{-- ACTIONS SECTION --}}
<div class="d-flex">
    <a href="{{ route('users.show', ['user' => $user->id]) }}"
        class="btn btn-outline-dark btn-sm me-2"><i class="fa fa-server"></i></a>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}"
        class="btn btn-outline-dark btn-sm me-2"><i class="fa fa-pencil-square"></i></a>
    <div>
        <form
            action="{{ route('users.destroy', ['user' => $user->id]) }}"
            method="POST">
            @csrf
            @method('delete')
            <button type="submit"
                class="btn btn-outline-dark btn-sm me-2"><i
                    class="fa fa-trash"></i></button>
        </form>
    </div>
</div>
