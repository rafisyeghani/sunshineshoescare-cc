{{-- ACTIONS SECTION --}}
<div class="d-flex">
    <a href="{{ route('transactions.show', ['transaction' => $transaction->id]) }}"
        class="btn btn-outline-dark btn-sm me-2"><i class="fa fa-server"></i></a>
    <a href="{{ route('transactions.edit', ['transaction' => $transaction->id]) }}"
        class="btn btn-outline-dark btn-sm me-2"><i class="fa fa-pencil-square"></i></a>
    <div>
        <form
            action="{{ route('transactions.destroy', ['transaction' => $transaction->id]) }}"
            method="POST">
            @csrf
            @method('delete')
            <button type="submit"
                class="btn btn-outline-dark btn-sm me-2"><i
                    class="fa fa-trash"></i></button>
        </form>
    </div>
</div>
