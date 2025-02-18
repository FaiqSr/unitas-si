<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unitas Sistem Informasi</title>
    <link rel="icon" href="{{ url('/images/faviconsii.png') }}" type="image/png">
    <link rel="stylesheet" href="animasi.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-white">

    <!-- Sidebar -->
    <div class="sm:fixed sm:block inset-y-0 left-0 w-64 bg-navy-800 hidden" style="background-color: #1B2A4A;">
        <div class="flex items-center justify-center h-20 bg-navy-900" style="background-color: #152238;">
            <div class="flex items-center space-x-3">
                <i class="fas fa-cube text-white text-2xl"></i>
                <span class="text-white text-xl font-bold">AdminPanel</span>
            </div>
        </div>
        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-white bg-blue-600 rounded-lg">
                    <i class="fas fa-home mr-3"></i>
                    Dashboard
                </a>
                <a href="/dashboard/events" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-700 rounded-lg">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Events
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Top Bar -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Add New Event</h1>
                <p class="text-gray-600">Fill out the form below to create a new event.</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="flex items-center text-gray-600 hover:text-gray-800">
                    <i class="fas fa-bell text-xl"></i>
                </button>
                <div class="flex items-center space-x-2">
                    <img src="/api/placeholder/32/32" class="h-8 w-8 rounded-full">
                    <span class="text-gray-700">Admin User</span>
                </div>
            </div>
        </div>

        <!-- Event Form -->
        <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
            @foreach($events as $event)
            <form action="/dashboard/events/put" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <input type="hidden" name="id" value="{{$event->id}}">
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Enter event title" value="{{$event->judul}}" required>
                </div>

                <div>
                    <label for="body" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="body" name="body" rows="4" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Enter event description" required>{{$event->body}}</textarea>
                </div>

                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Event Date</label>
                    <input type="date" id="date" name="date" class="w-full mt-1 p-2 border border-gray-300 rounded-md" required value="{{$event->tglPelaksanaan}}">
                </div>

                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="kategori" name="kategori" class="w-full mt-1 p-2 border border-gray-300 rounded-md" required>
                        @foreach($kategori as $kategoriItem)
                        <option value="{{$kategoriItem->id}}" {{$event->category_id == $kategoriItem->id ? 'selected' : ''}}>{{$kategoriItem->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" class="w-full mt-1 p-2 border border-gray-300 rounded-md" required>
                        <option value="upcoming" {{ $event->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="ongoing" {{ $event->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="draft" {{ $event->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                    
                </div>

                <!-- Image Upload with Preview -->
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700">Upload Images</label>
                    <input type="file" id="images" name="images[]" class="w-full mt-1 p-2 border border-gray-300 rounded-md" accept="image/*" multiple onchange="previewImages()" required>
                    <div id="imagePreview" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Event</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>

    <script>
        function previewImages() {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = ''; // Clear existing previews

            const files = document.getElementById('images').files;
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('h-24', 'w-24', 'object-cover', 'rounded-md', 'shadow-md');
                    imagePreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }

    </script>
</body>
</html>
