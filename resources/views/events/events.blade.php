<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @foreach ($event as $event )
  <title>{{ $event->judul }} - Unitas Sistem Informasi</title>
  @endforeach
  <style>
    .event-description p {
      margin-bottom: 1em;
    }
  </style>
  <link rel="shortcut icon" href="img/Logo unitas si.jpg" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="animasi.css">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>

  <header class="bg-blue-500 text-white py-8 sticky top-0 z-10">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Unitas Sistem Informasi</h1>
        <nav>
          <ul class="space-x-4 hidden lg:flex">
            <li><a href="/" class="hover:text-blue-200">Home</a></li>
            <li><a href="/#about" class="hover:text-blue-200">About</a></li>
            <li><a href="/#events" class="hover:text-blue-200">Events</a></li>
            <li><a href="/#merchandise" class="hover:text-blue-200">Merchandise</a></li>
            <li><a href="/member" class="hover:text-blue-200">Members</a></li>
            <li><a href="/#contact" class="hover:text-blue-200">Contact</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <section id="event-detail" class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <img src="{{ asset($event->image[0]) }}" alt="{{ $event->judul }}" class="w-full h-96 object-cover">
        <div class="p-6">
          <h2 class="text-4xl font-bold">{{ $event->judul }}</h2>
          <h5 class="text-slate-400 mb-3">{{$event->category->name}}</h5>
          <p class="text-blue-500 font-medium mb-4">{{ \Carbon\Carbon::parse($event->tglPelaksanaan)->format('d F, Y') }}</p>
          <div class="event-description">
            {!! $event->body_with_links !!}
          </div>
        </div>
      </div>
      <a href="/#events" class="text-blue-500 hover:text-blue-700 mt-6 inline-block">Back to Events</a>
    </div>
  </section>

</body>
</html>
