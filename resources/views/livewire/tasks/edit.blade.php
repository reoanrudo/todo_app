<?php

use function Livewire\Volt\{state, mount, rules};
use App\Models\Task;

// フォームの状態を管理
state(['task', 'title', 'description']);

// ルートモデルバインディングはmountでまとめて行う
mount(function (Task $task) {
    $this->task = $task;
    $this->title = $task->title;
    $this->description = $task->description;
});

// バリデーションルールを定義
rules([
    'title' => 'required|string|max:50',
    'description' => 'required|string|max:2000',
]);

$update = function () {
    $this->validate(); // バリデーションチェック
    $this->task->update($this->only('title', 'description'));
    return redirect()->route('tasks.show', $this->task);
};

?>

<div>
    <a href="{{ route('tasks.show', $task) }}">戻る</a>
    <h1>更新</h1>

    <!-- wire:submit="update"でフォーム送信時にupdate関数を呼び出し -->
    <form wire:submit="update">
        <p>
            <label for="title">タスクのタイトル</label>
            @error('title')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="title"で入力値とコンポーネントの状態($this->title)を自動的に同期 -->
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="description">タスクの説明</label>
            @error('description')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="description"で入力値とコンポーネントの状態($this->description)を自動的に同期 -->
            <textarea wire:model="description" id="description"></textarea>
        </p>
        <button type="submit">更新する</button>
    </form>
</div>
