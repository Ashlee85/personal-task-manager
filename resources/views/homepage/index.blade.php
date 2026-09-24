<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

<header class="header">
    <div class="container header-content">
        <a href="{{ route('tasks.index') }}" class="logo">
             Personal<span>Task<span>Manager</span>
        </a>

        <a href="{{ route('tasks.create') }}" class="add-button">
            + Add Task
        </a>
    </div>
</header>

<main class="main">
    <div class="container">

        <h1 class="page-title">Personal Task Manager</h1>

        <p class="page-subtitle">
            Keep track of your tasks and stay organized.
        </p>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="task-list">

            @forelse($tasks as $task)

                <div class="task-card">

                    <div class="task-top">

                        <div>
                            <h2 class="task-name">
                                {{ $task->task_name }}
                            </h2>

                            <p class="task-description">
                                {{ $task->description ?? 'No description' }}
                            </p>
                        </div>

                        <span class="status {{ $task->status === 'Completed' ? 'status-completed' : 'status-pending' }}">
                            {{ $task->status }}
                        </span>

                    </div>

                    <div class="task-info">
                        <span>
                            <strong>Due:</strong>
                            {{ $task->due_date ?? 'No due date' }}
                        </span>
                    </div>

                    <div class="task-actions">

                        @if($task->status === 'Pending')

                            <form
                                action="{{ route('tasks.complete', $task) }}"
                                method="POST"
                                class="complete-form"
                            >
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="action-button complete-button"
                                >
                                    Complete
                                </button>
                            </form>

                        @endif

                        <a
                            href="{{ route('tasks.show', $task) }}"
                            class="action-button"
                        >
                            View
                        </a>

                        <a
                            href="{{ route('tasks.edit', $task) }}"
                            class="action-button"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('tasks.destroy', $task) }}"
                            method="POST"
                            class="delete-form"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="action-button delete-button"
                            >
                                Delete
                            </button>
                        </form>

                    </div>

                </div>

            @empty

                <div class="empty-state">

                    <h2>No tasks yet</h2>

                    <p>
                        Add your first task to get started.
                    </p>

                    <a
                        href="{{ route('tasks.create') }}"
                        class="add-button"
                    >
                        Add Task
                    </a>

                </div>

            @endforelse

        </div>

    </div>
</main>

</body>
</html>