alter table tbl_siswa
    add tgl_lahir date not null after nama_siswa;

alter table tbl_siswa
    add jk int default 1 not null comment '1 = Laki - Laki, 2  = Perempuan';

alter table tbl_siswa
    add alamat text null after no_ortu;

alter table tbl_siswa
    modify jk int default 1 not null comment '1 = Laki - Laki, 2  = Perempuan' after tgl_lahir;

alter table tbl_siswa
    modify id_siswa int auto_increment;

alter table tbl_siswa
    auto_increment = 1;

alter table tbl_siswa
    modify nama_ortu varchar(255) not null;

