# yii2-translation-manager
CRUD for storage and editing of translations in a database. Works with a common Yii2 solution (yii\i18n\DbMessageSource)

not ready yet
soon

create tables in db
run common yii2 migration:
`yii migrate --migrationPath=@yii/i18n/migrations/`

add module in config
`
'modules' => [
'translate-manager' => [
'class' => 'wokster\translationmanager\TranslationManager',
],
]
`
