-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2021 pada 05.50
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_username` varchar(50) NOT NULL,
  `member_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`member_id`, `member_username`, `member_password`) VALUES
(1, 'popon', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `fakultas_id` int(11) NOT NULL,
  `fakultas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`fakultas_id`, `fakultas`) VALUES
(1, 'Fakultas Tarbiyah dan Keguruan'),
(2, 'Fakultas Adab dan Humaniora'),
(3, 'Fakultas Dakwah dan Komunikasi'),
(4, 'Fakultas Sosial dan Ilmu Pemerintahan'),
(5, 'Fakultas Syariah dan Hukum'),
(6, 'Fakultas Ushuluddin dan Filsafat'),
(7, 'Fakultas Ekonomi dan Bisnis Islam'),
(8, 'Fakultas Sains dan Teknologi'),
(9, 'Fakultas Ilmu Psikologi'),
(10, 'Pascasarjana UIN Ar-Raniry');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `fakultas_id`, `prodi_id`, `no_hp`, `time`) VALUES
(11, '170108108', 'Adi', 2, 24, '085211778956', '2021-11-29 06:27:19'),
(16, '190212077', 'Sugiono', 3, 30, '085422419876', '2021-11-29 06:27:19'),
(17, '190212026', 'Teuku Muksal Mina', 9, 52, '085322420875', '2021-11-29 06:27:19'),
(19, '8787878', 'Sugiono', 3, 29, '085422419876', '2021-11-29 07:11:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `prodi_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `prodi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`prodi_id`, `fakultas_id`, `prodi`) VALUES
(11, 1, 'Pendidikan Agama Islam'),
(12, 1, 'Pendidikan Bahasa Arab'),
(13, 1, 'Pendidikan Bahasa Inggris'),
(14, 1, 'Pendidikan Matematika'),
(15, 1, 'Manajemen Pendidikan Islam'),
(16, 1, 'Pendidikan Fisika'),
(17, 1, 'Pendidikan Biologi'),
(18, 1, 'Pendidikan Guru Madrasah Ibtidaiyah'),
(19, 1, 'Pendidikan Kimia'),
(20, 1, 'Pendidikan Islam Anak Usia Dini'),
(21, 1, 'Pendidikan Teknik Elektro'),
(22, 1, 'Pendidikan Teknologi Informasi'),
(23, 1, 'Bimbingan Konseling'),
(24, 2, 'Sejarah dan Kebudayaan Islam'),
(25, 2, 'Bahasa dan Sastra Arab'),
(26, 2, 'Diploma III Ilmu Perpustakaan'),
(27, 2, 'S1 Ilmu Perpustakaan'),
(28, 3, 'Pengembangan Masyarakat Islam'),
(29, 3, 'Komunikasi dan Penyiaran Islam'),
(30, 3, 'Manajemen Dakwah'),
(31, 3, 'Bimbingan dan Konseling Islam'),
(32, 3, 'Kesejahteraan Sosial'),
(33, 4, 'Ilmu Administrasi Negara'),
(34, 4, 'Ilmu Politik'),
(35, 5, 'Hukum Keluarga'),
(36, 5, 'Hukum Ekonomi Syariah'),
(37, 5, 'Perbandingan Mazhab'),
(38, 5, 'Hukum Pidana Islam'),
(39, 5, 'Hukum Tata Negara'),
(40, 5, 'Ilmu Hukum'),
(41, 6, 'Sosiologi Agama'),
(42, 6, 'Ilmu Aqidah dan Filsafat Islam'),
(43, 6, 'Studi Agama-agama'),
(44, 6, 'Ilmu Al-Quran dan Tafsir'),
(45, 7, 'Perbankan Syariah'),
(46, 7, 'Ilmu Ekonomi'),
(47, 7, 'Ekonomi Syariah'),
(48, 8, 'Kimia'),
(49, 8, 'Biologi'),
(50, 8, 'Teknik Lingkungan'),
(51, 8, 'Teknologi Informasi'),
(52, 9, 'Psikologi'),
(53, 10, 'S3 Fiqh Modern (Hukum Islam)'),
(54, 10, 'S3 Pendidikan Agama Islam'),
(55, 10, 'S2 Ilmu Agama Islam'),
(56, 10, 'S2 Pendidikan Agama Islam'),
(57, 10, 'S2 Hukum Keluarga'),
(58, 10, 'S2 Pendidikan Bahasa Arab'),
(59, 10, 'S2 Ilmu Al-Quran dan Tafsir'),
(60, 10, 'S2 Komunikasi Penyiaran Islam'),
(61, 10, 'S2 Ekonomi Syariah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`fakultas_id`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`prodi_id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_2` FOREIGN KEY (`fakultas_id`) REFERENCES `tb_fakultas` (`fakultas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_mahasiswa_ibfk_3` FOREIGN KEY (`prodi_id`) REFERENCES `tb_prodi` (`prodi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD CONSTRAINT `tb_prodi_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `tb_fakultas` (`fakultas_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
