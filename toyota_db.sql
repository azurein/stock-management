-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2017 at 01:46 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toyota_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukti_serah_terima_barang`
--

CREATE TABLE `bukti_serah_terima_barang` (
  `no_bukti_serah_terima_barang` varchar(50) NOT NULL,
  `tgl_bukti_serah_terima_barang` datetime NOT NULL,
  `no_delivery_order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_serah_terima_barang`
--

INSERT INTO `bukti_serah_terima_barang` (`no_bukti_serah_terima_barang`, `tgl_bukti_serah_terima_barang`, `no_delivery_order`) VALUES
('BSTB-080113-055405', '2013-01-08 05:54:05', 'DO-080113-055217'),
('BSTB-080113-064207', '2013-01-08 06:42:07', 'DO-080113-055217');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE `delivery_order` (
  `no_delivery_order` varchar(50) NOT NULL,
  `tgl_delivery_order` date NOT NULL,
  `harga_transaksi` float NOT NULL,
  `no_mobil` varchar(50) NOT NULL,
  `no_purchase_order` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_order`
--

INSERT INTO `delivery_order` (`no_delivery_order`, `tgl_delivery_order`, `harga_transaksi`, `no_mobil`, `no_purchase_order`) VALUES
('DO-080113-055217', '2013-01-08', 300000000, '1-091212-020109', 'PO-201112-90000'),
('DO-080113-064107', '2013-01-08', 7872340, '1-091212-020103', 'PO-201112-90021');

-- --------------------------------------------------------

--
-- Table structure for table `detil_harga`
--

CREATE TABLE `detil_harga` (
  `tipe_mobil` varchar(100) NOT NULL,
  `persentase_dp` float NOT NULL,
  `harga_tunai` float NOT NULL,
  `lama_angsuran` int(11) NOT NULL,
  `harga_kredit` float NOT NULL,
  `harga_asuransi_pertahun` float NOT NULL,
  `id_leasing` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_harga`
--

INSERT INTO `detil_harga` (`tipe_mobil`, `persentase_dp`, `harga_tunai`, `lama_angsuran`, `harga_kredit`, `harga_asuransi_pertahun`, `id_leasing`) VALUES
('1.5VELOZ-AT', 50, 229000000, 11, 250000000, 15000000, 1),
('1.5VELOZ-MT', 30, 200000000, 11, 226000000, 10000000, 1),
('2.5Hybrid-AT', 30, 300000000, 35, 340000000, 12000000, 1),
('2.5V-AT', 30, 385000000, 47, 410000000, 15000000, 1),
('2.5G-AT', 30, 395000000, 23, 420000000, 14000000, 1),
('1.5VELOZ-AT', 50, 229000000, 23, 280000000, 15000000, 1),
('1.5VELOZ-AT', 50, 229000000, 35, 320000000, 15000000, 1),
('1.5VELOZ-AT', 50, 229000000, 47, 370000000, 15000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detil_katalog`
--

CREATE TABLE `detil_katalog` (
  `id_katalog` int(11) NOT NULL,
  `tipe_mobil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_katalog`
--

INSERT INTO `detil_katalog` (`id_katalog`, `tipe_mobil`) VALUES
(3, '2.5Hybrid-AT'),
(3, '2.5V-AT'),
(3, '2.5G-AT'),
(1, '1.5VELOZ-AT'),
(1, '1.5VELOZ-MT');

-- --------------------------------------------------------

--
-- Table structure for table `history_spk`
--

CREATE TABLE `history_spk` (
  `tgl_history_spk` datetime NOT NULL,
  `no_spk_lama` varchar(50) NOT NULL,
  `tgl_entry_spk_lama` datetime NOT NULL,
  `tipe_mobil_pesanan_lama` varchar(11) NOT NULL,
  `warna_mobil_pesanan_lama` varchar(11) NOT NULL,
  `asuransi_lama` varchar(11) NOT NULL,
  `harga_kendaraan_tunai_lama` float NOT NULL,
  `harga_kendaraan_kredit_lama` float NOT NULL,
  `jumlah_dp_lama` float NOT NULL,
  `lama_angsuran_lama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inspeksi`
--

CREATE TABLE `inspeksi` (
  `id_inspeksi` varchar(10) NOT NULL,
  `no_mobil` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `idEmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `nama_mobil` varchar(50) NOT NULL,
  `gambar_logo` text NOT NULL,
  `gambar_depan` text,
  `gambar_dasbor` text,
  `gambar_kursi` text,
  `gambar_bagasi` text,
  `gambar_spidometer` text,
  `periode` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `brosur` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama_mobil`, `gambar_logo`, `gambar_depan`, `gambar_dasbor`, `gambar_kursi`, `gambar_bagasi`, `gambar_spidometer`, `periode`, `status`, `brosur`) VALUES
(1, 'All-New-Avanza-Veloz', 'staff_site_files/images/cars/logo_AllNewAvanza.png', 'staff_site_files/images/cars/model_AllNewAvanza.gif', 'staff_site_files/images/cars/avanza_dasbor.jpg', 'staff_site_files/images/cars/avanza_kursi.jpg', 'staff_site_files/images/cars/avanza_bagasi.jpg', 'staff_site_files/images/cars/avanza_speedometer.jpg', '2012', 'ditampilkan', NULL),
(2, 'Vios', 'staff_site_files/images/cars/logo_vios.png', 'staff_site_files/images/cars/model_vios.png', 'staff_site_files/images/cars/vios_dasbor.jpg', 'staff_site_files/images/cars/vios_kursi,jpg', 'staff_site_files/images/cars/vios_bagasi.jpg', 'staff_site_files/images/cars/vios_speedometer.jpg', '2012', 'ditampilkan', NULL),
(4, 'Grand-New-Corolla-Altis', 'staff_site_files/images/cars/logo_GrandNewCorollaAltis.png', 'staff_site_files/images/cars/model_GrandNewCorollaAltis.png', 'staff_site_files/images/cars/Corolla_Altis_dashboard.JPG', 'staff_site_files/images/cars/Corolla_Altis_bangku.jpg', 'staff_site_files/images/cars/Corolla_Altis_bagasi.jpg', 'staff_site_files/images/cars/Corolla_Altis_speedometer.jpg', '2012', 'ditampilkan', NULL),
(8, 'All-New-Camry', 'staff_site_files/images/cars/logo_AllNewCamry.png', 'staff_site_files/images/cars/model_AllNewCamry.png', 'staff_site_files/images/cars/all_new_camry_dasbor.jpg', 'staff_site_files/images/cars/all_new_camry_bangku.jpg', 'staff_site_files/images/cars/all_new_camry_bagasi.jpg', 'staff_site_files/images/cars/all_new_camry_speedometer.jpg', '2012', 'ditampilkan', '<iframe src=\"https://docs.google.com/file/d/0By2FqOfoMtthNjRKWDlseXRCbTA/preview\" width=\"640\" height=\"480\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `no_mobil` varchar(20) NOT NULL,
  `tipe_mobil` varchar(20) NOT NULL,
  `no_rangka` varchar(20) NOT NULL,
  `no_mesin` varchar(20) NOT NULL,
  `warna_mobil` varchar(50) NOT NULL,
  `tgl_perkiraan_masuk_gudang` date DEFAULT NULL,
  `tgl_masuk_gudang` date DEFAULT NULL,
  `tgl_keluar_gudang` date DEFAULT NULL,
  `status_mobil` varchar(10) NOT NULL,
  `no_spk` varchar(20) DEFAULT NULL,
  `nama_mobil` varchar(20) NOT NULL,
  `plat_mobil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`no_mobil`, `tipe_mobil`, `no_rangka`, `no_mesin`, `warna_mobil`, `tgl_perkiraan_masuk_gudang`, `tgl_masuk_gudang`, `tgl_keluar_gudang`, `status_mobil`, `no_spk`, `nama_mobil`, `plat_mobil`) VALUES
('1-091212-020101', '2.5Hybrid-AT', 'F700RE-GQMFJ', '3SZ-DDD0933', 'black-metallic', '2013-01-10', '2012-12-01', NULL, 'ready', NULL, 'All-New-Camry', NULL),
('1-091212-020102', '2.5V-AT', 'F700RE-GQMFK', '3SZ-DDD0934', 'silver-metallic', '2012-12-01', '2012-12-03', NULL, 'ready', NULL, 'All-New-Camry', NULL),
('1-091212-020103', '1.5VELOZ-AT', 'F700RE-GQMFL', '3SZ-DDD0935', 'dark-steel-mica', '2012-12-01', '2012-12-01', NULL, 'sold', '1-030113-054513', 'All-New-Avanza-Veloz', ''),
('1-091212-020104', '1.5VELOZ-MT', 'F700RE-GQMFM', '3SZ-DDD0936', 'dark-steel-mica', '2012-12-31', NULL, NULL, 'booked', '', 'All-New-Avanza-Veloz', NULL),
('1-091212-020105', '1.5VELOZ-AT', 'F700RE-GQMFN', '3SZ-DDD0937', 'black-metallic', '2012-12-30', NULL, NULL, 'ready', '', 'All-New-Avanza-Veloz', NULL),
('1-091212-020106', '1.5VELOZ-MT', 'F700RE-GQMFO', '3SZ-DDD0938', 'silver-mica-metallic', '2013-01-05', NULL, NULL, 'MDP', NULL, 'All-New-Avanza-Veloz', 'B3820GJH'),
('1-091212-020107', '1.5VELOZ-AT', 'F700RE-GQMFA', '3SZ-DDZ0935', 'dark-steel-mica', '2012-12-01', '2012-12-01', NULL, 'ready', NULL, 'All-New-Avanza-Veloz', 'B1231UUH'),
('1-091212-020108', '1.5VELOZ-AT', 'F700RE-GQAFL', '3SZ-DDD0835', 'dark-steel-mica', '2012-12-01', '2012-12-01', NULL, 'ready', NULL, 'All-New-Avanza-Veloz', ''),
('1-091212-020109', '1.5VELOZ-AT', 'F700RE-GQLLA', '3SZ-DDD0000', 'dark-steel-mica', '2012-12-01', '2012-12-01', NULL, 'sold', '5-091212-153405', 'All-New-Avanza-Veloz', NULL),
('1-091212-020777', '1.5VELOZ-AT', 'F700RE-GQMFO', '3SZ-DDD0938', 'silver-mica-metallic', '2013-01-05', NULL, NULL, 'booked', '1-131212-082320', 'All-New-Avanza-Veloz', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mscustomer`
--

CREATE TABLE `mscustomer` (
  `no_KTP` varchar(30) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `alamat_customer` varchar(50) NOT NULL,
  `kontak_customer` varchar(50) NOT NULL,
  `kode_pos` int(20) NOT NULL,
  `NPWP` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mscustomer`
--

INSERT INTO `mscustomer` (`no_KTP`, `nama_customer`, `alamat_customer`, `kontak_customer`, `kode_pos`, `NPWP`) VALUES
('3173050807920003', 'ERRIC SURYADI', 'JL JERUK MANIS V NO 95', '5653561', 11510, ''),
('3172061204920003', 'IVAN', 'KLP KOPYOR TIMUR III BH 2/8', '081646095958', 11480, ''),
('1234567890', 'Spike', 'JALAN KAMAL RAYA NOMOR 41', '021999999', 11820, '123212312'),
('3173060611920002', 'ROBIN COSAMAS', 'JALAN KAMAL RAYA NOMOR 40', '08988360025', 11820, ''),
('2832193712389', 'ASDHASJUDH', 'QWHEDWQB', '12312321312', 123123123, '');

-- --------------------------------------------------------

--
-- Table structure for table `msemployee`
--

CREATE TABLE `msemployee` (
  `idEmp` int(11) NOT NULL,
  `namaEmp` varchar(100) NOT NULL,
  `posisiEmp` varchar(50) NOT NULL,
  `emailEmp` varchar(100) DEFAULT NULL,
  `passEmp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msemployee`
--

INSERT INTO `msemployee` (`idEmp`, `namaEmp`, `posisiEmp`, `emailEmp`, `passEmp`) VALUES
(1, 'Robin Cosamas', 'administrasi', 'administrasi', 'minorproject'),
(2, 'Ivan', 'staff gudang', 'gudang', 'minorproject'),
(6, 'Boby Hartanto', 'kasir', 'kasir', 'minorproject'),
(7, 'Erric Suryadi', 'sales', 'sales', 'minorproject'),
(10, 'Vivensius', 'manager', 'manager', 'minorproject'),
(11, 'test', 'administrasi', 'test@test.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `msleasing`
--

CREATE TABLE `msleasing` (
  `id_leasing` int(11) NOT NULL,
  `no_siup` varchar(100) NOT NULL,
  `nama_leasing` varchar(200) NOT NULL,
  `alamat_leasing` varchar(300) NOT NULL,
  `kontak_leasing` varchar(50) NOT NULL,
  `kode_pos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msleasing`
--

INSERT INTO `msleasing` (`id_leasing`, `no_siup`, `nama_leasing`, `alamat_leasing`, `kontak_leasing`, `kode_pos`) VALUES
(1, '1234567890', 'ADIRA FINANCE', 'Jalan Angsuran No. 50', '1234567', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_pembayaran`
--

CREATE TABLE `penerimaan_pembayaran` (
  `no_penerimaan_pembayaran` int(20) NOT NULL,
  `tgl_penerimaan_pembayaran` datetime NOT NULL,
  `no_spk` varchar(20) NOT NULL,
  `nilai_uang` float NOT NULL,
  `no_kwitansi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan_pembayaran`
--

INSERT INTO `penerimaan_pembayaran` (`no_penerimaan_pembayaran`, `tgl_penerimaan_pembayaran`, `no_spk`, `nilai_uang`, `no_kwitansi`) VALUES
(1, '2012-12-09 17:36:02', '1-091212-153405', 5000000, '1234-1234-1234'),
(2, '2012-12-10 17:36:02', '1-091212-153405', 100000000, '1234-1234-1235'),
(3, '2012-12-14 07:30:24', '5-091212-153405', 10000000, '4342-0954-2091'),
(4, '2012-12-11 17:36:02', '1-091212-153405', 139000000, '1234-1234-1236'),
(5, '2012-12-13 00:00:00', '1-111212-191834', 5000000, '1234-1234-1237'),
(6, '2012-12-13 00:00:00', '1-111212-191834', 100000000, '1234-1234-1238'),
(7, '2012-12-12 00:00:00', '1-131212-082145', 5000000, '1234-1234-1239'),
(8, '2012-12-11 17:36:02', '7-091212-153405', 5000000, '1234-1234-1261'),
(9, '2012-12-13 17:36:02', '7-091212-153405', 83700000, '1234-1234-1261'),
(10, '2013-01-08 05:13:02', '1-030113-054513', 5000000, 'KWI-001-0113'),
(11, '2013-01-08 05:17:10', '1-030113-054517', 5000000, 'KWI-001-0118'),
(12, '2013-01-08 05:40:19', '1-040113-100105', 5000000, 'KWI-001-0135'),
(13, '2013-01-08 05:46:14', '1-151212-001425', 5000000, 'KWI-001-8000'),
(14, '2013-01-08 05:49:32', '1-131212-082320', 5000000, 'KWI-001-8001'),
(15, '2013-01-08 05:59:00', '1-131212-082320', 229000000, 'KWI-001-8003'),
(16, '2013-01-08 06:34:37', '2-030113-054517', 5000000, 'KWI-001-8030');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_pembayaran_tagihan`
--

CREATE TABLE `penerimaan_pembayaran_tagihan` (
  `no_penerimaan_pembayaran_tagihan` varchar(50) NOT NULL,
  `tgl_penerimaan_pembayaran_tagihan` datetime NOT NULL,
  `nilai_tagihan` float NOT NULL,
  `no_tagihan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_faktur`
--

CREATE TABLE `pengajuan_faktur` (
  `no_pengajuan_faktur` varchar(50) NOT NULL,
  `tgl_pengajuan_faktur` datetime NOT NULL,
  `no_delivery_order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_faktur`
--

INSERT INTO `pengajuan_faktur` (`no_pengajuan_faktur`, `tgl_pengajuan_faktur`, `no_delivery_order`) VALUES
('PF-080113-055351', '2013-01-08 05:53:51', 'DO-080113-055217'),
('PF-080113-064143', '2013-01-08 06:41:43', 'DO-080113-055217');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `no_surat_keluar` varchar(50) NOT NULL,
  `idEmp` int(11) NOT NULL,
  `tgl_pengeluaran` datetime NOT NULL,
  `status_keluar` varchar(20) NOT NULL,
  `keterangan_keluar` varchar(50) DEFAULT NULL,
  `no_mesin` varchar(20) NOT NULL,
  `no_rangka` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_pesanan_kendaraan`
--

CREATE TABLE `surat_pesanan_kendaraan` (
  `no_spk` varchar(20) NOT NULL DEFAULT '',
  `tgl_entry_spk` datetime DEFAULT NULL,
  `tipe_mobil` varchar(50) DEFAULT NULL,
  `warna_mobil_pesanan` varchar(50) DEFAULT NULL,
  `jenis_pembayaran` varchar(10) DEFAULT NULL,
  `asuransi` float DEFAULT NULL,
  `idEmp` varchar(10) DEFAULT NULL,
  `no_KTP` varchar(30) DEFAULT NULL,
  `lama_angsuran` int(2) DEFAULT NULL,
  `jumlah_dp` float DEFAULT NULL,
  `tahap` int(11) NOT NULL,
  `booking_fee` float DEFAULT NULL,
  `harga_kendaraan_tunai` float DEFAULT NULL,
  `harga_kendaraan_kredit` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pesanan_kendaraan`
--

INSERT INTO `surat_pesanan_kendaraan` (`no_spk`, `tgl_entry_spk`, `tipe_mobil`, `warna_mobil_pesanan`, `jenis_pembayaran`, `asuransi`, `idEmp`, `no_KTP`, `lama_angsuran`, `jumlah_dp`, `tahap`, `booking_fee`, `harga_kendaraan_tunai`, `harga_kendaraan_kredit`) VALUES
('1-030113-054513', '2013-01-08 05:18:32', '1.5VELOZ-AT', 'dark-steel-mica', 'kredit', 0, '7', '3173060611920002', 47, 68700000, 1, 10, 0, 7872340),
('1-091212-153405', '2012-12-13 07:26:09', '1.5VELOZ-A/T', 'dark-steel-mica', 'tunai', 15000000, '7', '3173060611920002', 11, 68700000, 2, 5000000, 229000000, 0),
('1-111212-191834', '2012-12-14 00:00:00', '2.5Hybrid-A/T', 'black-metallic', 'kredit', 10000000, '7', '3173050807920003', 23, 90000000, 2, 5000000, NULL, 365000000),
('1-131212-082145', '2012-12-13 00:00:00', '1.5VELOZ-A/T', 'black-metallic', 'tunai', 15000000, '7', '3172061204920003', 11, 68700000, 1, 5000000, 229000000, NULL),
('1-131212-082320', '2013-01-08 05:49:56', '1.5VELOZ-AT', 'silver-mica-metallic', 'tunai', 0, '7', '3173060611920002', 11, 68700000, 2, 5, 229000000, 229000000),
('5-091212-153405', '2012-12-14 08:52:13', '1.5VELOZ-A/T', 'dark-steel-mica', 'kredit', 15000000, '7', '3173060611920002', 35, 68700000, 1, 5000000, 229000000, 285000000),
('7-091212-153405', '2012-12-14 08:52:15', '1.5VELOZ-A/T', 'dark-steel-mica', 'kredit', 15000000, '7', '3173060611920002', 35, 68700000, 2, 5000000, 229000000, 285000000);

-- --------------------------------------------------------

--
-- Table structure for table `surat_terima`
--

CREATE TABLE `surat_terima` (
  `no_surat_terima` varchar(50) NOT NULL,
  `idEmp` int(11) NOT NULL,
  `tgl_penerimaan` datetime NOT NULL,
  `no_mesin` varchar(20) NOT NULL,
  `no_rangka` varchar(20) NOT NULL,
  `status_terima` varchar(20) NOT NULL,
  `keterangan_terima` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `no_tagihan` varchar(50) NOT NULL,
  `tgl_tagihan` datetime NOT NULL,
  `no_purchase_order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`no_tagihan`, `tgl_tagihan`, `no_purchase_order`) VALUES
('TA-080113-055710', '2013-01-08 05:57:10', 'PO-201112-90000');

-- --------------------------------------------------------

--
-- Table structure for table `tiga_d`
--

CREATE TABLE `tiga_d` (
  `id_katalog` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `nama_mobil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiga_d`
--

INSERT INTO `tiga_d` (`id_katalog`, `gambar`, `nama_mobil`) VALUES
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-1.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-2.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-3.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-4.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-5.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-6.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-7.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-8.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-9.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-10.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-11.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-12.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-13.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-14.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-15.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-16.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-17.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-18.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-19.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-20.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-21.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-22.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-23.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-24.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-25.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-26.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-27.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-28.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-29.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-30.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-31.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-32.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-33.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-34.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-35.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-36.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-37.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-38.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-39.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-40.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-41.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-42.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-43.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-44.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-45.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-46.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-47.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-48.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-49.jpg', 'All-New-Camry'),
(8, 'staff_site_files/images/3d/Toyota_Camry_US_SE_2012_360_720_50-50.jpg', 'All-New-Camry'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-1.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-2.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-3.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-4.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-5.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-6.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-7.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-8.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-9.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-10.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-11.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-12.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-13.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-14.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-15.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-16.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-17.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-18.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-19.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-20.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-21.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-22.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-23.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-24.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-25.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-26.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-27.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-28.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-29.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-30.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-31.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-32.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-33.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-34.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-35.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-36.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-37.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-38.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-39.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-40.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-41.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-42.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-43.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-44.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-45.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-46.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-47.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-48.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-49.jpg', 'Vios'),
(2, 'staff_site_files/images/3d/Toyota_Vios_2007_360_720_50-50.jpg', 'Vios'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-1.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-2.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-3.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-4.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-5.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-6.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-7.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-8.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-9.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-10.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-11.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-12.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-13.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-14.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-15.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-16.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-17.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-18.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-19.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-20.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-21.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-22.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-23.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-24.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-25.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-26.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-27.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-28.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-29.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-30.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-31.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-32.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-33.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-34.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-35.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-36.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-37.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-38.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-39.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-40.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-41.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-42.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-43.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-44.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-45.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-46.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-47.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-48.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-49.jpg', 'All-New-Avanza-Veloz'),
(1, 'staff_site_files/images/3d/Toyota_Avanza_2012_360_720_50-50.jpg', 'All-New-Avanza-Veloz'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-1.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-2.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-3.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-4.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-5.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-6.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-7.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-8.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-9.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-10.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-11.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-12.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-13.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-14.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-15.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-16.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-17.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-18.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-19.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-20.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-21.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-22.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-23.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-24.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-25.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-26.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-27.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-28.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-29.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-30.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-31.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-32.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-33.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-34.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-35.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-36.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-37.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-38.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-39.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-40.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-41.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-42.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-43.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-44.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-45.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-46.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-47.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-48.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-49.jpg', 'Grand-New-Corolla-Altis'),
(4, 'staff_site_files/images/3d/Toyota_Corolla_2012_360_720_50-50.jpg', 'Grand-New-Corolla-Altis');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `kode_warna` varchar(20) NOT NULL,
  `nama_warna` varchar(100) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `metallic` varchar(10) DEFAULT NULL,
  `gambar_warna` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`kode_warna`, `nama_warna`, `nama_mobil`, `metallic`, `gambar_warna`) VALUES
('#000000', 'dark-steel-mica', 'All-New-Avanza-Veloz', NULL, 'staff_site_files/images/cars_color/avanzaVeloz_DarkSteelMica.gif'),
('#040404', 'attitude-black-mika', 'All-New-Camry', NULL, 'staff_site_files/images/cars_color/camry_attitudeBlackMica.gif'),
('#04252b', 'dark-steel-mica', 'Hilux', NULL, 'staff_site_files/images/cars_color/newHilux_darkSteelMica.png'),
('#090909', 'black-mica', 'Grand-New-Kijang-Inova', NULL, 'staff_site_files/images/cars_color/GrandNewKijangInnova_blackMica.png'),
('#0a0a0a', 'black-mica', 'Hilux', NULL, 'staff_site_files/images/cars_color/newHilux_blackMica.png'),
('#101011', 'dark-steel-metallic', 'Grand-New-Kijang-Inova', NULL, 'staff_site_files/images/cars_color/GrandNewKijangInnova_darkSteelMetalic.png'),
('#192d3b', 'dark-grey-mica-metallic', 'Hilux', NULL, 'staff_site_files/images/cars_color/newHilux_darkGreyMicaMetalic.png'),
('#1c5078', 'blue-metallic', 'Hilux', NULL, 'staff_site_files/images/cars_color/newHilux_blueMetalic.png'),
('#1e1e1e', 'black-metallic', 'All-New-Avanza-Veloz', NULL, 'staff_site_files/images/cars_color/avanzaVeloz_blackMetalic.gif'),
('#1f2e33', 'black-mica-(for-grand-new)', 'Grand-New-Corolla-Altis', NULL, 'staff_site_files/images/cars_color/grandNewCorollaAltis_blackMica.jpg'),
('#203337', 'dark-steel-mica-', 'Fortuner', NULL, 'staff_site_files/images/cars_color/GrandNewFortuner_darkSteelMica.png'),
('#212121', 'black-mica', 'Fortuner', NULL, 'staff_site_files/images/cars_color/GrandNewFortuner_blackMica.png'),
('#26232c', 'abyss-gray-metaric-aqua', 'Prius', NULL, 'staff_site_files/images/cars_color/Prius_abyssGrayMetaricAqua.jpg'),
('#293169', 'dark-blue-mica', 'Prius', NULL, 'staff_site_files/images/cars_color/Prius_darkBlueMica.jpg'),
('#29567c', 'true-blue', 'All-New-Camry', NULL, 'staff_site_files/images/cars_color/camry_trueBlue.gif'),
('#53718b', 'greyish-blue-metallic-(for-grand-new)', 'Grand-New-Corolla-Altis', NULL, 'staff_site_files/images/cars_color/grandNewCorollaAltis_greyishBlueMetalic.jpg'),
('#6b6f73', 'dark-grey-mica-metallic', 'Fortuner', NULL, 'staff_site_files/images/cars_color/GrandNewFortuner_darkMicaMetalic.png'),
('#6F4242', 'brown', 'Vios', NULL, 'staff_site_files/images/cars_color/newVios_blackMica.png'),
('#787f82', 'silver-metallic', 'Grand-New-Kijang-Inova', NULL, 'staff_site_files/images/cars_color/GrandNewKijangInnova_SilverMetalic.png'),
('#7b7778', 'dark-grey-metallic', 'All-New-Camry', NULL, 'staff_site_files/images/cars_color/camry_darkGreyMetalic.gif'),
('#858f91', 'medium-silver-metallic-(for-grand-new)', 'Grand-New-Corolla-Altis', NULL, 'staff_site_files/images/cars_color/grandNewCorollaAltis_mediumSilverMetallic.jpg'),
('#8d8a83', 'beige-metallic-(for-grand-new)', 'Grand-New-Corolla-Altis', NULL, 'staff_site_files/images/cars_color/grandNewCorollaAltis_begieMetallic.jpg'),
('#941708', 'super-red-ii', 'Hilux', NULL, 'staff_site_files/images/cars_color/newHilux_superRedII.png'),
('#99a3a5', 'silver-metallic-(for-grand-new)', 'Grand-New-Corolla-Altis', NULL, 'staff_site_files/images/cars_color/grandNewCorollaAltis_silverMetallic.jpg'),
('#9ea1a1', 'grey-mica-metallic', 'Grand-New-Kijang-Inova', NULL, 'staff_site_files/images/cars_color/GrandNewKijangInnova_greyMicaMetalic.png'),
('#9eabb4', 'medium-silver-metallic', 'All-New-Camry', NULL, 'staff_site_files/images/cars_color/camry_MediumSilvermetalic.gif'),
('#a39384', 'beige-metallic', 'Prius', NULL, 'staff_site_files/images/cars_color/Prius_begieMetallic.jpg'),
('#b0b0ab', 'silver-metallic', 'Fortuner', NULL, 'staff_site_files/images/cars_color/GrandNewFortuner_silverMetalic.png'),
('#b5b8bb', 'silver-metallic', 'Hilux', NULL, 'staff_site_files/images/cars_color/newHilux_silverMetalic.png'),
('#b8b8b8', 'silver-metallic', 'All-New-Camry', NULL, 'staff_site_files/images/cars_color/camry_silverMetalic.gif'),
('#c0c0c2', 'silver-metallic', 'Prius', NULL, 'staff_site_files/images/cars_color/Prius_silverMetalic.jpg'),
('#c3cbce', 'white-pearl-(for-grand-new)', 'Grand-New-Corolla-Altis', NULL, 'staff_site_files/images/cars_color/grandNewCorollaAltis_whitePearl.jpg'),
('#c5c4bf', 'white-pearl', 'Prius', NULL, 'staff_site_files/images/cars_color/Prius_whitePearl.jpg'),
('#cb5169', 'red-metallic', 'Prius', NULL, 'staff_site_files/images/cars_color/Prius_redMetalic.jpg'),
('#cbbeb1', 'beige-metallic', 'All-New-Camry', NULL, 'staff_site_files/images/cars_color/camry_begieMetalic.gif'),
('#CC00FF	', 'red-metallic', 'Vios', NULL, 'staff_site_files/images/cars_color/newVios_blackishRedMica.png'),
('#d8c9b0', 'silky-gold-mica-metallic', 'Hilux', NULL, 'staff_site_files/images/cars_color/newHilux_silkyGoldMicaMetalic.png'),
('#ebe8db', 'silky-gold-mica-metallic', 'Fortuner', NULL, 'staff_site_files/images/cars_color/GrandNewFortuner_silkyGoldMetalic.png'),
('#eceded', 'silver-mica-metallic', 'All-New-Avanza-Veloz', NULL, 'staff_site_files/images/cars_color/avanzaVeloz_SilverMicaMetallic.gif'),
('#eef0f0', 'super-white', 'Grand-New-Kijang-Inova', NULL, 'staff_site_files/images/cars_color/GrandNewKijangInnova_SuperWhite.png'),
('#efefef', 'white-pearl', 'All-New-Camry', NULL, 'staff_site_files/images/cars_color/camry_whitePearl.gif'),
('#ffffff', 'super-white', 'Prius', NULL, 'staff_site_files/images/cars_color/Prius_superWhite.jpg'),
('#ffffff', 'super-white-ii', 'Fortuner', NULL, 'staff_site_files/images/cars_color/GrandNewFortuner_superWhiteII.png'),
('#ffffff', 'super-white-ii', 'Hilux', NULL, 'staff_site_files/images/cars_color/newHilux_superWhiteII.png'),
('#FFFFFF', 'White', 'All-New-Avanza-Veloz', NULL, 'staff_site_files/images/cars_color/avanzaVeloz_white.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_serah_terima_barang`
--
ALTER TABLE `bukti_serah_terima_barang`
  ADD PRIMARY KEY (`no_bukti_serah_terima_barang`);

--
-- Indexes for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`no_delivery_order`);

--
-- Indexes for table `history_spk`
--
ALTER TABLE `history_spk`
  ADD PRIMARY KEY (`tgl_history_spk`);

--
-- Indexes for table `inspeksi`
--
ALTER TABLE `inspeksi`
  ADD PRIMARY KEY (`id_inspeksi`,`no_mobil`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_mobil`);

--
-- Indexes for table `msemployee`
--
ALTER TABLE `msemployee`
  ADD PRIMARY KEY (`idEmp`);

--
-- Indexes for table `msleasing`
--
ALTER TABLE `msleasing`
  ADD PRIMARY KEY (`id_leasing`);

--
-- Indexes for table `penerimaan_pembayaran`
--
ALTER TABLE `penerimaan_pembayaran`
  ADD PRIMARY KEY (`no_penerimaan_pembayaran`,`no_spk`);

--
-- Indexes for table `penerimaan_pembayaran_tagihan`
--
ALTER TABLE `penerimaan_pembayaran_tagihan`
  ADD PRIMARY KEY (`no_penerimaan_pembayaran_tagihan`,`no_tagihan`);

--
-- Indexes for table `pengajuan_faktur`
--
ALTER TABLE `pengajuan_faktur`
  ADD PRIMARY KEY (`no_pengajuan_faktur`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`no_surat_keluar`);

--
-- Indexes for table `surat_pesanan_kendaraan`
--
ALTER TABLE `surat_pesanan_kendaraan`
  ADD PRIMARY KEY (`no_spk`);

--
-- Indexes for table `surat_terima`
--
ALTER TABLE `surat_terima`
  ADD PRIMARY KEY (`no_surat_terima`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`no_tagihan`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`kode_warna`,`nama_warna`,`nama_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msemployee`
--
ALTER TABLE `msemployee`
  MODIFY `idEmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `msleasing`
--
ALTER TABLE `msleasing`
  MODIFY `id_leasing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penerimaan_pembayaran`
--
ALTER TABLE `penerimaan_pembayaran`
  MODIFY `no_penerimaan_pembayaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
