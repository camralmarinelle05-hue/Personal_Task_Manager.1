<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="container">

        <!-- Header -->
        <div class="header">

            <h1>Personal Task Manager</h1>

            <a href="{{ route('tasks.create') }}" class="add-button">
                + Add New Task
            </a>

        </div>


        <!-- Success Message -->
        @if(session('success'))

            <p style="color: green;">
                {{ session('success') }}
            </p>

        @endif


        <!-- Task List -->
        @if($tasks->count() > 0)

            @foreach($tasks as $task)

                <div class="task-card">

                    <h2>
                        {{ $task->task_name }}
                    </h2>


                    <p class="task-description">
                        {{ $task->description }}
                    </p>


                    <p class="task-info">

                        <strong>Status:</strong>

                        @if($task->status == 'Pending')

                            <span class="status status-pending">
                                Pending
                            </span>

                        @else

                            <span class="status status-completed">
                                Completed
                            </span>

                        @endif

                    </p>


                    <p class="task-info">

                        <strong>Due Date:</strong>

                        {{ $task->due_date }}

                    </p>


                    <!-- Buttons -->
                    <div class="actions">

                        <!-- Edit -->
                        <a href="{{ route('tasks.edit', $task->id) }}"
                           class="btn btn-edit">
                            Edit
                        </a>


                        <!-- Mark as Completed -->
                        @if($task->status == 'Pending')

                            <form action="{{ route('tasks.complete', $task->id) }}"
                                  method="POST">

                                @csrf

                                @method('PATCH')

                                <button type="submit"
                                        class="btn btn-complete">

                                    Mark as Completed

                                </button>

                            </form>

                        @endif


                        <!-- Delete -->
                        <form action="{{ route('tasks.destroy', $task->id) }}"
                              method="POST">

                            @csrf

                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this task?')">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            @endforeach


        @else

            <!-- No Tasks -->
            <div class="empty-message">

                <p>No tasks yet.</p>

                <p>
                    Click <strong>+ Add New Task</strong> to create your first task.
                </p>

            </div>

        @endif

    </div>

</body>

</html>