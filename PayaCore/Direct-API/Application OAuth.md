# Application OAuth

## POST post_tokens

Create Access Token

### Resource URL

https://api-cert.sagepayments.com/oauth/v1/tokens

### Request Body

```JSON
{
    "grant_type": "",
    "client_id": "",
    "identity": ""
}
```

### Response

| Name       | Type   | Description                                                                                                    |
|------------|--------|----------------------------------------------------------------------------------------------------------------|
| grant_type | string | The method used to authorize the request for an access token. For Application API, please use 'user_identity'. |
| client_id  | string | The client ID                                                                                                  |
| identity   | string | The Sage provided Contractor ID for your office. For Application API testing, use '407416' as Contractor ID.   |
