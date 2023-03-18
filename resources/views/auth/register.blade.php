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

                <form method="POST" class="flex flex-col pt-3 md:pt-8" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="flex flex-col pt-4">
                        <x-input-label for="name" :value="__('Name')" />

                        <x-text-input id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" :value="old('name')" required autofocus />

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="flex flex-col pt-4">
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col pt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                        type="password"
                                        name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Opt-in newsletter -->
                    <div class="mt-4">
                        <input id="opt_in_newsletter" class="shadow appearance-none border rounded py-2 px-2 -mt-1 mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        type="checkbox"
                                        name="opt_in_newsletter" />

                        <x-input-label class="pt-4 inline-block" for="opt_in_newsletter" :value="__('Subscribe to our newsletter')" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <x-login-button class="p-2 mt-6">
                        {{ __('Register') }}
                    </x-login-button>

                    <div class="flex items-center justify-center mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Login here') }}
                        </a>

                        
                    </div>
                </form>
            </div>
        </div>

    <div class="w-1/2 shadow-2xl">
        <img class="object-cover w-full h-screen hidden md:block" src="/assets/images/hamburger-login.jpg">
    </div>
</div>
</x-auth-card>
</x-guest-layout>
