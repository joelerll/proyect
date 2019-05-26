# Comuni Proyect

# First Time

```sh
create database comuni;
```

```sh
php artisan migrate
```

```sh
 php artisan db:seed
```

# API

_Login Api_

-   [x] Login
-   [x] Logout
-   [x] Send email recover password
-   [x] Recover Password
    -   [ ] Issue: validar la fecha limite de token valido
-   [x] Register

_Tutor Dashboard_

-   [x] Statistics
-   [x] Get all courses by tutor
-   [x] Obtener las ganancias de por curso
-   [x] Obtener los estudiantes por curso
-   [x] Obtener las preguntas por curso

_Tutor Profile_

-   [x] Obtener perfil
-   [x] Editar perfil
-   [x] Obtener informacion bancaria
-   [x] Editar informacion bancaria
-   [ ] Obtener payments con informacion de factura


_Client profile_

- [ ] Mis certificaciones
- [ ] Editar cuenta
- [ ] Obtener cuenta
- [ ] Editar perfil
- [ ] Obtener perfil
- [ ] Historial de pagos
- [ ] Metodos de pagos

_Client cursos_
-   [ ] Progreso de curso
-   [ ] Escojer areas de interes
-   [ ] calificar curso
-   [ ] realizar pregunta

_Client carrito_

-   [ ] anadir curso al carrito
-   [ ] eliminar cursos del carrito
-   [ ] Pagar lo del carrito
-   [ ] Facturacion

_Client Dashbard_

-   [ ] Verificar correo y volver a enviar correo de verificacion 
-   [ ] Ver clases que estoy cursando
-   [ ] cursos de cliente dependiendo de las categorias que escogio y si estan en oferta
-   [ ] Cursos api por categorias
-   [ ] Categorias api
-   [ ] mis areas de interes
-   [ ] recomendados para ti
-   [ ] destacados comuni

_Curso_

- [ ] api tags curso (100% online, pago unico)
- [ ] Ver info de un curso
- [ ] Ver contenido de un curso
- [ ] Ver preguntas y respuestas de un curso

### Issues

- [ ] Sigue devolviendo la pagina 404 en la api
- [ ] Mejorar mensajes de error y mensajes de validaciones
- [ ] Mask credit cart number y 3 digitos credit card  
