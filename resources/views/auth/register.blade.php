<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-50 to-gray-200">
        <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-16 rounded-full">
                </div>
                <h2 class="text-3xl font-bold text-gray-800">Create Account</h2>
                <p class="mt-2 text-gray-600">Join our room management system</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf   

                <!-- Name Field -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" class="block text-sm font-medium text-gray-700" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <x-text-input id="name" class="block w-full pl-10" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Field -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <x-text-input id="email" class="block w-full pl-10" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="you@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password Field -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <x-text-input id="password" class="block w-full pl-10" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-700" />
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <x-text-input id="password_confirmation" class="block w-full pl-10" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Register Button -->
                <div>
                    <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Create Account') }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </x-primary-button>
                </div>
            </form>

            <!-- Footer Links -->
            <div class="mt-8 text-center text-sm text-gray-600">
                <p>
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        {{ __('Sign in') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>