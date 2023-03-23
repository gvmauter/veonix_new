create table if not exists goodde_yandex_turbo_feed (
	ID int(11) not null auto_increment,
	IBLOCK_ID int(11) not null,
	TIMESTAMP_X timestamp,
	MODIFIED_BY int(18),
	DATE_CREATE datetime,
	CREATED_BY int(18),
	ACTIVE varchar(1) not null default 'Y',
	ALL_FEED varchar(1) not null default 'N',
	LID varchar(2) not null,
	NAME varchar(255) not null,
	DETAIL_URL varchar(255) default null,
	IPROPERTY_TEMPLATES text default null,
	PRICE_CODE varchar(255) default null,
	SERVER_ADDRESS varchar(255) not null,
	DESCRIPTION text default null,
	SORT int(11) not null default '500',
	TEMPLATE varchar(100) not null default '.default',
	ITEM_STATUS varchar(20) default null,
	MENU text default null,
	FORM varchar(255) default null,
	FIGCAPTION_VIDEO varchar(255) default null,
	FEEDBACK text default null,
	CONTENT varchar(100) default 'DETAIL_TEXT',
	PUB_DATE varchar(20)  not null,
	`LIMIT` int(11) not null default '1000',
	ACTIVE_DATE varchar(1) not null default 'N',
	ELEMENTS_FILTER text null default null,
	OFFERS_FILTER text null default null,
	ELEMENTS_CONDITION text null default null,
	OFFERS_CONDITION text null default null,
	PROPERTY text default null,
	OFFERS_PROPERTY text default null,
	GALLERY varchar(255) default null,
	RELATED_LIMIT int(11) default '4',
	RELATED_SOURCE varchar(100) not null default 'QUEUE',
	SHARE_NETWORKS varchar(255) default null,
	DATE_ADD_FEED datetime,
	IS_NOT_UPLOAD_FEED varchar(1) not null default 'N',
	IN_AGENT varchar(1) not null default 'N',
	INDEX goodde_yandex_turbo_archive(IBLOCK_ID),
	primary key (ID)
)
ENGINE = InnoDB;

create table if not exists goodde_yandex_turbo_archive (
	ID int(11) not null auto_increment,
	DATE_CREATE timestamp,
	FEED_ID int(11) not null,
	ELEMENT_ID int(11) not null,
	IBLOCK_ID int(11) not null,
	LINK varchar(255) not null,
	DELETE_MARK varchar(1) not null default 'N',
	ITEM text default null,
	primary key (ID),
	INDEX goodde_yandex_turbo_archive(FEED_ID)
)
ENGINE = InnoDB;

create table if not exists goodde_yandex_turbo_task (
	ID int(11) not null auto_increment,
	DATE_CREATE timestamp,
	NAME varchar(255) default null,
	FEED_ID int(11) not null,
	LID varchar(2) not null,
	TASK_ID varchar(255) not null,
	`MODE` varchar(10) default null,
	RSS_FEED_DELETE varchar(1) not null default 'N',
	primary key (ID),
	INDEX goodde_yandex_turbo_task(FEED_ID)
)
ENGINE = InnoDB;