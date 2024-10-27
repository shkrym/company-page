# このリポジトリの操作方法

## スタート

### NPMパッケージのインストール

```bash
npm install
```

### Xdebug用のlaunch.jsonの作成

.vscode/launch.jsonを作成し、下記を追記

```text
{
    // IntelliSense を使用して利用可能な属性を学べます。
    // 既存の属性の説明をホバーして表示します。
    // 詳細情報は次を確認してください: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "hostname": "0.0.0.0",
            "pathMappings": {
                "/var/www/html/wp-content/themes/skeleton": "${workspaceFolder}/themes/skeleton"
            }
        }
    ]
}
```

### wp-envの起動

```bash
npx wp-env start
```

### wp-envコンテナのハッシュを確認

```bash
docker ps
```

IMAGEまたはNAMEより、コンテナのハッシュを確認

ex) 2557bc53c0ad3ced64fa6c322610963b-wordpress

※「2557bc53c0ad3ced64fa6c322610963b」がハッシュ

### docker-compose.ymlの編集

phpmyadmin:PMA_HOSTのハッシュ部分を変更する。

```text
phpmyadmin:
    environment:
        PMA_HOST: fa6adc7c2a6ecebdf747e6ade270e3f7-mysql-1
```

networks:wpnetwork:nameのハッシュ部分を変更する。

```text
networks:
    wpnetwork:
        external: true
        name: fa6adc7c2a6ecebdf747e6ade270e3f7_default
```

### wp-envを再起動

```bash
npm run stop
npm run start
```