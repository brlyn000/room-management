<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenQR | Smart Space Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50:  '#ecfeff',
                            100: '#cffafe',
                            200: '#a5f3fc',
                            300: '#67e8f9',
                            400: '#22d3ee',
                            500: '#06b6d4',
                            600: '#0891b2',
                            700: '#0e7490',
                            800: '#155e75',
                            900: '#164e63',
                        },
                        gray: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, rgba(34,197,94,0.1) 0%, rgba(16,163,74,0.05) 100%);
        }
        .feature-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            position: relative;
        }
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #22c55e;
            transition: width 0.3s ease;
        }
        .nav-link:hover:after {
            width: 100%;
        }
        .step-number {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .pricing-card {
            transition: all 0.3s ease;
        }
        .pricing-card:hover {
            transform: translateY(-8px);
        }
        .pricing-card.popular {
            border: 2px solid #06b6d4;
            box-shadow: 0 10px 25px -5px rgba(6, 182, 212, 0.2);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="logoOpenQR" class="h-12">
                    <span class="text-xl font-semibold text-gray-800 dark:text-white">OpenQR</span>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="nav-link text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Features</a>
                    <a href="#how-it-works" class="nav-link text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">How It Works</a>
                    <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">Login</a>
                    <a href="{{route('register')}}" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-md transition duration-300">Get Started</a>
                </div>
                
                <button id="mobileMenuButton" class="md:hidden text-gray-500 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#features" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700">Features</a>
                <a href="#how-it-works" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700">How It Works</a>
                <a href="#pricing" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700">Pricing</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700">Login</a>
                <a href="{{ route('register') }}" class="block w-full text-center bg-primary-600 hover:bg-primary-700 text-white px-3 py-2 rounded-md transition duration-300">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                        Intelligent <span class="text-primary-600">Room Management</span> for Modern Spaces
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 max-w-lg">
                        Streamline your facility operations with our QR-based access control system. Perfect for universities, offices, and co-working spaces.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('register') }}" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-md text-center font-medium transition duration-300 shadow-md">
                            Start Free Trial
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                        <img src="https://polteksi.ac.id/backend/data/22022025192042.JPG" 
                             alt="Room management dashboard" 
                             class="w-full h-auto object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 hidden md:block">
                        <div class="flex items-center">
                            <div class="bg-primary-100 dark:bg-primary-900 p-2 rounded-full mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900 dark:text-white">1,200+ Rooms Managed</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Trusted by leading institutions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 text-sm font-medium rounded-full bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200 mb-4">
                    Key Features
                </span>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Powerful Tools for Space Optimization</h2>
                <p class="max-w-2xl mx-auto text-gray-600 dark:text-gray-300">
                    Our platform provides everything you need to efficiently manage room access and utilization.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-gray-50 dark:bg-gray-800 p-8 rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">QR Code Access</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Instant room access via unique QR codes. No more physical keys or access cards.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card bg-gray-50 dark:bg-gray-800 p-8 rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Real-time Approvals</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Admins can approve or reject room requests instantly from any device.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card bg-gray-50 dark:bg-gray-800 p-8 rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Usage Analytics</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Comprehensive reports on room utilization to optimize your space planning.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 text-sm font-medium rounded-full bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200 mb-4">
                    Simple Process
                </span>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">How OpenQR Works</h2>
                <p class="max-w-2xl mx-auto text-gray-600 dark:text-gray-300">
                    Get started with our room management system in just a few simple steps.
                </p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                    <div class="step-number bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-300">
                        1
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Create Your Account</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Sign up and set up your organization profile in minutes.
                    </p>
                </div>
                
                <!-- Step 2 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                    <div class="step-number bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-300">
                        2
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Add Rooms & Users</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Upload your room inventory and invite team members.
                    </p>
                </div>
                
                <!-- Step 3 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                    <div class="step-number bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-300">
                        3
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Generate QR Codes</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Our system automatically creates unique QR codes for each room.
                    </p>
                </div>
                
                <!-- Step 4 -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                    <div class="step-number bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-300">
                        4
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Manage Access</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Approve requests and monitor usage through the dashboard.
                    </p>
                </div>
            </div>
            
            <div class="mt-16 bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="md:flex">
                    <div class="md:flex-1 p-8 md:p-12">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">See It In Action</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Watch our 2-minute demo to see how OpenQR can transform your space management workflow.
                        </p>
                        <a href="#" class="inline-flex items-center text-primary-600 dark:text-primary-400 font-medium">
                            Play Video Demo
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <div class="md:flex-1 bg-gray-100 dark:bg-gray-700 flex items-center justify-center p-8">
                        <div class="relative w-full h-64 md:h-full">
                            <div class="absolute inset-0 bg-gray-300 dark:bg-gray-600 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="bg-primary-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to transform your space management?</h2>
            <p class="text-xl opacity-90 max-w-2xl mx-auto mb-10">
                Join hundreds of organizations using OpenQR to optimize their facilities.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('register') }}" class="bg-white text-primary-600 px-8 py-3 rounded-md font-medium hover:bg-gray-100 transition duration-300 shadow-md">
                    Get Started for Free
                </a>
                <a href="{{ route('login') }}" class="border-2 border-white text-white px-8 py-3 rounded-md font-medium hover:bg-white hover:bg-opacity-10 transition duration-300">
                    Existing User? Login
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-100 dark:bg-gray-800 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="text-lg font-semibold">OpenQR</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Smart room management solutions for modern organizations.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Product</h3>
                    <ul class="space-y-3">
                        <li><a href="#features" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">Features</a></li>
                        <li><a href="#how-it-works" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">How It Works</a></li>
                        <li><a href="#pricing" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">Pricing</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Company</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">About</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">Blog</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">Careers</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Legal</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">Privacy</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">Terms</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-200 dark:border-gray-700 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-4 md:mb-0">
                    © 2023 OpenQR. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition duration-300">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Dark mode toggle -->
    <button id="themeToggle" class="fixed bottom-6 right-6 bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 p-3 rounded-full shadow-lg hover:bg-gray-700 dark:hover:bg-gray-300 transition duration-300">
        <svg id="sunIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <svg id="moonIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
    </button>
    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuButton').addEventListener('click', function() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        });

        // Dark mode toggle
        document.getElementById('themeToggle').addEventListener('click', function() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        });

        // Check for saved theme preference
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        } else if (localStorage.getItem('darkMode') === 'false') {
            document.documentElement.classList.remove('dark');
        } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('darkMode', 'true');
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobileMenu');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</body>
</html>