# yii2-translation-manager
CRUD for storage and editing of translations in a database. Works with a common Yii2 solution (yii\i18n\DbMessageSource)

add coposer.json

`"wokster/yii2-translation-manager": "v1.1@dev"`

add to modules in config

```php
'translate-manager' => [
            'class' => 'wokster\translationmanager\TranslationManager',
            'languages' => ['en','ru','fr'],
        ],```

config i18n like:

```php
        'i18n' => [
            'translations' => [
                'yii*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@vendor/yiisoft/yii2/messages',
                    'sourceLanguage' => 'en'
                ],
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'forceTranslation'=>true,
                    //'enableCaching' => false,
                    //'cachingDuration' => 3600,
                ]
            ],
        ],
```

run common yii2 migration

```php
yii migrate --migrationPath=@yii/i18n/migrations/
```
