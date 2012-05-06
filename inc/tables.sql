######################### Basic Tracking
create table ips(
	id int(11) unique not null auto_increment primary key,
	ip varchar(15) not null
);
create table fingerprints(
	id int(11) unique not null auto_increment primary key,
	useragent varchar(128) not null
);
	
######################### Dev management
create table devs(
	id int(11) unique auto_increment primary key not null,
	user varchar(64) unique not null,
	password varchar(64) not null,
	email varchar(128) unique not null,
	reputation int(2) default 0
);
create table dev_sessions(
	id int(11) unique auto_increment primary key not null,
	did int(11) not null,
	timestamp int(32) not null,
	expiry int(32) not null,
	iid int(11) not null,
	fid int(11) not null,
	token varchar(64) not null,
	expired int(1) default 0 not null
);
create table dev_actions(
	id int(11) unique auto_increment primary key not null,
	did int(11) not null,
	iid int(11) not null,
	fid int(11) not null,
	event varchar(128) not null, 							### Syntax [profile,project].[id].[action]
	timestamp int(32) not null
);

######################### Manager management
create table managers(
	id int(11) unique auto_increment primary key not null,
	user varchar(64) unique not null,
	email varchar(128) unique not null,
	reputation int(3) default 0
);
create table manager_sessions(
	id int(11) unique auto_increment primary key not null,
	mid int(11) not null,
	timestamp int(32) not null,
	expiry int(32) not null,
	iid int(11) not null,
	fid int(11) not null
);
create table manager_actions(
	id int(11) unique auto_increment primary key not null,
	did int(11) not null,
	iid int(11) not null,
	fid int(11) not null,
	event varchar(128) not null, 							### Syntax [profile,project].[id].[action]
	timestamp int(32) not null
);

######################### Project management
create table projects(
	id int(11) unique auto_increment primary key not null,
	title varchar(64) not null,
	description varchar(2048) not null,
	pmid int(11) not null,
	private int(1) default 0 not null,
	created int(32) not null,
	deadline_application int(32) not null,
	deadline int(32) not null,
	ETC int(32) default null,
	completed int(1) default 0 not null,
	closed int(1) default 0 not null,
	active int(1) default 1 not null
);
create table project_managers(
	id int(11) unique auto_increment primary key not null,
	pid int(11) not null,
	mid int(11) not null,
	reward int(4) not null default 0,
	reward_type varchar(16) not null default "GBP"
);
create table project_devs(
	id int(11) unique auto_increment primary key not null,
	pid int(11) not null,
	did int(11) not null,
	reward_share varchar(128) not null
);
create table project_updates(
	id int(11) not null unique auto_increment,
	did int(11) not null,
	title varchar(64) default "Untitled",
	description varchar(2048) not null,
	timestamp int(32)
);
create table project_bids(
	id int(11) unique not null auto_increment primary key,
	pid int(11) not null,
	did int(11) not null,
	timestamp int(32) not null,
	deadline int(32) not null,
	message varchar(2048)
);






	