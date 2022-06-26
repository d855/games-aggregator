<div wire:init="loadMostAnticipated" class="most-anticipated-container space-y-10 mt-8">
	@foreach($mostAnticipated as $game)
		<div class="game flex">
			<a href="#">
				@if(array_key_exists('cover', $game))
					<img src="{{ Str::replacefirst('thumb', 'cover_small', $game['cover']['url']) }}"
					     alt="game cover"
					     class="hover:opacity-75 transition ease-in-out duration-150">
				@endif
			</a>

			<div class="ml-4">
				<a href="#" class="hover:text-gray-300">{{ $game['name'] }}</a>
				<p class="text-gray-400 text-sm mt-1">{{ Carbon\Carbon::parse($game['first_release_date'])->format('d M, Y') }}</p>
			</div>
		</div>
	@endforeach
</div>