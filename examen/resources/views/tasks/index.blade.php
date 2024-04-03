<x-app>
    <h1>Tasks</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <x-buttons.primary-button type="submit">Log out</x-buttons.primary-button>
    </form>
</x-app>
