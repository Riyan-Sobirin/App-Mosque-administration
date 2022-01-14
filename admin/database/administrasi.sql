-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Feb 2020 pada 16.19
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administrasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` int(4) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `keterangan_barang` varchar(75) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `keterangan_barang`) VALUES
(1, 'Sapu Ijuk', 'Sapu dengan jenis ijuk'),
(2, 'Sapu Lidi', 'Sapu dengan jenis lidi'),
(3, 'Gelas Plastik Kecil', 'Gelas kecil biasa berbahan plastik'),
(4, 'Piring Keramik', 'Piring dengan bahan keramik'),
(5, 'Golok', 'Golok untuk keperluan penyembelihan hewan qurban'),
(6, 'Sajadah', 'Sajadah Salat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
--

CREATE TABLE IF NOT EXISTS `donatur` (
  `id_donatur` int(8) NOT NULL,
  `nama_donatur` varchar(35) NOT NULL,
  `tpt_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `j_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `nama_donatur`, `tpt_lahir`, `tgl_lahir`, `j_kelamin`, `alamat`, `telepon`) VALUES
(1, 'Test', 'Jakarta', '2019-01-01', 'Laki-laki', 'Jakarta', '0812982989'),
(2, 'Hamba Allah', '-', '0000-00-00', 'Laki-laki', '-', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infaq`
--

CREATE TABLE IF NOT EXISTS `infaq` (
  `no_infaq` int(8) NOT NULL,
  `jns_infaq` enum('jumat','zakat') NOT NULL,
  `terima_dari` varchar(35) NOT NULL,
  `tgl_infaq` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(75) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `infaq`
--

INSERT INTO `infaq` (`no_infaq`, `jns_infaq`, `terima_dari`, `tgl_infaq`, `jumlah`, `keterangan`) VALUES
(24, 'jumat', 'DKM', '2019-02-20', 127000, 'INfaq Jumat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE IF NOT EXISTS `inventaris` (
  `no_inventaris` int(6) NOT NULL,
  `kd_barang` int(4) NOT NULL,
  `tgl_terima` date NOT NULL,
  `jumlah` int(8) NOT NULL,
  `keterangan` varchar(75) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`no_inventaris`, `kd_barang`, `tgl_terima`, `jumlah`, `keterangan`) VALUES
(1, 3, '2018-02-04', 24, 'Sumbangan dari RT 002/012'),
(2, 1, '2018-02-04', 5, 'Sumbangan dari warga setempat'),
(3, 5, '2017-10-14', 4, 'Sumbangan dari warga RT 004/001'),
(4, 6, '2019-02-20', 1, 'Sajadah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `keg_id` int(11) NOT NULL,
  `keg_nama` varchar(50) NOT NULL,
  `keg_tgl` date NOT NULL,
  `keg_ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`keg_id`, `keg_nama`, `keg_tgl`, `keg_ket`) VALUES
(2, 'Pengajian Akbar', '2020-03-01', 'Pengajian akbar KH. Gymnastiar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten_organisasi`
--

CREATE TABLE IF NOT EXISTS `konten_organisasi` (
  `id_konten` int(4) NOT NULL,
  `judul_konten` varchar(50) NOT NULL,
  `isi_konten` text NOT NULL,
  `menu_konten` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konten_organisasi`
--

INSERT INTO `konten_organisasi` (`id_konten`, `judul_konten`, `isi_konten`, `menu_konten`) VALUES
(1, 'Struktur Organisasi DKM', '<h2>SUSUNAN PENGURUS DKM AL-KAHFI</h2>\r\n\r\n<h2>PERIODE 2017-2020</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>DEWAN PENASEHAT:</h3>\r\n\r\n<ol>\r\n	<li>Lurah Pondok Benda, Kecamatan Pamulang, Tangerang Selatan</li>\r\n	<li>Ketua RW 020 Keluarahan Pondok Benda</li>\r\n	<li>Ketua RT 001 s/d 004 RW 20 Kelurahan Pondok Benda</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>DEWAN SYURO:</h3>\r\n\r\n<table border="0" cellpadding="1" cellspacing="0" style="margin-left:15px;">\r\n	<tbody>\r\n		<tr>\r\n			<td>Ketua</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;</td>\r\n			<td>Dr. Saifuddin Zuhri, MA.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sekretaris</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Drs. Isqowi Indadin Masya</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Anggota</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Fathul Amam, SQ.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Drs. Watoni</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Daud Damsyik, M.Ag.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>Taswirman, S.Ag.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td><span background-color:="" font-size:="" style="color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, " trebuchet="">Dinan Hasbuddin, S.Ag.</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td><span background-color:="" font-size:="" style="color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, " trebuchet="">Zulhadi Piliang, ST.</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td><span background-color:="" font-size:="" style="color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, " trebuchet="">H. Rahmat, MA.</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>DEWAN PENGURUS HARIAN:</h3>\r\n\r\n<table border="0" cellpadding="1" cellspacing="0" style="margin-left: 15px;">\r\n	<tbody>\r\n		<tr>\r\n			<td>Ketua Umum</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;</td>\r\n			<td>Miftahuddin</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wakil Ketua Umum</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Toba Ristani</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ketua 1</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Didin Syahidin</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ketua 2</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Sri Suharti</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ketua 3</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Iskandar Zulkarnain</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sekretaris Umum</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Ahmad Miska</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sekretaris 1</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Iswandi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sekretaris 2</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Lenny</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sekretaris 3</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>M. Nursyafruddin</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bendahara Umum</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>H. Ngatmin</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bendahara</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>H. Fattahullah</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>BIRO-BIRO:</h3>\r\n\r\n<h4>BIDANG 1</h4>\r\n\r\n<table border="0" cellpadding="1" cellspacing="0" style="margin-left:15px">\r\n	<tbody>\r\n		<tr>\r\n			<td>Pendidikan</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;</td>\r\n			<td>Juni Cyser, S.Sos</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Peribadatan</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Muhammad Faisal, S.Pd.I</td>\r\n		</tr>\r\n		<tr>\r\n			<td>PHBI</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp;</td>\r\n			<td>Dasa&#39;ad</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pengelolaan Qurban</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp;</td>\r\n			<td>Akmal Roesly</td>\r\n		</tr>\r\n		<tr>\r\n			<td>ZISWAF</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp;</td>\r\n			<td>Yunus dan Riono Cahyadi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bimbel</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp;</td>\r\n			<td>Edo Alfin dan Charuddin</td>\r\n		</tr>\r\n		<tr>\r\n			<td>TPA</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp;</td>\r\n			<td>Rustiyah Dinan, S.Ag</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Majelis Ta&#39;lim</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp;</td>\r\n			<td>Siti Nursyafa&#39;atillah</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'DKM'),
(2, 'Struktur Organisasi Majelis Taklim', '<h2>STRUKTUR PENGURUS MAJELIS TAKLIM AR RAHMAN</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pembina:</p>\r\n\r\n<ul>\r\n	<li>Fasikha, S.HI</li>\r\n	<li>DR. Cucu Nurhayati, M.Sc.</li>\r\n	<li>Raisah</li>\r\n	<li>Sri Suharti</li>\r\n</ul>\r\n\r\n<p>Ketua:</p>\r\n\r\n<ul>\r\n	<li>Nur Syafa&#39;atiah</li>\r\n</ul>\r\n\r\n<p>Wakil:</p>\r\n\r\n<ul>\r\n	<li>Nani Rusnaeni</li>\r\n</ul>\r\n\r\n<p>Sekretaris:</p>\r\n\r\n<ul>\r\n	<li>Anita Widiastuti</li>\r\n</ul>\r\n\r\n<p>Bendahara:</p>\r\n\r\n<ul>\r\n	<li>Lenni</li>\r\n	<li>Herlina</li>\r\n</ul>\r\n\r\n<p>Seksi Pendidikan dan Dakwah:</p>\r\n\r\n<ul>\r\n	<li>Rustiyah</li>\r\n	<li>Hj. Nur Kholisoh</li>\r\n	<li>Endah Prasetyani</li>\r\n</ul>\r\n\r\n<p>Seksi Sosial:</p>\r\n\r\n<ul>\r\n	<li>Rahmawati</li>\r\n	<li>Dyah Puspasari</li>\r\n	<li>Ika</li>\r\n	<li>Mihrab</li>\r\n</ul>\r\n', 'Majelis Taklim'),
(3, 'Struktur Organisasi TPA', '<h2>KEPENGURUSAN TPA AL KAHFI</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="0" cellpadding="1" cellspacing="0" style="margin-left: 15px;">\r\n	<tbody>\r\n		<tr>\r\n			<td>Kepala</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;</td>\r\n			<td>Didin Syahidin</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wakil</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Rustiyah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bendahara</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Ibu Nursyafa&#39;atiyah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sekretaris</td>\r\n			<td>&nbsp; &nbsp; &nbsp; :</td>\r\n			<td>Hj. Nurkholishah</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'TPA'),
(4, 'Struktur Organisasi Remaja Masjid', '<p>Struktur Organisasi Remaja Islam Masjid Jami An Nur Pondok Benda.</p>\r\n', 'Remaja Masjid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `no_keluar` int(6) NOT NULL,
  `jns_keluar` varchar(25) NOT NULL,
  `keluar_oleh` varchar(35) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(75) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`no_keluar`, `jns_keluar`, `keluar_oleh`, `tgl_keluar`, `jumlah`, `keterangan`) VALUES
(6, 'Beli lampu', 'Saya', '2019-02-20', 10000, 'Beli lampu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_kas`
--

CREATE TABLE IF NOT EXISTS `rekap_kas` (
  `no_rekap` int(6) NOT NULL,
  `tgl_rekap` date NOT NULL,
  `tgl_tampil` date NOT NULL,
  `infaq` int(11) NOT NULL,
  `sodaqoh` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_kas`
--

INSERT INTO `rekap_kas` (`no_rekap`, `tgl_rekap`, `tgl_tampil`, `infaq`, `sodaqoh`, `pengeluaran`) VALUES
(1, '2019-02-28', '2019-03-01', 127000, 1000000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sodaqoh`
--

CREATE TABLE IF NOT EXISTS `sodaqoh` (
  `no_sodaqoh` int(6) NOT NULL,
  `id_donatur` int(4) NOT NULL,
  `tgl_sodaqoh` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(75) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sodaqoh`
--

INSERT INTO `sodaqoh` (`no_sodaqoh`, `id_donatur`, `tgl_sodaqoh`, `jumlah`, `keterangan`) VALUES
(7, 1, '2019-02-20', 1000000, 'sODAQOH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `infaq`
--
ALTER TABLE `infaq`
  ADD PRIMARY KEY (`no_infaq`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`no_inventaris`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`keg_id`);

--
-- Indexes for table `konten_organisasi`
--
ALTER TABLE `konten_organisasi`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`no_keluar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `rekap_kas`
--
ALTER TABLE `rekap_kas`
  ADD PRIMARY KEY (`no_rekap`);

--
-- Indexes for table `sodaqoh`
--
ALTER TABLE `sodaqoh`
  ADD PRIMARY KEY (`no_sodaqoh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `infaq`
--
ALTER TABLE `infaq`
  MODIFY `no_infaq` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `no_inventaris` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `keg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `konten_organisasi`
--
ALTER TABLE `konten_organisasi`
  MODIFY `id_konten` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `no_keluar` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rekap_kas`
--
ALTER TABLE `rekap_kas`
  MODIFY `no_rekap` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sodaqoh`
--
ALTER TABLE `sodaqoh`
  MODIFY `no_sodaqoh` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
