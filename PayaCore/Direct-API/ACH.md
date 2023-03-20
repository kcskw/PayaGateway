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

Used to retrieve basic server/environment information about the front- and back-end APIs.

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

#### Query Parameters

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
| totalAmount    |        | The total amount of the transaction                                                                                                                         |

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

|                |         |                                                                                                                |
|----------------|---------|----------------------------------------------------------------------------------------------------------------|
| Name           | Type    | Description                                                                                                    |
| startDate      | string  |                                                                                                                |
| endDate        | string  |                                                                                                                |
| totalItemCount | integer | The total number of items in the result set                                                                    |
| pageSize       | integer | The number of items on each page of results                                                                    |
| pageNumber     | integer | The current page of results being returned                                                                     |
| href           | string  | The URL used to get this page of data                                                                          |
| next           | string  | The URL used to get the next page of data. If null, the current page is the last page in the result set.       |
| previous       | string  | The URL used to get the previous page of data. If null, the currrent page is the first page in the result set. |
| summary        | array   | A summary of sales, authorizations, and credits in the result set                                              |
| items          | array   |                                                                                                   |


### POST post_charges

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/charges

#### Request Body

```JSON
{
    "secCode": "",
    "originatorId": "",
    "amounts": {
        "total": 0,
        "tax": 0,
        "shipping": 0
    },
    "account": {
        "type": "",
        "routingNumber": "",
        "accountNumber": "",
        "priorReference": ""
    },
    "checkNumber": 0,
    "customer": {
        "dateOfBirth": "",
        "ssn": "",
        "license": {
            "number": "",
            "stateCode": ""
        },
        "ein": "",
        "email": "",
        "telephone": "",
        "fax": ""
    },
    "billing": {
        "name": {
            "first": "",
            "middle": "",
            "last": "",
            "suffix": ""
        },
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
    "orderNumber": "",
    "addenda": "",
    "isRecurring": false,
    "recurringSchedule": {
        "amount": 0,
        "frequency": "",
        "interval": 0,
        "nonBusinessDaysHandling": "",
        "startDate": "",
        "totalCount": 0,
        "groupId": ""
    },
    "vault": {
        "token": "",
        "operation": ""
    },
    "memo": ""
}
```
#### Request

| Name                                       | Type    | Description                                                                                                                                                                                                       |
|--------------------------------------------|---------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| secCode                                    | string  | Identifies the way in which the payment has been authorized. Allowed Values are 'PPD','CCD', 'ARC','WEB','TEL','RCK'                                                                                              |
| originatorId                               | string  | 10 Digit Originator ID assigned by Sage for each transaction class or business purpose Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                             |
| amounts .total                             | number  | The total amount of the transaction                                                                                                                                                                               |
| amounts .tax                               | number  | The amount coming from tax                                                                                                                                                                                        |
| amounts .shipping                          | number  | The amount coming from shipping charges                                                                                                                                                                           |
| account .type                              | string  | The type of bank account from which the funds are being withdrawn                                                                                                                                                 |
| account .routingNumber                     | string  | The customer's account routing number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                              |
| account .accountNumber                     | string  | The customer's account number Pattern: ^[\w\-\s\/\+\=]{1,}$                                                                                                                                                       |
| account .priorReference                    | string  | The presence of this value indicates that Number is an encrypted number belonging to the transaction with this reference. The web service will decrypt this number and pass the decrypted number to the processor |
| checkNumber                                | integer | The check number on the check used to process the ACH transaction                                                                                                                                                 |
| customer .dateOfBirth                      | string  | The customer's date of birth                                                                                                                                                                                      |
| customer .ssn                              | string  | The customer's social security number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                              |
| customer .license .number                  | string  | The driver's license number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                        |
| customer .license .stateCode               | string  | The two-letter abbreviation of the state that issued the driver's license Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                          |
| customer .ein                              | string  | The customer's federal tax ID Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                      |
| customer .email                            | string  | The customer's email address                                                                                                                                                                                      |
| customer .telephone                        | string  | The customer's telephone number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                    |
| customer .fax                              | string  | The customer's fax number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                          |
| billing .name .first                       | string  | The customer's first name Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                          |
| billing .name .middle                      | string  | The customer's middle name or initial Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                              |
| billing .name .last                        | string  | The customer's last name Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                           |
| billing .name .suffix                      | string  | The suffix appended to the customer's name Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                         |
| billing .address                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| billing .city                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| billing .state                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| billing .postalCode                        | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| billing .country                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .name                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .address                          | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .city                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .state                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .postalCode                       | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .country                          | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| orderNumber                                | string  | A client-supplied order number to identify the transaction Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                          |
| addenda                                    | string  | Additional information about the transaction to be passed to the customer's bank Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                   |
| isRecurring                                | boolean | Indicates whether this transaction is part of a recurring series                                                                                                                                                  |
| recurringSchedule .amount                  | number  | Recurring amount                                                                                                                                                                                                  |
| recurringSchedule .frequency               | string  | The frequency at which the transaction should be processed                                                                                                                                                        |
| recurringSchedule .interval                | integer | Recurring interval                                                                                                                                                                                                |
| recurringSchedule .nonBusinessDaysHandling | string  | Specifies how the transaction should be processed if the processing date occurrs on a weekend or holiday                                                                                                          |
| recurringSchedule .startDate               | string  | The date the recurring transactions should start                                                                                                                                                                  |
| recurringSchedule .totalCount              | integer | The total number of times the transaction should take place. If null, it will occur indefinitely                                                                                                                  |
| recurringSchedule .groupId                 | string  | Recurring Group ID under which the recurring transaction will be added Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                             |
| vault .token                               | string  | The Vault record token to use during a Read or Update operation Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                    |
| vault .operation                           | string  | The type of operation being requested. Values can be 'Read', 'Update' or 'Create'.                                                                                                                                |
| memo                                       | string  | Memo or special instructions Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                        |

#### Response

| Name                   | Type   | Description                                                                                                                  |
|------------------------|--------|------------------------------------------------------------------------------------------------------------------------------|
| status                 | string | The status of the transaction                                                                                                |
| reference              | string | A unique transaction identifier generated by the Gateway                                                                     |
| message                | string | A textual message that can be displayed on a terminal.                                                                       |
| orderNumber            | string | The user defined order number provided in the request. If one was not provided, the auto generated order number is returned. |
| vaultResponse .status  | string | Indicates whether the requested Vault operation succeeded                                                                    |
| vaultResponse .message | string |                                                                                                                              |
| vaultResponse .data    |        |                                                                                                                              |

## GET get_charges_detail

Used to retrieve detailed information about a specific charge.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/charges/{reference}

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

### DELETE delete_charges

Used to "void", or cancel, a charge. Only unsettled transactions can be voided; settled transactions should be credited instead.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/charges/{reference}

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
https://api-cert.sagepayments.com/ach/v1/credits

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name           | Values | Description                                                                                                                                                 |
|----------------|--------|-------------------------------------------------------------------------------------------------------------------------------------------------------------|
| startDate      |        | Returns records on or after this date                                                                                                                       |
| endDate        |        | Returns records on or before this date                                                                                                                      |
| pageSize       |        | The number of items to be included in each page of the result set                                                                                           |
| pageNumber     |        | The page number of the result set to return                                                                                                                 |
| sortDirection  |        | The direction in which results should be sorted                                                                                                             |
| sortField      |        | The field on which results should be sorted. This can be any field in the response object.                                                                  |
| name           |        | Used to query credits by various criteria including amount, date, order number, type, etc. Results include both summarized information and itemized detail. |
| accountNumber  |        | The last 4 digits of the customer's credit card number                                                                                                      |
| source         |        | The type of application from which the transaction originated. ['Mobile', 'Recurring']                                                                      |
| orderNumber    |        | The transaction's order number                                                                                                                              |
| reference      |        | The transaction's unique reference number                                                                                                                   |
| batchReference |        | The batch's unique reference number                                                                                                                         |
| totalAmount    |        | The total amount of the transaction                                                                                                                         |

### POST post_credits

Used to process a credit. Credit transactions refund an amount to a card.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/credits

#### Request Body

```JSON
{
    "secCode": "",
    "originatorId": "",
    "amounts": {
        "total": 0,
        "tax": 0,
        "shipping": 0
    },
    "account": {
        "type": "",
        "routingNumber": "",
        "accountNumber": "",
        "priorReference": ""
    },
    "checkNumber": 0,
    "customer": {
        "dateOfBirth": "",
        "ssn": "",
        "license": {
            "number": "",
            "stateCode": ""
        },
        "ein": "",
        "email": "",
        "telephone": "",
        "fax": ""
    },
    "billing": {
        "name": {
            "first": "",
            "middle": "",
            "last": "",
            "suffix": ""
        },
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
    "orderNumber": "",
    "addenda": "",
    "isRecurring": false,
    "recurringSchedule": {
        "amount": 0,
        "frequency": "",
        "interval": 0,
        "nonBusinessDaysHandling": "",
        "startDate": "",
        "totalCount": 0,
        "groupId": ""
    },
    "vault": {
        "token": "",
        "operation": ""
    },
    "memo": ""
}
```

#### Request

| Name                                       | Type    | Description                                                                                                                                                                                                       |
|--------------------------------------------|---------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| secCode                                    | string  | Identifies the way in which the payment has been authorized. Allowed Values are 'PPD','CCD', 'ARC','WEB','TEL','RCK'                                                                                              |
| originatorId                               | string  | 10 Digit Originator ID assigned by Sage for each transaction class or business purpose Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                             |
| amounts .total                             | number  | The total amount of the transaction                                                                                                                                                                               |
| amounts .tax                               | number  | The amount coming from tax                                                                                                                                                                                        |
| amounts .shipping                          | number  | The amount coming from shipping charges                                                                                                                                                                           |
| account .type                              | string  | The type of bank account from which the funds are being withdrawn                                                                                                                                                 |
| account .routingNumber                     | string  | The customer's account routing number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                              |
| account .accountNumber                     | string  | The customer's account number Pattern: ^[\w\-\s\/\+\=]{1,}$                                                                                                                                                       |
| account .priorReference                    | string  | The presence of this value indicates that Number is an encrypted number belonging to the transaction with this reference. The web service will decrypt this number and pass the decrypted number to the processor |
| checkNumber                                | integer | The check number on the check used to process the ACH transaction                                                                                                                                                 |
| customer .dateOfBirth                      | string  | The customer's date of birth                                                                                                                                                                                      |
| customer .ssn                              | string  | The customer's social security number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                              |
| customer .license .number                  | string  | The driver's license number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                        |
| customer .license .stateCode               | string  | The two-letter abbreviation of the state that issued the driver's license Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                          |
| customer .ein                              | string  | The customer's federal tax ID Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                      |
| customer .email                            | string  | The customer's email address                                                                                                                                                                                      |
| customer .telephone                        | string  | The customer's telephone number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                    |
| customer .fax                              | string  | The customer's fax number Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                          |
| billing .name .first                       | string  | The customer's first name Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                          |
| billing .name .middle                      | string  | The customer's middle name or initial Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                              |
| billing .name .last                        | string  | The customer's last name Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                           |
| billing .name .suffix                      | string  | The suffix appended to the customer's name Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                         |
| billing .address                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| billing .city                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| billing .state                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| billing .postalCode                        | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| billing .country                           | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .name                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .address                          | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .city                             | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .state                            | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .postalCode                       | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| shipping .country                          | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                                    |
| orderNumber                                | string  | A client-supplied order number to identify the transaction Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                          |
| addenda                                    | string  | Additional information about the transaction to be passed to the customer's bank Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                   |
| isRecurring                                | boolean | Indicates whether this transaction is part of a recurring series                                                                                                                                                  |
| recurringSchedule .amount                  | number  | Recurring amount                                                                                                                                                                                                  |
| recurringSchedule .frequency               | string  | The frequency at which the transaction should be processed                                                                                                                                                        |
| recurringSchedule .interval                | integer | Recurring interval                                                                                                                                                                                                |
| recurringSchedule .nonBusinessDaysHandling | string  | Specifies how the transaction should be processed if the processing date occurrs on a weekend or holiday                                                                                                          |
| recurringSchedule .startDate               | string  | The date the recurring transactions should start                                                                                                                                                                  |
| recurringSchedule .totalCount              | integer | The total number of times the transaction should take place. If null, it will occur indefinitely                                                                                                                  |
| recurringSchedule .groupId                 | string  | Recurring Group ID under which the recurring transaction will be added Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                             |
| vault .token                               | string  | The Vault record token to use during a Read or Update operation Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                    |
| vault .operation                           | string  | The type of operation being requested. Values can be 'Read', 'Update' or 'Create'.                                                                                                                                |
| memo                                       | string  | Memo or special instructions Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                        |


#### Response

| Name                   | Type   | Description                                                                                                                  |
|------------------------|--------|------------------------------------------------------------------------------------------------------------------------------|
| status                 | string | The status of the transaction                                                                                                |
| reference              | string | A unique transaction identifier generated by the Gateway                                                                     |
| message                | string | A textual message that can be displayed on a terminal.                                                                       |
| orderNumber            | string | The user defined order number provided in the request. If one was not provided, the auto generated order number is returned. |
| vaultResponse .status  | string | Indicates whether the requested Vault operation succeeded                                                                    |
| vaultResponse .message | string |                                                                                                                              |
| vaultResponse .data    | string | The data returned from the Vault                                                                                             |

### GET get_credits_detail

Used to retrieve detailed information about a specific credit.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/charges/{reference}

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
https://api-cert.sagepayments.com/ach/v1/credits/{reference}

#### Request Body

```JSON
{
    "amount": 0,
    "deviceId": ""
}
```

#### Request

| Name     | Type   | Description                    |
|----------|--------|--------------------------------|
| amount   | number |                                |
| deviceId | string | Pattern: ^[\w'\-\s\.,#\/]{0,}$ |


#### Response

| Name                   | Type   | Description                                                                                                                  |
|------------------------|--------|------------------------------------------------------------------------------------------------------------------------------|
| status                 | string | The status of the transaction                                                                                                |
| reference              | string | A unique transaction identifier generated by the Gateway                                                                     |
| message                | string | A textual message that can be displayed on a terminal.                                                                       |
| orderNumber            | string | The user defined order number provided in the request. If one was not provided, the auto generated order number is returned. |
| vaultResponse .status  | string | Indicates whether the requested Vault operation succeeded                                                                    |
| vaultResponse .message | string |                                                                                                                              |
| vaultResponse .data    | string | The data returned from the Vault                                                                                             |

### DELETE delete_credits

Used to "void", or cancel, a credit. Only unsettled transactions can be voided.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/credits/{reference}

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
https://api-cert.sagepayments.com/ach/v1/transactions

### Query Parameters

| Name           | Values | Description                                                                                                                                                      |
|----------------|--------|------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| startDate      |        | Returns records on or after this date                                                                                                                            |
| endDate        |        | Returns records on or before this date                                                                                                                           |
| pageSize       |        | The number of items to be included in each page of the result set                                                                                                |
| pageNumber     |        | The page number of the result set to return                                                                                                                      |
| sortDirection  |        | The direction in which results should be sorted                                                                                                                  |
| sortField      |        | The field on which results should be sorted. This can be any field in the response object.                                                                       |
| isPurchaseCard |        | Whether the bankcard transaction was a purchase card                                                                                                             |
| name           |        | Used to query transactions by various criteria including amount, date, order number, type, etc. Results include both summarized information and itemized detail. |
| accountNumber  |        | The last 4 digits of the customer's credit card number                                                                                                           |
| source         |        | The type of application from which the transaction originated                                                                                                    |
| orderNumber    |        | The transaction's order number                                                                                                                                   |
| reference      |        | The transaction's unique reference number                                                                                                                        |
| batchReference |        | The batch's unique reference number                                                                                                                              |
| totalAmount    |        | The total amount of the transactio                                                                                                                               |

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

### GET get_transactions_detail

Used to retrieve detailed information about a specific transaction.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/transactions/{reference}

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
https://api-cert.sagepayments.com/ach/v1/batches

### Query Parameters

| Name          | Values | Description                                                                                |
|---------------|--------|--------------------------------------------------------------------------------------------|
| startDate     |        | Returns records on or after this date                                                      |
| endDate       |        | Returns records on or before this date                                                     |
| pageSize      |        | The number of items to be included in each page of the result set                          |
| pageNumber    |        | The page number of the result set to return                                                |
| sortDirection |        | The direction in which results should be sorted                                            |
| sortField     |        | The field on which results should be sorted. This can be any field in the response object. |

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
| items          | array   | The current page of items                                                                                      |

### GET get_batches_current

Used to retrieve itemized detail about the transactions in the current batch.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/batches/current

#### Request Paramenters

| Name          | Values | Description                                                                                |
|---------------|--------|--------------------------------------------------------------------------------------------|
| pageSize      |        | The number of items to be included in each page of the result set                          |
| pageNumber    |        | The page number of the result set to return                                                |
| sortDirection |        | The direction in which results should be sorted                                            |
| sortField     |        | The field on which results should be sorted. This can be any field in the response object. |

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

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

### GET get_batches_current_summary

Used to retrieve summarized information, such as count and volume, about the transactions in the current batch.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/batches/current/summary

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
https://api-cert.sagepayments.com/ach/v1/batches/totals

### Query Parameters

| Name      | Values | Description                            |
|-----------|--------|----------------------------------------|
| startDate |        | Returns records on or after this date  |
| endDate   |        | Returns records on or before this date |

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

#### Response

| Name   | Type    | Description |
|--------|---------|-------------|
| count  | integer |             |
| volume | number  |             |

### GET get_batches_reference

Used to retrieve itemized detail about the transactions in a specific batch.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/batches/{reference}

#### Query Parameters

| Name          | Values | Description                                                                                |
|---------------|--------|--------------------------------------------------------------------------------------------|
| pageSize      |        | The number of items to be included in each page of the result set                          |
| pageNumber    |        | The page number of the result set to return                                                |
| sortDirection |        | The direction in which results should be sorted                                            |
| sortField     |        | The field on which results should be sorted. This can be any field in the response object. |

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

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


## Settlements, Summary and Batches

### GET get_batches_reference_summary

Used to retrieve summarized information, such as count and volume, about the transactions in the current batch.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/batches/{reference}/summary

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

## Tokens

### POST post-tokens

Used to store a card and retrieve a vault token. A vault token allows you to process a charge or credit without knowing the Routing number and Account number.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/tokens

#### Request Body

```JSON
{
    "account": {
        "type": "",
        "routingNumber": "",
        "accountNumber": ""
    }
}
```

#### Request

| Name                   | Type   | Description                                                          |
|------------------------|--------|----------------------------------------------------------------------|
| account .type          | string | The type of bank account from which the funds are being withdrawn    |
| account .routingNumber | string | The customer's account routing number Pattern: ^[\w'\-\s\.,#\/]{0,}$ |
| account .accountNumber | string | The customer's account number Pattern: ^[\w\-\s\/\+\=]{1,}$          |



### PUT put-token

Used to update the card data associated with a vault token.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/tokens/{reference}

#### Request Body

```JSON
{
    "account": {
        "type": "",
        "routingNumber": "",
        "accountNumber": ""
    }
}
```

#### Request

| Name                   | Type   | Description                                                          |
|------------------------|--------|----------------------------------------------------------------------|
| account .type          | string | The type of bank account from which the funds are being withdrawn    |
| account .routingNumber | string | The customer's account routing number Pattern: ^[\w'\-\s\.,#\/]{0,}$ |
| account .accountNumber | string | The customer's account number Pattern: ^[\w\-\s\/\+\=]{1,}$          |



### DELETE delete-token

Used to delete a vault token.

#### Resource URL
https://api-cert.sagepayments.com/ach/v1/tokens/{reference}

#### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```
