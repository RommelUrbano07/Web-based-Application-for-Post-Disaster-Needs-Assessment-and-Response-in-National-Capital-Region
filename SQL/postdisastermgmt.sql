Create database postdisastermgmt;
Use postdisastermgmt;

Create table Region(
RegionID int not null auto_increment,
RegionName varchar(50) not null,
Primary key (RegionID)
);

create table City(    
CityID int not null auto_increment,
RegionID int not null,
CityName varchar(50) not null,
Primary key (CityID),
Foreign key (RegionID) references Region(RegionID) on delete cascade on update cascade
);

create table Barangay (
BarangayID int not null auto_increment,
CityID int not null,
BarangayName varchar(50) not null,
Primary key (BarangayID),
Foreign key (CityID) references City(CityID) on delete cascade on update cascade
);

Create table Family(
FamilyID int not null auto_increment,
FamilyName varchar(50) not null,
Primary key (FamilyID)
);

Create table Person(
PersonID int not null auto_increment,
BarangayID int not null,
FirstName varchar(50) not null,
MiddleName varchar(50) not null,
LastName varchar(50) not null,
BirthDate date not null,
ContactNo varchar(100) not null,
Suffix varchar(50),
Gender boolean,
HouseNo varchar(100),
StreetName varchar(100),
Subdivision varchar(100),
HeadStatus boolean not null,
FamilyID int not null,
Primary Key (PersonID),
Foreign key (BarangayID) references Barangay(BarangayID) on delete cascade on update cascade,
Foreign key (FamilyID) references Family(FamilyID) on delete cascade on update cascade
);

Create table Customer(
User_ID int not null auto_increment,
PersonID int not null,
Username varchar(100) not null,
AccountPassword varchar(100) not null,
Primary Key (User_ID),
Foreign key (PersonID) references Person(PersonID) on delete cascade on update cascade
);


Create table adminAccount(
AdminID int not null auto_increment,
Username varchar(100) not null,
AccountPassword varchar(100) not null,
FirstName varchar(50) not null,
MiddleName varchar(50) not null,
LastName varchar(50) not null,
Suffix varchar(50),
Gender boolean,
MasterStatus boolean,
Primary Key(AdminID)
);

Create table Disaster(
DisasterID int not null auto_increment ,
DisasterType varchar(50) not null,
BarangayID int not null,
DateOfOccurence date not null,
Primary key (DisasterID),
Foreign key (BarangayID) references Barangay(BarangayID) on delete cascade on update cascade
);

Create table Needs(
NeedsID int not null auto_increment ,
NeedsType varchar(50) not null,
Quantity int not null,
Message varchar(200),
Primary Key(NeedsID)
); 

Create table Victim(
VictimID int not null auto_increment Primary Key,
NeedsID int not null,
PersonID int not null,
DisasterID int not null,
TimeOfReport time not null,
Subdivision varchar(100),
HouseNo varchar(100),
StreetName varchar(100)not null,
Foreign Key (NeedsID) references Needs(NeedsID) on delete cascade on update cascade,
Foreign Key (PersonID) references Person(PersonID) on delete cascade on update cascade,
Foreign Key (DisasterID) references Disaster(DisasterID) on delete cascade on update cascade
);

Create table HistoryLog(
HistoryID int not null auto_increment Primary Key,
NeedsID int not null,
PersonID int not null,
DisasterID int not null,
DateOfResolution date not null,
TimeOfResolution time not null,
Subdivision varchar(100),
HouseNo varchar(100),
StreetName varchar(100)not null,
Foreign Key (NeedsID) references Needs(NeedsID) on delete cascade on update cascade,
Foreign Key (PersonID) references Person(PersonID) on delete cascade on update cascade,
Foreign Key (DisasterID) references Disaster(DisasterID) on delete cascade on update cascade
);

Create table DonationPending(
DonationPendingID int not null auto_increment,
DonationDate date not null,
DonationDetails varchar(255) not null,
Primary Key (DonationPendingID)
);

Create Table DonationItemRequests(
DonationItemRequestsID int not null auto_increment,
DonationItem varchar(50) not null,
DonationQuantity int not null,
DonationPendingID int not null,
Primary key (DonationItemRequestsID),
Foreign key (DonationPendingID) references DonationPending(DonationPendingID)on delete cascade on update cascade
);

Create table Donor(
DonorID int not null auto_increment,
DonorFname varchar(50) not null,
DonorMname varchar(50) not null,
DonorLname varchar(50) not null,
DonorSuffix varchar(50),
DonationPendingID int not null,
Primary key (DonorID),
Foreign key (DonationPendingID) references DonationPending(DonationPendingID)on delete cascade on update cascade
);

Create table DonationItemTable(
DonationID int not null auto_increment,
DonationItem varchar(50) not null,
DonationQuantity int not null,
Primary key(DonationID)
);

Create table DonationLog(
DonationLogID int not null auto_increment,
DonationPendingID int not null,
DonationAcceptedDate date not null,
Primary Key (DonationLogID),
Foreign Key (DonationPendingID) references DonationPending(DonationPendingID) on delete cascade on update cascade
);

Create table AdminTransactionHistoryLog(
AdminHistoryID int not null auto_increment,
AdminUsername varchar(50) not null,
AdminTransactionLog varchar(255) not null,
TransactionDate date not null,
Primary Key (AdminHistoryID)
);

Create table News(
NewsID int not null auto_increment,
NewsContent varchar(255) not null,
NewsDate date not null,
NewsTime DateTime not null,
NewsAuthorFName varchar(255) not null,
NewsAuthorMName varchar(255) not null,
NewsAuthorLName varchar(255) not null,
NewsAuthorSuffix varchar(255),
Primary key (NewsID)
);

Create Table Notification(
NotificationID int not null auto_increment,
NotificationContent varchar(255) not null,
NotificationDate date not null,
NotificationTime DateTime not null,
CustomerID int not null,
Primary key (NotificationID),
Foreign key (CustomerID) references Customer(User_ID)
);

Create Table ReportTable(
ReportID int not null auto_increment,
AdminID int not null,
CityID int not null,
ReportContent varchar(255), 
Primary Key(ReportID),
Foreign Key(AdminID) references adminAccount(AdminID),
Foreign Key(CityID) references City(CityID)
); 


