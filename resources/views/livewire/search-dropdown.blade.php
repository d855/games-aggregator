<div x-data="{ isVisible: true }" @click.away="isVisible=false" class="relative">
	<input wire:model.debounce.300ms="search"
	       type="text"
	       class="bg-gray-800 pl-8 text-sm rounded-full w-64 px-3 py-1 focus:outline-none focus:shadow-outline"
	       @focus="isVisible=true"
	       @keydown.escape.window="isVisible=false"
	       @keydown="isVisible=true"
	       @keydown.shift.tab="isVisible=false"
	       x-ref="search"
	       @keydown.window="
				if(event.keyCode === 191) {
					event.preventDefault();
					$refs.search.focus()
				}
			"
	       placeholder="Search (Press '/' to focus)">
	<div class="absolute top-0 flex items-center h-full ml-2">
		<svg class="text-gray-400 w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
			<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
		</svg>
	</div>

	<div wire:loading class="spinner top-0 right-0 mr-4 mt-3" style="position: absolute"></div>

	@if(strlen($search) >= 2)
		<div x-show="isVisible"
		     x-transition.opacity.duration.550
		     class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2">
			@if(count($searchResults) > 0)
				<ul>
					@foreach($searchResults as $game)
						<li class="border-b border-gray-700">
							<a href="{{ route('games.show', $game['slug']) }}"
							   @if($loop->last) @keydown.tab="isVisible=false" @endif
							   class="block hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-3 py-3">
								@if(isset($game['cover']))
									<img src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}"
									     class="w-10"
									     alt="cover">
								@else
									<img src="https://via.placeholder.com/264x352" alt="game cover" class="w-10">
								@endif
								<span class="ml-4">{{ $game['name'] }}</span>
							</a>
						</li>
					@endforeach
				</ul>
			@else
				<div class="px-3 py-3">No results for "{{ $search }}"</div>
			@endif
		</div>
	@endif
</div>