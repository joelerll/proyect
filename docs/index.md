# Tutor - Desktop

### [Dashboard (tutor) - Desktop](https://app.zeplin.io/project/5c90088bea57b005455bd5ee/screen/5ca9504bed21e79faa2ae88f)

<!-- notificaciones??? -->

1.  [Estadisticas cursos tutor](#estadisticas-cursos-tutor)
2. [Cursos de un tutor](#cursos-de-un-tutor)
3. [Gananacias de este mes y totales de un curso](#gananacias-de-este-mes-y-totales-de-un-curso)
4. [Estudiantes totales y nuevos curso](#estudiantes-totales-y-nuevos-curso)
5. [Preguntas por curso](#preguntas-por-curso)


# Usuario – Desktop

### [Registro (Paso 1)](https://app.zeplin.io/project/5c90088bea57b005455bd5ee/screen/5ca7a967ae84d19c13dd7188)

1. [Registro](#register)

### [Elgir intereses (Paso 2)](https://app.zeplin.io/project/5c90088bea57b005455bd5ee/dashboard)

1. [Obtener intereses](#obtener-intereses)

2. [Anadir intereses a cliente](#anadir-intereses-a-cliente)

### [Iniciar Sesión](https://app.zeplin.io/project/5c90088bea57b005455bd5ee/screen/5c95453248d5c424cc1b04f3)

1. [Login](#login)

### [Olvidaste contraseña](https://app.zeplin.io/project/5c90088bea57b005455bd5ee/screen/5cab34dafdfc71a25a4df980)

1. [Recover send mail](#recover-send-mail)


### [Olvidaste contraseña 2](https://app.zeplin.io/project/5c90088bea57b005455bd5ee/screen/5cabb58bb962339fc22fb8bf)

1. [Recover password](#recover-password)



<!-- 

### Cómo usar Comuni.png
[create an anchor](#login)


### Cómo usar Comuni (mobile).

## Dashboard (tutor) - Desktop.png
 -->

# Api


## Formato

_response_

```json
{
    "data": {}, // array o objecto
    "message": "Mensaje de error o comentario del requerimiento",
    "success": true // estado del requerimiento
}
```

## [Login](#login)

Nombre: login 

> POST /api/login

_request_

```json
{
	"email": "marc34@example.com",
	"password": "123456"
}
```

_response_

```json
{
  "data": {
      "access_token": "",
      "token_type": "bearer",
      "expires_in": 3600
  },
  "success": true
}
```

## [Logout](#logout)

Nombre: logout 

> POST /api/logout

_response_

```json
{
  "message": "Successfully logged out",
  "success": true
}
```


## [Register](#register)

Nombre: register 

> POST /client/register

_request_

```json
{
	"email": "cupuyaa@clickmail.info",
	"password": "12dsds",
	"names": "joel",
	"surnames": "joel"
}
```

_response_

```json
{
  "success": true,
  "data": {
      "email": "cupuyaa@clickmail.info",
      "names": "joel",
      "user_type_id": 1,
      "surnames": "joel",
      "updated_at": "2019-06-07 00:26:46",
      "created_at": "2019-06-07 00:26:46",
      "id": 61
  }
}
```

## [Recover send mail](#recover-send-mail)

Nombre: recover send mail 

> POST /api/recover_password_send

_request_

```json
{
	"email": "jesus63@example.com"
}
```

_response_

```json
{
  "message": "Great! Successfully send in your mail",
  "success": true
}
```


## [Recover password](#recover-password)

Nombre: recover password

> POST /api/recover_password

_request_

```json
{
	"token": "TTK77RQpra",
	"password": "12dsdss"
}
```

_response_

```json
{
  "message": "Password was successfully updated",
  "success": true
}
```

## [Obtener intereses](#obtener-intereses)


Nombre: Interest - get all

> GET /api/interest

_response_

```json
{
  "success": true,
  "data": [
    {
        "id": 1,
        "name": "Respostería",
        "created_at": "2019-05-26 23:54:46",
        "updated_at": "2019-05-26 23:54:46"
    },
    {
        "id": 2,
        "name": "Arte",
        "created_at": "2019-05-26 23:54:46",
        "updated_at": "2019-05-26 23:54:46"
    },
    {
        "id": 3,
        "name": "Nutrición",
        "created_at": "2019-05-26 23:54:46",
        "updated_at": "2019-05-26 23:54:46"
    },
    {
        "id": 4,
        "name": "Estética",
        "created_at": "2019-05-26 23:54:46",
        "updated_at": "2019-05-26 23:54:46"
    },
    {
        "id": 5,
        "name": "Fitness",
        "created_at": "2019-05-26 23:54:46",
        "updated_at": "2019-05-26 23:54:46"
    },
    {
        "id": 6,
        "name": "Costura",
        "created_at": "2019-05-26 23:54:47",
        "updated_at": "2019-05-26 23:54:47"
    }
  ]
}
```

## [Anadir intereses a cliente](#anadir-intereses-a-cliente)

Nombre: Client - attach interests

> POST /api/interest/client

_request_

```json
{
	"interests": [5,6, 1,2]
}
```

_response_

```json
{
  "message": "Añadidos Exitosamente",
  "success": true
}
```

## [Estadisticas cursos tutor](#estadisticas-cursos-tutor)

Nombre: Tutor - dashborad - stadistics

> GET /api/tutor/courses/statistics

_response_

```json
{
  "success": true,
  "data": {
    "total_students": 6,
    "total_revenue": 177.67000000000002,
    "average_score": "2.8750",
    "courses_available": 4,
    "unanswered_questions": 10
  }
}
```


## [Cursos de un tutor](#cursos-de-un-tutor)

Nombre: Tutor - dashborad - courses

> GET /api/tutor/courses

_response_

```json
{
  "success": true,
  "data": [
    {
      "id": 16,
      "name": "Gálvez-Robles SA",
      "about": "Ipsam excepturi est est. Ab eaque sint id fugit inventore repellat. Sint totam eveniet ab suscipit omnis cum. Magni et repellendus iusto sapiente.",
      "learn": "Ut in sed quo iure. Sed voluptas voluptas officiis velit. Voluptas harum rerum quibusdam quia.",
      "image": "https:\/\/lorempixel.com\/640\/480\/?42341",
      "available": 1,
      "price": "30.80",
      "created_at": "2019-05-26 23:53:16",
      "updated_at": "2019-05-26 23:53:16",
      "average_score": "2.4444"
    }
  ]
}
```


## [Gananacias de este mes y totales de un curso](#gananacias-de-este-mes-y-totales-de-un-curso)

Nombre: Tutor - dashborad - courses

> GET /api/tutor/courses/revenue/{course-id}

_response_

```json
{
  "data": [
    {
      "month_revenue": 0,
      "total_revenue": 30.8
    }
  ],
  "success": false
}
```


## [Estudiantes totales y nuevos curso](#estudiantes-totales-y-nuevos-curso)

Nombre: Tutor - dashborad - students

> GET /api/tutor/courses/students/{course-id}

_response_

```json
{
  "data": {
    "total_students": 1,
    "total_student_month": 0
  },
  "success": true
}
```


## [Preguntas por curso](#preguntas-por-curso)

Nombre: Tutor - dashborad - questions

> GET /api/tutor/courses/questions/{course-id}

_response_

```json
{
  "data": {
    "questions_without_answer": 4,
    "questions": [
      {
        "id": 142,
        "course_id": 16,
        "user_id": 30,
        "text": "Ut in cupiditate delectus modi. Consequatur sed et ex reiciendis fuga odit.",
        "title": "Beatae asperiores laudantium harum illo qui dignissimos quia.",
        "created_at": "2019-05-26 23:53:40",
        "updated_at": "2019-05-26 23:53:40",
        "answers": []
      },
      {
        "id": 257,
        "course_id": 16,
        "user_id": 31,
        "text": "Nemo culpa qui quo illo neque qui. Quis numquam dignissimos sit veritatis dolorum dolorem labore.",
        "title": "Necessitatibus sit quisquam et rem.",
        "created_at": "2019-05-26 23:53:44",
        "updated_at": "2019-05-26 23:53:44",
        "answers": [
          {
            "id": 74,
            "user_id": 29,
            "question_id": 257,
            "text": "Tenetur eius quae illo error laboriosam. Iste fugit nulla molestiae.",
            "created_at": "2019-05-26 23:54:00",
            "updated_at": "2019-05-26 23:54:00"
          }
        ]
      }
    ]
  },
  "success": true
}
```

