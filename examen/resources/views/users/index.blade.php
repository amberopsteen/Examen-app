<x-app>
    <div class="p-8 bg-blue-100 h-screen">
        <div class="flex items-end justify-between my-5">
            <h1 class="font-bold text-3xl">Users</h1>
            <div class="flex gap-2 items-end">
                <x-buttons.primary-link :href="route('users.create')">Create</x-buttons.primary-link>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <x-buttons.primary-button type="submit">Log out</x-buttons.primary-button>
                </form>
            </div>
        </div>
        <table class="border-collapse w-full">
            <tr class="text-left">
                <x-table.th>Name</x-table.th>
                <x-table.th>Email</x-table.th>
                <x-table.th>Role</x-table.th>
                <x-table.th>Show</x-table.th>
                <x-table.th>Delete</x-table.th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <x-table.td>{{ $user->name }}</x-table.td>
                    <x-table.td>{{ $user->email }}</x-table.td>
                    <x-table.td>{{ $user->role }}</x-table.td>
                    <x-table.td>
                        <x-buttons.primary-link :href="route('users.show', $user->id)">Show</x-buttons.primary-link>
                    </x-table.td>
                    <x-table.td>
                        <form id="delete" action="{{ route('users.destroy', $user->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete {{ $user->name }}?');">
                            @csrf
                            @method('DELETE')
                            <x-buttons.delete-button type="submit">Delete</x-buttons.delete-button>
                        </form>
                    </x-table.td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app>
