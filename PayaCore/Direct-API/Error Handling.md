## Error Handling


```
{
    "code": "<error code>",
    "message": "<error message>",
    "info": "<url to error page>",
    "detail": "<error details>",
}
```




| Error code | Error Description                                                                                                    |
|------------|----------------------------------------------------------------------------------------------------------------------|
| 000000     | Internal Server Error                                                                                                |
| 100000     | Service is currently not available                                                                                   |
| 100001     | One or more required headers are missing                                                                             |
| 100002     | One or more required query parameters are missing                                                                    |
| 100003     | Invalid HMAC                                                                                                         |
| 100004     | Rate limit exceeded                                                                                                  |
| 100005     | Missing or invalid Application Identifier                                                                            |
| 100006     | Resource not found                                                                                                   |
| 100007     | Invalid message request format                                                                                       |
| 100008     | Invalid message request content                                                                                      |
| 100009     | Request parameter threat detected                                                                                    |
| 100010     | Request content threat detected                                                                                      |
| 100011     | Internal script execution error                                                                                      |
| 100012     | Service Callout policy execution error                                                                               |
| 400000     | There was a problem with the request. Please see 'detail' for more.                                                  |
| 650102     | The AVS result was not an exact match and the transaction was VOIDed                                                 |
| 650103     | The AVS result was [???] and the transaction was VOIDed                                                              |
| 650104     | The CVV result was [???] and the transaction was VOIDed                                                              |
| 711711     | Please log into the Virtual Terminal to review your transaction history to determine the status of this transaction. |
| 800000     | There was a problem processing the request. Please see 'detail' for more.                                            |
| 900000     | Order number value is in an invalid format                                                                           |
| 900001     | Name value is in an invalid format or was left blank                                                                 |
| 900002     | Address value is in an invalid format or was left blank                                                              |
| 900003     | City value is in an invalid format or was left blank                                                                 |
| 900004     | State value is in an invalid format or was left blank                                                                |
| 900005     | Zip code value is in an invalid format or was left blank                                                             |
| 900006     | Country value is in an invalid format or was left blank                                                              |
| 900007     | Telephone value is in an invalid format or was left blank                                                            |
| 900008     | Fax value is in an invalid format or was left blank                                                                  |
| 900009     | Email value is in an invalid format or was left blank                                                                |
| 900010     | Shipping address name value is in an invalid format                                                                  |
| 900011     | Shipping Address value is in an invalid format                                                                       |
| 900012     | Shipping city value is in an invalid format                                                                          |
| 900013     | Shipping state value is in an invalid format                                                                         |
| 900014     | Shipping zip code value is in an invalid format                                                                      |
| 900015     | Shipping country value is in an invalid format                                                                       |
| 900016     | Credit card number value is in an invalid format                                                                     |
| 900017     | Expiration date value is in an invalid format                                                                        |
| 900018     | CVV (card verification value) value is in an invalid format or was left blank (if set to required)                   |
| 900019     | Grand Total must equal > $0.00. Please check subtotal, shipping and tax values.                                      |
| 900020     | Transaction Code value is in an invalid format or was left blank                                                     |
| 900021     | Authorization code is in an invalid format or was left blank (required for Force transactions)                       |
| 900022     | Reference value is in an invalid format or was left blank (Required for Force or Void by Reference)                  |
| 900023     | Track Data value is in an invalid format or was left blank (required for debit and retail transactions)              |
| 900024     | Tracking number value is in an invalid format                                                                        |
| 900025     | Customer number value is in an invalid format (used only for PCLIII transactions)                                    |
| 900026     | Shipping company value is in an invalid format                                                                       |
| 900027     | Recurring value is in an invalid format (must be = 0 or 1)                                                           |
| 900028     | Recurring value is in an invalid format                                                                              |
| 900029     | Recurring interval value is in an invalid format (must be numeric)                                                   |
| 900030     | Recurring indefinite value is in an invalid format or was left blank                                                 |
| 900031     | Recurring times to process value is in an invalid format (must be numeric)                                           |
| 900032     | Recurring non business days value is in an invalid format                                                            |
| 900033     | Recurring Group was left blank or group not found                                                                    |
| 900034     | Recurring start date value is in an invalid format or was left blank                                                 |
| 900035     | Pin number entered is incorrect (required for Pin-debit transactions)                                                |
| 910000     | The transaction you are trying to submit is not allowed.                                                             |
| 910001     | Visa card type transactions are not allowed.                                                                         |
| 910002     | MasterCard card type transactions are not allowed.                                                                   |
| 910003     | American Express card type transactions are not allowed.                                                             |
| 910004     | Discover card type transactions are not allowed.                                                                     |
| 910005     | [???] transactions are not allowed.                                                                                  |
| 911911     | M_id or M_key incorrect, XML Web Services not enabled in VT, or Post request is not at least 128-bit encrypted.      |
| 920000     | Item not found.                                                                                                      |
| 920001     | No corresponding sale found within last 6 months, credit couldn’t be issued.                                         |
| 920002     | Address Verification Service failure.                                                                                |
| 920050     | A debit transaction can not be voided.                                                                               |
| 920051     | The operation requested is no supported on the gateway.                                                              |
| 999999     | Please log into the Virtual Terminal to review your transaction history to determine the status of this transaction. |
