<x-guest-layout>
    
    <div class="w-full flex flex-wrap">
    
        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo-inv class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </x-slot>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">    
                <form method="POST" class="flex flex-col pt-3 md:pt-8" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="flex flex-col pt-4">
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input id="email" class="hadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required autofocus />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col pt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-orange-400 shadow-sm focus:border-orange-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <x-login-button class="p-2 mt-2">
                        {{ __('Log in') }}
                    </x-login-button>
                    

                    @if (Route::has('password.request'))
                            <a class="text-center pt-8 pb-12" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                </form>
            </div>
        </div>
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="/assets/images/hamburger-login.jpg">
        </div>
    </div>
    </x-auth-card>
</x-guest-layout>
