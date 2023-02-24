<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Card -->
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center">
        Masuk Data Organisasi
    </h2>
    <ul class=" mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
    <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name@company.com" value="{{ old('email') }}" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="remember_me" aria-describedby="remember_me" name="remember_me" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
            </div>
            <div class="ml-3 text-sm">
            <label for="remember_me" class="font-medium text-gray-900 dark:text-white">Ingat saya</label>
            </div>
            <a href="{{ route('password.request') }}" class="underline ml-auto text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">{{ __('Lupa Password?') }}</a>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
        <ul class="pt-5 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
            Belum Daftar? <a href="{{ route('register') }}" class=" underline text-primary-700 hover:underline dark:text-primary-500">Buat Akun</a>
        </div>
    </form>
</x-guest-layout>
