<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-96 px-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Forgot Password</h1>
        <form method="GET" action="{{route('reset.password.get')}}" class="space-y-4">
            @csrf
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-500 text-white py-3 px-6 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Forgot Password</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
