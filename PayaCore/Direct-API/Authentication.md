## Header Parameters

In order to authenticate an API request, there needs to be authentication data sent along with the request. Authentication data consists of the these pieces of information:

**clientId** - Application identifier also known as API Key
**merchantId** - Merchant Identifier
**merchantKey** - Merchant Key
**nounce** - Secure random number used only once
**timestamp** - Epoch time stamp
**Authorization** - Authorization token, HMAC value of:  verb + url + body +merchantId + nonce + timestamp
**Content-Type** - Valid values are "application/json"

The user-id and user-api-key will be specific to each merchant account (location) that is connecting to the gateway. The developer-id is something that should be hard coded into your software. This is only for you to use and should be embedded in your software so that you shouldn't have to openly provide it to merchants/customers.


