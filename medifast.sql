create database medifast;
use medifast;

create table catUsuario(
    id_usuario int Auto_Increment Primary key ,
    doctor boolean ,
    nombre varchar(40) not null,
    apellidoP varchar(20) not null,
    apellidoM  varchar(20) not null,
    calle varchar(20),
    numeroInt char(3),
    numeroExt char(20),
    colonia varchar(30),
    municipio varchar(30),
    estado varchar(20),
    curp char(18),
    telefono varchar(20),
    correo varchar(100),
    sexo set('h','m') default 'h',
    usuario varchar(20),
    contrasenia varchar(20),
    cedula varchar(8),
    preguntaSeguridad varchar(100),
    respuesta varchar(50)
);

create table catContacto(
id_contacto int Auto_Increment Primary key ,
parentesco varchar(20) not null,
nombre varchar(20) not null,
apellidoP varchar(20) not null,
apellidoM varchar(20) not null,
numero varchar(20) not null
);

create table Usuario_UsuarioEmergencia(
    id_UsuarioEmergencia int Auto_Increment Primary Key,
    id_usuario int not null,
    id_contacto int not null,
    FOREIGN key (id_usuario) references catUsuario(id_usuario),
    FOREIGN key (id_contacto) references catContacto(id_contacto)
);

create table catAlergia(
  id_alergia int PRIMARY key,
  alergia varchar(200)  
);

create table historial(
    id_historial int Auto_Increment Primary key ,
    id_usuario int ,
    id_alergia int ,
    tipo_sangre varchar(10) not null,
    enfermedades varchar(200) not null,
    antecedentes varchar(200) not NULL,  
    FOREIGN key (id_usuario) references catUsuario(id_usuario),
    FOREIGN key (id_alergia) references catAlergia(id_alergia)
);


create table catCaso(
    id_caso int Auto_Increment Primary key,
    peso float, 
    altura float,
    talla float,
    presicion float,
    temperatura float,
    sintomas varchar(200),
    motivo_consulta varchar(200)
);


create table catConsultas(
    id_consulta int Auto_Increment Primary key,
    id_usuario int,
    id_doctor int,
    id_caso int,
    fechaHora DateTime,
    asistencia boolean,
    FOREIGN key (id_usuario) references catUsuario(id_usuario),
    FOREIGN key (id_caso) references catCaso(id_caso)
);

create table catPresentacion(
    id_presentacion int Auto_Increment PRIMARY key,
    tipo varchar(100)
);
create table catMedicamento(
    id_medicamento int Auto_Increment Primary key,
    nombre varchar(100)
);

create table medicamento_presentacion(
    id_mediforma int Auto_Increment Primary key,
    id_medicamento int,
    id_presentacion int,
    FOREIGN key (id_medicamento) references catMedicamento(id_medicamento),
    FOREIGN key (id_presentacion) references catPresentacion(id_presentacion)
);

create table almacenDoctor( 
    id_almacenDoctor int Auto_Increment Primary key,
    id_medPresentacion int,
    cantidad int,
    FOREIGN key (id_medPresentacion) references medicamento_presentacion(id_mediforma)
);

create table catTratamiento(
    id_tratamiento int Auto_Increment PRIMARY Key,
    id_caso int,
    id_almacen int,
    horas_espera float,
    tiempo Date,
    dosis varchar(100),
    FOREIGN key (id_caso) references cat_caso(id_caso),
    FOREIGN key (id_medi_forma) references ctrl_medi_forma(id_mediforma)
);

