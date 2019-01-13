afs12=# create table users(uid SERIAL primary key,first_name varchar(50) not null,last_name varchar(50) not null,email varchar(50) not null,password varchar(50) not null); 
CREATE TABLE
cryptowallet=# create table currency(id SERIAL primary key ,currency_name varchar(250) not null,currency_abbrivation varchar(20) not null);
CREATE TABLE
cryptowallet=# select * from currency;
 id | currency_name | currency_abbrivation 
----+---------------+----------------------
(0 rows)
cryptowallet=# cryptowallet=# create table purchase(id SERIAL primary key,uid SERIAL references users(uid), currency_id  int references currency(id),exchange_name varchar(100),current_rate float,quantity float,total_value float,date varchar(100),time varchar(100));

CREATE TABLE
cryptowallet=# select * from purchase;
 id | currency_id | exchange_name | current_rate | quantity | total_value 
----+-------------+---------------+--------------+----------+-------------
(0 rows)
insert into currency(currency_name, currency_abbrivation) values("Bitcoin","BTC");
insert into currency(currency_name, currency_abbrivation) values('XRP','XRP');
insert into currency(currency_name, currency_abbrivation) values('ETHERUM','ETH');
insert into currency(currency_name, currency_abbrivation) values('Bitcoin cash','BCH');
insert into currency (currency_name, currency_abbrivation)values('Stellar','XLM');
insert into currency(currency_name, currency_abbrivation) values('ELM','ELM');
insert into currency(currency_name, currency_abbrivation) values('Litecoin','LTC');
insert into currency(currency_name, currency_abbrivation) values('Tether','USDC');
insert into currency(currency_name, currency_abbrivation) values('Cardano','ADA');
insert into currency(currency_name, currency_abbrivation) values('Monero','XMR');

alter table purchase add uid int references users;

insert into purchase (uid, currency_id, exchange_name, current_rate, quantity, total_value, date, time)
values(1,1,'Bitbns',4000,2,8000,)

alter table users add role varchar(30);

(uid SERIAL primary key,first_name varchar(50) not null,last_name varchar(50) not null,email varchar(50) not null,password varchar(50) not null); 
CREATE TABLE



