
CREATE TABLE nhomsanpham(id_nhomsanpham int AUTO_INCREMENT PRIMARY KEY,tennhomsanpham varchar(50) charset utf8 not null,thongtinnhomsanpham text charset utf8);
CREATE TABLE loaisanpham(id_loaisanpham INT AUTO_INCREMENT PRIMARY KEY,tenloaisanpham varchar(50) charset utf8 not null,thongtinloaisanpham text charset utf8);
CREATE TABLE sanpham(id_sanpham int AUTO_INCREMENT PRIMARY KEY,masanpham varchar(50) not null,tensanpham varchar(50) charset utf8 not null,id_nhomsanpham int not null,id_loaisanpham int
                     not null,gioitinh varchar(50) charset utf8,xuatxu varchar(50) charset utf8,kichco char,thongtinsanpham text charset utf8,
                     soluong int not null,ngaythemvao date not null, FOREIGN key (id_nhomsanpham) REFERENCES nhomsanpham(id_nhomsanpham),FOREIGN KEY
                     (id_loaisanpham) REFERENCES loaisanpham(id_loaisanpham));
CREATE TABLE anh(id_sanpham int,url varchar not null, FOREIGN KEY anh(id_sanpham) REFERENCES sanpham(id_sanpham));


CREATE TABLE nguoidung(id_nguoidung int AUTO_INCREMENT PRIMARY KEY,
                       taikhoan varchar not null UNIQUE,
                       matkhau varchar not null UNIQUE,
                       ho varchar(50) charset utf8  not null,
                       tendem varchar(50) charset utf8,
                       ten varchar(50) charset utf8,
                       diachi varchar(50) charset utf8 not null ,
                       sodienthoai varchar(20) not null,
                       email varchar(50) not null,
                       ngaythangnamsinh date not null,
                       quyentruycap int not null);
CREATE TABLE donhang(id_donhang int AUTO_INCREMENT PRIMARY KEY,id_nguoidung int ,ngaydatdonhang date not null,tinhtrang int not null,
                                            FOREIGN key (id_nguoidung) REFERENCES nguoidung(id_nguoidung));
CREATE TABLE donhang_sanpham(id_donhang int,id_sanpham int,FOREIGN KEY (id_donhang) REFERENCES donhang(id_donhang),
                                                    FOREIGN KEY (id_sanpham) REFERENCES sanpham(id_sanpham));