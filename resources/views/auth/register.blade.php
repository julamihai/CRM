<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">
<div class="bg-white p-10 rounded-xl shadow-2xl w-full max-w-md">
    <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">Create Account</h1>
    <p class="text-sm text-gray-500 mb-8 text-center">Join us today! Please fill out the form to register.</p>
    <form method="POST" action="{{route('register')}}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input id="name" type="text" class="h-12 w-full px-4 mt-2 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input id="email" type="email" class="h-12 w-full px-4 mt-2 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" name="email" value="{{ old('email') }}" required>
            @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" type="password" class="h-12 w-full px-4 mt-2 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" name="password" required>
            @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="password_confirmation" type="password" class="h-12 w-full px-4 mt-2 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" name="password_confirmation" required>
        </div>

        <!-- Register Button -->
        <div>
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md shadow-lg hover:bg-blue-700 transition-all duration-300">
                Register
            </button>
        </div>

        <!-- Login Link -->
        <p class="text-center text-sm text-gray-500 mt-4">
            Already have an account?
            <a href="{{route('login')}}" class="font-medium text-blue-600 hover:underline">Sign in</a>
        </p>
    </form>
</div>
</body>
</html>
