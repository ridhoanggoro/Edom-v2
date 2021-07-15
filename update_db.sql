CREATE TABLE `evaluasi_kategori` (
  `seq_id` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nilai` tinyint(2) NOT NULL,
  KEY `kategori` (`kategori`),
  KEY `seq_id` (`seq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `form` (
  `seq_id` char(36) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` varchar(25) NOT NULL,
  PRIMARY KEY (`seq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `form_detail` (
  `form_id` char(36) NOT NULL,
  `id_pertanyaan` tinyint(2) unsigned NOT NULL,
  `last_save` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` varchar(25) NOT NULL,
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pertanyaan` (
  `seq_id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `no` tinyint(2) unsigned NOT NULL,
  `pertanyaan` tinytext NOT NULL,
  `kategori` enum('1. Reliability','2. Responsive','3. Assurance','4. Empathy','5. Tangible','-') NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` varchar(25) NOT NULL,
  PRIMARY KEY (`seq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
