CREATE TABLE IF NOT EXISTS `produit` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(256) NOT NULL,
`description` text NOT NULL,
`price` int(255) NOT NULL,
`category_id` int(11) NOT NULL,
`created` datetime,
`modified` timestamp DEFAULT CURRENT_TIMESTAMP,
primary key (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO produit VALUES (1, 'PEN', 'Pen Blue', 1.23, 1, '2020-7-04', '2020-9-03');
INSERT INTO produit VALUES (2, 'PC', 'Apple products', 300.99, 2, '2019-1-01', '2019-5-14');
INSERT INTO produit VALUES (3, 'Car', 'Mercedes benz', 985470.47, 3, '2019-2-06', '2019-6-23');