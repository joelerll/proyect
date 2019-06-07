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

> POST /api/interest

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

### [Añadir intereses a cliente](#anadir-intereses-a-cliente)

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

