# ACH

## API Health

### GET get_ping

Used to retrieve basic server/environment information about the front-end API.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/ping

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name        | Type   | Description                                            |
|-------------|--------|--------------------------------------------------------|
| environment | string |                                                        |
| apiproxy    | string | The name of the API Proxy                              |
| client      | string | The IP address of the client calling the API           |
| time        | string | The time when the request was processed                |
| latency     | string | The total response time to process the API request     |
| message     | string | Message from the endpoint, gaurenteed to be "PONG"     |
| merchantId  | string | The Merchant Identifier provided in the request header |


### GET get_status

Used to retrieve basic server/environment information about the front-end API.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name           | Type   | Description                                                                                     |
|----------------|--------|-------------------------------------------------------------------------------------------------|
| environment    | string |                                                                                                 |
| apiproxy       | string | The name of the API Proxy                                                                       |
| client         | string | The IP address of the client calling the API                                                    |
| time           | string | The time when the request was processed                                                         |
| proxyLatency   | string | The time in milli-seconds for the front end to process the API request                          |
| targetLatency  | string | The time in milli-seconds for the back end to process the API request                           |
| latency        | string | The total response time to process the API request                                              |
| message        | string | Message from the endpoint, gaurenteed to be "STATUS"                                            |
| backendMessage | string | Message recieved from the back end typically including an non-descript tag and date information |
| merchantId     | string | The Merchant Identifier provided in the request header                                          |

## Charges

### GET get_charges
Used to query charges by various criteria including amount, date, order number, type, etc. Results include both summarized information and itemized detail.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/charges

### Query Parameters

| Name           | Values | Description                                                                                                                                                 |
|----------------|--------|-------------------------------------------------------------------------------------------------------------------------------------------------------------|
| startDate      |        | Returns records on or after this date                                                                                                                       |
| endDate        |        | Returns records on or before this date                                                                                                                      |
| pageSize       |        | The number of items to be included in each page of the result set                                                                                           |
| pageNumber     |        | The page number of the result set to return                                                                                                                 |
| sortDirection  |        | The direction in which results should be sorted                                                                                                             |
| sortField      |        | The field on which results should be sorted. This can be any field in the response object.                                                                  |
| name           |        | Used to query charges by various criteria including amount, date, order number, type, etc. Results include both summarized information and itemized detail. |
| accountNumber  |        | The last 4 digits of the customer's credit card number                                                                                                      |
| source         |        | The type of application from which the transaction originated                                                                                               |
| orderNumber    |        | The transaction's order number                                                                                                                              |
| reference      |        | The transaction's unique reference number                                                                                                                   |
| batchReference |        | The batch's unique reference number                                                                                                                         |
| totalAmount    |        | The total amount of the transaction                                                                                                                         |                                                                                                      |

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name           | Type    | Description                                                                                                    |
|----------------|---------|----------------------------------------------------------------------------------------------------------------|
| startDate      | string  |                                                                                                                |
| endDate        | string  |                                                                                                                |
| totalItemCount | integer | The total number of items in the result set                                                                    |
| pageSize       | integer | The number of items on each page of results                                                                    |
| pageNumber     | integer | The current page of results being returned                                                                     |
| href           | string  | The URL used to get this page of data                                                                          |
| next           | string  | The URL used to get the next page of data. If null, the current page is the last page in the result set.       |
| previous       | string  | The URL used to get the previous page of data. If null, the currrent page is the first page in the result set. |
| summary        | array   | A summary of sales, authorizations, and credits in the result set                                              |
| items          | array   |                                                                                                                |



### POST post_charges
Used to process a charge. Charges are 'Sale', 'Auth', or 'Force' transactions. Sale transactions include the authorization and capture steps in a single request, while Auth transactions must be manually captured in a subsequent request. Force transactions are used in rare situations where the authorization code is being explicitly set.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/charges

### Query Parameters

| Name            | Values                   | Description                         |
|-----------------|--------------------------|-------------------------------------|
| type (required) | Sale/Authorization/Force | The type of transaction to be used. |

#### Request Body


```JSON
{
    "transactionId": "",
    "retail": {
        "amounts": {
            "tip": 0,
            "total": 0,
            "tax": 0,
            "shipping": 0
        },
        "authorizationCode": "",
        "trackData": {
            "value": "",
            "format": "",
            "isContactless": false
        },
        "deviceId": "",
        "cardPresent": false,
        "allowPartialAuthorization": false,
        "debit": {
            "cashback": 0,
            "pin": ""
        },
        "orderNumber": "",
        "cardData": {
            "number": "",
            "expiration": "",
            "cvv": ""
        },
        "customer": {
            "email": "",
            "telephone": "",
            "fax": ""
        },
        "billing": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "shipping": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "isRecurring": false,
        "recurringSchedule": {
            "amount": 0,
            "frequency": "",
            "interval": 0,
            "nonBusinessDaysHandling": "",
            "startDate": "",
            "totalCount": 0,
            "groupId": ""
        }
    },
    "eCommerce": {
        "authorizationCode": "",
        "amounts": {
            "total": 0,
            "tax": 0,
            "shipping": 0
        },
        "orderNumber": "",
        "cardData": {
            "number": "",
            "expiration": "",
            "cvv": ""
        },
        "customer": {
            "email": "",
            "telephone": "",
            "fax": ""
        },
        "billing": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "shipping": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "level2": {
            "customerNumber": ""
        },
        "level3": {
            "destinationCountryCode": "",
            "amounts": {
                "discount": 0,
                "duty": 0,
                "nationalTax": 0
            },
            "vat": {
                "idNumber": "",
                "invoiceNumber": "",
                "amount": 0,
                "rate": 0
            },
            "customerNumber": ""
        },
        "isRecurring": false,
        "recurringSchedule": {
            "amount": 0,
            "frequency": "",
            "interval": 0,
            "nonBusinessDaysHandling": "",
            "startDate": "",
            "totalCount": 0,
            "groupId": ""
        }
    },
    "healthCare": {
        "amounts": {
            "healthCare": 0,
            "prescription": 0,
            "clinic": 0,
            "dental": 0,
            "vision": 0,
            "total": 0,
            "tax": 0,
            "shipping": 0
        },
        "iiasVerification": "",
        "debit": {
            "cashback": 0,
            "pin": ""
        },
        "authorizationCode": "",
        "trackData": {
            "value": "",
            "format": "",
            "isContactless": false
        },
        "deviceId": "",
        "cardPresent": false,
        "allowPartialAuthorization": false,
        "orderNumber": "",
        "cardData": {
            "number": "",
            "expiration": "",
            "cvv": ""
        },
        "customer": {
            "email": "",
            "telephone": "",
            "fax": ""
        },
        "billing": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "shipping": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "isRecurring": false,
        "recurringSchedule": {
            "amount": 0,
            "frequency": "",
            "interval": 0,
            "nonBusinessDaysHandling": "",
            "startDate": "",
            "totalCount": 0,
            "groupId": ""
        }
    },
    "vault": {
        "token": "",
        "operation": ""
    },
    "terminalNumber": ""
}
```

#### Request

| Name                                                   | Type    | Description                                                                                                                                                                                                      |
|--------------------------------------------------------|---------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| transactionId                                          | string  | A unique transaction identifier, this field is used for communication protocol purposes. The value provided is echoed in the response. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                            |
| retail .amounts .tip                                   | number  | The amount specified for the tip                                                                                                                                                                                 |
| retail .amounts .total                                 | number  | The total amount of the transaction                                                                                                                                                                              |
| retail .amounts .tax                                   | number  | The amount coming from tax                                                                                                                                                                                       |
| retail .amounts .shipping                              | number  | The amount coming from shipping charges                                                                                                                                                                          |
| retail .authorizationCode                              | string  | The 6 character authorization code for use with Force transaction code.                                                                                                                                          |
| retail .trackData .value                               | string  | The value obtained from the swipe                                                                                                                                                                                |
| retail .trackData .format                              | string  | The data format                                                                                                                                                                                                  |
| retail .trackData .isContactless                       | boolean |                                                                                                                                                                                                                  |
| retail .deviceId                                       | string  | A unique ID defined by the client to identify a particular device, terminal, or user of the client software. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                      |
| retail .cardPresent                                    | boolean | Used with manually keyed transactions to indicate whether the card was present but not swiped                                                                                                                    |
| retail .allowPartialAuthorization                      | boolean | Used to indicate whether the POS supports Partial Authorization                                                                                                                                                  |
| retail .debit .cashback                                | number  |                                                                                                                                                                                                                  |
| retail .debit .pin                                     | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .orderNumber                                    | string  | The merchant-defined order number. Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                 |
| retail .cardData .number                               | string  | The bankcard account number Pattern: ^[\w\-\s\/\+\=]{1,}$                                                                                                                                                        |
| retail .cardData .expiration                           | string  | The card's expiration date                                                                                                                                                                                       |
| retail .cardData .cvv                                  | string  | The card's CVV code                                                                                                                                                                                              |
| retail .customer .email                                | string  | The customer's email address                                                                                                                                                                                     |
| retail .customer .telephone                            | string  | The customer's telephone number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                   |
| retail .customer .fax                                  | string  | The customer's fax number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                         |
| retail .billing .name                                  | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .address                               | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .city                                  | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .state                                 | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .postalCode                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .country                               | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .name                                 | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .address                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .city                                 | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .state                                | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .postalCode                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .country                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .isRecurring                                    | boolean | Indicates this transaction is part of a recurring series. NOTE: This does not create nor update a recurring billing entry                                                                                        |
| retail .recurringSchedule .amount                      | number  | Recurring amount                                                                                                                                                                                                 |
| retail .recurringSchedule .frequency                   | string  | The frequency at which the transaction should be processed                                                                                                                                                       |
| retail .recurringSchedule .interval                    | integer | Recurring interval                                                                                                                                                                                               |
| retail .recurringSchedule .nonBusinessDaysHandling     | string  | Specifies how the transaction should be processed if the processing date occurrs on a weekend or holiday                                                                                                         |
| retail .recurringSchedule .startDate                   | string  | The date the recurring transactions should start                                                                                                                                                                 |
| retail .recurringSchedule .totalCount                  | integer | The total number of times the transaction should take place. If null, it will occur indefinitely                                                                                                                 |
| retail .recurringSchedule .groupId                     | string  | Recurring Group ID under which the recurring transaction will be added Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                            |
| eCommerce .authorizationCode                           | string  | The 6 character authorization code for use with Force transaction code. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                           |
| eCommerce .amounts .total                              | number  | The total amount of the transaction                                                                                                                                                                              |
| eCommerce .amounts .tax                                | number  | The amount coming from tax                                                                                                                                                                                       |
| eCommerce .amounts .shipping                           | number  | The amount coming from shipping charges                                                                                                                                                                          |
| eCommerce .orderNumber                                 | string  | The merchant-defined order number. Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                 |
| eCommerce .cardData .number                            | string  | The bankcard account number Pattern: ^[\w\-\s\/\+\=]{1,}$                                                                                                                                                        |
| eCommerce .cardData .expiration                        | string  | The card's expiration date                                                                                                                                                                                       |
| eCommerce .cardData .cvv                               | string  | The card's CVV code                                                                                                                                                                                              |
| eCommerce .customer .email                             | string  | The customer's email address                                                                                                                                                                                     |
| eCommerce .customer .telephone                         | string  | The customer's telephone number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                   |
| eCommerce .customer .fax                               | string  | The customer's fax number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                         |
| eCommerce .billing .name                               | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .address                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .city                               | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .state                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .postalCode                         | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .country                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .name                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .address                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .city                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .state                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .postalCode                        | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .country                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .level2 .customerNumber                      | string  | Customer Number for Purchase Card Level II Transactions Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                           |
| eCommerce .level3 .destinationCountryCode              | string  | Abbreviation or Numeric code (840 or USA) Country code of the country to where the goods are shipped Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                              |
| eCommerce .level3 .amounts .discount                   | number  | Total amount of discount applied to the line item. The value can also be zero.                                                                                                                                   |
| eCommerce .level3 .amounts .duty                       | number  | Total charges for any import and/or export duties for the order. The value can also be zero                                                                                                                      |
| eCommerce .level3 .amounts .nationalTax                | number  | National tax for the order. The value can also be zero.                                                                                                                                                          |
| eCommerce .level3 .vat .idNumber                       | string  | Customer’s government-assigned VAT identification number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                          |
| eCommerce .level3 .vat .invoiceNumber                  | string  | nvoice number associated with the VAT invoice. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                    |
| eCommerce .level3 .vat .amount                         | number  | Total amount of tax for the item. Note that this is not the per-item tax amount. For example, if the quantity is 4, and the amount of tax per item is $0.25, then set this field to 1.00. The value can be zero. |
| eCommerce .level3 .vat .rate                           | number  | Tax rate applied to the item. Acceptable range is 0.0000 to 0.9999 (0.00% to 99.99%).                                                                                                                            |
| eCommerce .level3 .customerNumber                      | string  | Customer Number for Purchase Card Level II Transactions Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                           |
| eCommerce .isRecurring                                 | boolean | Indicates this transaction is part of a recurring series. NOTE: This does not create nor update a recurring billing entry                                                                                        |
| eCommerce .recurringSchedule .amount                   | number  | Recurring amount                                                                                                                                                                                                 |
| eCommerce .recurringSchedule .frequency                | string  | The frequency at which the transaction should be processed                                                                                                                                                       |
| eCommerce .recurringSchedule .interval                 | integer | Recurring interval                                                                                                                                                                                               |
| eCommerce .recurringSchedule .nonBusinessDaysHandling  | string  | Specifies how the transaction should be processed if the processing date occurrs on a weekend or holiday                                                                                                         |
| eCommerce .recurringSchedule .startDate                | string  | The date the recurring transactions should start                                                                                                                                                                 |
| eCommerce .recurringSchedule .totalCount               | integer | The total number of times the transaction should take place. If null, it will occur indefinitely                                                                                                                 |
| eCommerce .recurringSchedule .groupId                  | string  | Recurring Group ID under which the recurring transaction will be added Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                            |
| healthCare .amounts .healthCare                        | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .prescription                      | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .clinic                            | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .dental                            | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .vision                            | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .total                             | number  | The total amount of the transaction                                                                                                                                                                              |
| healthCare .amounts .tax                               | number  | The amount coming from tax                                                                                                                                                                                       |
| healthCare .amounts .shipping                          | number  | The amount coming from shipping charges                                                                                                                                                                          |
| healthCare .iiasVerification                           | string  | Identifies if the purchase items were verified against an Inventory Information Approval System (IIAS). Values can be 'NotVerified', 'Verified' or 'Exempt'                                                      |
| healthCare .debit .cashback                            | number  |                                                                                                                                                                                                                  |
| healthCare .debit .pin                                 | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .authorizationCode                          | string  | The 6 character authorization code for use with Force transaction code.                                                                                                                                          |
| healthCare .trackData .value                           | string  | The value obtained from the swipe                                                                                                                                                                                |
| healthCare .trackData .format                          | string  | The data format                                                                                                                                                                                                  |
| healthCare .trackData .isContactless                   | boolean |                                                                                                                                                                                                                  |
| healthCare .deviceId                                   | string  | A unique ID defined by the client to identify a particular device, terminal, or user of the client software. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                      |
| healthCare .cardPresent                                | boolean | Used with manually keyed transactions to indicate whether the card was present but not swiped                                                                                                                    |
| healthCare .allowPartialAuthorization                  | boolean | Used to indicate whether the POS supports Partial Authorization                                                                                                                                                  |
| healthCare .orderNumber                                | string  | The merchant-defined order number. Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                 |
| healthCare .cardData .number                           | string  | The bankcard account number Pattern: ^[\w\-\s\/\+\=]{1,}$                                                                                                                                                        |
| healthCare .cardData .expiration                       | string  | The card's expiration date                                                                                                                                                                                       |
| healthCare .cardData .cvv                              | string  | The card's CVV code                                                                                                                                                                                              |
| healthCare .customer .email                            | string  | The customer's email address                                                                                                                                                                                     |
| healthCare .customer .telephone                        | string  | The customer's telephone number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                   |
| healthCare .customer .fax                              | string  | The customer's fax number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                         |
| healthCare .billing .name                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .address                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .city                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .state                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .postalCode                        | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .country                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .name                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .address                          | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .city                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .state                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .postalCode                       | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .country                          | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .isRecurring                                | boolean | Indicates this transaction is part of a recurring series. NOTE: This does not create nor update a recurring billing entry                                                                                        |
| healthCare .recurringSchedule .amount                  | number  | Recurring amount                                                                                                                                                                                                 |
| healthCare .recurringSchedule .frequency               | string  | The frequency at which the transaction should be processed                                                                                                                                                       |
| healthCare .recurringSchedule .interval                | integer | Recurring interval                                                                                                                                                                                               |
| healthCare .recurringSchedule .nonBusinessDaysHandling | string  | Specifies how the transaction should be processed if the processing date occurrs on a weekend or holiday                                                                                                         |
| healthCare .recurringSchedule .startDate               | string  | The date the recurring transactions should start                                                                                                                                                                 |
| healthCare .recurringSchedule .totalCount              | integer | The total number of times the transaction should take place. If null, it will occur indefinitely                                                                                                                 |
| healthCare .recurringSchedule .groupId                 | string  | Recurring Group ID under which the recurring transaction will be added Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                            |
| vault .token                                           | string  | The Vault record token to use during a Read or Update operation Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                   |
| vault .operation                                       | string  | The type of operation being requested. Values can be 'Read', 'Update' or 'Create'                                                                                                                                |
| terminalNumber                                         | string  | The Gateway terminal configuration number. If it is not present, the default Gateway terminal configuration will be used.                                                                                        |

#### Response

| Name                  | Type    | Description                                                                                                                  |
|-----------------------|---------|------------------------------------------------------------------------------------------------------------------------------|
| status                | string  | The status of the transaction                                                                                                |
| reference             | string  | A unique transaction identifier generated by the Gateway                                                                     |
| message               | string  | A textual message that can be displayed on a terminal.                                                                       |
| code                  | string  | The Approval, Error, or Decline code.                                                                                        |
| cvvResult             | string  | A message indicating the status of CVV verification                                                                          |
| avsResult             | string  | A message indicating the status of CVV verification                                                                          |
| riskCode              | string  | A code representing the SPS risk threshold that was triggered                                                                |
| networkId             | string  | The authorization network                                                                                                    |
| isPurchaseCard        | boolean |                                                                                                                              |
| isfsa                 | boolean | Indicates the card was verified to be a FSA card; assumed to be false if not present                                         |
| balance               | number  | The remaining balance on prepaid cards; to be displayed to customer on receipt, web page, POS terminal, etc                  |
| approvedAmount        | number  | The amount partially approved when a cardholder does not have enough balance on the debit, prepaid, or gift card             |
| vaultResponse .status | string  | Indicates whether the requested Vault operation succeeded                                                                    |
| vaultResponse .data   | string  | The data returned from the Vault                                                                                             |
| orderNumber           | string  | The user defined order number provided in the request. If one was not provided, the auto generated order number is returned. |
| transactionId         | string  | The unique transaction identifier supplied by the client in the request                                                      |
| timestamp             | string  |                                                                                                                              |



### GET get_charges_details
Used to retrieve detailed information about a specific charge.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/charges/{reference}

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name                                     | Type    | Description                                                                                                                                                                                                      |
|------------------------------------------|---------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| reference                                | string  | A unique transaction identifier generated by the Gateway                                                                                                                                                         |
| service                                  | string  |                                                                                                                                                                                                                  |
| status                                   | string  | The current status of the transaction                                                                                                                                                                            |
| transactionCode                          | string  | The type of transaction                                                                                                                                                                                          |
| date                                     | string  | The date the transaction was processed                                                                                                                                                                           |
| amounts .total                           | number  | The total amount of the transaction                                                                                                                                                                              |
| amounts .tax                             | number  | The amount coming from tax                                                                                                                                                                                       |
| amounts .shipping                        | number  | The amount coming from shipping charges                                                                                                                                                                          |
| billing .name                            | string  |                                                                                                                                                                                                                  |
| billing .address                         | string  |                                                                                                                                                                                                                  |
| billing .city                            | string  |                                                                                                                                                                                                                  |
| billing .state                           | string  |                                                                                                                                                                                                                  |
| billing .postalCode                      | string  |                                                                                                                                                                                                                  |
| billing .country                         | string  |                                                                                                                                                                                                                  |
| shipping .name                           | string  |                                                                                                                                                                                                                  |
| shipping .address                        | string  |                                                                                                                                                                                                                  |
| shipping .city                           | string  |                                                                                                                                                                                                                  |
| shipping .state                          | string  |                                                                                                                                                                                                                  |
| shipping .postalCode                     | string  |                                                                                                                                                                                                                  |
| shipping .country                        | string  |                                                                                                                                                                                                                  |
| shipping .trackingNumber                 | string  |                                                                                                                                                                                                                  |
| customer .email                          | string  | The customer's email address                                                                                                                                                                                     |
| customer .telephone                      | string  | The customer's telephone number                                                                                                                                                                                  |
| customer .fax                            | string  | The customer's fax number                                                                                                                                                                                        |
| bankcard .cardData .number               | string  | The masked card number                                                                                                                                                                                           |
| bankcard .cardData .expirationDate       | string  | The card expiration date MMYY                                                                                                                                                                                    |
| bankcard .cardData .type                 | string  | The card type identified by the card number                                                                                                                                                                      |
| bankcard .cardData .entryMode            | string  | The mode in which the payment was entered                                                                                                                                                                        |
| bankcard .isPurchaseCard                 | boolean |                                                                                                                                                                                                                  |
| bankcard .avsResult                      | string  |                                                                                                                                                                                                                  |
| bankcard .cvvResult                      | string  |                                                                                                                                                                                                                  |
| bankcard .level2 .customerNumber         | string  | Customer Number for Purchase Card Level II Transactions                                                                                                                                                          |
| bankcard .level3 .destinationCountryCode | string  | Abbreviation or Numeric code (840 or USA) Country code of the country to where the goods are shipped                                                                                                             |
| bankcard .level3 .amounts .discount      | number  | Total amount of discount applied to the line item. The value can also be zero.                                                                                                                                   |
| bankcard .level3 .amounts .duty          | number  | Total charges for any import and/or export duties for the order. The value can also be zero                                                                                                                      |
| bankcard .level3 .amounts .nationalTax   | number  | National tax for the order. The value can also be zero.                                                                                                                                                          |
| bankcard .level3 .vat .idNumber          | string  | Customer’s government-assigned VAT identification number                                                                                                                                                         |
| bankcard .level3 .vat .invoiceNumber     | string  | nvoice number associated with the VAT invoice.                                                                                                                                                                   |
| bankcard .level3 .vat .amount            | number  | Total amount of tax for the item. Note that this is not the per-item tax amount. For example, if the quantity is 4, and the amount of tax per item is $0.25, then set this field to 1.00. The value can be zero. |
| bankcard .level3 .vat .rate              | number  | Tax rate applied to the item. Acceptable range is 0.0000 to 0.9999 (0.00% to 99.99%).                                                                                                                            |
| bankcard .level3 .customerNumber         | string  | Customer Number for Purchase Card Level II Transactions                                                                                                                                                          |
| ach .routingNumber                       | string  |                                                                                                                                                                                                                  |
| ach .accountNumber                       | string  |                                                                                                                                                                                                                  |
| ach .accountType                         | string  |                                                                                                                                                                                                                  |
| ach .originatorType                      | string  |                                                                                                                                                                                                                  |
| ach .originatorId                        | string  |                                                                                                                                                                                                                  |
| ach .addenda                             | string  |                                                                                                                                                                                                                  |
| isApproved                               | boolean | Indicates whether the transaction was approved                                                                                                                                                                   |
| orderNumber                              | string  | The merchant assigned order number for the payment                                                                                                                                                               |
| notes                                    | string  |                                                                                                                                                                                                                  |
| processorResponse .code                  | string  | The approval/decline/error code                                                                                                                                                                                  |
| processorResponse .message               | string  | The textual approval/decline/error message to be displayed on a terminal                                                                                                                                         |
| processorResponse .avsResult             | string  | The AVS result code                                                                                                                                                                                              |
| processorResponse .cvvResult             | string  | The CVV result code                                                                                                                                                                                              |
| processorResponse .networkBatchNumber    | integer | The batch number assigned by the settlement network                                                                                                                                                              |
| signature .image                         | string  |                                                                                                                                                                                                                  |
| signature .type                          | string  |                                                                                                                                                                                                                  |
| terminalNumber                           | string  | The Gateway terminal configuration number.                                                                                                                                                                       |
| deviceId                                 | string  | The identifier of the device using the software application originating the payment.                                                                                                                             |
| settlement .reference                    | string  | A unique transaction identifier generated by the Gateway                                                                                                                                                         |
| settlement .date                         | string  | The date and time the transaction was settled                                                                                                                                                                    |
| uniqueIdentifier                         | string  | The unique reference number supplied by the client application that initiated the transaction                                                                                                                    |
| applicationName                          | string  | The name of the application through which the transaction was processed                                                                                                                                          |
| username                                 | string  | The username of the SPS user who processed the transaction                                                                                                                                                       |
| ipAddress                                | string  | The IP Address from which the transaction originated                                                                                                                                                             |
| href                                     | string  | The URL to the resource containing details for this item                                                                                                                                                         |


### PUT put_charges
Used to "capture" an Auth transaction. This is an opportunity to finalize the payment amount.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/charges/{reference}

#### Request Body

```JSON
{
    "amounts": {
        "tip": 0,
        "total": 0,
        "tax": 0,
        "shipping": 0
    }
}
```

#### Request

| Name              | Type   | Description                             |
|-------------------|--------|-----------------------------------------|
| amounts .tip      | number | The amount specified for the tip        |
| amounts .total    | number | The total amount of the transaction     |
| amounts .tax      | number | The amount coming from tax              |
| amounts .shipping | number | The amount coming from shipping charges |


### DELETE delete_charges
Used to "void", or cancel, a charge. Only unsettled transactions can be voided; settled transactions should be credited instead.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/charges/{reference}

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```


### GET get_charges_lineitems_detail
Used to retrieve any line item detail associated with a transaction.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/charges/{reference}/lineitems

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name                   | Type    | Description |
|------------------------|---------|-------------|
| commodityCode          | string  |             |
| itemDescription        | string  |             |
| productCode            | string  |             |
| quantity               | integer |             |
| unitOfMeasure          | string  |             |
| unitCost               | number  |             |
| taxAmount              | number  |             |
| taxRate                | number  |             |
| discountAmount         | number  |             |
| lineItemTotal          | number  |             |
| alternateTaxIdentifier | string  |             |
| taxTypeApplied         | string  |             |
| discountIndicator      | string  |             |
| netGrossIndicator      | string  |             |
| extendedItemAmount     | number  |             |
| debitCreditIndicator   | string  |             |


### POST post_charge_lineitems
Used to add line item details, such as the specific items that are being purchased, to a transaction. This is rarely used outside of Level III processing.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/charges/{reference}/lineitems

#### Request Body

```JSON
{
    "masterCard": [
        {
            "itemDescription": "",
            "productCode": "",
            "quantity": 0,
            "unitOfMeasure": "",
            "unitCost": 0,
            "taxAmount": 0,
            "taxRate": 0,
            "discountAmount": 0,
            "alternateTaxIdentifier": "",
            "taxTypeApplied": "",
            "discountIndicator": "",
            "netGrossIndicator": "",
            "extendedItemAmount": 0,
            "debitCreditIndicator": ""
        }
    ],
    "visa": [
        {
            "commodityCode": "",
            "itemDescription": "",
            "productCode": "",
            "quantity": 0,
            "unitOfMeasure": "",
            "unitCost": 0,
            "vatTaxAmount": 0,
            "vatTaxRate": 0,
            "discountAmount": 0,
            "lineItemTotal": 0
        }
    ]
}
```

#### Request

| Name       | Type  | Description |
|------------|-------|-------------|
| masterCard | array |             |
| visa       | array |             |


### DELETE delete_charge_lineitems
Used to remove any line item details that have been associated with a transaction.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/charges/{reference}/lineitems

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

## Credits


### GET get_credits

Used to query credits by various criteria including amount, date, order number, type, etc. Results include both summarized information and itemized detail.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/credits

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Query Parameters

| Name           | Values                                                         | Description                                                                                                                                                 |
|----------------|----------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type           | Sale/Authorization/Force/Void/Credit/CreditByReference/Capture | The type of transaction, valid values are "Sale", "Authorization", "Force", "Void", "Credit", "CreditByReference", "Capture"                                |
| startDate      |                                                                | Returns records on or after this date                                                                                                                       |
| endDate        |                                                                | Returns records on or before this date                                                                                                                      |
| pageSize       |                                                                | The number of items to be included in each page of the result set                                                                                           |
| pageNumber     |                                                                | The page number of the result set to return                                                                                                                 |
| sortDirection  | Ascending/Descending                                           | The direction in which results should be sorted                                                                                                             |
| sortField      |                                                                | The field on which results should be sorted. This can be any field in the response object.                                                                  |
| isPurchaseCard |                                                                | Whether the bankcard transaction was a purchase card                                                                                                        |
| name           |                                                                | Used to query credits by various criteria including amount, date, order number, type, etc. Results include both summarized information and itemized detail. |
| accountNumber  |                                                                | The last 4 digits of the customer's credit card number                                                                                                      |
| source         | Mobile/Recurring                                               | The type of application from which the transaction originated                                                                                               |
| orderNumber    |                                                                | The transaction's order number                                                                                                                              |
| reference      |                                                                | The transaction's unique reference number                                                                                                                   |
| batchReference |                                                                | The batch's unique reference number                                                                                                                         |
| totalAmount    |                                                                | The total amount of the transaction                                                                                                                         |
| approvalCode   |                                                                | The six-digit approval code returned by the host                                                                                                            |

#### Response

| Name           | Type    | Description                                                                                                    |
|----------------|---------|----------------------------------------------------------------------------------------------------------------|
| startDate      | string  |                                                                                                                |
| endDate        | string  |                                                                                                                |
| totalItemCount | integer | The total number of items in the result set                                                                    |
| pageSize       | integer | The number of items on each page of results                                                                    |
| pageNumber     | integer | The current page of results being returned                                                                     |
| href           | string  | The URL used to get this page of data                                                                          |
| next           | string  | The URL used to get the next page of data. If null, the current page is the last page in the result set.       |
| previous       | string  | The URL used to get the previous page of data. If null, the currrent page is the first page in the result set. |
| summary        | array   | A summary of sales, authorizations, and credits in the result set                                              |
| items          | array   |                                                                                                                |

### POST post_credits
Used to process a credit. Credit transactions refund an amount to a card.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/credits

#### Request Body

```JSON
{
    "transactionId": "",
    "retail": {
        "amounts": {
            "tip": 0,
            "total": 0,
            "tax": 0,
            "shipping": 0
        },
        "authorizationCode": "",
        "trackData": {
            "value": "",
            "format": "",
            "isContactless": false
        },
        "deviceId": "",
        "cardPresent": false,
        "allowPartialAuthorization": false,
        "debit": {
            "cashback": 0,
            "pin": ""
        },
        "orderNumber": "",
        "cardData": {
            "number": "",
            "expiration": "",
            "cvv": ""
        },
        "customer": {
            "email": "",
            "telephone": "",
            "fax": ""
        },
        "billing": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "shipping": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "isRecurring": false,
        "recurringSchedule": {
            "amount": 0,
            "frequency": "",
            "interval": 0,
            "nonBusinessDaysHandling": "",
            "startDate": "",
            "totalCount": 0,
            "groupId": ""
        }
    },
    "eCommerce": {
        "authorizationCode": "",
        "amounts": {
            "total": 0,
            "tax": 0,
            "shipping": 0
        },
        "orderNumber": "",
        "cardData": {
            "number": "",
            "expiration": "",
            "cvv": ""
        },
        "customer": {
            "email": "",
            "telephone": "",
            "fax": ""
        },
        "billing": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "shipping": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "level2": {
            "customerNumber": ""
        },
        "level3": {
            "destinationCountryCode": "",
            "amounts": {
                "discount": 0,
                "duty": 0,
                "nationalTax": 0
            },
            "vat": {
                "idNumber": "",
                "invoiceNumber": "",
                "amount": 0,
                "rate": 0
            },
            "customerNumber": ""
        },
        "isRecurring": false,
        "recurringSchedule": {
            "amount": 0,
            "frequency": "",
            "interval": 0,
            "nonBusinessDaysHandling": "",
            "startDate": "",
            "totalCount": 0,
            "groupId": ""
        }
    },
    "healthCare": {
        "amounts": {
            "healthCare": 0,
            "prescription": 0,
            "clinic": 0,
            "dental": 0,
            "vision": 0,
            "total": 0,
            "tax": 0,
            "shipping": 0
        },
        "iiasVerification": "",
        "debit": {
            "cashback": 0,
            "pin": ""
        },
        "authorizationCode": "",
        "trackData": {
            "value": "",
            "format": "",
            "isContactless": false
        },
        "deviceId": "",
        "cardPresent": false,
        "allowPartialAuthorization": false,
        "orderNumber": "",
        "cardData": {
            "number": "",
            "expiration": "",
            "cvv": ""
        },
        "customer": {
            "email": "",
            "telephone": "",
            "fax": ""
        },
        "billing": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "shipping": {
            "name": "",
            "address": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "country": ""
        },
        "isRecurring": false,
        "recurringSchedule": {
            "amount": 0,
            "frequency": "",
            "interval": 0,
            "nonBusinessDaysHandling": "",
            "startDate": "",
            "totalCount": 0,
            "groupId": ""
        }
    },
    "vault": {
        "token": "",
        "operation": ""
    },
    "terminalNumber": ""
}
```

#### Request

| Name                                                   | Type    | Description                                                                                                                                                                                                      |
|--------------------------------------------------------|---------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| transactionId                                          | string  | A unique transaction identifier, this field is used for communication protocol purposes. The value provided is echoed in the response. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                            |
| retail .amounts .tip                                   | number  | The amount specified for the tip                                                                                                                                                                                 |
| retail .amounts .total                                 | number  | The total amount of the transaction                                                                                                                                                                              |
| retail .amounts .tax                                   | number  | The amount coming from tax                                                                                                                                                                                       |
| retail .amounts .shipping                              | number  | The amount coming from shipping charges                                                                                                                                                                          |
| retail .authorizationCode                              | string  | The 6 character authorization code for use with Force transaction code.                                                                                                                                          |
| retail .trackData .value                               | string  | The value obtained from the swipe                                                                                                                                                                                |
| retail .trackData .format                              | string  | The data format                                                                                                                                                                                                  |
| retail .trackData .isContactless                       | boolean |                                                                                                                                                                                                                  |
| retail .deviceId                                       | string  | A unique ID defined by the client to identify a particular device, terminal, or user of the client software. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                      |
| retail .cardPresent                                    | boolean | Used with manually keyed transactions to indicate whether the card was present but not swiped                                                                                                                    |
| retail .allowPartialAuthorization                      | boolean | Used to indicate whether the POS supports Partial Authorization                                                                                                                                                  |
| retail .debit .cashback                                | number  |                                                                                                                                                                                                                  |
| retail .debit .pin                                     | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .orderNumber                                    | string  | The merchant-defined order number. Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                 |
| retail .cardData .number                               | string  | The bankcard account number Pattern: ^[\w\-\s\/\+\=]{1,}$                                                                                                                                                        |
| retail .cardData .expiration                           | string  | The card's expiration date                                                                                                                                                                                       |
| retail .cardData .cvv                                  | string  | The card's CVV code                                                                                                                                                                                              |
| retail .customer .email                                | string  | The customer's email address                                                                                                                                                                                     |
| retail .customer .telephone                            | string  | The customer's telephone number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                   |
| retail .customer .fax                                  | string  | The customer's fax number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                         |
| retail .billing .name                                  | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .address                               | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .city                                  | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .state                                 | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .postalCode                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .billing .country                               | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .name                                 | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .address                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .city                                 | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .state                                | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .postalCode                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .shipping .country                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| retail .isRecurring                                    | boolean | Indicates this transaction is part of a recurring series. NOTE: This does not create nor update a recurring billing entry                                                                                        |
| retail .recurringSchedule .amount                      | number  | Recurring amount                                                                                                                                                                                                 |
| retail .recurringSchedule .frequency                   | string  | The frequency at which the transaction should be processed                                                                                                                                                       |
| retail .recurringSchedule .interval                    | integer | Recurring interval                                                                                                                                                                                               |
| retail .recurringSchedule .nonBusinessDaysHandling     | string  | Specifies how the transaction should be processed if the processing date occurrs on a weekend or holiday                                                                                                         |
| retail .recurringSchedule .startDate                   | string  | The date the recurring transactions should start                                                                                                                                                                 |
| retail .recurringSchedule .totalCount                  | integer | The total number of times the transaction should take place. If null, it will occur indefinitely                                                                                                                 |
| retail .recurringSchedule .groupId                     | string  | Recurring Group ID under which the recurring transaction will be added Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                            |
| eCommerce .authorizationCode                           | string  | The 6 character authorization code for use with Force transaction code. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                           |
| eCommerce .amounts .total                              | number  | The total amount of the transaction                                                                                                                                                                              |
| eCommerce .amounts .tax                                | number  | The amount coming from tax                                                                                                                                                                                       |
| eCommerce .amounts .shipping                           | number  | The amount coming from shipping charges                                                                                                                                                                          |
| eCommerce .orderNumber                                 | string  | The merchant-defined order number. Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                 |
| eCommerce .cardData .number                            | string  | The bankcard account number Pattern: ^[\w\-\s\/\+\=]{1,}$                                                                                                                                                        |
| eCommerce .cardData .expiration                        | string  | The card's expiration date                                                                                                                                                                                       |
| eCommerce .cardData .cvv                               | string  | The card's CVV code                                                                                                                                                                                              |
| eCommerce .customer .email                             | string  | The customer's email address                                                                                                                                                                                     |
| eCommerce .customer .telephone                         | string  | The customer's telephone number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                   |
| eCommerce .customer .fax                               | string  | The customer's fax number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                         |
| eCommerce .billing .name                               | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .address                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .city                               | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .state                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .postalCode                         | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .billing .country                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .name                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .address                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .city                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .state                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .postalCode                        | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .shipping .country                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| eCommerce .level2 .customerNumber                      | string  | Customer Number for Purchase Card Level II Transactions Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                           |
| eCommerce .level3 .destinationCountryCode              | string  | Abbreviation or Numeric code (840 or USA) Country code of the country to where the goods are shipped Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                              |
| eCommerce .level3 .amounts .discount                   | number  | Total amount of discount applied to the line item. The value can also be zero.                                                                                                                                   |
| eCommerce .level3 .amounts .duty                       | number  | Total charges for any import and/or export duties for the order. The value can also be zero                                                                                                                      |
| eCommerce .level3 .amounts .nationalTax                | number  | National tax for the order. The value can also be zero.                                                                                                                                                          |
| eCommerce .level3 .vat .idNumber                       | string  | Customer’s government-assigned VAT identification number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                          |
| eCommerce .level3 .vat .invoiceNumber                  | string  | nvoice number associated with the VAT invoice. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                    |
| eCommerce .level3 .vat .amount                         | number  | Total amount of tax for the item. Note that this is not the per-item tax amount. For example, if the quantity is 4, and the amount of tax per item is $0.25, then set this field to 1.00. The value can be zero. |
| eCommerce .level3 .vat .rate                           | number  | Tax rate applied to the item. Acceptable range is 0.0000 to 0.9999 (0.00% to 99.99%).                                                                                                                            |
| eCommerce .level3 .customerNumber                      | string  | Customer Number for Purchase Card Level II Transactions Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                           |
| eCommerce .isRecurring                                 | boolean | Indicates this transaction is part of a recurring series. NOTE: This does not create nor update a recurring billing entry                                                                                        |
| eCommerce .recurringSchedule .amount                   | number  | Recurring amount                                                                                                                                                                                                 |
| eCommerce .recurringSchedule .frequency                | string  | The frequency at which the transaction should be processed                                                                                                                                                       |
| eCommerce .recurringSchedule .interval                 | integer | Recurring interval                                                                                                                                                                                               |
| eCommerce .recurringSchedule .nonBusinessDaysHandling  | string  | Specifies how the transaction should be processed if the processing date occurrs on a weekend or holiday                                                                                                         |
| eCommerce .recurringSchedule .startDate                | string  | The date the recurring transactions should start                                                                                                                                                                 |
| eCommerce .recurringSchedule .totalCount               | integer | The total number of times the transaction should take place. If null, it will occur indefinitely                                                                                                                 |
| eCommerce .recurringSchedule .groupId                  | string  | Recurring Group ID under which the recurring transaction will be added Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                            |
| healthCare .amounts .healthCare                        | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .prescription                      | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .clinic                            | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .dental                            | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .vision                            | number  |                                                                                                                                                                                                                  |
| healthCare .amounts .total                             | number  | The total amount of the transaction                                                                                                                                                                              |
| healthCare .amounts .tax                               | number  | The amount coming from tax                                                                                                                                                                                       |
| healthCare .amounts .shipping                          | number  | The amount coming from shipping charges                                                                                                                                                                          |
| healthCare .iiasVerification                           | string  | Identifies if the purchase items were verified against an Inventory Information Approval System (IIAS). Values can be 'NotVerified', 'Verified' or 'Exempt'                                                      |
| healthCare .debit .cashback                            | number  |                                                                                                                                                                                                                  |
| healthCare .debit .pin                                 | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .authorizationCode                          | string  | The 6 character authorization code for use with Force transaction code.                                                                                                                                          |
| healthCare .trackData .value                           | string  | The value obtained from the swipe                                                                                                                                                                                |
| healthCare .trackData .format                          | string  | The data format                                                                                                                                                                                                  |
| healthCare .trackData .isContactless                   | boolean |                                                                                                                                                                                                                  |
| healthCare .deviceId                                   | string  | A unique ID defined by the client to identify a particular device, terminal, or user of the client software. Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                      |
| healthCare .cardPresent                                | boolean | Used with manually keyed transactions to indicate whether the card was present but not swiped                                                                                                                    |
| healthCare .allowPartialAuthorization                  | boolean | Used to indicate whether the POS supports Partial Authorization                                                                                                                                                  |
| healthCare .orderNumber                                | string  | The merchant-defined order number. Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                 |
| healthCare .cardData .number                           | string  | The bankcard account number Pattern: ^[\w\-\s\/\+\=]{1,}$                                                                                                                                                        |
| healthCare .cardData .expiration                       | string  | The card's expiration date                                                                                                                                                                                       |
| healthCare .cardData .cvv                              | string  | The card's CVV code                                                                                                                                                                                              |
| healthCare .customer .email                            | string  | The customer's email address                                                                                                                                                                                     |
| healthCare .customer .telephone                        | string  | The customer's telephone number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                   |
| healthCare .customer .fax                              | string  | The customer's fax number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                         |
| healthCare .billing .name                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .address                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .city                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .state                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .postalCode                        | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .billing .country                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .name                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .address                          | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .city                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .state                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .postalCode                       | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .shipping .country                          | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                   |
| healthCare .isRecurring                                | boolean | Indicates this transaction is part of a recurring series. NOTE: This does not create nor update a recurring billing entry                                                                                        |
| healthCare .recurringSchedule .amount                  | number  | Recurring amount                                                                                                                                                                                                 |
| healthCare .recurringSchedule .frequency               | string  | The frequency at which the transaction should be processed                                                                                                                                                       |
| healthCare .recurringSchedule .interval                | integer | Recurring interval                                                                                                                                                                                               |
| healthCare .recurringSchedule .nonBusinessDaysHandling | string  | Specifies how the transaction should be processed if the processing date occurrs on a weekend or holiday                                                                                                         |
| healthCare .recurringSchedule .startDate               | string  | The date the recurring transactions should start                                                                                                                                                                 |
| healthCare .recurringSchedule .totalCount              | integer | The total number of times the transaction should take place. If null, it will occur indefinitely                                                                                                                 |
| healthCare .recurringSchedule .groupId                 | string  | Recurring Group ID under which the recurring transaction will be added Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                            |
| vault .token                                           | string  | The Vault record token to use during a Read or Update operation Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                   |
| vault .operation                                       | string  | The type of operation being requested. Values can be 'Read', 'Update' or 'Create'                                                                                                                                |
| terminalNumber                                         | string  | The Gateway terminal configuration number. If it is not present, the default Gateway terminal configuration will be used.                                                                                        |

#### Response

| Name                  | Type    | Description                                                                                                                  |
|-----------------------|---------|------------------------------------------------------------------------------------------------------------------------------|
| status                | string  | The status of the transaction                                                                                                |
| reference             | string  | A unique transaction identifier generated by the Gateway                                                                     |
| message               | string  | A textual message that can be displayed on a terminal.                                                                       |
| code                  | string  | The Approval, Error, or Decline code.                                                                                        |
| cvvResult             | string  | A message indicating the status of CVV verification                                                                          |
| avsResult             | string  | A message indicating the status of CVV verification                                                                          |
| riskCode              | string  | A code representing the SPS risk threshold that was triggered                                                                |
| networkId             | string  | The authorization network                                                                                                    |
| isPurchaseCard        | boolean |                                                                                                                              |
| isfsa                 | boolean | Indicates the card was verified to be a FSA card; assumed to be false if not present                                         |
| balance               | number  | The remaining balance on prepaid cards; to be displayed to customer on receipt, web page, POS terminal, etc                  |
| approvedAmount        | number  | The amount partially approved when a cardholder does not have enough balance on the debit, prepaid, or gift card             |
| vaultResponse .status | string  | Indicates whether the requested Vault operation succeeded                                                                    |
| vaultResponse .data   | string  | The data returned from the Vault                                                                                             |
| orderNumber           | string  | The user defined order number provided in the request. If one was not provided, the auto generated order number is returned. |
| transactionId         | string  | The unique transaction identifier supplied by the client in the request                                                      |
| timestamp             | string  |                                                                                                                              |

### GET get_credits_detail
Used to retrieve detailed information about a specific credit.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/credits/{reference}

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name                                     | Type    | Description                                                                                                                                                                                                      |
|------------------------------------------|---------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| reference                                | string  | A unique transaction identifier generated by the Gateway                                                                                                                                                         |
| service                                  | string  |                                                                                                                                                                                                                  |
| status                                   | string  | The current status of the transaction                                                                                                                                                                            |
| transactionCode                          | string  | The type of transaction                                                                                                                                                                                          |
| date                                     | string  | The date the transaction was processed                                                                                                                                                                           |
| amounts .total                           | number  | The total amount of the transaction                                                                                                                                                                              |
| amounts .tax                             | number  | The amount coming from tax                                                                                                                                                                                       |
| amounts .shipping                        | number  | The amount coming from shipping charges                                                                                                                                                                          |
| billing .name                            | string  |                                                                                                                                                                                                                  |
| billing .address                         | string  |                                                                                                                                                                                                                  |
| billing .city                            | string  |                                                                                                                                                                                                                  |
| billing .state                           | string  |                                                                                                                                                                                                                  |
| billing .postalCode                      | string  |                                                                                                                                                                                                                  |
| billing .country                         | string  |                                                                                                                                                                                                                  |
| shipping .name                           | string  |                                                                                                                                                                                                                  |
| shipping .address                        | string  |                                                                                                                                                                                                                  |
| shipping .city                           | string  |                                                                                                                                                                                                                  |
| shipping .state                          | string  |                                                                                                                                                                                                                  |
| shipping .postalCode                     | string  |                                                                                                                                                                                                                  |
| shipping .country                        | string  |                                                                                                                                                                                                                  |
| shipping .trackingNumber                 | string  |                                                                                                                                                                                                                  |
| customer .email                          | string  | The customer's email address                                                                                                                                                                                     |
| customer .telephone                      | string  | The customer's telephone number                                                                                                                                                                                  |
| customer .fax                            | string  | The customer's fax number                                                                                                                                                                                        |
| bankcard .cardData .number               | string  | The masked card number                                                                                                                                                                                           |
| bankcard .cardData .expirationDate       | string  | The card expiration date MMYY                                                                                                                                                                                    |
| bankcard .cardData .type                 | string  | The card type identified by the card number                                                                                                                                                                      |
| bankcard .cardData .entryMode            | string  | The mode in which the payment was entered                                                                                                                                                                        |
| bankcard .isPurchaseCard                 | boolean |                                                                                                                                                                                                                  |
| bankcard .avsResult                      | string  |                                                                                                                                                                                                                  |
| bankcard .cvvResult                      | string  |                                                                                                                                                                                                                  |
| bankcard .level2 .customerNumber         | string  | Customer Number for Purchase Card Level II Transactions                                                                                                                                                          |
| bankcard .level3 .destinationCountryCode | string  | Abbreviation or Numeric code (840 or USA) Country code of the country to where the goods are shipped                                                                                                             |
| bankcard .level3 .amounts .discount      | number  | Total amount of discount applied to the line item. The value can also be zero.                                                                                                                                   |
| bankcard .level3 .amounts .duty          | number  | Total charges for any import and/or export duties for the order. The value can also be zero                                                                                                                      |
| bankcard .level3 .amounts .nationalTax   | number  | National tax for the order. The value can also be zero.                                                                                                                                                          |
| bankcard .level3 .vat .idNumber          | string  | Customer’s government-assigned VAT identification number                                                                                                                                                         |
| bankcard .level3 .vat .invoiceNumber     | string  | nvoice number associated with the VAT invoice.                                                                                                                                                                   |
| bankcard .level3 .vat .amount            | number  | Total amount of tax for the item. Note that this is not the per-item tax amount. For example, if the quantity is 4, and the amount of tax per item is $0.25, then set this field to 1.00. The value can be zero. |
| bankcard .level3 .vat .rate              | number  | Tax rate applied to the item. Acceptable range is 0.0000 to 0.9999 (0.00% to 99.99%).                                                                                                                            |
| bankcard .level3 .customerNumber         | string  | Customer Number for Purchase Card Level II Transactions                                                                                                                                                          |
| ach .routingNumber                       | string  |                                                                                                                                                                                                                  |
| ach .accountNumber                       | string  |                                                                                                                                                                                                                  |
| ach .accountType                         | string  |                                                                                                                                                                                                                  |
| ach .originatorType                      | string  |                                                                                                                                                                                                                  |
| ach .originatorId                        | string  |                                                                                                                                                                                                                  |
| ach .addenda                             | string  |                                                                                                                                                                                                                  |
| isApproved                               | boolean | Indicates whether the transaction was approved                                                                                                                                                                   |
| orderNumber                              | string  | The merchant assigned order number for the payment                                                                                                                                                               |
| notes                                    | string  |                                                                                                                                                                                                                  |
| processorResponse .code                  | string  | The approval/decline/error code                                                                                                                                                                                  |
| processorResponse .message               | string  | The textual approval/decline/error message to be displayed on a terminal                                                                                                                                         |
| processorResponse .avsResult             | string  | The AVS result code                                                                                                                                                                                              |
| processorResponse .cvvResult             | string  | The CVV result code                                                                                                                                                                                              |
| processorResponse .networkBatchNumber    | integer | The batch number assigned by the settlement network                                                                                                                                                              |
| signature .image                         | string  |                                                                                                                                                                                                                  |
| signature .type                          | string  |                                                                                                                                                                                                                  |
| terminalNumber                           | string  | The Gateway terminal configuration number.                                                                                                                                                                       |
| deviceId                                 | string  | The identifier of the device using the software application originating the payment.                                                                                                                             |
| settlement .reference                    | string  | A unique transaction identifier generated by the Gateway                                                                                                                                                         |
| settlement .date                         | string  | The date and time the transaction was settled                                                                                                                                                                    |
| uniqueIdentifier                         | string  | The unique reference number supplied by the client application that initiated the transaction                                                                                                                    |
| applicationName                          | string  | The name of the application through which the transaction was processed                                                                                                                                          |
| username                                 | string  | The username of the SPS user who processed the transaction                                                                                                                                                       |
| ipAddress                                | string  | The IP Address from which the transaction originated                                                                                                                                                             |
| href                                     | string  | The URL to the resource containing details for this item                                                                                                                                                         |

### POST post_credits_reference
Used to process a credit. Referencing a previous transaction allows you to issue a refund without knowing the card number and expiration date.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/credits/{reference}

#### Request Body

```JSON
{
    "transactionId": "",
    "deviceId": "",
    "amount": 0,
    "terminalNumber": ""
}
```

#### Request
| Name           | Type   | Description                                                                                                                                                           |
|----------------|--------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| transactionId  | string | A unique transaction identifier, this field is used for communication protocol purposes. The value provided is echoed in the response. Pattern: ^[\w'\-\s\.,#\/]{0,}$ |
| deviceId       | string | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                        |
| amount         | number |                                                                                                                                                                       |
| terminalNumber | string | The Gateway terminal configuration number. If it is not present, the default Gateway terminal configuration will be used.                                             |


#### Response

| Name                  | Type    | Description                                                                                                                  |
|-----------------------|---------|------------------------------------------------------------------------------------------------------------------------------|
| status                | string  | The status of the transaction                                                                                                |
| reference             | string  | A unique transaction identifier generated by the Gateway                                                                     |
| message               | string  | A textual message that can be displayed on a terminal.                                                                       |
| code                  | string  | The Approval, Error, or Decline code.                                                                                        |
| cvvResult             | string  | A message indicating the status of CVV verification                                                                          |
| avsResult             | string  | A message indicating the status of CVV verification                                                                          |
| riskCode              | string  | A code representing the SPS risk threshold that was triggered                                                                |
| networkId             | string  | The authorization network                                                                                                    |
| isPurchaseCard        | boolean |                                                                                                                              |
| isfsa                 | boolean | Indicates the card was verified to be a FSA card; assumed to be false if not present                                         |
| balance               | number  | The remaining balance on prepaid cards; to be displayed to customer on receipt, web page, POS terminal, etc                  |
| approvedAmount        | number  | The amount partially approved when a cardholder does not have enough balance on the debit, prepaid, or gift card             |
| vaultResponse .status | string  | Indicates whether the requested Vault operation succeeded                                                                    |
| vaultResponse .data   | string  | The data returned from the Vault                                                                                             |
| orderNumber           | string  | The user defined order number provided in the request. If one was not provided, the auto generated order number is returned. |
| transactionId         | string  | The unique transaction identifier supplied by the client in the request                                                      |
| timestamp             | string  |                                                                                                                              |

### DELETE delete_credits
Used to "void", or cancel, a credit. Only unsettled transactions can be voided.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/credits/{reference}

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

## Reporting on Transactions

### GET get_transactions
Used to query transactions by various criteria including amount, date, order number, type, etc. Results include both summarized information and itemized detail.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/transactions

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Query Parameters

| type           | Sale/Authorization/Force/Void/Credit/CreditByReference/Capture | The type of transaction, valid values are "Sale", "Authorization", "Force", "Void", "Credit", "CreditByReference", "Capture"                                     |
|----------------|----------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| startDate      |                                                                | Returns records on or after this date                                                                                                                            |
| endDate        |                                                                | Returns records on or before this date                                                                                                                           |
| pageSize       |                                                                | The number of items to be included in each page of the result set                                                                                                |
| pageNumber     |                                                                | The page number of the result set to return                                                                                                                      |
| sortDirection  | Ascending/Descending                                           | The direction in which results should be sorted                                                                                                                  |
| sortField      |                                                                | The field on which results should be sorted. This can be any field in the response object.                                                                       |
| isPurchaseCard |                                                                | Whether the bankcard transaction was a purchase card                                                                                                             |
| name           |                                                                | Used to query transactions by various criteria including amount, date, order number, type, etc. Results include both summarized information and itemized detail. |
| accountNumber  |                                                                | The last 4 digits of the customer's credit card number                                                                                                           |
| source         | Mobile/Recurring                                               | The type of application from which the transaction originated                                                                                                    |
| orderNumber    |                                                                | The transaction's order number                                                                                                                                   |
| reference      |                                                                | The transaction's unique reference number                                                                                                                        |
| batchReference |                                                                | The batch's unique reference number                                                                                                                              |
| totalAmount    |                                                                | The total amount of the transaction                                                                                                                              |
| approvalCode   |                                                                | The six-digit approval code returned by the host                                                                                                                 |

#### Response

| Name           | Type    | Description                                                                                                    |
|----------------|---------|----------------------------------------------------------------------------------------------------------------|
| startDate      | string  |                                                                                                                |
| endDate        | string  |                                                                                                                |
| totalItemCount | integer | The total number of items in the result set                                                                    |
| pageSize       | integer | The number of items on each page of results                                                                    |
| pageNumber     | integer | The current page of results being returned                                                                     |
| href           | string  | The URL used to get this page of data                                                                          |
| next           | string  | The URL used to get the next page of data. If null, the current page is the last page in the result set.       |
| previous       | string  | The URL used to get the previous page of data. If null, the currrent page is the first page in the result set. |
| summary        | array   | A summary of sales, authorizations, and credits in the result set                                              |
| items          | array   |                                                                                                                |


### GET get_transactions_details
Used to retrieve detailed information about a specific transaction.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/transactions/{reference}

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name                                     | Type    | Description                                                                                                                                                                                                      |
|------------------------------------------|---------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| reference                                | string  | A unique transaction identifier generated by the Gateway                                                                                                                                                         |
| service                                  | string  |                                                                                                                                                                                                                  |
| status                                   | string  | The current status of the transaction                                                                                                                                                                            |
| transactionCode                          | string  | The type of transaction                                                                                                                                                                                          |
| date                                     | string  | The date the transaction was processed                                                                                                                                                                           |
| amounts .total                           | number  | The total amount of the transaction                                                                                                                                                                              |
| amounts .tax                             | number  | The amount coming from tax                                                                                                                                                                                       |
| amounts .shipping                        | number  | The amount coming from shipping charges                                                                                                                                                                          |
| billing .name                            | string  |                                                                                                                                                                                                                  |
| billing .address                         | string  |                                                                                                                                                                                                                  |
| billing .city                            | string  |                                                                                                                                                                                                                  |
| billing .state                           | string  |                                                                                                                                                                                                                  |
| billing .postalCode                      | string  |                                                                                                                                                                                                                  |
| billing .country                         | string  |                                                                                                                                                                                                                  |
| shipping .name                           | string  |                                                                                                                                                                                                                  |
| shipping .address                        | string  |                                                                                                                                                                                                                  |
| shipping .city                           | string  |                                                                                                                                                                                                                  |
| shipping .state                          | string  |                                                                                                                                                                                                                  |
| shipping .postalCode                     | string  |                                                                                                                                                                                                                  |
| shipping .country                        | string  |                                                                                                                                                                                                                  |
| shipping .trackingNumber                 | string  |                                                                                                                                                                                                                  |
| customer .email                          | string  | The customer's email address                                                                                                                                                                                     |
| customer .telephone                      | string  | The customer's telephone number                                                                                                                                                                                  |
| customer .fax                            | string  | The customer's fax number                                                                                                                                                                                        |
| bankcard .cardData .number               | string  | The masked card number                                                                                                                                                                                           |
| bankcard .cardData .expirationDate       | string  | The card expiration date MMYY                                                                                                                                                                                    |
| bankcard .cardData .type                 | string  | The card type identified by the card number                                                                                                                                                                      |
| bankcard .cardData .entryMode            | string  | The mode in which the payment was entered                                                                                                                                                                        |
| bankcard .isPurchaseCard                 | boolean |                                                                                                                                                                                                                  |
| bankcard .avsResult                      | string  |                                                                                                                                                                                                                  |
| bankcard .cvvResult                      | string  |                                                                                                                                                                                                                  |
| bankcard .level2 .customerNumber         | string  | Customer Number for Purchase Card Level II Transactions                                                                                                                                                          |
| bankcard .level3 .destinationCountryCode | string  | Abbreviation or Numeric code (840 or USA) Country code of the country to where the goods are shipped                                                                                                             |
| bankcard .level3 .amounts .discount      | number  | Total amount of discount applied to the line item. The value can also be zero.                                                                                                                                   |
| bankcard .level3 .amounts .duty          | number  | Total charges for any import and/or export duties for the order. The value can also be zero                                                                                                                      |
| bankcard .level3 .amounts .nationalTax   | number  | National tax for the order. The value can also be zero.                                                                                                                                                          |
| bankcard .level3 .vat .idNumber          | string  | Customer’s government-assigned VAT identification number                                                                                                                                                         |
| bankcard .level3 .vat .invoiceNumber     | string  | nvoice number associated with the VAT invoice.                                                                                                                                                                   |
| bankcard .level3 .vat .amount            | number  | Total amount of tax for the item. Note that this is not the per-item tax amount. For example, if the quantity is 4, and the amount of tax per item is $0.25, then set this field to 1.00. The value can be zero. |
| bankcard .level3 .vat .rate              | number  | Tax rate applied to the item. Acceptable range is 0.0000 to 0.9999 (0.00% to 99.99%).                                                                                                                            |
| bankcard .level3 .customerNumber         | string  | Customer Number for Purchase Card Level II Transactions                                                                                                                                                          |
| ach .routingNumber                       | string  |                                                                                                                                                                                                                  |
| ach .accountNumber                       | string  |                                                                                                                                                                                                                  |
| ach .accountType                         | string  |                                                                                                                                                                                                                  |
| ach .originatorType                      | string  |                                                                                                                                                                                                                  |
| ach .originatorId                        | string  |                                                                                                                                                                                                                  |
| ach .addenda                             | string  |                                                                                                                                                                                                                  |
| isApproved                               | boolean | Indicates whether the transaction was approved                                                                                                                                                                   |
| orderNumber                              | string  | The merchant assigned order number for the payment                                                                                                                                                               |
| notes                                    | string  |                                                                                                                                                                                                                  |
| processorResponse .code                  | string  | The approval/decline/error code                                                                                                                                                                                  |
| processorResponse .message               | string  | The textual approval/decline/error message to be displayed on a terminal                                                                                                                                         |
| processorResponse .avsResult             | string  | The AVS result code                                                                                                                                                                                              |
| processorResponse .cvvResult             | string  | The CVV result code                                                                                                                                                                                              |
| processorResponse .networkBatchNumber    | integer | The batch number assigned by the settlement network                                                                                                                                                              |
| signature .image                         | string  |                                                                                                                                                                                                                  |
| signature .type                          | string  |                                                                                                                                                                                                                  |
| terminalNumber                           | string  | The Gateway terminal configuration number.                                                                                                                                                                       |
| deviceId                                 | string  | The identifier of the device using the software application originating the payment.                                                                                                                             |
| settlement .reference                    | string  | A unique transaction identifier generated by the Gateway                                                                                                                                                         |
| settlement .date                         | string  | The date and time the transaction was settled                                                                                                                                                                    |
| uniqueIdentifier                         | string  | The unique reference number supplied by the client application that initiated the transaction                                                                                                                    |
| applicationName                          | string  | The name of the application through which the transaction was processed                                                                                                                                          |
| username                                 | string  | The username of the SPS user who processed the transaction                                                                                                                                                       |
| ipAddress                                | string  | The IP Address from which the transaction originated                                                                                                                                                             |
| href                                     | string  | The URL to the resource containing details for this item                                                                                                                                                         |

## Settlements and Batches

### GET get_batches
Used to query settled batches by date. Results include itemized details, such as settlement date and reference number.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/batches

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Query Parameters

| startDate     |                                                                                                                    | Returns records on or after this date                                                      |
|---------------|--------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------|
| endDate       |                                                                                                                    | Returns records on or before this date                                                     |
| pageSize      |                                                                                                                    | The number of items to be included in each page of the result set                          |
| pageNumber    |                                                                                                                    | The page number of the result set to return                                                |
| sortDirection | Ascending/Descending                                                                                               | The direction in which results should be sorted                                            |
| sortField     |                                                                                                                    | The field on which results should be sorted. This can be any field in the response object. |

#### Response

| Name           | Type    | Description                                                                                                    |
|----------------|---------|----------------------------------------------------------------------------------------------------------------|
| startDate      | string  |                                                                                                                |
| endDate        | string  |                                                                                                                |
| totalItemCount | integer | The total number of items in the result set                                                                    |
| pageSize       | integer | The number of items on each page of results                                                                    |
| pageNumber     | integer | The current page of results being returned                                                                     |
| href           | string  | The URL used to get this page of data                                                                          |
| next           | string  | The URL used to get the next page of data. If null, the current page is the last page in the result set.       |
| previous       | string  | The URL used to get the previous page of data. If null, the currrent page is the first page in the result set. |
| items          | array   | The current page of items                                                                                      |


### GET get_batches_current
Used to retrieve itemized detail about the transactions in the current batch.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/batches/current

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```
#### Query Parameters

| Name          | Values               | Description                                                                                |
|---------------|----------------------|--------------------------------------------------------------------------------------------|
| pageSize      |                      | The number of items to be included in each page of the result set                          |
| pageNumber    |                      | The page number of the result set to return                                                |
| sortDirection | Ascending/Descending | The direction in which results should be sorted                                            |
| sortField     |                      | The field on which results should be sorted. This can be any field in the response object. |

#### Response

| Name           | Type    | Description                                                                                                    |
|----------------|---------|----------------------------------------------------------------------------------------------------------------|
| totalItemCount | integer | The total number of items in the result set                                                                    |
| pageSize       | integer | The number of items on each page of results                                                                    |
| pageNumber     | integer | The current page of results being returned                                                                     |
| href           | string  | The URL used to get this page of data                                                                          |
| next           | string  | The URL used to get the next page of data. If null, the current page is the last page in the result set.       |
| previous       | string  | The URL used to get the previous page of data. If null, the currrent page is the first page in the result set. |
| items          | array   | The current page of items                                                                                      |


### POST post_batches_current 
Used to settle the open transactions in the current batch. Settlement initiates the merchant funding process.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/batches/current

#### Request Body

```JSON
{
    "settlementType": "",
    "count": 0,
    "net": 0,
    "terminalNumber": ""
}
```
#### Request

| Name           | Type    | Description                                                                                                                                                                                                                                             |
|----------------|---------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| settlementType | string  |                                                                                                                                                                                                                                                         |
| count          | integer | The number of transactions in the open batch (excluding Authorizations). This is used to reconcile/verify the number of transactions being settled. If the number does not match what is on file the batch will not close.                              |
| net            | number  | The net (debit – credit) of the transactions in the open batch to be settled (excluding Authorizations). This is used to reconcile/verify the net of transactions being settled. If the amount does not match what is on file the batch will not close. |
| terminalNumber | string  | The Gateway terminal configuration number. This is optional. If it is not present the default Gateway terminal configuration will be used.                                                                                                              |

#### Response

| Name        | Type    | Description                                              |
|-------------|---------|----------------------------------------------------------|
| batchNumber | string  | The starting batch number                                |
| count       | integer | The number of transaction in the batch                   |
| volume      | number  | The net of the batch (debit – credit).                   |
| timestamp   | string  |                                                          |
| status      | string  | The status of the transaction                            |
| reference   | string  | A unique transaction identifier generated by the Gateway |
| message     | string  | A textual message that can be displayed on a terminal.   |
| code        | string  | The Approval, Error, or Decline code.                    |


### GET get_batches_current_summary
Used to retrieve summarized information, such as count and volume, about the transactions in the current batch.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/batches/current/summary

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name        | Type    | Description                                                     |
|-------------|---------|-----------------------------------------------------------------|
| items       | array   | A breakdown of totals by transaction type                       |
| authCount   | integer | The total number of Auth transactions for this type             |
| authTotal   | number  | The sum of all Auth transactions for this type                  |
| saleCount   | integer | The total number of Sale transactions for this type             |
| saleTotal   | number  | The sum of all Sale transactions for this type                  |
| creditCount | integer | The total number of Credit transactions (refunds) for this type |
| creditTotal | number  | The sum of all Credit transactions (refunds) for this type      |
| totalCount  | integer | The total number of all transactions for this type              |
| totalVolume | number  | The net volume (debits - credits) for this type                 |


### GET get_batches_totals
Used to retrieve the total count and amount of all batches settled within a given timeframe.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/batches/totals

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Query Parameters

| Name      | Values | Description                            |
|-----------|--------|----------------------------------------|
| startDate |        | Returns records on or after this date  |
| endDate   |        | Returns records on or before this date |

#### Response

| Name   | Type    | Description |
|--------|---------|-------------|
| count  | integer |             |
| volume | number  |             |


### GET get_batches_reference
Used to retrieve itemized detail about the transactions in a specific batch.

#### Resource URL
https://api-cert.sagepayments.com/bankcard/v1/batches/{reference}

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Query Parameters

| Name          | Values               | Description                                                                                |
|---------------|----------------------|--------------------------------------------------------------------------------------------|
| pageSize      |                      | The number of items to be included in each page of the result set                          |
| pageNumber    |                      | The page number of the result set to return                                                |
| sortDirection | Ascending/Descending | The direction in which results should be sorted                                            |
| sortField     |                      | The field on which results should be sorted. This can be any field in the response object. |

#### Response

| Name           | Type    | Description                                                                                                    |
|----------------|---------|----------------------------------------------------------------------------------------------------------------|
| service        | string  | Indicates whether the transactions in this batch are Bankcard or ACH transactions                              |
| reference      | string  | A unique batch/settlement identifier generated by the Gateway                                                  |
| terminalNumber | string  | The Gateway terminal configuration number                                                                      |
| file           | string  |                                                                                                                |
| date           | string  | The date of the settlement                                                                                     |
| volume         | number  | The net of the settlement (debit – credit)                                                                     |
| totalItemCount | integer | The total number of items in the result set                                                                    |
| pageSize       | integer | The number of items on each page of results                                                                    |
| pageNumber     | integer | The current page of results being returned                                                                     |
| href           | string  | The URL used to get this page of data                                                                          |
| next           | string  | The URL used to get the next page of data. If null, the current page is the last page in the result set.       |
| previous       | string  | The URL used to get the previous page of data. If null, the currrent page is the first page in the result set. |
| items          | array   | The current page of items                                                                                      |

