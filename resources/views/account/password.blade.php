@extends('layout')
@section('title', 'Edit Password')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-sm bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Edit Password</h2>
                <form action="{{route('updatePassword')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your new password" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirm New Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm your new password" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Password</button>
                    </div>
                </form>
            </div>
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
@endsection
