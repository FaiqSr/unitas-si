<!DOCTYPE html>
<html class='scroll-smooth'  lang="{{ str_replace('_', '-', app()->getLocale()) }}>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unitas Sistem Informasi</title>
  <link rel="icon" href="{{ url('/images/faviconsii.png') }}" type="image/png">
  <link rel="stylesheet" href="animasi.css">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

<body class=" font-sans text-gray-800">

  <x-nav-bar />

  <main>
    <section class="relative min-h-screen bg-gradient-to-br from-blue-600 to-blue-800 text-white overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="animate-float absolute top-1/4 left-1/4 w-16 md:w-32 h-16 md:h-32 bg-white rounded-full opacity-10"></div>
            <div class="animate-float absolute bottom-1/4 right-1/4 w-20 md:w-40 h-20 md:h-40 bg-white rounded-full opacity-10" style="animation-delay: -2s;"></div>
            <div class="animate-float absolute top-3/4 left-1/3 w-12 md:w-24 h-12 md:h-24 bg-white rounded-full opacity-10" style="animation-delay: -4s;"></div>
      </div>
      
      <div class="container mx-auto px-4 h-screen flex items-center justify-center">
        <div class="text-center fade-in-up w-full md:w-3/4 lg:w-2/3">
          <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6">Welcome, Unitas Sistem Informasi</h2>
          <p class="text-lg md:text-xl mb-8 md:mb-12 opacity-90 px-4">Explore our organization, attend our events, and get our merchandise.</p>
          <div class="flex flex-wrap justify-center gap-4">
            <a href="#about" class="w-full sm:w-auto gradient-button text-white px-6 md:px-8 py-3 md:py-4 rounded-full font-medium">Learn More</a> 
          </div>
          
          </div>
      </div>
  </section>

  <section id="about" class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold mb-12 md:mb-16 text-center gradient-text">About Us</h2>
        <div class="max-w-4xl mx-auto space-y-6 md:space-y-8">
            <p class="text-base md:text-lg leading-relaxed text-gray-700 px-4 md:px-0">Unitas Sistem Informasi is a student organisation at Indraprasta University that focuses on developing skills and knowledge in the field of Information Systems.</p>
            
            <div class="bg-blue-50 p-6 md:p-8 rounded-2xl mx-4 md:mx-0">
                <h3 class="text-xl md:text-2xl font-bold mb-4 text-center text-blue-600">VISION</h3>
                <p class="text-gray-700 leading-relaxed text-sm md:text-base">Becoming a quality, innovative, and competitive information systems student activity unit in the field of information systems and information technology, and being able to provide benefits for students, alumni, and the wider community.</p>
            </div>

            <div class="bg-blue-50 p-8 rounded-2xl">
                <h3 class="text-2xl font-bold mb-4 text-center text-blue-600">MISSION</h3>
                <ul class="space-y-4 text-gray-700">
                    <li class="flex items-start">
                        <span class="mr-2">1.</span>
                        <span>Develop work programmes that facilitate student creativity and innovation in the field of information technology.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">2.</span>
                        <span>Organising competitions, seminars, and workshops that improve students' knowledge and skills in Information Systems.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">3.</span>
                        <span>Organising cooperation activities with companies in the field of technology.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">4.</span>
                        <span>Building a culture of kinship and solidarity within the Information Systems student family.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
   
<section id="events" class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold mb-12 md:mb-16 text-center gradient-text">Upcoming Events</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
          @foreach($events as $event)
          <a href="/event/{{$event->slug}}" class="card-hover bg-white rounded-2xl overflow-hidden">
              <img src="{{ asset($event->image[0]) }}" alt="Event" class="w-full h-56 object-cover">
              <div class="p-6">
                  <h3 class="text-xl font-bold mb-3 text-gray-800">{{$event->judul}}</h3>
                  <p class="text-gray-600 mb-4">{{Str::limit($event->body, 20, '...')}}</p>
                  <p class="text-blue-500 font-medium">{{$event->created_at->diffForHumans()}}</p>
              </div>
          </a>
          
          @endforeach
      </div>
  </div>
</section>

<section id="merchandise" class="py-24 bg-white">
  <div class="container mx-auto px-4">
      <h2 class="text-4xl font-bold mb-16 text-center gradient-text">Our Merchandise</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          @foreach($merchs as $merch)
          <a href="/merchandise/{{$merch->slug}}" class="card-hover bg-gray-50 rounded-2xl overflow-hidden">
              <img src="{{url($merch->image[0])}}" alt="Merchandise" class="w-full h-64 object-cover">
              <div class="p-6">
                  <h3 class="text-xl font-bold mb-2 text-gray-800">{{$merch->nama}}</h3>
                  <p class="text-gray-600 mb-4">Workshirt Sistem Informasi</p>
                  <p class="text-blue-500 font-bold">Rp {{ number_format($merch->harga, 2, ',', '.') }}</p>
              </div>
          </a>
          @endforeach
      </div>
  </div>
</section>

<section id="contact" class="py-24 bg-gray-50">
  <div class="container mx-auto px-4">
      <h2 class="text-4xl font-bold mb-16 text-center gradient-text">Contact Us</h2>
      <form class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
          <div class="mb-6">
              <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
              <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
          </div>
          <div class="mb-6">
              <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
              <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required>
          </div>
          <div class="mb-6">
              <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
              <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" required></textarea>
          </div>
          <button type="submit" class="gradient-button text-white px-8 py-4 rounded-xl w-full font-medium">Send Message</button>
      </form>
  </div>
</section>
  </main>

  
  <footer class="bg-blue-600 text-white py-8">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center md:text-left">
          <h4 class="font-bold text-lg mb-2">About Us</h4>
          <p class="font-medium mb-2">Unitas Sistem Informasi is a student organisation at Indraprasta University that focuses on developing skills and knowledge in the field of Information Systems.
          </p>
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
            const logo = document.querySelector('logo');
            if (window.scrollY > 50) {
                logo.classList.remove("text-white")
                navbar.classList.remove("text-white")
                logo.classList.add('from-blue-600', 'to-blue-400', 'text-transparent);
                navbar.classList.add('bg-white', 'shadow-lg', 'text-black');
            } else {
                logo.classList.add('text-white')
                navbar.classList.add('text-white')
                logo.classList.remove('from-blue-600', 'to-blue-400', 'text-transparent');
                navbar.classList.remove('bg-white', 'shadow-lg', 'text-black');
            }
        });
    </script>

</body>
</html>