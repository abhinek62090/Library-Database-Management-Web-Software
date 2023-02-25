create user library identified by library
/
grant dba to library
/
conn library/library
/

create table student
(
stud_id nvarchar2(10),
sfnm nvarchar2(10),
slnm nvarchar2(40),
scourse nvarchar2(10),
syear nvarchar2(40),
scontact nvarchar2(40),
sage nvarchar2(10),
sbirthdt nvarchar2(15),
sgender nvarchar2(10)
)
/

create or replace trigger bistudent before insert
on student for each row
Declare

Begin
	if(:new.stud_id is null)then
		raise_application_error(-20001,'Student id should not null');
	end if;
	if(:new.sfnm is null)then
		raise_application_error(-20002,'Student first name should not null');
	end if;
	if(:new.slnm is null)then
		raise_application_error(-20003,'Student last name should not null');
	end if;
	if(:new.scourse is null)then
		raise_application_error(-20004,'Student course should not null');
	end if;	
	if(:new.syear is null)then
		raise_application_error(-20005,'Student year should not null');
	end if;
	if(:new.scontact is null)then
		raise_application_error(-20006,'Student contact should not null');
	end if;
	if(:new.sage is null)then
		raise_application_error(-20007,'Student age should not null');
	end if;
	if(:new.sbirthdt is null)then
		raise_application_error(-20008,'Student birthday should not null');
	end if;
	if(:new.sgender is null)then
		raise_application_error(-20009,'Student gender should not null');
	end if;
	for i in 1..length(:new.sfnm)
	loop
		if(ascii(upper(substr(:new.sfnm,i,1)))not between 65 and 90)then
			raise_application_error(-20010,'should accept only alphabet');
		end if;
	end loop;
	for i in 1..length(:new.slnm)
	loop
		if(ascii(upper(substr(:new.slnm,i,1)))not between 65 and 90)then
			raise_application_error(-20011,'should accept only alphabet');
		end if;
	end loop;
end;
/

create table book
(
book_id nvarchar2(10),
btitle nvarchar2(10),
bedition nvarchar2(40),
bauthor nvarchar2(10),
bpublisher nvarchar2(40),
bcopies nvarchar2(40),
bsource nvarchar2(15),
bcost nvarchar2(10),
bremarks nvarchar2(10)
)
/

create or replace trigger bibook before insert
on book for each row
Declare

Begin
	if(:new.book_id is null)then
		raise_application_error(-20001,'Book id should not null');
	end if;
	if(:new.btitle is null)then
		raise_application_error(-20002,'Book title should not null');
	end if;
	if(:new.bedition is null)then
		raise_application_error(-20003,'Book edition should not null');
	end if;
	if(:new.bauthor is null)then
		raise_application_error(-20004,'Book author should not null');
	end if;
	if(:new.bpublisher is null)then
		raise_application_error(-20005,'Book publisher should not null');
	end if;
	if(:new.bcopies is null)then
		raise_application_error(-20006,'Book copies should not null');
	end if;
	if(:new.bsource is null)then
		raise_application_error(-20007,'Book source should not null');
	end if;
	if(:new.bcost is null)then
		raise_application_error(-20008,'Book cost should not null');
	end if;
	if(:new.bremarks is null)then
		raise_application_error(-20009,'Book remarks should not null');
	end if;
	for i in 1..length(:new.bcost)
	loop
		if(ascii(substr(:new.bcost,i,1))not between 48 and 57)then
			raise_application_error(-20010,'should accept only number');
		end if;
	end loop;
end;
/
	
	

create table users
(
staff_id nvarchar2(10),
sname nvarchar2(10),
scontact nvarchar2(40),
semail nvarchar2(10),
saddress nvarchar2(40),
spassword nvarchar2(40),
stype nvarchar2(10)
)
/

create or replace trigger biusers before insert
on users for each row
Declare

Begin
	if(:new.staff_id is null)then
		raise_application_error(-20001,'staff id should not null');
	end if;
	if(:new.sname is null)then
		raise_application_error(-20002,'staff name should not null');
	end if;
	if(:new.scontact is null)then
		raise_application_error(-20003,'staff contact should not null');
	end if;
	if(:new.semail is null)then
		raise_application_error(-20004,'staff email should not null');
	end if;
	if(:new.saddress is null)then
		raise_application_error(-20005,'staff address should not null');
	end if;
	if(:new.spassword is null)then
		raise_application_error(-20006,'staff password should not null');
	end if;
	if(:new.stype is null)then
		raise_application_error(-20007,'staff types should not null');
	end if;
	for i in 1..length(:new.sname)
	loop
		if(ascii(upper(substr(:new.sname,i,1)))not between 65 and 90)then
			raise_application_error(-20008,'should accept only alphabet');
		end if;
	end loop;
	for i in 1..length(:new.scontact)
	loop
		if(ascii(substr(:new.scontact,i,1))not between 48 and 57)then
			raise_application_error(-20009,'should accept only number');
		end if;
	end loop;
end;
/
	
	

create table book_return_records
(
borrowers_id nvarchar2(10),
book_id nvarchar2(10),
btitle nvarchar2(40),
stud_id nvarchar2(10),
staff_id nvarchar2(10),
stud_no_copies nvarchar2(40),
releasedt nvarchar2(40),
duedt nvarchar2(10)
)
/

create or replace trigger bibook_return_records before insert
on book_return_records for each row
Declare

Begin
	if(:new.borrowers_id is null)then
		raise_application_error(-20001,'borrowers id should not null');
	end if;
	if(:new.book_id is null)then
		raise_application_error(-20002,'book id should not null');
	end if;
	if(:new.btitle is null)then
		raise_application_error(-20003,'btitle should not null');
	end if;
	if(:new.stud_id is null)then
		raise_application_error(-20004,'stud id should not null');
	end if;
	if(:new.staff_id is null)then
		raise_application_error(-20005,'staff id should not null');
	end if;
	if(:new.stud_no_copies is null)then
		raise_application_error(-20006,'stud no copies should not null');
	end if;
	if(:new.releasedt is null)then
		raise_application_error(-20007,'release date should not null');
	end if;
	if(:new.duedt is null)then
		raise_application_error(-20008,'due date should not null');
	end if;
end;
/
	
create table borrowers_records
(
borrowers_id nvarchar2(10),
book_id nvarchar2(10),
btitle nvarchar2(40),
stud_id nvarchar2(10),
staff_id nvarchar2(10),
stud_no_copies nvarchar2(40),
releasedt nvarchar2(40),
duedt nvarchar2(10)
)
/

create or replace trigger biborrowers_records before insert
on borrowers_records for each row
Declare

Begin
	if(:new.borrowers_id is null)then
		raise_application_error(-20001,'borrowers id should not null');
	end if;
	if(:new.book_id is null)then
		raise_application_error(-20002,'book id should not null');
	end if;
	if(:new.btitle is null)then
		raise_application_error(-20003,'btitle should not null');
	end if;
	if(:new.stud_id is null)then
		raise_application_error(-20004,'stud id should not null');
	end if;
	if(:new.staff_id is null)then
		raise_application_error(-20005,'staff id should not null');
	end if;
	if(:new.stud_no_copies is null)then
		raise_application_error(-20006,'stud no copies should not null');
	end if;
	if(:new.releasedt is null)then
		raise_application_error(-20007,'release date should not null');
	end if;
	if(:new.duedt is null)then
		raise_application_error(-20008,'due date should not null');
	end if;
end;
/


create table login
(
	id nvarchar2(10),
	pwd nvarchar2(10)
)
/
insert into login values('lib','lib')
/
commit
/
