<div wire:init="loadRecentlyReviewed" class="recently-reviewed-container space-y-12 mt-8">
	@forelse($recentlyReviewed as $game)
		<div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
			<div class="relative flex-none">
				<a href="{{ route('games.show', $game['slug']) }}">
					<img src="{{ $game['coverImageUrl'] }}"
					     alt="game cover"
					     class="hover:opacity-75 transition w-48 ease-in-out duration-150">
				</a>
				<div id="review_{{ $game['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
				     style="right: -20px; bottom: -20px;">
				</div>
			</div>
			<div class="ml-12">
				<a href="{{ route('games.show', $game['slug']) }}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
					{{ $game['name'] }}
				</a>
				<div class="text-gray-400 mt-1">
					{{ $game['platforms'] }}
				</div>

				<p class="mt-6 text-gray-400 hidden lg:block">
					{{ $game['summary'] }}
				</p>
			</div>
		</div>
	@empty
		@foreach(range(1, 3) as $item)
			<div class="game animate-pulse bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
				<div class="relative flex-none">
					<div class="bg-gray-700 w-32 lg:w-48 h-40 lg:h-56 rounded"></div>
				</div>
				<div class="ml-12">
					<div class="inline-block text-lg bg-gray-700 text-transparent rounded leading-tight mt-4">
						Title goes here
					</div>
					<div class="mt-8 space-y-4 hidden lg:block">
						<span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet.</span>
						<span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet.</span>
						<span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet.</span>
					</div>
				</div>
			</div>
		@endforeach
	@endforelse
</div>

@push('scripts')
	@include('_rating', [
        'event' => 'reviewGameWithRating'
	])
@endpush