# App de Seguimiento de Gastos

![Money Cat](https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExdjA5bDF3b2RuMGoxZmNvdXY3N2RyY3Q2NW93OXkyZzVuaHBzYWhvNiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/XQKBuQmfjt1xm/giphy.gif)

Esta es una aplicación que permite a cada usuario registrado llevar un registro de sus gastos personales.

## Tecnologias 
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)

 La aplicación utiliza tres tablas en su base de datos:

1. **Tabla de Gastos**:
   - Campos: id, id_usuario, id_categoría, monto, descripción, fecha, nombre_categoria.
   - Claves primarias: id.
   - Esta tabla almacena los gastos individuales de los usuarios, incluyendo información sobre la categoría a la que pertenece cada gasto.

2. **Tabla de Usuarios**:
   - Campos: id, nombre, contraseña (almacenada de forma encriptada).
   - Claves primarias: id.
   - En esta tabla se registran los usuarios de la aplicación, junto con su información personal y contraseñas encriptadas.

3. **Tabla de Categorías**:
   - Campos: id_categoria, nombre_categoria.
   - Claves primarias: id_categoria.
   - Los usuarios pueden agregar categorías personalizadas para clasificar sus gastos.

Todas las claves primarias de las tablas se generan de forma incremental.

## Cuentas de Usuario de Prueba

Puedes probar la aplicación utilizando las siguientes cuentas de usuario pre-cargadas:

- Usuario: Franco
  - Contraseña: 1234

- Usuario: Yamile
  - Contraseña: 1234

- Usuario: Facundo
  - Contraseña: 1234

## Nuestro Equipo

| ![Image Fran](https://github.com/fyunes.png) Fran | ![Image Facu](https://github.com/FigueroaF.png) Facu | ![Image Yami](https://github.com/yamimensur.png) Yami |
| --- | --- | --- |


-------------------------------------------
# Expense Tracking App

![Money Cat](https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExdjA5bDF3b2RuMGoxZmNvdXY3N2RyY3Q2NW93OXkyZzVuaHBzYWhvNiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/XQKBuQmfjt1xm/giphy.gif)

This is an application that allows each registered user to keep track of their personal expenses.

## Technologies
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)

The application uses three tables in its database:

1. **Expense Table**:
   - Fields: id, user_id, category_id, amount, description, date, category_name.
   - Primary Key: id.
   - This table stores individual expenses of users, including information about the category to which each expense belongs.

2. **User Table**:
   - Fields: id, name, password (stored in an encrypted form).
   - Primary Key: id.
   - This table records the application's users, along with their personal information and encrypted passwords.

3. **Category Table**:
   - Fields: category_id, category_name.
   - Primary Key: category_id.
   - Users can add custom categories to classify their expenses.

All primary keys in the tables are generated incrementally.

## Test User Accounts

You can try the application using the following pre-loaded user accounts:

- User: Franco
  - Password: 1234

- User: Yamile
  - Password: 1234

- User: Facundo
  - Password: 1234

## Our Team

| ![Image Fran](https://github.com/fyunes.png) Fran | ![Image Facu](https://github.com/FigueroaF.png) Facu | ![Image Yami](https://github.com/yamimensur.png) Yami |
| --- | --- | --- |
