/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     12/20/2019 5:27:55 AM                        */
/*==============================================================*/


drop table if exists ABSENSI_SISWA;

drop table if exists JABATAN;

drop table if exists JADWAL_LES;

drop table if exists JENIS_UJIAN;

drop table if exists JENJANG_KELAS;

drop table if exists KELAS;

drop table if exists MATA_PELAJARAN;

drop table if exists NILAI_SISWA;

drop table if exists PEGAWAI;

drop table if exists RUANGAN;

drop table if exists SISWA;

drop table if exists WAKTU;

/*==============================================================*/
/* Table: ABSENSI_SISWA                                         */
/*==============================================================*/
create table ABSENSI_SISWA
(
   ID_ABSENSI           varchar(10) not null,
   NOINDUK              varchar(13) not null,
   ID_JADWAL            varchar(12) not null,
   TANGGAL_ABSEN        date not null,
   MATERI               varchar(50) not null,
   STATUS_ABSEN         varchar(2) not null,
   KETERANGAN_ABSEN     varchar(50) not null,
   TGL_ABSEN_DIBUAT     datetime not null,
   primary key (ID_ABSENSI)
);

/*==============================================================*/
/* Table: JABATAN                                               */
/*==============================================================*/
create table JABATAN
(
   ID_JABATAN           varchar(6) not null,
   JABATAN              varchar(15) not null,
   primary key (ID_JABATAN)
);

/*==============================================================*/
/* Table: JADWAL_LES                                            */
/*==============================================================*/
create table JADWAL_LES
(
   ID_JADWAL            varchar(12) not null,
   ID_PEGAWAI           varchar(12) not null,
   ID_MAPEL2            varchar(6) not null,
   ID_KELAS             varchar(6) not null,
   ID_RUANGAN           varchar(6) not null,
   ID_WAKTU             varchar(6) not null,
   TGL_LES              date not null,
   primary key (ID_JADWAL)
);

/*==============================================================*/
/* Table: JENIS_UJIAN                                           */
/*==============================================================*/
create table JENIS_UJIAN
(
   ID_JENIS_UJIAN       varchar(6) not null,
   NAMA_JENIS_UJIAN     varchar(20) not null,
   primary key (ID_JENIS_UJIAN)
);

/*==============================================================*/
/* Table: JENJANG_KELAS                                         */
/*==============================================================*/
create table JENJANG_KELAS
(
   ID_JENJANG           varchar(6) not null,
   NAMA_JENJANG         varchar(15) not null,
   BIAYA                float(8,2) not null,
   primary key (ID_JENJANG)
);

/*==============================================================*/
/* Table: KELAS                                                 */
/*==============================================================*/
create table KELAS
(
   ID_KELAS             varchar(6) not null,
   ID_JENJANG           varchar(6) not null,
   NAMA_KELAS           varchar(7) not null,
   primary key (ID_KELAS)
);

/*==============================================================*/
/* Table: MATA_PELAJARAN                                        */
/*==============================================================*/
create table MATA_PELAJARAN
(
   ID_MAPEL2            varchar(6) not null,
   ID_PEGAWAI           varchar(12),
   NAMA_MAPEL           varchar(15) not null,
   primary key (ID_MAPEL2)
);

/*==============================================================*/
/* Table: NILAI_SISWA                                           */
/*==============================================================*/
create table NILAI_SISWA
(
   ID_NILAI             varchar(10) not null,
   ID_PEGAWAI           varchar(12) not null,
   ID_JENIS_UJIAN       varchar(6) not null,
   NOINDUK              varchar(13) not null,
   ID_KELAS             varchar(6) not null,
   TGL_PENILAIAN        date not null,
   JUMLAH_NILAI         int not null,
   SKALA_NILAI          varchar(2) not null,
   KETERANGAN_NILAI     varchar(50) not null,
   primary key (ID_NILAI)
);

/*==============================================================*/
/* Table: PEGAWAI                                               */
/*==============================================================*/
create table PEGAWAI
(
   ID_PEGAWAI           varchar(12) not null,
   ID_JABATAN           varchar(6) not null,
   NAMA_PEGAWAI         varchar(30) not null,
   ALAMAT_PEGAWAI       varchar(50) not null,
   TGL_LAHIR_PEG        date not null,
   NOTELP_PEGAWAI       varchar(13) not null,
   EMAIL                varchar(50) not null,
   LEVEL                varchar(6) not null,
   PASSWORD_PEGAWAI     varchar(255) not null,
   primary key (ID_PEGAWAI)
);

/*==============================================================*/
/* Table: RUANGAN                                               */
/*==============================================================*/
create table RUANGAN
(
   ID_RUANGAN           varchar(6) not null,
   NAMA_RUANGAN         varchar(15) not null,
   primary key (ID_RUANGAN)
);

/*==============================================================*/
/* Table: SISWA                                                 */
/*==============================================================*/
create table SISWA
(
   NOINDUK              varchar(13) not null,
   ID_KELAS             varchar(6) not null,
   NAMA_SISWA           varchar(30) not null,
   ALAMAT_SISWA         varchar(50) not null,
   TGL_LAHIR_SISWA      date not null,
   NOTELP_ORTU_SISWA    varchar(13) not null,
   NOTELP_SISWA         varchar(13) not null,
   ASAL_SEKOLAH         varchar(10) not null,
   STATUS_SISWA         bool not null,
   PASSWORD_SISWA       varchar(255) not null,
   primary key (NOINDUK)
);

/*==============================================================*/
/* Table: WAKTU                                                 */
/*==============================================================*/
create table WAKTU
(
   ID_WAKTU             varchar(6) not null,
   JAM_MULAI            time not null,
   JAM_SELESAI          time not null,
   primary key (ID_WAKTU)
);

alter table ABSENSI_SISWA add constraint FK_BERDASARKAN1 foreign key (ID_JADWAL)
      references JADWAL_LES (ID_JADWAL) on delete restrict on update restrict;

alter table ABSENSI_SISWA add constraint FK_DIABSEN foreign key (NOINDUK)
      references SISWA (NOINDUK) on delete restrict on update restrict;

alter table JADWAL_LES add constraint FK_BERISI foreign key (ID_MAPEL2)
      references MATA_PELAJARAN (ID_MAPEL2) on delete restrict on update restrict;

alter table JADWAL_LES add constraint FK_BERTEMPAT foreign key (ID_RUANGAN)
      references RUANGAN (ID_RUANGAN) on delete restrict on update restrict;

alter table JADWAL_LES add constraint FK_DILAKUKAN_PADA foreign key (ID_WAKTU)
      references WAKTU (ID_WAKTU) on delete restrict on update restrict;

alter table JADWAL_LES add constraint FK_MEMILIKI1 foreign key (ID_KELAS)
      references KELAS (ID_KELAS) on delete restrict on update restrict;

alter table JADWAL_LES add constraint FK_MENGAJAR foreign key (ID_PEGAWAI)
      references PEGAWAI (ID_PEGAWAI) on delete restrict on update restrict;

alter table KELAS add constraint FK_BERDASARKAN foreign key (ID_JENJANG)
      references JENJANG_KELAS (ID_JENJANG) on delete restrict on update restrict;

alter table MATA_PELAJARAN add constraint FK_MENGAJAR2 foreign key (ID_PEGAWAI)
      references PEGAWAI (ID_PEGAWAI) on delete restrict on update restrict;

alter table NILAI_SISWA add constraint FK_MEMPUNYAI foreign key (ID_JENIS_UJIAN)
      references JENIS_UJIAN (ID_JENIS_UJIAN) on delete restrict on update restrict;

alter table NILAI_SISWA add constraint FK_MENDAPAT foreign key (NOINDUK)
      references SISWA (NOINDUK) on delete restrict on update restrict;

alter table NILAI_SISWA add constraint FK_MENGISI foreign key (ID_PEGAWAI)
      references PEGAWAI (ID_PEGAWAI) on delete restrict on update restrict;

alter table NILAI_SISWA add constraint FK_MENURUT foreign key (ID_KELAS)
      references KELAS (ID_KELAS) on delete restrict on update restrict;

alter table PEGAWAI add constraint FK_MEMILIKI foreign key (ID_JABATAN)
      references JABATAN (ID_JABATAN) on delete restrict on update restrict;

alter table SISWA add constraint FK_BERANGGOTAKAN foreign key (ID_KELAS)
      references KELAS (ID_KELAS) on delete restrict on update restrict;

