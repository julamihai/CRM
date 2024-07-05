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
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Forgot Password</h1>
        <form method="POST" action="{{route('forgot.password.post')}}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 font-bold">Enter Email Address</label>
                <input id="email" type="email" class="mt-4 h-8 form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-500 text-white py-3 px-6 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Forgot Password</button>
            </div>
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
