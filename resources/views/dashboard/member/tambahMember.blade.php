<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unitas Sistem Informasi - Add New Merchandise</title>
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
                <h1 class="text-2xl font-bold text-gray-800">Add New Member</h1>
                <p class="text-gray-600">Fill out the form below to add new member.</p>
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

        <!-- Member Form -->
        <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
            <form action="/dashboard/members/tambah" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Enter member name"
                        required>
                </div>

                <div>
                    <label for="NPM" class="block text-sm font-medium text-gray-700">NPM</label>
                    <input type="text" id="NPM" name="NPM"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md" min="0"
                        placeholder="Masukkan NPM" required>
                </div>

                <div>
                    <label for="posisi" class="block text-sm font-medium text-gray-700">Jabatan</label>
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

                <div>
                    <label for="motivasi" class="block text-sm font-medium text-gray-700">Motivasi</label>
                    <textarea id="motivasi" name="motivasi" rows="4" class="w-full mt-1 p-2 border border-gray-300 rounded-md"
                        placeholder="Enter description" required></textarea>
                </div>

                <!-- Image Upload with Preview -->
                <div>
                    <label for="tampakDepan" class="block text-gray-700 mb-2">Foto Tampak Depan</label>
                    <div class="border-2 border-dashed rounded-lg p-6 text-center">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Drag and drop your photo here or click to browse</p>
                        <input name="tampakDepan" id="tampakDepan" type="file" class="hidden"
                            onchange="previewImage(event, 'tampakDepanPreview')">
                        <!-- Make sure the file input is clickable, it's hidden by default but still accessible for user interaction -->
                        <label for="tampakDepan" class="cursor-pointer text-blue-600">Choose File</label>
                    </div>
                    <div id="tampakDepanPreview" class="mt-4 hidden">
                        <img id="tampakDepanImage" src="#" alt="Preview"
                            class="w-32 h-32 object-cover rounded-lg" />
                    </div>
                </div>

                <div>
                    <label for="tampakBelakang" class="block text-gray-700 mb-2">Foto Tampak Belakang</label>
                    <div class="border-2 border-dashed rounded-lg p-6 text-center">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">Drag and drop your photo here or click to browse</p>
                        <input name="tampakBelakang" id="tampakBelakang" type="file" class="hidden"
                            onchange="previewImage(event, 'tampakBelakangPreview')">
                        <!-- Ensure that file input is clickable -->
                        <label for="tampakBelakang" class="cursor-pointer text-blue-600">Choose File</label>
                    </div>
                    <div id="tampakBelakangPreview" class="mt-4 hidden">
                        <img id="tampakBelakangImage" src="#" alt="Preview"
                            class="w-32 h-32 object-cover rounded-lg" />
                    </div>
                </div>

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

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Member</button>
                </div>
            </form>
        </div>
    </div>

    <script>
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
