<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="{{ url('/images/faviconsii.png') }}" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-white">
    <!-- Sidebar -->
    <div class="sm:fixed sm:block inset-y-0 left-0 w-64 bg-navy-800 hidden" style="background-color: #1B2A4A;">
        <div class="flex items-center justify-center h-20 bg-navy-900" style="background-color: #152238;">
            <!-- Logo -->
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
                <a href="/dashboard/events"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-700 rounded-lg">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Events
                </a>
                <a href="/dashboard/merchandise"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-700 rounded-lg">
                    <i class="fas fa-shopping-bag mr-3"></i>
                    Merchandise
                </a>
                <a href="/dashboard/members"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-700 rounded-lg">
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
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
                <p class="text-gray-600">Welcome back, Admin!</p>
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

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Events Stats -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Events</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ count($events) }}</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-calendar text-blue-600 text-xl"></i>
                    </div>
                </div>
                <p class="text-green-600 text-sm mt-4">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span></span>
                </p>
            </div>

            <!-- Merchandise Stats -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Products</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ count($merchs) }}</h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-shopping-bag text-purple-600 text-xl"></i>
                    </div>
                </div>
                <p class="text-green-600 text-sm mt-4">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span></span>
                </p>
            </div>

            <!-- Messages Stats -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">New Messages</p>
                        <h3 class="text-2xl font-bold text-gray-800">8</h3>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-envelope text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <p class="text-red-600 text-sm mt-4">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span></span>
                </p>
            </div>

            <!-- Members Stats -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Members</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ count($members) }}</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                </div>
                <p class="text-green-600 text-sm mt-4">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span></span>
                </p>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Events -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Recent Events</h3>
                    <a href="/dashboard/events" class="text-blue-600 hover:text-blue-800">View all</a>
                </div>
                <div class="space-y-4">
                    @foreach ($events as $event)
                        <div class="flex items-center space-x-4 mb-2">
                            <img src="{{ url($event->image[0]) }}" class="h-12 w-12 rounded-lg object-cover">
                            <div>
                                <h4 class="font-medium text-gray-800">{{ $event->judul }}</h4>
                                <p class="text-sm text-gray-500">{{ $event->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @if ($loop->iteration == 3)
                        @break
                    @endif
                @endforeach
            </div>
            {{-- <div class="flex items-center space-x-4">
                        <img src="/api/placeholder/48/48" class="h-12 w-12 rounded-lg object-cover">
                        <div>
                            <h4 class="font-medium text-gray-800">Networking Meetup</h4>
                            <p class="text-sm text-gray-500">Nov 20, 2024</p>
                        </div>
                    </div> --}}
        </div>
        
        <!-- Recent Members -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">New Members</h3>
                <a href="/dashboard/members" class="text-blue-600 hover:text-blue-800">View all</a>
            </div>
            <div class="space-y-4">
                @foreach ($members as $member)
                    <div class="flex items-center space-x-4">
                        <img src="{{ url($member->profilePicture['tampakDepan']) }}"
                            class="h-12 w-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-medium text-gray-800">{{ $member->name }}</h4>
                            <p class="text-sm text-gray-500">{{ $member->jabatan }}</p>
                        </div>
                    </div>
                    @if ($loop->iteration == 3)
                    @break
                @endif
            @endforeach
        </div>
    </div>

</div>

</body>

</html>
