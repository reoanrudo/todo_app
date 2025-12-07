<?php

use function Livewire\Volt\{state, mount};
use App\Models\Task;

state(['tasks' => fn() => Task::all()]);

$create = function () {
    return redirect()->route('tasks.create');
};

?>

<div>
    <h1>タスク一覧</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task) }}">
                    {{ $task->title }} [{{ $task->priority_text }}]
                </a>
            </li>
        @endforeach
    </ul>

    <button wire:click="create">登録する</button>

</div>
