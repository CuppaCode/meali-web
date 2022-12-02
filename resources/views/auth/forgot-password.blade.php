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

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">    

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" class="flex flex-col pt-3 md:pt-8" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

                <x-login-button class="p-2 mt-6 normal-case">
                    {{ __('Email password reset link') }}
                </x-login-button>
        </form>
    </div>
</div>
<div class="w-1/2 shadow-2xl">
    <img class="object-cover w-full h-screen hidden md:block" src="/assets/images/hamburger-login.jpg">
</div>
</div>
    </x-auth-card>
</x-guest-layout>
