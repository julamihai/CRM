<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CRM APP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>
<body>
<!-- Hero Section -->
<div class="w-full h-screen flex items-center justify-center bg-gradient-to-br from-blue-500 to-indigo-600">
    <div class="bg-white rounded-lg shadow-2xl p-12 max-w-2xl text-center transform transition-all duration-500 hover:scale-105 animate__animated animate__fadeInUp">
        <!-- Logo or Icon (Optional) -->
        <div class="mb-6">
            <svg class="w-20 h-20 mx-auto text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
        </div>

        <!-- Heading -->
        <h1 class="text-5xl font-bold text-gray-800 mb-6 animate__animated animate__fadeIn animate__delay-1s">
            Welcome to <span class="text-blue-600">CRM APP</span>
        </h1>

        <!-- Subheading -->
        <p class="text-xl text-gray-600 mb-8 animate__animated animate__fadeIn animate__delay-2s">
            Your one-stop solution to manage customers, track interactions, and boost growth.
        </p>

        <!-- Call-to-Action Buttons -->
        <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-6 animate__animated animate__fadeIn animate__delay-3s">
            <a href="{{route('getLogin')}}" class="bg-blue-600 text-white py-3 px-10 rounded-full shadow-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                Log In
            </a>
            <a href="{{route('getRegister')}}" class="bg-white text-blue-600 py-3 px-10 rounded-full border border-blue-600 shadow-lg hover:bg-blue-100 transition-all duration-300 transform hover:scale-105">
                Sign Up
            </a>
        </div>

        <!-- Footer Text -->
        <div class="mt-10 animate__animated animate__fadeIn animate__delay-4s">
            <p class="text-sm text-gray-500">New to CRM? Start managing smarter today.</p>
        </div>
    </div>
</div>
</body>
</html>


