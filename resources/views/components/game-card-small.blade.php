<div class="game flex">
    <a href="#">
        @if(array_key_exists('cover', $game))
            <img src="{{ $game['coverImageUrl'] }}"
                 alt="game cover"
                 class="hover:opacity-75 transition ease-in-out duration-150">
        @endif
    </a>

    <div class="ml-4">
        <a href="#" class="hover:text-gray-300">{{ $game['name'] }}</a>
        <p class="text-gray-400 text-sm mt-1">{{ $game['release_date'] }}</p>
    </div>
</div>