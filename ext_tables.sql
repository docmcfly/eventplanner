#
# Table structure for table 'tx_eventplanner_domain_model_event'
#
CREATE TABLE tx_eventplanner_domain_model_event (

	name varchar(255) DEFAULT '' NOT NULL,
	description text,
	register_end date DEFAULT NULL,
	event_coordinator int(11) unsigned DEFAULT '0',
	place_of_work int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_eventplanner_domain_model_placeofwork'
#
CREATE TABLE tx_eventplanner_domain_model_placeofwork (

	event int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	max_members int(11) DEFAULT '0' NOT NULL,
	members int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_eventplanner_domain_model_placeofwork'
#
CREATE TABLE tx_eventplanner_domain_model_placeofwork (

	event int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_eventplanner_domain_model_placeofwork'
#
CREATE TABLE tx_eventplanner_domain_model_placeofwork (
	categories int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_eventplanner_placeofwork_frontenduser_mm'
#
CREATE TABLE tx_eventplanner_placeofwork_frontenduser_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
