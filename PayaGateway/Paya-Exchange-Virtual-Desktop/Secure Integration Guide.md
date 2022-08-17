# Paya Exchange Virtual Desktop (PEVD) - Secure Integration Guide
1. [Understanding Paya Exchange Virtual Desktop]()
    - [Using Paya Exchange Vitrual Desktop]()
2. [Implementing Encrypt Message]()
    - [URL]()
    - [Support HTTP VERBS]()
    - [Request message body]()
    - [Field definitions]()
    - [Response message body]()
    - [Field definitions]()
3. [PEVD Response HTML Form]()
    - [Field definitions]()
4. [PEVD Response]()
    - [Response message body]()
    - [Field definitions]()
5. [Implementing Decrypt Message]()
    - [URL]()
    - [Supported HTTP VERBS]()
    - [Request message body]()
    - [Field definitions]()
    - [Response message body]()

## Understanding Paya Exchange Virtual Desktop

Paya Exchange Virtual Desktop (PEVD) is a PA‐DSS (Payment Application – Data Security Standard) certified payment platform that integrates with any type of web‐based application. When a user initiates a credit card transaction, the application makes a seamless call to PEVD, where all aspects of processing the credit card occurs; including the transmission and storage of credit card data for applications that include these capabilities. The integrated application does not store, process, or transmit credit card data; therefore, does not require PA‐DSS certification.

### Using Paya Exchange Virtual Desktop

Below is a flowchart of the typical end user interaction and data flow for a payment request processed through a web site using PEVD; however, you can use any type of PEVD XML request (for example, authorization or credit). 

![PEVD_Flowchart](https://user-images.githubusercontent.com/6975101/184938744-a3c55641-87a5-49d4-81f8-79929887f363.png)


## Implementing Encrypt Message

Use this method to encrypt your PEVD XML message and to receive a PEVD envelope token. The envelope token is unique to every request processed with PEVD and is used to match the PEVD response received later. We recommend storing the token with your user state information. This allows you to look up the user state information using the PEVD response envelope token when you receive the response from PEVD. If you find a match, you can continue to process the results. To prevent replay issues, update your user state to indicate that the response has been received. 

### URL

Use the following link to access Paya Exchange Virtual Desktop: 
https://www.sageexchange.com/virtualpaymentterminal/frmenvelope.aspx 

### Supported HTTP VERBS

POST

### Request message body

The following is the request message body.

```
request=%3c%3fxml+version%3d%221.0%22+encoding%3d%22utf-
16%22%3f%3e%0d%0a%3cRequest_v1+xmlns%3axsi%3d%22http%3a%2f%2fwww.w3.org%2f2001%2fXMLSchemainstan
ce%22+xmlns%3axsd%3d%22http%3a%2f%2fwww.w3.org%2f2001%2fXMLSchema%22%3e%0d%0a%3cApplicatio 
n%3e%0d%0a%3cApplicationID%3eDEMO%3c%2fApplicationID%3e%0d%0a%3cLanguageID%3eEN%3c%2fLanguageID% 
3e%0d%0a%3c%2fApplication%3e%0d%0a%3cPayments%3e%0d%0a%3cPaymentType%3e%0d%0a%3cMerchant%3e%0d%0 
a%3cMerchantID%3e0000000000000%3c%2fMerchantID%3e%0d%0a%3cMerchantKey%3eA1A1A1A1A1A1%3c%2fMercha 
ntKey%3e%0d%0a%3c%2fMerchant%3e%0d%0a%3cTransactionBase%3e%0d%0a%3cTransactionID%3ed22f7bd8
3131-45f7-be8a-
631cae2ef6cc%3c%2fTransactionID%3e%0d%0a%3cTransactionType%3e11%3c%2fTransactionType%3e%0d%0a%3c
Reference1%3ePO+123456%3c%2fReference1%3e%0d%0a%3cAmount%3e19.99%3c%2fAmount%3e%0d%0a%3cCustomer 
Type%3eBusiness%3c%2fCustomerType%3e%0d%0a%3c%2fTransactionBase%3e%0d%0a%3cCustomer%3e%0d%0a%3cN 
ame%3e%0d%0a%3cFirstName%3eJohn%3c%2fFirstName%3e%0d%0a%3cMI%3eA%3c%2fMI%3e%0d%0a%3cLastName%3eD 
oe%3c%2fLastName%3e%0d%0a%3c%2fName%3e%0d%0a%3cAddress%3e%0d%0a%3cAddressLine1%3e12345+Street%3c 
%2fAddressLine1%3e%0d%0a%3cAddressLine2%3eApt+%232%3c%2fAddressLine2%3e%0d%0a%3cCity%3eSome+City 
%3c%2fCity%3e%0d%0a%3cState%3eSome+State%3c%2fState%3e%0d%0a%3cZipCode%3e12345%3c%2fZipCode%3e%0 
d%0a%3cCountry%3eSome+Country%3c%2fCountry%3e%0d%0a%3cEmailAddress%3ejohn.doe%40domain.com%3c%2f 
EmailAddress%3e%0d%0a%3cTelephone%3e1234567891%3c%2fTelephone%3e%0d%0a%3cFax%3e1234567890%3c%2fF 
ax%3e%0d%0a%3c%2fAddress%3e%0d%0a%3cCompany%3e%0d%0a%3cName%3eJohn%27s+Company%3c%2fName%3e%0d%0 
a%3cAddress%3e%0d%0a%3cAddressLine1%3e12345+Street%3c%2fAddressLine1%3e%0d%0a%3cAddressLine2%3eA 
pt+%232%3c%2fAddressLine2%3e%0d%0a%3cCity%3eSome+City%3c%2fCity%3e%0d%0a%3cState%3eSome+State%3c 
%2fState%3e%0d%0a%3cZipCode%3e12345%3c%2fZipCode%3e%0d%0a%3cCountry%3eSome+Country%3c%2fCountry%
3e%0d%0a%3cEmailAddress%3ejohn.doe%40domain.com%3c%2fEmailAddress%3e%0d%0a%3cTelephone%3e1234567 
891%3c%2fTelephone%3e%0d%0a%3cFax%3e1234567890%3c%2fFax%3e%0d%0a%3c%2fAddress%3e%0d%0a%3c%2fComp 
any%3e%0d%0a%3c%2fCustomer%3e%0d%0a%3cShippingRecipient%3e%0d%0a%3cName%3e%0d%0a%3cFirstName%3eJ 
ohn%3c%2fFirstName%3e%0d%0a%3cMI%3eA%3c%2fMI%3e%0d%0a%3cLastName%3eDoe%3c%2fLastName%3e%0d%0a%3c 
%2fName%3e%0d%0a%3cAddress%3e%0d%0a%3cAddressLine1%3e12345+Street%3c%2fAddressLine1%3e%0d%0a%3cA 
ddressLine2%3eApt+%232%3c%2fAddressLine2%3e%0d%0a%3cCity%3eSome+City%3c%2fCity%3e%0d%0a%3cState% 
3eSome+State%3c%2fState%3e%0d%0a%3cZipCode%3e12345%3c%2fZipCode%3e%0d%0a%3cCountry%3eSome+Countr 
y%3c%2fCountry%3e%0d%0a%3cEmailAddress%3ejohn.doe%40domain.com%3c%2fEmailAddress%3e%0d%0a%3cTele 
phone%3e1234567891%3c%2fTelephone%3e%0d%0a%3cFax%3e1234567890%3c%2fFax%3e%0d%0a%3c%2fAddress%3e% 
0d%0a%3cCompany%3e%0d%0a%3cName%3eJohn%27s+Company%3c%2fName%3e%0d%0a%3cAddress%3e%0d%0a%3cAddre 
ssLine1%3e12345+Street%3c%2fAddressLine1%3e%0d%0a%3cAddressLine2%3eApt+%232%3c%2fAddressLine2%3e 
%0d%0a%3cCity%3eSome+City%3c%2fCity%3e%0d%0a%3cState%3eSome+State%3c%2fState%3e%0d%0a%3cZipCode% 
3e12345%3c%2fZipCode%3e%0d%0a%3cCountry%3eSome+Country%3c%2fCountry%3e%0d%0a%3cEmailAddress%3ejo 
hn.doe%40domain.com%3c%2fEmailAddress%3e%0d%0a%3cTelephone%3e1234567891%3c%2fTelephone%3e%0d%0a% 
3cFax%3e1234567890%3c%2fFax%3e%0d%0a%3c%2fAddress%3e%0d%0a%3c%2fCompany%3e%0d%0a%3c%2fShippingRe 
cipient%3e%0d%0a%3c%2fPaymentType%3e%0d%0a%3c%2fPayments%3e%0d%0a%3c%2fRequest_v1%3e
```

### Field definitions

| Field Name         | Definition                                                              |
|--------------------|-------------------------------------------------------------------------|
| Status_Code        | A numerical indicator of the event type.  6 = User Canceled 7 = Timeout |
| Status_Description | A textual description of the event.                                     |

### Response message body

The following is the response message body.

```
<?xml version="1.0" encoding="utf-8"?><Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-
instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">  <Token>e911c9ed-7c12-4a5c-b362-
e6b54630f290</Token>  
<Data>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</Data></Envelope>
```

### Field definitions

| Field Name         | Definition                                                              |
|--------------------|-------------------------------------------------------------------------|
| Status_Code        | A numerical indicator of the event type.  6 = User Canceled 7 = Timeout |
| Status_Description | A textual description of the event.                                     |

## PEVD Request HTML Form

```
<html> <head> 
</head> 
<body> 
<form action=”https://www.sageexchange.com/virtualpaymentterminal/frmpayment.aspx” method=”POST”> 
<input type=”hidden” name=”request” value=”&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-
8&quot;?&gt;&lt;Envelope xmlns:xsi=&quot;http://www.w3.org/2001/XMLSchema-instance&quot; 
xmlns:xsd=&quot;http://www.w3.org/2001/XMLSchema&quot;&gt;  &lt;Token&gt;e911c9ed-7c12-4a5c
b362-e6b54630f290&lt;/Token&gt;  
&lt;Data&gt;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
2tHAsDuU2yFA8av/cFxCbsblXbxje9u3Vw==&lt;/Data&gt;&lt;/Envelope&gt;” /> 
<input type=”hidden” name=”redirect_url” value=”https://www.mysite.com/sevdresponsehandler” /> 
<input type=”hidden” name=”consumer_initiated” value=”true” /> 
</form> 
</body> 
</html> 
```

### Field definitions

| Name               | Data Type | Description                                                           |
|--------------------|-----------|-----------------------------------------------------------------------|
| Request            | String    | HTML encoded encrypted XML reuqest envelope message.                  |
| Redirect_url       | String    | The URL to which you want to POST the encrypted XML response message. |
| Consumer_initiated | Boolean   | Indicates the target audience as a customer and not a merchant.       |

## PEVD Response

The data below is POSTed to the redirect URL you provided in the PEVD request HTML form. Look up your user state information using the PEVD response envelope token when you receive the response from PEVD. If you find a match, continue to process the results. To prevent replay issues you should update your user state to indicate the response has been received. 

### Response message body

The following is the response message body.

```
response=%3c%3fxml+version%3d%221.0%22+encoding%3d%22utf-
8%22%3f%3e%3cEnvelope+xmlns%3axsi%3d%22http%3a%2f%2fwww.w3.org%2f2001%2fXMLSchema-
instance%22+xmlns%3axsd%3d%22http%3a%2f%2fwww.w3.org%2f2001%2fXMLSchema%22%3e%3cToken%3ee911c9e 
d-7c12-4a5c-b362-
e6b54630f290%3c%2fToken%3e%3cData%3eZ0eOkqnJiWtA2PwCEqRt7Sn%2f2R5iB4gneRDKcsE%2fwqa3%2f%2bJDSjo 
XK7%2bzMrGfqKmCwLAu9p5zg%2bue%2ftYvk71HYm%2fNwsXE4RH7gn0apehT77QCOI3L4kr4WeXvatPz8tn4iqS3G04jl8 
6Hexk2wo8z3XF2DeqvxoE4%2fXKq3ttoFbSDzT%2f5SPk0c972TAhhextyiB2hU5nsB7M1B1NbJYVlZsk05mxqwsM%2b6X9 
aPvfpg%2fYfwXVQ6lw6hFjMvwStJpYpFIqmMKQ6jKn4OCafZHz9BuFXkBc7fy0vH0t%2b%2bVqRqMunFTkxyRlT%2bB4EiA 
p%2bvZafX7T3Rl0J60%2fT%2bASK5ofPqVV3vVmtFaMtGqpnk%2fKcXEr30nMmelEUd1j%2fFl97081C5K5YdJRwvPhbQt% 
2bicqwAn1YQlhSEnFBzJnI50w219L1QLJQRUfd9%2fV%2fFy7AOFaaDtiAB3svdT8YdMu1eBHo1XVNwLUxcZ%2b9B0GJQ1c
HMoWLvBYGmf3i4tv7pqTO28WA6R6YKXw%2bugDgl%2b8Z2VUq7Vh7tsOKFM2xIoaKSOEw40He79ja6AFBu0ojnxmSXBiib% 
2fRiWulrvDySiVzisLSHIXHdZJpnaQnpq%2bFbxGaS8C17L%2fmY7kKJj400EyzgW8pMfVa9LauZPOg8kgFwpgvQJz6y4h2 
rs0nKWyqQVyxEoHj6Wr5svBhNiTxGwDPya8fmktSAv4LFjRfJSFXQji37e0Mfc4cPGGFBmxTFqwXkC5PO%2bHIFmyZFipN0 
ojM0WlbHY%2fDVvFz%2by%2bKN538XxNYUjf%2baSb%2bfi7MbWbOi7FGFssSwCOwCSn%2bnHbGNLZVTuNmLoo99KYcq5Ui 
3GDeDyKuTUtx9GCFM7S7z1SuVQXlzKZLxFvssppihZX%2fO%2fSeGVrwndCokHe%2f6BjPxRb%2bmtN6%2f8f1CjCU6X%2b 
gT4v5V8LJj6b4quVhF7nUs3tu0omM%2faxPI%2fF3oipux8%2b6T%2f94t9xSQy7uFS8I4%2fnD1ajPo8%2bJuxskqZvs9K 
iny5XufqTWLYKQvrd200zrwtU63ONF2bJQZ9gMUcMGrEvcRsJG%2bMFY%2fufGWWETQ8%2fzrVmDMmjx57c4WVkbg88%2fg
VIYNhiT3SBDZAojf1GG4%2feRLzsECuEdXvQB4%2fNzkuqDKopiqNUNqIh7qqYhWbm6GzjzwTWYGZtFYXssZorgJr69nXmW 
VkoJ529RbgxpT7HiQtyeu7%2f2mEI%2f%2bGyNeTRrbIWoC4gNbRqKQYvZfLmOp%2flu66MABE545gjXIsmka%2bZIS9VM%
2fIZ2y09RCO7eUPKyo8Pd2n2N8bmZsOOIkV8A2RVDICXAQSssZ1BuBXuFaCPP0jt2JGNssN8t5%2fv5p8YpeJXSDlNPUyAU
EPOQxaXsXr1lQzIoZFF8aASJUe3H9tghRXh4Vquh1c2m89A%2bCNjJSfayXtsTp6dgpqktUCoRwXzslyOy3BeGUHKXpuKFu
RIiBpoYZTJB9thA6D4LdkRfHVDCb11GTAyOj2URfTJQnJv2C7G7wsE16mk9mHMIdemLwiGQyVwrxuk5%2b7zC7p5Q3h3VRE 
6eJZ%2fe7hdpV%2fBAd8U5qZHEMFc3bBhhrl4LHm0oIgziTqpL2s9cGeXAxa%2b0VEAPSaGf2lNlunYp2DPFo9HsncKbOVQ 
n39sdCOA0xuRzWnjN668KV7pRgEIJG16uumFQnRs8HTwn0Vwb7n%2bfNFKz75kXLMGvDcdowC66XguNKbzr7ZcOie2iN8Uw 
xnprZYoiMkmdpcl%2bAPes33wLmAfFK9q7uhBzhf4A0Yzg39S0YF4ds3XDQl%2bspg71FzsDu2gCtRyumFoLdjH4FE754mL 
RaXMMoZQLvKAWe%2bYxATxk4zXKVnYU8lh397QtlHWjuvxCTgaEQB0%2fNZENojyJj78DsCaULDOKlDVJw9j17BbgkNm8dK 
mwtJ4yMnkay5WtCedhPOLrFUUL3nJ2F6h1VdtGJFgZamkjc1nzLzi5%2fIhrR88wl2Ofl83yEniZ4SaP9flAdJKrqIfn22C 
rwram51gL%2bk1w3SUkYX29IFzpVQHRNetiB76hVQLrxerW2zOCe1FdnGbia2GT16m3rv9pka%2bjpSVwKUcRwvyQDjRwfr 
IikWFszKbfhaH2rWHkQbxtmoP1fhMAQMw1bjQavTLV7gvxsZzc7t6M7x0r%2bzSP4L4Z4QjGVJbwzK0pN99DICl43G6m0yA 
BpDirNspBb%2fZB8skR9uI6DYPLU28bGizWeCvdnKPJ3Os0GP3OFO0Vr8dqSYLmr1YDZvgPfZ%2bs66%2bLqZ8RaZrqvBqn 
zdoWR3KkBb4fF4pO4USfsv3%2biluYfAUHcusMf3J3p4UFqurwlBfFvG9tRJHP0H28kaLXqOb%2fkzItPRe8JaZprryEvAW 
sQcf5sIL28uK7us5G%2fSsfB3VfTwvPfsrTknx1yvEsQr7fIjj666WW%2fMD35kjnIRl52zENHUgWExeXY7LysmMMpI%2f1 
iKIbC%2fUFvCHKJqr4ozAkYIxPOFYw%3d%3d%3c%2fData%3e%3c%2fEnvelope%3e 
```

### Field definitions

|     Name         |     Data Type     |     Description                                      |
|------------------|-------------------|------------------------------------------------------|
|     Response     |     String        |     URL encoded encrypted XML response envelope.     |

## Implementation Decrypt Message

Use this method to decrypt the PEVD XML response message.

### URL
https://www.sageexchange.com/virtualpaymentterminal/frmopenenvelope.aspx 

### Supported HTTP VERBS
POST

### Request message body

The following is the request message body.
```
request=%3c%3fxml+version%3d%221.0%22+encoding%3d%22utf-
8%22%3f%3e%3cEnvelope+xmlns%3axsi%3d%22http%3a%2f%2fwww.w3.org%2f2001%2fXMLSchema-
instance%22+xmlns%3axsd%3d%22http%3a%2f%2fwww.w3.org%2f2001%2fXMLSchema%22%3e%3cToken%3ee911c9e 
d-7c12-4a5c-b362-
e6b54630f290%3c%2fToken%3e%3cData%3eZ0eOkqnJiWtA2PwCEqRt7Sn%2f2R5iB4gneRDKcsE%2fwqa3%2f%2bJDSjo 
XK7%2bzMrGfqKmCwLAu9p5zg%2bue%2ftYvk71HYm%2fNwsXE4RH7gn0apehT77QCOI3L4kr4WeXvatPz8tn4iqS3G04jl8 
6Hexk2wo8z3XF2DeqvxoE4%2fXKq3ttoFbSDzT%2f5SPk0c972TAhhextyiB2hU5nsB7M1B1NbJYVlZsk05mxqwsM%2b6X9 
aPvfpg%2fYfwXVQ6lw6hFjMvwStJpYpFIqmMKQ6jKn4OCafZHz9BuFXkBc7fy0vH0t%2b%2bVqRqMunFTkxyRlT%2bB4EiA 
p%2bvZafX7T3Rl0J60%2fT%2bASK5ofPqVV3vVmtFaMtGqpnk%2fKcXEr30nMmelEUd1j%2fFl97081C5K5YdJRwvPhbQt% 
2bicqwAn1YQlhSEnFBzJnI50w219L1QLJQRUfd9%2fV%2fFy7AOFaaDtiAB3svdT8YdMu1eBHo1XVNwLUxcZ%2b9B0GJQ1c
HMoWLvBYGmf3i4tv7pqTO28WA6R6YKXw%2bugDgl%2b8Z2VUq7Vh7tsOKFM2xIoaKSOEw40He79ja6AFBu0ojnxmSXBiib% 
2fRiWulrvDySiVzisLSHIXHdZJpnaQnpq%2bFbxGaS8C17L%2fmY7kKJj400EyzgW8pMfVa9LauZPOg8kgFwpgvQJz6y4h2 
rs0nKWyqQVyxEoHj6Wr5svBhNiTxGwDPya8fmktSAv4LFjRfJSFXQji37e0Mfc4cPGGFBmxTFqwXkC5PO%2bHIFmyZFipN0 
ojM0WlbHY%2fDVvFz%2by%2bKN538XxNYUjf%2baSb%2bfi7MbWbOi7FGFssSwCOwCSn%2bnHbGNLZVTuNmLoo99KYcq5Ui 
3GDeDyKuTUtx9GCFM7S7z1SuVQXlzKZLxFvssppihZX%2fO%2fSeGVrwndCokHe%2f6BjPxRb%2bmtN6%2f8f1CjCU6X%2b 
gT4v5V8LJj6b4quVhF7nUs3tu0omM%2faxPI%2fF3oipux8%2b6T%2f94t9xSQy7uFS8I4%2fnD1ajPo8%2bJuxskqZvs9K 
iny5XufqTWLYKQvrd200zrwtU63ONF2bJQZ9gMUcMGrEvcRsJG%2bMFY%2fufGWWETQ8%2fzrVmDMmjx57c4WVkbg88%2fg 
VIYNhiT3SBDZAojf1GG4%2feRLzsECuEdXvQB4%2fNzkuqDKopiqNUNqIh7qqYhWbm6GzjzwTWYGZtFYXssZorgJr69nXmW
VkoJ529RbgxpT7HiQtyeu7%2f2mEI%2f%2bGyNeTRrbIWoC4gNbRqKQYvZfLmOp%2flu66MABE545gjXIsmka%2bZIS9VM%
2fIZ2y09RCO7eUPKyo8Pd2n2N8bmZsOOIkV8A2RVDICXAQSssZ1BuBXuFaCPP0jt2JGNssN8t5%2fv5p8YpeJXSDlNPUyAU
EPOQxaXsXr1lQzIoZFF8aASJUe3H9tghRXh4Vquh1c2m89A%2bCNjJSfayXtsTp6dgpqktUCoRwXzslyOy3BeGUHKXpuKFu
RIiBpoYZTJB9thA6D4LdkRfHVDCb11GTAyOj2URfTJQnJv2C7G7wsE16mk9mHMIdemLwiGQyVwrxuk5%2b7zC7p5Q3h3VRE 
6eJZ%2fe7hdpV%2fBAd8U5qZHEMFc3bBhhrl4LHm0oIgziTqpL2s9cGeXAxa%2b0VEAPSaGf2lNlunYp2DPFo9HsncKbOVQ 
n39sdCOA0xuRzWnjN668KV7pRgEIJG16uumFQnRs8HTwn0Vwb7n%2bfNFKz75kXLMGvDcdowC66XguNKbzr7ZcOie2iN8Uw 
xnprZYoiMkmdpcl%2bAPes33wLmAfFK9q7uhBzhf4A0Yzg39S0YF4ds3XDQl%2bspg71FzsDu2gCtRyumFoLdjH4FE754mL 
RaXMMoZQLvKAWe%2bYxATxk4zXKVnYU8lh397QtlHWjuvxCTgaEQB0%2fNZENojyJj78DsCaULDOKlDVJw9j17BbgkNm8dK 
mwtJ4yMnkay5WtCedhPOLrFUUL3nJ2F6h1VdtGJFgZamkjc1nzLzi5%2fIhrR88wl2Ofl83yEniZ4SaP9flAdJKrqIfn22C 
rwram51gL%2bk1w3SUkYX29IFzpVQHRNetiB76hVQLrxerW2zOCe1FdnGbia2GT16m3rv9pka%2bjpSVwKUcRwvyQDjRwfr 
IikWFszKbfhaH2rWHkQbxtmoP1fhMAQMw1bjQavTLV7gvxsZzc7t6M7x0r%2bzSP4L4Z4QjGVJbwzK0pN99DICl43G6m0yA 
BpDirNspBb%2fZB8skR9uI6DYPLU28bGizWeCvdnKPJ3Os0GP3OFO0Vr8dqSYLmr1YDZvgPfZ%2bs66%2bLqZ8RaZrqvBqn 
zdoWR3KkBb4fF4pO4USfsv3%2biluYfAUHcusMf3J3p4UFqurwlBfFvG9tRJHP0H28kaLXqOb%2fkzItPRe8JaZprryEvAW 
sQcf5sIL28uK7us5G%2fSsfB3VfTwvPfsrTknx1yvEsQr7fIjj666WW%2fMD35kjnIRl52zENHUgWExeXY7LysmMMpI%2f1 
iKIbC%2fUFvCHKJqr4ozAkYIxPOFYw%3d%3d%3c%2fData%3e%3c%2fEnvelope%3e 
```

### Field definitions

|     Name        |     Data Type     |     Description                                               |
|-----------------|-------------------|---------------------------------------------------------------|
|     Request     |     String        |     The URL encoded encrypted PEVD XML response   message     |

### Response message body

The following is the response message body.
```XML
<?xml version="1.0" encoding="utf-16"?> 
<Response_v1 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
xmlns:xsd="http://www.w3.org/2001/XMLSchema"> 
  <PaymentResponses> 
    <PaymentResponseType> 
      <Response> 
        <ResponseIndicator>A</ResponseIndicator> 
        <ResponseCode>123456</ResponseCode> 
        <ResponseMessage>APPROVED 123456</ResponseMessage> 
      </Response> 
      <TransactionResponse> 
        <AuthCode>123456</AuthCode>         
        <AVSResult /> 
        <CVVResult>P</CVVResult> 
        <VANReference>ECHCH7e9w0</VANReference> 
        <TransactionID>d22f7bd8-3131-45f7-be8a-631cae2ef6cc</TransactionID> 
        <Last4>XXXXXXXXXXXX1111</Last4> 
        <PaymentDescription>411111XXXXXX1111</PaymentDescription> 
        <Amount>19.99</Amount> 
        <PaymentTypeID>4</PaymentTypeID> 
        <Reference1>PO 123456</Reference1> 
        <TransactionDate>12/17/2012 5:07:39 PM</TransactionDate> 
        <EntryMode>K</EntryMode> 
        <TaxAmount>0</TaxAmount> 
        <ShippingAmount>0</ShippingAmount> 
        <TransactionPaymentType>CREDITCARD</TransactionPaymentType> 
      </TransactionResponse> 
      <Customer> 
        <Name> 
          <FirstName>John A Doe</FirstName> 
          <MI /> 
          <LastName /> 
        </Name> 
        <Address> 
          <AddressLine1>12345 Street</AddressLine1> 
          <AddressLine2>Apt #2</AddressLine2> 
          <City>Some City</City>           
          <State>AL</State> 
          <ZipCode>12345</ZipCode> 
          <Country>US</Country> 
          <EmailAddress>john.doe@domain.com</EmailAddress> 
          <Telephone>1234567891</Telephone> 
          <Fax>1234567890</Fax> 
        </Address>         
        <Company> 
          <Address /> 
        </Company> 
      </Customer> 
    </PaymentResponseType> 
  </PaymentResponses>  
</Response_v1>
```
