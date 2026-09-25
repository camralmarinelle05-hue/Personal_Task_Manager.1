<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add New Task</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="form-container">

        <div class="form-card">

            <h1>Add New Task</h1>

            <p class="form-subtitle">
                Create a new task and keep track of your work.
            </p>


            <form action="{{ route('tasks.store') }}" method="POST">

                @csrf


                <!-- Task Name -->
                <div class="form-group">

                    <label for="task_name">
                        Task Name
                    </label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        placeholder="Enter task name"
                        required
                    >

                </div>


                <!-- Description -->
                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter task description"
                        rows="4"
                    ></textarea>

                </div>


                <!-- Status -->
                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select id="status" name="status">

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="Completed">
                            Completed
                        </option>

                    </select>

                </div>


                <!-- Due Date -->
                <div class="form-group">

                    <label for="due_date">
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                    >

                </div>


                <!-- Buttons -->
                <div class="form-actions">

                    <a href="{{ route('tasks.index') }}"
                       class="back-button">
                        Back to Tasks
                    </a>

                    <button type="submit"
                            class="save-button">
                        Save Task
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>

</html>