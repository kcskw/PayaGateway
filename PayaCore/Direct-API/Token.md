# Tokens

## POST post-tokens

Used to store a card and retrieve a vault token. A vault token allows you to process a charge or credit without knowing the card number and expiration date.

### Resource URL
https://api-cert.sagepayments.com/token/v1/tokens

### Request Body

```JSON
{
    "cardData": {
        "number": "",
        "expiration": ""
    }
}
```

### Response

| Name                 | Type   | Description                                                |
|----------------------|--------|------------------------------------------------------------|
| cardData .number     | string | The bank card account number Pattern: ^[\w\-\s\/\+\=]{1,}$ |
| cardData .expiration | string | The bank card expiration date                              |


## PUT post-tokens

Used to update the card data associated with a vault token.

### Resource URL
https://api-cert.sagepayments.com/token/v1/tokens/{reference}

### Request Body

```JSON
{
    "cardData": {
        "number": "",
        "expiration": ""
    }
}
```

### Response

| Name                 | Type   | Description                                                |
|----------------------|--------|------------------------------------------------------------|
| cardData .number     | string | The bank card account number Pattern: ^[\w\-\s\/\+\=]{1,}$ |
| cardData .expiration | string | The bank card expiration date                              |

## DELETE delete-tokens

Used to delete a vault token.

### Resource URL
https://api-cert.sagepayments.com/token/v1/tokens/{reference}

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name    | Type   | Description |
|---------|--------|-------------|
|         |        |         |
