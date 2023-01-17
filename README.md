# 動作確認方法

## 前提条件

- Dockerがインストール済
- PHP, Composerがインストール済

## 1. git clone

```bash
# ssh
git clone git@github.com:wadakatu/laravel-admin-test.git

または...

# https
git clone https://github.com/wadakatu/laravel-admin-test.git
```

## 2. envファイル準備

```bash
cp .env.example .env
```

## 3. .envファイルにDB設定追加

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

## 4. composer install

```bash
composer install
```

## 5. laravel/sail up

```bash
./vendor/bin/sail up -d
```

## 6. php artisan key:generate

```bash
./vendor/bin/sail php artisan key:generate
```

## 7. php artisan migrate

```bash
./vendor/bin/sail php artisan migrate
```

## 8. php artisan db:seed

```bash
./vendor/bin/sail php artisan db:seed
```

## 9. localhostにアクセス

```bash
http://localhost/admin

ID: admin
PW: password
```


# エラー対処法

### Error response from daemon: Ports are not available: exposing port TCP 0.0.0.0:80 -> 0.0.0.0:0: listen tcp 0.0.0.0:80: bind: address already in use

80番ポートが既に使用済みという意味のエラーです。

.envファイルに下記の値を設定してください。

```bash
APP_PORT={任意の数字}

例)
APP_PORT=8087
```

その後、再度 `./vendor/bin/sail up -d`を行い、`http://localhost:8087/admin`に遷移してください。
