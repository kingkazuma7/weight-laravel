<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>格闘技 階級一覧</title>
    <!-- Tailwind CSS を読み込み -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 p-4 md:p-8 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-4xl mx-auto bg-white shadow-2xl rounded-xl p-6 md:p-10 border border-gray-100">
        
        <!-- タイトルエリア -->
        <h1 class="text-3xl font-extrabold text-indigo-700 mb-2">
            格闘技 階級データ一覧
        </h1>
        <p class="text-sm text-gray-500 mb-8 border-b pb-4">
            Eloquent ORM を介して取得されたボクシング、RIZIN、UFCの階級データです。
        </p>
        
        <!-- データテーブル -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-lg">
            <table class="min-w-full divide-y divide-indigo-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider w-1/4 rounded-tl-lg">
                            格闘技
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider w-1/4">
                            階級名
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider w-1/2 rounded-tr-lg">
                            体重制限
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <!-- コントローラから渡された $classes (Eloquentコレクション) をループで展開 -->
                    @forelse ($classes as $class)
                        <tr class="hover:bg-indigo-50 transition duration-150 ease-in-out">
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-semibold text-gray-800">
                                {{ $class->type }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">
                                {{ $class->name }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">
                                {{ $class->weight_limit }}
                            </td>
                        </tr>
                    @empty
                        <!-- データがない場合に表示されるメッセージ -->
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-sm font-medium text-red-600 bg-red-50">
                                データを取得できませんでした。ステップ3のコマンド実行を確認してください。
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
