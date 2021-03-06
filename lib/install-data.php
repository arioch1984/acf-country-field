<?php
global $wpdb;
$plugin_dir = ABSPATH.'/wp-content/plugins/acf-country-field/';
$json = file_get_contents($plugin_dir.'json/countries-to-cities.json');
$cities_by_country = json_decode($json);
?>

#
# Table structure for table 'countries'
#

DROP TABLE IF EXISTS <?php echo $wpdb->prefix; ?>countries;
CREATE TABLE <?php echo $wpdb->prefix; ?>countries (
  id int(3) unsigned NOT NULL,
  country varchar(50) default '0',
  PRIMARY KEY  (id),
  UNIQUE KEY id (id),
  KEY id_2 (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


#
# Table structure for table 'cities'
#

DROP TABLE IF EXISTS <?php echo $wpdb->prefix; ?>cities;
CREATE TABLE <?php echo $wpdb->prefix; ?>cities (
id int(3) unsigned NOT NULL auto_increment,
city varchar(200) default NULL,
country int(3) unsigned default '0',
PRIMARY KEY  (id),
UNIQUE KEY id (id),
KEY id_2 (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


#
# Dumping data for table 'countries' and 'cities'
#
<?php $index = 0; ?>
<?php foreach($cities_by_country as $country_name => $cities): ?>
INSERT INTO <?php echo $wpdb->prefix; ?>countries (id, country) VALUES(<?php echo $index; ?>, "<?php echo $country_name; ?>");
	<?php foreach($cities as $city): ?>
		INSERT INTO <?php echo $wpdb->prefix; ?>cities (id, city, country) VALUES(NULL, "<?php echo $city; ?>", "<?php echo $index; ?>");
	<?php endforeach; ?>
	<?php $index++; ?>
<?php endforeach; ?>



