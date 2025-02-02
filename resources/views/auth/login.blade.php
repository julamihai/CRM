<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">
<div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md">
    <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">Login</h1>
    <p class="text-sm text-gray-500 mb-8 text-center">Welcome back! Please login to your account.</p>
    <form method="POST" action="{{route('login')}}" class="space-y-6">
        @csrf
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

        <div class="flex justify-between items-center">
            <a href="{{route('forgot.password.get')}}" class="text-sm font-medium text-blue-600 hover:underline">Forgot password?</a>
        </div>

        <!-- Login Button -->
        <div>
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                Login
            </button>
        </div>

        <!-- Registration Link -->
        <p class="text-center text-sm text-gray-500 mt-4">
            Don’t have an account yet?
            <a href="{{route('register')}}" class="font-medium text-blue-600 hover:underline">Sign up</a>
        </p>
    </form>

    <!-- SweetAlert Error Notification -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</div>
</body>
</html>

