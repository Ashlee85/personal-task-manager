<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

<header class="header">
    <div class="container header-content">
        <a href="{{ route('tasks.index') }}" class="logo">
             Personal<span>Task<span>Manager</span>
        </a>

        <a href="{{ route('tasks.index') }}" class="add-button">
            Back to Tasks
        </a>
    </div>
</header>

<main class="main">
    <div class="container">

        <a href="{{ route('tasks.index') }}" class="back-link">
            ← Back to Homepage
        </a>

        <div class="form-card">

            <h1 class="page-title">Edit Task</h1>

            <p class="page-subtitle">
                Update the details of your task.
            </p>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('tasks.update', $task) }}"
                method="POST"
                class="task-form"
            >

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">
                        Task Name
                    </label>

                    <input
                        type="text"
                        name="task_name"
                        class="form-input"
                        value="{{ old('task_name', $task->task_name) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="form-textarea"
                    >{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Due Date
                    </label>

                    <input
                        type="date"
                        name="due_date"
                        class="form-input"
                        value="{{ old('due_date', $task->due_date) }}"
                    >
                </div>

                <div class="form-actions">

                    <button
                        type="submit"
                        class="primary-button"
                    >
                        Update Task
                    </button>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="secondary-button"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>
</main>

</body>
</html>