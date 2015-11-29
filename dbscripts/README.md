Instructions for creating the required database tables.

1. Create a schema for your application
CREATE SCHEMA 'blinx';

2. Create a user who can access this schema - e.g., blinxdb

3. Create the below tables on the schema.

    CREATE TABLE 'm_user' (
     'user_id' int(6) NOT NULL AUTO_INCREMENT,
     'first_name' varchar(20) COLLATE utf8_unicode_ci NOT NULL,
     'last_name' varchar(20) COLLATE utf8_unicode_ci NOT NULL,
     'email_id' varchar(40) COLLATE utf8_unicode_ci NOT NULL,
     'mobile_number' varchar(10) COLLATE utf8_unicode_ci NOT NULL,
     'alternative_mobile_number' int(10) NOT NULL,
     'date_of_birth' varchar(15) COLLATE utf8_unicode_ci NOT NULL,
     'gender' varchar(6) COLLATE utf8_unicode_ci NOT NULL,
     'qualification' varchar(30) COLLATE utf8_unicode_ci NOT NULL,
     'institution' varchar(60) COLLATE utf8_unicode_ci NOT NULL,
     'occupation' varchar(30) COLLATE utf8_unicode_ci NOT NULL,
     'state' varchar(30) COLLATE utf8_unicode_ci NOT NULL,
     'district' varchar(30) COLLATE utf8_unicode_ci NOT NULL,
     'location' varchar(30) COLLATE utf8_unicode_ci NOT NULL,
     'address' varchar(40) COLLATE utf8_unicode_ci NOT NULL,
     'document_path' varchar(40) COLLATE utf8_unicode_ci NOT NULL,
     'create_time' timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     'update_time' timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     'cud' varchar(1) COLLATE utf8_unicode_ci NOT NULL,
     'verified' int(1) NOT NULL DEFAULT '0',
     'm_id' int(6) NOT NULL,
     'verifier_mid' varchar(30) COLLATE utf8_unicode_ci NOT NULL,
     'user_type' varchar(10) COLLATE utf8_unicode_ci NOT NULL,
     'pwd' varchar(15) COLLATE utf8_unicode_ci NOT NULL,
     PRIMARY KEY ('user_id')
    ) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

