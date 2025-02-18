<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Members</title>
    <link rel="icon" href="{{ url('/images/faviconsii.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="animasi.css">
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="bg-gray-50">
    <!-- Sidebar -->
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
                <a href="/dashboard/merchandise"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-700 rounded-lg">
                    <i class="fas fa-shopping-bag mr-3"></i>
                    Merchandise
                </a>
                </a>
                <a href="/dashboard/members" class="flex items-center px-4 py-3 text-white bg-blue-600 rounded-lg">
                    <i class="fas fa-users mr-3"></i>
                    Members
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Members Management</h1>
                <p class="text-gray-600">Manage all organization members</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <i class="fas fa-bell text-gray-600 text-xl"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-4 h-4 text-xs flex items-center justify-center">3</span>
                </div>
                <div class="flex items-center space-x-2">
                    <img src="/api/placeholder/32/32" class="w-8 h-8 rounded-full">
                    <span class="text-gray-700">Admin User</span>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-600">Total Members</h3>
                    <div class="bg-green-100 p-2 rounded-full">
                        <i class="fas fa-users text-green-600"></i>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-2xl font-bold">{{ count($data) }}</span>
                    <span class="text-green-500 text-sm"></span>
                </div>
            </div>
            <!-- Add other stat cards as needed -->
        </div>

        <!-- Members Table -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="p-6 flex justify-between items-center border-b">
                <h2 class="text-xl font-semibold">Members List</h2>
                <a href="/dashboard/members/tambah"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add New Member
                </a>
            </div>
            <div class="p-6">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-500 border-b">
                            <th class="pb-4 font-medium">Member</th>
                            <th class="pb-4 font-medium">Position</th>
                            <th class="pb-4 font-medium">Tanngal Lahir</th>
                            <th class="pb-4 font-medium">Social Media</th>
                            <th class="pb-4 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($data as $member)
                            <tr>
                                <td class="py-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{url($member->profilePicture['tampakDepan'])}}" class="w-10 h-10 rounded-full object-cover">
                                        <div>
                                            <div class="font-medium">{{ $member->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $member->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">{{ $member->jabatan }}</td>
                                <td class="py-4">{{ $member->ulangTahun }}</td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        @if ($member->sosialMedia['linkedin'])
                                            <a href="{{ $member->sosialMedia['linkedin'] }}"
                                                class="text-blue-600 hover:text-blue-800"><i
                                                    class="fab fa-linkedin"></i></a>
                                        @endif
                                        @if ($member->sosialMedia['twitter'])
                                            <a href="{{ $member->sosialMedia['twitter'] }}"
                                                class="text-blue-400 hover:text-blue-600"><i
                                                    class="fab fa-twitter"></i></a>
                                        @endif
                                        @if ($member->sosialMedia['instagram'])
                                            <a href="{{ $member->sosialMedia['instagram'] }}"
                                                class="text-pink-600 hover:text-pink-800"><i
                                                    class="fab fa-instagram"></i></a>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="text-red-600 hover:text-red-800"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for Add/Edit Member -->
    <div id="memberModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-8 w-full max-w-2xl">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Add New Member</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form class="space-y-6" action="/dashboard/members" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="nama" class="block text-gray-700 mb-2">Full Name</label>
                        <input name="nama" id="name" type="text"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="posisi" class="block text-gray-700 mb-2">Position</label>
                        <select name="posisi" id="posisi" type="text"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="Koordinator">Koordinator</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Kadiv Kominfo">Kadiv Kominfo</option>
                            <option value="Kadiv PSDM">Kadiv PSDM</option>
                            <option value="Kadiv LitBang">Kadiv LitBang</option>
                            <option value="Kadiv Kewirausahaan">Kadiv Kewirausahaan</option>
                            <option value="Anggota Kominfo">Anggota Kominfo</option>
                            <option value="Anggota PSDM">Anggota PSDM</option>
                            <option value="Anggota Kewirausahaan">Anggota Kewirausahaan</option>
                            <option value="Anggota LitBang">Anggota LitBang</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2" for="NPM">NPM</label>
                    <input name="NPM" id="NPM"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" type="text">
                </div>

                <div>
                    <label for="tampakDepan" class="block text-gray-700 mb-2">Foto Tampak Depan</label>
                    <div class="border-2 border-dashed rounded-lg p-6 text-center">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Drag and drop your photo here or click to browse</p>
                        <input name="tampakDepan" id="tampakDepan" type="file" class="hidden" onchange="previewImage(event, 'tampakDepanPreview')">
                        <!-- Make sure the file input is clickable, it's hidden by default but still accessible for user interaction -->
                        <label for="tampakDepan" class="cursor-pointer text-blue-600">Choose File</label>
                    </div>
                    <div id="tampakDepanPreview" class="mt-4 hidden">
                        <img id="tampakDepanImage" src="#" alt="Preview" class="w-32 h-32 object-cover rounded-lg" />
                    </div>
                </div>
                
                <div>
                    <label for="tampakBelakang" class="block text-gray-700 mb-2">Foto Tampak Belakang</label>
                    <div class="border-2 border-dashed rounded-lg p-6 text-center">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Drag and drop your photo here or click to browse</p>
                        <input name="tampakBelakang" id="tampakBelakang" type="file" class="hidden" onchange="previewImage(event, 'tampakBelakangPreview')">
                        <!-- Ensure that file input is clickable -->
                        <label for="tampakBelakang" class="cursor-pointer text-blue-600">Choose File</label>
                    </div>
                    <div id="tampakBelakangPreview" class="mt-4 hidden">
                        <img id="tampakBelakangImage" src="#" alt="Preview" class="w-32 h-32 object-cover rounded-lg" />
                    </div>
                </div>
                {{-- <div>
                    <label for="tampakDepan" class="block text-gray-700 mb-2">Foto Tampak Depan</label>
                    <div class="border-2 border-dashed rounded-lg p-6 text-center">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Drag and drop your photo here or click to browse</p>
                        <input name="tampakDepan" id="tampakDepan" class="" type="file" multiple>
                    </div>
                </div>

                <div>
                    <label for="tampakBelakang" class="block text-gray-700 mb-2">Foto Tampak Belakang</label>
                    <div class="border-2 border-dashed rounded-lg p-6 text-center">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Drag and drop your photo here or click to browse</p>
                        <input name="tampakBelakang" id="tampakBelakang" type="file" class="">
                    </div>
                </div> --}}

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <input name="email" id="email" type="email"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="tglLahir" class="block text-gray-700 mb-2">Birth Date</label>
                        <input name="tglLahir" id="tglLahir" type="date"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label for="motivasi" class="block text-gray-700 mb-2">Motivation</label>
                    <textarea name="motivasi" id="motivasi" rows="3"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div>
                        <label for="linkedin" class="block text-gray-700 mb-2">LinkedIn</label>
                        <input name="linkedin" id="linkedin" type="url"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="twitter" class="block text-gray-700 mb-2">Twitter</label>
                        <input name="twitter" id="twitter" type="url"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="instagram" class="block text-gray-700 mb-2">Instagram</label>
                        <input name="instagram" id="instagram" type="url"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal()"
                        class="px-6 py-2 border rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save Member
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('memberModal').classList.remove('hidden');
            document.getElementById('memberModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('memberModal').classList.add('hidden');
            document.getElementById('memberModal').classList.remove('flex');
        }

        function previewImage(event, previewId) {
        const file = event.target.files[0];
        const previewElement = document.getElementById(previewId);
        const previewImage = previewElement.querySelector('img');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewElement.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        }
    }
    </script>
</body>

</html>
