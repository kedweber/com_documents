-- ----------------------------
--  Table structure for `#__documents_documents`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__documents_documents` (
  `documents_document_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `cck_fieldset_id` int(11) NOT NULL DEFAULT '61',
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'document',
  `ordering` bigint(20) unsigned NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `locked_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_by` int(11) NOT NULL DEFAULT '0',
  `extension` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  PRIMARY KEY (`documents_document_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- ----------------------------
--  Table structure for `#__documents_files`
-- ----------------------------
CREATE TABLE IF NOT EXISTS `#__documents_files` (
  `documents_file_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'file',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `locked_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`documents_file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;