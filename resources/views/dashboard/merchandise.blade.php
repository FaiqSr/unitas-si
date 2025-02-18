<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise Management - Admin Dashboard</title>
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
                <a href="/dashboard/events"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-700 rounded-lg">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Events
                </a>
                <a href="/dashboard/merchandise" class="flex items-center px-4 py-3 text-white bg-blue-600 rounded-lg">
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
                <h1 class="text-2xl font-bold text-gray-800">Merchandise Management</h1>
                <p class="text-gray-600">Manage your product inventory</p>
            </div>
            <a href="/dashboard/merchandise/tambah"
                class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                <i class="fas fa-plus mr-2"></i>
                Add New Product
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Products</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ count($merchs) }}</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-box text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Low Stock Items</p>
                        <h3 class="text-2xl font-bold text-gray-800">5</h3>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-exclamation-triangle text-yellow-600 text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Out of Stock</p>
                        <h3 class="text-2xl font-bold text-gray-800"></h3>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full">
                        <i class="fas fa-times-circle text-red-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="mb-6 flex justify-between items-center">
            <div class="flex space-x-4">
                <select class="px-4 py-2 border rounded-lg">
                    <option>All Categories</option>
                    <option>T-Shirts</option>
                    <option>Hoodies</option>
                    <option>Accessories</option>
                </select>
                <select class="px-4 py-2 border rounded-lg">
                    <option>All Status</option>
                    <option>In Stock</option>
                    <option>Low Stock</option>
                    <option>Out of Stock</option>
                </select>
                <select class="px-4 py-2 border rounded-lg">
                    <option>Sort by Price</option>
                    <option>Lowest to Highest</option>
                    <option>Highest to Lowest</option>
                </select>
            </div>
            <div class="flex items-center bg-white border rounded-lg px-3 py-2">
                <i class="fas fa-search text-gray-400 mr-2"></i>
                <input type="text" placeholder="Search products..." class="outline-none">
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Product Card 1 -->
            @foreach ($merchs as $merch)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative">
                        <img src="{{ url($merch->image[0]) }}" class="w-full h-48 object-cover">
                        @if ($merch->stok == 0)
                            <span
                                class="absolute top-2 right-2 px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">Out
                                of Stock</span>
                        @endif
                        @if ($merch->stok > 0 && $merch->stok <= 10)
                            <span
                                class="absolute top-2 right-2 px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">Low
                                Stock</span>
                        @endif
                        @if ($merch->stok > 10)
                            <span
                                class="absolute top-2 right-2 px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">In
                                Stock</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="mb-4">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $merch->nama }}</h3>
                                <span class="text-lg font-bold text-blue-600">Rp{{ $merch->harga }}</span>
                            </div>
                            <p class="text-gray-500 text-sm">Category: T-Shirts</p>
                        </div>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($merch->body, 40, '...') }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-box text-gray-400"></i>
                                <span class="text-gray-600">Stock: {{ $merch->stok }}</span>
                            </div>
                            <div class="flex space-x-2">
                                <a href="/dashboard/merchandise/sunting/{{$merch->id}}" class="p-2 text-blue-600 hover:bg-blue-50 rounded">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{url('/dashboard/merchandise/hapus')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$merch->id}}">
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-8 ">
            {{ $merchs->links() }}
        </div>
    </div>
</body>

</html>
