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

## 3. composer install

```bash
composer install
```

## 4. laravel/sail up

```bash
./vendor/bin/sail up -d
```

## 5. php artisan key:generate

```bash
./vendor/bin/sail php artisan key:generate
```

## 6. php artisan migrate

```bash
./vendor/bin/sail php artisan migrate
```

## 7. localhostにアクセス

```bash
http://localhost:8087/admin
```
