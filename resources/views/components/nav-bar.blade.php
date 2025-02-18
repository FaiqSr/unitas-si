<!-- Responsive Navbar -->
<nav class="fixed w-full z-50 transition-all duration-300 text-white" x-data="{ isOpen: false }" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <logo class="text-xl sm:text-2xl font-bold bg-gradient-to-r text-white bg-clip-text" id="logo">
                    Unitas Sistem Informasi
                </logo>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-center space-x-8">
                    <a href="/" class="text-sm lg:text-base hover:text-blue-600 transition-colors duration-300 font-medium">Home</a>
                    <a href="/#about" class="text-sm lg:text-base hover:text-blue-600 transition-colors duration-300 font-medium">About</a>
                    <a href="/#events" class="text-sm lg:text-base hover:text-blue-600 transition-colors duration-300 font-medium">Event</a>
                    <a href="/#merchandise" class="text-sm lg:text-base hover:text-blue-600 transition-colors duration-300 font-medium">Merchandise</a>
                    <a href="/member" class="text-sm lg:text-base hover:text-blue-600 transition-colors duration-300 font-medium">Members</a>
                    <a href="/#contact" class="text-sm lg:text-base hover:text-blue-600 transition-colors duration-300 font-medium">Kontak</a>
                    @if(Auth::check())
                    <form action="/logout">
                        @csrf
                        <button type="submit" class="text-sm lg:text-base hover:text-blue-600 transition-colors duration-300 font-medium">logout</button>
                    </form>
                    @endif

                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="text-white hover:text-blue-600" @click="isOpen = !isOpen" aria-label="Toggle menu">
                    <svg class="h-6 w-6" x-show="!isOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="h-6 w-6" x-show="isOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden" x-show="isOpen" @click.away="isOpen = false" style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white shadow-lg rounded-lg mt-2">
                <a href="/" class="block px-3 py-2 text-base font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300">Home</a>
                <a href="#about" class="block px-3 py-2 text-base font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300">About</a>
                <a href="#events" class="block px-3 py-2 text-base font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300">Event</a>
                <a href="#merchandise" class="block px-3 py-2 text-base font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300">Merchandise</a>
                <a href="/member" class="block px-3 py-2 text-base font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300">Members</a>
                <a href="#contact" class="block px-3 py-2 text-base font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300">Kontak</a>
            </div>
        </div>
    </div>
</nav>

<!-- Updated scroll behavior script -->
<script>
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('nav');
    const logo = document.querySelector('logo');
    const mobileMenu = document.querySelector('nav div[x-show="isOpen"]');
    
    if (window.scrollY > 50) {
        logo.classList.remove("text-white");
        navbar.classList.remove("text-white");
        logo.classList.add('from-blue-600', 'to-blue-400', 'text-transparent');
        navbar.classList.add('bg-white', 'shadow-lg', 'text-black');
        
        // Update mobile menu button color
        const menuButton = document.querySelector('nav button');
        if (menuButton) {
            menuButton.classList.remove('text-white');
            menuButton.classList.add('text-gray-800');
        }
    } else {
        logo.classList.add('text-white');
        navbar.classList.add('text-white');
        logo.classList.remove('from-blue-600', 'to-blue-400', 'text-transparent');
        navbar.classList.remove('bg-white', 'shadow-lg', 'text-black');
        
        // Reset mobile menu button color
        const menuButton = document.querySelector('nav button');
        if (menuButton) {
            menuButton.classList.add('text-white');
            menuButton.classList.remove('text-gray-800');
        }
    }
});
</script>