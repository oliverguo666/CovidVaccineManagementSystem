drop database covidDB;
create database covidDB;

create table Company(
    CompanyName         Char(20)       NOT NULL,
    city                Char(20),
    Province            Char(10),
    PostalCode          Char(6),
    StreetNumber        INTEGER,
    StreetName          Char(20),
    PRIMARY KEY(CompanyName));

create table Vaccine(
    LotID               CHAR(6)        NOT NULL,
    Doses               INTEGER,
    ExpiryDate          DATE,
    ProduceDate         DATE,
    ProducedByCompany   Char(20)       NOT NULL,
    PRIMARY KEY(LotID),
    FOREIGN KEY(ProducedByCompany) REFERENCES Company(CompanyName));

create table VaccinationSite(
    SiteName            Char(20)       NOT NULL,
    city                Char(20),
    Province            Char(10),
    PostalCode          Char(6),
    StreetNumber        INTEGER,
    StreetName          Char(20),
    PRIMARY KEY(SiteName));

create table Patient(
    FName			   CHAR(20),
    LName			   CHAR(20),
    OHIP               CHAR(12)         NOT NULL,
    DateOfBirth        DATE,
    PRIMARY KEY(OHIP));

create table Spouse(
    FName	   		   CHAR(20),
    LName			   CHAR(20),
    OHIP               CHAR(12)         NOT NULL,
    PhoneNumber        CHAR(10)	        NOT NULL,
    PatientOHIP        CHAR(12)          NOT NULL,
    PRIMARY KEY(OHIP),
    FOREIGN KEY(PatientOHIP) REFERENCES Patient(OHIP));

create table VaccinationTrack(
    LotID              Char(6)         NOT NULL,
    PatientOHIP        CHAR(12)         NOT NULL,
    SiteName           Char(20)        NOT NULL,
    Date               DATE,
    Time               TIME,
    PRIMARY KEY(LotID, PatientOHIP, SiteName),
    FOREIGN KEY(LotID) REFERENCES Vaccine(LotID),
    FOREIGN KEY(PatientOHIP) REFERENCES Patient(OHIP),
    FOREIGN KEY(SiteName) REFERENCES VaccinationSite(SiteName));

create table ShipsTo(
    LotID              Char(6)         NOT NULL,
    SiteName           Char(20)        NOT NULL,
    PRIMARY KEY(LotID, SiteName),
    FOREIGN KEY(LotID) REFERENCES Vaccine(LotID),
    FOREIGN KEY(SiteName) REFERENCES VaccinationSite(SiteName));

create table MedicalPractice(
    MPName		       CHAR(20)        NOT NULL,
    PhoneNumber        CHAR(10)         NOT NULL,
    PRIMARY KEY(MPName));

create table Doctor(
    FName	   		   CHAR(20),
    LName			   CHAR(20),
    ID                 CHAR(9)         NOT NULL,
    AssociateWithMP    CHAR(20),
    PRIMARY KEY(ID),
    FOREIGN KEY(AssociateWithMP) REFERENCES MedicalPractice(MPName));

create table Nurse(
    FName	   		   CHAR(20),
    LName			   CHAR(20),
    ID                 CHAR(9)        NOT NULL,
    PRIMARY KEY(ID));

create table DoctorCredentials(
    workerID           CHAR(9)        NOT NULL,
    Credentials		   CHAR(20)        NOT NULL,
    PRIMARY KEY(Credentials, workerID),
    FOREIGN KEY(workerID) REFERENCES Doctor(ID));

create table NurseCredentials(
    workerID           CHAR(9)        NOT NULL,
    Credentials		   CHAR(20)        NOT NULL,
    PRIMARY KEY(Credentials, workerID),
    FOREIGN KEY(workerID) REFERENCES Nurse(ID));

create table DoctorWorksOn(
    DoctorID           CHAR(9)        NOT NULL,
    SiteName		   CHAR(20)        NOT NULL,
    PRIMARY KEY(SiteName, DoctorID),
    FOREIGN KEY(SiteName) REFERENCES VaccinationSite(SiteName),
    FOREIGN KEY(DoctorID) REFERENCES Doctor(ID));

create table NurseWorksOn(
    NurseID            CHAR(9)        NOT NULL,
    SiteName		   CHAR(20)        NOT NULL,
    PRIMARY KEY(SiteName, NurseID),
    FOREIGN KEY(SiteName) REFERENCES VaccinationSite(SiteName),
    FOREIGN KEY(NurseID) REFERENCES Nurse(ID));

insert into Company values
('Pfizer-BioNTech', NULL, NULL, NULL, NULL, NULL),
('Moderna', NULL, NULL, NULL, NULL, NULL),
('Johnson & Johnson’s Janssen', NULL, NULL, NULL, NULL, NULL)
;

insert into Vaccine values
('AL0219', 1, '2021-06-20', '2020-06-20', 'Pfizer-BioNTech'),
('AL0329', 2, '2021-07-10', '2020-07-10', 'Pfizer-BioNTech'),
('PG0138', 1, '2021-01-11', '2020-01-11', 'Moderna'),
('PG0175', 2, '2021-02-24', '2020-02-24', 'Moderna'),
('LM2239', 1, '2021-08-03', '2020-08-03', 'Johnson & Johnson’s Janssen'),
('LM2339', 2, '2021-08-15', '2020-08-15', 'Johnson & Johnson’s Janssen')
;

insert into Patient values
('Alice', 'Taylor', '5582-581-945', '1937-11-10'),
('Aniyah', 'Swift', '5563-354-372', '1962-09-15'),
('Kiana', 'Wardle', '5432-375-375', '1999-06-09'),
('Katy', 'Weeks', '7641-841-342', '1983-08-17'),
('Elliott', 'Caldwell', '8543-257-874', '1976-02-13'),
('Adem', 'Kramer', '8431-854-375', '1966-07-28')
;

insert into Spouse values
('Haiden', 'Moss', '4235-852-274', '8775554444', '5582-581-945'),
('Jeffery', 'Bush', '5511-584-237', '7786662222', '5563-354-372'),
('Kaiden', 'Wharton', '5754-112-378', '7789995555', '5432-375-375'),
('Betty', 'Dodd', '1423-875-571', '7745612233', '7641-841-342'),
('Zakir', 'Melton', '7210-585-574', '2223334444', '8543-257-874'),
('Miguel', 'Paul', '0547-575-785', '9996663333', '8431-854-375')
;

insert into VaccinationSite values
('Queens compus site', NULL, NULL, NULL, NULL, NULL),
('Kingston centre site', NULL, NULL, NULL, NULL, NULL),
('waterfall site', NULL, NULL, NULL, NULL, NULL),
('Cataraque Site', NULL, NULL, NULL, NULL, NULL),
('Limestone Site', NULL, NULL, NULL, NULL, NULL),
('Downtown Site', NULL, NULL, NULL, NULL, NULL),
('Cataraque Site', 'New York', 'New York', 100, 'Fifth Avenue')
;

insert into ShipsTo values
('AL0219', 'Cataraque Site'),
('AL0329', 'Cataraque Site'),
('PG0138', 'Limestone Site'),
('PG0175', 'Limestone Site'),
('LM2239', 'Kingston centre site'),
('LM2339', 'Kingston centre site')
;

insert into VaccinationTrack values
('AL0219', '5582-581-945', 'Cataraque Site', '2021-02-11', '16:20'),
('AL0329', '5563-354-372', 'Cataraque Site', '2021-03-11', '16:45'),
('PG0138', '5432-375-375', 'Limestone Site', '2021-03-12', '13:20'),
('PG0175', '8543-257-874', 'Limestone Site', '2021-04-15', '13:56'),
('LM2239', '7641-841-342', 'Kingston centre site', '2021-04-20', '10:30'),
('LM2239', '8431-854-375', 'Kingston centre site', '2021-04-20', Null)
;

insert into MedicalPractice values
('COVID Test1', '7783615155'),
('COVID Test2', '5556661111'),
('COVID Test3', '5558889999'),
('COVID Test4', '7786156354'),
('COVID Test5', '3333614561'),
('COVID Test6', '3333612582')
;

insert into Doctor values
('Sanah', 'Shea', '000000001', 'COVID Test1'),
('Conrad', 'Floyd','000000002', 'COVID Test1'),
('Pranav', 'Greenaway','000000003', 'COVID Test2'),
('Eliott', 'Sinclair','000000004', 'COVID Test4'),
('Reo', 'Prosser','000000005', 'COVID Test4'),
('Honor', 'Bowman','000000006', 'COVID Test6')
;

insert into DoctorCredentials values
('000000001', 'PhD'),
('000000001', 'NP'),
('000000003', 'Internship'),
('000000004', 'Internship'),
('000000005', 'Medical degree'),
('000000004', 'PA')
;

insert into DoctorWorksOn values
('000000001', 'Queens compus site'),
('000000002', 'Kingston centre site'),
('000000003', 'waterfall site'),
('000000004', 'Cataraque Site'),
('000000005', 'Limestone Site'),
('000000006', 'Downtown Site')
;

insert into Nurse values
('Deen', 'Daniel', '000000010'),
('Amie', 'Cantrell','000000020'),
('Cadi', 'Ridley','000000030'),
('Luisa', 'Wall','000000040'),
('Chris', 'Roy','000000050'),
('Tom', 'Bond','000000060' )
;

insert into NurseCredentials values
('000000010', 'RN'),
('000000010', 'LPN'),
('000000030', 'Internship'),
('000000040', 'Internship'),
('000000050', 'FAAN'),
('000000050', 'DNP')
;

insert into NurseWorksOn values
('000000010', 'Queens compus site'),
('000000020', 'Kingston centre site'),
('000000030', 'waterfall site'),
('000000040', 'Cataraque Site'),
('000000050', 'Limestone Site'),
('000000060', 'Downtown Site')
;