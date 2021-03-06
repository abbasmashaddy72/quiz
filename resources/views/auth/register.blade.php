<x-guest-layout>
    <div class="flex-auto w-full md:w-2/4">
        <div class="flex flex-wrap justify-center">
            <div class="flex-auto px-4 md:px-10">
                <div
                    class="relative flex flex-col justify-center mb-0 overflow-hidden bg-white rounded-lg shadow-none card-transparent xl:px-24">
                    <div class="flex-auto p-10">
                        <h2 class="mb-2 text-3xl font-medium text-center">Getting Started with Quiz</h2>
                        <p class="mb-4 text-center text-gray-600">Please Fill All the Below Details.</p>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="flex flex-wrap">
                                <!-- Name -->
                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-form-input name="name" label="Name" autofocus />
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-form-input name="phone" label="Phone" type="number" />
                                    </div>
                                </div>

                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-form-input name="age" label="Age" />
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-form-input name="email" label="Email" />
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-form-input name="password" label="Password" type="hidden" value="password" />
                                    </div>
                                </div>

                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-form-input name="password_confirmation" label="Confirm Password"
                                            type="hidden" value="password" />
                                    </div>
                                </div>

                                <!-- Class -->
                                <div class="flex-auto w-full">
                                    <div class="mb-4">
                                        <x-form-checkbox name="interest" label="Are You Interested in Islamic Class?" />
                                    </div>
                                </div>

                                <!-- Remember Me & Forgot Password -->
                                <div class="flex justify-center flex-auto w-full">
                                    <x-admin.submit-button>
                                        {{ __('Next') }}
                                    </x-admin.submit-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-auto hidden w-2/4 h-screen p-0 -mt-1 overflow-hidden bg-blue-500 md:block">
        <img src="{{ asset('images/auth/01.png') }}" class="object-cover w-full h-full" alt="images">
    </div>
</x-guest-layout>
