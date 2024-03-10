<x-guest-layout>
    <h1 style="color: #fff; text-align: center;"><b>EDIT USER</b></h1>
    <form method="POST" action="{{ route('update.user', ['id' => $user->id]) }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <x-input-select id="role" class="block mt-1 w-full" name="role" :value="old('role', $user->role ?? 'user')">
                <option value="pelanggan">Pelanggan</option>
                <option value="admin">Admin</option>
                <!-- Add more role options if needed -->
            </x-input-select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>


        <!-- Add more fields for additional user details if needed -->

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('UPDATE USER') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
