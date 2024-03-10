<x-guest-layout>
    <h1 style="color: #fff; text-align: center;"><b>ADD ADMIN USER</b></h1>
    <form method="POST" action="{{ route('admin.user.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>

                <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <x-input-select id="role" class="block mt-1 w-full" name="role" :value="old('role', 'pelanggan')">
                <option value="pelanggan">Pelanggan</option>
                <option value="admin">Admin</option>
            </x-input-select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Add more fields for additional admin details if needed -->

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('ADD ADMIN USER') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
