<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Management - Admin Dashboard</title>
    <link rel="icon" href="{{ url('/images/faviconsii.png') }}" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white">
    <!-- Sidebar (same as dashboard) -->
    <div class="fixed inset-y-0 left-0 w-64 bg-navy-800" style="background-color: #1B2A4A;">
        <div class="flex items-center justify-center h-20 bg-navy-900" style="background-color: #152238;">
            <div class="flex items-center space-x-3">
                <i class="fas fa-cube text-white text-2xl"></i>
                <span class="text-white text-xl font-bold">AdminPanel</span>
            </div>
        </div>
        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-700 rounded-lg">
                    <i class="fas fa-home mr-3"></i>
                    Dashboard
                </a>
                <a href="/dashboard/events" class="flex items-center px-4 py-3 text-white bg-blue-600 rounded-lg">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Events
                </a>
                <a href="/dashboard/merchandise" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-700 rounded-lg">
                    <i class="fas fa-shopping-bag mr-3"></i>
                    Merchandise
                </a>
                </a>
                <a href="/dashboard/members" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-700 rounded-lg">
                    <i class="fas fa-users mr-3"></i>
                    Members
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Top Bar -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Events Management</h1>
                <p class="text-gray-600">Manage all your events here</p>
            </div>
            <a href="/dashboard/events/tambah" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                <i class="fas fa-plus mr-2"></i>
                Add New Event
            </a>
        </div>

        <!-- Filters and Search -->
        <div class="mb-6 flex justify-between items-center">
            <div class="flex space-x-4">
                <select class="px-4 py-2 border rounded-lg">
                    <option>All Categories</option>
                    @foreach ($categories as $category )
                    <option>{{$category->name}}</option>
                    @endforeach
                </select>
                <select class="px-4 py-2 border rounded-lg">
                    <option>All Status</option>
                    <option>Upcoming</option>
                    <option>Ongoing</option>
                    <option>Past</option>
                </select>
            </div>
            <div class="flex items-center bg-white border rounded-lg px-3 py-2">
                <i class="fas fa-search text-gray-400 mr-2"></i>
                <input type="text" placeholder="Search events..." class="outline-none">
            </div>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Event Card 1 -->



            @foreach ($events as $event )
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset($event->image[0]) }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $event->judul }}</h3>
                            <p class="text-gray-600">{{ $event->created_at->diffForHumans() }}</p>
                        </div>
                        @if($event->status == 'upcoming')
                        <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">Upcoming</span>
                        @elseif ($event->status == "ongoing")
                        <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">Ongoing</span>
                        @elseif($event->status == "draft")
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">Draft</span>
                        @endif
                        
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{Str::limit($event->body, 100, '...')}}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-user-friends text-gray-400"></i>
                            <span class="text-gray-600">150 Attendees</span>
                        </div>
                        <div class="flex space-x-2">
                            <a href="/dashboard/events/sunting/{{$event->id}}" class="p-2 text-blue-600 hover:bg-blue-50 rounded">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{url('/dashboard/events/hapus')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$event->id}}">
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Event Card 2 -->
            {{-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="/api/placeholder/400/200" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Networking Meetup</h3>
                            <p class="text-gray-600">Nov 20, 2024</p>
                        </div>
                        <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">Ongoing</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">Monthly networking event for professionals in the tech industry...</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-user-friends text-gray-400"></i>
                            <span class="text-gray-600">75 Attendees</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Event Card 3 -->
            {{-- <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="/api/placeholder/400/200" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Workshop Series</h3>
                            <p class="text-gray-600">Nov 25, 2024</p>
                        </div>
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">Draft</span>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-2">Hands-on workshop series covering various programming topics...</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-user-friends text-gray-400"></i>
                            <span class="text-gray-600">0 Attendees</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Pagination -->
        <div class="mt-8">
                {{ $events->links() }}
        </div>
    </div>
</body>
</html>