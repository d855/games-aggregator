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
						<div id="memberRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
							@push('scripts')
								@include('_rating', [
										'slug' => 'memberRating',
										'rating' => $game['memberRating'],
										'event' => null
                                    ])
							@endpush
						</div>
						<div class="ml-4 text-xs">Member <br> score</div>
					</div>
					<div class="flex items-center ml-12">
						<div id="criticRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
							@push('scripts')
								@include('_rating', [
										'slug' => 'criticRating',
										'rating' => $game['criticRating'],
										'event' => null
                                    ])
							@endpush
						</div>
						<div class="ml-4 text-xs">Critic <br> score</div>
					</div>
				</div>

				<p class="mt-12">
					{{ $game['summary'] }}
				</p>
				<div class="mt-12" x-data="{ isTrailerModalVisible: false }">
					<!-- TODO: create a modal for trailer -->
					<button @click="isTrailerModalVisible = true"
					        class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
						<svg class="w-6 fill-current" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
						</svg>
						<span class="ml-2">Play trailer</span>
					</button>
					<template x-if="isTrailerModalVisible">
						<div x-show="isTrailerModalVisible" style="background-color: rgba(0, 0, 0, .5)"
						     class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
							<div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
								<div class="bg-gray-900 rounded">
									<div class="flex justify-end pr-4 pt-2">
										<button @click="isTrailerModalVisible = false"
										        @keydown.escape.window="isTrailerModalVisible = false"
										        class="text-3xl leading-none hover:text-gray-300">&times;
										</button>
									</div>
									<div class="modal-body p-8">
										<div class="responsive-container overflow-hidden relative"
										     style="padding-top: 56.25%">
											<iframe src="{{ $game['trailer'] }}"
											        width="560"
											        height="315"
											        class="responsive-iframe absolute top-0 left-0 w-full h-full"
											        style="border: 0;"
											        allow="autoplay; encrypted-media"
											        allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
					</template>
				</div>
			</div>
		</div><!-- end game details -->

		<div x-data="{ isImageModalVisible: false, image: '' }"
		     class="images-container border-b border-gray-800 pb-12 mt-8">
			<h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
				@foreach($game['screenshots'] as $screenshot)
					<div>
						<a href="#" @click.prevent="isImageModalVisible = true; image='{{ $screenshot['huge'] }}'" class="">
							<img src="{{ $screenshot['big'] }}"
							     alt="alternate"
							     class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
					</div>
				@endforeach
			</div>
			<template x-if="isImageModalVisible">
				<div x-show="isImageModalVisible" style="background-color: rgba(0, 0, 0, .5)"
				     class="fixed z-50 top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
					<div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
						<div class="bg-gray-900 rounded">
							<div class="flex justify-end pr-4 pt-2">
								<button @click="isImageModalVisible = false"
								        @keydown.escape.window="isImageModalVisible = false"
								        class="text-3xl leading-none hover:text-gray-300">&times;
								</button>
							</div>
							<div class="modal-body p-8">
								<img :src="image" alt=screenshot"">
							</div>
						</div>
					</div>
				</div>
			</template>

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