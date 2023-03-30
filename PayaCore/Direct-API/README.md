# Paya Core Direct-API

The Paya Core Direct API provides a full suite of products and services. Developers looking to own their own UI/UX and PCI requirements would want to leverage this robust feature set. Complete with Healthcare, Level III, Retail, and Ecommerce processing, this API provides it all!

**This integration method requires PCI validation, which you can read more about HERE.**

Please register with our developer portal, https://developer.sagepayments.com/, to obtain your credentials and the API Documentation.
If you have any questions please feel free to reach out to our team at sdksupport@paya.com.


## Header Parameters

In order to authenticate an API request, there needs to be authentication data sent along with the request. Authentication data consists of the these pieces of information:

+ **clientId** - Application identifier also known as API Key. 
+ **merchantId** - Merchant ID provided by Paya to the Merchant.
+ **merchantKey** - Merchant Site ID provided by Paya to the Merchant.
+ **nounce** - Secure random number used only once.
+ **timestamp** - Epoch time stamp.

+ **Authorization** - Authorization token, HMAC value of:  verb + url + body +merchantId + nonce + timestamp
+ **Content-Type** - Valid values are "application/json"

## Documentation

The following documentation is available:

+ [Account Updater](https://github.com/TKESuperDave/PayaGateway/blob/master/PayaCore/Direct-API/Account%20Updater.md)
+ [ACH](https://github.com/TKESuperDave/PayaGateway/blob/master/PayaCore/Direct-API/ACH.md)
  + API Health
  + Charges
  + Credits
  + Reporting on Transactions
  + Settlements and Batches
  + Settlements, Summary, and Batches
  + Tokens
+ [Application](https://github.com/TKESuperDave/PayaGateway/blob/master/PayaCore/Direct-API/Application.md)
  + Applications
  + Templates
+ [Application OAuth](https://github.com/TKESuperDave/PayaGateway/blob/master/PayaCore/Direct-API/Application%20OAuth.md)
  + Tokens
+ [Bankcard](https://github.com/TKESuperDave/PayaGateway/blob/master/PayaCore/Direct-API/BankCard.md)
  + Bankcard Ecommerce/MOTO
  + Bankcard Healthcare
  + Bankcard Retail
  + Bankcard Level III
+ [Token](https://github.com/TKESuperDave/PayaGateway/blob/master/PayaCore/Direct-API/Token.md)
