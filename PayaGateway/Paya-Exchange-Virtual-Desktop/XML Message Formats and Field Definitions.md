# Paya Exchange Virtual Desktop - XML Message Formats and Field Definitions

1. [XMLSchema]()
    - [XML Reserved Characters]()
2. [Message Formats]()
    - [Introduction]()
    - [Sale]()
      - [XML Sale Request with User Interface Sample]()
      - [XML Sale Request without User Interface Sample]()
      - [XML Sale Request and Vault Storage with User Interface Sample]()
    - [Authorization]()
      - [XML Authorization Request with User Interface Sample]()
      - [XML Authorization Request without User Interface Sample]()
    - [Capture]()
      - [XML Capture Request with User Interface]()
      - [XML Capture Request without User Interface]()
    - [Force]()
      - [XML Force Request with User Interface Sample]()
      - [XML Force Request without User Interface Sample]()
    - [Level 2]()
      - [XML Level 2 Sale Request with User Interface Sample]()
    - [Level3Type Element]()
    - [LineItems Element]()
    - [Level3LineItemType Element]()
    - [Void]()
      - [XML Void Request without User Interface]()
    - [Credit]()
      - [XML Credit Request with User Interface]()
      - [XML Credit Request without User Interface]()
    - [Batch Inquiry]()
      - [XML Batch Inquiry Request]()
    - [Batch Close]()
      - [XML Batch Close Request with Net and Count Verification]()
      - [XML Batch Close Request without Net and Count Verification]()
    - [Vault Operation]()
      - [XML Vault Operation Request for Creating a Storage Record]()
      - [XML Vault Operation Request for Updating a Storage Record]()
      - [XML Vault Operation Request for Deleting a Storage Record]()
      - [XML Vault Operation Request for Viewting a Storage Record]()
      - [XML Vault Operation Request for Updating a Storage Record hiding the Account Number in the UI]()
      - [XML Vault Operation Request for Creating a Storage Record masking the Account Number in the UI]()
    - [Vault Account]()
      - [XML Vault Account Request]()
    - [Account Query]()
      - [XML Account Query Request]()
    - [Transaction Status Query]()
      - [XML Transaction Status Query]()
    - [Vault Status Query]()
      - [XML Vault Status Query]()
    - [Multi-Payment Processing]()
      - [XML Multi-Payment Request with User Interface]()
    - [Split Payment Processing]()
      - [XML Split Payment Request with User Interface]()
    - [User Interface Management]()
      - [XML Authorization Request with User Interface Management]()
      - [XML Vault Update Operation with User Interface Management]()
3. [Request Field Definitions]()
    - [Request_V1 Type Element]()
    - [Application Type Element]()
    - [MerchantType Element]()
    - [Payments Element]()
    - [Batch Element]()
    - [PaymentType Element]()
    - [TransactionBaseType Element]()
    - [Custom Element: PersonType Element]()
    - [ShippingRecipient Element: PersonType Element]()
    - [Level2Type Element]()
    - [Level3Type Element]()
    - [LineItems Element]()
    - [Level3LineType Element]()
    - [VaultStorageType Element]()
    - [RecurringType Element]()
    - [BatchType Element]()
    - [PostbackType Element]()
    - [CompanyType Element]()
    - [NameType Element]()
    - [AddressType Element]()
    - [TransactionStatusQueryType Element]()
    - [RecurringStatusQueryType Element]()
    - [VaultOperationType Element]()
    - [VaultAccountType Element]()
    - [AccountQueryType Element]()
    - [UIType Element]()
4. [Response Field Definitions]()
    - [PaymentResponseType Element]()
    - [ResponseType Element]()
    - [VaultResponseType Element]()
    - [RecurringResponseType Element]()
    - [TransactionResponseType Element]()
    - [BatchResponseType Element]()
    - [TransactionSettlementStatusType Element]()
    - [TransactionStatusQueryResponseType Element]()
    - [RecurringStatusQueryResponseType Element]()
    - [VaultAccountResponseType Element]()
    - [AccountQueryResponseType Element]()
5. [Field Validation]()
    - [Alpha Numeric Fields*]()
    - [Numeric Fields*]()
6. [Gateway Error Codes]()


## XMLSchema

```XML
<?xml version="1.0" encoding="utf-8"?> 
<xs:schema elementFormDefault="qualified" xmlns:xs="http://www.w3.org/2001/XMLSchema"> 
  <xs:element name="Request_v1" nillable="true" type="Request_v1" /> 
  <xs:complexType name="Request_v1"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Application" type="ApplicationType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Payments" type="ArrayOfPaymentType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Batch" type="BatchType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionStatusQueries" type="ArrayOfTransactionStatusQueryType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="RecurringStatusQueries" type="ArrayOfRecurringStatusQueryType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultStatusQuery" type="VaultStatusQueryType"/> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultOperation" type="VaultOperationType" />       
      <xs:element minOccurs="0" maxOccurs="1" name="VaultAccount" type="VaultAccountType" />       
      <xs:element minOccurs="0" maxOccurs="1" name="UI" type="UIType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="AccountQuery" type="AccountQueryType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Postback" type="PostbackType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ApplicationType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="ApplicationID" type="xs:string" />       
      <xs:element minOccurs="0" maxOccurs="1" name="LanguageID" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfPaymentType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="PaymentType" nillable="true" type="PaymentType" />
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="PaymentType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Merchant" type="MerchantType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionBase" type="TransactionBaseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Customer" type="PersonType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="ShippingRecipient" type="PersonType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Level2" type="Level2Type" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Level3" type="Level3Type" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Recurring" type="RecurringType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultStorage" type="VaultStorageType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Postback" type="PostbackType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="MerchantType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="MerchantID" type="xs:string" />       
      <xs:element minOccurs="0" maxOccurs="1" name="MerchantKey" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="TransactionBaseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionID" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionType" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Reference1" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Amount" type="xs:double" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="AuthCode" type="xs:string" />       
      <xs:element minOccurs="0" maxOccurs="1" name="VANReference" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="PersonType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Name" type="NameType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Address" type="AddressType" />       
      <xs:element minOccurs="0" maxOccurs="1" name="Company" type="CompanyType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="NameType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="FirstName" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="MI" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="LastName" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="AddressType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="AddressLine1" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="AddressLine2" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="City" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="State" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="ZipCode" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Country" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="EmailAddress" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Telephone" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Fax" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="CompanyType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Name" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Address" type="AddressType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="Level2Type"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="CustomerNumber" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="TaxAmount" type="xs:double" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="Level3Type"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Level2" type="Level2Type" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="ShippingAmount" type="xs:double" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="DestinationZipCode" type="xs:string" />       
      <xs:element minOccurs="0" maxOccurs="1" name="DestinationCountryCode" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VATNumber" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="DiscountAmount" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="DutyAmount" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="NationalTaxAmount" type="xs:double" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VATInvoiceNumber" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="VATTaxAmount" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="VATTaxRate" type="xs:double" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="LineItems" type="ArrayOfLevel3LineItemType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfLevel3LineItemType">
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="Level3LineItemType" nillable="true" type="Level3LineItemType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="Level3LineItemType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="CommodityCode" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Description" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="ProductCode" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Quantity" type="xs:int" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="UnitOfMeasure" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="UnitCost" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="TaxAmount" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="TaxRate" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="DiscountAmount" type="xs:double" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="AlternateTaxIdentifier" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TaxTypeApplied" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="DiscountIndicator" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="NetGrossIndicator" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="ExtendedItemAmount" type="xs:double" />       
      <xs:element minOccurs="0" maxOccurs="1" name="DebitCreditIndicator" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="RecurringType"> 
    <xs:sequence> 
      <xs:element minOccurs="1" maxOccurs="1" name="Schedule" type="ScheduleType" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Interval" type="xs:int" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="DayOfMonth" type="xs:int" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="StartDate" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Amount" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="TimesToProcess" type="xs:int" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="NonBusinessDay" type="NonBusinessDayType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:simpleType name="ScheduleType"> 
    <xs:restriction base="xs:string"> 
      <xs:enumeration value="MONTHLY" />       
      <xs:enumeration value="DAILY" /> 
    </xs:restriction> 
  </xs:simpleType> 
  <xs:simpleType name="NonBusinessDayType"> 
    <xs:restriction base="xs:string"> 
      <xs:enumeration value="THATDAY" /> 
      <xs:enumeration value="BEFORE" /> 
      <xs:enumeration value="AFTER" /> 
    </xs:restriction> 
  </xs:simpleType> 
  <xs:complexType name="VaultStorageType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="GUID" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Service" type="VaultServiceType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:simpleType name="VaultServiceType"> 
    <xs:restriction base="xs:string"> 
      <xs:enumeration value="CREATE" /> 
      <xs:enumeration value="UPDATE" /> 
      <xs:enumeration value="RETRIEVE" />       
      <xs:enumeration value="DELETE" /> 
    </xs:restriction> 
  </xs:simpleType> 
  <xs:complexType name="PostbackType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="HttpsUrl" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="BatchType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Merchant" type="MerchantType" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Net" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Count" type="xs:int" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="BatchPayment" type="BatchPaymentType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:simpleType name="BatchPaymentType"> 
    <xs:restriction base="xs:string"> 
      <xs:enumeration value="CREDITCARD" />       
      <xs:enumeration value="PURCHASECARD" /> 
    </xs:restriction> 
  </xs:simpleType> 
  <xs:complexType name="ArrayOfTransactionStatusQueryType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="TransactionStatusQueryType" nillable="true" type="TransactionStatusQueryType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="TransactionStatusQueryType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Merchant" type="MerchantType" />       
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionID" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfRecurringStatusQueryType">     
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="RecurringStatusQueryType" nillable="true" type="RecurringStatusQueryType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="RecurringStatusQueryType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Merchant" type="MerchantType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="RecurringID" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="StartDate" type="xs:string" />       
      <xs:element minOccurs="0" maxOccurs="1" name="EndDate" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="VaultStatusQueryType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Merchant" type="MerchantType" />       
      <xs:element minOccurs="0" maxOccurs="1" name="VaultID" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="VaultOperationType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultID" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Merchant" type="MerchantType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultStorage" type="VaultStorageType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="VaultAccountType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Company" type="CompanyType" />       
      <xs:element minOccurs="0" maxOccurs="1" name="Contact" type="PersonType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="UIType"> 
  <xs:sequence> 
    <xs:element minOccurs="0" maxOccurs="1" name="Display" type="UIDisplay" /> 
    <xs:element minOccurs="0" maxOccurs="1" name="Style" type="UIStyle" /> 
  </xs:sequence> 
</xs:complexType> 
<xs:complexType name="UIDisplay"> 
  <xs:sequence> 
    <xs:element minOccurs="1" maxOccurs="1" name="Header" type="xs:boolean" /> 
    <xs:element minOccurs="1" maxOccurs="1" name="SupportLink" type="xs:boolean" /> 
    <xs:element minOccurs="1" maxOccurs="1" name="CheckPayment" type="xs:boolean" /> 
    <xs:element minOccurs="1" maxOccurs="1" name="CardPayment" type="xs:boolean" /> 
    <xs:element minOccurs="1" maxOccurs="1" name="SELogo" type="xs:boolean" /> 
    <xs:element minOccurs="1" maxOccurs="1" name="VisaLogo" type="xs:boolean" /> 
    <xs:element minOccurs="1" maxOccurs="1" name="AmexLogo" type="xs:boolean" /> 
    <xs:element minOccurs="1" maxOccurs="1" name="DiscoverLogo" type="xs:boolean" /> 
    <xs:element minOccurs="1" maxOccurs="1" name="MasterCardLogo" type="xs:boolean" /> 
  </xs:sequence> 
</xs:complexType> 
<xs:complexType name="UIStyle"> 
  <xs:sequence> 
    <xs:element minOccurs="0" maxOccurs="1" name="MainFontColor" type="xs:string" /> 
    <xs:element minOccurs="0" maxOccurs="1" name="MainBackColor" type="xs:string" /> 
    <xs:element minOccurs="0" maxOccurs="1" name="HeaderBackColor" type="xs:string" /> 
    <xs:element minOccurs="0" maxOccurs="1" name="TotalsBoxBackColor" type="xs:string" /> 
    <xs:element minOccurs="0" maxOccurs="1" name="DividerBackColor" type="xs:string" /> 
  </xs:sequence> 
</xs:complexType> 
  <xs:complexType name="AccountQueryType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Merchant" type="MerchantType" /> 
    </xs:sequence> 
  </xs:complexType>   <xs:element name="Response_v1" nillable="true" type="Response_v1" /> 
  <xs:complexType name="Response_v1"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="PaymentResponses" type="ArrayOfPaymentResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="BatchResponse" type="BatchResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionStatusQueryResponses" type="ArrayOfTransactionStatusQueryResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="RecurringStatusQueryResponses" type="ArrayOfRecurringStatusQueryResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultStatusQueryResponse" type="VaultStatusQueryResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultResponse" type="VaultResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultAccountResponse" type="VaultAccountResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="AccountQueryResponse" type="AccountQueryResponseType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfPaymentResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="PaymentResponseType" nillable="true" type="PaymentResponseType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="PaymentResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Response" type="ResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultResponse" type="VaultResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="RecurringResponse" type="RecurringResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionResponse" type="TransactionResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Customer" type="PersonType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="ResponseIndicator" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="ResponseCode" type="xs:string" />       
      <xs:element minOccurs="0" maxOccurs="1" name="ResponseMessage" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="VaultResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Response" type="ResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="GUID" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="ExpirationDate" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Last4" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="PaymentDescription" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="PaymentTypeID" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="RecurringResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="RecurringID" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="TransactionResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="AuthCode" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="AVSResult" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="CVVResult" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VANReference" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionID" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Last4" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="PaymentDescription" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Amount" type="xs:double" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="PaymentTypeID" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Reference1" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionDate" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="AuxiliaryData" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="EntryMode" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="TaxAmount" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="ShippingAmount" type="xs:double" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="BatchResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Response" type="ResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="BatchNumber" type="xs:string" />       
      <xs:element minOccurs="0" maxOccurs="1" name="BatchReference" type="xs:string" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Net" type="xs:double" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Count" type="xs:int" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="BatchPayment" type="BatchPaymentType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfTransactionStatusQueryResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="TransactionStatusQueryResponseType" nillable="true" type="TransactionStatusQueryResponseType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="TransactionStatusQueryResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Response" type="ResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultResponse" type="VaultResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="RecurringResponse" type="RecurringResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionResponse" type="TransactionResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionSettlementStatus" type="TransactionSettlementStatusType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Customer" type="PersonType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="TransactionSettlementStatusType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionType" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="SettlementType" type="xs:string" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="SettlementDate" type="xs:string" />       
      <xs:element minOccurs="0" maxOccurs="1" name="BatchReference" type="xs:string" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfRecurringStatusQueryResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="RecurringStatusQueryResponseType" nillable="true" type="RecurringStatusQueryResponseType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="RecurringStatusQueryResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Responses" type="ArrayOfResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionResponses" type="ArrayOfTransactionResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="TransactionSettlementStatuses" type="ArrayOfTransactionSettlementStatusType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Customers" type="ArrayOfPersonType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="ResponseType" nillable="true" type="ResponseType" />     
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfTransactionResponseType">     
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="TransactionResponseType" nillable="true" type="TransactionResponseType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfTransactionSettlementStatusType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="TransactionSettlementStatusType" nillable="true" type="TransactionSettlementStatusType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfPersonType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="PersonType" nillable="true" type="PersonType" />     
     </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="VaultStatusQueryResponseType">     
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Response" type="ResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultResponse" type="VaultResponseType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="VaultAccountResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Response" type="ResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="VaultAccount" type="VaultAccountType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Merchant" type="MerchantType" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="AccountQueryResponseType"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="1" name="Response" type="ResponseType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Merchant" type="MerchantType" /> 
      <xs:element minOccurs="0" maxOccurs="1" name="Services" type="ArrayOfString" /> 
      <xs:element minOccurs="1" maxOccurs="1" name="Active" type="xs:boolean" /> 
    </xs:sequence> 
  </xs:complexType> 
  <xs:complexType name="ArrayOfString"> 
    <xs:sequence> 
      <xs:element minOccurs="0" maxOccurs="unbounded" name="string" nillable="true" type="xs:string" />     
    </xs:sequence> 
  </xs:complexType> 
</xs:schema> 
```
