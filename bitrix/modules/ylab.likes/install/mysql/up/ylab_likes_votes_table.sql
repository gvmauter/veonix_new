CREATE TABLE `ylab_likes_votes` (
  `ID`           INT        NOT NULL AUTO_INCREMENT,
  `CONTENT_ID`   INT(11)    NOT NULL
  COMMENT 'ID ��������',
  `CONTENT_TYPE` TINYINT(4) NOT NULL
  COMMENT '��� �������� (��. ��������� ��� ������)',
  `USER_ID`      INT(11)    NOT NULL
  COMMENT 'ID ������������',
  `VOTE`         TINYINT(4) NOT NULL
  COMMENT '0-������� 1-����',
  INDEX `LIKES_INDEX` (`CONTENT_ID`, `CONTENT_TYPE`, `USER_ID`, `VOTE`),
  PRIMARY KEY (`ID`)
)
  COLLATE = 'utf8_unicode_ci'
  ENGINE = InnoDB;