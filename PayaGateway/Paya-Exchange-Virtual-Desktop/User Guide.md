# Paya Exchange Virtual Desktop (PEVD) User Guide

1. [Overview]()
    - [Using this guide]()
    - [Understanding Paya Exchange Virtual Desktop v2.x]()
      - [System requirements]()
3. [Understanding the Paya Exchange Virtual Desktop v2.x user interface]()
4. [Customizing Paya Exchange Virtual Desktop v2.x]()
    - [Modifying the user interface]()
      - [Changing the display]()
      - [Changing the theme]()
    - [Hiding or showing fields]()


## Overview

Paya Exchange Virtual Desktop is a Payment Application Data Security Standard (PA-DSS) certified payment program that integrates with any web application.

When a user initiates a credit card transaction in the web application, it makes a seamless call to Paya Exchange Virtual Desktop, where all aspects of processing the credit card occurs. This includes the transmission and storage of credit card data, so PA-DAA certification is not required for the web application. 

### Using this guide 

This Guide describes how to customize the Paya Exchange Virtual Desktop user interface; which integrators can do by modifying transactional XML code. This document contains excerpts from the code samples provided in the Paya Exchange Virtual Desktop v2.x XML Messaging document. Refer to this document and the Paya Exchange Virtual Desktop Integration Guide for more information about coding your integration. 

*Note: You can download integration documents from the [Paya Payments Developer Portal](https://developer.sagepayments.com/).*

### Understanding Sage Exchange Virtual Desktop v2.x 
Paya Exchange Virtual Desktop v2.x displays all payment fields on single web page. Data is posted to: https://www.sageexchange.com/sevd/frmpayment.aspx. 

#### System requirements 

Paya Exchange Virtual Desktop v2.x user workstations must meet the following web browser requirements: 

-	Microsoft Internet Explorer v8 (or higher) 
-	Apple Safari (latest version) 
-	Google Chrome (latest version) 
-	Mozilla Firefox (latest version)


## Understanding the Paya Exchange Virtual Desktop v2.x user interface 

The Paya Exchange Virtual Desktop v2.x user interface consists of the following pages: 
-	**Payment.** This page is usually the first to open (except for transactions such as multipayment), when the web application calls Paya Exchange Virtual Desktop. The top section of this page includes payment information such as the payee name, reference number, sale total, tax amount, and shipping amount. This section also includes the payment type (Credit Card or Credit Card and Virtual Check if ACH is enabled), credit (or debit) card number, expiration date, CVV code, and a Swipe button. 
The bottom section of the page allows users to enter (or update) the customer’s billing information (name, address, phone number, e‐mail address, or fax number). This section is pre‐populated if the card is swiped; however, the user may be required to enter information for some transactions such as virtual checks or when the credit card is not present (for example, telephone orders). 
If the user selects Virtual Check as the payment type, bank information fields display instead of the credit card detail fields. 
-	**Multi‐Payments.** The top section of this page includes payment information such as the payee name and payment totals, where the user can enter a reference number, adjust the sale total, and enter tax or shipping amounts. This section also includes the payment type (Credit Card or Credit Card and Virtual Check if ACH is enabled), credit (or debit) card number, expiration date, and CVV code. 
The bottom section of this page allows users to manage multiple payments. The user double‐clicks an invoice to open the Payment page, where they then complete the process of submitting a payment. The user can also click Billing Information to display billing details in this section. 
If the user selects Virtual Check as the payment type, bank information fields display instead of the credit card details fields. 
-	**Vault.** This page allows users to save credit (or debit) card or virtual check information to the Paya Payment Solutions Vault. The Vault page also displays fields that allow users to updated stored records. 

*Note: All pages in Paya Exchange Virtual Desktop include the Support link; however, you can hide this page element.*


## Customizing Sage Exchange Virtual Desktop v2.x 
You can customize Paya Exchange Virtual Desktop v2.x for your application by modifying the default colors on the user interface and choosing to hide or show fields. 

### Modifying the user interface 
You can modify elements such as text color, background color, group box color, and hide or show elements and fields on the Paya Exchange Virtual Desktop user interface by changing default values of tags in the <UI> (user interface) section of XML code for each user interface XML transaction. 
  
Image 1: An excerpt from the Sage Exchange Virtual Desktop v2.x XML Messaging document that shows where the <UI> section of code begins in the Authorization request (with user interface) transaction sample code. 
Sage Exchange Virtual Desktop (SEVD) v2.x
  
Each section of the <UI> code controls the appearance of a specific area on the user interface: 

The values in the &lt;Display&gt;&lt;/Display&gt; tags control whether the header area (including the Support link) displays, which payment type selections display, and if the Paya Exchange logo displays.

The values in the &lt;Theme&gt;&lt;/Theme&gt; tags control the text color, background color, group box background color, and divider background color. 
    
<img valign="right" src="https://user-images.githubusercontent.com/6975101/182418595-f6809eee-4903-45d0-93d5-2b68f698a3b8.jpg" /> 
    
The values in the &lt;Display&gt;&lt;/Display&gt; tags control whether the header area (including the Support link) displays, which payment type selections display, and if the Paya Exchange logo displays.

The values in the &lt;Theme&gt;&lt;/Theme&gt; tags control the text color, background color, group box background color, and divider background color. 

  
The values in the <Display></Display> tags control whether the header area (including the Support link) displays, which payment type selections display, and if the Sage Exchange logo displays. 
The values in the <Theme></Theme> tags control the text color, background color, group box background color, and divider background color.  
 
The elements in the <UI></UI> section are common to all pages of Sage Exchange Virtual Desktop v2.x. You can easily change the appearance of these elements by changing the default tag values in each XML transaction request. For example, you can change the default text color from red to black (hexadecimal format). 
    
Changing the display 
    
You can customize the general appearance of the Payment page and the Vault page by changing these values in the <Display></Display> section: 
•	<Header></Header>. Displays (true) or hides (false) the header section, which includes the Sage Payment Solutions logo and the Support hyperlink. 
•	<SupportLink></SupportLink>. Displays or hides the Support hyperlink in the header section of the page. This element is automatically hidden if the <Header></Header> tag is set to false. 
•	<CheckPayment></CheckPayment>. Displays (true) or hides (false) the Virtual Check selection in the Payment Type field. By default, this tag is set to false; however, you may want to change it to true if you enabled ACH for your integration. 
•	<CardPayment></CardPayment>. Displays (true) or hides (false) the Credit Card selection in the Payment Type field. By default, this tag is set to true. 
Changing the theme 
The <Theme></Theme> section of the code allows you to modify the text color, as well as the background colors of the main area, Totals group box, and divider on the Payment and Vault pages. You can edit the following values to change the appearance of this group box: 
•	<MainFontColor></MainFontColor>. The hexadecimal value of this tag defines the color of the page text. 
•	<MainBackColor></MainBackColor>. The hexadecimal value of this tag defines the background color of the main area on page. 
Sage Exchange Virtual Desktop (SEVD) v2.x
•	<HeaderBackColor></HeaderBackColor>. The hexadecimal value of this tag defines the background color of the header section, which displays the Sage Payment Solutions logo and Support link. 
•	<TotalsBoxBackColor></TotalsBoxBackColor>. The hexadecimal value of this tag defines the background color of the Totals group box, which includes the Reference, Subtotal, Shipping, Tax, and Total fields. 
Hiding or showing fields 
The tags in the <SinglePayment></SinglePayment> section withing the UI code allow you to show or hide fields on the Payment page. For example, you can choose to hide fields such as Reference Number or Shipping in the Totals group box or extra address lines in the Billing Information section by setting the tag values to false. 


