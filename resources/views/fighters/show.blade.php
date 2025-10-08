@extends('layouts.page')

@section('title', $fighter->name . ' の詳細')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $fighter->name }} の詳細</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @if ($fighter->image_path)
                <img src="{{ Storage::url($fighter->image_path) }}" alt="{{ $fighter->name }}" class="mb-4 max-w-sm h-auto rounded-md shadow">
            @else
                <p class="text-gray-600 mb-4">画像はありません。</p>
            @endif

            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold">名前:</p>
                <p class="text-gray-900 text-lg">{{ $fighter->name }}</p>
            </div>
            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold">所属:</p>
                <p class="text-gray-900">{{ $fighter->organization }}</p>
            </div>
            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold">ステータス:</p>
                <p class="text-gray-900">{{ $fighter->status }}</p>
            </div>
            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold">階級:</p>
                <p class="text-gray-900">{{ $fighter->weightClass->name }}</p>
            </div>
            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold">備考:</p>
                <p class="text-gray-900">{{ $fighter->notes }}</p>
            </div>

            <div class="flex space-x-2 mt-6">
                <a href="{{ route('fighters.edit', $fighter) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    編集
                </a>
                <a href="{{ route('fighters.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    一覧に戻る
                </a>
            </div>
        </div>
    </div>
@endsection
