@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4">
		<div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
			<div class="flex-none">
				<img src="{{ $game['coverImageUrl'] }}"
				     alt="cover"
				     class="w-72">
			</div>
			<div class="lg:ml-12 lg:mr-64">
				<h2 class="font-semibold text-4xl leading-tight mt-1">
					{{ $game['name'] }}
				</h2>
				<div class="text-gray-400">
					<span>
						{{ $game['genres'] }}
					</span>
					&middot;
					<span>{{ $game['involvedCompanies'] }}</span>
					&middot;
					<span>
						{{ $game['platforms'] }}
					</span>
				</div>

				<div class="flex flex-wrap items-center mt-8">
					<div class="flex items-center">
						<div class="w-16 h-16 bg-gray-800 rounded-full">
							<div class="font-semibold text-xs flex justify-center items-center h-full">
								{{ $game['memberRating'] }}
							</div>
						</div>
						<div class="ml-4 text-xs">Member <br> score</div>
					</div>
					<div class="flex items-center ml-12">
						<div class="w-16 h-16 bg-gray-800 rounded-full">
							<div class="font-semibold text-xs flex justify-center items-center h-full">
								{{ $game['criticRating'] }}
							</div>
						</div>
						<div class="ml-4 text-xs">Critic <br> score</div>
					</div>
				</div>

				<p class="mt-12">
					{{ $game['summary'] }}
				</p>
				<div class="mt-12">
					<!-- TODO: create a modal for trailer -->
					{{--					<button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">--}}
					{{--						<svg class="w-6 fill-current" viewBox="0 0 24 24">--}}
					{{--							<path d="M0 0h24v24H0z" fill="none"></path>--}}
					{{--							<path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>--}}
					{{--						</svg>--}}
					{{--						<span class="ml-2">Play trailer</span>--}}
					{{--					</button>--}}
					@if(array_key_exists('videos', $game))
						<a href="{{ $game['trailer'] }}"
						   class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
							<svg class="w-6 fill-current" viewBox="0 0 24 24">
								<path d="M0 0h24v24H0z" fill="none"></path>
								<path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
							</svg>
							<span class="ml-2">Play trailer</span>
						</a>
					@endif
				</div>
			</div>
		</div><!-- end game details -->

		<div class="images-container border-b border-gray-800 pb-12 mt-8">
			<h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
				@foreach($game['screenshots'] as $screenshot)
					<div>
						<a href="{{ $screenshot['huge'] }}" class="">
							<img src="{{ $screenshot['big'] }}"
							     alt="alternate"
							     class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
					</div>
				@endforeach
			</div>
		</div><!-- end images-container -->

		<div class="similar-games-container pb-12 mt-8">
			<h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar games</h2>
			<div class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 pb-16">
				@foreach($game['similarGames'] as $game)
					<x-game-card :game="$game" />
				@endforeach
			</div>
		</div>

	</div>
@endsection