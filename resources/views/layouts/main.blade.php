<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="/assets/icons/favicon.png">
        <title>@yield('title')</title>

		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
		<script src="https://kit.fontawesome.com/029424212f.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

		<style>
			.scrollbar-hide::-webkit-scrollbar {
			  display: none;
			}
			
			.scrollbar-hide {
			  -ms-overflow-style: none;
			  scrollbar-width: none;
			}
			
			html {
			  scroll-behavior: smooth;
			}
		  </style>

	</head>
<body>

    <header>

        @include('partials.header_man') 
    </header>
    
    <main>
        @yield('content')
    </main>

    <footer>
        @include('partials.footer')
    </footer>

    
	<script>
		document.querySelector('.circl_nv').addEventListener('click', function() {
			const menu = document.querySelector('.menu_nv');
			menu.classList.toggle('hidden');
		});
	</script>

</body>
</html>
