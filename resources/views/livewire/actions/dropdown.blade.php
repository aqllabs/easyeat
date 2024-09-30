<details class="dropdown">
    <summary class="m-1 btn">{{ $title }}</summary>
    <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52">
        @foreach($items as $item)
            <li><a>{{ $item }}</a></li>
        @endforeach
    </ul>
</details>
