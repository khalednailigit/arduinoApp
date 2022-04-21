
/*reset an auto increment*/
ALTER TABLE table_name AUTO_INCREMENT = value;
/*1 for exemple on personnel*/
ALTER TABLE personnel AUTO_INCREMENT = 1;
/*                   Data  table                 */

CREATE TABLE Data ( id bigint not null PRIMARY KEY AUTO_INCREMENT,sensorID INT(10) NOT null,temp float(10) NOT null,humidity float(10)  NOT null,time TIMESTAMP);
alter table data alter time set default  CURRENT_TIMESTAMP;

/*or*/
CREATE TABLE Data ( id bigint not null PRIMARY KEY AUTO_INCREMENT,sensorID INT(10) NOT null,temp float(10) NOT null,humidity float(10)  NOT null,time TIMESTAMP default CURRENT_TIMESTAMP);
insert into Data (sensorID,temp,humidity) values (1,24,49);/*random values*/
/*                   alert  table                 */

CREATE TABLE alert ( id bigint not null PRIMARY KEY AUTO_INCREMENT,temp float(10) NOT null,humidity float(10)  NOT null,time TIMESTAMP);
alter table alert alter time set default  CURRENT_TIMESTAMP;

/*or*/
CREATE TABLE alert ( id bigint not null PRIMARY KEY AUTO_INCREMENT,temp float(10) NOT null,humidity float(10)  NOT null,time TIMESTAMP default CURRENT_TIMESTAMP);
insert into alert (temp,humidity) values (25,49);/*random values*/


/*                   Personel table                   */

CREATE TABLE personnel (idpers int not null primary key AUTO_INCREMENT,username varchar(20) unique not null,pwd CHAR(224),isadmin boolean);


insert into personnel(username,pwd,isadmin) values ('iRam',SHA2('iram123', 224),true);/*using sha2 to encrypt an admin account*/



SELECT * FROM `personnel` WHERE pwd=SHA2('Rootuser!', 224);/* checking if sha2 encryption wokrs*/

/*                      pincodes                        */
CREATE TABLE pins (idpin int not null primary key AUTO_INCREMENT,pin varchar(4) not null);
insert into pins(pin) values(0000); /* first pin */



