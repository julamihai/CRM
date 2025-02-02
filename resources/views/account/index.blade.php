@extends('layout')
@section('title', 'Account')
@section('content')
    <html>
    <head>
        <link rel="stylesheet" href="https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/css/main.ad49aa9b.css" />
    </head>
    <body class="bg-gray-100 dark:bg-navy-800">
    <div class="flex flex-col justify-center items-center h-[100vh]">

        <!-- Main Card Container -->
        <div class="relative flex flex-col items-center rounded-[20px] w-[700px] max-w-[95%] mx-auto bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:bg-navy-800 dark:text-white p-6">

            <!-- User Profile Section -->
            <div class="mt-2 mb-8 w-full text-center">
                <h4 class="text-2xl font-bold text-navy-700 dark:text-white">
                    {{ Auth::user()->name }}
                </h4>
            </div>

            <!-- User Information Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full px-2">

                <!-- Name Section -->
                <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-4 py-6 shadow-lg dark:bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Name</p>
                    <p class="text-lg font-medium text-navy-700 dark:text-white">
                        {{ Auth::user()->name }}
                    </p>
                    <a href="{{route('editName')}}" class="mt-4 py-2 px-4 text-center text-blue-600 border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition-colors">Edit</a>
                </div>

                <!-- Email Section -->
                <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-4 py-6 shadow-lg dark:bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="text-lg font-medium text-navy-700 dark:text-white">
                        {{ Auth::user()->email }}
                    </p>
                    <a href="{{route('editEmail')}}" class="mt-4 py-2 px-4 text-blue-600 text-center border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition-colors">Edit</a>
                </div>

                <!-- Password Section -->
                <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-4 py-6 shadow-lg dark:bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Password</p>
                    <p class="text-lg font-medium text-navy-700 dark:text-white">
                        **********
                    </p>
                    <a href="{{route('editPassword')}}" class="mt-4 py-2 px-4 text-blue-600 text-center border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition-colors">Edit</a>
                </div>

                <!-- Logout Section -->
                <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-4 py-6 shadow-lg dark:bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Logout</p>
                    <p class="text-lg font-medium text-navy-700 dark:text-white">Logout</p>
                    <a href="{{ route('logout') }}" class="mt-4 py-2 px-4 text-blue-600 text-center border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition-colors">Logout</a>
                </div>

            </div>

            <!-- Account Deletion Section -->
            <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-8 py-6 mt-6 shadow-lg dark:bg-navy-700 dark:shadow-none w-full">
                <p class="text-sm text-gray-600">Delete Account</p>
                <p class="text-lg font-medium text-navy-700 dark:text-white">
                    Delete Account
                </p>
                <form action="{{ route('deleteAccount') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mt-4 w-full bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded-md transition-colors">
                        Delete Account
                    </button>
                </form>
            </div>

        </div>

    </div>

    <!-- SweetAlert Integration for Success Alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if(session('password'))
        <script>
            Swal.fire({
                title: 'Password Changed!',
                text: '{{ session('password') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    </body>
    </html>
@endsection
