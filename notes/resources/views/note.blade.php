<div class="card p-4 mb-1">
    <div class="row">
        <div class="col">
            <h4 class="text-info">{{ $item['title'] }}</h4>
            <small class="text-secondary"><span class="opacity-75 me-2">Created at:</span><strong>{{ $item['created_at'] }}</strong></small>

            @if($item['updated_at'] != null)
                <small class="text-secondary ms-5"><span class="opacity-75 me-2">Edited at:</span><strong> {{ $item['updated_at'] }}
                </strong></small>
            @endif
        </div>
        <div class="col text-end">
            <a href="{{ Route('note.edit', $item['id']) }}" class="btn btn-outline-secondary btn-sm mx-1"><i
                    class="fa-regular fa-pen-to-square"></i></a>
                    {{-- @php
                        $item['id'] = Crypt::encrypt($item['id']);
                    @endphp --}}
            <form class="d-inline" id="formDelete{{ $item['id'] }}" action="{{ Route('note.destroy', $item['id']) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" data-id="{{ $item['id'] }}" class="btnDelete btn btn-outline-danger btn-sm mx-1"><i
                    class="fa-regular fa-trash-can"></i></button>
            </form>
        </div>
    </div>
    <hr>
    <p class="text-secondary">{{ $item['text'] }}</p>
</div>
