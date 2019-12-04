
Drop TABLE registro;
CREATE TABLE registro (
nombre VARCHAR , 
cedula INTEGER, 
edad INTEGER, 
sexo VARCHAR, 
ocupacion VARCHAR
)


Drop TABLE denuncia;
CREATE TABLE denuncia (
lat DOUBLE PRECISION , 
lon DOUBLE PRECISION, 
fecha VARCHAR, 
hora VARCHAR,
zona VARCHAR,
descripcion VARCHAR,
foto VARCHAR

)

SELECT AddGeometryColumn('','denuncia','geom',4326,'POINT',2)

Drop TABLE usuario;
CREATE TABLE usuario (
correo VARCHAR ,
contrasena VARCHAR, 
id_rol VARCHAR, 
id_usuario VARCHAR
)

INSERT INTO usuario(correo,contrasena,id_rol,id_usuario)
VALUES ('ordonez.andres@correounivalle.edu.co','123456','Superusuario','1')


correo,contrasena,id_rol,id_usuario
    
select (ST_transform(ST_PointFromText('729405.446', 25830), 4258)),
y(transform(PointFromText('POINT(4345879.252)', 25830), 4258));

SELECT  SUM (ST_Area(ST_Intersection((ST_buffer((Select geom from denuncia where descripcion='aa'),10000)),d.the_geom))) FROM deforestacion_16_17 AS d WHERE ST_intersects((ST_buffer((Select geom from denuncia where descripcion='aa'),10)),d.the_geom);
SELECT  SUM (ST_Area(ST_Intersection((ST_buffer((Select geom from denuncia where descripcion='aa'),1)),d.the_geom)))*1000 FROM deforestacion_15_16 AS d
select SUM(ST_area(p.geom))*1000 from proy AS p
3.22142
-76.51
SELECT  SUM (ST_Area(ST_Intersection((ST_buffer((ST_GeomFromText('POINT(3.22142 -76.51)',4326)),100)),d.the_geom))) FROM deforestacion_16_17 AS d

select * from registro
select * from denuncia 
select * from usuario
select * from deforestacion_16_17
select * from hidro_palo
select * from proy
_
SELECT mpio_nar_1 FROM proy where mpio_cnm_1= 'CALI'

SELECT ST_area((Select geom from proy where mpio_cnm_1='PUERTO TEJADA' LIMIT 1) )*100000

SELECT SUM(ST_Area(ST_Intersection((Select geom From proy Where mpio_cnm_1='PUERTO TEJADA' LIMIT 1),d1.the_geom))) FROM proy AS p,deforestacion_15_16 AS d1,deforestacion_16_17 AS d2