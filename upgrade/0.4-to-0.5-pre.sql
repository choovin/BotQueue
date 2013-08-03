DROP TABLE IF EXISTS `metajobs`;
CREATE TABLE `meta_jobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bot_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `subjob_id` int(11) unsigned NOT NULL,
  `subjob_type` enum('print', 'slice', 'timelapse', 'render', 'imageresize'),
  `status` enum('available', 'taken', 'qa', 'pass', 'fail', 'canceled'),
  `progress` float NOT NULL DEFAULT '0',
  `output_log` text NOT NULL,
  `error_log` text NOT NULL,
  `add_date` datetime NOT NULL,
  `taken_date` datetime NOT NULL,
  `finish_date` datetime NOT NULL,
  `qa_date` datetime NOT NULL,
  `uid` char(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `subjob_type` (`subjob_type`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `print_jobs`;
CREATE TABLE `print_jobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `metajob_id` int(11) unsigned NOT NULL,
  `file_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `metajob_id` (`metajob_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table slice_jobs add `metajob_id` int(11) unsigned NOT NULL;
alter table slice_jobs add `is_expired` tinyint(4) unsigned NOT NULL default 0;
alter table slice_jobs add key(metajob_id);

alter table jobs add `slicejob_id` int(11) unsigned NOT NULL after slice_job_id;
alter table jobs set slicejob_id = slice_job_id;
alter table jobs drop slice_job_id;
alter table jobs add `printjob_id` int(11) unsigned NOT NULL before slicejob_id;
