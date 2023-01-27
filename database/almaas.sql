-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2023 pada 04.20
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpfix_bismillah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktor`
--

CREATE TABLE `aktor` (
  `id_aktor` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktor`
--

INSERT INTO `aktor` (`id_aktor`, `username`, `password`, `role`) VALUES
(1, 'admin', 'adminn', '2'),
(2, 'super', 'super', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id_evaluasi` int(15) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `evaluasi`
--

INSERT INTO `evaluasi` (`id_evaluasi`, `keterangan`, `status`) VALUES
(3, 'Evaluasi pembelajaran bulan januari 2023', 'open'),
(4, 'Evaluasi pembelajaran bulan Februari 2023', 'open');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_user`
--

CREATE TABLE `evaluasi_user` (
  `id_evaluser` int(15) NOT NULL,
  `kritik` varchar(200) NOT NULL,
  `saran` varchar(200) NOT NULL,
  `id_jamaah` int(15) DEFAULT NULL,
  `id_kelas` int(15) DEFAULT NULL,
  `id_evaluasi` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `evaluasi_user`
--

INSERT INTO `evaluasi_user` (`id_evaluser`, `kritik`, `saran`, `id_jamaah`, `id_kelas`, `id_evaluasi`) VALUES
(5, 'aku', 'aku', 10, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_jamaah`
--

CREATE TABLE `history_jamaah` (
  `id_history` int(15) NOT NULL,
  `id_jamaah` int(15) DEFAULT NULL,
  `id_kelas_lama` int(15) DEFAULT NULL,
  `id_kelas_baru` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(15) NOT NULL,
  `nama_kelas` varchar(200) NOT NULL,
  `hari` varchar(200) NOT NULL,
  `jam` varchar(200) NOT NULL,
  `id_pengajar` int(15) DEFAULT NULL,
  `id_pengajar_pengganti` int(15) DEFAULT NULL,
  `id_kelas` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nama_kelas`, `hari`, `jam`, `id_pengajar`, `id_pengajar_pengganti`, `id_kelas`) VALUES
(1, 'Naqish A', 'Kamis', '08.00 - 09.30', 1, NULL, 1),
(2, 'Naqish B', 'Jumat', '13.00-15.00', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah`
--

CREATE TABLE `jamaah` (
  `id_jamaah` int(15) NOT NULL,
  `no_induk` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `nama_panggilan` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(200) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` varchar(200) NOT NULL,
  `usia` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `pendidikan` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `no_whatsapp` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `kk` varchar(200) NOT NULL,
  `ktp` varchar(200) NOT NULL,
  `bukti_pembayaran` varchar(200) NOT NULL,
  `status_pembayaran` varchar(200) NOT NULL DEFAULT 'pending',
  `id_status` int(15) DEFAULT NULL,
  `id_kelas` int(15) DEFAULT NULL,
  `id_program` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jamaah`
--

INSERT INTO `jamaah` (`id_jamaah`, `no_induk`, `password`, `nama_lengkap`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `usia`, `alamat`, `pendidikan`, `pekerjaan`, `no_whatsapp`, `foto`, `kk`, `ktp`, `bukti_pembayaran`, `status_pembayaran`, `id_status`, `id_kelas`, `id_program`) VALUES
(10, '21/22/23', '21/22/23', 'Febi Fadlilah Nur Aminah', 'Febi', 'Perempuan', 'Lamongan', '2003-02-20', '19', 'Pucangsimo RT.01 RW.04 Bandarkedungmulyo, Jombang', 'sma', 'mahasiswa', '08970914456', 'FOTO KERUDUNG BG BIRU.jpg', 'FOTO KERUDUNG BG BIRU.jpg', 'FOTO KERUDUNG BG BIRU.jpg', '', 'pending', 1, 1, 1),
(12, '000/51', '000/51', 'Zuni Amanda Dewi', 'Amanda', 'Perempuan', 'Lamongan', '2023-01-12', '20', 'Lamongan', 'SMA', 'Mahasiswa', '085546945654', 'FEBI.docx', 'FEBI.docx', 'FEBI.docx', '', 'diterima', 1, 6, 1);

--
-- Trigger `jamaah`
--
DELIMITER $$
CREATE TRIGGER `update_kelas_jamaah` BEFORE UPDATE ON `jamaah` FOR EACH ROW BEGIN
    INSERT INTO history_jamaah
    set id_jamaah = old.id_jamaah,
    id_kelas_lama=old.id_kelas,
    id_kelas_baru=new.id_kelas;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(15) NOT NULL,
  `nama_kelas` varchar(200) NOT NULL,
  `id_program` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_program`) VALUES
(1, 'I Naqish', 1),
(2, 'II Mubtadi', 1),
(4, 'III Muntadhir', 1),
(5, 'V-A Maqbul', 1),
(6, 'VI-B Maqbul', 1),
(7, 'VII-C Maqbul', 1),
(8, 'VIII Tahsin 1', 1),
(9, 'IX Tahsin 2', 1),
(10, 'X Tahsin 3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_jadwal`
--

CREATE TABLE `kelas_jadwal` (
  `id_kelasjadwal` int(15) NOT NULL,
  `id_jadwal` int(15) DEFAULT NULL,
  `id_jamaah` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(15) NOT NULL,
  `aspek_penilaian` varchar(200) NOT NULL,
  `kkm` varchar(200) NOT NULL,
  `nilai_total` varchar(200) NOT NULL,
  `id_jamaah` int(15) DEFAULT NULL,
  `id_kelas` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_jamaah` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(15) NOT NULL,
  `nama_pengajar` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nama_pengajar`, `username`, `password`) VALUES
(1, 'Ust. Halim', 'halim', 'halim123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id_post` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `upload` varchar(200) NOT NULL,
  `id_jadwal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id_post`, `tanggal`, `keterangan`, `upload`, `id_jadwal`) VALUES
(1, '2023-01-16', 'Hari ini masuk 5 menit agak telat ya', '', 1),
(2, '2023-01-16', 'Mohon maaf untuk hari ini saya tidak bisa masuk ke kelas karena saya lagi diluar kota', 'Febi Fadlillah Nur Aminah.pdf', 1),
(3, '2023-01-16', 'Mohon maaf untuk hari ini saya tidak bisa masuk ke kelas karena saya lagi diluar kota', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(15) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `waktu` varchar(200) NOT NULL,
  `status_kehadiran` varchar(200) NOT NULL,
  `id_jamaah` int(15) NOT NULL,
  `id_jadwal` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id_program` int(15) NOT NULL,
  `nama_program` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id_program`, `nama_program`) VALUES
(1, 'Bimbingan Ngaji Privat'),
(2, 'Bimbingan Tahfidz'),
(3, 'Ngaji Online');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(15) NOT NULL,
  `nama_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'aktif'),
(2, 'cuti'),
(3, 'berhenti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `nama_panggilan` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(200) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(200) NOT NULL,
  `usia` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `pendidikan` varchar(200) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_whatsapp` varchar(100) NOT NULL,
  `id_program` int(15) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `waktu` varchar(200) NOT NULL,
  `tanggal_berkunjung` date NOT NULL,
  `status_kunjungan` varchar(100) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama_lengkap`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `usia`, `pekerjaan`, `pendidikan`, `alamat`, `no_whatsapp`, `id_program`, `tanggal`, `waktu`, `tanggal_berkunjung`, `status_kunjungan`) VALUES
(11, 'Febi Fadlilah Nur Aminah', 'Febi', 'Perempuan', 'Jombang', '2003-02-20', '20', 'Mahasiswa', 'SMA', 'Pucangsimo RT.01 RW.04 Bandarkedungmulyo, Jombang', '08970914456', 1, '2023-01-14', '13:25:54', '2032-01-14', 'sudah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktor`
--
ALTER TABLE `aktor`
  ADD PRIMARY KEY (`id_aktor`);

--
-- Indeks untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`);

--
-- Indeks untuk tabel `evaluasi_user`
--
ALTER TABLE `evaluasi_user`
  ADD PRIMARY KEY (`id_evaluser`),
  ADD KEY `evaluasi_user_ibfk_1` (`id_jamaah`),
  ADD KEY `evaluasi_user_ibfk_2` (`id_evaluasi`),
  ADD KEY `evaluasi_user_ibfk_3` (`id_kelas`);

--
-- Indeks untuk tabel `history_jamaah`
--
ALTER TABLE `history_jamaah`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `history_jamaah_ibfk_3` (`id_jamaah`),
  ADD KEY `history_jamaah_ibfk_1` (`id_kelas_lama`),
  ADD KEY `history_jamaah_ibfk_2` (`id_kelas_baru`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal_ibfk_2` (`id_kelas`),
  ADD KEY `jadwal_ibfk_1` (`id_pengajar`);

--
-- Indeks untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  ADD PRIMARY KEY (`id_jamaah`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `jamaah_ibfk_1` (`id_program`),
  ADD KEY `jamaah_ibfk_2` (`id_kelas`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas_ibfk_1` (`id_program`);

--
-- Indeks untuk tabel `kelas_jadwal`
--
ALTER TABLE `kelas_jadwal`
  ADD PRIMARY KEY (`id_kelasjadwal`),
  ADD KEY `kelas_jadwal_ibfk_1` (`id_jamaah`),
  ADD KEY `kelas_jadwal_ibfk_2` (`id_jadwal`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nilai_ibfk_2` (`id_jamaah`),
  ADD KEY `nilai_ibfk_1` (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_ibfk_1` (`id_jamaah`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `post_ibfk_1` (`id_jadwal`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `presensi_ibfk_1` (`id_jamaah`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`),
  ADD KEY `id_program` (`id_program`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktor`
--
ALTER TABLE `aktor`
  MODIFY `id_aktor` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `evaluasi_user`
--
ALTER TABLE `evaluasi_user`
  MODIFY `id_evaluser` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `history_jamaah`
--
ALTER TABLE `history_jamaah`
  MODIFY `id_history` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  MODIFY `id_jamaah` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kelas_jadwal`
--
ALTER TABLE `kelas_jadwal`
  MODIFY `id_kelasjadwal` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `evaluasi_user`
--
ALTER TABLE `evaluasi_user`
  ADD CONSTRAINT `evaluasi_user_ibfk_1` FOREIGN KEY (`id_jamaah`) REFERENCES `jamaah` (`id_jamaah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluasi_user_ibfk_2` FOREIGN KEY (`id_evaluasi`) REFERENCES `evaluasi` (`id_evaluasi`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluasi_user_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `history_jamaah`
--
ALTER TABLE `history_jamaah`
  ADD CONSTRAINT `history_jamaah_ibfk_1` FOREIGN KEY (`id_kelas_lama`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `history_jamaah_ibfk_2` FOREIGN KEY (`id_kelas_baru`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `history_jamaah_ibfk_3` FOREIGN KEY (`id_jamaah`) REFERENCES `jamaah` (`id_jamaah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  ADD CONSTRAINT `id_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `jamaah_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `jamaah_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas_jadwal`
--
ALTER TABLE `kelas_jadwal`
  ADD CONSTRAINT `kelas_jadwal_ibfk_1` FOREIGN KEY (`id_jamaah`) REFERENCES `jamaah` (`id_jamaah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_jadwal_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_jamaah`) REFERENCES `jamaah` (`id_jamaah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_jamaah`) REFERENCES `jamaah` (`id_jamaah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`id_jamaah`) REFERENCES `jamaah` (`id_jamaah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD CONSTRAINT `tamu_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
