 DROP database if exists db_esqui;
 CREATE database db_esqui;
 use db_esqui;

drop table if exists client;
create table client (
	dni varchar(9) not null,
    nom varchar(25) not null,
    cognom varchar(25) not null,
    telefon int,
    email varchar(55) not null,
    usuari varchar(55),
    pass varchar(255),
    primary key (dni)
);

drop table if exists fam_num;
create table fam_num (
	dni varchar(9) not null,
    num_fam int not null,
    data_caducitat date not null,
    foreign key (dni) references client(dni)
);

drop table if exists federat;
create table federat (
	dni varchar(9) not null,
    nivell int not null,
    num_federacio int not null,
    data_caducitat date not null,
    primary key (dni),
    foreign key (dni) references client(dni)
);

drop table if exists monitor;
create table monitor (
	dni varchar(9) not null,
    nom varchar(25),
    cognom varchar(25),
    primary key (dni)
);

drop table if exists curs;
create table curs (
	id int auto_increment,
    nom varchar(25),
    dni_monitor varchar(9),
    primary key (id),
    foreign key (dni_monitor) references monitor(dni)
);

drop table if exists curs_individual;
create table curs_individual (
	id int not null,
    preu_hora double not null,
    primary key (id),
    foreign key (id) references curs(id)
);
/*
drop table if exists dies;			
create table dies (					
	id int auto_increment,
    nom_dia varchar(55),
    primary key (id)
);
*/
drop table if exists curs_colectiu;
create table curs_colectiu (
	id int not null,
    data date not null,
    preu double not null,					
    primary key (id)
    /*foreign key (id_dia) references dies(id)*/
);

drop table if exists curs_competicio;   
create table curs_competicio (
	id int not null,
    nivell int not null,
    data_inici date not null,
    data_fi date not null,
    preu double not null,
    primary key (id),
    foreign key (id) references curs(id)
);

drop table if exists realitza_client;
create table realitza_client (
	id int auto_increment,
    descompte double default null,
    hores int not null, 			######## en minuts #######
    `data` date not null,
    id_curs int not null,
    dni varchar(9) not null,
    preu_final double not null,
    primary key (id),
    foreign key (id_curs) references curs_individual(id),
    foreign key (dni) references client(dni)
);

drop table if exists realitza_colectiu;
create table realitza_colectiu (
	id int auto_increment,
    `data` date not null,
    id_curs int not null,
    dni varchar(9),
    preu_final double not null,
    primary key (id),
    foreign key (id_curs) references curs_colectiu(id),
    foreign key (dni) references client(dni)
);

drop table if exists realitza_comp;
create table realitza_comp (
	id_comp int not null,
    dni varchar(9) not null,
    data date not null,
    primary key (id_comp,dni),							##  Dos primary key?  ##
    foreign key (id_comp) references curs_competicio(id),
    foreign key (dni) references client(dni)
);

drop table if exists realitza_fam;
create table realitza_fam (
	id int auto_increment,
	id_col int not null,
    dni varchar(9) not null,
    data date not null,
    descompte double default null,
    preu_final double not null,
    primary key (id),							
    foreign key (id_col) references curs_colectiu(id),
    foreign key (dni) references client(dni)
);

drop table if exists material;
create table material (
	id int auto_increment,
    marca varchar(90) not null,
    model varchar(90) not null,
    disponible boolean not null,
    preu double not null,
    num_vegades int default(0),						
    primary key (id)
);

drop table if exists pals;
create table pals (
	id int not null,
    talla varchar(25),
    primary key (id),
    foreign key (id) references material(id)
);

drop table if exists esquis;
create table esquis (
	id int not null,
    talla varchar(25),
    primary key (id),
    foreign key (id) references material(id)
);

drop table if exists botes;
create table botes (
	id int not null,
    talla varchar(25),
    primary key (id),
    foreign key (id) references material(id)
);

drop table if exists lloga;
create table lloga (
	id int not null,
    data date not null,
    preu double not null,
    dni varchar(9) not null,
    primary key (id),
    foreign key (id) references material(id),
    foreign key (dni) references client(dni)
);

drop table if exists kit;
create table kit (
	id int auto_increment,
    primary key (id)
);

drop table if exists kit_format;
create table kit_format (
	id_kit int,
    id_pals int not null,
    id_esquis int not null,
    id_botes int not null,
    primary key (id_kit),	
    foreign key (id_kit) references kit(id),
    foreign key (id_pals) references pals(id),
    foreign key (id_esquis) references esquis(id),
    foreign key (id_botes) references botes(id)
);

drop table if exists lloga_format;
create table lloga_format (
	id int not null,
    data date not null,
    preu double not null,
    dni varchar(9) not null,
    primary key (id),
    foreign key (id) references kit(id),
    foreign key (dni) references client(dni)
);

