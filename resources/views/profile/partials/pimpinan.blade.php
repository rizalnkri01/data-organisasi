<h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Informasi Pimpinan</h3>
<hr class="mb-2 divide-y divide-gray-200">
    <div class="mb-4">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pimpinan Cabang</label>
        <x-text-input id="name" name="name" type="text" placeholder="Kabupaten Blitar" class="mt-1 block w-full" disabled/>
    </div>
    <div class="mb-4">
        <label for="pimpinan_utama_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pimpinan Anak Cabang</label>
            @foreach ($pimpinan_kedua as $data)
                <x-text-input id="pimpinan_kedua_id" name="pimpinan_kedua_id" type="text" class="mt-1 block w-full" value="{{ $data->pimpinan_utama->name }}" disabled/>
            @endforeach
    </div>
    <div class="mb-6">
        <label for="name_pimpinan_kedua" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pimpinan Ranting / Komisariat</label>
        @forelse ($pimpinan_kedua as $data)
            <x-text-input id="name_pimpinan_kedua" name="name_pimpinan_kedua" type="text" class="mt-1 block w-full" value="{{ $data->name_pimpinan_kedua }}" />
        @empty
            <x-text-input id="name_pimpinan_kedua" name="name_pimpinan_kedua" type="text" class="mt-1 block w-full"/>
        @endforelse
    </div>
    <div>
        <div class="flex items-center gap-4 mt-3">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Data Berhasil DI Simpan') }}</p>
            @endif
        </div>
    </div>