    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Data User') }}
            </h2>
        </x-slot>


        <div class="py-4 flex justify-center items-center min-h-screen">
            <div>

                <div class="mb-4">
                    <a href="{{ route('user.create') }}">
                        <button style="background-color: #187bdf; color: #111827;" class="px-4 py-2 mb-4 rounded">
                            <b>Tambah User</b>
                        </button>
                    </a>
                </div>

                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-left">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Nama</th>
                                <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Email</th>
                                <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Role</th>
                                <!-- Add more columns as needed -->
                                <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr class="border-b border-gray-300 dark:border-gray-700">
                                    <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">{{ $user->name }}</td>
                                    <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">{{ $user->email }}</td>
                                    <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">{{ $user->role }}</td>

                                    <!-- Add more cells for additional user data -->

                                    <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">
                                        <a href="{{ route('edit.user', ['id' => $user->id]) }}">
                                            <button style="background-color: #1af0de; color: #111827;" class="px-4 py-2 mb-4 rounded">
                                                <b>EDIT</b>
                                            </button>
                                        </a>
                                        <form action="{{ route('delete.user', ['id' => $user->id]) }}" method="post" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" style="background-color: #df1b18; color: #111827;" class="px-4 py-2 mb-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <b>DELETE</b>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Tidak ada data user</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
