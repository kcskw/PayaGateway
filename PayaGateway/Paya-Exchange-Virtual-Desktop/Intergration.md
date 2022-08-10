1. [Overview]()
2. [Integration Types]()
    - [User Interface Integration]()
      - [URL]()
      - [Form Fields]()
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

