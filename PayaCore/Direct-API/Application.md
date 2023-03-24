# Application

The Application API can be used by ISOs and Partners to submit merchant applications directly to Sage Payment Solutions.

## POST Applications_Post

Submit an Application

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/applications

### Request Body


```JSON
{
    "corporation": {
        "name": "",
        "address": {
            "line1": "",
            "line2": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "countryCode": ""
        },
        "phoneNumber": "",
        "faxNumber": "",
        "contact": {
            "firstName": "",
            "lastName": "",
            "title": ""
        },
        "email": "",
        "type": "",
        "federalTaxId": "",
        "taxFilingName": "",
        "taxFilingState": "",
        "certifyForeignEntityNonResident": false,
        "certifyElectronicIssuanceof1099": false
    },
    "location": {
        "dba": "",
        "address": {
            "line1": "",
            "line2": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "countryCode": ""
        },
        "phoneNumber": "",
        "customerServicePhoneNumber": "",
        "email": "",
        "url": "",
        "businessOpenDate": "",
        "owner1": {
            "firstName": "",
            "lastName": "",
            "title": "",
            "ssn": "",
            "equity": 0,
            "ownershipStartDate": "",
            "phoneNumber": "",
            "faxNumber": "",
            "email": "",
            "address": {
                "line1": "",
                "line2": "",
                "city": "",
                "state": "",
                "postalCode": "",
                "countryCode": ""
            },
            "dateOfBirth": ""
        },
        "owner2": {
            "firstName": "",
            "lastName": "",
            "title": "",
            "ssn": "",
            "equity": 0,
            "ownershipStartDate": "",
            "phoneNumber": "",
            "faxNumber": "",
            "email": "",
            "address": {
                "line1": "",
                "line2": "",
                "city": "",
                "state": "",
                "postalCode": "",
                "countryCode": ""
            },
            "dateOfBirth": ""
        },
        "isCorporateHeadQuarters": false,
        "businessLevel": "",
        "businessDescription": "",
        "product": "",
        "leadSourceId": 0,
        "associationId": 0,
        "referralGroupId": 0,
        "generalComment": "",
        "highVolumeMonths": [
            0
        ],
        "daysUntilProductDelivery": 0,
        "returnPolicy": "",
        "bankInfo": {
            "name": "",
            "credit": {
                "routingNumber": "",
                "accountNumber": ""
            },
            "debit": {
                "routingNumber": "",
                "accountNumber": ""
            },
            "state": ""
        }
    },
    "creditApplication": {
        "discountFrequency": "",
        "salesVolume": {
            "monthlyVolume": 0,
            "averageTicket": 0,
            "highestTicket": 0
        },
        "entryTypes": {
            "cardPresentSwiped": 0,
            "cardPresentImprint": 0,
            "cardNotPresent": 0
        },
        "saleTypes": {
            "consumer": 0,
            "business": 0,
            "government": 0
        },
        "currentProcessor": "",
        "fanfTypeId": 0,
        "chargebackAmount": 0,
        "acceptedCards": {
            "visa": {
                "betInterchangeId": "",
                "qualifiedRate": 0,
                "checkcardRate": 0,
                "qualifiedDiscountPerItem": 0,
                "checkcardDiscountPerItem": 0,
                "perItemFee": 0,
                "avsFee": 0
            },
            "masterCard": {
                "betInterchangeId": "",
                "qualifiedRate": 0,
                "checkcardRate": 0,
                "qualifiedDiscountPerItem": 0,
                "checkcardDiscountPerItem": 0,
                "perItemFee": 0,
                "avsFee": 0
            },
            "discover": {
                "betInterchangeId": "",
                "qualifiedRate": 0,
                "checkcardRate": 0,
                "qualifiedDiscountPerItem": 0,
                "checkcardDiscountPerItem": 0,
                "perItemFee": 0
            },
            "amex": {
                "betInterchangeId": "",
                "qualifiedRate": 0,
                "checkcardRate": 0,
                "qualifiedDiscountPerItem": 0,
                "checkcardDiscountPerItem": 0,
                "perItemFee": 0,
                "optBlue": {
                    "annualVolume": 0,
                    "optOutOfMarketing": false
                }
            },
            "carteBlanche": {
                "existingAccount": "",
                "perItemFee": 0
            },
            "jcb": {
                "existingAccount": "",
                "perItemFee": 0
            },
            "pinDebit": {
                "perItemFee": 0
            },
            "ebt": {
                "perItemFee": 0
            },
            "voiceAuthorization": {
                "perItemFee": 0
            },
            "aru": {
                "perItemFee": 0
            }
        },
        "services": [
            0
        ]
    },
    "fees": [
        {
            "id": 0,
            "amount": 0
        }
    ],
    "equipment": {
        "billing": {
            "billTo": "",
            "name": "",
            "contact": "",
            "phone": "",
            "line1": "",
            "line2": "",
            "city": "",
            "state": "",
            "postalCode": "",
            "countryCode": ""
        },
        "items": [
            {
                "partId": "",
                "applyVoltEncryptionFee": false,
                "partProvider": "",
                "fileBuiltBy": "",
                "serialNumber": "",
                "merchantSalesPrice": 0,
                "reprogramCost": 0,
                "welcomeKitCost": 0,
                "shipping": {
                    "shippingMethod": "",
                    "name": "",
                    "contact": "",
                    "phone": "",
                    "line1": "",
                    "line2": "",
                    "city": "",
                    "state": "",
                    "postalCode": "",
                    "countryCode": ""
                },
                "programs": [
                    {
                        "id": 0,
                        "features": [
                            {
                                "id": 0,
                                "value": ""
                            }
                        ]
                    }
                ],
                "addonParts": [
                    {
                        "partId": "",
                        "partProvider": "",
                        "salesPrice": 0,
                        "serialNumber": ""
                    }
                ]
            }
        ]
    }
}
```
| Name                                                                   | Type    | Description                                                                                                                                                                                       |
|------------------------------------------------------------------------|---------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| corporation .name                                                      | string  | The corporation's name Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                              |
| corporation .address .line1                                            | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| corporation .address .line2                                            | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| corporation .address .city                                             | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| corporation .address .state                                            | string  | The two-character subdivision identifier from the ISO 3166-2 code for the state or province                                                                                                       |
| corporation .address .postalCode                                       | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                    |
| corporation .address .countryCode                                      | string  | The ISO 3166-1 alpha-3 code for the country                                                                                                                                                       |
| corporation .phoneNumber                                               | string  | The corporation's HQ phone and fax numbers                                                                                                                                                        |
| corporation .faxNumber                                                 | string  |                                                                                                                                                                                                   |
| corporation .contact .firstName                                        | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| corporation .contact .lastName                                         | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| corporation .contact .title                                            | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| corporation .email                                                     | string  | The corporation's email address                                                                                                                                                                   |
| corporation .type                                                      | string  | The type of corporation                                                                                                                                                                           |
| corporation .federalTaxId                                              | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                    |
| corporation .taxFilingName                                             | string  | The name of the corporation as registered with the IRS Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                              |
| corporation .taxFilingState                                            | string  | The corporation's state as registered with the IRS                                                                                                                                                |
| corporation .certifyForeignEntityNonResident                           | boolean | Indicates whether the merchant is certifying that they are a foreign entity or non-resident for tax purposes                                                                                      |
| corporation .certifyElectronicIssuanceof1099                           | boolean | Indicates whether the merchant allows Sage to generate a 1099 form. We recommend that this always be TRUE.                                                                                        |
| location .dba                                                          | string  | This location's DBA name or Doing Business As Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                       |
| location .address .line1                                               | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .address .line2                                               | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .address .city                                                | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .address .state                                               | string  | The two-character subdivision identifier from the ISO 3166-2 code for the state or province                                                                                                       |
| location .address .postalCode                                          | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                    |
| location .address .countryCode                                         | string  | The ISO 3166-1 alpha-3 code for the country                                                                                                                                                       |
| location .phoneNumber                                                  | string  | This location's phone number Pattern: ([0-9]*)                                                                                                                                                    |
| location .customerServicePhoneNumber                                   | string  | This location's Customer Service phone number. Required for MOTO BusinessLevel Pattern: ([0-9]*)                                                                                                  |
| location .email                                                        | string  | The location's email address                                                                                                                                                                      |
| location .url                                                          | string  | The business's web site URL Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                         |
| location .businessOpenDate                                             | string  |                                                                                                                                                                                                   |
| location .owner1 .firstName                                            | string  | Corporate signatory or "owner" first name Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                           |
| location .owner1 .lastName                                             | string  | Corporate signatory or "owner" last name Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                            |
| location .owner1 .title                                                | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .owner1 .ssn                                                  | string  | The owner's social security number Pattern: ([0-9\-]*)                                                                                                                                            |
| location .owner1 .equity                                               | integer | The amount of equity this owner has in the company                                                                                                                                                |
| location .owner1 .ownershipStartDate                                   | string  | The date at which this owner acquired ownership. The most important values needed are month and year.                                                                                             |
| location .owner1 .phoneNumber                                          | string  | Pattern: ([0-9]*)                                                                                                                                                                                 |
| location .owner1 .faxNumber                                            | string  | Pattern: ([0-9]*)                                                                                                                                                                                 |
| location .owner1 .email                                                | string  |                                                                                                                                                                                                   |
| location .owner1 .address .line1                                       | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .owner1 .address .line2                                       | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .owner1 .address .city                                        | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .owner1 .address .state                                       | string  | The two-character subdivision identifier from the ISO 3166-2 code for the state or province                                                                                                       |
| location .owner1 .address .postalCode                                  | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                    |
| location .owner1 .address .countryCode                                 | string  | The ISO 3166-1 alpha-3 code for the country                                                                                                                                                       |
| location .owner1 .dateOfBirth                                          | string  |                                                                                                                                                                                                   |
| location .owner2 .firstName                                            | string  | Corporate signatory or "owner" first name Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                           |
| location .owner2 .lastName                                             | string  | Corporate signatory or "owner" last name Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                            |
| location .owner2 .title                                                | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .owner2 .ssn                                                  | string  | The owner's social security number Pattern: ([0-9\-]*)                                                                                                                                            |
| location .owner2 .equity                                               | integer | The amount of equity this owner has in the company                                                                                                                                                |
| location .owner2 .ownershipStartDate                                   | string  | The date at which this owner acquired ownership. The most important values needed are month and year.                                                                                             |
| location .owner2 .phoneNumber                                          | string  | Pattern: ([0-9]*)                                                                                                                                                                                 |
| location .owner2 .faxNumber                                            | string  | Pattern: ([0-9]*)                                                                                                                                                                                 |
| location .owner2 .email                                                | string  |                                                                                                                                                                                                   |
| location .owner2 .address .line1                                       | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .owner2 .address .line2                                       | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .owner2 .address .city                                        | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| location .owner2 .address .state                                       | string  | The two-character subdivision identifier from the ISO 3166-2 code for the state or province                                                                                                       |
| location .owner2 .address .postalCode                                  | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                    |
| location .owner2 .address .countryCode                                 | string  | The ISO 3166-1 alpha-3 code for the country                                                                                                                                                       |
| location .owner2 .dateOfBirth                                          | string  |                                                                                                                                                                                                   |
| location .isCorporateHeadQuarters                                      | boolean | Indicates that this business location is the corporate headquarters                                                                                                                               |
| location .businessLevel                                                | string  |                                                                                                                                                                                                   |
| location .businessDescription                                          | string  | Text field to describe the business and products sold. 500 character limit Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                          |
| location .product                                                      | string  | The product the business develops or sells Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                          |
| location .leadSourceId                                                 | integer | Use the /Templates/LeadSources endpoint to determine the appropriate value                                                                                                                        |
| location .associationId                                                | integer | Use the /Templates/Associations endpoint to determine the appropriate value                                                                                                                       |
| location .referralGroupId                                              | integer | Use the /Templates/ReferralGroups endpoint to determine the appropriate value                                                                                                                     |
| location .generalComment                                               | string  | Information that is to be reviewed by underwriting. Digital acceptance information like IP address and location should be set here. Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$ |
| location .highVolumeMonths                                             | array   | The months the business normally has higher volume than others                                                                                                                                    |
| location .daysUntilProductDelivery                                     | integer | The number of days between order and delivery                                                                                                                                                     |
| location .returnPolicy                                                 | string  |                                                                                                                                                                                                   |
| location .bankInfo .name                                               | string  |                                                                                                                                                                                                   |
| location .bankInfo .credit .routingNumber                              | string  | Pattern: ([0-9]*)                                                                                                                                                                                 |
| location .bankInfo .credit .accountNumber                              | string  | Pattern: ([0-9]*)                                                                                                                                                                                 |
| location .bankInfo .debit .routingNumber                               | string  | Pattern: ([0-9]*)                                                                                                                                                                                 |
| location .bankInfo .debit .accountNumber                               | string  | Pattern: ([0-9]*)                                                                                                                                                                                 |
| location .bankInfo .state                                              | string  |                                                                                                                                                                                                   |
| creditApplication .discountFrequency                                   | string  | The frequency at which the discount rate is to be charged to the merchant                                                                                                                         |
| creditApplication .salesVolume .monthlyVolume                          | number  | Average monthly volume                                                                                                                                                                            |
| creditApplication .salesVolume .averageTicket                          | number  | Average ticket amount                                                                                                                                                                             |
| creditApplication .salesVolume .highestTicket                          | number  | Highest ticket amount                                                                                                                                                                             |
| creditApplication .entryTypes .cardPresentSwiped                       | integer | The percentage of Card Swiped sales aka "Card Present"                                                                                                                                            |
| creditApplication .entryTypes .cardPresentImprint                      | integer | The percentage of Card Imprint sales aka "Card Present not swiping"                                                                                                                               |
| creditApplication .entryTypes .cardNotPresent                          | integer | The percentage of Card Not Present sales aka "Card not present"                                                                                                                                   |
| creditApplication .saleTypes .consumer                                 | integer | The percentage of Business to Consumer sales                                                                                                                                                      |
| creditApplication .saleTypes .business                                 | integer | The percentage of Business to Business sales                                                                                                                                                      |
| creditApplication .saleTypes .government                               | integer | The percentage of Business to Government sales                                                                                                                                                    |
| creditApplication .currentProcessor                                    | string  | The processor that currently provides the merchant's services Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                      |
| creditApplication .fanfTypeId                                          | integer | Visa Fixed Acquirer Network Fee types; get this value from the /Templates/FanfTypes endpoint                                                                                                      |
| creditApplication .chargebackAmount                                    | number  | Rates, fees, and configurations for the card brands that the merchant will accept                                                                                                                 |
| creditApplication .acceptedCards .visa .betInterchangeId               | string  | The BET Table ID number. This must be a value that is part of the office/contractor's template. Pattern: ([0-9]*)                                                                                 |
| creditApplication .acceptedCards .visa .qualifiedRate                  | number  | qualified rate 1                                                                                                                                                                                  |
| creditApplication .acceptedCards .visa .checkcardRate                  | number  | Checkcard qualified rate 1                                                                                                                                                                        |
| creditApplication .acceptedCards .visa .qualifiedDiscountPerItem       | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .visa .checkcardDiscountPerItem       | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .visa .perItemFee                     | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .visa .avsFee                         | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .masterCard .betInterchangeId         | string  | The BET Table ID number. This must be a value that is part of the office/contractor's template. Pattern: ([0-9]*)                                                                                 |
| creditApplication .acceptedCards .masterCard .qualifiedRate            | number  | qualified rate 1                                                                                                                                                                                  |
| creditApplication .acceptedCards .masterCard .checkcardRate            | number  | Checkcard qualified rate 1                                                                                                                                                                        |
| creditApplication .acceptedCards .masterCard .qualifiedDiscountPerItem | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .masterCard .checkcardDiscountPerItem | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .masterCard .perItemFee               | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .masterCard .avsFee                   | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .discover .betInterchangeId           | string  | The BET Table ID number. This must be a value that is part of the office/contractor's template. Pattern: ([0-9]*)                                                                                 |
| creditApplication .acceptedCards .discover .qualifiedRate              | number  | qualified rate 1                                                                                                                                                                                  |
| creditApplication .acceptedCards .discover .checkcardRate              | number  | Checkcard qualified rate 1                                                                                                                                                                        |
| creditApplication .acceptedCards .discover .qualifiedDiscountPerItem   | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .discover .checkcardDiscountPerItem   | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .discover .perItemFee                 | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .amex .betInterchangeId               | string  | The BET Table ID number. This must be a value that is part of the office/contractor's template. Pattern: ([0-9]*)                                                                                 |
| creditApplication .acceptedCards .amex .qualifiedRate                  | number  | qualified rate 1                                                                                                                                                                                  |
| creditApplication .acceptedCards .amex .checkcardRate                  | number  | Checkcard qualified rate 1                                                                                                                                                                        |
| creditApplication .acceptedCards .amex .qualifiedDiscountPerItem       | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .amex .checkcardDiscountPerItem       | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .amex .perItemFee                     | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .amex .optBlue .annualVolume          | number  | American Express annual volume                                                                                                                                                                    |
| creditApplication .acceptedCards .amex .optBlue .optOutOfMarketing     | boolean | Opts the merchant out of receiving marketing materials from American Express                                                                                                                      |
| creditApplication .acceptedCards .carteBlanche .existingAccount        | string  | The merchant's existing account number for this card brand Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                         |
| creditApplication .acceptedCards .carteBlanche .perItemFee             | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .jcb .existingAccount                 | string  | The merchant's existing account number for this card brand Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                         |
| creditApplication .acceptedCards .jcb .perItemFee                      | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .pinDebit .perItemFee                 | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .ebt .perItemFee                      | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .voiceAuthorization .perItemFee       | number  |                                                                                                                                                                                                   |
| creditApplication .acceptedCards .aru .perItemFee                      | number  |                                                                                                                                                                                                   |
| creditApplication .services                                            | array   | The credit card services being added                                                                                                                                                              |
| fees                                                                   | array   | The fees that will be billed to the merchant account                                                                                                                                              |
| equipment .billing .billTo                                             | string  | The entity Sage should bill for the equipment                                                                                                                                                     |
| equipment .billing .name                                               | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| equipment .billing .contact                                            | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| equipment .billing .phone                                              | string  | Pattern: ([0-9]*)                                                                                                                                                                                 |
| equipment .billing .line1                                              | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| equipment .billing .line2                                              | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| equipment .billing .city                                               | string  | Pattern: ^([\.\,\:\;\|\=\+\^\-\'\$\w\s\#\!\$\?\%\&\/\\]){0,}$                                                                                                                                     |
| equipment .billing .state                                              | string  | The two-character subdivision identifier from the ISO 3166-2 code for the state or province                                                                                                       |
| equipment .billing .postalCode                                         | string  | Pattern: ^[\w'\-\s\.,#\/]{0,}$                                                                                                                                                                    |
| equipment .billing .countryCode                                        | string  | The ISO 3166-1 alpha-3 code for the country                                                                                                                                                       |
| equipment .items                                                       | array   | Details about each terminal or software item being added                                                                                                                                          |


### Response

| Name           | Type    | Description                 |
|----------------|---------|-----------------------------|
| application_id | integer | The Application Identifier. |


## GET Templates_GetAddons

Peripherals that can be added to the equipment, grouped by program

#### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/addons

#### Query Parameters

| Name                    | Values | Description                                        |
|-------------------------|--------|----------------------------------------------------|
| partProvider (required) |        | Merchant, SagePaymentSolutions, ISO, SageSouthEast |
| partId (required)       |        |                                                    |

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name    | Type   | Description |
|---------|--------|-------------|
| program | string |             |
| addons  | array  |             |

## GET Templates_GetAdvanceFundingProcessors

Approved advance funding third-party processors

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/advancefundingprocessors

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name           | Type    | Description                 |
|----------------|---------|-----------------------------|
| id        | integer | The item's system ID. Use this ID to reference the item when posting to the /Applications endpoint |
| title     | string  | The item's display name                                                                            |
| isDefault | boolean | A value used by SPS systems to control the item's display in UIs                                   |
| canEdit   | boolean | A value used by SPS systems to control the item's display in UIs                                   |

## GET Templates_GetAssociations

Associations within the office

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/associations

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name           | Type    | Description                 |
|----------------|---------|-----------------------------|
| id        | integer | The item's system ID. Use this ID to reference the item when posting to the /Applications endpoint |
| title     | string  | The item's display name                                                                            |
| isDefault | boolean | A value used by SPS systems to control the item's display in UIs                                   |
| canEdit   | boolean | A value used by SPS systems to control the item's display in UIs                                   |

## GET Templates_GetDiscountPaidFrequencies

The frequency at which the merchant will be charged discount rates

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/discountpaidfrequencies

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name           | Type    | Description                 |
|----------------|---------|-----------------------------|
| id        | integer | The item's system ID. Use this ID to reference the item when posting to the /Applications endpoint |
| title     | string  | The item's display name                                                                            |
| isDefault | boolean | A value used by SPS systems to control the item's display in UIs                                   |
| canEdit   | boolean | A value used by SPS systems to control the item's display in UIs                                   |

## GET Templates_GetEquipment

Terminals and software available to the merchant

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/equipment

#### Query Parameters

| Name                    | Values | Description                                        |
|-------------------------|--------|----------------------------------------------------|
| partType (required)     |        | Software, Terminal, TerminalOrPrinter, Gateway     |
| partProvider (required) |        | Merchant, SagePaymentSolutions, ISO, SageSouthEast |


### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name                     | Type    | Description                                                                                            |
|--------------------------|---------|--------------------------------------------------------------------------------------------------------|
| partId                   | string  | The Part ID from the /Templates/Equipment endpoint                                                     |
| applyVoltEncryptionFee   | boolean | Indicates if the part is voltage encrypted                                                             |
| partProvider             | string  | The entity who will be billed for the equipment                                                        |
| fileBuiltBy              | string  | Indicates who builds the backend file necessary to register this terminal                              |
| serialNumber             | string  | Optional serial number for a physical terminal                                                         |
| merchantSalesPrice       | number  | The amount the merchant will be charged                                                                |
| reprogramCost            | number  | The amount charged for reprogram service, if the merchant chooses it                                   |
| welcomeKitCost           | number  | The amount charged for a welcome kit, if the merchant chooses it                                       |
| shipping .shippingMethod | string  |                                                                                                        |
| shipping .name           | string  |                                                                                                        |
| shipping .contact        | string  |                                                                                                        |
| shipping .phone          | string  |                                                                                                        |
| shipping .line1          | string  |                                                                                                        |
| shipping .line2          | string  |                                                                                                        |
| shipping .city           | string  |                                                                                                        |
| shipping .state          | string  | The two-character subdivision identifier from the ISO 3166-2 code for the state or province            |
| shipping .postalCode     | string  |                                                                                                        |
| shipping .countryCode    | string  | The ISO 3166-1 alpha-3 code for the country                                                            |
| programs                 | array   | Applications to be downloaded to the equipment. These must be valid programs for the equipment chosen. |
| addonParts               | array   | Peripherals that can be added to the equipment                                                         |

## GET Templates_GetEquipmentPrograms

Applications to be downloaded to the equipment

### Resource URL[
https://api-cert.sagepayments.com/merchant/v1/templates/equipmentprograms

#### Query Parameters

| Name                    | Values | Description                                        |
|-------------------------|--------|----------------------------------------------------|
| partId (required)       |        |                                                    |

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name     | Type    | Description |
|----------|---------|-------------|
| id       | integer |             |
| program  | string  |             |
| features | array   |             |

## GET Templates_GetFanfTypes

Visa Fixed Acquirer Network Fee types

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/fanftypes

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name      | Type    | Description                                                                                        |
|-----------|---------|----------------------------------------------------------------------------------------------------|
| id        | integer | The item's system ID. Use this ID to reference the item when posting to the /Applications endpoint |
| title     | string  | The item's display name                                                                            |
| isDefault | boolean | A value used by SPS systems to control the item's display in UIs                                   |
| canEdit   | boolean | A value used by SPS systems to control the item's display in UIs                                   |

## GET Templates_GetFees

Startup and monthly fees that can be charged to the merchant, grouped by product. Merchants can be charged only fees that belong to the products for which they are applying.

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/fees


### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name    | Type   | Description                                   |
|---------|--------|-----------------------------------------------|
| product | string |                                               |
| fees    | array  | The list of fees associated with this product |

## GET Templates_GetLeadSources

Source that could have provided merchant account referral

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/leadsources

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name      | Type    | Description                                                                                        |
|-----------|---------|----------------------------------------------------------------------------------------------------|
| id        | integer | The item's system ID. Use this ID to reference the item when posting to the /Applications endpoint |
| title     | string  | The item's display name                                                                            |
| isDefault | boolean | A value used by SPS systems to control the item's display in UIs                                   |
| canEdit   | boolean | A value used by SPS systems to control the item's display in UIs                                   |

## GET Templates_GetPinDebitInterchangeTypes

The interchange type for PIN Debit transactions

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/pindebitinterchangetypes

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name           | Type    | Description                 |
|----------------|---------|-----------------------------|
| id        | integer | The item's system ID. Use this ID to reference the item when posting to the /Applications endpoint |
| title     | string  | The item's display name                                                                            |
| isDefault | boolean | A value used by SPS systems to control the item's display in UIs                                   |
| canEdit   | boolean | A value used by SPS systems to control the item's display in UIs                                   |

## GET Templates_GetProducts

Products and services available to the merchant

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/products

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name      | Type    | Description                                                                                        |
|-----------|---------|----------------------------------------------------------------------------------------------------|
| services  | array   | Additional services that can be added                                                              |
| id        | integer | The item's system ID. Use this ID to reference the item when posting to the /Applications endpoint |
| title     | string  | The item's display name                                                                            |
| isDefault | boolean | A value used by SPS systems to control the item's display in UIs                                   |
| canEdit   | boolean | A value used by SPS systems to control the item's display in UIs                                   |

## GET Templates_GetRefarralGroups

Approved referral companies specific to this office

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/referralgroups

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name           | Type    | Description                 |
|----------------|---------|-----------------------------|
| id        | integer | The item's system ID. Use this ID to reference the item when posting to the /Applications endpoint |
| title     | string  | The item's display name                                                                            |
| isDefault | boolean | A value used by SPS systems to control the item's display in UIs                                   |
| canEdit   | boolean | A value used by SPS systems to control the item's display in UIs                                   |

## GET Templates_GetSettlementsTypes

Backend settlement platform

### Resource URL
https://api-cert.sagepayments.com/merchant/v1/templates/settlementtypes

### Request Body


```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name           | Type    | Description                 |
|----------------|---------|-----------------------------|
| id        | integer | The item's system ID. Use this ID to reference the item when posting to the /Applications endpoint |
| title     | string  | The item's display name                                                                            |
| isDefault | boolean | A value used by SPS systems to control the item's display in UIs                                   |
| canEdit   | boolean | A value used by SPS systems to control the item's display in UIs                                   |
