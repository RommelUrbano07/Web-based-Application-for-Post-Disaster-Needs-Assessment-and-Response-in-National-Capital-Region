-- SELECT * FROM postdisastermgmt.adminaccount;
SELECT * FROM postdisastermgmt.barangay;
SELECT * FROM postdisastermgmt.city; 
-- SELECT * FROM postdisastermgmt.customer;
-- SELECT * FROM postdisastermgmt.family;
-- SELECT * FROM postdisastermgmt.masteradmin;
SELECT * FROM postdisastermgmt.person;
SELECT * FROM postdisastermgmt.region;
-- SELECT * FROM postdisastermgmt.victim;
-- SELECT * FROM postdisastermgmt.disaster;
-- SELECT * FROM postdisastermgmt.needs;

use postdisastermgmt;

Select * from victim;
 
Select * from Disaster;

Select * from needs;

Select * from historylog;

Delete from Needs where NeedsID<=1000;

Select count( distinct Disaster.DisasterID),Disaster.DisasterType,Region.RegionName,City.CityName,Barangay.BarangayName,Victim.VictimID,Needs.NeedsType,Needs.Quantity,Person.FirstName,Person.LastName,Person.MiddleName 	
from (Region inner join City on region.regionID=city.RegionID inner join Barangay on city.CityID=barangay.CityID 
inner join Disaster on Disaster.BarangayID=Barangay.barangayID inner join victim on Disaster.DisasterID=victim.DisasterID 
inner join needs on victim.needsID=needs.NeedsID inner join person on victim.PersonID=person.PersonID );

Select HistoryLog.TimeOfResolution
from (Region inner join City on region.regionID=city.RegionID inner join Barangay on city.CityID=barangay.CityID 
inner join Disaster on Disaster.BarangayID=Barangay.barangayID inner join historylog on Disaster.DisasterID=historylog.DisasterID 
inner join needs on HistoryLog.needsID=needs.NeedsID inner join person on HistoryLog.PersonID=person.PersonID );
