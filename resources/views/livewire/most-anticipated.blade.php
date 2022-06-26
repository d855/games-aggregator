<div wire:init="loadMostAnticipated" class="most-anticipated-container space-y-10 mt-8">
	@forelse($mostAnticipated as $game)
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
	@empty
		@foreach(range(1,4) as $game)
			<div class="game flex">
				<div class="bg-gray-700 w-16 h-20 flex-none"></div>
				<div class="ml-4">
					<div class="text-transparent bg-gray-700 rounded leading-tight">Title goes here</div>
					<div class="text-transparent bg-gray-700 rounded inline-block text-sm mt-3"> 26 Jun, 2022</div>
				</div>
			</div>
		@endforeach
	@endforelse
</div>