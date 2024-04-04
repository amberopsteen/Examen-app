<x-app>
    <div class="h-screen flex justify-center items-center bg-blue-100">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <h1 class="text-3xl mb-3">Create task</h1>
            <div class="flex flex-col">
                <x-forms.label for="title">Title</x-forms.label>
                <x-forms.input type="text" name="title" required />
                @error('title')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <x-forms.label for="description">Description</x-forms.label>
                <x-forms.input type="text" name="description" required />
                @error('description')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <x-forms.label for="start_datetime">Start date</x-forms.label>
                <x-forms.input type="datetime-local" name="start_datetime" required/>
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <x-forms.label for="end_datetime">End date</x-forms.label>
                <x-forms.input type="datetime-local" name="end_datetime" required/>
                @error('end_datetime')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <x-buttons.primary-button type="submit">Create</x-buttons.primary-button>
            <x-buttons.primary-link :href="route('tasks.index')">Back to overview</x-buttons.primary-link>
        </form>
    </div>
</x-app>
