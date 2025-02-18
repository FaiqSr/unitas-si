<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="{{ url('/images/faviconsii.png') }}" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 space-y-6">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back</h1>
            <p class="text-gray-500">Please login to your account</p>
        </div>
        
        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 mb-2" for="email">Email</label>
                <input type="email" id="email" name="email" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-400"
                    placeholder="your@email.com">
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2" for="password">Password</label>
                <input type="password" id="password" name="password" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-purple-400"
                    placeholder="••••••••">
            </div>
            
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-purple-500">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
                <a href="#" class="text-sm text-purple-600 hover:text-purple-800">Forgot password?</a>
            </div>
            
            <button type="submit" 
                class="w-full py-2 px-4 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition duration-200">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>