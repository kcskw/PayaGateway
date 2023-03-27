## Header Parameters

In order to authenticate an API request, there needs to be authentication data sent along with the request. Authentication data consists of the these pieces of information:

+ **clientId** - Application identifier also known as API Key. 
+ **merchantId** - Merchant ID provided by Paya to the Merchant.
+ **merchantKey** - Merchant Site ID provided by Paya to the Merchant.
+ **nounce** - Secure random number used only once.
+ **timestamp** - Epoch time stamp.
+ 
+ **Authorization** - Authorization token, HMAC value of:  verb + url + body +merchantId + nonce + timestamp
+ **Content-Type** - Valid values are "application/json"
