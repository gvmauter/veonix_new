DELETE FROM `am_optimizer_settings` WHERE `TYPE`!='a';
ALTER TABLE `am_optimizer_settings` DROP `TYPE`;
ALTER TABLE `am_optimizer_settings` DROP INDEX `IX_SITE_TYPE`, ADD INDEX `IX_SITE` (`SITE_ID`) USING BTREE;