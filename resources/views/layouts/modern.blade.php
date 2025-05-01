@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="bg-gray-50">
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>@yield('title', 'EasyRent - Find Your Perfect Home')</title>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
            @stack('styles')
        </head>
        <body class="bg-gray-50">
            <!-- Navigation -->
            <nav class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <a href="/" class="text-2xl font-bold text-blue-600">EasyRent</a>
                            </div>
                        </div>
                        <div class="flex items-center">
                            @auth
                                <a href="{{ route('landlord.properties.create') }}" class="mr-4 text-gray-600 hover:text-gray-900">List Property</a>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                        Logout
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="mr-4 text-gray-600 hover:text-gray-900">Login</a>
                                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Register
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            @yield('page-content')

            <!-- Footer -->
            <footer class="bg-gray-900 text-white mt-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div>
                            <h3 class="text-xl font-bold mb-4">EasyRent</h3>
                            <p class="text-gray-400">Making property rental easy and accessible for everyone.</p>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white">Properties</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Legal</h4>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white">Terms of Service</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                            <p class="text-gray-400">Email: info@easyrent.com</p>
                            <p class="text-gray-400">Phone: (123) 456-7890</p>
                        </div>
                    </div>
                    <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
                        <p>&copy; {{ date('Y') }} EasyRent. All rights reserved.</p>
                    </div>
                </div>
            </footer>

            @stack('scripts')
        </body>
        </html>
    </div>
@endsection
