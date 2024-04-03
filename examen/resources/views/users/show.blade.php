<x-app>
    <div class="p-8 bg-blue-100 h-screen">
        <div class="flex items-end justify-between my-5">
            <h1 class="font-bold text-3xl">User details</h1>
            <x-buttons.primary-link :href="route('users.index')">Back to overview</x-buttons.primary-link>
        </div>
        <table class="border-collapse w-full">
            <tr class="text-left">
                <x-table.th>Name</x-table.th>
                <x-table.th>Email</x-table.th>
                <x-table.th>Role</x-table.th>
            </tr>
                <tr>
                    <x-table.td>{{ $user->name }}</x-table.td>
                    <x-table.td>{{ $user->email }}</x-table.td>
                    <x-table.td>{{ $user->role }}</x-table.td>
                </tr>
        </table>
    </div>
</x-app>
