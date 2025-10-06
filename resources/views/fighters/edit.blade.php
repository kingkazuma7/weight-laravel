@extends('layouts.page')

@section('title', $fighter->name . ' の編集')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $fighter->name }} の編集</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">エラー！</strong>
                <span class="block sm:inline">入力内容に問題があります。</span>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('fighters.update', $fighter) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">名前:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="name" name="name" value="{{ old('name', $fighter->name) }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="organization">所属:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="organization" name="organization" value="{{ old('organization', $fighter->organization) }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">ステータス:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="status" name="status" value="{{ old('status', $fighter->status) }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="weight_class_id">階級:</label>
                <select class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="weight_class_id" name="weight_class_id" required>
                    @foreach ($weightClasses as $weightClass)
                        <option value="{{ $weightClass->id }}" {{ old('weight_class_id', $fighter->weight_class_id) == $weightClass->id ? 'selected' : '' }}>{{ $weightClass->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="notes">備考:</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="notes" name="notes">{{ old('notes', $fighter->notes) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">現在の画像:</label>
                @if ($fighter->image_path)
                    <img src="{{ Storage::url($fighter->image_path) }}" alt="{{ $fighter->name }}" class="mt-2 mb-4 max-w-xs h-auto rounded-md shadow">
                @else
                    <p class="text-gray-600">画像はありません。</p>
                @endif
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">新しい画像:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" id="image" name="image">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    更新
                </button>
                <div class="flex space-x-2">
                    <a href="{{ route('fighters.show', $fighter) }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        詳細に戻る
                    </a>
                    <a href="{{ route('fighters.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        一覧に戻る
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
