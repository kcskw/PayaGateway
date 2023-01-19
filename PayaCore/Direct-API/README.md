## Header Parameters

clientId - Application identifier also known as API Key
merchantId - Merchant Identifier
merchantKey - Merchant Key
nounce - Secure random number used only once
timestamp - Epoch time stamp
Authorization - Authorization token, HMAC value of:  verb + url + body +merchantId + nonce + timestamp
Content-Type - Valid values are "application/json"


## Resource URL

## Query Parameters

## Request Body


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
