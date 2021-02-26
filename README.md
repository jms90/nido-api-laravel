
# Indice

1. [Descripción del proyecto](#descripcion-del-proyecto)
2. [Base de datos](#base-de-datos)
3. [Lista de rutas](#lista-de-rutas)

## Descripción del proyecto 

El proyecto será una API en laravel y el consumo de esta con React.

La aplicación consistirá en que un usuario registrado podrá registrar una caja-nido indicando su código, longitud y latitud.

Cada caja podrá tener un seguimiento en el cual se registrará un estado (si está ocupada o no) y una descripción si el usuario lo cree necesario.

## Base de datos

User serán los usuarios que estarán registrados en la base de datos, los datos que tendrá esta tabla serán:

- ID
- Name
- Email
- Password

Caja serás las cajas que se registran en la base de datos de la API, los datos que tendrá serán:

- ID
- Cod_caja
- Longitud
- Latitud

Seguimiento será una tabla relacionada con caja dónde se irán registrando los datos de cada una, los datos que tendrá serán:

- ID
- Estado
- Descripción

Queda pendiente evaluar si agregar a la base de datos una tabla llamada Ave dónde almacenaremos los datos de éstas u obtendremos los datos desde una API externa.

## Lista de rutas

- User:

    Para el registro tendremos la siguiente ruta, en el body de la petición deberemos incluir el name, email, password y password_confirm, está petición si es exitosa nos devolverá un objeto User y un access_token

    - api/register

    Para la ruta de login deberemos incluir en el body el email y el password, está petición si es exitosa nos devolverá un objeto User y un access_token

    - api/login
 
