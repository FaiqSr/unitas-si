<!DOCTYPE html>
<html lang="en" class='scroll-smooth'  lang="{{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Members</title>
    <link rel="icon" href="{{ url('/images/faviconsii.png') }}" type="image/png">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <style>
    @keyframes float {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(0, -20px); }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .fade-in-up {
        animation: fadeInUp 1s ease-out;
    }
    
    .animate-float {
        animation: float 6s infinite;
    }

    .gradient-text {
        background: linear-gradient(45deg, #2563eb, #60a5fa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .card-hover {
        transition: all 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .gradient-button {
        background: linear-gradient(45deg, #2563eb, #60a5fa);
        transition: all 0.3s ease;
    }

    .gradient-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
    }
</style>
</head>

<body class="font-sans text-gray-800">
    <x-nav-bar />

    <section class="relative min-h-screen bg-gradient-to-br from-blue-600 to-blue-800 text-white overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="animate-float absolute top-1/4 left-1/4 w-32 h-32 bg-white rounded-full opacity-10"></div>
            <div class="animate-float absolute bottom-1/4 right-1/4 w-40 h-40 bg-white rounded-full opacity-10" style="animation-delay: -2s;"></div>
            <div class="animate-float absolute top-3/4 left-1/3 w-24 h-24 bg-white rounded-full opacity-10" style="animation-delay: -4s;"></div>
        </div>
        
        <div class="container mx-auto px-4 h-screen flex items-center justify-center">
            <div class="text-center fade-in-up">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Welcome to Our Team</h1>
                <p class="text-xl mb-12 opacity-90">Meet the passionate individuals behind Unitas Sistem Informasi</p>
                <a href="#koor" class="gradient-button text-white px-8 py-4 rounded-full font-medium inline-block bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 transition-all">Meet Our Team</a>
            </div>
        </div>
    </section>

    <main>
        <section id="koor" class="bg-white py-16">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-16 text-center gradient-text">Koordinator</h1>
                <div class="flex flex-wrap justify-center">
                    @foreach ($members as $member)
                        @if ($member->jabatan === 'Koordinator')
                            <div class="bg-gray-100 shadow-md rounded-lg overflow-hidden relative">
                                <img src="{{ $member->profilePicture['tampakDepan'] }}" alt="koor"
                                    class="w-full h-56 object-cover">
                                <div class="p-4">
                                    <h3 class="text-xl font-bold mb-2">{{ $member->name }}</h3>
                                    <p class="text-gray-600 mb-2">{{ $member->jabatan }}</p>
                                    <button class="text-blue-500 font-medium hover:underline"
                                        onclick="showMemberModal('{{ Str::slug($member->name) }}')">View
                                        Profile</button>
                                </div>

                                <div id="{{ Str::slug($member->name) }}-modal"
                                    class="fixed z-10 inset-0 overflow-y-auto hidden">
                                    <div class="flex items-center justify-center min-h-screen">
                                        <div class="bg-white shadow-xl rounded-lg w-full max-w-md mx-4 md:mx-0">
                                            <div class="p-6">
                                                <div class="flex gap-2">
                                                    <img src="{{ $member->profilePicture['tampakDepan'] }}"
                                                        alt="Daffa"
                                                        class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                                    <img src="{{ $member->profilePicture['tampakBelakang'] }}"
                                                        alt="Daffa"
                                                        class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                                </div>
                                                <h3 class="text-2xl font-bold mb-2">{{ $member->name }}</h3>
                                                <p class="text-gray-600 mb-4">{{ $member->jabatan }}</p>
                                                <p class="mb-4">NPM: {{ $member->NPM }}</p>
                                                <p class="mb-4">Born: {{ $member->ulangTahun }}</p>
                                                <p class="mb-4">Motivation: {{ $member->motivasi }}</p>
                                                <div class="flex justify-center space-x-4 mb-4">
                                                    @if ($member->sosialMedia['linkedin'])
                                                        <a href="{{ $member->sosialMedia['linkedin'] }}"
                                                            class="text-blue-500 hover:underline">LinkedIn</a>
                                                    @endif
                                                    @if ($member->sosialMedia['instagram'])
                                                        <a href="{{ $member->sosialMedia['instagram'] }}"
                                                            class="text-blue-500 hover:underline">Instagram</a>
                                                    @endif
                                                    @if ($member->sosialMedia['twitter'])
                                                        <a href="{{ $member->sosialMedia['twitter'] }}"
                                                            class="text-blue-500 hover:underline">Twitter</a>
                                                    @endif
                                                </div>
                                                <button
                                                    class="bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600"
                                                    onclick="hideMemberModal('{{ Str::slug($member->name) }}')">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

                <h1 class="text-4xl font-bold mb-16 text-center gradient-text m-10 ">Badan Pengurus Harian</h1>
                <div class="flex flex-wrap gap-5 justify-center">

                    @foreach ($members as $member)
                        @if ($member->jabatan === 'Sekretaris' || $member->jabatan === 'Bendahara')
                            <div class="bg-gray-100 shadow-md rounded-lg overflow-hidden relative w-96 h-96">
                                <img src="{{ $member->profilePicture['tampakDepan'] }}" alt="koor"
                                    class="w-full h-56 object-cover">
                                <div class="p-4">
                                    <h3 class="text-xl font-bold mb-2">{{ $member->name }}</h3>
                                    <p class="text-gray-600 mb-2">{{ $member->jabatan }}</p>
                                    <button class="text-blue-500 font-medium hover:underline"
                                        onclick="showMemberModal('{{ Str::slug($member->name) }}')">View
                                        Profile</button>
                                </div>

                                <div id="{{ Str::slug($member->name) }}-modal"
                                    class="fixed z-10 inset-0 overflow-y-auto hidden">
                                    <div class="flex items-center justify-center min-h-screen">
                                        <div class="bg-white shadow-xl rounded-lg w-full max-w-md mx-4 md:mx-0">
                                            <div class="p-6">
                                                <div class="flex gap-2">
                                                    <img src="{{ $member->profilePicture['tampakDepan'] }}"
                                                        alt="Daffa"
                                                        class="w-32 h-32 rounded-lg mx-auto mb-4 object-cover">
                                                    <img src="{{ $member->profilePicture['tampakBelakang'] }}"
                                                        alt="Daffa"
                                                        class="w-32 h-32 rounded-lg mx-auto mb-4 object-cover">
                                                </div>
                                                <h3 class="text-2xl font-bold mb-2">{{ $member->name }}</h3>
                                                <p class="text-gray-600 mb-4">{{ $member->jabatan }}</p>
                                                <p class="mb-4">NPM: {{ $member->NPM }}</p>
                                                <p class="mb-4">Born: {{ $member->ulangTahun }}</p>
                                                <p class="mb-4">Motivation: {{ $member->motivasi }}</p>
                                                <div class="flex justify-center space-x-4 mb-4">
                                                    @if ($member->sosialMedia['linkedin'])
                                                        <a href="{{ $member->sosialMedia['linkedin'] }}"
                                                            class="text-blue-500 hover:underline">LinkedIn</a>
                                                    @endif
                                                    @if ($member->sosialMedia['instagram'])
                                                        <a href="{{ $member->sosialMedia['instagram'] }}"
                                                            class="text-blue-500 hover:underline">Instagram</a>
                                                    @endif
                                                    @if ($member->sosialMedia['twitter'])
                                                        <a href="{{ $member->sosialMedia['twitter'] }}"
                                                            class="text-blue-500 hover:underline">Twitter</a>
                                                    @endif
                                                </div>
                                                <button
                                                    class="bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600"
                                                    onclick="hideMemberModal('{{ Str::slug($member->name) }}')">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <h1 class="text-4xl font-bold mb-16 text-center gradient-text m-10">Divisi</h1>
                <div class="flex flex-wrap gap-5 justify-center">
                    @foreach ($members as $member)
                        @if (
                            $member->jabatan === 'Kadiv Kominfo' ||
                                $member->jabatan === 'Kadiv PSDM' ||
                                $member->jabatan === 'Kadiv LitBang' ||
                                $member->jabatan === 'Kadiv Kewirausahaan' ||
                                $member->jabatan === 'Anggota Kominfo' ||
                                $member->jabatan === 'Anggota PSDM' ||
                                $member->jabatan === 'Anggota Kewirausahaan' ||
                                $member->jabatan === 'Anggota LitBang')
                            <div class="bg-gray-100 shadow-md rounded-lg overflow-hidden relative w-96 h-96">
                                <img src="{{ $member->profilePicture['tampakDepan'] }}" alt="Member 1"
                                    class="w-full h-56 object-cover">
                                <div class="p-4">
                                    <h3 class="text-xl font-bold mb-2">{{ $member->name }}</h3>
                                    <p class="text-gray-600 mb-2">{{ $member->jabatan }}</p>
                                    <button class="text-blue-500 font-medium hover:underline"
                                        onclick="showMemberModal('{{ Str::slug($member->name) }}')">View
                                        Profile</button>
                                </div>
                                <div id="{{ Str::slug($member->name) }}-modal"
                                    class="fixed z-10 inset-0 overflow-y-auto hidden">
                                    <div class="flex items-center justify-center min-h-screen">
                                        <div class="bg-white shadow-xl rounded-lg w-full max-w-md mx-4 md:mx-0">
                                            <div class="p-6">
                                                <div class="flex gap-2">
                                                    <img src="{{ url($member->profilePicture['tampakDepan']) }}"
                                                        alt="Manda"
                                                        class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                                    <img src="{{ url($member->profilePicture['tampakBelakang']) }}"
                                                        alt="Manda"
                                                        class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                                </div>
                                                <h3 class="text-2xl font-bold mb-2">{{ $member->name }}</h3>
                                                <p class="text-gray-600 mb-4">{{ $member->jabatan }}
                                                </p>
                                                <p class="mb-4">NPM: {{ $member->NPM }}</p>
                                                <p class="mb-4">Born: {{ $member->ulangTahun }}</p>
                                                <p class="mb-4">Motivation: {{ $member->motivasi }}.</p>
                                                <div class="flex justify-center space-x-4 mb-4">
                                                    @if ($member->sosialMedia['linkedin'])
                                                        <a href="{{ $member->sosialMedia['linkedin'] }}"
                                                            class="text-blue-500 hover:underline">LinkedIn</a>
                                                    @endif
                                                    @if ($member->sosialMedia['instagram'])
                                                        <a href="{{ $member->sosialMedia['instagram'] }}"
                                                            class="text-blue-500 hover:underline">Instagram</a>
                                                    @endif
                                                    @if ($member->sosialMedia['twitter'])
                                                        <a href="{{ $member->sosialMedia['twitter'] }}"
                                                            class="text-blue-500 hover:underline">Twitter</a>
                                                    @endif
                                                </div>
                                                <button
                                                    class="bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600"
                                                    onclick="hideMemberModal('{{ Str::slug($member->name) }}')">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </main>

<footer class="bg-blue-600 text-white py-8">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center md:text-left">
          <h4 class="font-bold text-lg mb-2">About Us</h4>
          <p class="font-medium mb-2">Unitas Sistem Informasi is a student organisation at Indraprasta University that focuses on developing skills and knowledge in the field of Information Systems.</p>
        </div>
        <div class="text-center md:text-left">
          <h4 class="font-bold text-lg mb-2">Quick Links</h4>
          <ul class="space-y-2">
            <li><a href="/" class="hover:underline">Home</a></li>
            <li><a href="/member" class="hover:underline">Members</a></li>
            <li><a href="#contact" class="hover:underline">Contact</a></li>
          </ul>
        </div>
        <div class="text-center md:text-left">
          <h4 class="font-bold text-lg mb-2">Contact Us</h4>
          <p class="font-medium mb-2 text-sm md:text-base">Jl. Raya Tengah No.80, RT.6/RW.1, Gedong, Kec. Ps. Rebo...</p>
        </div>
      </div>
      <div class="text-center mt-8">
        <p class="text-sm">&copy; 2024 Unitas Sistem Informasi. All rights reserved.</p>
      </div>
    </div>
  </footer>
   


    <script>
        function showMemberModal(memberId) {
            document.getElementById(`${memberId}-modal`).classList.remove('hidden');
        }

        function hideMemberModal(memberId) {
            document.getElementById(`${memberId}-modal`).classList.add('hidden');
        }
    </script>
    @if ($id)
        @foreach ($id as $member)
            <script>
                showMemberModal('{{ Str::slug($member->name) }}');
            </script>
        @endforeach
    @endif

    <script>
        // Fade in elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        document.querySelectorAll('section > div').forEach(section => {
            observer.observe(section);
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 50) {
                navbar.classList.remove("text-white")
                navbar.classList.add('bg-white', 'shadow-lg', 'text-black');
            } else {
                navbar.classList.add('text-white')
                navbar.classList.remove('bg-white', 'shadow-lg', 'text-black');
            }
        });
    </script>
</body>

</html>
