<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

    <div x-data="{ role: '{{ old('role') }}' }">
        <x-input-label for="role" value="Role" />

        <x-select
            name="role"
            x-model="role"
            required
            class="block mt-1 w-full rounded-md shadow-sm
                border-gray-300 dark:border-gray-700
                bg-white dark:bg-gray-900
                text-gray-900 dark:text-gray-300
                focus:border-indigo-500 focus:ring-indigo-500"
            :options="[
                'job_seeker' => 'Job Seeker',
                'recruiter' => 'Recruiter'
            ]"
        />

        <x-input-error :messages="$errors->get('role')" class="mt-2" />

        <!-- Specialty -->
        <div class="mt-4" x-show="role === 'recruiter'" x-transition>
            <x-input-label for="specialty" value="Specialty" />

            <x-text-input
                id="specialty"
                name="specialty"
                type="text"
                class="block mt-1 w-full"
                placeholder="e.g. Tech Recruiting"
            />

            <x-input-error :messages="$errors->get('specialty')" class="mt-2" />
        </div>
    </div>



        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
