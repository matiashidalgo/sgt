INSTALACION
====

Cargar DB.

Ejecutar:
```bash
git clone git@github.com:yiisoft/yii.git yii
cd yii
composer install / composer2 install
cd ..
mkdir assets
mkdir protected/runtime
```

Copiar y editar:
```
cp protected\config\main.sample.php protected\config\main.php
cp protected\config\console.sample.php protected\config\console.php
```
Cargar datos de conexion DB