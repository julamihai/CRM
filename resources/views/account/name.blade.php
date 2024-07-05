@extends('layout')
@section('title', 'Edit Name')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-sm bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Edit Name</h2>
                <form action="{{route('updateName')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Old Name</label>
                        <input type="text" name="name" id="name" value="{{Auth::user()->name}}" readonly class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="new_name" class="block text-gray-700 text-sm font-bold mb-2">New Name</label>
                        <input type="text" name="new_name" id="new_name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your new name" required>
                    </div>
                    <div class="mb-4">
                        <label for="conf_name" class="block text-gray-700 text-sm font-bold mb-2">Confirm New Name</label>
                        <input type="text" name="conf_name" id="conf_name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm your new name" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
                    </div>
                </form>
            </div>
        </div>
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
@endsection