<x-guest-layout>
    <h1 style="color: #fff; text-align: center;"><b>ADD MINUMAN</b></h1>
    <form method="POST" action="{{ route('add.minuman') }}" enctype="multipart/form-data">
        @csrf

        <!-- Nama -->
        <div>
            <x-input-label for="nama" :value="('nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- Harga -->
        <div class="mt-4">
            <x-input-label for="harga" :value="('Harga')" />
            <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" required autocomplete="harga" />
            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
        </div>

        <!-- Keterangan -->
        <div class="mt-4">
            <x-input-label for="keterangan" :value="('keterangan')" />
            <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan" :value="old('keterangan')" required autocomplete="keterangan" />
            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
        </div>

        <!-- Foto -->
        <div class="mt-4">
            <label for="foto" class="form-label">foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('ADD minuman') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
