<script src="https://cdn.tailwindcss.com"></script>
<div class="w-full h-[500px] flex justify-center items-center">
    <div class="py-12 px-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Welcome to My CRM Application</h1>
        <p class="text-lg text-gray-600 mb-8">Manage your customers, track interactions, and grow your business with ease.</p>
        <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
            <a href="{{route('getLogin')}}" class="bg-blue-500 text-white py-3 px-6 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Log In</a>
            <a href="{{route('getRegister')}}" class="bg-gray-200 text-gray-800 py-3 px-6 rounded-md shadow-md hover:bg-gray-300 transition duration-300">Sign Up</a>
        </div>
    </div>
</div>

