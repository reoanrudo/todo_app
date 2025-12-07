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
    //
</div>
