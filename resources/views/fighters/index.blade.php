@extends('layouts.page')

@section('title', '選手一覧')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">選手一覧</h1>

        <a href="{{ route('fighters.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            新しい選手を追加
        </a>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <ul class="bg-white shadow overflow-hidden sm:rounded-md">
            @foreach ($fighters as $fighter)
                <li class="border-t border-gray-200">
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50">
                        <a href="{{ route('fighters.show', $fighter) }}" class="text-lg font-medium text-gray-900">{{ $fighter->name }}</a>
                        <div class="flex space-x-2">
                            <a href="{{ route('fighters.edit', $fighter) }}" class="text-indigo-600 hover:text-indigo-900">編集</a>
                            <form action="{{ route('fighters.destroy', $fighter) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
