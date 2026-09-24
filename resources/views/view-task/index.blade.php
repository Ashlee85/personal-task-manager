<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Task</title>
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

        <a href="{{ route('tasks.index') }}" class="back-link">
            ← Back to Homepage
        </a>

        <div class="detail-card">

            <h1 class="detail-title">
                {{ $task->task_name }}
            </h1>

            <div class="detail-section">
                <div class="detail-label">
                    Description
                </div>

                <div class="detail-value">
                    {{ $task->description ?? 'No description' }}
                </div>
            </div>

            <div class="detail-section">
                <div class="detail-label">
                    Status
                </div>

                <div class="detail-value">
                    {{ $task->status }}
                </div>
            </div>

            <div class="detail-section">
                <div class="detail-label">
                    Due Date
                </div>

                <div class="detail-value">
                    {{ $task->due_date ?? 'No due date' }}
                </div>
            </div>

            <div class="detail-section">
                <div class="detail-label">
                    Created
                </div>

                <div class="detail-value">
                    {{ $task->created_at }}
                </div>
            </div>

            <div class="detail-section">
                <div class="detail-label">
                    Updated
                </div>

                <div class="detail-value">
                    {{ $task->updated_at }}
                </div>
            </div>

            <div class="form-actions">

                <a
                    href="{{ route('tasks.edit', $task) }}"
                    class="primary-button"
                >
                    Edit Task
                </a>

                <a
                    href="{{ route('tasks.index') }}"
                    class="secondary-button"
                >
                    Back to Homepage
                </a>

            </div>

        </div>

    </div>
</main>

</body>
</html>