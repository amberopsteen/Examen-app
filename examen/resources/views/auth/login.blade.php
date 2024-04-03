<x-app>
    <div class="h-screen flex justify-center items-center bg-blue-100">
        <form method="POST" action="{{ route('login') }}">
            <h1 class="text-3xl mb-3">Login</h1>
            @csrf
            <div class="flex flex-col">
                <x-forms.label for="email">E-mail</x-forms.label>
                <x-forms.input id="email" type="email" name="email" required autofocus/>
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
            <x-buttons.primary-button type="submit">Login</x-buttons.primary-button>
        </form>
    </div>
</x-app>
