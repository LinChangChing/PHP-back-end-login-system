-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 伺服器版本:                        10.4.21-MariaDB - mariadb.org binary distribution
-- 伺服器作業系統:                      Win64
-- HeidiSQL 版本:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- 傾印  資料表 web08.account 結構
CREATE TABLE IF NOT EXISTS `account` (
  `a_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- 正在傾印表格  web08.account 的資料：~3 rows (近似值)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`a_id`, `username`, `password`, `level`) VALUES
	(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 2),
	(2, 'admin02', '81dc9bdb52d04dc20036dbd8313ed055', 1),
	(3, 'mem01', '674f3c2c1a8a6f90461e8a66fb5550ba', 0);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- 傾印  資料表 web08.webhit 結構
CREATE TABLE IF NOT EXISTS `webhit` (
  `hit_id` int(11) NOT NULL AUTO_INCREMENT,
  `hit_time` datetime NOT NULL,
  PRIMARY KEY (`hit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8;

-- 正在傾印表格  web08.webhit 的資料：~270 rows (近似值)
/*!40000 ALTER TABLE `webhit` DISABLE KEYS */;
INSERT INTO `webhit` (`hit_id`, `hit_time`) VALUES
	(317, '2022-01-05 22:44:13');
/*!40000 ALTER TABLE `webhit` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
