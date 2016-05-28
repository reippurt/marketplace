<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 *
	 */

	public function __construct()
	{

		parent::__construct();
		$this->load->model('get');
		$this->load->model('ad');
		

		
	}

	public function init()
	{

		$this->output->set_template('main');

	}

	public function index()
	{

		$data['ads_available'] = $this->ad->get_available();
				
		$data['selectList'] = $this->get->category_listing();
		
		$this->init();
		$this->load->view('main', $data);
	}


	public function convertToSlug()
	{
		$table = $this->db->get('subcategories')->result();
		
		foreach ($table as $value) {
			$newValue = $this->custom->slugify($value->subcategoryName);
			$this->db->where('subcategoryId', $value->subcategoryId)->update('subcategories', array('subcategorySlug' => $newValue));
		}
	}


	public function convertUserId(){
		$ads = 	$this->db->get('users')->result();
		
		foreach ($ads as $key) {
			//$this->db->where('id', $key->id)->update('users', array('hashUserId' => md5($key->id)));
		}
	}

	public function insertRegions($index = false)
	{

			$regions = array();






$arr = array();




;$arr[] = ['Region Hovedstaden', '800'	,'Høje Taastrup']
;$arr[] = ['Region Hovedstaden', '900'	,'København C']
;$arr[] = ['Region Hovedstaden', '917'	,'Københavns Pakkecent']
;$arr[] = ['Region Hovedstaden', '960'	,'Udland']
;$arr[] = ['Region Hovedstaden', '999'	,'København C']
;$arr[] = ['Region Hovedstaden', '1000',	'København K']
;$arr[] = ['Region Hovedstaden', '1050',	'København K']
;$arr[] = ['Region Hovedstaden', '1051',	'København K']
;$arr[] = ['Region Hovedstaden', '1052',	'København K']
;$arr[] = ['Region Hovedstaden', '1053',	'København K']
;$arr[] = ['Region Hovedstaden', '1054',	'København K']
;$arr[] = ['Region Hovedstaden', '1055',	'København K']
;$arr[] = ['Region Hovedstaden', '1056',	'København K']
;$arr[] = ['Region Hovedstaden', '1057',	'København K']
;$arr[] = ['Region Hovedstaden', '1058',	'København K']
;$arr[] = ['Region Hovedstaden', '1059',	'København K']
;$arr[] = ['Region Hovedstaden', '1060',	'København K']
;$arr[] = ['Region Hovedstaden', '1061',	'København K']
;$arr[] = ['Region Hovedstaden', '1062',	'København K']
;$arr[] = ['Region Hovedstaden', '1063',	'København K']
;$arr[] = ['Region Hovedstaden', '1064',	'København K']
;$arr[] = ['Region Hovedstaden', '1065',	'København K']
;$arr[] = ['Region Hovedstaden', '1066',	'København K']
;$arr[] = ['Region Hovedstaden', '1067',	'København K']
;$arr[] = ['Region Hovedstaden', '1068',	'København K']
;$arr[] = ['Region Hovedstaden', '1069',	'København K']
;$arr[] = ['Region Hovedstaden', '1070',	'København K']
;$arr[] = ['Region Hovedstaden', '1071',	'København K']
;$arr[] = ['Region Hovedstaden', '1072',	'København K']
;$arr[] = ['Region Hovedstaden', '1073',	'København K']
;$arr[] = ['Region Hovedstaden', '1074',	'København K']
;$arr[] = ['Region Hovedstaden', '1092',	'København K']
;$arr[] = ['Region Hovedstaden', '1093',	'København K']
;$arr[] = ['Region Hovedstaden', '1095',	'København K']
;$arr[] = ['Region Hovedstaden', '1098',	'København K']
;$arr[] = ['Region Hovedstaden', '1100',	'København K']
;$arr[] = ['Region Hovedstaden', '1101',	'København K']
;$arr[] = ['Region Hovedstaden', '1102',	'København K']
;$arr[] = ['Region Hovedstaden', '1103',	'København K']
;$arr[] = ['Region Hovedstaden', '1104',	'København K']
;$arr[] = ['Region Hovedstaden', '1105',	'København K']
;$arr[] = ['Region Hovedstaden', '1106',	'København K']
;$arr[] = ['Region Hovedstaden', '1107',	'København K']
;$arr[] = ['Region Hovedstaden', '1110',	'København K']
;$arr[] = ['Region Hovedstaden', '1111',	'København K']
;$arr[] = ['Region Hovedstaden', '1112',	'København K']
;$arr[] = ['Region Hovedstaden', '1113',	'København K']
;$arr[] = ['Region Hovedstaden', '1114',	'København K']
;$arr[] = ['Region Hovedstaden', '1115',	'København K']
;$arr[] = ['Region Hovedstaden', '1116',	'København K']
;$arr[] = ['Region Hovedstaden', '1117',	'København K']
;$arr[] = ['Region Hovedstaden', '1118',	'København K']
;$arr[] = ['Region Hovedstaden', '1119',	'København K']
;$arr[] = ['Region Hovedstaden', '1120',	'København K']
;$arr[] = ['Region Hovedstaden', '1121',	'København K']
;$arr[] = ['Region Hovedstaden', '1122',	'København K']
;$arr[] = ['Region Hovedstaden', '1123',	'København K']
;$arr[] = ['Region Hovedstaden', '1124',	'København K']
;$arr[] = ['Region Hovedstaden', '1125',	'København K']
;$arr[] = ['Region Hovedstaden', '1126',	'København K']
;$arr[] = ['Region Hovedstaden', '1127',	'København K']
;$arr[] = ['Region Hovedstaden', '1128',	'København K']
;$arr[] = ['Region Hovedstaden', '1129',	'København K']
;$arr[] = ['Region Hovedstaden', '1130',	'København K']
;$arr[] = ['Region Hovedstaden', '1131',	'København K']
;$arr[] = ['Region Hovedstaden', '1140',	'København K']
;$arr[] = ['Region Hovedstaden', '1147',	'København K']
;$arr[] = ['Region Hovedstaden', '1148',	'København K']
;$arr[] = ['Region Hovedstaden', '1150',	'København K']
;$arr[] = ['Region Hovedstaden', '1151',	'København K']
;$arr[] = ['Region Hovedstaden', '1152',	'København K']
;$arr[] = ['Region Hovedstaden', '1153',	'København K']
;$arr[] = ['Region Hovedstaden', '1154',	'København K']
;$arr[] = ['Region Hovedstaden', '1155',	'København K']
;$arr[] = ['Region Hovedstaden', '1156',	'København K']
;$arr[] = ['Region Hovedstaden', '1157',	'København K']
;$arr[] = ['Region Hovedstaden', '1158',	'København K']
;$arr[] = ['Region Hovedstaden', '1159',	'København K']
;$arr[] = ['Region Hovedstaden', '1160',	'København K']
;$arr[] = ['Region Hovedstaden', '1161',	'København K']
;$arr[] = ['Region Hovedstaden', '1162',	'København K']
;$arr[] = ['Region Hovedstaden', '1164',	'København K']
;$arr[] = ['Region Hovedstaden', '1165',	'København K']
;$arr[] = ['Region Hovedstaden', '1166',	'København K']
;$arr[] = ['Region Hovedstaden', '1167',	'København K']
;$arr[] = ['Region Hovedstaden', '1168',	'København K']
;$arr[] = ['Region Hovedstaden', '1169',	'København K']
;$arr[] = ['Region Hovedstaden', '1170',	'København K']
;$arr[] = ['Region Hovedstaden', '1171',	'København K']
;$arr[] = ['Region Hovedstaden', '1172',	'København K']
;$arr[] = ['Region Hovedstaden', '1173',	'København K']
;$arr[] = ['Region Hovedstaden', '1174',	'København K']
;$arr[] = ['Region Hovedstaden', '1175',	'København K']
;$arr[] = ['Region Hovedstaden', '1200',	'København K']
;$arr[] = ['Region Hovedstaden', '1201',	'København K']
;$arr[] = ['Region Hovedstaden', '1202',	'København K']
;$arr[] = ['Region Hovedstaden', '1203',	'København K']
;$arr[] = ['Region Hovedstaden', '1204',	'København K']
;$arr[] = ['Region Hovedstaden', '1205',	'København K']
;$arr[] = ['Region Hovedstaden', '1206',	'København K']
;$arr[] = ['Region Hovedstaden', '1207',	'København K']
;$arr[] = ['Region Hovedstaden', '1208',	'København K']
;$arr[] = ['Region Hovedstaden', '1209',	'København K']
;$arr[] = ['Region Hovedstaden', '1210',	'København K']
;$arr[] = ['Region Hovedstaden', '1211',	'København K']
;$arr[] = ['Region Hovedstaden', '1213',	'København K']
;$arr[] = ['Region Hovedstaden', '1214',	'København K']
;$arr[] = ['Region Hovedstaden', '1215',	'København K']
;$arr[] = ['Region Hovedstaden', '1216',	'København K']
;$arr[] = ['Region Hovedstaden', '1217',	'København K']
;$arr[] = ['Region Hovedstaden', '1218',	'København K']
;$arr[] = ['Region Hovedstaden', '1219',	'København K']
;$arr[] = ['Region Hovedstaden', '1220',	'København K']
;$arr[] = ['Region Hovedstaden', '1221',	'København K']
;$arr[] = ['Region Hovedstaden', '1240',	'København K']
;$arr[] = ['Region Hovedstaden', '1250',	'København K']
;$arr[] = ['Region Hovedstaden', '1251',	'København K']
;$arr[] = ['Region Hovedstaden', '1253',	'København K']
;$arr[] = ['Region Hovedstaden', '1254',	'København K']
;$arr[] = ['Region Hovedstaden', '1255',	'København K']
;$arr[] = ['Region Hovedstaden', '1256',	'København K']
;$arr[] = ['Region Hovedstaden', '1257',	'København K']
;$arr[] = ['Region Hovedstaden', '1259',	'København K']
;$arr[] = ['Region Hovedstaden', '1260',	'København K']
;$arr[] = ['Region Hovedstaden', '1261',	'København K']
;$arr[] = ['Region Hovedstaden', '1263',	'København K']
;$arr[] = ['Region Hovedstaden', '1264',	'København K']
;$arr[] = ['Region Hovedstaden', '1265',	'København K']
;$arr[] = ['Region Hovedstaden', '1266',	'København K']
;$arr[] = ['Region Hovedstaden', '1267',	'København K']
;$arr[] = ['Region Hovedstaden', '1268',	'København K']
;$arr[] = ['Region Hovedstaden', '1270',	'København K']
;$arr[] = ['Region Hovedstaden', '1271',	'København K']
;$arr[] = ['Region Hovedstaden', '1291',	'København K']
;$arr[] = ['Region Hovedstaden', '1300',	'København K']
;$arr[] = ['Region Hovedstaden', '1301',	'København K']
;$arr[] = ['Region Hovedstaden', '1302',	'København K']
;$arr[] = ['Region Hovedstaden', '1303',	'København K']
;$arr[] = ['Region Hovedstaden', '1304',	'København K']
;$arr[] = ['Region Hovedstaden', '1306',	'København K']
;$arr[] = ['Region Hovedstaden', '1307',	'København K']
;$arr[] = ['Region Hovedstaden', '1308',	'København K']
;$arr[] = ['Region Hovedstaden', '1309',	'København K']
;$arr[] = ['Region Hovedstaden', '1310',	'København K']
;$arr[] = ['Region Hovedstaden', '1311',	'København K']
;$arr[] = ['Region Hovedstaden', '1312',	'København K']
;$arr[] = ['Region Hovedstaden', '1313',	'København K']
;$arr[] = ['Region Hovedstaden', '1314',	'København K']
;$arr[] = ['Region Hovedstaden', '1315',	'København K']
;$arr[] = ['Region Hovedstaden', '1316',	'København K']
;$arr[] = ['Region Hovedstaden', '1317',	'København K']
;$arr[] = ['Region Hovedstaden', '1318',	'København K']
;$arr[] = ['Region Hovedstaden', '1319',	'København K']
;$arr[] = ['Region Hovedstaden', '1320',	'København K']
;$arr[] = ['Region Hovedstaden', '1321',	'København K']
;$arr[] = ['Region Hovedstaden', '1322',	'København K']
;$arr[] = ['Region Hovedstaden', '1323',	'København K']
;$arr[] = ['Region Hovedstaden', '1324',	'København K']
;$arr[] = ['Region Hovedstaden', '1325',	'København K']
;$arr[] = ['Region Hovedstaden', '1326',	'København K']
;$arr[] = ['Region Hovedstaden', '1327',	'København K']
;$arr[] = ['Region Hovedstaden', '1328',	'København K']
;$arr[] = ['Region Hovedstaden', '1329',	'København K']
;$arr[] = ['Region Hovedstaden', '1350',	'København K']
;$arr[] = ['Region Hovedstaden', '1352',	'København K']
;$arr[] = ['Region Hovedstaden', '1353',	'København K']
;$arr[] = ['Region Hovedstaden', '1354',	'København K']
;$arr[] = ['Region Hovedstaden', '1355',	'København K']
;$arr[] = ['Region Hovedstaden', '1356',	'København K']
;$arr[] = ['Region Hovedstaden', '1357',	'København K']
;$arr[] = ['Region Hovedstaden', '1358',	'København K']
;$arr[] = ['Region Hovedstaden', '1359',	'København K']
;$arr[] = ['Region Hovedstaden', '1360',	'København K']
;$arr[] = ['Region Hovedstaden', '1361',	'København K']
;$arr[] = ['Region Hovedstaden', '1362',	'København K']
;$arr[] = ['Region Hovedstaden', '1363',	'København K']
;$arr[] = ['Region Hovedstaden', '1364',	'København K']
;$arr[] = ['Region Hovedstaden', '1365',	'København K']
;$arr[] = ['Region Hovedstaden', '1366',	'København K']
;$arr[] = ['Region Hovedstaden', '1367',	'København K']
;$arr[] = ['Region Hovedstaden', '1368',	'København K']
;$arr[] = ['Region Hovedstaden', '1369',	'København K']
;$arr[] = ['Region Hovedstaden', '1370',	'København K']
;$arr[] = ['Region Hovedstaden', '1371',	'København K']
;$arr[] = ['Region Hovedstaden', '1400',	'København K']
;$arr[] = ['Region Hovedstaden', '1401',	'København K']
;$arr[] = ['Region Hovedstaden', '1402',	'København K']
;$arr[] = ['Region Hovedstaden', '1403',	'København K']
;$arr[] = ['Region Hovedstaden', '1406',	'København K']
;$arr[] = ['Region Hovedstaden', '1407',	'København K']
;$arr[] = ['Region Hovedstaden', '1408',	'København K']
;$arr[] = ['Region Hovedstaden', '1409',	'København K']
;$arr[] = ['Region Hovedstaden', '1410',	'København K']
;$arr[] = ['Region Hovedstaden', '1411',	'København K']
;$arr[] = ['Region Hovedstaden', '1412',	'København K']
;$arr[] = ['Region Hovedstaden', '1413',	'København K']
;$arr[] = ['Region Hovedstaden', '1414',	'København K']
;$arr[] = ['Region Hovedstaden', '1415',	'København K']
;$arr[] = ['Region Hovedstaden', '1416',	'København K']
;$arr[] = ['Region Hovedstaden', '1417',	'København K']
;$arr[] = ['Region Hovedstaden', '1418',	'København K']
;$arr[] = ['Region Hovedstaden', '1419',	'København K']
;$arr[] = ['Region Hovedstaden', '1420',	'København K']
;$arr[] = ['Region Hovedstaden', '1421',	'København K']
;$arr[] = ['Region Hovedstaden', '1422',	'København K']
;$arr[] = ['Region Hovedstaden', '1423',	'København K']
;$arr[] = ['Region Hovedstaden', '1424',	'København K']
;$arr[] = ['Region Hovedstaden', '1425',	'København K']
;$arr[] = ['Region Hovedstaden', '1426',	'København K']
;$arr[] = ['Region Hovedstaden', '1427',	'København K']
;$arr[] = ['Region Hovedstaden', '1428',	'København K']
;$arr[] = ['Region Hovedstaden', '1429',	'København K']
;$arr[] = ['Region Hovedstaden', '1430',	'København K']
;$arr[] = ['Region Hovedstaden', '1431',	'København K']
;$arr[] = ['Region Hovedstaden', '1432',	'København K']
;$arr[] = ['Region Hovedstaden', '1433',	'København K']
;$arr[] = ['Region Hovedstaden', '1434',	'København K']
;$arr[] = ['Region Hovedstaden', '1435',	'København K']
;$arr[] = ['Region Hovedstaden', '1436',	'København K']
;$arr[] = ['Region Hovedstaden', '1437',	'København K']
;$arr[] = ['Region Hovedstaden', '1438',	'København K']
;$arr[] = ['Region Hovedstaden', '1439',	'København K']
;$arr[] = ['Region Hovedstaden', '1440',	'København K']
;$arr[] = ['Region Hovedstaden', '1441',	'København K']
;$arr[] = ['Region Hovedstaden', '1448',	'København K']
;$arr[] = ['Region Hovedstaden', '1450',	'København K']
;$arr[] = ['Region Hovedstaden', '1451',	'København K']
;$arr[] = ['Region Hovedstaden', '1452',	'København K']
;$arr[] = ['Region Hovedstaden', '1453',	'København K']
;$arr[] = ['Region Hovedstaden', '1454',	'København K']
;$arr[] = ['Region Hovedstaden', '1455',	'København K']
;$arr[] = ['Region Hovedstaden', '1456',	'København K']
;$arr[] = ['Region Hovedstaden', '1457',	'København K']
;$arr[] = ['Region Hovedstaden', '1458',	'København K']
;$arr[] = ['Region Hovedstaden', '1459',	'København K']
;$arr[] = ['Region Hovedstaden', '1460',	'København K']
;$arr[] = ['Region Hovedstaden', '1462',	'København K']
;$arr[] = ['Region Hovedstaden', '1463',	'København K']
;$arr[] = ['Region Hovedstaden', '1464',	'København K']
;$arr[] = ['Region Hovedstaden', '1466',	'København K']
;$arr[] = ['Region Hovedstaden', '1467',	'København K']
;$arr[] = ['Region Hovedstaden', '1468',	'København K']
;$arr[] = ['Region Hovedstaden', '1470',	'København K']
;$arr[] = ['Region Hovedstaden', '1471',	'København K']
;$arr[] = ['Region Hovedstaden', '1472',	'København K']
;$arr[] = ['Region Hovedstaden', '1500',	'København V']
;$arr[] = ['Region Hovedstaden', '1513',	'Centraltastning']
;$arr[] = ['Region Hovedstaden', '1532',	'København V']
;$arr[] = ['Region Hovedstaden', '1533',	'København V']
;$arr[] = ['Region Hovedstaden', '1550',	'København V']
;$arr[] = ['Region Hovedstaden', '1551',	'København V']
;$arr[] = ['Region Hovedstaden', '1552',	'København V']
;$arr[] = ['Region Hovedstaden', '1553',	'København V']
;$arr[] = ['Region Hovedstaden', '1554',	'København V']
;$arr[] = ['Region Hovedstaden', '1555',	'København V']
;$arr[] = ['Region Hovedstaden', '1556',	'København V']
;$arr[] = ['Region Hovedstaden', '1557',	'København V']
;$arr[] = ['Region Hovedstaden', '1558',	'København V']
;$arr[] = ['Region Hovedstaden', '1559',	'København V']
;$arr[] = ['Region Hovedstaden', '1560',	'København V']
;$arr[] = ['Region Hovedstaden', '1561',	'København V']
;$arr[] = ['Region Hovedstaden', '1562',	'København V']
;$arr[] = ['Region Hovedstaden', '1563',	'København V']
;$arr[] = ['Region Hovedstaden', '1564',	'København V']
;$arr[] = ['Region Hovedstaden', '1566',	'København V']
;$arr[] = ['Region Hovedstaden', '1567',	'København V']
;$arr[] = ['Region Hovedstaden', '1568',	'København V']
;$arr[] = ['Region Hovedstaden', '1569',	'København V']
;$arr[] = ['Region Hovedstaden', '1570',	'København V']
;$arr[] = ['Region Hovedstaden', '1571',	'København V']
;$arr[] = ['Region Hovedstaden', '1572',	'København V']
;$arr[] = ['Region Hovedstaden', '1573',	'København V']
;$arr[] = ['Region Hovedstaden', '1574',	'København V']
;$arr[] = ['Region Hovedstaden', '1575',	'København V']
;$arr[] = ['Region Hovedstaden', '1576',	'København V']
;$arr[] = ['Region Hovedstaden', '1577',	'København V']
;$arr[] = ['Region Hovedstaden', '1592',	'København V']
;$arr[] = ['Region Hovedstaden', '1599',	'København V']
;$arr[] = ['Region Hovedstaden', '1600',	'København V']
;$arr[] = ['Region Hovedstaden', '1601',	'København V']
;$arr[] = ['Region Hovedstaden', '1602',	'København V']
;$arr[] = ['Region Hovedstaden', '1603',	'København V']
;$arr[] = ['Region Hovedstaden', '1604',	'København V']
;$arr[] = ['Region Hovedstaden', '1606',	'København V']
;$arr[] = ['Region Hovedstaden', '1607',	'København V']
;$arr[] = ['Region Hovedstaden', '1608',	'København V']
;$arr[] = ['Region Hovedstaden', '1609',	'København V']
;$arr[] = ['Region Hovedstaden', '1610',	'København V']
;$arr[] = ['Region Hovedstaden', '1611',	'København V']
;$arr[] = ['Region Hovedstaden', '1612',	'København V']
;$arr[] = ['Region Hovedstaden', '1613',	'København V']
;$arr[] = ['Region Hovedstaden', '1614',	'København V']
;$arr[] = ['Region Hovedstaden', '1615',	'København V']
;$arr[] = ['Region Hovedstaden', '1616',	'København V']
;$arr[] = ['Region Hovedstaden', '1617',	'København V']
;$arr[] = ['Region Hovedstaden', '1618',	'København V']
;$arr[] = ['Region Hovedstaden', '1619',	'København V']
;$arr[] = ['Region Hovedstaden', '1620',	'København V']
;$arr[] = ['Region Hovedstaden', '1621',	'København V']
;$arr[] = ['Region Hovedstaden', '1622',	'København V']
;$arr[] = ['Region Hovedstaden', '1623',	'København V']
;$arr[] = ['Region Hovedstaden', '1624',	'København V']
;$arr[] = ['Region Hovedstaden', '1630',	'København V']
;$arr[] = ['Region Hovedstaden', '1631',	'København V']
;$arr[] = ['Region Hovedstaden', '1632',	'København V']
;$arr[] = ['Region Hovedstaden', '1633',	'København V']
;$arr[] = ['Region Hovedstaden', '1634',	'København V']
;$arr[] = ['Region Hovedstaden', '1635',	'København V']
;$arr[] = ['Region Hovedstaden', '1650',	'København V']
;$arr[] = ['Region Hovedstaden', '1651',	'København V']
;$arr[] = ['Region Hovedstaden', '1652',	'København V']
;$arr[] = ['Region Hovedstaden', '1653',	'København V']
;$arr[] = ['Region Hovedstaden', '1654',	'København V']
;$arr[] = ['Region Hovedstaden', '1655',	'København V']
;$arr[] = ['Region Hovedstaden', '1656',	'København V']
;$arr[] = ['Region Hovedstaden', '1657',	'København V']
;$arr[] = ['Region Hovedstaden', '1658',	'København V']
;$arr[] = ['Region Hovedstaden', '1659',	'København V']
;$arr[] = ['Region Hovedstaden', '1660',	'København V']
;$arr[] = ['Region Hovedstaden', '1661',	'København V']
;$arr[] = ['Region Hovedstaden', '1662',	'København V']
;$arr[] = ['Region Hovedstaden', '1663',	'København V']
;$arr[] = ['Region Hovedstaden', '1664',	'København V']
;$arr[] = ['Region Hovedstaden', '1665',	'København V']
;$arr[] = ['Region Hovedstaden', '1666',	'København V']
;$arr[] = ['Region Hovedstaden', '1667',	'København V']
;$arr[] = ['Region Hovedstaden', '1668',	'København V']
;$arr[] = ['Region Hovedstaden', '1669',	'København V']
;$arr[] = ['Region Hovedstaden', '1670',	'København V']
;$arr[] = ['Region Hovedstaden', '1671',	'København V']
;$arr[] = ['Region Hovedstaden', '1672',	'København V']
;$arr[] = ['Region Hovedstaden', '1673',	'København V']
;$arr[] = ['Region Hovedstaden', '1674',	'København V']
;$arr[] = ['Region Hovedstaden', '1675',	'København V']
;$arr[] = ['Region Hovedstaden', '1676',	'København V']
;$arr[] = ['Region Hovedstaden', '1677',	'København V']
;$arr[] = ['Region Hovedstaden', '1699',	'København V']
;$arr[] = ['Region Hovedstaden', '1700',	'København V']
;$arr[] = ['Region Hovedstaden', '1701',	'København V']
;$arr[] = ['Region Hovedstaden', '1702',	'København V']
;$arr[] = ['Region Hovedstaden', '1703',	'København V']
;$arr[] = ['Region Hovedstaden', '1704',	'København V']
;$arr[] = ['Region Hovedstaden', '1705',	'København V']
;$arr[] = ['Region Hovedstaden', '1706',	'København V']
;$arr[] = ['Region Hovedstaden', '1707',	'København V']
;$arr[] = ['Region Hovedstaden', '1708',	'København V']
;$arr[] = ['Region Hovedstaden', '1709',	'København V']
;$arr[] = ['Region Hovedstaden', '1710',	'København V']
;$arr[] = ['Region Hovedstaden', '1711',	'København V']
;$arr[] = ['Region Hovedstaden', '1712',	'København V']
;$arr[] = ['Region Hovedstaden', '1714',	'København V']
;$arr[] = ['Region Hovedstaden', '1715',	'København V']
;$arr[] = ['Region Hovedstaden', '1716',	'København V']
;$arr[] = ['Region Hovedstaden', '1717',	'København V']
;$arr[] = ['Region Hovedstaden', '1718',	'København V']
;$arr[] = ['Region Hovedstaden', '1719',	'København V']
;$arr[] = ['Region Hovedstaden', '1720',	'København V']
;$arr[] = ['Region Hovedstaden', '1721',	'København V']
;$arr[] = ['Region Hovedstaden', '1722',	'København V']
;$arr[] = ['Region Hovedstaden', '1723',	'København V']
;$arr[] = ['Region Hovedstaden', '1724',	'København V']
;$arr[] = ['Region Hovedstaden', '1725',	'København V']
;$arr[] = ['Region Hovedstaden', '1726',	'København V']
;$arr[] = ['Region Hovedstaden', '1727',	'København V']
;$arr[] = ['Region Hovedstaden', '1728',	'København V']
;$arr[] = ['Region Hovedstaden', '1729',	'København V']
;$arr[] = ['Region Hovedstaden', '1730',	'København V']
;$arr[] = ['Region Hovedstaden', '1731',	'København V']
;$arr[] = ['Region Hovedstaden', '1732',	'København V']
;$arr[] = ['Region Hovedstaden', '1733',	'København V']
;$arr[] = ['Region Hovedstaden', '1734',	'København V']
;$arr[] = ['Region Hovedstaden', '1735',	'København V']
;$arr[] = ['Region Hovedstaden', '1736',	'København V']
;$arr[] = ['Region Hovedstaden', '1737',	'København V']
;$arr[] = ['Region Hovedstaden', '1738',	'København V']
;$arr[] = ['Region Hovedstaden', '1739',	'København V']
;$arr[] = ['Region Hovedstaden', '1749',	'København V']
;$arr[] = ['Region Hovedstaden', '1750',	'København V']
;$arr[] = ['Region Hovedstaden', '1751',	'København V']
;$arr[] = ['Region Hovedstaden', '1752',	'København V']
;$arr[] = ['Region Hovedstaden', '1753',	'København V']
;$arr[] = ['Region Hovedstaden', '1754',	'København V']
;$arr[] = ['Region Hovedstaden', '1755',	'København V']
;$arr[] = ['Region Hovedstaden', '1756',	'København V']
;$arr[] = ['Region Hovedstaden', '1757',	'København V']
;$arr[] = ['Region Hovedstaden', '1758',	'København V']
;$arr[] = ['Region Hovedstaden', '1759',	'København V']
;$arr[] = ['Region Hovedstaden', '1760',	'København V']
;$arr[] = ['Region Hovedstaden', '1761',	'København V']
;$arr[] = ['Region Hovedstaden', '1762',	'København V']
;$arr[] = ['Region Hovedstaden', '1763',	'København V']
;$arr[] = ['Region Hovedstaden', '1764',	'København V']
;$arr[] = ['Region Hovedstaden', '1765',	'København V']
;$arr[] = ['Region Hovedstaden', '1766',	'København V']
;$arr[] = ['Region Hovedstaden', '1770',	'København V']
;$arr[] = ['Region Hovedstaden', '1771',	'København V']
;$arr[] = ['Region Hovedstaden', '1772',	'København V']
;$arr[] = ['Region Hovedstaden', '1773',	'København V']
;$arr[] = ['Region Hovedstaden', '1774',	'København V']
;$arr[] = ['Region Hovedstaden', '1775',	'København V']
;$arr[] = ['Region Hovedstaden', '1777',	'København V']
;$arr[] = ['Region Hovedstaden', '1780',	'København V']
;$arr[] = ['Region Hovedstaden', '1785',	'København V']
;$arr[] = ['Region Hovedstaden', '1786',	'København V']
;$arr[] = ['Region Hovedstaden', '1787',	'København V']
;$arr[] = ['Region Hovedstaden', '1790',	'København V']
;$arr[] = ['Region Hovedstaden', '1799',	'København V']
;$arr[] = ['Region Hovedstaden', '1800',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1801',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1802',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1803',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1804',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1805',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1806',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1807',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1808',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1809',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1810',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1810',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1811',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1812',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1813',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1814',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1815',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1816',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1817',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1818',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1819',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1820',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1822',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1823',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1824',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1825',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1826',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1827',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1828',	'Frederiksberg C'];
$arr[] = ['Region Hovedstaden', '1829',	'Frederiksberg C'];
$arr[] = ['Region Hovedstaden', '1850',	'Frederiksberg C'];
$arr[] = ['Region Hovedstaden', '1851',	'Frederiksberg C'];
$arr[] = ['Region Hovedstaden', '1852',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1853',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1854',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1855',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1856',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1857',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1860',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1861',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1862',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1863',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1864',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1865',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1866',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1867',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1868',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1870',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1871',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1872',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1873',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1874',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1875',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1876',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1877',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1878',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1879',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1900',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1901',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1902',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1903',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1904',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1905',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1906',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1908',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1909',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1910',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1911',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1912',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1913',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1914',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1915',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1916',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1917',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1920',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1921',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1922',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1923',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1924',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1925',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1926',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1927',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1928',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1950',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1951',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1952',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1953',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1954',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1955',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1956',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1957',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1958',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1959',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1960',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1961',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1962',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1963',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1964',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1965',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1966',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1967',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1970',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1971',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1972',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1973',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '1974',	'Frederiksberg C']
;$arr[] = ['Region Hovedstaden', '2000',	'Frederiksberg']
;$arr[] = ['Region Hovedstaden', '2000',	'Frederiksberg']
;$arr[] = ['Region Hovedstaden', '2100',	'København Ø']
;$arr[] = ['Region Hovedstaden', '2150',	'Nordhavn']
;$arr[] = ['Region Hovedstaden', '2200',	'København N']
;$arr[] = ['Region Hovedstaden', '2200',	'København N']
;$arr[] = ['Region Hovedstaden', '2300',	'København S']
;$arr[] = ['Region Hovedstaden', '2300',	'København S']
;$arr[] = ['Region Hovedstaden', '2400',	'København NV']
;$arr[] = ['Region Hovedstaden', '2450',	'København SV']
;$arr[] = ['Region Hovedstaden', '2500',	'Valby']
;$arr[] = ['Region Hovedstaden', '2500',	'Valby']
;$arr[] = ['Region Hovedstaden', '2600',	'Glostrup']
;$arr[] = ['Region Hovedstaden', '2600',	'Glostrup']
;$arr[] = ['Region Hovedstaden', '2600',	'Glostrup']
;$arr[] = ['Region Hovedstaden', '2605',	'Brøndby']
;$arr[] = ['Region Hovedstaden', '2610',	'Rødovre']
;$arr[] = ['Region Hovedstaden', '2610',	'Rødovre']
;$arr[] = ['Region Hovedstaden', '2610',	'Rødovre']
;$arr[] = ['Region Hovedstaden', '2620',	'Albertslund']
;$arr[] = ['Region Hovedstaden', '2620',	'Albertslund']
;$arr[] = ['Region Hovedstaden', '2625',	'Vallensbæk']
;$arr[] = ['Region Hovedstaden', '2630',	'Taastrup']
;$arr[] = ['Region Hovedstaden', '2635',	'Ishøj']
;$arr[] = ['Region Hovedstaden', '2640',	'Hedehusene']
;$arr[] = ['Region Hovedstaden', '2640',	'Hedehusene']
;$arr[] = ['Region Sjælland', '2640',	'Hedehusene']
;$arr[] = ['Region Sjælland', '2640',	'Hedehusene']
;$arr[] = ['Region Hovedstaden', '2650',	'Hvidovre']
;$arr[] = ['Region Hovedstaden', '2650',	'Hvidovre']
;$arr[] = ['Region Hovedstaden', '2660',	'Brøndby Strand']
;$arr[] = ['Region Hovedstaden', '2660',	'Brøndby Strand']
;$arr[] = ['Region Hovedstaden', '2665',	'Vallensbæk Strand']
;$arr[] = ['Region Sjælland', '2670',	'Greve']
;$arr[] = ['Region Sjælland', '2680',	'Solrød Strand']
;$arr[] = ['Region Sjælland', '2690',	'Karlslunde']
;$arr[] = ['Region Sjælland', '2690',	'Karlslunde']
;$arr[] = ['Region Hovedstaden', '2700',	'Brønshøj']
;$arr[] = ['Region Hovedstaden', '2720',	'Vanløse']
;$arr[] = ['Region Hovedstaden', '2720',	'Vanløse']
;$arr[] = ['Region Hovedstaden', '2730',	'Herlev']
;$arr[] = ['Region Hovedstaden', '2730',	'Herlev']
;$arr[] = ['Region Hovedstaden', '2730',	'Herlev']
;$arr[] = ['Region Hovedstaden', '2730',	'Herlev']
;$arr[] = ['Region Hovedstaden', '2740',	'Skovlunde']
;$arr[] = ['Region Hovedstaden', '2740',	'Skovlunde']
;$arr[] = ['Region Hovedstaden', '2750',	'Ballerup']
;$arr[] = ['Region Hovedstaden', '2750',	'Ballerup']
;$arr[] = ['Region Hovedstaden', '2750',	'Ballerup']
;$arr[] = ['Region Hovedstaden', '2760',	'Måløv']
;$arr[] = ['Region Hovedstaden', '2765',	'Smørum']
;$arr[] = ['Region Hovedstaden', '2770',	'Kastrup']
;$arr[] = ['Region Hovedstaden', '2770',	'Kastrup']
;$arr[] = ['Region Hovedstaden', '2791',	'Dragør']
;$arr[] = ['Region Hovedstaden', '2791',	'Dragør']
;$arr[] = ['Region Hovedstaden', '2800',	'Kongens Lyngby']
;$arr[] = ['Region Hovedstaden', '2800',	'Kongens Lyngby']
;$arr[] = ['Region Hovedstaden', '2800',	'Kongens Lyngby']
;$arr[] = ['Region Hovedstaden', '2800',	'Kongens Lyngby']
;$arr[] = ['Region Hovedstaden', '2820',	'Gentofte']
;$arr[] = ['Region Hovedstaden', '2820',	'Gentofte']
;$arr[] = ['Region Hovedstaden', '2830',	'Virum']
;$arr[] = ['Region Hovedstaden', '2830',	'Virum']
;$arr[] = ['Region Hovedstaden', '2840',	'Holte']
;$arr[] = ['Region Hovedstaden', '2840',	'Holte']
;$arr[] = ['Region Hovedstaden', '2850',	'Nærum']
;$arr[] = ['Region Hovedstaden', '2860',	'Søborg']
;$arr[] = ['Region Hovedstaden', '2860',	'Søborg']
;$arr[] = ['Region Hovedstaden', '2870',	'Dyssegård']
;$arr[] = ['Region Hovedstaden', '2880',	'Bagsværd']
;$arr[] = ['Region Hovedstaden', '2880',	'Bagsværd']
;$arr[] = ['Region Hovedstaden', '2880',	'Bagsværd']
;$arr[] = ['Region Hovedstaden', '2900',	'Hellerup']
;$arr[] = ['Region Hovedstaden', '2900',	'Hellerup']
;$arr[] = ['Region Hovedstaden', '2920',	'Charlottenlund']
;$arr[] = ['Region Hovedstaden', '2930',	'Klampenborg']
;$arr[] = ['Region Hovedstaden', '2930',	'Klampenborg']
;$arr[] = ['Region Hovedstaden', '2942',	'Skodsborg']
;$arr[] = ['Region Hovedstaden', '2950',	'Vedbæk']
;$arr[] = ['Region Hovedstaden', '2950',	'Vedbæk']
;$arr[] = ['Region Hovedstaden', '2960',	'Rungsted Kyst']
;$arr[] = ['Region Hovedstaden', '2970',	'Hørsholm']
;$arr[] = ['Region Hovedstaden', '2970',	'Hørsholm']
;$arr[] = ['Region Hovedstaden', '2970',	'Hørsholm']
;$arr[] = ['Region Hovedstaden', '2980',	'Kokkedal']
;$arr[] = ['Region Hovedstaden', '2980',	'Kokkedal']
;$arr[] = ['Region Hovedstaden', '2990',	'Nivå']
;$arr[] = ['Region Hovedstaden', '3000',	'Helsingør']
;$arr[] = ['Region Hovedstaden', '3050',	'Humlebæk']
;$arr[] = ['Region Hovedstaden', '3060',	'Espergærde']
;$arr[] = ['Region Hovedstaden', '3060',	'Espergærde']
;$arr[] = ['Region Hovedstaden', '3070',	'Snekkersten']
;$arr[] = ['Region Hovedstaden', '3080',	'Tikøb']
;$arr[] = ['Region Hovedstaden', '3100',	'Hornbæk']
;$arr[] = ['Region Hovedstaden', '3100',	'Hornbæk']
;$arr[] = ['Region Hovedstaden', '3120',	'Dronningmølle']
;$arr[] = ['Region Hovedstaden', '3140',	'Ålsgårde']
;$arr[] = ['Region Hovedstaden', '3150',	'Hellebæk']
;$arr[] = ['Region Hovedstaden', '3200',	'Helsinge']
;$arr[] = ['Region Hovedstaden', '3200',	'Helsinge']
;$arr[] = ['Region Hovedstaden', '3210',	'Vejby']
;$arr[] = ['Region Hovedstaden', '3220',	'Tisvildeleje']
;$arr[] = ['Region Hovedstaden', '3230',	'Græsted']
;$arr[] = ['Region Hovedstaden', '3230',	'Græsted']
;$arr[] = ['Region Hovedstaden', '3230',	'Græsted']
;$arr[] = ['Region Hovedstaden', '3250',	'Gilleleje']
;$arr[] = ['Region Hovedstaden', '3300',	'Frederiksværk']
;$arr[] = ['Region Hovedstaden', '3300',	'Frederiksværk']
;$arr[] = ['Region Hovedstaden', '3310',	'Ølsted']
;$arr[] = ['Region Hovedstaden', '3310',	'Ølsted']
;$arr[] = ['Region Hovedstaden', '3320',	'Skævinge']
;$arr[] = ['Region Hovedstaden', '3320',	'Skævinge']
;$arr[] = ['Region Hovedstaden', '3330',	'Gørløse']
;$arr[] = ['Region Hovedstaden', '3360',	'Liseleje']
;$arr[] = ['Region Hovedstaden', '3370',	'Melby']
;$arr[] = ['Region Hovedstaden', '3390',	'Hundested']
;$arr[] = ['Region Hovedstaden', '3400',	'Hillerød']
;$arr[] = ['Region Hovedstaden', '3400',	'Hillerød']
;$arr[] = ['Region Hovedstaden', '3400',	'Hillerød']
;$arr[] = ['Region Hovedstaden', '3450',	'Allerød']
;$arr[] = ['Region Hovedstaden', '3450',	'Allerød']
;$arr[] = ['Region Hovedstaden', '3450',	'Allerød']
;$arr[] = ['Region Hovedstaden', '3460',	'Birkerød']
;$arr[] = ['Region Hovedstaden', '3460',	'Birkerød']
;$arr[] = ['Region Hovedstaden', '3460',	'Birkerød']
;$arr[] = ['Region Hovedstaden', '3480',	'Fredensborg']
;$arr[] = ['Region Hovedstaden', '3480',	'Fredensborg']
;$arr[] = ['Region Hovedstaden', '3480',	'Fredensborg']
;$arr[] = ['Region Hovedstaden', '3490',	'Kvistgård']
;$arr[] = ['Region Hovedstaden', '3490',	'Kvistgård']
;$arr[] = ['Region Hovedstaden', '3500',	'Værløse']
;$arr[] = ['Region Hovedstaden', '3500',	'Værløse']
;$arr[] = ['Region Hovedstaden', '3500',	'Værløse']
;$arr[] = ['Region Hovedstaden', '3500',	'Værløse']
;$arr[] = ['Region Hovedstaden', '3500',	'Værløse']
;$arr[] = ['Region Hovedstaden', '3520',	'Farum']
;$arr[] = ['Region Hovedstaden', '3520',	'Farum']
;$arr[] = ['Region Hovedstaden', '3520',	'Farum']
;$arr[] = ['Region Hovedstaden', '3540',	'Lynge']
;$arr[] = ['Region Hovedstaden', '3540',	'Lynge']
;$arr[] = ['Region Hovedstaden', '3540',	'Lynge']
;$arr[] = ['Region Hovedstaden', '3540',	'Lynge']
;$arr[] = ['Region Hovedstaden', '3550',	'Slangerup']
;$arr[] = ['Region Hovedstaden', '3550',	'Slangerup']
;$arr[] = ['Region Hovedstaden', '3550',	'Slangerup']
;$arr[] = ['Region Hovedstaden', '3550',	'Slangerup']
;$arr[] = ['Region Hovedstaden', '3600',	'Frederikssund']
;$arr[] = ['Region Hovedstaden', '3600',	'Frederikssund']
;$arr[] = ['Region Hovedstaden', '3600',	'Frederikssund']
;$arr[] = ['Region Hovedstaden', '3630',	'Jægerspris']
;$arr[] = ['Region Hovedstaden', '3650',	'Ølstykke']
;$arr[] = ['Region Hovedstaden', '3660',	'Stenløse']
;$arr[] = ['Region Hovedstaden', '3670',	'Veksø Sjælland']
;$arr[] = ['Region Sjælland', '3670',	'Veksø Sjælland']
;$arr[] = ['Region Hovedstaden', '3700',	'Rønne']
;$arr[] = ['Region Hovedstaden', '3720',	'Aakirkeby']
;$arr[] = ['Region Hovedstaden', '3730',	'Nexø']
;$arr[] = ['Region Hovedstaden', '3740',	'Svaneke']
;$arr[] = ['Region Hovedstaden', '3751',	'Østermarie']
;$arr[] = ['Region Hovedstaden', '3760',	'Gudhjem']
;$arr[] = ['Region Hovedstaden', '3760',	'Gudhjem']
;$arr[] = ['Region Hovedstaden', '3770',	'Allinge']
;$arr[] = ['Region Hovedstaden', '3782',	'Klemensker']
;$arr[] = ['Region Hovedstaden', '3790',	'Hasle']
;$arr[] = ['Region Hovedstaden', '4000',	'Roskilde']
;$arr[] = ['Region Sjælland', '4000',	'Roskilde']
;$arr[] = ['Region Sjælland', '4000',	'Roskilde']
;$arr[] = ['Region Sjælland', '4030',	'Tune']
;$arr[] = ['Region Sjælland', '4030',	'Tune']
;$arr[] = ['Region Sjælland', '4040',	'Jyllinge']
;$arr[] = ['Region Hovedstaden', '4050',	'Skibby']
;$arr[] = ['Region Sjælland', '4060',	'Kirke Såby']
;$arr[] = ['Region Sjælland', '4070',	'Kirke Hyl
linge']
;$arr[] = ['Region Sjælland', '4100',	'Ringsted'
]
;$arr[] = ['Region Sjælland', '4100',	'Ringste
d']
;$arr[] = ['Region Sjælland', '4100',	'Ringste
d']
;$arr[] = ['Region Sjælland', '4100',	'Ringste
d']
;$arr[] = ['Region Sjælland', '4100',	'Ringste
d']
;$arr[] = ['Region Sjælland', '4100',	'Ringste
d']
;$arr[] = ['Region Sjælland', '4130',	'Viby Sj
ælland']
;$arr[] = ['Region Sjælland', '4130',	'Viby Sjællan
d']
;$arr[] = ['Region Sjælland', '4140',	'Borup'
]
;$arr[] = ['Region Sjælland', '4140',	'Boru
p']
;$arr[] = ['Region Sjælland', '4140',	'Boru
p']
;$arr[] = ['Region Sjælland', '4160',	'Herl
ufmagle']
;$arr[] = ['Region Sjælland', '4160',	'Herlufmagl
e']
;$arr[] = ['Region Sjælland', '4171',	'Glumsø'
]
;$arr[] = ['Region Sjælland', '4173',	'Fjenn
eslev']
;$arr[] = ['Region Sjælland', '4173',	'Fjennesle
v']
;$arr[] = ['Region Sjælland', '4174',	'Jystrup M
idtsj']
;$arr[] = ['Region Sjælland', '4174',	'Jystrup Midts
j']
;$arr[] = ['Region Sjælland', '4180',	'Sorø'
]
;$arr[] = ['Region Sjælland', '4180',	'Sor
ø']
;$arr[] = ['Region Sjælland', '4180',	'Sor
ø']
;$arr[] = ['Region Sjælland', '4190',	'Mun
ke Bjergby']
;$arr[] = ['Region Sjælland', '4190',	'Munke Bjergb
y']
;$arr[] = ['Region Sjælland', '4200',	'Slagelse'
]
;$arr[] = ['Region Sjælland', '4200',	'Slagels
e']
;$arr[] = ['Region Sjælland', '4200',	'Slagels
e']
;$arr[] = ['Region Sjælland', '4200',	'Slagels
e']
;$arr[] = ['Region Sjælland', '4220',	'Korsør'
]
;$arr[] = ['Region Sjælland', '4230',	'Skæls
kør']
;$arr[] = ['Region Sjælland', '4241',	'Vemmele
v']
;$arr[] = ['Region Sjælland', '4242',	'Boeslun
de']
;$arr[] = ['Region Sjælland', '4243',	'Rude'
]
;$arr[] = ['Region Sjælland', '4243',	'Rud
e']
;$arr[] = ['Region Sjælland', '4250',	'Fug
lebjerg']
;$arr[] = ['Region Sjælland', '4250',	'Fuglebjer
g']
;$arr[] = ['Region Sjælland', '4261',	'Dalmose'
]
;$arr[] = ['Region Sjælland', '4261',	'Dalmos
e']
;$arr[] = ['Region Sjælland', '4262',	'Sandve
d']
;$arr[] = ['Region Sjælland', '4262',	'Sandve
d']
;$arr[] = ['Region Sjælland', '4270',	'Høng'
]
;$arr[] = ['Region Sjælland', '4270',	'Høn
g']
;$arr[] = ['Region Sjælland', '4281',	'Gør
lev']
;$arr[] = ['Region Sjælland', '4291',	'Ruds 
Vedby']
;$arr[] = ['Region Sjælland', '4291',	'Ruds Vedb
y']
;$arr[] = ['Region Sjælland', '4293',	'Dianalund
']
;$arr[] = ['Region Sjælland', '4293',	'Dianalun
d']
;$arr[] = ['Region Sjælland', '4295',	'Stenlill
e']
;$arr[] = ['Region Sjælland', '4295',	'Stenlill
e']
;$arr[] = ['Region Sjælland', '4296',	'Nyrup'
]
;$arr[] = ['Region Sjælland', '4296',	'Nyru
p']
;$arr[] = ['Region Sjælland', '4300',	'Holb
æk']
;$arr[] = ['Region Sjælland', '4320',	'Lejre
']
;$arr[] = ['Region Sjælland', '4320',	'Lejr
e']
;$arr[] = ['Region Sjælland', '4320',	'Lejr
e']
;$arr[] = ['Region Sjælland', '4330',	'Hval
sø']
;$arr[] = ['Region Sjælland', '4330',	'Hvals
ø']
;$arr[] = ['Region Sjælland', '4330',	'Hvals
ø']
;$arr[] = ['Region Sjælland', '4340',	'Tøllø
se']
;$arr[] = ['Region Sjælland', '4340',	'Tølløs
e']
;$arr[] = ['Region Sjælland', '4350',	'Ugerlø
se']
;$arr[] = ['Region Sjælland', '4360',	'Kirke E
skilstrup']
;$arr[] = ['Region Sjælland', '4360',	'Kirke Eskilstru
p']
;$arr[] = ['Region Sjælland', '4370',	'Store Merløse'
]
;$arr[] = ['Region Sjælland', '4370',	'Store Merløs
e']
;$arr[] = ['Region Sjælland', '4370',	'Store Merløs
e']
;$arr[] = ['Region Sjælland', '4390',	'Vipperød'
]
;$arr[] = ['Region Sjælland', '4400',	'Kalundb
org']
;$arr[] = ['Region Sjælland', '4420',	'Regstrup'
]
;$arr[] = ['Region Sjælland', '4440',	'Mørkøv'
]
;$arr[] = ['Region Sjælland', '4450',	'Jyder
up']
;$arr[] = ['Region Sjælland', '4450',	'Jyderu
p']
;$arr[] = ['Region Sjælland', '4460',	'Snerti
nge']
;$arr[] = ['Region Sjælland', '4460',	'Snerting
e']
;$arr[] = ['Region Sjælland', '4470',	'Svebølle
']
;$arr[] = ['Region Sjælland', '4470',	'Svebøll
e']
;$arr[] = ['Region Sjælland', '4480',	'Store F
uglede']
;$arr[] = ['Region Sjælland', '4490',	'Jerslev Sjæl
land']
;$arr[] = ['Region Sjælland', '4500',	'Nykøbing Sj'
]
;$arr[] = ['Region Sjælland', '4520',	'Svinninge'
]
;$arr[] = ['Region Sjælland', '4532',	'Gislinge
']
;$arr[] = ['Region Sjælland', '4534',	'Hørve'
]
;$arr[] = ['Region Sjælland', '4534',	'Hørv
e']
;$arr[] = ['Region Sjælland', '4540',	'Fåre
vejle']
;$arr[] = ['Region Sjælland', '4550',	'Asnæs'
]
;$arr[] = ['Region Sjælland', '4560',	'Vig'
]
;$arr[] = ['Region Sjælland', '4571',	'Gr
evinge']
;$arr[] = ['Region Sjælland', '4572',	'Nørre A
smindrup']
;$arr[] = ['Region Sjælland', '4573',	'Højby'
]
;$arr[] = ['Region Sjælland', '4581',	'Rørv
ig']
;$arr[] = ['Region Sjælland', '4583',	'Sjæll
ands Odde']
;$arr[] = ['Region Sjælland', '4591',	'Føllenslev'
]
;$arr[] = ['Region Sjælland', '4591',	'Føllensle
v']
;$arr[] = ['Region Sjælland', '4592',	'Sejerø'
]
;$arr[] = ['Region Sjælland', '4593',	'Eskeb
jerg']
;$arr[] = ['Region Sjælland', '4600',	'Køge'
]
;$arr[] = ['Region Sjælland', '4600',	'Køg
e']
;$arr[] = ['Region Sjælland', '4621',	'Gad
strup']
;$arr[] = ['Region Sjælland', '4622',	'Havdrup
']
;$arr[] = ['Region Sjælland', '4622',	'Havdru
p']
;$arr[] = ['Region Sjælland', '4623',	'Lille 
Skensved']
;$arr[] = ['Region Sjælland', '4623',	'Lille Skensve
d']
;$arr[] = ['Region Sjælland', '4623',	'Lille Skensve
d']
;$arr[] = ['Region Sjælland', '4632',	'Bjæverskov'
]
;$arr[] = ['Region Sjælland', '4640',	'Faxe'
]
;$arr[] = ['Region Sjælland', '4640',	'Fax
e']
;$arr[] = ['Region Sjælland', '4652',	'Hår
lev']
;$arr[] = ['Region Sjælland', '4652',	'Hårle
v']
;$arr[] = ['Region Sjælland', '4653',	'Karis
e']
;$arr[] = ['Region Sjælland', '4653',	'Karis
e']
;$arr[] = ['Region Sjælland', '4654',	'Faxe 
Ladeplads']
;$arr[] = ['Region Sjælland', '4660',	'Store Hedding
e']
;$arr[] = ['Region Sjælland', '4671',	'Strøby'
]
;$arr[] = ['Region Sjælland', '4672',	'Klipp
inge']
;$arr[] = ['Region Sjælland', '4673',	'Rødvig S
tevns']
;$arr[] = ['Region Sjælland', '4681',	'Herfølge'
]
;$arr[] = ['Region Sjælland', '4682',	'Tureby'
]
;$arr[] = ['Region Sjælland', '4682',	'Tureb
y']
;$arr[] = ['Region Sjælland', '4682',	'Tureb
y']
;$arr[] = ['Region Sjælland', '4683',	'Rønne
de']
;$arr[] = ['Region Sjælland', '4683',	'Rønned
e']
;$arr[] = ['Region Sjælland', '4684',	'Holmeg
aard']
;$arr[] = ['Region Sjælland', '4684',	'Holmegaar
d']
;$arr[] = ['Region Sjælland', '4690',	'Haslev'
]
;$arr[] = ['Region Sjælland', '4690',	'Hasle
v']
;$arr[] = ['Region Sjælland', '4690',	'Hasle
v']
;$arr[] = ['Region Sjælland', '4700',	'Næstv
ed']
;$arr[] = ['Region Sjælland', '4720',	'Præstø
']
;$arr[] = ['Region Sjælland', '4733',	'Tappe
rnøje']
;$arr[] = ['Region Sjælland', '4733',	'Tappernøj
e']
;$arr[] = ['Region Sjælland', '4733',	'Tappernøj
e']
;$arr[] = ['Region Sjælland', '4735',	'Mern'
]
;$arr[] = ['Region Sjælland', '4736',	'Kar
rebæksminde']
;$arr[] = ['Region Sjælland', '4750',	'Lundby'
]
;$arr[] = ['Region Sjælland', '4750',	'Lundb
y']
;$arr[] = ['Region Sjælland', '4760',	'Vordi
ngborg']
;$arr[] = ['Region Sjælland', '4771',	'Kalvehave'
]
;$arr[] = ['Region Sjælland', '4772',	'Langebæk
']
;$arr[] = ['Region Sjælland', '4773',	'Stensve
d']
;$arr[] = ['Region Sjælland', '4780',	'Stege'
]
;$arr[] = ['Region Sjælland', '4791',	'Borr
e']
;$arr[] = ['Region Sjælland', '4792',	'Aske
by']
;$arr[] = ['Region Sjælland', '4793',	'Bogø 
By']
;$arr[] = ['Region Sjælland', '4800',	'Nykøbi
ng F']
;$arr[] = ['Region Sjælland', '4840',	'Nørre Als
lev']
;$arr[] = ['Region Sjælland', '4850',	'Stubbekøbin
g']
;$arr[] = ['Region Sjælland', '4862',	'Guldborg'
]
;$arr[] = ['Region Sjælland', '4863',	'Eskilst
rup']
;$arr[] = ['Region Sjælland', '4871',	'Horbelev'
]
;$arr[] = ['Region Sjælland', '4872',	'Idestru
p']
;$arr[] = ['Region Sjælland', '4873',	'Væggerl
øse']
;$arr[] = ['Region Sjælland', '4874',	'Gedser'
]
;$arr[] = ['Region Sjælland', '4880',	'Nyste
d']
;$arr[] = ['Region Sjælland', '4891',	'Toreb
y L']
;$arr[] = ['Region Sjælland', '4892',	'Ketting
e']
;$arr[] = ['Region Sjælland', '4894',	'Øster U
lslev']
;$arr[] = ['Region Sjælland', '4894',	'Øster Ulsle
v']
;$arr[] = ['Region Sjælland', '4895',	'Errindlev'
]
;$arr[] = ['Region Sjælland', '4900',	'Nakskov'
]
;$arr[] = ['Region Sjælland', '4912',	'Harpel
unde']
;$arr[] = ['Region Sjælland', '4913',	'Horslunde
']
;$arr[] = ['Region Sjælland', '4920',	'Sølleste
d']
;$arr[] = ['Region Sjælland', '4930',	'Maribo'
]
;$arr[] = ['Region Sjælland', '4930',	'Marib
o']
;$arr[] = ['Region Sjælland', '4941',	'Bandh
olm']
;$arr[] = ['Region Sjælland', '4943',	'Torrig 
L']
;$arr[] = ['Region Sjælland', '4944',	'Fejø'
]
;$arr[] = ['Region Sjælland', '4951',	'Nør
reballe']
;$arr[] = ['Region Sjælland', '4952',	'Stokkemar
ke']
;$arr[] = ['Region Sjælland', '4953',	'Vesterborg
']
;$arr[] = ['Region Sjælland', '4960',	'Holeby'
]
;$arr[] = ['Region Sjælland', '4970',	'Rødby
']
;$arr[] = ['Region Sjælland', '4983',	'Dann
emare']
;$arr[] = ['Region Sjælland', '4990',	'Sakskøbi
ng']
;$arr[] = ['Region Syddanmark', '5000',	'Odense C'
]
;$arr[] = ['Region Syddanmark', '5200',	'Odense V'
]
;$arr[] = ['Region Syddanmark', '5210',	'Odense NV
']
;$arr[] = ['Region Syddanmark', '5220',	'Odense SØ'
]
;$arr[] = ['Region Syddanmark', '5230',	'Odense M'
]
;$arr[] = ['Region Syddanmark', '5240',	'Odense NØ
']
;$arr[] = ['Region Syddanmark', '5250',	'Odense SV'
]
;$arr[] = ['Region Syddanmark', '5260',	'Odense S'
]
;$arr[] = ['Region Syddanmark', '5270',	'Odense N'
]
;$arr[] = ['Region Syddanmark', '5270',	'Odense N'
]
;$arr[] = ['Region Syddanmark', '5290',	'Marslev'
]
;$arr[] = ['Region Syddanmark', '5300',	'Kertemin
de']
;$arr[] = ['Region Syddanmark', '5320',	'Agedrup'
]
;$arr[] = ['Region Syddanmark', '5330',	'Munkebo'
]
;$arr[] = ['Region Syddanmark', '5330',	'Munkebo'
]
;$arr[] = ['Region Syddanmark', '5350',	'Rynkeby'
]
;$arr[] = ['Region Syddanmark', '5370',	'Mesinge'
]
;$arr[] = ['Region Syddanmark', '5380',	'Dalby'
]
;$arr[] = ['Region Syddanmark', '5390',	'Martof
te']
;$arr[] = ['Region Syddanmark', '5400',	'Bogense'
]
;$arr[] = ['Region Syddanmark', '5450',	'Otterup'
]
;$arr[] = ['Region Syddanmark', '5462',	'Morud'
]
;$arr[] = ['Region Syddanmark', '5463',	'Harndr
up']
;$arr[] = ['Region Syddanmark', '5464',	'Brenderup
 Fyn'
]
;$arr[] = ['Region Syddanmark', '5466',	'Asperup'
]
;$arr[] = ['Region Syddanmark', '5471',	'Søndersø
']
;$arr[] = ['Region Syddanmark', '5474',	'Veflinge'
]
;$arr[] = ['Region Syddanmark', '5485',	'Skamby'
]
;$arr[] = ['Region Syddanmark', '5491',	'Blommen
slyst']
;$arr[] = ['Region Syddanmark', '5491',	'Blommenslyst'
]
;$arr[] = ['Region Syddanmark', '5492',	'Vissenbjerg'
]
;$arr[] = ['Region Syddanmark', '5492',	'Vissenbjerg'
]
;$arr[] = ['Region Syddanmark', '5492',	'Vissenbjerg'
]
;$arr[] = ['Region Syddanmark', '5500',	'Middelfart'
]
;$arr[] = ['Region Syddanmark', '5540',	'Ullerslev'
]
;$arr[] = ['Region Syddanmark', '5540',	'Ullerslev'
]
;$arr[] = ['Region Syddanmark', '5550',	'Langeskov'
]
;$arr[] = ['Region Syddanmark', '5550',	'Langeskov'
]
;$arr[] = ['Region Syddanmark', '5550',	'Langeskov'
]
;$arr[] = ['Region Syddanmark', '5560',	'Aarup'
]
;$arr[] = ['Region Syddanmark', '5560',	'Aarup'
]
;$arr[] = ['Region Syddanmark', '5560',	'Aarup'
]
;$arr[] = ['Region Syddanmark', '5580',	'Nørre 
Aaby']
;$arr[] = ['Region Syddanmark', '5591',	'Gelsted'
]
;$arr[] = ['Region Syddanmark', '5592',	'Ejby'
]
;$arr[] = ['Region Syddanmark', '5600',	'Faabo
rg']
;$arr[] = ['Region Syddanmark', '5610',	'Assens'
]
;$arr[] = ['Region Syddanmark', '5620',	'Glamsbj
erg']
;$arr[] = ['Region Syddanmark', '5631',	'Ebberup'
]
;$arr[] = ['Region Syddanmark', '5642',	'Millinge
']
;$arr[] = ['Region Syddanmark', '5642',	'Millinge'
]
;$arr[] = ['Region Syddanmark', '5672',	'Broby'
]
;$arr[] = ['Region Syddanmark', '5683',	'Haarby
']
;$arr[] = ['Region Syddanmark', '5690',	'Tommeru
p']
;$arr[] = ['Region Syddanmark', '5700',	'Svendborg
']
;$arr[] = ['Region Syddanmark', '5750',	'Ringe'
]
;$arr[] = ['Region Syddanmark', '5762',	'Vester
 Skerninge'
]
;$arr[] = ['Region Syddanmark', '5762',	'Vester Skerninge'
]
;$arr[] = ['Region Syddanmark', '5771',	'Stenstrup'
]
;$arr[] = ['Region Syddanmark', '5771',	'Stenstrup'
]
;$arr[] = ['Region Syddanmark', '5772',	'Kværndrup'
]
;$arr[] = ['Region Syddanmark', '5772',	'Kværndrup'
]
;$arr[] = ['Region Syddanmark', '5792',	'Årslev'
]
;$arr[] = ['Region Syddanmark', '5800',	'Nyborg'
]
;$arr[] = ['Region Syddanmark', '5853',	'Ørbæk'
]
;$arr[] = ['Region Syddanmark', '5853',	'Ørbæk'
]
;$arr[] = ['Region Syddanmark', '5854',	'Gislev
']
;$arr[] = ['Region Syddanmark', '5854',	'Gislev'
]
;$arr[] = ['Region Syddanmark', '5856',	'Rysling
e']
;$arr[] = ['Region Syddanmark', '5863',	'Ferritsle
v Fyn']
;$arr[] = ['Region Syddanmark', '5863',	'Ferritslev Fyn'
]
;$arr[] = ['Region Syddanmark', '5871',	'Frørup'
]
;$arr[] = ['Region Syddanmark', '5874',	'Hessela
ger']
;$arr[] = ['Region Syddanmark', '5874',	'Hesselager'
]
;$arr[] = ['Region Syddanmark', '5881',	'Skårup Fyn'
]
;$arr[] = ['Region Syddanmark', '5882',	'Vejstrup'
]
;$arr[] = ['Region Syddanmark', '5883',	'Oure'
]
;$arr[] = ['Region Syddanmark', '5884',	'Gudme
']
;$arr[] = ['Region Syddanmark', '5892',	'Gudbje
rg Sydfyn']
;$arr[] = ['Region Syddanmark', '5900',	'Rudkøbing'
]
;$arr[] = ['Region Syddanmark', '5932',	'Humble'
]
;$arr[] = ['Region Syddanmark', '5935',	'Bagenko
p']
;$arr[] = ['Region Syddanmark', '5953',	'Tranekær'
]
;$arr[] = ['Region Syddanmark', '5960',	'Marstal'
]
;$arr[] = ['Region Syddanmark', '5970',	'Ærøskøbi
ng']
;$arr[] = ['Region Syddanmark', '5985',	'Søby Ærø'
]
;$arr[] = ['Region Syddanmark', '6000',	'Kolding'
]
;$arr[] = ['Region Syddanmark', '6040',	'Egtved'
]
;$arr[] = ['Region Syddanmark', '6040',	'Egtved'
]
;$arr[] = ['Region Syddanmark', '6051',	'Almind'
]
;$arr[] = ['Region Syddanmark', '6052',	'Viuf'
]
;$arr[] = ['Region Syddanmark', '6052',	'Viuf'
]
;$arr[] = ['Region Syddanmark', '6064',	'Jordr
up']
;$arr[] = ['Region Syddanmark', '6070',	'Christia
nsfeld']
;$arr[] = ['Region Syddanmark', '6070',	'Christiansfeld'
]
;$arr[] = ['Region Syddanmark', '6091',	'Bjert'
]
;$arr[] = ['Region Syddanmark', '6092',	'Sønder
 Stenderup'
]
;$arr[] = ['Region Syddanmark', '6093',	'Sjølund'
]
;$arr[] = ['Region Syddanmark', '6094',	'Hejls'
]
;$arr[] = ['Region Syddanmark', '6094',	'Hejls'
]
;$arr[] = ['Region Syddanmark', '6100',	'Haders
lev']
;$arr[] = ['Region Syddanmark', '6100',	'Haderslev'
]
;$arr[] = ['Region Syddanmark', '6200',	'Aabenraa'
]
;$arr[] = ['Region Syddanmark', '6230',	'Rødekro'
]
;$arr[] = ['Region Syddanmark', '6240',	'Løgumklo
ster']
;$arr[] = ['Region Syddanmark', '6261',	'Bredebro'
]
;$arr[] = ['Region Syddanmark', '6270',	'Tønder'
]
;$arr[] = ['Region Syddanmark', '6280',	'Højer'
]
;$arr[] = ['Region Syddanmark', '6300',	'Gråste
n']
;$arr[] = ['Region Syddanmark', '6310',	'Broager'
]
;$arr[] = ['Region Syddanmark', '6320',	'Egernsun
d']
;$arr[] = ['Region Syddanmark', '6330',	'Padborg'
]
;$arr[] = ['Region Syddanmark', '6340',	'Kruså'
]
;$arr[] = ['Region Syddanmark', '6360',	'Tingle
v']
;$arr[] = ['Region Syddanmark', '6372',	'Bylderup
-Bov']
;$arr[] = ['Region Syddanmark', '6392',	'Bolderslev'
]
;$arr[] = ['Region Syddanmark', '6400',	'Sønderborg'
]
;$arr[] = ['Region Syddanmark', '6430',	'Nordborg'
]
;$arr[] = ['Region Syddanmark', '6430',	'Nordborg'
]
;$arr[] = ['Region Syddanmark', '6440',	'Augustenb
org']
;$arr[] = ['Region Syddanmark', '6470',	'Sydals'
]
;$arr[] = ['Region Syddanmark', '6500',	'Vojens'
]
;$arr[] = ['Region Syddanmark', '6510',	'Gram']
;$arr[] = ['Region Syddanmark', '6520',	'Toftlund']
;$arr[] = ['Region Syddanmark', '6520',	'Toftlund']
;$arr[] = ['Region Syddanmark', '6534',	'Agerskov']
;$arr[] = ['Region Syddanmark', '6534',	'Agerskov']
;$arr[] = ['Region Syddanmark', '6534',	'Agerskov']
;$arr[] = ['Region Syddanmark', '6535',	'Branderup J']
;$arr[] = ['Region Syddanmark', '6541',	'Bevtoft']
;$arr[] = ['Region Syddanmark', '6541',	'Bevtoft']
;$arr[] = ['Region Syddanmark', '6560',	'Sommersted']
;$arr[] = ['Region Syddanmark', '6560',	'Sommersted']
;$arr[] = ['Region Syddanmark', '6580',	'Vamdrup']
;$arr[] = ['Region Syddanmark', '6600',	'Vejen']
;$arr[] = ['Region Syddanmark', '6621',	'Gesten']
;$arr[] = ['Region Syddanmark', '6622',	'Bække']
;$arr[] = ['Region Syddanmark', '6623',	'Vorbasse']
;$arr[] = ['Region Syddanmark', '6623',	'Vorbasse']
;$arr[] = ['Region Syddanmark', '6623',	'Vorbasse']
;$arr[] = ['Region Syddanmark', '6630',	'Rødding']
;$arr[] = ['Region Syddanmark', '6630',	'Rødding']
;$arr[] = ['Region Syddanmark', '6640',	'Lunderskov']
;$arr[] = ['Region Syddanmark', '6650',	'Brørup']
;$arr[] = ['Region Syddanmark', '6660',	'Lintrup']
;$arr[] = ['Region Syddanmark', '6670',	'Holsted']
;$arr[] = ['Region Syddanmark', '6670',	'Holsted']
;$arr[] = ['Region Syddanmark', '6682',	'Hovborg']
;$arr[] = ['Region Syddanmark', '6682',	'Hovborg']
;$arr[] = ['Region Syddanmark', '6682',	'Hovborg']
;$arr[] = ['Region Syddanmark', '6683',	'Føvling']
;$arr[] = ['Region Syddanmark', '6683',	'Føvling']
;$arr[] = ['Region Syddanmark', '6690',	'Gørding']
;$arr[] = ['Region Syddanmark', '6690',	'Gørding']
;$arr[] = ['Region Syddanmark', '6700',	'Esbjerg']
;$arr[] = ['Region Syddanmark', '6705',	'Esbjerg Ø']
;$arr[] = ['Region Syddanmark', '6710',	'Esbjerg V']
;$arr[] = ['Region Syddanmark', '6715',	'Esbjerg N']
;$arr[] = ['Region Syddanmark', '6720',	'Fanø']
;$arr[] = ['Region Syddanmark', '6731',	'Tjæreborg']
;$arr[] = ['Region Syddanmark', '6740',	'Bramming']
;$arr[] = ['Region Syddanmark', '6752',	'Glejbjerg']
;$arr[] = ['Region Syddanmark', '6753',	'Agerbæk']
;$arr[] = ['Region Syddanmark', '6753',	'Agerbæk']
;$arr[] = ['Region Syddanmark', '6760',	'Ribe']
;$arr[] = ['Region Syddanmark', '6771',	'Gredstedbro']
;$arr[] = ['Region Syddanmark', '6780',	'Skærbæk']
;$arr[] = ['Region Syddanmark', '6792',	'Rømø']
;$arr[] = ['Region Syddanmark', '6800',	'Varde']
;$arr[] = ['Region Syddanmark', '6818',	'Årre']
;$arr[] = ['Region Syddanmark', '6818',	'Årre']
;$arr[] = ['Region Syddanmark', '6823',	'Ansager']
;$arr[] = ['Region Syddanmark', '6823',	'Ansager']
;$arr[] = ['Region Midtjylland', '6830',	'Nørre Nebel']
;$arr[] = ['Region Syddanmark', '6830',	'Nørre Nebel']
;$arr[] = ['Region Syddanmark', '6840',	'Oksbøl']
;$arr[] = ['Region Syddanmark', '6851',	'Janderup Vestj']
;$arr[] = ['Region Syddanmark', '6852',	'Billum']
;$arr[] = ['Region Syddanmark', '6853',	'Vejers Strand']
;$arr[] = ['Region Syddanmark', '6854',	'Henne']
;$arr[] = ['Region Syddanmark', '6855',	'Outrup']
;$arr[] = ['Region Syddanmark', '6857',	'Blåvand']
;$arr[] = ['Region Syddanmark', '6862',	'Tistrup']

;$arr[] = ['Region Midtjylland', '6870',	'Ølgod']
;$arr[] = ['Region Syddanmark', '6870',	'Ølgod']

;$arr[] = ['Region Midtjylland', '6880',	'Tarm']
;$arr[] = ['Region Syddanmark', '6880',	'Tarm']
;$arr[] = ['Region Midtjylland', '6893',	'Hemmet']
;$arr[] = ['Region Midtjylland', '6900',	'Skjern']
;$arr[] = ['Region Midtjylland', '6920',	'Videbæk']
;$arr[] = ['Region Midtjylland', '6933',	'Kibæk']
;$arr[] = ['Region Midtjylland', '6933',	'Kibæk']
;$arr[] = ['Region Midtjylland', '6940',	'Lem St']
;$arr[] = ['Region Midtjylland', '6950',	'Ringkøbing']
;$arr[] = ['Region Midtjylland', '6960',	'Hvide Sande']
;$arr[] = ['Region Midtjylland', '6971',	'Spjald']
;$arr[] = ['Region Midtjylland', '6973',	'Ørnhøj']
;$arr[] = ['Region Midtjylland', '6973',	'Ørnhøj']
;$arr[] = ['Region Midtjylland', '6980',	'Tim']
;$arr[] = ['Region Midtjylland', '6990',	'Ulfborg']
;$arr[] = ['Region Midtjylland', '6990',	'Ulfborg']
;$arr[] = ['Region Midtjylland', '6990',	'Ulfborg']
;$arr[] = ['Region Midtjylland', '6990',	'Ulfborg']
;$arr[] = ['Region Syddanmark', '7000',	'Fredericia']
;$arr[] = ['Region Syddanmark', '7000',	'Fredericia']
;$arr[] = ['Region Syddanmark', '7007',	'Fredericia']
;$arr[] = ['Region Syddanmark', '7080',	'Børkop']
;$arr[] = ['Region Midtjylland', '7100',	'Vejle']
;$arr[] = ['Region Syddanmark', '7100',	'Vejle']
;$arr[] = ['Region Midtjylland', '7120',	'Vejle Øst']
;$arr[] = ['Region Syddanmark', '7120',	'Vejle Øst']
;$arr[] = ['Region Midtjylland', '7130',	'Juelsminde']
;$arr[] = ['Region Midtjylland', '7140',	'Stouby']
;$arr[] = ['Region Midtjylland', '7150',	';Barrit']
;$arr[] = ['Region Midtjylland', '7160',	'Tørring']
;$arr[] = ['Region Syddanmark', '7160',	'Tørring']
;$arr[] = ['Region Midtjylland', '7171',	'Uldum']
;$arr[] = ['Region Syddanmark', '7173',	'Vonge']
;$arr[] = ['Region Syddanmark', '7182',	'Bredst
en']
;$arr[] = ['Region Syddanmark', '7183',	'Randbøl'
]
;$arr[] = ['Region Syddanmark', '7184',	'Vandel'
]
;$arr[] = ['Region Syddanmark', '7190',	'Billund
']
;$arr[] = ['Region Syddanmark', '7190',	'Billund'
]
;$arr[] = ['Region Syddanmark', '7200',	'Grindste
d']
;$arr[] = ['Region Syddanmark', '7200',	'Grindsted'
]
;$arr[] = ['Region Syddanmark', '7200',	'Grindsted'
]
;$arr[] = ['Region Syddanmark', '7250',	'Hejnsvig']

;$arr[] = ['Region Midtjylland', '7260',	'Sønder Omme']
;$arr[] = ['Region Syddanmark', '7260',	'Sønder Omme']

;$arr[] = ['Region Midtjylland', '7270',	'Stakroge']
;$arr[] = ['Region Midtjylland', '7270',	'Stakroge']
;$arr[] = ['Region Syddanmark', '7270',	'Stakroge']

;$arr[] = ['Region Midtjylland', '7280',	'Sønder Felding']
;$arr[] = ['Region Midtjylland', '7280',	'Sønder Felding']
;$arr[] = ['Region Syddanmark', '7300',	'Jelling'
]
;$arr[] = ['Region Syddanmark', '7321',	'Gadbjerg
']
;$arr[] = ['Region Midtjylland', '7323',	'Give']
;$arr[] = ['Region Midtjylland', '7323',	'Give']
;$arr[] = ['Region Syddanmark', '7323',	'Give']

;$arr[] = ['Region Midtjylland', '7330',	'Brande']
;$arr[] = ['Region Midtjylland', '7330',	'Brande']
;$arr[] = ['Region Syddanmark', '7330',	'Brande']

;$arr[] = ['Region Midtjylland', '7361',	'Ejstrupholm']
;$arr[] = ['Region Syddanmark', '7361',	'Ejstrupholm']

;$arr[] = ['Region Midtjylland', '7362',	'Hampen']
;$arr[] = ['Region Midtjylland', '7362',	'Hampen']
;$arr[] = ['Region Midtjylland', '7400',	'Herning']
;$arr[] = ['Region Midtjylland', '7400',	'Herning']
;$arr[] = ['Region Midtjylland', '7400',	'Herning']
;$arr[] = ['Region Midtjylland', '7430',	'Ikast']
;$arr[] = ['Region Midtjylland', '7441',	'Bording']
;$arr[] = ['Region Midtjylland', '7441',	'Bording']
;$arr[] = ['Region Midtjylland', '7442',	'Engesvang']
;$arr[] = ['Region Midtjylland', '7442',	'Engesvang']
;$arr[] = ['Region Midtjylland', '7451',	'Sunds']
;$arr[] = ['Region Midtjylland', '7451',	'Sunds']
;$arr[] = ['Region Midtjylland', '7470',	'Karup J']
;$arr[] = ['Region Midtjylland', '7470',	'Karup J']
;$arr[] = ['Region Midtjylland', '7470',	'Karup J']
;$arr[] = ['Region Midtjylland', '7480',	'Vildbjerg']
;$arr[] = ['Region Midtjylland', '7480',	'Vildbjerg']
;$arr[] = ['Region Midtjylland', '7490',	'Aulum']
;$arr[] = ['Region Midtjylland', '7500',	'Holstebro']
;$arr[] = ['Region Midtjylland', '7500',	'Holstebro']
;$arr[] = ['Region Midtjylland', '7500',	'Holstebro']
;$arr[] = ['Region Midtjylland', '7540',	'Haderup']
;$arr[] = ['Region Midtjylland', '7540',	'Haderup']
;$arr[] = ['Region Midtjylland', '7540',	'Haderup']
;$arr[] = ['Region Midtjylland', '7550',	'Sørvad']
;$arr[] = ['Region Midtjylland', '7560',	'Hjerm']
;$arr[] = ['Region Midtjylland', '7560',	'Hjerm']
;$arr[] = ['Region Midtjylland', '7570',	'Vemb']
;$arr[] = ['Region Midtjylland', '7570',	'Vemb']
;$arr[] = ['Region Midtjylland', '7600',	'Struer']
;$arr[] = ['Region Midtjylland', '7600',	'Struer']
;$arr[] = ['Region Midtjylland', '7600',	'Struer']
;$arr[] = ['Region Midtjylland', '7620',	'Lemvig']
;$arr[] = ['Region Midtjylland', '7650',	'Bøvlingbjerg']
;$arr[] = ['Region Midtjylland', '7660',	'Bækmarksbro']
;$arr[] = ['Region Midtjylland', '7660',	'Bækmarksbro']
;$arr[] = ['Region Midtjylland', '7673',	'Harboøre']
;$arr[] = ['Region Midtjylland', '7680',	'Thyborøn']
;$arr[] = ['Region Nordjylland', '7700',	'Thisted']
;$arr[] = ['Region Nordjylland', '7730',	'Hanstholm']
;$arr[] = ['Region Nordjylland', '7741',	'Frøstrup']
;$arr[] = ['Region Nordjylland', '7742',	'Vesløs']
;$arr[] = ['Region Nordjylland', '7752',	'Snedsted']
;$arr[] = ['Region Nordjylland', '7755',	'Bedsted Thy']
;$arr[] = ['Region Nordjylland', '7760',	'Hurup Thy']
;$arr[] = ['Region Midtjylland', '7760',	'Hurup Thy']
;$arr[] = ['Region Nordjylland', '7770',	'Vestervig']
;$arr[] = ['Region Midtjylland', '7790',	'Thyholm']
;$arr[] = ['Region Midtjylland', '7800',	'Skive']
;$arr[] = ['Region Midtjylland', '7800',	'Skive']
;$arr[] = ['Region Midtjylland', '7800',	'Skive']
;$arr[] = ['Region Midtjylland', '7830',	'Vinderup']
;$arr[] = ['Region Midtjylland', '7830',	'Vinderup']
;$arr[] = ['Region Midtjylland', '7830',	'Vinderup']
;$arr[] = ['Region Midtjylland', '7830',	'Vinderup']
;$arr[] = ['Region Midtjylland', '7840',	'Højslev']
;$arr[] = ['Region Midtjylland', '7840',	'Højslev']
;$arr[] = ['Region Midtjylland', '7850',	'Stoholm Jyll']
;$arr[] = ['Region Midtjylland', '7860',	'Spøttrup']
;$arr[] = ['Region Midtjylland', '7870',	'Roslev']
;$arr[] = ['Region Midtjylland', '7884',	'Fur']
;$arr[] = ['Region Nordjylland', '7900',	'Nykøbing M']
;$arr[] = ['Region Nordjylland', '7950',	'Erslev']
;$arr[] = ['Region Nordjylland', '7960',	'Karby']
;$arr[] = ['Region Nordjylland', '7970',	'Redsted M']
;$arr[] = ['Region Nordjylland', '7980',	'Vils']
;$arr[] = ['Region Nordjylland', '7990',	'Øster Assels']
;$arr[] = ['Region Midtjylland', '8000',	'Aarhus C']
;$arr[] = ['Region Midtjylland', '8200',	'Aarhus N']
;$arr[] = ['Region Midtjylland', '8210',	'Aarhus V']
;$arr[] = ['Region Midtjylland', '8220',	'Brabrand']
;$arr[] = ['Region Midtjylland', '8230',	'Åbyhøj']
;$arr[] = ['Region Midtjylland', '8240',	'Risskov']
;$arr[] = ['Region Midtjylland', '8245',	'Risskov Ø']
;$arr[] = ['Region Midtjylland', '8250',	'Egå']
;$arr[] = ['Region Midtjylland', '8260',	'Viby J']
;$arr[] = ['Region Midtjylland', '8270',	'Højbjerg']
;$arr[] = ['Region Midtjylland', '8300',	'Odder']
;$arr[] = ['Region Midtjylland', '8300',	'Odder']
;$arr[] = ['Region Midtjylland', '8305',	'Samsø']
;$arr[] = ['Region Midtjylland', '8310',	'Tranbjerg J']
;$arr[] = ['Region Midtjylland', '8320',	'Mårslet']
;$arr[] = ['Region Midtjylland', '8330',	'Beder']
;$arr[] = ['Region Midtjylland', '8340',	'Malling']
;$arr[] = ['Region Midtjylland', '8340',	'Malling']
;$arr[] = ['Region Midtjylland', '8350',	'Hundslund']
;$arr[] = ['Region Midtjylland', '8355',	'Solbjerg']
;$arr[] = ['Region Midtjylland', '8361',	'Hasselager']
;$arr[] = ['Region Midtjylland', '8362',	'Hørning']
;$arr[] = ['Region Midtjylland', '8362',	'Hørning']
;$arr[] = ['Region Midtjylland', '8370',	'Hadsten']
;$arr[] = ['Region Midtjylland', '8380',	'Trige']
;$arr[] = ['Region Midtjylland', '8380',	'Trige']
;$arr[] = ['Region Midtjylland', '8381',	'Tilst']
;$arr[] = ['Region Midtjylland', '8382',	'Hinnerup']
;$arr[] = ['Region Midtjylland', '8382',	'Hinnerup']
;$arr[] = ['Region Midtjylland', '8400',	'Ebeltoft']
;$arr[] = ['Region Midtjylland', '8410',	'Rønde']
;$arr[] = ['Region Midtjylland', '8420',	'Knebel']
;$arr[] = ['Region Midtjylland', '8444',	'Balle']
;$arr[] = ['Region Midtjylland', '8444',	'Balle']
;$arr[] = ['Region Midtjylland', '8450',	'Hammel']
;$arr[] = ['Region Midtjylland', '8450',	'Hammel']
;$arr[] = ['Region Midtjylland', '8462',	'Harlev J']
;$arr[] = ['Region Midtjylland', '8464',	'Galten']
;$arr[] = ['Region Midtjylland', '8464',	'Galten']
;$arr[] = ['Region Midtjylland', '8471',	'Sabro']
;$arr[] = ['Region Midtjylland', '8471',	'Sabro']
;$arr[] = ['Region Midtjylland', '8471',	'Sabro']
;$arr[] = ['Region Midtjylland', '8472',	'Sporup']
;$arr[] = ['Region Midtjylland', '8472',	'Sporup']
;$arr[] = ['Region Midtjylland', '8472',	'Sporup']
;$arr[] = ['Region Midtjylland', '8500',	'Grenaa']
;$arr[] = ['Region Midtjylland', '8520',	'Lystrup']
;$arr[] = ['Region Midtjylland', '8530',	'Hjortshøj']
;$arr[] = ['Region Midtjylland', '8541',	'Skødstrup']
;$arr[] = ['Region Midtjylland', '8543',	'Hornslet']
;$arr[] = ['Region Midtjylland', '8543',	'Hornslet']
;$arr[] = ['Region Midtjylland', '8544',	'Mørke']
;$arr[] = ['Region Midtjylland', '8550',	'Ryomgård']
;$arr[] = ['Region Midtjylland', '8550',	'Ryomgård']
;$arr[] = ['Region Midtjylland', '8560',	'Kolind']
;$arr[] = ['Region Midtjylland', '8560',	'Kolind']
;$arr[] = ['Region Midtjylland', '8570',	'Trustrup']
;$arr[] = ['Region Midtjylland', '8570',	'Trustrup']
;$arr[] = ['Region Midtjylland', '8581',	'Nimtofte']
;$arr[] = ['Region Midtjylland', '8581',	'Nimtofte']
;$arr[] = ['Region Midtjylland', '8585',	'Glesborg']
;$arr[] = ['Region Midtjylland', '8586',	'Ørum Djurs']
;$arr[] = ['Region Midtjylland', '8592',	'Anholt']
;$arr[] = ['Region Midtjylland', '8600',	'Silkeborg']
;$arr[] = ['Region Midtjylland', '8600',	'Silkeborg']
;$arr[] = ['Region Midtjylland', '8600',	'Silkeborg']
;$arr[] = ['Region Midtjylland', '8620',	'Kjellerup']
;$arr[] = ['Region Midtjylland', '8620',	'Kjellerup']
;$arr[] = ['Region Midtjylland', '8632',	'Lemming']
;$arr[] = ['Region Midtjylland', '8641',	'Sorring']
;$arr[] = ['Region Midtjylland', '8641',	'Sorring']
;$arr[] = ['Region Midtjylland', '8643',	'Ans By']
;$arr[] = ['Region Midtjylland', '8643',	'Ans By']
;$arr[] = ['Region Midtjylland', '8653',	'Them']
;$arr[] = ['Region Midtjylland', '8654',	'Bryrup']
;$arr[] = ['Region Midtjylland', '8654',	'Bryrup']
;$arr[] = ['Region Midtjylland', '8654',	'Bryrup']
;$arr[] = ['Region Midtjylland', '8660',	'Skanderborg']
;$arr[] = ['Region Midtjylland', '8660',	'Skanderborg']
;$arr[] = ['Region Midtjylland', '8660',	'Skanderborg']
;$arr[] = ['Region Midtjylland', '8660',	'Skanderborg']
;$arr[] = ['Region Midtjylland', '8670',	'Låsby']
;$arr[] = ['Region Midtjylland', '8680',	'Ry']
;$arr[] = ['Region Midtjylland', '8680',	'Ry']
;$arr[] = ['Region Midtjylland', '8680',	'Ry']
;$arr[] = ['Region Midtjylland', '8700',	'Horsens']
;$arr[] = ['Region Midtjylland', '8700',	'Horsens']
;$arr[] = ['Region Midtjylland', '8721',	'Daugård']
;$arr[] = ['Region Midtjylland', '8722',	'Hedensted']
;$arr[] = ['Region Midtjylland', '8723',	'Løsning']
;$arr[] = ['Region Midtjylland', '8732',	'Hovedgård']
;$arr[] = ['Region Midtjylland', '8740',	'Brædstrup']
;$arr[] = ['Region Midtjylland', '8740',	'Brædstrup']
;$arr[] = ['Region Midtjylland', '8751',	'Gedved']
;$arr[] = ['Region Midtjylland', '8751',	'Gedved']
;$arr[] = ['Region Midtjylland', '8752',	'Østbirk']
;$arr[] = ['Region Midtjylland', '8762',	'Flemming']
;$arr[] = ['Region Midtjylland', '8762',	'Flemming']
;$arr[] = ['Region Midtjylland', '8763',	'Rask Mølle']
;$arr[] = ['Region Midtjylland', '8765',	'Klovborg']
;$arr[] = ['Region Midtjylland', '8765',	'Klovborg']
;$arr[] = ['Region Midtjylland', '8766',	'Nørre Snede']
;$arr[] = ['Region Midtjylland', '8766',	'Nørre Snede']
;$arr[] = ['Region Midtjylland', '8781',	'Stenderup']
;$arr[] = ['Region Midtjylland', '8781',	'Stenderup']
;$arr[] = ['Region Midtjylland', '8783',	'Hornsyld']
;$arr[] = ['Region Midtjylland', '8783',	'Hornsyld']
;$arr[] = ['Region Midtjylland', '8800',	'Viborg']
;$arr[] = ['Region Midtjylland', '8800',	'Viborg']
;$arr[] = ['Region Midtjylland', '8830',	'Tjele']
;$arr[] = ['Region Midtjylland', '8831',	'Løgstrup']
;$arr[] = ['Region Midtjylland', '8832',	'Skals']
;$arr[] = ['Region Midtjylland', '8840',	'Rødkærsbro']
;$arr[] = ['Region Midtjylland', '8840',	'Rødkærsbro']
;$arr[] = ['Region Midtjylland', '8850',	'Bjerringbro']
;$arr[] = ['Region Midtjylland', '8850',	'Bjerringbro']
;$arr[] = ['Region Midtjylland', '8860',	'Ulstrup']
;$arr[] = ['Region Midtjylland', '8860',	'Ulstrup']
;$arr[] = ['Region Midtjylland', '8860',	'Ulstrup']
;$arr[] = ['Region Midtjylland', '8870',	'Langå']
;$arr[] = ['Region Midtjylland', '8870',	'Langå']
;$arr[] = ['Region Midtjylland', '8881',	'Thorsø']
;$arr[] = ['Region Midtjylland', '8881',	'Thorsø']
;$arr[] = ['Region Midtjylland', '8882',	'Fårvang']
;$arr[] = ['Region Midtjylland', '8882',	'Fårvang']
;$arr[] = ['Region Midtjylland', '8883',	'Gjern']
;$arr[] = ['Region Midtjylland', '8900',	'Randers C']
;$arr[] = ['Region Midtjylland', '8920',	'Randers NV']
;$arr[] = ['Region Midtjylland', '8930',	'Randers NØ']
;$arr[] = ['Region Midtjylland', '8940',	'Randers SV']
;$arr[] = ['Region Midtjylland', '8940',	'Randers SV']
;$arr[] = ['Region Midtjylland', '8950',	'Ørsted']
;$arr[] = ['Region Midtjylland', '8960',	'Randers SØ']
;$arr[] = ['Region Midtjylland', '8960',	'Randers SØ']
;$arr[] = ['Region Midtjylland', '8961',	'Allingåbro']
;$arr[] = ['Region Midtjylland', '8963',	'Auning']
;$arr[] = ['Region Midtjylland', '8963',	'Auning']
;$arr[] = ['Region Nordjylland', '8970',	'Havndal']
;$arr[] = ['Region Midtjylland', '8970',	'Havndal']
;$arr[] = ['Region Midtjylland', '8981',	'Spentrup']
;$arr[] = ['Region Midtjylland', '8983',	'Gjerlev J']
;$arr[] = ['Region Nordjylland', '8990',	'Fårup']
;$arr[] = ['Region Midtjylland', '8990',	'Fårup']
;$arr[] = ['Region Nordjylland', '9000',	'Aalborg']
;$arr[] = ['Region Nordjylland', '9200',	'Aalborg SV']
;$arr[] = ['Region Nordjylland', '9210',	'Aalborg SØ']
;$arr[] = ['Region Nordjylland', '9220',	'Aalborg Øst']
;$arr[] = ['Region Nordjylland', '9230',	'Svenstrup J']
;$arr[] = ['Region Nordjylland', '9230',	'Svenstrup J']
;$arr[] = ['Region Nordjylland', '9240',	'Nibe']
;$arr[] = ['Region Nordjylland', '9240',	'Nibe']
;$arr[] = ['Region Nordjylland', '9240',	'Nibe']
;$arr[] = ['Region Nordjylland', '9260',	'Gistrup']
;$arr[] = ['Region Nordjylland', '9260',	'Gistrup']
;$arr[] = ['Region Nordjylland', '9270',	'Klarup']
;$arr[] = ['Region Nordjylland', '9280',	'Storvorde']
;$arr[] = ['Region Nordjylland', '9293',	'Kongerslev']
;$arr[] = ['Region Nordjylland', '9293',	'Kongerslev']
;$arr[] = ['Region Nordjylland', '9300',	'Sæby']
;$arr[] = ['Region Nordjylland', '9310',	'Vodskov']
;$arr[] = ['Region Nordjylland', '9320',	'Hjallerup']
;$arr[] = ['Region Nordjylland', '9320',	'Hjallerup']
;$arr[] = ['Region Nordjylland', '9330',	'Dronninglund']
;$arr[] = ['Region Nordjylland', '9330',	'Dronninglund']
;$arr[] = ['Region Nordjylland', '9340',	'Asaa']
;$arr[] = ['Region Nordjylland', '9340',	'Asaa']
;$arr[] = ['Region Nordjylland', '9352',	'Dybvad']
;$arr[] = ['Region Nordjylland', '9352',	'Dybvad']
;$arr[] = ['Region Nordjylland', '9362',	'Gandrup']
;$arr[] = ['Region Nordjylland', '9370',	'Hals']
;$arr[] = ['Region Nordjylland', '9370',	'Hals']
;$arr[] = ['Region Nordjylland', '9380',	'Vestbjerg']
;$arr[] = ['Region Nordjylland', '9381',	'Sulsted']
;$arr[] = ['Region Nordjylland', '9381',	'Sulsted']
;$arr[] = ['Region Nordjylland', '9382',	'Tylstrup']
;$arr[] = ['Region Nordjylland', '9382',	'Tylstrup']
;$arr[] = ['Region Nordjylland', '9382',	'Tylstrup']
;$arr[] = ['Region Nordjylland', '9400',	'Nørresundby']
;$arr[] = ['Region Nordjylland', '9430',	'Vadum']
;$arr[] = ['Region Nordjylland', '9430',	'Vadum']
;$arr[] = ['Region Nordjylland', '9440',	'Aabybro']
;$arr[] = ['Region Nordjylland', '9440',	'Aabybro']
;$arr[] = ['Region Nordjylland', '9440',	'Aabybro']
;$arr[] = ['Region Nordjylland', '9460',	'Brovst']
;$arr[] = ['Region Nordjylland', '9480',	'Løkken']
;$arr[] = ['Region Nordjylland', '9480',	'Løkken']
;$arr[] = ['Region Nordjylland', '9480',	'Løkken']
;$arr[] = ['Region Nordjylland', '9490',	'Pandrup']
;$arr[] = ['Region Nordjylland', '9492',	'Blokhus']
;$arr[] = ['Region Nordjylland', '9493',	'Saltum']
;$arr[] = ['Region Nordjylland', '9500',	'Hobro']
;$arr[] = ['Region Nordjylland', '9500',	'Hobro']
;$arr[] = ['Region Midtjylland', '9500',	'Hobro']
;$arr[] = ['Region Nordjylland', '9510',	'Arden']
;$arr[] = ['Region Nordjylland', '9510',	'Arden']
;$arr[] = ['Region Nordjylland', '9520',	'Skørping']
;$arr[] = ['Region Nordjylland', '9530',	'Støvring']
;$arr[] = ['Region Nordjylland', '9530',	'Støvring']
;$arr[] = ['Region Nordjylland', '9541',	'Suldrup']
;$arr[] = ['Region Nordjylland', '9541',	'Suldrup']
;$arr[] = ['Region Nordjylland', '9550',	'Mariager']
;$arr[] = ['Region Midtjylland', '9550',	'Mariager']
;$arr[] = ['Region Nordjylland', '9560',	'Hadsund']
;$arr[] = ['Region Nordjylland', '9560',	'Hadsund']
;$arr[] = ['Region Nordjylland', '9574',	'Bælum']
;$arr[] = ['Region Nordjylland', '9575',	'Terndrup']
;$arr[] = ['Region Nordjylland', '9600',	'Aars']
;$arr[] = ['Region Nordjylland', '9600',	'Aars']
;$arr[] = ['Region Nordjylland', '9610',	'Nørager']
;$arr[] = ['Region Nordjylland', '9610',	'Nørager']
;$arr[] = ['Region Nordjylland', '9620',	'Aalestrup']
;$arr[] = ['Region Nordjylland', '9620',	'Aalestrup']
;$arr[] = ['Region Nordjylland', '9620',	'Aalestrup']
;$arr[] = ['Region Midtjylland', '9620',	'Aalestrup']
;$arr[] = ['Region Nordjylland', '9631',	'Gedsted']
;$arr[] = ['Region Midtjylland', '9631',	'Gedsted']
;$arr[] = ['Region Nordjylland', '9632',	'Møldrup']
;$arr[] = ['Region Midtjylland', '9632',	'Møldrup']
;$arr[] = ['Region Nordjylland', '9640',	'Farsø']
;$arr[] = ['Region Nordjylland', '9670',	'Løgstør']
;$arr[] = ['Region Nordjylland', '9670',	'Løgstør']
;$arr[] = ['Region Nordjylland', '9681',	'Ranum']
;$arr[] = ['Region Nordjylland', '9690',	'Fjerritslev']
;$arr[] = ['Region Nordjylland', '9700',	'Brønderslev']
;$arr[] = ['Region Nordjylland', '9700',	'Brønderslev']
;$arr[] = ['Region Nordjylland', '9740',	'Jerslev J']
;$arr[] = ['Region Nordjylland', '9740',	'Jerslev J']
;$arr[] = ['Region Nordjylland', '9750',	'Østervrå']
;$arr[] = ['Region Nordjylland', '9750',	'Østervrå']
;$arr[] = ['Region Nordjylland', '9750',	'Østervrå']
;$arr[] = ['Region Nordjylland', '9760',	'Vrå']
;$arr[] = ['Region Nordjylland', '9760',	'Vrå']
;$arr[] = ['Region Nordjylland', '9800',	'Hjørring']
;$arr[] = ['Region Nordjylland', '9830',	'Tårs']
;$arr[] = ['Region Nordjylland', '9830',	'Tårs']
;$arr[] = ['Region Nordjylland', '9850',	'Hirtshals']
;$arr[] = ['Region Nordjylland', '9870',	'Sindal']
;$arr[] = ['Region Nordjylland', '9870',	'Sindal']
;$arr[] = ['Region Nordjylland', '9881',	'Bindslev']
;$arr[] = ['Region Nordjylland', '9881',	'Bindslev']
;$arr[] = ['Region Nordjylland', '9900',	'Frederikshavn']
;$arr[] = ['Region Nordjylland', '9900',	'Frederikshavn']
;$arr[] = ['Region Nordjylland', '9940',	'Læsø']
;$arr[] = ['Region Nordjylland', '9970',	'Strandby']
;$arr[] = ['Region Nordjylland', '9981',	'Jerup']
;$arr[] = ['Region Nordjylland', '9982',	'Ålbæk']
;$arr[] = ['Region Nordjylland', '9982',	'Ålbæk']
;$arr[] = ['Region Nordjylland', '9990',	'Skagen'];





foreach ($arr as $key => $value) {

	switch ($value[0]) {
		case 'Region Hovedstaden':
			$regionCode = 1;
			break;

		case 'Region Sjælland':
			$regionCode = 2;
			break;

		case 'Region Sjælland':
			$regionCode = 2;
			break;

		case 'Region Syddanmark':
			$regionCode = 3;
			break;

		case 'Region Midtjylland':
			$regionCode = 4;
			break;
		case 'Region Nordjylland':
			$regionCode = 5;
			break;
		
		default:
			# code...
			break;
	}

	$regiondata = array(
		'regionCode' => $regionCode,
		'regionName' => $value[0],
		'regionCityName' => $value[2],
		'regionPostalCode' => $value[1]


	);
	//$this->db->insert('regions', $regiondata);
}



	}

}
