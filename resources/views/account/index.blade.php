@extends('layout')
@section('title', 'Account')
@section('content')
    <html>
    <head>
        <link rel="stylesheet" href="https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/css/main.ad49aa9b.css" />
    </head>
    <body >
    <div class="flex flex-col justify-center items-center h-[100vh]">
        <div class="relative flex flex-col items-center rounded-[20px] w-[700px] max-w-[95%] mx-auto bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
            <div class="mt-2 mb-8 w-full">
                <h4 class="px-2 text-xl font-bold text-navy-700 dark:text-white">
                    {{ Auth::user()->name }}
                </h4>
            </div>
            <div class="grid grid-cols-2 gap-4 px-2 w-full">

                <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Name</p>
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                        {{ Auth::user()->name }}
                    </p>
                    <a href="{{route('editName')}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">Edit</a>
                </div>

                <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                        {{ Auth::user()->email }}
                    </p>
                    <a href="{{route('editEmail')}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">Edit</a>
                </div>

                <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Password</p>
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                        Password
                    </p>
                    <a href="{{route('editPassword')}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">Edit</a>
                </div>

                <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                    <p class="text-sm text-gray-600">Logout</p>
                    <p class="text-base font-medium text-navy-700 dark:text-white">
                        Logout
                    </p>
                    <a href="{{ route('logout') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center">Logout</a>
                </div>
            </div>

            <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-8 py-4 mt-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none w-full">
                <p class="text-sm text-gray-600">Delete Account</p>
                <p class="text-base font-medium text-navy-700 dark:text-white">
                    Delete Account
                </p>
                <form action="{{ route('deleteAccount') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded text-center">
                        Delete Account
                    </button>
                </form>
            </div>
        </div>
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
                    title: 'Password changed!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
    </div>
    </body>
    </html>
@endsection
