<!-- # tutor_desktop


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
    "data": {},
    "message": "Mensaje de error o comentario del requerimiento",
    "success": true // estado del requerimiento
}
```

## [Login](#login)

Nombre: login 

_POST /api/login_ 

_URL_ http://127.0.0.1:8000/api/login

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

_POST /api/login_ 

_URL_ http://127.0.0.1:8000/api/logout


_response_

```json
{
  "message": "Successfully logged out",
  "success": true
}
```


## [Register](#register)

Nombre: register 

_POST /api/login_ 

_URL_ http://127.0.0.1:8000/api/client/register

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

_POST /api/login_ 

_URL_ http://127.0.0.1:8000/api/recover_password_send

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
