# Paya Exchange Virtural Desktop - Implementation and Integration Guide

1. [Overview](Implementation%20and%20Intergration%20Guide.md#overview)
2. [Integration Types](Implementation%20and%20Intergration%20Guide.md#integration-types)
    - [User Interface Integration](Implementation%20and%20Intergration%20Guide.md#user-interface-integration)
      - [URL](Implementation%20and%20Intergration%20Guide.md#url)
      - [Form Fields](Implementation%20and%20Intergration%20Guide.md#form-fields)
      - [HTML Sample]()
    - [Non-User Interface Integration]()
      - [URL]()
      - [Form Fields]()
      - [ASP Sample]()
3. [Response Handling]()
    - [Postback]()
      - [Form Fields]()
      - [ASP Sample]()
    - [Processing Interrupted Postback Messages]()
      - [Form Fields]()
      - [ASP Sample]()
    - [Polling]()
      - [ASP Vault Response Query Sample]()
      - [ASP Payment Response Query Sample]()
4. [User Interface Process Flow]()
5. [Non User Interface Process Flow]()


# Overview

The following represents implementations of the PEVD (Paya Exchange Virtual Desktop).  PEVD provides a web interface for non-Windows based applications, web based applications, and situations in which requirements prohibit the installation of Paya Exchange Desktop.

# Integration Types
## User Interface Integration

This type of integration is used when cardholder data needs to be collected/captured in a secure browser enviornment over SSL.

### URL
https://www.sageexchange.com/VirtualPaymentTerminal/frmPayment.aspx 

### Form Fields
|     Field   Name             |     Required       |     Definition                                                                                                                                                                             |
|------------------------------|--------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     Request                  |     Yes            |     XML data to be processed by the PEVD, when writing XML in a HTML Form Input element the data will need to be HTML encoded to allow the browser to render the HTML correctly.     |
|     Redirect_URL             |     No             |     The URL the PEVD redirects to after processing.                                                                                                                                        |
|     Consumer_Initiated       |     No             |     &lt;TRUE\|FALSE&gt;     Specifies the target audience for the rendering of the payment user interface.  This is used when integrating to a customer facing application.           |

### HTML Sample

```HTML
<html> 
    <head> 
        <title>VPT Sample</title> 
    </head> 
    <body> 
 	    <form action="https://www.sageexchange.com/VirtualPaymentTerminal/frmPayment.aspx" method="POST" target="_blank"> 
 	 	    <input type="hidden" name="request" value="&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-16&quot;?&gt; 
                &lt;Request_v1 xmlns:xsi=&quot;http://www.w3.org/2001/XMLSchema-instance&quot; xmlns:xsd=&quot;http://www.w3.org/2001/XMLSchema&quot;&gt; 
                    &lt;Application&gt; 
                        &lt;ApplicationID&gt;DEMO&lt;/ApplicationID&gt; 
                        &lt;LanguageID&gt;EN&lt;/LanguageID&gt; 
                    &lt;/Application&gt; 
                    &lt;Payments&gt; 
                        &lt;PaymentType&gt; 
                            &lt;Merchant&gt; 
                                &lt;MerchantID&gt;999999999997&lt;/MerchantID&gt; 
                                &lt;MerchantKey&gt;K3QD6YWyhfD&lt;/MerchantKey&gt; 
                            &lt;/Merchant&gt; 
                            &lt;TransactionBase&gt; 
                                &lt;TransactionID&gt;d71c8ea0-3d17-46ab-ac09-a5460cefdc9e&lt;/TransactionID&gt; 
                                &lt;TransactionType&gt;11&lt;/TransactionType&gt; 
                                &lt;Reference1&gt;PO 123456&lt;/Reference1&gt; 
                                &lt;Amount&gt;19.99&lt;/Amount&gt; 
                            &lt;/TransactionBase&gt; 
                            &lt;Customer&gt; 
                                &lt;Name&gt; 
                                    &lt;FirstName&gt;John&lt;/FirstName&gt; 
                                    &lt;MI&gt;A&lt;/MI&gt; 
                                    &lt;LastName&gt;Doe&lt;/LastName&gt; 
                                &lt;/Name&gt; 
                                &lt;Address&gt; 
                                    &lt;AddressLine1&gt;12345 Street&lt;/AddressLine1&gt; 
                                    &lt;AddressLine2&gt;Apt #2&lt;/AddressLine2&gt; 
                                    &lt;City&gt;Some City&lt;/City&gt; 
                                    &lt;State&gt;Some State&lt;/State&gt; 
                                    &lt;ZipCode&gt;12345&lt;/ZipCode&gt; 
                                    &lt;Country&gt;Some Country&lt;/Country&gt; 
                                    &lt;EmailAddress&gt;john.doe@domain.com&lt;/EmailAddress&gt; 
                                    &lt;Telephone&gt;1234567891&lt;/Telephone&gt; 
                                    &lt;Fax&gt;1234567890&lt;/Fax&gt; 
                                &lt;/Address&gt; 
                                &lt;Company&gt; 
                                    &lt;Name&gt;John's Company&lt;/Name&gt; 
                                    &lt;Address&gt; 
                                        &lt;AddressLine1&gt;12345 Street&lt;/AddressLine1&gt; 
                                        &lt;AddressLine2&gt;Apt #2&lt;/AddressLine2&gt; 
                                        &lt;City&gt;Some City&lt;/City&gt; 
                                        &lt;State&gt;Some State&lt;/State&gt; 
                                        &lt;ZipCode&gt;12345&lt;/ZipCode&gt; 
                                        &lt;Country&gt;Some Country&lt;/Country&gt; 
                                        &lt;EmailAddress&gt;john.doe@domain.com&lt;/EmailAddress&gt; 
                                        &lt;Telephone&gt;1234567891&lt;/Telephone&gt; 
                                        &lt;Fax&gt;1234567890&lt;/Fax&gt; 
                                    &lt;/Address&gt; 
                                &lt;/Company&gt; 
                            &lt;/Customer&gt; 
                            &lt;ShippingRecipient&gt; 
                            &lt;Name&gt; 
                                &lt;FirstName&gt;John&lt;/FirstName&gt; 
                                &lt;MI&gt;A&lt;/MI&gt; 
                                &lt;LastName&gt;Doe&lt;/LastName&gt; 
                            &lt;/Name&gt; 
                            &lt;Address&gt; 
                                &lt;AddressLine1&gt;12345 Street&lt;/AddressLine1&gt; 
                                &lt;AddressLine2&gt;Apt #2&lt;/AddressLine2&gt; 
                                &lt;City&gt;Some City&lt;/City&gt; 
                                &lt;State&gt;Some State&lt;/State&gt; 
                                &lt;ZipCode&gt;12345&lt;/ZipCode&gt; 
                                &lt;Country&gt;Some Country&lt;/Country&gt; 
                                &lt;EmailAddress&gt;john.doe@domain.com&lt;/EmailAddress&gt; 
                                &lt;Telephone&gt;1234567891&lt;/Telephone&gt; 
                                &lt;Fax&gt;1234567890&lt;/Fax&gt; 
                            &lt;/Address&gt; 
                            &lt;Company&gt; 
                                &lt;Name&gt;John's Company&lt;/Name&gt; 
                                &lt;Address&gt; 
                                    &lt;AddressLine1&gt;12345 Street&lt;/AddressLine1&gt; 
                                    &lt;AddressLine2&gt;Apt #2&lt;/AddressLine2&gt; 
                                    &lt;City&gt;Some City&lt;/City&gt; 
                                    &lt;State&gt;Some State&lt;/State&gt; 
                                    &lt;ZipCode&gt;12345&lt;/ZipCode&gt; 
                                    &lt;Country&gt;Some Country&lt;/Country&gt; 
                                    &lt;EmailAddress&gt;john.doe@domain.com&lt;/EmailAddress&gt; 
                                    &lt;Telephone&gt;1234567891&lt;/Telephone&gt; 
                                    &lt;Fax&gt;1234567890&lt;/Fax&gt; 
                                &lt;/Address&gt; 
                            &lt;/Company&gt; 
                        &lt;/ShippingRecipient&gt; 
                        &lt;Postback&gt; 
                            &lt;HttpsUrl&gt;https://www.mywebsite.com/responsehandler.asp&lt;/HttpsUrl&gt; 
                        &lt;/Postback&gt; 
                    &lt;/PaymentType&gt; 
                &lt;/Payments&gt; 
            &lt;/Request_v1&gt;" /> 
	 	 	<input type="hidden" name="redirect_url" value="http://www.mywebsite.com/finished.asp" /> 
            <input type="hidden" name="consumer_initiated" value="False" /> 
	 	 	<input type="submit" value="Process Payment" /> 
	 	</form> 
    </body> 
</html> 
```

## Non-User Interface Integration

This type of integration is used no cardholder or additional processing data needs to be collected/captured and a direct client to server communication is desired.

### URL

https://www.sageexchange.com/VirtualPaymentTerminal/frmPayment.aspx

### Form Fields

|     Field   Name     |     Required       |     Definition                                                                                                                                                                             |
|----------------------|--------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     Request          |     Yes            |     XML data to be processed by the PEVD, when writing XML in a HTML Form Input element the data will need to be HTML encoded to allow the browser to render the HTML correctly.|

### ASP Sample

```ASP 
 <%	
    dim xmlReq 
 	
    xmlReq = "<?xml version=""1.0"" encoding=""utf-16""?>" 
    xmlReq = xmlReq & "<Request_v1 xmlns:xsi=""http://www.w3.org/2001/XMLSchemainstance"" " 
    xmlReq = xmlReq & "xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"         
    xmlReq = xmlReq & "  <Application>" 
    xmlReq = xmlReq & "    <ApplicationID>DEMO</ApplicationID>"         
    xmlReq = xmlReq & "    <LanguageID>EN</LanguageID>"         
    xmlReq = xmlReq & "  </Application>"         
    xmlReq = xmlReq & "  <Payments>"         
    xmlReq = xmlReq & "    <PaymentType>"         
    xmlReq = xmlReq & "      <Merchant>"         
    xmlReq = xmlReq & "        <MerchantID>999999999997</MerchantID>"         
    xmlReq = xmlReq & "        <MerchantKey>K3QD6YWyhfD</MerchantKey>"         
    xmlReq = xmlReq & "      </Merchant>"         
    xmlReq = xmlReq & "      <TransactionBase>" 
    xmlReq = xmlReq & "        <TransactionID>C1F011EA-56BC-49b4-8A33-85C32451D573</TransactionID>"         
    xmlReq = xmlReq & "        <TransactionType>11</TransactionType>"         
    xmlReq = xmlReq & "        <Reference1>PO 123456</Reference1>"         
    xmlReq = xmlReq & "        <Amount>19.99</Amount>"         
    xmlReq = xmlReq & "      </TransactionBase>"         
    xmlReq = xmlReq & "      <Customer>"         
    xmlReq = xmlReq & "        <Name>" 
    xmlReq = xmlReq & "          <FirstName>John</FirstName>"         
    xmlReq = xmlReq & "          <MI>A</MI>" 
    xmlReq = xmlReq & "          <LastName>Doe</LastName>"         
    xmlReq = xmlReq & "        </Name>"         
    xmlReq = xmlReq & "        <Address>" 
    xmlReq = xmlReq & "          <AddressLine1>12345 Street</AddressLine1>"         
    xmlReq = xmlReq & "          <AddressLine2>Apt #2</AddressLine2>"         
    xmlReq = xmlReq & "          <City>Some City</City>"         
    xmlReq = xmlReq & "          <State>Some State</State>"         
    xmlReq = xmlReq & "          <ZipCode>12345</ZipCode>"         
    xmlReq = xmlReq & "          <Country>Some Country</Country>" 
    xmlReq = xmlReq & "          <EmailAddress>john.doe@domain.com</EmailAddress>"         
    xmlReq = xmlReq & "          <Telephone>1234567891</Telephone>"         
    xmlReq = xmlReq & "          <Fax>1234567890</Fax>"         
    xmlReq = xmlReq & "        </Address>"         
    xmlReq = xmlReq & "        <Company>" 
    xmlReq = xmlReq & "          <Name>John's Company</Name>"         
    xmlReq = xmlReq & "          <Address>" 
    xmlReq = xmlReq & "            <AddressLine1>12345 Street</AddressLine1>" 
    xmlReq = xmlReq & "            <AddressLine2>Apt #2</AddressLine2>"         
    xmlReq = xmlReq & "            <City>Some City</City>"         
    xmlReq = xmlReq & "            <State>Some State</State>"         
    xmlReq = xmlReq & "            <ZipCode>12345</ZipCode>"         
    xmlReq = xmlReq & "            <Country>Some Country</Country>" 
    xmlReq = xmlReq & "            <EmailAddress>john.doe@domain.com</EmailAddress>"         
    xmlReq = xmlReq & "            <Telephone>1234567891</Telephone>"         
    xmlReq = xmlReq & "            <Fax>1234567890</Fax>"         
    xmlReq = xmlReq & "          </Address>"         
    xmlReq = xmlReq & "        </Company>"         
    xmlReq = xmlReq & "      </Customer>"         
    xmlReq = xmlReq & "      <ShippingRecipient>"         
    xmlReq = xmlReq & "        <Name>" 
    xmlReq = xmlReq & "          <FirstName>John</FirstName>"         
    xmlReq = xmlReq & "          <MI>A</MI>" 
    xmlReq = xmlReq & "          <LastName>Doe</LastName>"         
    xmlReq = xmlReq & "        </Name>"         
    xmlReq = xmlReq & "        <Address>"         
    xmlReq = xmlReq & "          <AddressLine1>12345 Street</AddressLine1>"         
    xmlReq = xmlReq & "          <AddressLine2>Apt #2</AddressLine2>"         
    xmlReq = xmlReq & "          <City>Some City</City>"         
    xmlReq = xmlReq & "          <State>Some State</State>"         
    xmlReq = xmlReq & "          <ZipCode>12345</ZipCode>"         
    xmlReq = xmlReq & "          <Country>Some Country</Country>" 
    xmlReq = xmlReq & "          <EmailAddress>john.doe@domain.com</EmailAddress>"         
    xmlReq = xmlReq & "          <Telephone>1234567891</Telephone>"         
    xmlReq = xmlReq & "          <Fax>1234567890</Fax>"         
    xmlReq = xmlReq & "        </Address>"         
    xmlReq = xmlReq & "        <Company>" 
    xmlReq = xmlReq & "          <Name>John's Company</Name>"         
    xmlReq = xmlReq & "          <Address>" 
    xmlReq = xmlReq & "            <AddressLine1>12345 Street</AddressLine1>"         
    xmlReq = xmlReq & "            <AddressLine2>Apt #2</AddressLine2>"         
    xmlReq = xmlReq & "            <City>Some City</City>"         
    xmlReq = xmlReq & "            <State>Some State</State>"         
    xmlReq = xmlReq & "            <ZipCode>12345</ZipCode>"         
    xmlReq = xmlReq & "            <Country>Some Country</Country>" 
    xmlReq = xmlReq & "            <EmailAddress>john.doe@domain.com</EmailAddress>"         
    xmlReq = xmlReq & "            <Telephone>1234567891</Telephone>"         
    xmlReq = xmlReq & "            <Fax>1234567890</Fax>"         
    xmlReq = xmlReq & "          </Address>"         
    xmlReq = xmlReq & "        </Company>"         
    xmlReq = xmlReq & "      </ShippingRecipient>"         
    xmlReq = xmlReq & "      <VaultStorage>" 
    xmlReq = xmlReq & "        <GUID>ba45c5f33b414df3a679e375dc834548</GUID>"         
    xmlReq = xmlReq & "        <Service>RETRIEVE</Service>"         
    xmlReq = xmlReq & "      </VaultStorage>"         
    xmlReq = xmlReq & "      <Postback>"         
    xmlReq = xmlReq & "        <HttpsUrl>https://www.mywebsite.com/responsehandler.asp</HttpsUrl>"         
    xmlReq = xmlReq & "      </Postback>"         
    xmlReq = xmlReq & "    </PaymentType>"        
    xmlReq = xmlReq & "  </Payments>"        
    xmlReq = xmlReq & "</Request_v1>"
    
dim statusCode dim xmlResp dim formData 
 	 
formData = "request=" & Server.UrlEncode( xmlReq )  
Set msxml = Server.CreateObject( "MSXML2.ServerXMLHTTP" ) 
msxml.Open "POST", "https://www.sageexchange.com/VirtualPaymentTerminal/frmPayment.aspx", False msxml.setRequestHeader "Content-Type", "application/x-www-form-urlencoded" msxml.send( formData ) 
 
statusCode = msxml.Status if statusCode <> 200 then 
    ' handler error 
end if 
 	 
xmlResp = msxml.responseText 
set msxml = nothing 
 	 
%> 
```

# Response Handling

## Postback

The Postback is a mechanism used to receive response XML data from the PEVD.  The response handler can be any user defined URL but is required to be hosted on a server with a valid SSL certificate.  The URL is defined in the schema element Request_v1.PostbackType and it value is submitted in the request XML data element Request_v1.Postback.HttpsUrl for both Vault and Payment requests or in the case of multiple payments where each payment needs its own URL Request_v1.Payments[X].Postback.HttpsUrl.  The response handler should be designed to receive form encoded data and process the data timely. 

### Form Fields

|     Field   Name     |     Definition                                                                                                                                                                                                                                                             |
|----------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|     Response         |   XML response data to be processed by the calling application.  This XML can be one of the following types depending on where you supplied the Postback URL in the request message:            Response_v1              Response_v1.PaymentResponseType             |

### ASP Sample

```ASP
<%   
' postback url submitted was https://www.myserver.com/handler.asp?myid=12345 
 dim myid = Request("myid") dim xml = Request("response") 
 
%> 
```

## Processing Interrupted Postback Messages

In the event the end user cancels, closes the browser, or allows the form entry to expire/timeout. The system will post for encoded messages indicating the event.

### Form Fields

| Field Name         | Definition                                                              |
|--------------------|-------------------------------------------------------------------------|
| Status_Code        | A numerical indicator of the event type.  6 = User Canceled 7 = Timeout |
| Status_Description | A textual description of the event.                                     |

### ASP Sample

```ASP
<%  
 
dim status_code  
status_code = Request(“status_code”) 
 
dim status_desc  
status_desc = Request(“status_description”) 
 
dim xmlResp  
xmlResp = Request(“Response”)

if status_code <> “” then 
    ' process interrupt event 
end if  

if xmlResp <> “” then 
    ' process xml response 
end if 
 
%>
```

## Polling

In the event in which a PostBack is not recieved or cannot be implemented the XML response for a given Transaction or Vault operation can be querying the PEVD using a user defined TransactionID or VaultID associated with the original XML request. These queries are designed to have no user interface and be direct client to server communication.

### ASP Vault Response Query Sample
```ASP
<% 
    dim xmlReq 
 
    xmlReq = "<?xml version=""1.0"" encoding=""utf-16""?>" 
    xmlReq = xmlReq & "<Request_v1 xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" "        
    xmlReq = xmlReq & "xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"        
    xmlReq = xmlReq & "  <Application>" 
    xmlReq = xmlReq & "    <ApplicationID>DEMO</ApplicationID>"        
    xmlReq = xmlReq & "    <LanguageID>EN</LanguageID>"        
    xmlReq = xmlReq & "  </Application>"        
    xmlReq = xmlReq & "  <VaultStatusQuery>"        
    xmlReq = xmlReq & "    <Merchant>"        
    xmlReq = xmlReq & "      <MerchantID>999999999997</MerchantID>"        
    xmlReq = xmlReq & "      <MerchantKey>K3QD6YWyhfD</MerchantKey>"        
    xmlReq = xmlReq & "    </Merchant>" 
    xmlReq = xmlReq & "    <VaultID>MyID</VaultID>"        
    xmlReq = xmlReq & "  </VaultStatusQuery>"        
    xmlReq = xmlReq & "</Request_v1>"   
      
dim statusCode dim xmlResp 
dim formData 
 	 
formData = "request=" & Server.UrlEncode( xmlReq ) 

Set msxml = Server.CreateObject( "MSXML2.ServerXMLHTTP" ) 
msxml.Open "POST", "https://www.sageexchange.com/VirtualPaymentTerminal/frmPayment.aspx", False 
msxml.setRequestHeader "Content-Type", "application/x-www-form-urlencoded" 
msxml.send( formData ) 
 
statusCode = msxml.Status 
 	 
if statusCode <> 200 then  	
    ' handler error 
end if 
 	 
xmlResp = msxml.responseText 
set msxml = nothing 
 	 
%> 
```

### ASP Payment Response Query Sample

```ASP
<% 
    dim xmlReq 
 	 
    xmlReq = "<?xml version=""1.0"" encoding=""utf-16""?>" 
    xmlReq = xmlReq & "<Request_v1 xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"""         
    xmlReq = xmlReq & "xmlns:xsd=""http://www.w3.org/2001/XMLSchema"">"                 
    xmlReq = xmlReq & "<Application>"
    xmlReq = xmlReq & "<ApplicationID>DEMO</ApplicationID>"
    xmlReq = xmlReq & "<LanguageID>EN</LanguageID>"
    xmlReq = xmlReq & "</Application>"
    xmlReq = xmlReq & "<TransactionStatusQueries>"
    xmlReq = xmlReq & "<TransactionStatusQueryType>"
    xmlReq = xmlReq & "<Merchant>"
    xmlReq = xmlReq & "<MerchantID>999999999997</MerchantID>"
    xmlReq = xmlReq & "<MerchantKey>K3QD6YWyhfD</MerchantKey>"
    xmlReq = xmlReq & "</Merchant>"
    xmlReq = xmlReq & "<TransactionID>529ba335-d4bc-420f-887e-f1dc48d5b773</TransactionID>"
    xmlReq = xmlReq & "</TransactionStatusQueryType>"
    xmlReq = xmlReq & "</TransactionStatusQueries>"
    xmlReq = xmlReq & "</Request_v1>"   
      
dim statusCode 
dim xmlResp 
dim formData 
 	 
formData = "request=" & Server.UrlEncode( xmlReq )

Set msxml = Server.CreateObject( "MSXML2.ServerXMLHTTP" ) 
msxml.Open "POST", "https://www.sageexchange.com/VirtualPaymentTerminal/frmPayment.aspx", False 
msxml.setRequestHeader "Content-Type", "application/x-www-form-urlencoded" 
msxml.send( formData ) 
 
statusCode = msxml.Status 
 	 
if statusCode <> 200 then 
 	' handler error 
end if 
 	 
xmlResp = msxml.responseText 
set msxml = nothing 
 	 
%>
```

# User Interface Process Flow
![PEVD_User_Interface_Process_Flow](https://user-images.githubusercontent.com/6975101/184155452-43d4257d-385f-478c-a707-fa1f1500f360.jpg)

# Non User Interface Process Flow
![PEVD_Non-User_Interface_Process_Flow](https://user-images.githubusercontent.com/6975101/184155572-888b1ec7-798d-4acd-957a-37e22e93de10.jpg)

