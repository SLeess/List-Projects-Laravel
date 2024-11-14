<div class="row">
    <div class="col">
        <h4 class="text-info">{{ $item['title'] }}</h4>
        <small class="text-secondary"><span class="opacity-75 me-2">Created
                at:</span><strong>{{ \Carbon\Carbon::parse($item['created_at'])->format('d-m-Y h:i') }}</strong></small>
    </div>
    <div class="col text-end">
        <a href="#" class="btn btn-outline-secondary btn-sm mx-1"><i
                class="fa-regular fa-pen-to-square"></i></a>
        <a href="#" class="btn btn-outline-danger btn-sm mx-1"><i
                class="fa-regular fa-trash-can"></i></a>
    </div>
</div>
<hr>
<p class="text-secondary">{{ $item['text'] }}</p>
