
## 画像更新フロー

このアプリケーションにおける画像のアップロード、更新、削除のフローは以下の通りです。

### 1. 画像の保存場所

画像ファイルは、Laravelの `storage` ディスクの `public` ドライブ内に、具体的には `storage/app/public/fighters` ディレクトリに保存されます。ファイル名には、一意のハッシュ値が使用されます。

### 2. 公開アクセス

`storage/app/public` ディレクトリ内の画像をWebからアクセス可能にするために、`php artisan storage:link` コマンドを実行して `public/storage` ディレクトリへのシンボリックリンクを作成する必要があります。これにより、ブラウザから `/storage/fighters/ファイル名.jpg` のように画像にアクセスできるようになります。

### 3. 画像のアップロード (新規作成時)

- `FighterController` の `store` メソッドが画像のアップロードを処理します。
- 入力フォームから `image` という名前で画像ファイルを受け取ります。
- 受け取った画像は `storage/app/public/fighters` ディレクトリに保存され、そのパス（例: `fighters/xxxxxx.jpg`）がデータベースの `fighters` テーブルの `image_path` カラムに記録されます。

### 4. 画像の更新

- `FighterController` の `update` メソッドが画像の更新を処理します。
- 新しい画像ファイルがアップロードされた場合、以下の手順で処理されます。
    1. 既存の `image_path` にパスが記録されていれば、`Storage::disk('public')->delete($fighter->image_path)` を使用して古い画像ファイルが `storage/app/public/` から削除されます。
    2. 新しい画像は `storage/app/public/fighters` ディレクトリに保存され、その新しいパスがデータベースの `image_path` カラムに更新されます。

### 5. 画像の削除

- `FighterController` の `destroy` メソッドが `Fighter` レコードの削除を処理する際に、関連する画像ファイルも削除します。
- `fighter->image_path` にパスが存在する場合、`Storage::disk('public')->delete($fighter->image_path)` を使用して画像ファイルが `storage/app/public/` から削除されます。

