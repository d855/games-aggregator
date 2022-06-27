<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
		      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Games aggregator</title>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<livewire:styles/>
	</head>
	<body class="bg-gray-900 text-white">
		<header class="border-b border-gray-800">
			<nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
				<div class="flex flex-col lg:flex-row items-center">
					<a href="/">Logo</a>

					<ul class="flex items-center lg:ml-16 space-x-3 mt-6 lg:mt-0">
						<li><a href="#" class="hover:text-gray-400">Games</a></li>
						<li><a href="#" class="hover:text-gray-400">Reviews</a></li>
						<li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
					</ul>
				</div>

				<div class="flex items-center mt-6 lg:mt-0">
					<div class="relative">
						<input type="text" class="bg-gray-800 pl-8 text-sm rounded-full w-64 px-3 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
						<div class="absolute top-0 flex items-center h-full ml-2">
							<svg class="text-gray-400 w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
							</svg>
						</div>
					</div>

					<div class="ml-6">
						<a href="#"><img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?f=y" alt="avatar" class="rounded-full w-8"></a>
					</div>
				</div>
			</nav>
		</header>

		<main class="py-8">
			@yield('content')
		</main>

		<footer class="border-t border-gray-800">
			<div class="container mx-auto px-4 py-6 text-xs">
				Created by d855 with help of Laracast and <a href="#" class="underline hover:text-gray-400">IGDB API</a>
			</div>
		</footer>

		<livewire:scripts/>
		<script src="/js/app.js"></script>
		@stack('scripts')
	</body>
</html>