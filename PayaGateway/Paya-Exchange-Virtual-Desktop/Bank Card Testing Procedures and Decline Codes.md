# Bank Card Gateway
## Testing and Decline Codes

### Table of Contents
1. [Bank Card Testing Services](Bank%20Card%20Testing%20Procedures%20and%20Decline%20Codes.md#bank-card-testing-services)	
   - [Purchasing Card Level III Testing Services](Bank%20Card%20Testing%20Procedures%20and%20Decline%20Codes.md#purchase-card-level-iii-testing-services)
   - [Healthcare FSA/HAS Testing Services](Bank%20Card%20Testing%20Procedures%20and%20Decline%20Codes.md#healthcare-fsahas-testing-services)
2. [Healthcare FSA Testing Service (Partial Approval)](Bank%20Card%20Testing%20Procedures%20and%20Decline%20Codes.md#healthcare-fsa-testing-services-partial-approval)
3. [Decline Codes](Bank%20Card%20Testing%20Procedures%20and%20Decline%20Codes.md#decline-codes)


## Bank Card Testing Services

An account placed in test mode will respond to a specific group of MOD10- compliant test card numbers provided that the card type being processed is enabled in the test account profile: (ie: Amex enabled, Visa enabled, MasterCard enabled, and Discover enabled).

| Card       | Number           |
|------------|------------------|
| Visa       | 4111111111111111 |
| MasterCard | 5499700000000057 |
| Discover   | 6011000993026909 |
| Amex       | 371449635392376  |


### Purchase Card Level III Testing Services

| Card       | Number           |
|------------|------------------|
| Visa       | 4128123412341231 |
| MasterCard | 5499700000000065 |

### Healthcare FSA/HAS Testing Services

| Card       | Number                    |
|------------|---------------------------|
| Visa       | 4662060000000005          |
| MasterCard | 5114919999999991          |
| Visa Debit | 4017779999999011 PIN 1234 |
| MC Debit   | 5149612222222229 PIN 1234 |


For developers who want to generate specific response codes, AVS responses, and CVV2 Responses for application specific testing, the transaction amount can be use to generate specific response messages as detailed in the table below:

| Amount | Response      Indicator | Response Code | AVS Response      Code | CVV/CVV2      Response Code | Response      Message |
|--------|-------------------------|---------------|------------------------|-----------------------------|-----------------------|
| $1.00  | A                       | 1             | “”                     | M                           | APPROVED              |
| $2.00  | E                       | 2             | “”                     | N                           | DECLINED              |
| $3.00  | A                       | 3             | “”                     | P                           | APPROVED              |
| $4.00  | E                       | 4             | “”                     | S                           | DECLINED              |
| $5.00  | E                       | 5             | “”                     | U                           | DECLINED              |
| $6.00  | A                       | 6             | X                      | P                           | APPROVED              |
| $7.00  | A                       | 7             | Y                      | P                           | APPROVED              |
| $8.00  | A                       | 8             | A                      | P                           | APPROVED              |
| $9.00  | A                       | 9             | Z                      | P                           | APPROVED              |
| $10.00 | A                       | 10            | N                      | P                           | APPROVED              |
| $16.00 | X                       | 999999        | “”                     | P                           | UNABLE TO PROCESS     |

## Healthcare FSA Testing Services (Partial Approval)

| Amount | Response      Indicator | Response      Code | AVS      Response      Code | CVV/CVV2      Response      Code | Response      Message | Partial      Approval      Amount |
|--------|-------------------------|--------------------|-----------------------------|----------------------------------|-----------------------|-----------------------------------|
| 130.50 | A                       | 11                 | “”                          | N/A                              | APPROVED              | 70.00                             |
| 70.00  | A                       | 12                 | “”                          | N/A                              | APPROVED              | 60.50                             |
| 60.50  | A                       | 13                 | “”                          | N/A                              | APPROVED              | 32.60                             |
| 27.90  | A                       | 14                 | “”                          | N/A                              | APPROVED              | 13.40                             |

## Decline Codes

| Code   | Error                   | Description                                                                                                                                                                                       |
|--------|-------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| 000000 | INTERNAL SERVER   ERROR | Server   Error, Please contact Paya for assistance or more      information                                                                                                                       |
| 711711 | ERROR REVIEW REPORTING  | Please log into the Virtual Terminal to review your transaction history to determine the status of this transaction.  If you need assistance, please contact Technical Support at 877-470-4001 |
| 900000 | INVALID   T_ORDERNUM    | Order   number value is in an invalid format                                                                                                                                                      |
| 900001 | INVALID C_NAME          | Name value is in an invalid format or   was left blank                                                                                                                                            |
| 900002 | INVALID   C_ADDRESS     | Address   value is in an invalid format or was left blank                                                                                                                                         |
| 900003 | INVALID C_CITY          | City value is in an invalid format or   was left blank                                                                                                                                            |
| 900004 | INVALID C_STATE         | State   value is in an invalid format or was left blank                                                                                                                                           |
| 900005 | INVALID C_ZIP           | Zip code value is in an invalid format   or was left blank                                                                                                                                        |
| 900006 | INVALID   C_COUNTRY     | Country   value is in an invalid format or was left blank                                                                                                                                         |
| 900007 | INVALID C_TELEPHONE     | Telephone value is in an invalid format   or was left blank                                                                                                                                       |
| 900008 | INVALID C_FAX           | Fax   value is in an invalid format or was left blank                                                                                                                                             |
| 900009 | INVALID C_EMAIL         | Email value is in an invalid format or   was left blank                                                                                                                                           |
| 900010 | INVALID   C_SHIP_NAME   | Shipping   address name value is in an invalid format                                                                                                                                             |
| 900011 | INVALID_C_SHIP_ADDRESS  | Shipping Address value is in an invalid   format                                                                                                                                                  |
| 900012 | INVALID_C_SHIP_CITY     | Shipping   city value is in an invalid format                                                                                                                                                     |
| 900013 | INVALID_C_SHIP_STATE    | Shipping state value is in an invalid   format                                                                                                                                                    |
| 900014 | INVALID_C_SHIP_ZIP      | Shipping   zip code value is in an invalid format                                                                                                                                                 |
| 900015 | INVALID_C_SHIP_COUNTRY  | Shipping country value is in an invalid   format                                                                                                                                                  |
| 900016 | INVALID_C_CARDNUMBER    | Credit   card number value is in an invalid format                                                                                                                                                |
| 900017 | INVALID_C_EXP           | Expiration date value is in an invalid   format                                                                                                                                                   |
| 900018 | INVALID_C_CVV           | CVV   (card verification value) value is in an invalid format or was left blank (if   set to required)                                                                                            |
| 900019 | INVALID_T_AMT           | Grand Total must equal > $0.00.   Please check subtotal, shipping and tax values.                                                                                                                 |
| 900020 | INVALID_T_CODE          | Transaction   Code value is in an invalid format or was left blank                                                                                                                                |
| 900021 | INVALID_T_AUTH          | Authorization code is in an invalid   format or was left blank (required for Force Transaction)                                                                                                   |
| 900022 | INVALID_T_REFERENCE     | Reference   value is in an invalid format or was left blank (Required for Force or Void   by Reference)                                                                                           |
| 901000 | GATEWAY ERROR CODE      | General validation error. The error   message will contain additional information.                                                                                                                |
| 650102 | AVS FAILURE – N         | The   AVS result was a no match and the transaction was Voided                                                                                                                                    |
| 650103 | AVS FAILURE – YX        | The AVS result was not an exact match   and the      transaction was Voided                                                                                                                       |
| 650103 | AVS FAILURE –   AYXWZ   | The   ASV result was not a partial match and the      transaction was Voided                                                                                                                      |
| 650104 | CVV FAILURE – M         | The CVV result was not a exact match and   the transaction was Voided                                                                                                                             |
| 650104 | CVV FAILURE – N         | The   CVV result was a no match and the transaction was Voided                                                                                                                                    |
