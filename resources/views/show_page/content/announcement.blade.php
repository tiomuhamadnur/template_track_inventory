@foreach ($announcement as $item)
    <h5 class="notify">● {{ $item->content }}
    </h5>
@endforeach
