@extends('layouts.page')

@section('title', config('app.meta.title'))
@section('meta_description', config('app.meta.description'))
@section('meta_keywords', config('app.meta.keywords'))

@section('content')
    <div class="bg-gray-50 p-4 md:p-8 min-h-screen flex justify-center">
        <div class="w-full max-w-4xl mx-auto bg-white shadow-2xl rounded-xl p-6 md:p-10 border border-gray-100">
            <!-- タイトルエリア -->
            <h1 class="text-3xl font-extrabold text-gray-800 mb-2">
                格闘技 階級データ一覧
            </h1>
            <p class="text-sm text-gray-500 mb-4">
                各格闘技の階級データを表示します。タブをクリックして切り替えてください。
            </p>

            <!-- タブボタン -->
            <div class="flex space-x-1 mb-6 border-b">
                <button onclick="showTab('rizin')" id="rizin-tab" class="px-4 py-2 rounded-t-lg font-semibold transition duration-150 ease-in-out bg-indigo-600 text-white">
                    RIZIN
                </button>
                <button onclick="showTab('ufc')" id="ufc-tab" class="px-4 py-2 rounded-t-lg font-semibold transition duration-150 ease-in-out text-gray-600 hover:text-red-600">
                    UFC
                </button>
            </div>

            <!-- RIZINのデータテーブル -->
            <div id="rizin-content" class="tab-content active">
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-lg scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                    <table class="min-w-[600px] w-full divide-y divide-indigo-200">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider w-1/3 rounded-tl-lg">
                                    階級名
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider w-1/3">
                                    体重制限
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider w-1/3 rounded-tr-lg">
                                    主要・トップ選手
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($classes->where('type', 'RIZIN(MMA)') as $class)
                                <tr class="hover:bg-indigo-50 transition duration-150 ease-in-out">
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">
                                        {{ $class->name }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">
                                        @if ($class->weight_limit === '無制限')
                                            {{ $class->weight_limit }}
                                        @else
                                            {{ number_format((float)str_replace(['kg', ' '], '', $class->weight_limit)) }} kg以下
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-600">
                                        @php
                                            // 階級に紐づく選手の中から、statusが'champion'のレコードを検索
                                            $champion = $class->fighters->where('status', 'champion')->first();
                                        @endphp

                                        @if ($champion)
                                            <div class="space-y-1">
                                                <div class="flex items-center space-x-2">
                                                    <span class="text-yellow-500">🏆</span>
                                                    <span class="font-bold text-indigo-600">{{ $champion->name }}</span>
                                                </div>
                                                @if ($champion->notes)
                                                    <div class="text-xs text-gray-500 italic">{{ $champion->notes }}</div>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-gray-400 italic">（チャンピオン不在）</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-4 text-center text-sm font-medium text-indigo-600 bg-indigo-50">
                                        RIZINのデータを取得できませんでした。
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- UFCのデータテーブル -->
            <div id="ufc-content" class="tab-content">
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-lg scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                    <table class="min-w-[600px] w-full divide-y divide-red-200">
                        <thead class="bg-red-600 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider w-1/3 rounded-tl-lg">
                                    階級名
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider w-1/3">
                                    体重制限
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider w-1/3 rounded-tr-lg">
                                    主要・トップ選手
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($classes->where('type', 'UFC') as $class)
                                <tr class="hover:bg-red-50 transition duration-150 ease-in-out">
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">
                                        {{ $class->name }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">
                                        {{ number_format((float)str_replace(['kg', ' '], '', $class->weight_limit), 1) }} kg以下
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-600">
                                        @php
                                            // 階級に紐づく選手の中から、statusが'champion'のレコードを検索
                                            $champion = $class->fighters->where('status', 'champion')->first();
                                        @endphp

                                        @if ($champion)
                                            <div class="space-y-1">
                                                <div class="flex items-center space-x-2">
                                                    <span class="text-yellow-500">🏆</span>
                                                    <span class="font-bold text-red-600">{{ $champion->name }}</span>
                                                </div>
                                                @if ($champion->notes)
                                                    <div class="text-xs text-gray-500 italic">{{ $champion->notes }}</div>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-gray-400 italic">（チャンピオン不在）</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-4 text-center text-sm font-medium text-red-600 bg-red-50">
                                        UFCのデータを取得できませんでした。
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- フッターリンク -->
            <div class="mt-8 px-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">関連リンク</h2>
                <ul class="text-sm space-y-2">
                    <li>
                        <a href="https://kick.tokyo/?utm_source=weight-laravel&utm_medium=referral&utm_campaign=footer_link" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:text-blue-800 transition duration-150 ease-in-out flex items-center">
                            <span class="mr-2">→</span>
                            総合&amp;MMA好きの格闘技ブログ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <script>
        function showTab(tabName) {
            // すべてのコンテンツを非表示
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // すべてのタブボタンのスタイルをリセット
            document.getElementById('rizin-tab').className = 'px-4 py-2 rounded-t-lg font-semibold transition duration-150 ease-in-out text-gray-600 hover:text-indigo-600';
            document.getElementById('ufc-tab').className = 'px-4 py-2 rounded-t-lg font-semibold transition duration-150 ease-in-out text-gray-600 hover:text-red-600';
            
            // 選択されたコンテンツを表示
            document.getElementById(tabName + '-content').classList.add('active');
            
            // 選択されたタブのスタイルを変更
            switch(tabName) {
                case 'rizin':
                    document.getElementById('rizin-tab').className = 'px-4 py-2 rounded-t-lg font-semibold transition duration-150 ease-in-out bg-indigo-600 text-white';
                    break;
                case 'ufc':
                    document.getElementById('ufc-tab').className = 'px-4 py-2 rounded-t-lg font-semibold transition duration-150 ease-in-out bg-red-600 text-white';
                    break;
            }
        }

        // 初期表示
        document.addEventListener('DOMContentLoaded', function() {
            showTab('rizin');
        });
    </script>
@endsection