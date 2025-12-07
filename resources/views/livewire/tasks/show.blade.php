<?php

use function Livewire\Volt\{state};
use App\Models\Task;

// ルートモデルバインディング
state(['task' => fn(Task $task) => $task]);

// 編集ページにリダイレクト
$edit = function () {
    // 編集ページにリダイレクト
    return redirect()->route('task.edit', $this->task);
};

$destroy = function () {
    $this->task->delete();
    return redirect()->route('tasks.index');
};


?>

<div>
    <a href="{{ route('tasks.index') }}">戻る</a>
    <h1>{{ $task->title }}</h1>
    <p>{!! nl2br(e($task->body)) !!}</p>
    <p><strong>優先度:</strong> {{ $task->priority_text }}</p>

    <button wire:click="edit">編集する</button>
    <button wire:click="destroy" wire:confirm="本当に削除しますか？">削除する</button>
</div>
