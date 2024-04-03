<x-app>
    <div class="h-screen flex justify-center items-center bg-blue-100">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <h1 class="text-3xl mb-3">Create user</h1>
            <div class="flex flex-col">
                <x-forms.label for="name">Name</x-forms.label>
                <x-forms.input id="name" type="text" name="name" required />
                @error('name')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <x-forms.label for="email">Email</x-forms.label>
                <x-forms.input id="email" type="email" name="email" required />
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <x-forms.label for="password">Password</x-forms.label>
                <x-forms.input id="password" type="password" name="password" required/>
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <x-forms.label for="role">Role</x-forms.label>
                <select id="role" name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <x-buttons.primary-button type="submit">Create</x-buttons.primary-button>
            <x-buttons.primary-link :href="route('users.index')">Back to overview</x-buttons.primary-link>
        </form>
    </div>
</x-app>
