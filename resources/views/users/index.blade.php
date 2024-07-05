@extends('layout')
@section('title','Users')
@section('content')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of Users</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    @extends('layout')
    @section('title', 'Users')
    @section('content')
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>List of Users</title>
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        </head>
        <body class="bg-gray-100">
        <div class="container mx-auto p-8">
            <h1 class="text-3xl font-bold mb-8">List of Users</h1>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">ID</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Name</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Roles</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @foreach($users as $user)
                        <tr class="bg-gray-100 border-b">
                            <td class="w-1/4 py-3 px-4">{{ $user->id }}</td>
                            <td class="w-1/4 py-3 px-4">{{ $user->name }}</td>
                            <td class="w-1/4 py-3 px-4">{{ $user->email }}</td>
                            <td class="w-1/4 py-3 px-4">{{ isset($user->role->name) ?? '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </body>
        </html>
    @endsection

