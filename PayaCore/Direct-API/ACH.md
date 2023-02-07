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
