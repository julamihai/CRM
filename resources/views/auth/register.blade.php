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
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-96 px-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Register</h1>
        <form method="POST" action="{{route('register')}}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input id="name" type="text" class="h-[40px] text-center form-input mt-1 block w-full rounded-xl border-gray-300 shadow-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-100" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

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

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium">Confirm Password</label>
                <input id="password_confirmation" type="password" class="h-[40px] text-center form-input mt-1 block w-full rounded-xl border-gray-300 shadow-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-100" name="password_confirmation" required>
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-500 text-white py-3 px-6 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Register</button>
            </div>
            <p class="text-sm font-light text-gray-500 dark:text-blue-400">
                Already have an account? <a href="{{route('login')}}" class="font-medium text-blue-700 hover:underline dark:text-primary-500">Sign in</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>
