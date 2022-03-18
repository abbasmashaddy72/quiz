<x-guest-layout>
    <div class="flex-auto hidden w-2/4 h-screen p-0 -mt-1 overflow-hidden bg-blue-500 md:block">
        <img src="{{ asset('images/auth/01.png') }}" class="object-cover w-full h-full" alt="images">
    </div>
    <div class="flex-auto w-full md:w-2/4">
        <div class="flex flex-wrap justify-center">
            <div class="flex-auto px-4 md:px-10">
                <div
                    class="relative flex flex-col justify-center mb-0 overflow-hidden bg-white rounded-lg shadow-none card-transparent xl:px-24">
                    <div class="flex-auto p-10">
                        <!--Logo start-->
                        <a href="/" class="flex items-center py-1 mb-4 mr-4 text-xl whitespace-nowrap">
                            <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                        </a>
                        <h2 class="mb-2 text-3xl font-medium text-center">Confirm Password</h2>
                        <p class="mb-4 text-center text-gray-600">
                            {{ __('Please fill out the Email & Password to reset your mail') }}
                        </p>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="flex flex-wrap">
                                <!-- Email Address -->
                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-label for="email" :value="__('Email')" />
                                        <x-input id="email" class="mt-1" type="email" name="email"
                                            :value="old('email')" required autofocus />
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-label for="password" :value="__('Password')" />
                                        <x-input id="password" class="mt-1" type="password" name="password"
                                            required />
                                    </div>
                                </div>
                                <!-- Confirm Password -->
                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <x-input id="password_confirmation" class="mt-1" type="password"
                                            name="password_confirmation" required />
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-center">
                                <x-admin.submit-button>
                                    {{ __('Reset Password') }}
                                </x-admin.submit-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
