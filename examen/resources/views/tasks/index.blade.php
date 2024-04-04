<x-app>
    <div class="p-8 bg-blue-100 min-h-screen">
        <div class="flex items-end justify-between my-5">
            <div class="flex gap-4 items-end">
                <h1 class="font-bold text-3xl">Tasks</h1>
                <form action="{{ route('tasks.index') }}" method="GET">
                    <select title="filter" class="p-2 rounded-lg" name="filter" id="filter">
                        <option value="all" {{ request()->input('filter') === 'all' ? 'selected' : '' }}>All tasks
                        </option>
                        <option value="own" {{ request()->input('filter') === 'own' ? 'selected' : '' }}>Own tasks
                        </option>
                    </select>
                    <x-buttons.primary-button type="submit">Filter</x-buttons.primary-button>
                </form>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <x-buttons.primary-button type="submit">Log out</x-buttons.primary-button>
            </form>
        </div>
        <div class="p-8 bg-white rounded-lg" id='calendar'></div>
        @section('scripts')
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const calendarEl = document.getElementById('calendar');
                    const calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        events: [
                                @foreach($tasks as $task)
                            {
                                title: '{{ $task->title }}',
                                description: '{{ $task->description }}',
                                start: '{{ $task->start_datetime }}',
                                end: '{{ $task->end_datetime }}',
                                id: '{{ $task->id }}'
                            },
                            @endforeach
                        ],
                    });
                    calendar.render();
                });
            </script>
        @endsection
    </div>
</x-app>
