@extends('layout')
@section('title', 'Create Categories')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="w-full mx-auto px-12 py-4">
        <form action="{{route('categories.store')}}" method="POST" class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-xl font-bold mb-2">Create Category</label>
                <input type="text" id="title" name="title" class="appearance-none border rounded w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Title" required />
            </div>
            <button type="submit" id="category" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-16 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Add Category</button>
        </form>

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

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($categories as $category)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="px-6 py-4 text-xl">{{ $category->title }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="text-blue-700 hover:underline text-xl">
                                Edit
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-xl">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

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
                </tbody>
            </table>
        </div>
    </div>
@endsection


