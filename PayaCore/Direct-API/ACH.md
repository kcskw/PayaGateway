# ACH

## GET get_ping

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/ping

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name        | Type   | Description                                            |
|-------------|--------|--------------------------------------------------------|
| environment | string |                                                        |
| apiproxy    | string | The name of the API Proxy                              |
| client      | string | The IP address of the client calling the API           |
| time        | string | The time when the request was processed                |
| latency     | string | The total response time to process the API request     |
| message     | string | Message from the endpoint, gaurenteed to be "PONG"     |
| merchantId  | string | The Merchant Identifier provided in the request header |


## GET get_status

Used to retrieve basic server/environment information about the front- and back-end APIs.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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


## GET get_charges

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/charges

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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


## POST post_charges



### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

| Name           | Type   | Description                                                                                     |
|----------------|--------|-------------------------------------------------------------------------------------------------|

## GET get_charges_detail



### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## DELETE delete_charges

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## GET get_credits

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## POST post_credits

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## GET get_credits_detail

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## POST post_credits_reference

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## DELETE delete_credits

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## GET get_transactions

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## GET get_transactions_detail

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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


## GET get_batches

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## GET get_batches_current

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## GET get_batches_current_summary

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## GET get_batches_totals

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## GET get_batches_reference

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## GET get_batches_reference_summary

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## POST post-tokens

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## PUT put-token

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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

## DELETE delete-token

Used to retrieve basic server/environment information about the front-end API.

### Resource URL
https://api-cert.sagepayments.com/ach/v1/status

### Request Body

```JSON
{
    // Empty Payload - Nothing needed here
}
```

### Response

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