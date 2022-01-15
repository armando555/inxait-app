# Inxait-app
## Ip de la máquina donde se desplegó la aplicación http://54.162.120.102/
Esta es mi solución para la prueba de conocimiento
Se necesita instalar previamente php 7.4, Apache, MySQL y Composer para ejecutar los comandos requeridos

Primero se debe clonar este repositorio el cual tiene una aplicación en Laravel de versión 8.12 Y PHP 7.4.

Luego de clonar este repositorio lo que se debe hacer es ejecutar los siguientes comandos:
```
composer install
```
```
composer require maatwebsite/excel
```
luego de haber instalado las librerías tenemos que crear el archivo .env basado en archivo llamado .env-example, del cual tenemos que poner el nombre de la base de datos MYSQL, su host, usuario y contraseña. En mi caso, lo ejecuto local en una máquina Windows 10 con WAMP server por lo cual solo debo poner la base de datos llamada "laravel" y dejar host como localhost, y usuario "inxait" y contraseña en "Root123." y esto es todo.   

para esto ejecutamos el comando en linux
```
mv .env-example .env
```
y modificamos estas variables de entorno con las de nuestra base de datos, en mi caso son estas (.env file)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=inxait
DB_PASSWORD=Root123.
```
luego de realizar composer install, se ejecuta el comando
```
php artisan key:generate
```
posteriormente, se ejecuta el comando

```
php artisan migrate:refresh
```

finalmente, para el llenado de base de datos se ejecuta el comando 


```
php artisan db:seed
```
## Esquema de base de datos

![alt text](https://github.com/armando555/inxait-app/blob/develop/database.png)

## video de prueba 
https://drive.google.com/file/d/19fqsZ2Q_o6n_kVfzvuuo99fgdZ_Ye_c9/view?usp=sharing
