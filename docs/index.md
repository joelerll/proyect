# Api


## [Login](#login)

_POST /api/login_

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
  "access_token": "",
  "token_type": "bearer",
  "expires_in": 3600
}
```

_example_

```sh
curl --request POST \
  --url http://127.0.0.1:8000/api/login \
  --header 'content-type: application/json' \
  --data '{
	"email": "marc34@example.com",
	"password": "123456"
}'
```




# tutor_desktop


## Cómo usar Comuni.png
[create an anchor](#login)
