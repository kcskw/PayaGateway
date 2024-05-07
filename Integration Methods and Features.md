# Integration Methods and Features

## PCI-DSS Scope
Before you begin, please keep in mind PCI-DSS scope. If you are looking to reduce scope for PCI-DSS within your implementation, you'll want to select an integration method that directs your end users to a Paya/Nuvei hosted payment form. If you decide a custom payment form is better for your solution you'll be required to provide us with a copy of your PCI-DSS compliance certificate from an [Approved Scanning Vendor (ASV)](https://listings.pcisecuritystandards.org/assessors_and_solutions/approved_scanning_vendors). The compliance certificate must be at least an [SAQ D](https://www.pcisecuritystandards.org/documents/SAQ_D_v3_Merchant.pdf) or higher.

With this in mind you are able to use a hosted form to tokenize a payment method. Once that is complete you can utilize the generated token (GUID) along with the Direct API Endpoints to process a payment. By utilizing a tokenized payment method you are able to maintain a reduced level of scope for PCI-DSS.

## RESTful Direct API
Our [RESTful Direct API](https://github.com/PayaDev/PayaGateway/tree/master/PayaCore/Direct-API) provides a full suite of products and services. Developers looking to own their own UI/UX and PCI requirements would want to leverage this robust feature set. Complete with Healthcare, Level III, Retail, and Ecommerce processing, this API provides it all!

### Endpoints
* [Bankcard](https://github.com/PayaDev/PayaGateway/blob/master/PayaCore/Direct-API/BankCard.md)
* [ACH](https://github.com/PayaDev/PayaGateway/blob/master/PayaCore/Direct-API/ACH.md)
* [Token](https://github.com/PayaDev/PayaGateway/blob/master/PayaCore/Direct-API/Token.md)
* [Account Updater Query](https://github.com/PayaDev/PayaGateway/blob/master/PayaCore/Direct-API/Account%20Updater.md)

## Paya Exchange Virtual Desktop (PEVD)
Formerly called Sage Exchange Virtual Desktop (SEVD), [Paya Exchange Virtual Desktop (PEVD)](https://github.com/PayaDev/PayaGateway/tree/master/PayaCore/Paya-Exchange-Virtual-Desktop) provides a completely hosted payment form for those Developers looking for a web “pop-out” to accept payments. PEVD is ideally suited for a Merchant-facing SaaS product environment while also providing a hosted environment for ecommerce. Using a hosted redirect such as PEVD will help your merchants reduce scope for PCI-DSS whether you're using it for tokenizing the payment method or processing the payment itself.

![image](https://github.com/PayaDev/PayaGateway/assets/11508367/e2bb839c-5ea4-4a39-829e-2957d300619a)


## Paya Connect Desktop (PCD)
Formerly called Sage Exchange Desktop (SED), [Paya Connect Desktop (PCD)](https://github.com/PayaDev/PayaGateway/tree/master/PayaCore/Paya-Connect-Desktop) is an Installed .Net application which is fully PCI-DSS compliant. Allows an ISV to completely remove all sensitive payment data from their application workflow by leveraging the Paya Connect Desktop UI interface. Features like Tokenization, Level III processing, and EMV are baked directly into the same API.

![image](https://github.com/PayaDev/PayaGateway/assets/11508367/41e913e3-e9f1-43e1-94e6-c3b6b40844a7)
