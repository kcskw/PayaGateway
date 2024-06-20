# Paya ACH Authorization Requirements

## Authorization Page - WEB
For internet initiated (WEB) entries the receiver must have the following verbiage (or substantially similar) text listed on the authorization page of their site. Additionally, the authorization must provide the Receiver with the method to revoke his authorization by notifying the Originator in the manner prescribed, and the time frame in which the revocation of the authorization must be provided.

_By authorizing this transaction, customer agrees that merchant may convert this transaction into an Electronic Funds Transfer (EFT) transaction or paper draft, and to debit this account for the amount of the transaction. Additionally, in the event this draft or EFT is returned unpaid, a service fee, as allowable by law, will be charged to this account via EFT or draft. In the event you choose to revoke this authorization, please do so by contacting the merchant directly. Please note that processing times may not allow for revocation of this authorization._

Merchant or Integrator is required to use commercially reasonable methods to authenticate customer identity PRIOR to transaction authorization. Possible methods to authenticate:

Shared Secrets
PIN
Password
Request identifying customer information to verify against outsourced databases.
Ask challenge questions to verify against credit bureau or outsourced databases.
Sending customer a specific piece of information, either online or offline, and then ask customer to verify or provide that information as a second step in the authentication process.
Merchant or Integrator is required to retain the customers’ original authorization or copy of the original authorization in its original form.

Merchant or Integrator MUST be able to reproduce Customer authorization upon request. Industry best practice for reproduction to appear the same way that website appeared and/or presented to customer on the website at time of authorization including all verbiage and agreement terms provided on the website at time of authorization.

NACHA does not accept proof of an authorization as a list of the data or information captured at time of authorization.
The following information must be included in the authorization record:

Consumer IP Address of Origination
Consumer Name
Consumer Address
Transaction Amount
Transaction Effective Date
Consumer E-mail address (optional; industry recommended best practice)
Website where payment was accepted
Signifying whether authorization is for a single or recurring/multiple debits, and debit schedule if recurring/multiple
Consumer Banking information
Statement of how the consumer’s identity was authenticated

## Authorization Page - PPD
PPD is for prearranged payment and deposit entries on personal bank account in which the Receiver is required to complete a written authorization form and must provide physical or digital signature. Digital signatures must be compliant with the ESign Act.

Additionally, the authorization must provide the Receiver with the method to revoke his authorization by notifying the Originator in the manner prescribed, and the time frame in which the revocation of the authorization must be provided.

The Originator (Merchant) must have the following verbiage (or substantially similar) on the written authorization form:

_By signing below, I authorize the Merchant to convert this transaction into an Electronic Funds Transfer transaction or paper draft, and to debit this account for the amount as identified above and to the terms stated here. This authorization shall remain in effect until the Merchant receives written notification from me of intent to terminate at such time and in such manner as to afford the Merchant a reasonable opportunity to act. I authorize this plan to continue as long as the payment amount remains unchanged until the amount owed the Merchant is paid off, or unless the plan is terminated earlier by me as stated above. I understand that all changes such as payment amount, frequency, bank account number change, will require a new ACH Debit Payment Authorization Form to be filled out and submitted to Merchant 15 days prior to any change being implemented.
In the event that I choose to revoke this authorization, I will do so by contacting the merchant directly. Processing times may not allow for revocation of this authorization.
I understand that this payment plan may be cancelled by the Merchant due to NSF (Non-sufficient Funds). In the event this draft or EFT is returned unpaid, I will be liable to pay an NSF fee of $25.00 (or the amount allowable by law), that may be automatically debited to this bank account via draft or EFT for each NSF._

## Authorization Page - CCD
CCD is for Corporate Credit or Debit entries on business bank accounts in which the Receiver is required to complete a written authorization form, contract, or agreement that with the Originator and Receiver have both agreed to be bound by the ACH Rules and the Receiver must provide physical or digital signature. Digital signatures must be compliant with the ESign Act.

Additionally, the authorization must provide the Receiver with the method to revoke his authorization by notifying the Originator in the manner prescribed, and the time frame in which the revocation of the authorization must be provided.

The Originator (Merchant) must have the following verbiage (or substantially similar) listed on the written authorization form, contract, or agreement:

_Submission of this transaction assumes an agreement is in place between both parties to allow converting this transaction into an Electronic Funds Transfer transaction or paper draft, and to debit this account for the amount of the transaction. Additionally, the agreement further states that in the event this draft or EFT is returned unpaid, a service fee, as allowable by law, will be charged to this account via draft or EFT. In the event you choose to revoke this authorization, please do so by contacting the merchant directly. Please note that processing times may not allow for revocation of this authorization._

We offer more in-depth details on our Paya Help Site here [Check and ACH Best Practices.](https://support.paya.com/49444-paya-services/check-and-ach-processing-best-practices-guide?from_search=147533866)
