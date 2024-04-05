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
                                @if($task->users->isNotEmpty())
                                user: '{{ $task->users->first()->name }}',
                                @endif
                                start: '{{ $task->start_datetime }}',
                                end: '{{ $task->end_datetime }}',
                                id: '{{ $task->id }}'
                            },
                            @endforeach
                        ],

                        eventClick: function (info) {
                            const title = info.event.title;
                            const description = info.event.extendedProps.description;
                            const user = info.event.extendedProps.user;
                            const startDatetime = formatDate(info.event.start);
                            const endDatetime = formatDate(info.event.end);
                            const id = info.event.id;

                            // A overlay where you can find the details of a task
                            const overlayTasks = `
                            <div id="overlay" class="fixed top-0 left-0 w-full h-full z-50 p-10">
                                <div class="absolute top-2/4 left-2/4 p-5 bg-blue-100 opacity-8 rounded-lg max-w-lg">
                                    <h2 class="text-xl font-bold">${title}</h2>
                                    <p><span class="font-bold">Description:</span> ${description}</p>
                                    <p><span class="font-bold">User:</span> ${user}</p>
                                    <p><span class="font-bold">Start Date:</span> ${startDatetime}</p>
                                    <p><span class="font-bold">End Date:</span> ${endDatetime}</p>
                                    <div class="flex justify-between items-end">
                                         <div>
                                         <button class="px-8 py-1.5 rounded-lg mt-3 bg-blue-300" onclick="editTask(${id})">Edit</button>
                                             <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 px-8 py-1.5 rounded-lg mt-3 text-white">Archive</button>
                                             </form>
                                             <form action="{{ route('tasks.forceDestroy', $task) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 px-8 py-1.5 rounded-lg mt-3 text-white">Delete</button>
                                             </form>
                                         </div>
                                               <button class="px-8 py-1.5 rounded-lg mt-3 bg-blue-300" onclick="closeOverlay()">Close</button>
                                            </div>
                                        </div>
                                    </div>
`;
                            document.body.insertAdjacentHTML('beforeend', overlayTasks);
                        },
                        dateClick: function (info) {
                            const selectedDate = info.dateStr;
                            window.location.href = '/tasks/create?date=' + selectedDate;
                        }
                    });
                    calendar.render();
                });

                // function to format the date
                function formatDate(date) {
                    const options = {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: true,
                        timeZoneName: 'short'
                    };
                    return new Date(date).toLocaleString('en-US', options);
                }

                function editTask(id) {
                    window.location.href = '/tasks/' + id + '/edit';
                }

                function closeOverlay() {
                    document.getElementById('overlay').remove();
                }
            </script>
        @endsection
    </div>
</x-app>
