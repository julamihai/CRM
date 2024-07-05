<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-96 px-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Login</h1>
        <form method="POST" action="{{route('login')}}" class="space-y-4">
            @csrf
            <!-- Email Address -->
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                <input id="email" type="email" class="h-[40px] text-center form-input mt-1 block w-full rounded-xl border-gray-300 shadow-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-100" name="email" value="{{ old('email') }}" required>
                @error('email')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input id="password" type="password" class="h-[40px] text-center form-input mt-1 block w-full rounded-xl border-gray-300 shadow-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-100" name="password" required autocomplete="new-password">
                @error('password')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <a href="{{route('forgot.password.get')}}" class="flex justify-end text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-500 text-white py-3 px-6 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Login</button>
            </div>
            <p class="text-sm font-light text-gray-500 dark:text-blue-400">
                Don’t have an account yet? <a href="{{route('register')}}" class="font-medium text-blue-700 hover:underline dark:text-primary-500">Sign up</a>
            </p>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if(session('error'))
            <script>
                Swal.fire({
                    title: 'Something went wrong!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
    </div>
</div>
</body>
</html>
