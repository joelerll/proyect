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
-   [x] Register // ENVIAR MAIL DE CONFIMACION CUENTA
-   [ ] verified mail

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

_Client post crear usuario_

-   [x] Attach areas interes usuario | POST Client - attach interests /api/interest/client
-   [x] Obtener area de interes general
-   [x] Update interest

_Client profile_

-   [ ] Mis certificaciones
-   [0] Editar cuenta
-   [0] Obtener cuenta
-   [0] Editar perfil
-   [0] Obtener perfil
-   [ ] Historial de pagos
-   [ ] Metodos de pagos

_Client cursos_

-   [x] realizar pregunta
-   [x] ver pregutas de un curso con sus respuestas
-   [x] crear una respuesta
-   [ ] Progreso de curso
-   [x] calificar curso | POST Course - score /api/score/course/42
-   [0] ver calificacion curso
-   [x] ver cantidad cursos por categoria

_Client carrito_

-   [ ] anadir curso al carrito
-   [ ] eliminar cursos del carrito
-   [ ] Pagar lo del carrito
-   [ ] Facturacion
-   [ ] ver items del carrito

_Client Dashbard_

-   [ ] Verificar correo y volver a enviar correo de verificacion
-   [ ] Ver clases que estoy cursando
-   [ ] cursos de cliente dependiendo de las categorias que escogio y si estan en oferta
-   [x] mis areas de interes (areas de interes por usuario)
-   [ ] recomendados para ti
-   [ ] destacados comuni

_client image1_

-   [ ] api carritos con discount
-   [ ] discount api time
-   [ ] cursos recomendados api (precio, estrellas, reviws cantidad, alumnos, timepo total curso, image, tutor)

_client image2_

-   [ ] api pagar
-   [ ] crear metodo de pago

_client image 4_

-   [ ] facturacion api, Numero de orden, Direccion, Fecha,

_Curso_

-   [0] api tags curso (100% online, pago unico)
-   [0] Ver info de un curso
-   [0] Ver contenido de un curso
-   [0] Ver preguntas y respuestas de un curso

### Issues

-   [0] reordenar controller y apis
-   [ ] Sigue devolviendo la pagina 404 en la api
-   [ ] Try catch correo ya existente
-   [ ] Mejorar mensajes de error y mensajes de validaciones
-   [ ] Mask credit cart number y 3 digitos credit card
-   [ ] Reportar que todas las rutas esten protegidas
-   [ ] Puedo calificar un curso varias veces
