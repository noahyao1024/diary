create database IF NOT EXISTS `myblog`;

use myblog;

create table IF NOT EXISTS `myblog_title`
(
  blog_id BIGINT(20) unsigned NOT NULL auto_increment COMMENT 'ID',
  blog_title VARCHAR(64) NOT NULL COMMENT '标题',
  blog_status TINYINT(4) UNSIGNED NOT NULL COMMENT '状态',
  blog_type INT(10) unsigned NOT NULL COMMENT '类型',
  blog_weight INT(10) unsigned NOT NULL COMMENT '权重',
  create_time INT(10) unsigned NOT NULL COMMENT '创建时间',
  op_time INT(10) unsigned NOT NULL COMMENT '操作时间',
  extra_info VARCHAR(12800) NOT NULL COMMENT '扩展信息',
  PRIMARY KEY(`blog_id`),
  KEY `query_by_ctime`(`create_time`),
  KEY `query_by_otime`(`op_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='博客基本信息';

create table IF NOT EXISTS `myblog_content`
(
    blog_id BIGINT(20) unsigned NOT NULL,
    blog_content VARCHAR(12800) NOT NULL COMMENT '博客内容',
    KEY `id` (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='博客内容信息';
