<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://web.mejoraysoluciones.com/wp-content/uploads/2021/05/cropped-logo_blackmejoras-352x101.png" width="400"></a></p>


## Test Mejora & Soluciones 

### Prerrequisitos

- Instalar PHP y MYSQL, para facilitar el proceso podemos instalar [XAMPP](https://www.apachefriends.org/es/index.html)
- Instalar [Composer](https://getcomposer.org/download/)
- Instalar Laravel ```composer global require laravel/installer```

### Proceso de instalación y configuración

#### 1 - Dependencias de Composer

```composer install```

#### 2 - Crear archivo .env

Este archivo contiene todas las variables de entorno del sistema y debe estar creado en la raíz del proyecto basado en el archivo de ejemplo **.env.example**

#### 3 - Crear base de datos

En Phpmyadmin creamos una base de datos llamada **soluciones**

#### 4 - Ejecutar migraciones

Las migraciones son básicamente la estructura de la base de datos que ya esta construida en el código para pasarla a MYSQL, esto lo podemos hacer con el siguiente comando.

Como las tablas tienen relaciones debemos ejecutar las migraciones individualmente en el siguiente orden 

```
php artisan migrate --path=/database/migrations/2022_08_31_224115_create_products_table.php 
php artisan migrate --path=/database/migrations/2022_08_31_223957_create_invoices_table.php 
php artisan migrate --path=/database/migrations/2022_09_01_143812_create_invoice_as_products_table.php 
```

#### 5 - Subir datos de prueba 

En este caso solo subiremos unos productos de ejemplo

```
php artisan db:seed
```

#### 6 - Generar llave secreta 

```
php artisan jwt:secret
```

#### 7 - Ejecutar proyecto

```
php artisan serve
```

#### Pruebas 

Si queremos descargar y importar los servicios en Postman, lo podemos hacer en el siguiente [link](https://www.getpostman.com/collections/ead4b65cd396ab149389)  


