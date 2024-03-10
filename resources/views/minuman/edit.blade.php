<x-guest-layout>
    <h1 style="color: #fff; text-align: center;"><b>EDIT MINUMAN</b></h1>
    <form method="POST" action="{{ route('update.minuman', ['id' => $data_minuman->id]) }}" enctype="multipart/form-data">
        @csrf
        <!-- Nama -->
        <div>
            <x-input-label for="nama" :value="('nama')" />
            @if($data_minuman)
                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" value="{{ $data_minuman->nama }}" required autofocus autocomplete="nama" />
            @else
                <p>minuman not found.</p>
            @endif
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- harga -->
        <div>
            <x-input-label for="harga" :value="('harga')" />
            @if($data_minuman)
                <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" value="{{ $data_minuman->harga }}" required autofocus autocomplete="harga" />
            @else
                <p>harga not found.</p>
            @endif
            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
        </div>

        <!-- keterangan -->
        <div>
            <x-input-label for="keterangan" :value="('keterangan')" />
            @if($data_minuman)
                <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan" value="{{ $data_minuman->keterangan }}" required autofocus autocomplete="keterangan" />
            @else
                <p>keterangan not found.</p>
            @endif
            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
        </div>

        <!-- foto -->
        <div>
            <x-input-label for="foto" :value="'Foto'" />
            @if($data_minuman)
                <input id="foto" class="block mt-1 w-full" type="file" name="foto" accept="image/*" />
                @if($data_minuman->foto)
                @else
                    <p>Foto not found.</p>
                @endif
            @else
                <p>Data minuman not found.</p>
            @endif
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('UPDATE MINUMAN') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
