<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Minuman') }}
        </h2>
    </x-slot>

    <div class="py-4 flex justify-center items-center min-h-screen">
        <div>
            <h1 class="text-2xl font-semibold mb-4">Daftar Minuman</h1>

            <div class="mb-4">
                <a href="{{ route('minuman.create') }}">
                    <button style="background-color: #187bdf; color: #111827;" class="px-4 py-2 mb-4 rounded">
                        <b>Tambah Minuman</b>
                    </button>
                </a>
            </div>

            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-left">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Nama</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Harga</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-2000">Keterangan</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Foto</th>
                            <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($minuman as $item)
                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">{{ $item->nama }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">{{ $item->harga }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-2000">{{ $item->keterangan }}</td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">
                                    @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" style="width: 100px; display: block; margin: auto;">
                                    @else
                                        <span>Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">
                                    <form action="{{ route('dontol.dontol', ['id' => $item->id]) }}" method="get" style="display:inline;">
                                        @csrf
                                        <button type="submit" style="background-color: #1af0de; color: #111827;" class="px-4 py-2 mb-4 rounded">
                                            <b>EDIT</b>
                                        </button>
                                    </form>
                                    <form action="/select-delete-minuman/{{$item->id}}" method="post" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" style="background-color: #df1b18; color: #111827;" class="px-4 py-2 mb-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                            <b>DELETE</b>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
