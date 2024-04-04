# Paya Core Gateway
Products from Paya's Core platform (Sage Exchange/Sage Payment Solutions). These products utilize APIs for the sageexchange.com and sagepayments.com domains.

If you have any questions, please email us at sdksupport@nuvei.com.

## Getting Started

### Create an account
1. Register with the [Paya Core Developer Portal](https://developer.sagepayments.com)
2. Click **Create Account**.
3. Enter your information and review the **Terms & Conditions**.
4. Select the **Accept Terms & Conditions of Use** checkbox.

![image](https://github.com/PayaDev/PayaGateway/assets/11508367/7bdcabec-9b4f-46af-add4-7072064c9ce0)

5. Click **Create Account**.
6. Check your inbox for a validation email. Follow the instructions in the email to sign in to the [Paya Core Developer Portal](https://developer.sagepayments.com).

### Adding an application or product
Adding an app on the developer portal will provide you with your sandbox API credentials (Application ID/Client ID and Client Secret).
1. Click **My Apps** on the menu bar.
2. Click **Add App**.
3. Enter the information about the application your are building.
4. Select the product(s) you want to use with your integration.

![image](https://github.com/PayaDev/PayaGateway/assets/11508367/0a191590-aba2-4672-84c8-8620e9259d99)

5. Click **Create App**. Your sandbox API keys have been approved.
6. Click your application name to expand the details.
7. Use the API keys to integrate directly into the Paya APIs.

### Requesting Certification
Follow the steps below to request certification for your app. This is the final step you will take when you are ready to move your application from sandbox to production.
1. When you have completed your integration and are ready to certify your integration, click **Request Certification**.

![image](https://github.com/PayaDev/PayaGateway/assets/11508367/e3b5d838-cc7f-41a7-b78f-ba7d1b6b6eb1)

2. The integration support team (sdksupport@nuvei.com) will then work with you to schedule a certification call.

### What is Certification?
That's a great question! Our team (sdksupport@nuvei.com) hosts a certification call to review your app prior to moving to your merchant's production environment. During the call you or your representative will share your screen and we'll review the following.
* Merchant and API credential storage and security.
* Each API interaction/hosted form expected to be used in production.
* The security of end user interactions as well as the payment form (custom or hosted).
* Payments best practices.

### Prerequisits for Certification
There are two main items we require prior to certification.
* Please use all positive and negative test conditions and payment methods listed within the [Bank Card Testing Procedures and Decline Codes](https://github.com/PayaDev/PayaGateway/blob/master/PayaCore/Paya-Exchange-Virtual-Desktop/Bank%20Card%20Testing%20Procedures%20and%20Decline%20Codes.md) doc here on GitHub.
* If you're using your own custom payment form you'll increase your scope for PCI-DSS. You'll need to email us a copy of your PCI compliance certification from an [Approved Scanning Vendor (ASV)](https://listings.pcisecuritystandards.org/assessors_and_solutions/approved_scanning_vendors). This will need to be at least an SAQ D or higher.

Please let us know if you have any questions.

**SDKSupport@nuvei.com**

