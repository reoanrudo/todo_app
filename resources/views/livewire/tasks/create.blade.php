<?php

use function Livewire\Volt\{state, rules};
use App\Models\Task;

state(['title', 'description' => 1])

// バリデーションルールを定義
rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
]);

// メモを保存する関数
$store = function () {
    $this->validate(); // バリデーションチェック
    // フォームからの入力値をデータベースへ保存
    Memo::create($this->all());

    // 一覧ページにリダイレクト
    return redirect()->route('tasks.index');
};


v

?>

<div>
    <a href="{{ route('tasks.index') }}">戻る</a>
    <h1>新規登録</h1>

    <!-- wire:submit="store"でフォーム送信時にstore関数を呼び出し -->
    <form wire:submit="store">
        <p>
            <label for="title">タイトル</label>
            @error('title')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="title"で入力値とコンポーネントの状態($this->title)を自動的に同期 -->
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="description">本文</label>
            @error('description')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="description"で入力値とコンポーネントの状態($this->description)を自動的に同期 -->
            <textarea wire:model="description" id="description"></textarea>
        </p>
</div>
