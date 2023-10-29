drop database ocean;
CREATE database Ocean;
use Ocean;
 DROP USER 'Administrador'@'localhost';
 
 DROP USER 'BackOffice'@'localhost';
  
 DROP USER 'AlmacenInterno'@'localhost';
   
 DROP USER 'AlmacenExterno'@'localhost';
    
DROP USER 'ChoferCamion'@'localhost';

DROP USER 'ChoferCamioneta'@'localhost';

CREATE USER 'Administrador'@'localhost' IDENTIFIED BY '123456';
CREATE USER 'BackOffice'@'localhost' IDENTIFIED BY '123456';
CREATE USER 'AlmacenInterno'@'localhost' IDENTIFIED BY '123456';
CREATE USER 'AlmacenExterno'@'localhost' IDENTIFIED BY '123456';
CREATE USER 'ChoferCamion'@'localhost' IDENTIFIED BY '123456';
CREATE USER 'ChoferCamioneta'@'localhost' IDENTIFIED BY '123456';


CREATE TABLE `almacen` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `ubicacion` varchar(30) NOT NULL
);


CREATE TABLE `almacenexterno` (
  `idE` int(11) NOT NULL PRIMARY KEY,
  `Empresa` varchar(30) NOT NULL
);


CREATE TABLE `almaceninterno` (
  `idI` int(11) NOT NULL PRIMARY KEY,
  `ruta` int(11) not null unique
);


CREATE TABLE `camion` (
  `Matricula` char(7) NOT NULL PRIMARY KEY,
  `Peso` float(11) NOT NULL CHECK (Peso <= 5000),
  `Alto` double NOT NULL CHECK (Alto <= 4.10),
  `Ancho` double NOT NULL CHECK (Ancho <= 2.6),
  `Largo` double NOT NULL CHECK (Largo <= 13.20),
  `Tipo` varchar(30) NOT NULL
);


CREATE TABLE `camionero` (
  `CIC` int(8) NOT NULL PRIMARY KEY,
  `FechaVL` date DEFAULT NULL,
  `Turno` varchar(45) DEFAULT NULL
);

CREATE TABLE `camioneta` (
  `MatriculaC` char(7) NOT NULL PRIMARY KEY
);


CREATE TABLE `conduce` (
  `CIC` int(8) NOT NULL PRIMARY KEY,
  `MatriculaV` char(7) NOT NULL,
  `Demora` varchar(255),
  `fDemora` datetime
);


CREATE TABLE `contiene` (
  `codigo` int(11) NOT NULL,
  `IDL` int(11) NOT NULL,
  PRIMARY KEY (`codigo`,`IDL`)
) ;


CREATE TABLE `esta` (
  `IDR` int(11) NOT NULL, 
  `IDA` int(11) NOT NULL,
  `Distancia` time,
  PRIMARY KEY (`IDR`,`IDA`)
);


CREATE TABLE `lleva` (
  `IDL` int(11) NOT NULl PRIMARY KEY,
	`Matricula` char(7) NOT NULL,
  `fEntrega` datetime DEFAULT NULL
);



CREATE TABLE `lotes` (
  `IDL` int(11) NOT NULL PRIMARY KEY,
  `Peso` float(11) DEFAULT NULL,
  `Estado` varchar(45) default 'noAsignado' NOT NULL,
  `Destino` varchar(40) NOT NULL,
  `tiempoEstimado` datetime NOT NULL,
  `Empresa` varchar(45) NOT NULL,
  `enAlmacenExterno` tinyint(1) NOT NULL
);


CREATE TABLE `va_hacia` (
  `IDL` int(11) NOT NULL primary key,
  `IDR` int(11) DEFAULT NULL, 
  `IDA` int(11) DEFAULT NULL
);

CREATE TABLE `paquetes` (
  `codigo` int(11) NOT NULL PRIMARY KEY,
  `Peso` float(11) NOT NULL,
  `Estado` varchar(45) default 'enAlmacenExterno' NOT NULL,
  `fRecibo` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `fEntrega` date NOT NULL,
  `Destinatario` varchar(45) NOT NULL,
  `Destino` varchar(45) NOT NULL,
  `Empresa` varchar(45) NOT NULL
);


CREATE TABLE `personal` (
  `CIP` int(8) NOT NULL PRIMARY KEY,
  `Cargo` varchar(45) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL
);


CREATE TABLE `personas` (
  `CI` int(8) NOT NULL PRIMARY KEY,
  `Nombre` varchar(45) DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Mail` varchar(30) not null unique 
);


CREATE TABLE `personas_token` (
  `TokenId` int(11) NOT NULL PRIMARY KEY,
  `Mail` varchar(45) DEFAULT NULL,
  `Token` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL
);


CREATE TABLE `recorrido` (
  `IDR` int(11) NOT NULL PRIMARY KEY
);


CREATE TABLE `trabaja` (
  `IDA` int(11) NOT NULL,
  `CIP` int(8) NOT NULL PRIMARY KEY
);


CREATE TABLE `transporta` (
  `codigo` int(11) NOT NULL PRIMARY KEY,
  `MatriculaC` char(7) NOT NULL,
  `fEntrega` datetime DEFAULT NULL 
);


CREATE TABLE `usuario` (
  `Mail` varchar(30) NOT NULL PRIMARY KEY,
  `Contraseña` varchar(100) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Rol` varchar(30) NOT NULL,
  `Empresa` varchar(45) NOT NULL
);


CREATE TABLE `va` (
  `MatriculaC` char(7) NOT NULL primary key,
  `idI` int(11) NOT NULL
);


CREATE TABLE `va_llegada` (
  `MatriculaC` char(7) NOT NULL,
  `FechaLlegada` datetime DEFAULT NULL,
  PRIMARY KEY (`MatriculaC`,`FechaLlegada`)
);


CREATE TABLE `va_salida` (
  `MatriculaC` char(7) NOT NULL,
  `FechaSalida` datetime DEFAULT NULL,
  PRIMARY KEY (`MatriculaC`,`FechaSalida`)  
);


CREATE TABLE `vehiculo` (
  `MatriculaV` char(7) NOT NULL PRIMARY KEY,
  `Estado` varchar(40) NOT NULL,
  `Disponibilidad` varchar(40) NOT NULL
);


-- Auto Increment
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;


ALTER TABLE `lotes`
  MODIFY `IDL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;


ALTER TABLE `paquetes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;


ALTER TABLE `personas_token`
  MODIFY `TokenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;


ALTER TABLE `recorrido`
  MODIFY `IDR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Check
ALTER TABLE lotes
ADD CONSTRAINT lotes_estado 
CHECK (Estado IN ('noAsignado', 'asignado', 'entregado'));

ALTER TABLE paquetes
ADD CONSTRAINT paquetes_estado 
CHECK (Estado IN ('enAlmacenExterno', 'loteExternoAsignado', 'enCentral', 'loteAsignado', 'loteDesarmado', 'camionetaAsignada', 'entregado'));

ALTER TABLE camionero
ADD CONSTRAINT camionero_turno
CHECK (Turno IN ('mañana', 'tarde', 'noche'));

ALTER TABLE vehiculo
ADD CONSTRAINT vehiculo_estado 
CHECK (Estado IN ('buenEstado', 'malEstado'));

ALTER TABLE vehiculo 
ADD CONSTRAINT vehiculo_disponibilidad 
CHECK (Disponibilidad  IN ('disponible', 'enRuta'));

ALTER TABLE usuario
ADD CONSTRAINT usuario_estado 
CHECK (Estado IN ('Activo', 'Inactivo'));

ALTER TABLE usuario
ADD CONSTRAINT usuario_rol
CHECK (Rol IN ('Administrador', 'ChoferCamion', 'choferCamioneta', 'AlmacenExterno', 'AlmacenInterno'));


-- Foreign key's
ALTER TABLE `almacenexterno`
  ADD CONSTRAINT `fk_almacenId` FOREIGN KEY (`idE`) REFERENCES `almacen` (`id`) ON DELETE NO ACTION;


ALTER TABLE `almaceninterno`
  ADD CONSTRAINT `fk_almacen` FOREIGN KEY (`idI`) REFERENCES `almacen` (`id`) ON DELETE NO ACTION;


ALTER TABLE `camion`
  ADD CONSTRAINT `fk_camion` FOREIGN KEY (`Matricula`) REFERENCES `vehiculo` (`MatriculaV`) ON DELETE NO ACTION;


ALTER TABLE `camioneta`
  ADD CONSTRAINT `fk_camionetaC` FOREIGN KEY (`MatriculaC`) REFERENCES `vehiculo` (`MatriculaV`) ON DELETE NO ACTION;

ALTER TABLE `camionero`
  ADD CONSTRAINT `fk_persona` FOREIGN KEY (`CIC`) REFERENCES `personas` (`CI`) ON DELETE NO ACTION;


ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personaCi` FOREIGN KEY (`CIP`) REFERENCES `personas` (`CI`) ON DELETE NO ACTION;

ALTER TABLE `conduce`
  ADD CONSTRAINT `fk_conduceCamion` FOREIGN KEY (`MatriculaV`) REFERENCES `vehiculo` (`MatriculaV`),
  ADD CONSTRAINT `fk_conduceCamionero` FOREIGN KEY (`CIC`) REFERENCES `camionero` (`CIC`) ON DELETE NO ACTION;


ALTER TABLE `contiene`
  ADD CONSTRAINT `fk_lote` FOREIGN KEY (`IDL`) REFERENCES `lotes` (`IDL`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_paquete` FOREIGN KEY (`codigo`) REFERENCES `paquetes` (`codigo`) ON DELETE NO ACTION;


ALTER TABLE `esta`
  ADD CONSTRAINT `fk_AlmacenRecorrido` FOREIGN KEY (`IDA`) REFERENCES `almaceninterno` (`idI`) ON DELETE cascade,
  ADD CONSTRAINT `fk_recorridoAlmacen` FOREIGN KEY (`IDR`) REFERENCES `recorrido` (`IDR`) ON DELETE cascade;

ALTER TABLE `trabaja`
  ADD CONSTRAINT `fk_trabajaAlmacen` FOREIGN KEY (`IDA`) REFERENCES `almaceninterno` (`idI`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_trabajaPersonal` FOREIGN KEY (`CIP`) REFERENCES `personal` (`CIP`) ON DELETE NO ACTION;


ALTER TABLE `transporta`
  ADD CONSTRAINT `fk_Camioneta` FOREIGN KEY (`MatriculaC`) REFERENCES `camioneta` (`MatriculaC`),
  ADD CONSTRAINT `fk_transportaPaquete` FOREIGN KEY (`codigo`) REFERENCES `paquetes` (`codigo`) ON DELETE NO ACTION;


ALTER TABLE `va`
  ADD CONSTRAINT `fk_almacenInternoVa` FOREIGN KEY (`idI`) REFERENCES `almaceninterno` (`idI`),
  ADD CONSTRAINT `fk_camionetaVa` FOREIGN KEY (`MatriculaC`) REFERENCES `camioneta` (`MatriculaC`);


ALTER TABLE `va_hacia`
  ADD CONSTRAINT `fk_va_hacia_lote` FOREIGN KEY (`IDL`) REFERENCES `lotes` (`IDL`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_lotesAlmacen` FOREIGN KEY (`IDR`, `IDA`) REFERENCES `esta` (`IDR`, `IDA`) ON DELETE NO ACTION;


ALTER TABLE `va_llegada`
  ADD CONSTRAINT `fk_vaALlegadaCamioneta` FOREIGN KEY (`MatriculaC`) REFERENCES `va` (`MatriculaC`);


ALTER TABLE `va_salida`
  ADD CONSTRAINT `fk_vaASalidaCamioneta` FOREIGN KEY (`MatriculaC`) REFERENCES `va` (`MatriculaC`) ON DELETE NO ACTION;


ALTER TABLE `lleva`
  ADD CONSTRAINT `fk_llevaCamion` FOREIGN KEY (`Matricula`) REFERENCES `camion` (`Matricula`) on delete no action,
  ADD CONSTRAINT `fk_llevaLote` FOREIGN KEY (`IDL`) REFERENCES `lotes` (`IDL`) on delete no action;



-- Triggers
-- BEFORE
-- Trigger para poner la emresa de los lotes con enAlmacenExterno = 0
-- trigger paraponer el destino y la ruta de los lotes con enAlmacenExterno = 1
DELIMITER //
CREATE TRIGGER lote_atributo_before_insert
BEFORE INSERT ON lotes
FOR EACH ROW
BEGIN
    IF NEW.enAlmacenExterno = 0 THEN
        SET NEW.Empresa = 'QuickCarry';
        SET new.Peso = 0;
    ELSE 
        SET NEW.Destino = 'Montevideo';
        SET new.Peso = 0;
    END IF;
END;
//

-- trigger que verifica si el tiempo estimado es mayor que la fecha actual
DELIMITER //
CREATE TRIGGER lote_before_insert
BEFORE INSERT ON lotes
FOR EACH ROW
BEGIN
    IF NEW.tiempoEstimado <= NOW() THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: El tiempo Estimado de entrega debe ser mayor que la fecha actual.';
    END IF;
END;
//

-- trigger que verifica si el lote se puede relacionar con el recorrido
DELIMITER //
CREATE TRIGGER va_hacia_before_insert_IDR
BEFORE INSERT ON va_hacia
FOR EACH ROW
BEGIN
    IF NEW.IDL in (select IDL from lotes where enAlmacenExterno = 1) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Este lote externo no se puede relacionar con el recorrido.';
    END IF;
END;
//

-- trigger que verifica si el tiempo estimado es mayor que la fecha actual
DELIMITER //
CREATE TRIGGER paquete_before_insert
BEFORE INSERT ON paquetes
FOR EACH ROW
BEGIN
    IF NEW.fEntrega <= NOW() THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: El tiempo Estimado de entrega debe ser mayor que la fecha actual.';
    END IF;
END;
//


-- trigger que verifica si la fecha de entrega es mayor que la fecha actual
DELIMITER //
CREATE TRIGGER transporta_before_insert
BEFORE INSERT ON transporta
FOR EACH ROW
BEGIN
    IF NEW.fEntrega < NOW() THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La fecha de entrega debe ser mayor que la fecha actual.';
    END IF;
END;
//

-- trigger que verifica si la fecha de demora es mayor que la fecha actual
DELIMITER //
CREATE TRIGGER conduce_before_insert
BEFORE INSERT ON conduce
FOR EACH ROW
BEGIN
    IF NEW.fDemora < NOW() THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La fecha de demora debe ser mayor que la fecha actual.';
    END IF;
END;
//

-- trigger que verifica si ya hay un almacen en Montevideo
DELIMITER // 
CREATE TRIGGER almacenInterno_before_insert
BEFORE INSERT ON almaceninterno
FOR EACH ROW
BEGIN
    IF (SELECT COUNT(*) FROM almacenInterno join almacen ON almaceninterno.idI = almacen.id WHERE ubicacion LIKE '%Montevideo%') > 1 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe un almacenInterno en Montevideo.';
    END IF;
END;
//

-- Trigger para que no se pueda insertar un almacen si ya esta en almacen externo
DELIMITER // 
CREATE TRIGGER almacenInterno_before_insert_id
BEFORE INSERT ON almaceninterno
FOR EACH ROW
BEGIN
    IF new.idI in (SELECT idE FROM almacenexterno)THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe un almacen Externo con esa id.';
    END IF;
END;
//

-- Trigger para que no se pueda insertar un almacen si ya esta en almacen interno
DELIMITER // 
CREATE TRIGGER almacenExterno_before_insert_id
BEFORE INSERT ON almacenexterno
FOR EACH ROW
BEGIN
    IF new.idE in (SELECT idI FROM almaceninterno)THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe un almacen interno con esa id.';
    END IF;
END;
//

-- Trigger para que no se pueda insertar una matricula en camion si ya esta en camioneta
DELIMITER // 
CREATE TRIGGER camion_before_insert_matricula
BEFORE INSERT ON camion
FOR EACH ROW
BEGIN
    IF new.Matricula in (SELECT MatriculaC FROM camioneta)THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe una camioneta con esa Matricula.';
    END IF;
END;
//

-- Trigger para que no se pueda insertar una matricula en camioneta si ya esta en camion
DELIMITER // 
CREATE TRIGGER camioneta_before_insert_matricula
BEFORE INSERT ON camioneta
FOR EACH ROW
BEGIN
    IF new.MatriculaC in (SELECT Matricula FROM camion)THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe una camioneta con esa Matricula.';
    END IF;
END;
//

-- Trigger para que no se pueda insertar una CI en camionero si ya esta en personal
DELIMITER // 
CREATE TRIGGER camionero_before_insert_CI
BEFORE INSERT ON camionero
FOR EACH ROW
BEGIN
    IF new.CIC in (SELECT CIP FROM personal)THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe un trabajador con esa CI.';
    END IF;
END;
//

-- Trigger para que no se pueda insertar una CI en personal si ya esta en camionero
DELIMITER // 
CREATE TRIGGER personal_before_insert_CI
BEFORE INSERT ON personal
FOR EACH ROW
BEGIN
    IF new.CIP in (SELECT CIC FROM camionero)THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe un camionero con esa CI.';
    END IF;
END;
//

-- Trigger para que no se pueda insertar una CI en personal si ya esta en camionero
DELIMITER // 
CREATE TRIGGER personal_before_insert_fNacimiento
BEFORE INSERT ON personal
FOR EACH ROW
BEGIN
    IF TIMESTAMPDIFF(year, new.FechaNacimiento, NOW()) < 18 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Esta persona no tiene la mayoría de edad.';
    END IF;
END;
//

-- trigger para poner la emresa automaticamente de los usuarios cuyo rol != AlmacenExterno
DELIMITER //
CREATE TRIGGER usuarios_empresa_before_insert
BEFORE INSERT ON usuario
FOR EACH ROW
BEGIN
    IF NEW.Rol != 'AlmacenExterno' THEN
        SET NEW.Empresa = 'QuickCarry';
    END IF;
END;
//


-- Trigger para verificar si el camión puede acceder a las relaciones
delimiter //
create trigger lleva_before_insert_camion
before insert on lleva
for each row
begin
    IF NEW.Matricula IN (SELECT Matricula FROM camion join vehiculo ON camion.Matricula = vehiculo.MatriculaV WHERE Estado != 'buenEstado') OR 
       NEW.Matricula IN (SELECT Matricula FROM camion join vehiculo ON camion.Matricula = vehiculo.MatriculaV WHERE Disponibilidad = 'enRuta') THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación camion-lote no es válida.';
    END IF;
end;
//

-- trigger que verifica si la fecha de entrega es mayor que la fecha actual
DELIMITER //
CREATE TRIGGER lleva_before_insert
BEFORE INSERT ON lleva
FOR EACH ROW
BEGIN
    IF NEW.fEntrega < NOW() THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La fecha de entrega debe ser mayor que la fecha actual.';
    END IF;
END;
//

-- trigger que prohibe que un camion lleve un lote externo y uno interno a la vez
DELIMITER //
CREATE TRIGGER lleva_before_insert_lote_externo
BEFORE INSERT ON lleva
FOR EACH ROW
BEGIN
    DECLARE camion_externo INT;
    DECLARE camion_interno INT;
    
    SELECT COUNT(*) INTO camion_externo
    FROM lleva
    JOIN lotes ON lleva.IDL = lotes.IDL
    WHERE lleva.Matricula = NEW.Matricula AND lotes.enAlmacenExterno = 1 AND lleva.fEntrega is null;
    
    SELECT COUNT(*) INTO camion_interno
    FROM lleva
    JOIN lotes ON lleva.IDL = lotes.IDL
    WHERE lleva.Matricula = NEW.Matricula AND lotes.enAlmacenExterno = 0 AND lleva.fEntrega is null;
    
    IF camion_externo > 0 AND camion_interno > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: El camión no puede llevar lotes externos e internos simultáneamente.';
    END IF;
END;
//


-- trigger para verificar si el lote puede acceder a las relaciones
delimiter //
create trigger lleva_before_insert_lote
before insert on lleva
for each row
begin
IF NEW.IDL NOT IN (SELECT IDL FROM lotes WHERE Estado = 'noAsignado') THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación lote-camión no es válida.';
    END IF;
end;
//

-- trigger para verificar si el lote puede acceder a las relaciones
delimiter //
create trigger lleva_before_insert_lote_externo_recorrido
before insert on lleva
for each row
begin
    IF NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno = 1)THEN
        IF NOT NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno = 1) THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación lote-camión no es válida.';
        END IF;
    END IF;
end;
//

delimiter //
create trigger lleva_before_insert_lote_interno_recorrido
before insert on lleva
for each row
begin
    IF (SELECT enAlmacenExterno FROM lotes WHERE IDL = NEW.IDL) = 0 AND NEW.IDL NOT IN (SELECT IDL FROM va_hacia) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación lote///-camión no es válida.';
    END IF;
end;
//
 
-- trigger para verificar si el peso total es mayor a 3300
delimiter //
create trigger lleva_before_insert_peso
before insert on lleva
for each row
begin
	declare pesoCamion float(11);
	declare pesoLote float(11);
    
    select Peso 
    into pesoCamion
    from camion
    where Matricula=new.Matricula;
        
    SELECT SUM(l.Peso)
    INTO pesoLote
    FROM lotes l
    JOIN lleva ON l.IDL = lleva.IDL
    WHERE lleva.Matricula = new.Matricula;
    
    if (pesoCamion + pesoLote) > 24000 then
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: El camión tiene mucha carga';
    end if;
end;
//

-- Trigger para verificar si la camioneta puede acceder a las relaciones
delimiter //
create trigger va_before_insert_camioneta
before insert on va
for each row
begin
    IF NEW.MatriculaC IN (SELECT MatriculaC FROM camioneta join vehiculo ON camioneta.MatriculaC = vehiculo.MatriculaV WHERE Estado != 'buenEstado') THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación camioneta-almacen no es válida.';
    END IF;
end;
//

-- Trigger para verificar si la camioneta puede acceder a las relaciones
delimiter //
create trigger va_salida_before_insert_camioneta
before insert on va_salida
for each row
begin
    IF NEW.MatriculaC IN (SELECT MatriculaC FROM camioneta join vehiculo ON camioneta.MatriculaC = vehiculo.MatriculaV WHERE Disponibilidad = 'enRuta') THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación camioneta-salida no es válida.';
    END IF;
end;
//

-- Trigger para verificar si la camioneta puede acceder a las relaciones
delimiter //
create trigger va_llegada_before_insert_camioneta
before insert on va_llegada
for each row
begin
    IF NEW.MatriculaC IN (SELECT MatriculaC FROM camioneta join vehiculo ON camioneta.MatriculaC = vehiculo.MatriculaV WHERE Disponibilidad != 'enRuta') THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación camioneta-llegada no es válida.';
    END IF;
end;
//

-- Trigger para verificar si hay mas fechas de llegada antes que de salida
delimiter //
create trigger va_llegada_before_insert
before insert on va_llegada
for each row
begin

    DECLARE num_salidas INT;
    DECLARE num_llegadas INT;

    -- Contar el número de salidas
    SELECT COUNT(*) INTO num_salidas
    FROM va_salida
    WHERE MatriculaC = NEW.MatriculaC;

    -- Contar el número de llegadas
    SELECT COUNT(*) INTO num_llegadas
    FROM va_llegada
    WHERE MatriculaC = NEW.MatriculaC;


    IF num_llegadas > num_salidas THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: No pueden haber más fechas de llagada que de salida.';
    END IF;
end;
//


-- trigger para verificar si la camioneta puede acceder a las relaciones
delimiter //
create trigger transporta_before_insert_camioneta
before insert on transporta
for each row
begin
    IF NEW.MatriculaC IN (SELECT MatriculaC FROM camioneta JOIN vehiculo ON camioneta.MatriculaC = vehiculo.MatriculaV WHERE Estado != 'buenEstado') OR 
       NEW.MatriculaC IN (SELECT MatriculaC FROM camioneta JOIN vehiculo ON camioneta.MatriculaC = vehiculo.MatriculaV WHERE Disponibilidad = 'enRuta') THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación camioneta-paquete no es válida.';
    END IF;
end;
//


-- Trigger para verificar la relación entre paquetes y camionetas en transporta
DELIMITER //
CREATE TRIGGER transporta_before_insert_paquete
BEFORE INSERT ON transporta
FOR EACH ROW 
BEGIN
    IF NEW.codigo NOT IN (SELECT codigo FROM paquetes WHERE Estado = 'loteDesarmado') THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación paquete-camioneta no es válida.';
    END IF;
END;
//

-- Trigger para verificar la relación entre paquetes y lotes en contiene
DELIMITER //
CREATE TRIGGER contiene_before_insert_paquete
BEFORE INSERT ON contiene
FOR EACH ROW
BEGIN
IF NEW.codigo NOT IN (SELECT codigo FROM paquetes WHERE Estado = 'enAlmacenExterno') AND 
       (SELECT enAlmacenExterno FROM lotes WHERE IDL = NEW.IDL) = 1 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación paquete-lote no es válida.';
    END IF;
END;
//

-- Trigger para verificar si la cantidad de lotes que tiene un paquete son mas de 2
DELIMITER //
CREATE TRIGGER contiene_before_insert_paquete_cantidad
BEFORE INSERT ON contiene
FOR EACH ROW
BEGIN
IF (SELECT COUNT(*) FROM contiene WHERE codigo = new.codigo) > 2 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: ya sele asigno 2 lotes a este paquete.';
    END IF;
END;
//

-- Trigger para verificar la relación entre paquetes y lotes en contiene (estado 'enCentral')
DELIMITER //

CREATE TRIGGER contiene_before_insert_enCentral
BEFORE INSERT ON contiene
FOR EACH ROW
BEGIN
    IF new.codigo NOT IN (SELECT codigo FROM paquetes WHERE Estado = 'enCentral') AND 
       (SELECT enAlmacenExterno FROM lotes WHERE IDL = NEW.IDL) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación paquete-lote no es válida.';
    END IF;
END;

//

DELIMITER ;

-- AFTER
-- trigger que suma todos los peso de los paquetes
DELIMITER //
CREATE TRIGGER lote_after_insert
AFTER INSERT ON contiene
FOR EACH ROW
BEGIN
    DECLARE total_peso float(11);
    
    SELECT SUM(p.Peso)
    INTO total_peso
    FROM paquetes p
    JOIN contiene c ON p.codigo = c.codigo
    WHERE c.IDL = new.IDL;

    UPDATE lotes
    SET Peso = total_peso
    WHERE lotes.IDL = new.IDL;
END;
//

-- Trigger para restar el peso
DELIMITER //
CREATE TRIGGER lote_after_delete
AFTER DELETE ON contiene
FOR EACH ROW
BEGIN
    DECLARE total_peso float(11);
    
    SELECT SUM(p.Peso)
    INTO total_peso
    FROM paquetes p
    JOIN contiene c ON p.codigo = c.codigo
    WHERE c.IDL = old.IDL;

    UPDATE lotes
    SET Peso = total_peso
    WHERE lotes.IDL = old.IDL;
END;
//

-- Trigger para actualizar el estado del paquete cuando se asigna a un loteExterno
DELIMITER //
CREATE TRIGGER contiene_after_insert_paqueteExterno
AFTER INSERT ON contiene
FOR EACH ROW
BEGIN
    IF NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno = 1) THEN
		UPDATE paquetes
		SET Estado = 'loteExternoAsignado'
		WHERE codigo = NEW.codigo;
    END IF;
   
END;
//

-- Trigger para actualizar el estado del paquete cuando se elimina de contiene
DELIMITER //
CREATE TRIGGER contiene_after_delete_paqueteExterno
AFTER DELETE ON contiene
FOR EACH ROW
BEGIN
    IF OLD.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno = 1) THEN
		UPDATE paquetes
		SET Estado = 'enAlmacenExterno'
		WHERE codigo = OLD.codigo;
    END IF;
END;
//

-- Trigger para actualizar el estado del paquete cuando se asigna a un loteExterno
DELIMITER //
CREATE TRIGGER contiene_after_insert_paquete
AFTER INSERT ON contiene
FOR EACH ROW
BEGIN
    IF NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno = 0) THEN
		UPDATE paquetes
		SET Estado = 'loteAsignado'
		WHERE codigo = NEW.codigo;
    END IF;
   
END;
//

-- Trigger para actualizar el estado del paquete cuando se elimina de contiene
DELIMITER //
CREATE TRIGGER contiene_after_delete_paquete
AFTER DELETE ON contiene
FOR EACH ROW
BEGIN
    IF OLD.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno = 0) THEN
		UPDATE paquetes
		SET Estado = 'enCentral'
		WHERE codigo = OLD.codigo;
    END IF;
END;
//


-- trigger que actualiza el estado del lote
DELIMITER //
CREATE TRIGGER lleva_after_insert_lote
AFTER INSERT ON lleva
FOR EACH ROW
BEGIN
    UPDATE lotes
    SET Estado = 'asignado'
    WHERE lotes.IDL = NEW.IDL;
END;
//

-- Trigger para actualizar el estado del lote cuando se elimina de lleva
DELIMITER //
CREATE TRIGGER lleva_after_delete_lote
AFTER DELETE ON lleva
FOR EACH ROW
BEGIN
    UPDATE lotes
    SET Estado = 'noAsignado'
    WHERE lotes.IDL = OLD.IDL;
END;
//

-- Trigger para actualizar el estado del lote y los paquetes cuando se entrega
DELIMITER //
CREATE TRIGGER lleva_after_update_entrega_externo
AFTER UPDATE ON lleva
FOR EACH ROW
BEGIN
IF NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno = 1) THEN
    IF NEW.fEntrega IS NOT NULL THEN
        UPDATE lotes
        SET Estado = 'entregado'
        WHERE lotes.IDL = NEW.IDL;
        
        -- Actualiza el estado de los paquetes a 'enCentral'
        UPDATE paquetes
        SET Estado = 'enCentral'
        WHERE codigo IN (SELECT codigo FROM contiene WHERE IDL = NEW.IDL);
    END IF;
    END IF;
END;
//


-- Trigger para actualizar el estado del lote y los paquetes cuando se entrega (estado 'enCentral')
DELIMITER //
CREATE TRIGGER lleva_after_update_entrega_interno
AFTER UPDATE ON lleva
FOR EACH ROW
BEGIN
   IF NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno = 0) THEN 
    IF NEW.fEntrega IS NOT NULL THEN
        UPDATE lotes
        SET Estado = 'entregado'
        WHERE lotes.IDL = NEW.IDL;
        
        UPDATE paquetes
        SET Estado = 'loteDesarmado'
        WHERE codigo IN (SELECT codigo FROM contiene WHERE IDL = NEW.IDL);
    END IF;
    END IF;
END;
//

-- Trigger para actualizar el estado del paquete cuando se asigna a una camioneta
DELIMITER //
CREATE TRIGGER transporta_after_insert_paquete
AFTER INSERT ON transporta
FOR EACH ROW
BEGIN
    UPDATE paquetes
    SET Estado = 'camionetaAsignada'
    WHERE codigo = NEW.codigo;
END;

//

-- Trigger para actualizar el estado del paquete cuando se elimina de transporta
DELIMITER //
CREATE TRIGGER transporta_after_delete_paquete
AFTER DELETE ON transporta
FOR EACH ROW
BEGIN
	UPDATE paquetes
	SET Estado = 'loteDesarmado'
	WHERE codigo = OLD.codigo;
END;
//

-- Trigger para actualizar el estado del paquete cuando se entrega desde la camioneta
DELIMITER //
CREATE TRIGGER transporta_after_update_paquete
AFTER UPDATE ON transporta
FOR EACH ROW
BEGIN
    IF NEW.fEntrega IS NOT NULL THEN
        UPDATE paquetes
        SET Estado = 'entregado'
        WHERE codigo = NEW.codigo;
    END IF;
END;

//

-- Trigger para actualizar la disponibilidad de un camion si este tiene una fecha de llegada
DELIMITER //
CREATE TRIGGER llegada_after_insert_camioneta
AFTER INSERT ON va_llegada
FOR EACH ROW
BEGIN
    DECLARE num_salidas INT;
    DECLARE num_llegadas INT;

    -- Contar el número de salidas
    SELECT COUNT(*) INTO num_salidas
    FROM va_salida
    WHERE MatriculaC = NEW.MatriculaC;

    -- Contar el número de llegadas
    SELECT COUNT(*) INTO num_llegadas
    FROM va_llegada
    WHERE MatriculaC = NEW.MatriculaC;

    -- Actualizar disponibilidad del camión
    IF num_llegadas >= num_salidas THEN
        UPDATE vehiculo SET Disponibilidad = 'disponible' WHERE MatriculaV = NEW.MatriculaC;
    ELSE
        UPDATE vehiculo SET Disponibilidad = 'enRuta' WHERE MatriculaV = NEW.MatriculaC;
    END IF;

END;
//

-- Trigger para actualizar la disponibilidad de un camion si este tiene una fecha de llegada
DELIMITER //
CREATE TRIGGER salida_after_insert_camioneta
AFTER INSERT ON va_salida
FOR EACH ROW
BEGIN
    DECLARE num_salidas INT;
    DECLARE num_llegadas INT;

    -- Contar el número de salidas
    SELECT COUNT(*) INTO num_salidas
    FROM va_salida
    WHERE MatriculaC = NEW.MatriculaC;

    -- Contar el número de llegadas
    SELECT COUNT(*) INTO num_llegadas
    FROM va_llegada
    WHERE MatriculaC = NEW.MatriculaC;

    -- Actualizar disponibilidad del camión
    IF num_salidas > num_llegadas THEN
        UPDATE vehiculo SET Disponibilidad = 'enRuta' WHERE MatriculaV = NEW.MatriculaC;
    ELSE
        UPDATE vehiculo SET Disponibilidad = 'disponible' WHERE MatriculaV = NEW.MatriculaC;
    END IF;

END;
//

-- Event para que si pasaron 15 minutos el estado del token cambie 
DELIMITER //
CREATE EVENT actualizar_estado_token 
ON SCHEDULE EVERY 1 minute
ON COMPLETION PRESERVE ENABLE 
DO 
  UPDATE personas_token
  SET Estado = 'Inactivo'
  WHERE TIMESTAMPDIFF(MINUTE, Fecha, NOW()) >= 15;
//

DELIMITER ;


INSERT INTO `usuario` (`Mail`, `Contraseña`, `Estado`, `Rol`, `Empresa`) VALUES
('LuisFernando@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenExterno', 'Crecom'),
('CarlosEnrique@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenExterno', 'Crecom'),
('BrunoMars@gmail.com', '35f4a8d465e6e1edc05f3d8ab658c551', 'Activo', 'Administrador', 'QuickCarry'),
('robertoSanchez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'Administrador', 'QuickCarry'),
('LuisHernandez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenInterno', 'QuickCarry'),
('MartinGarcia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenInterno', 'QuickCarry'),
('MariaPerez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta', 'QuickCarry'),
('AdrianoToledo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta', 'QuickCarry'),
('AbrahamAlvarez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamion', 'QuickCarry'),
('JoseRamon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamion', 'QuickCarry');

INSERT INTO `personas_token` (`TokenId`, `Mail`, `Token`, `Estado`, `Fecha`) VALUES
(340, 'LuisHernandez@gmail.com', '99822586aec01f68a7aa14a085d88d25', 'Activo', '2023-09-19 00:58:00'),
(342, 'LuisHernandez@gmail.com', '3652d2eef0c7df24a140a0614d43b977', 'Activo', '2023-09-19 04:45:00'),
(344, 'LuisHernandez@gmail.com', '0b22bfcd5dc11d07549c4a3af09308e7', 'Activo', '2023-09-19 04:57:00'),
(346, 'LuisHernandez@gmail.com', '06c898041121712c873118fbf4c4ddb1', 'Activo', '2023-09-19 05:01:00'),
(348, 'LuisHernandez@gmail.com', '7ce95010fcb713d242943bbc9133ad68', 'Activo', '2023-09-19 05:20:00'),
(349, 'robertoSanchez@gmail.com', '24f51c91ad2d0b752c8905d455c0f981', 'Activo', '2023-09-19 23:04:00'),
(350, 'LuisHernandez@gmail.com', 'ba3e2b4427dfb854d5471623a91e8e6b', 'Activo', '2023-09-19 23:05:00'),
(351, 'robertoSanchez@gmail.com', 'dcf9ffe3ee0b92d5d2a5b68a447a6e0f', 'Activo', '2023-09-20 01:45:00'),
(352, 'LuisHernandez@gmail.com', '9efb6ccd076148588d575f5a44833276', 'Activo', '2023-08-20 01:59:00');


INSERT INTO `almacen` (`id`, `ubicacion`) VALUES
(1, 'Montevideo'),
(2, 'Canelones'),
(3, 'Rivera'),
(4, 'Tacuarembó'),
(5, 'Salto'),
(6, 'Artigas'),
(7, 'Paysandú'),
(8, 'Río Negro'),
(9, 'Soriano'),
(10, 'Colonia'),
(11, 'Maldonado'),
(12, 'Rocha'),
(13, 'Lavalleja'),
(14, 'Flores'),
(15, 'Florida'),
(16, 'Durazno'),
(17, 'Melo'),
(18, 'Treinta y tres'),
(19, 'San José'),
(20, 'Montevideo'),
(21, 'Montevideo'),
(22, 'Montevideo'),
(23, 'Montevideo');

INSERT INTO `almacenexterno` (`idE`, `Empresa`) VALUES
(20, 'Crecom'),
(21, 'Crecom'),
(22, 'Devoto'),
(23, 'Devoto');

INSERT INTO `almaceninterno` (`idI`, `ruta`) VALUES
(1, '5'),
(2, '27'),
(3, '69'),
(4, '26'),
(5, '31'),
(6, '30'),
(7, '24'),
(8, '9'),
(9, '55'),
(10, '4'),
(11, '3'),
(12, '96'),
(13, '39'),
(14, '63'),
(15, '6'),
(16, '32'),
(17, '7'),
(18, '8'),
(19, '11');


INSERT INTO `vehiculo` (`MatriculaV`, `Estado`, `Disponibilidad`) VALUES
('1538JMH', 'buenEstado', 'disponible'),
('3455VGV', 'buenEstado', 'disponible'),
('7816TKD', 'buenEstado', 'disponible'),
('8828FDZ', 'buenEstado', 'disponible'),
('8907YWY', 'buenEstado', 'disponible'),
('1006TKH', 'malEstado', 'disponible'),
('6182HNP', 'buenEstado', 'disponible'),
('7934JJC', 'malEstado', 'disponible'),
('5972BSQ', 'buenEstado', 'disponible');

INSERT INTO `camion` (`Matricula`, `Peso`, `Alto`, `Ancho`, `Largo`, `Tipo`) VALUES
('7934JJC', 2, 3, 2, 9, '3'),
('8828FDZ', 2, 2, 2, 2, '2'),
('7816TKD', 2, 3, 2, 9, '3'),
('8907YWY', 2, 2, 2, 2, '2'),
('6182HNP', 2, 4, 2, 7, '7');

INSERT INTO `camioneta` (`MatriculaC`) VALUES
('3455VGV'),
('5972BSQ'),
('1538JMH'),
('1006TKH');

INSERT INTO `personas` (`CI`, `Nombre`, `Telefono`, `Direccion`, `Mail`) VALUES
(66051354, 'Luis Hernández', '097283023', 'Bv Artigas', 'LuisHernandez@gmail.com'),
(16093047, 'Roberto Sanchez', '095728392', 'Gral Rivera', 'robertoSanchez@gmail.com'),
(54928301, 'Martín García', '096926710', 'Bv España 6927', 'MartinGarcia@gmail.com'),
(74469698, 'Bruno Mars', '097283023', 'Bv Artigas', 'BrunoMars@gmail.com'),

(73989524, 'Jose Ramon', '091829323', 'José Batlle y Ordóñez', 'JoseRamon@gmail.com'),
(1119808, 'Adriano Toledo', '091829323', 'José Batlle y Ordóñez', 'AdrianoToledo@gmail.com'),
(24618198, 'Abraham Alvarez', '095728392', 'Gral Rivera', 'AbrahamAlvarez@gmail.com'),
(92132307, 'María Pérez', '091829323', 'José Batlle y Ordóñez', 'MariaPerez@gmail.com');


INSERT INTO `personal` (`CIP`, `Cargo`, `FechaNacimiento`) VALUES
(16093047, 'Gerente', '1998-07-07'),
(74469698, 'Gerente', '1998-07-07'),
(66051354, 'Empleado', '1998-07-07'),
(54928301, 'Empleado', '2001-04-21');

INSERT INTO `camionero` (`CIC`, `FechaVL`, `Turno`) VALUES
(73989524, '2025-11-05', 'Tarde'),
(1119808, '2025-11-05', 'Tarde'),
(24618198, '2025-11-05', 'Tarde'),
(92132307, '2026-03-02', 'Mañana');

INSERT INTO `recorrido` (`IDR`) VALUES
(1),
(2),
(3),
(4),
(6),
(5);

INSERT INTO `esta` (`IDR`, `IDA`, `Distancia`) VALUES
(1, 1, '03:01:00'), 
(6, 2, '03:01:00'),
(6, 15, '03:01:00'),
(6, 16, '03:01:00'),
(3, 13, '03:01:00'),
(3, 18, '03:01:00'),
(5, 14, '03:01:00'),
(5, 19, '03:01:00');

INSERT INTO `lotes` (`IDL`, `Peso`, `Estado`, `Destino`, `tiempoEstimado`, `enAlmacenExterno`, `Empresa`) VALUES
(1, 0, 'Asignado', '3', '2023-12-22 21:03:00', 0, 'jk'),
(2, 0, 'entregado', '10', '2023-12-30 21:05:00', 0, 'jk'),
(3, 0, 'noAsignado', '3', '2023-12-22 21:03:00', 0, 'jk'),
(4, 0, 'noAsignado', '10', '2023-12-30 21:05:00', 0, 'k'),
(5, 0, 'noAsignado', '3', '2023-12-22 21:03:00', 0, 'k'),
(6, 0, 'entregado', '10', '2023-12-30 21:05:00', 0, 'l'),
(7, 0, 'noAsignado', 's', '2023-12-22 21:03:00', 1, 'Crecom'),
(8, 0, 'entregado', 'd', '2023-12-30 21:05:00', 1, 'Crecom'),
(9, 0, 'noAsignado', 'd', '2023-12-30 21:05:00', 1, 'Crecom'),
(10, 0, 'noAsignado', 'Montevideo', '2023-12-02 22:30:00', 1, 'Devoto');

INSERT INTO `va_hacia` (`IDL`, `IDR`, `IDA`) VALUES
(4, 6, 2), 
(2, 6, 2),
(3, 6, 16);


INSERT INTO `paquetes` (`codigo`, `Peso`, `Estado`, `fRecibo`, `fEntrega`, `Destinatario`, `Destino`, `Empresa`) VALUES
(1, '6', 'enAlmacenExterno', '2023-09-09', '2023-12-10', 'Maria', '8', 'Crecom'),
(2, '4', 'enAlmacenExterno', '2023-06-06', '2023-12-01', 'Bruno', '6', 'Crecom'),
(3, '10', 'enAlmacenExterno', '2023-07-07', '2023-12-08', 'Agustín', '77', 'Crecom'),
(4, '6', 'enAlmacenExterno', '2023-07-07', '2023-12-08', 'Jesús', 'Melo av12', 'Crecom'),
(5, '34', 'enAlmacenExterno', '2023-08-08', '2023-12-08', 'Tiago', '8', 'Crecom'),
(6, '12', 'enAlmacenExterno', '2023-05-05', '2023-12-07', 'Ignacio', 'Melo av122', 'Crecom'),
(7, '7', 'enCentral', '2023-07-07', '2023-12-08', 'Diago', 'Melo av12', 'Crecom'),
(8, '2', 'enCentral', '2023-08-08', '2023-12-08', 'Mariano', '8', 'Crecom'),
(9, '5', 'enCentral', '2023-05-05', '2023-12-07', 'Joaquín', 'Melo av122', 'Crecom'),
(10, '6', 'enCentral', '2023-09-09', '2023-12-10', 'Diego', '8', 'Crecom'),
(11, '4', 'enCentral', '2023-06-06', '2023-12-01', 'Guillermo', '6', 'Crecom'),
(12, '9', 'enCentral', '2023-07-07', '2023-12-08', 'Juan Manuel', '77', 'Crecom'),
(13, '11', 'loteDesarmado', '2023-09-09', '2023-12-10', 'Lucas', '8', 'Crecom'),
(14, '13', 'loteDesarmado', '2023-06-06', '2023-12-01', 'Mauricio', '6', 'Crecom'),
(15, '14', 'loteDesarmado', '2023-07-07', '2023-12-08', 'Roberto', '77', 'Crecom'),
(16, '23', 'loteDesarmado', '2023-07-07', '2023-12-08', 'Luis', 'Melo av12', 'Crecom'),
(17, '19', 'loteDesarmado', '2023-08-08', '2023-12-08', 'Alberto', '8', 'Crecom'),
(18, '18', 'loteDesarmado', '2023-05-05', '2023-12-07', 'Javier', 'Melo av122', 'Crecom'),
(19, '16', 'entregado', '2023-05-05', '2023-12-07', 'Ezequiel', 'Melo av122', 'Crecom'),
(20, '16', 'entregado', '2023-05-05', '2023-12-07', 'Ezequiel', 'Melo av122', 'Crecom'),
(21, '3', 'entregado', '2023-05-06', '2023-12-08', 'Matías', 'Melo Av126', 'Crecom');

INSERT INTO `contiene` (`codigo`, `IDL`) VALUES
(7, 3),
(8, 3),
(9, 4),
(1, 7),
(2, 7),
(3, 10);

INSERT INTO `conduce` (`CIC`, `MatriculaV`, `Demora`, `fDemora`) VALUES
(24618198, '8828FDZ', 'se pinchó una llanta', '2023-12-22 10:31:00'),
(1119808, '5972BSQ', 'se pinchó una llanta', '2023-12-02 15:01:00'),
(73989524, '8907YWY', null, null),
(92132307, '1538JMH', null, null);

INSERT INTO `trabaja` (`IDA`, `CIP`) VALUES
(1, 66051354),
(1, 16093047),
(15, 74469698),
(15, 54928301);

 INSERT INTO `lleva` (`IDL`, `Matricula`, `fEntrega`) VALUES
 (3, '6182HNP', null),
 (7, '8907YWY', '2024-06-17 18:30:00'),
 (4, '8907YWY', null);
 
UPDATE lleva
SET fEntrega = '2023-10-16 19:32:30'
WHERE IDL = 3;

INSERT INTO `transporta` (`codigo`, `MatriculaC`, `fEntrega`) VALUES
(13, '1538JMH', null),
(14, '5972BSQ', '2023-12-22 18:01:00'),
(15, '1538JMH', null),
(8, '1538JMH', null);

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 8;

INSERT INTO `va` (`MatriculaC`, `idI`) VALUES
('1538JMH', 15),
('5972BSQ', 1),
('3455VGV', 12);  

INSERT INTO `va_salida` (`MatriculaC`, `FechaSalida`) VALUES
('1538JMH', '2023-09-22 18:01:00'),
('5972BSQ', '2023-09-17 18:30:00');

INSERT INTO `va_llegada` (`MatriculaC`,`FechaLlegada`) VALUES
('1538JMH', '2023-09-22 18:01:00'),
('5972BSQ', '0088-06-08 08:08:00');


-- Sentencias
-- 1V) Mostrar los paquetes entregados en el mes de mayo del 2023 con destino a la ciudad de Melo
SELECT *
FROM paquetes
WHERE MONTH(fEntrega) = 5 AND YEAR(fEntrega) = 2023 AND Destino LIKE '%Melo%';

-- 2V) MOSTRAR TODOS LOS ALMACENES Y LOS PAQUETES QUE FUERON ENTREGADOS EN LOS MISMOS DURANTE EL 2023,
-- ORDENARLOS ADEMÁS DE LOS QUE RECIBIERON MAS PAQUETES A LOS QUE RECIBIERON MENOS. 
 SELECT a.*, COUNT(c.codigo) as total_paquetes
 FROM almacen a
 JOIN va_hacia ON va_hacia.IDA = a.id 
 JOIN lotes ON lotes.IDL = va_hacia.IDL
 JOIN lleva ON lleva.IDL = lotes.IDL 
 JOIN camion ON camion.Matricula = lleva.Matricula 
 JOIN contiene c ON c.IDL = lleva.IDL 
 WHERE YEAR(lleva.fEntrega) = 2023
 GROUP BY a.id
 ORDER BY total_paquetes DESC;

-- 3V) Mostrar todos los camiones registrados y qué tarea se encuentran realizando en este momento
SELECT MatriculaV, Estado, Disponibilidad
FROM vehiculo
JOIN camion ON MatriculaV = Matricula;


-- 4V) Mostrar todos los camiones que visitaron durante el mes de junio un almacén dado
SELECT lleva.Matricula
FROM lleva
JOIN lotes ON lleva.IDL = lotes.IDL
JOIN va_hacia ON va_hacia.IDL = lotes.IDL
WHERE va_hacia.IDA = 2
  AND MONTH(lleva.fEntrega) = 6;


-- 5V) Mostrar destino, lote, almacén de destino y camión que transporta un paquete dado 
SELECT p.Destino AS Destino_paquete, l.IDL, l.Destino as Destino_lote, ll.Matricula
FROM paquetes p
JOIN contiene c ON p.codigo = c.codigo
JOIN lotes l ON c.IDL = l.IDL
JOIN lleva ll ON ll.IDL = l.IDL
WHERE p.codigo = 7;


-- 6V) MOSTRAR EL IDENTIFICADOR DEL PAQUETE, IDENTIFICADOR DE LOTE, MATRICULA DEL CAMIÓN QUE LO TRANSPORTA,
-- ALMACÉN DE DESTINO, DIRECCIÓN FINAL Y EL ESTADO DEL ENVÍO, PARA LOS PAQUETES QUE SE RECIBIERON HACE MÁS DE 3 DÍAS.
SELECT p.codigo, l.IDL, ll.Matricula, l.Destino, p.Destino, p.Estado
FROM paquetes p
JOIN contiene c ON p.codigo = c.codigo
JOIN lotes l ON c.IDL = l.IDL
JOIN lleva ll on ll.IDL = l.IDL
WHERE DATEDIFF(CURRENT_DATE(), p.fRecibo) > 3;

-- 7V) Mostrar todos los paquetes a los que aún no se les ha asignado un lote y la fecha en la que fueron recibidos
SELECT codigo, fRecibo
FROM paquetes
WHERE Estado = 'enCentral' AND codigo NOT IN (SELECT codigo FROM contiene);


-- 8V) Mostrar matrícula de los camiones que se encuentran fuera de servicio
SELECT Matricula
FROM camion
JOIN vehiculo on camion.Matricula = vehiculo.MatriculaV 
WHERE Estado = 'malEstado';


-- 9V)Mostrar todos los camiones que no tienen un conductor asignado y su estado operativo
SELECT v.MatriculaV, v.Estado 
FROM vehiculo v
JOIN camion cam on cam.Matricula= v.MatriculaV 
LEFT JOIN conduce c ON cam.Matricula = c.MatriculaV
WHERE c.MatriculaV IS NULL;


-- 10V)Mostrar todos los almacenes que se encuentran en un recorrido dado 
SELECT a.*
FROM almacen a
JOIN esta e ON a.id = e.IDA
WHERE e.IDR = 2;




-- vistas
-- view que muestra las personas que noestan en un camionero ni en un personal
CREATE VIEW vwPersonas AS
SELECT * 
FROM personas 
WHERE CI NOT IN (SELECT CIC FROM camionero) AND CI NOT IN (SELECT CIP FROM personal);

-- view que muestra los camioneros que no tienen un camion asignado
CREATE VIEW vwCamionero AS
SELECT CIC 
FROM camionero 
WHERE CIC NOT IN (SELECT CIC FROM conduce);

-- view que muestra los trabajadores que no tienen un almacen asignado
CREATE VIEW vwPersonal AS
SELECT CIP 
FROM personal 
WHERE CIP NOT IN (SELECT CIP FROM trabaja);

-- view que muestra los IDA de trabaja
CREATE VIEW vwIdTrabaja AS
SELECT IDA 
FROM trabaja;

-- view que muestra los almacenes que no estan ni en un almacenInterno ni en un almacenExterno
CREATE VIEW vwAlmacen AS
SELECT * 
FROM almacen 
WHERE id NOT IN (SELECT idE FROM AlmacenExterno) AND id NOT IN (SELECT idI FROM AlmacenInterno);

-- view que muestra las matriculas de conduce
CREATE VIEW vwMatriculaConduce AS
SELECT MatriculaV 
FROM conduce;

-- view que muestra los vehiculos que no estan en un camion ni en una camioneta
CREATE VIEW vwVehiculo AS
SELECT * 
FROM vehiculo 
WHERE MatriculaV NOT IN (SELECT MatriculaC FROM camioneta) AND MatriculaV NOT IN (SELECT Matricula FROM camion);

-- view que muestra los vehiculos con buenEstado y que están disponibles
CREATE VIEW vwBuenEstadoVehiculo AS
SELECT MatriculaV 
FROM vehiculo 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'disponible';

-- view que muestra los camiones con buenEstado y que están disponibles
CREATE VIEW vwBuenEstadoCamion AS
SELECT Matricula
FROM camion join vehiculo on Matricula = MatriculaV 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'disponible';

-- view que muestra los camiones con buenEstado y que están en ruta
CREATE VIEW vwCamionEnRuta AS
SELECT Matricula
FROM camion join vehiculo on Matricula = MatriculaV 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'enRuta';

-- view que muestra las camionetas con buenEstado y que están disponibles
CREATE VIEW vwBuenEstadoCamioneta AS
SELECT MatriculaC
FROM camioneta join vehiculo on MatriculaC = MatriculaV 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'disponible';

-- view que muestra las camionetas con buenEstado y que están en ruta
CREATE VIEW vwCamionetaEnRuta AS
SELECT MatriculaC
FROM camioneta join vehiculo on MatriculaC = MatriculaV 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'enRuta';

-- view que muestra los camiones que estan en buen estado y la fEntrega = null
CREATE VIEW vwLleva AS
SELECT l.*
FROM lleva l JOIN vehiculo v ON l.Matricula = v.MatriculaV
WHERE v.Estado = 'buenEstado' AND v.Disponibilidad = 'disponible' AND l.fEntrega IS NULL;


-- view que te muestra todos los camiones que no llevan un lote externo
CREATE VIEW vwLleva_interno AS
SELECT l.*
FROM lleva l
JOIN vehiculo v ON l.Matricula = v.MatriculaV 
WHERE l.Matricula NOT IN (
    SELECT l.Matricula 
    FROM lleva l 
    JOIN lotes ON lotes.IDL = l.IDL 
    JOIN vehiculo v ON l.Matricula = v.MatriculaV 
    WHERE lotes.enAlmacenExterno = 1 
        AND l.fEntrega IS NULL 
        AND v.Estado = 'buenEstado' 
        AND v.Disponibilidad = 'disponible'
) 
AND v.Estado = 'buenEstado' 
AND v.Disponibilidad = 'disponible'
AND l.fEntrega IS NULL;



-- view que te muestra todos los camiones que no llevan un lote interno
CREATE VIEW vwLleva_externo AS
SELECT l.*
FROM lleva l
JOIN vehiculo v ON l.Matricula = v.MatriculaV 
WHERE l.Matricula NOT IN (
    SELECT l.Matricula 
    FROM lleva l 
    JOIN lotes ON lotes.IDL = l.IDL 
    JOIN vehiculo v ON l.Matricula = v.MatriculaV 
    WHERE lotes.enAlmacenExterno = 0
        AND l.fEntrega IS NULL 
        AND v.Estado = 'buenEstado' 
        AND v.Disponibilidad = 'disponible'
) 
AND v.Estado = 'buenEstado' 
AND v.Disponibilidad = 'disponible'
AND l.fEntrega IS NULL;


-- view que te muestra todos los camiones que no llevan un lote externo
CREATE VIEW vwcamion_interno AS
SELECT *
FROM camion join vehiculo on camion.Matricula = vehiculo.MatriculaV
WHERE camion.Matricula not in (select Matricula FROM lleva join lotes on lleva.IDL = lotes.IDL where enAlmacenExterno=1 and lleva.fEntrega IS NULL) 
AND vehiculo.Estado = 'buenEstado' AND vehiculo.Disponibilidad = 'disponible';

-- view que te muestra todos los camiones que no llevan un lote interno
CREATE VIEW vwcamion_externo AS
SELECT *
FROM camion join vehiculo on camion.Matricula = vehiculo.MatriculaV
WHERE camion.Matricula not in (select Matricula FROM lleva join lotes on lleva.IDL = lotes.IDL where enAlmacenExterno=0 and lleva.fEntrega IS NULL) 
AND vehiculo.Estado = 'buenEstado' AND vehiculo.Disponibilidad = 'disponible';


-- view que muestra los lotes de QuickCarry
CREATE VIEW vwLotesInterno AS
SELECT * 
FROM lotes 
WHERE enAlmacenExterno = 0;

-- view que muestra los lotes sin asignar y que son de QuickCarry
CREATE VIEW vwLotesNoAsignados AS
SELECT *
FROM lotes 
WHERE Estado = 'noAsignado' AND enAlmacenExterno = 0;

-- view que muestra los lotes sin asignar y que son de QuickCarry
CREATE VIEW vwlotesnoasignadosarecorridos AS
SELECT *
FROM lotes
WHERE Estado = 'noAsignado' AND enAlmacenExterno = 0 and lotes.IDL not in (SELECT IDL FROM va_hacia);

-- view que muestra los lotes de otros almacenes
CREATE VIEW vwLotesExterno AS
SELECT * 
FROM lotes 
WHERE enAlmacenExterno = 1;

-- view que muestra los lotes sin asignar y que son de otra empresa
CREATE VIEW vwLotesExternosNoAsignados AS
SELECT *
FROM lotes 
WHERE Estado = 'noAsignado' AND enAlmacenExterno = 1;

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwLotesEntregados AS
SELECT * 
FROM lotes 
WHERE Estado = 'entregado';

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwLotesNoEntregados AS
SELECT * 
FROM lotes 
WHERE Estado != 'entregado';

-- view que muestra los lotes sin asignar y que son de otra empresa
 CREATE VIEW vwRecorridosNoAsignados AS
 SELECT *
 FROM recorrido 
 WHERE IDR not in (SELECT IDR FROM va_hacia);


-- view que muestra los paquetes en central o en lotes sin asignar
CREATE VIEW vwPaquetesEnLotes AS 
SELECT paquetes.* 
FROM paquetes 
LEFT JOIN contiene ON paquetes.codigo = contiene.codigo
LEFT JOIN lotes ON lotes.IDL = contiene.IDL
WHERE 
    paquetes.Estado = 'enCentral' 
    OR paquetes.Estado = 'loteAsignado' 
    OR (lotes.Estado = 'noAsignado' AND lotes.enAlmacenExterno = 0);


-- view que muestra los paquetes en central
CREATE VIEW vwPaquetesEnCentral AS
SELECT * 
FROM paquetes 
WHERE Estado = 'enCentral';

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwPaquetesEnAlmacenExterno AS
SELECT * 
FROM paquetes 
WHERE Estado = 'enAlmacenExterno';

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwPaquetesEntregados AS
SELECT * 
FROM paquetes 
WHERE Estado = 'entregado';

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwPaquetesNoEntregados AS
SELECT * 
FROM paquetes 
WHERE Estado != 'entregado';


-- view que muestra los paquetes que no se han entregado
CREATE VIEW vwPaquetesCamioneta AS
SELECT transporta.* 
FROM transporta join paquetes on transporta.codigo = paquetes.codigo 
where paquetes.Estado='camionetaAsignada' AND transporta.fEntrega IS NULL;

-- view que muestra los lotes sin asignar y que son de QuickCarry
CREATE VIEW vwPaquetesContiene AS
SELECT codigo, contiene.IDL
FROM contiene join lotes on contiene.IDL = lotes.IDL
WHERE lotes.Estado = 'noAsignado' AND lotes.enAlmacenExterno = 0;

-- view que muestra los paquetes que no se han entregado
CREATE VIEW vwPaqueteCamioneta AS
SELECT * 
FROM transporta 
where fEntrega is null;


-- Permisos de todos los usuarios
-- Permisos del Administrador
GRANT USAGE ON ocean.* TO 'Administrador'@'localhost';

grant all privileges on ocean.* to 'Administrador'@'localhost';

-- GRANT REPLICATION SLAVE ON *.* TO 'Administrador'@'%';

show grants for Administrador@localhost;


-- Permisos de BackOffice
GRANT USAGE ON ocean.usuario TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.personas_token TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.personas TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.personal TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.camionero TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.camion TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.camioneta TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vehiculo TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.trabaja TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.conduce TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.lotes TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.paquetes TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwalmacen TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwcamionero TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwidtrabaja TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwmatriculaconduce TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwpersonal TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwpersonas TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwvehiculo TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwpaquetesentregados TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwpaquetesnoentregados TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwlotesnoentregados TO 'BackOffice'@'localhost';
GRANT USAGE ON ocean.vwlotesentregados TO 'BackOffice'@'localhost';


GRANT SELECT ON ocean.vwpaquetesentregados TO 'BackOffice'@'localhost';
GRANT SELECT ON ocean.vwpaquetesnoentregados TO 'BackOffice'@'localhost';
GRANT SELECT ON ocean.vwlotesnoentregados TO 'BackOffice'@'localhost';
GRANT SELECT ON ocean.vwlotesentregados TO 'BackOffice'@'localhost';

GRANT SELECT ON ocean.vwalmacen TO 'BackOffice'@'localhost';
GRANT SELECT ON ocean.vwcamionero TO 'BackOffice'@'localhost';
GRANT SELECT ON ocean.vwidtrabaja TO 'BackOffice'@'localhost';
GRANT SELECT ON ocean.vwmatriculaconduce TO 'BackOffice'@'localhost';
GRANT SELECT ON ocean.vwpersonal TO 'BackOffice'@'localhost';
GRANT SELECT ON ocean.vwpersonas TO 'BackOffice'@'localhost';
GRANT SELECT ON ocean.vwvehiculo TO 'BackOffice'@'localhost';

GRANT SELECT, INSERT, DELETE, update ON ocean.almacenexterno TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE, update ON ocean.almaceninterno TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE, update ON ocean.almacen TO 'BackOffice'@'localhost';

GRANT SELECT ON ocean.personas_token TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE, update ON ocean.personas TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE, update ON ocean.usuario TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE, update ON ocean.personal TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE, update ON ocean.camionero TO 'BackOffice'@'localhost';

GRANT SELECT, INSERT, DELETE, update ON ocean.vehiculo TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE, update ON ocean.camion TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE, update ON ocean.camioneta TO 'BackOffice'@'localhost';

GRANT SELECT, INSERT, DELETE ON ocean.trabaja TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE ON ocean.conduce TO 'BackOffice'@'localhost';

GRANT SELECT, INSERT, DELETE, update ON ocean.lotes TO 'BackOffice'@'localhost';
GRANT SELECT, INSERT, DELETE, update ON ocean.paquetes TO 'BackOffice'@'localhost';

-- GRANT replication slave ON *.* TO 'BackOffice'@'%';

show grants for BackOffice@localhost;


-- Permisos del AlmacenExterno
GRANT USAGE ON ocean.personas_token TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.camion TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.almacen TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.almacenexterno TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.lotes TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.contiene TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.paquetes TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.lleva TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.vwbuenestadocamion TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.vwcamionenruta TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.vwlleva_externo TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.vwlleva TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.vwlotesexterno TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.vwlotesexternosnoasignados TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.vwpaquetescontiene TO 'AlmacenExterno'@'localhost';
GRANT USAGE ON ocean.vwpaquetesenalmacenexterno TO 'AlmacenExterno'@'localhost';


GRANT SELECT ON ocean.vwbuenestadocamion TO 'AlmacenExterno'@'localhost';
GRANT SELECT ON ocean.vwcamionenruta TO 'AlmacenExterno'@'localhost';
GRANT SELECT ON ocean.vwlleva_externo TO 'AlmacenExterno'@'localhost';
GRANT SELECT ON ocean.vwlleva TO 'AlmacenExterno'@'localhost';
GRANT SELECT ON ocean.vwlotesexterno TO 'AlmacenExterno'@'localhost';
GRANT SELECT ON ocean.vwlotesexternosnoasignados TO 'AlmacenExterno'@'localhost';
GRANT SELECT ON ocean.vwpaquetescontiene TO 'AlmacenExterno'@'localhost';
GRANT SELECT ON ocean.vwpaquetesenalmacenexterno TO 'AlmacenExterno'@'localhost';

GRANT SELECT (Matricula) ON ocean.camion TO 'AlmacenExterno'@'localhost';

GRANT SELECT ON ocean.personas_token TO 'AlmacenExterno'@'localhost';

GRANT SELECT ON ocean.almacen TO 'AlmacenExterno'@'localhost';
GRANT SELECT ON ocean.almacenexterno TO 'AlmacenExterno'@'localhost';
GRANT SELECT, INSERT, DELETE ON ocean.lotes TO 'AlmacenExterno'@'localhost';
GRANT SELECT (enAlmacenExterno) ON ocean.lotes TO 'AlmacenExterno'@'localhost';
GRANT SELECT, INSERT, DELETE ON ocean.paquetes TO 'AlmacenExterno'@'localhost';
GRANT SELECT (Peso), INSERT, DELETE, UPDATE (Peso) ON ocean.paquetes TO 'AlmacenExterno'@'localhost';

GRANT SELECT, INSERT, DELETE ON ocean.contiene TO 'AlmacenExterno'@'localhost';
GRANT SELECT, INSERT, DELETE ON ocean.lleva TO 'AlmacenExterno'@'localhost';

-- GRANT replication slave ON *.* TO 'AlmacenExterno'@'%';

show grants for AlmacenExterno@localhost;


-- Permisos de AlmacenInterno
GRANT USAGE ON ocean.personas_token TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.camion TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.almacen TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.almaceninterno TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.lotes TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.paquetes TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.lleva TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.camioneta TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.recorrido TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.contiene TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.transporta TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.esta TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.va TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.va_salida TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.va_llegada TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwbuenestadocamion TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwbuenestadocamioneta TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwbuenestadovehiculo TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwcamionenruta TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwcamionetaenruta TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwlleva TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwlleva_interno TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwlotesinterno TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwlotesnoasignados TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwpaquetescamioneta TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwpaquetescontiene TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwpaquetesencentral TO 'AlmacenInterno'@'localhost';
GRANT USAGE ON ocean.vwpaquetesenlotes TO 'AlmacenInterno'@'localhost';


GRANT SELECT ON ocean.vwbuenestadocamion TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwbuenestadocamioneta TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwbuenestadovehiculo TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwcamionenruta TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwcamionetaenruta TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwlleva TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwlleva_interno TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwlotesinterno TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwlotesnoasignados TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwpaquetescamioneta TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwpaquetescontiene TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwpaquetesencentral TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.vwpaquetesenlotes TO 'AlmacenInterno'@'localhost';

GRANT SELECT ON ocean.personas_token TO 'AlmacenInterno'@'localhost';

GRANT SELECT (Matricula) ON ocean.camion TO 'AlmacenInterno'@'localhost';
GRANT SELECT (MatriculaC) ON ocean.camioneta TO 'AlmacenInterno'@'localhost';

GRANT SELECT ON ocean.almacen TO 'AlmacenInterno'@'localhost';
GRANT SELECT ON ocean.almaceninterno TO 'AlmacenInterno'@'localhost';

GRANT SELECT, INSERT, DELETE ON ocean.lotes TO 'AlmacenInterno'@'localhost';
GRANT SELECT (enAlmacenExterno) ON ocean.lotes TO 'AlmacenInterno'@'localhost';

GRANT SELECT, INSERT, DELETE ON ocean.recorrido TO 'AlmacenInterno'@'localhost';

GRANT SELECT, INSERT, DELETE ON ocean.esta TO 'AlmacenInterno'@'localhost';

GRANT SELECT, INSERT, DELETE ON ocean.paquetes TO 'AlmacenInterno'@'localhost';
GRANT SELECT, INSERT, DELETE, UPDATE (Peso) ON ocean.paquetes TO 'AlmacenInterno'@'localhost';

GRANT SELECT, INSERT, DELETE ON ocean.contiene TO 'AlmacenInterno'@'localhost';
GRANT SELECT, INSERT, DELETE ON ocean.lleva TO 'AlmacenInterno'@'localhost';
GRANT SELECT, INSERT, DELETE ON ocean.lleva TO 'AlmacenInterno'@'localhost';

GRANT SELECT, INSERT, DELETE ON ocean.va TO 'AlmacenInterno'@'localhost';
GRANT SELECT, INSERT, DELETE ON ocean.va_llegada TO 'AlmacenInterno'@'localhost';
GRANT SELECT, INSERT, DELETE ON ocean.va_salida TO 'AlmacenInterno'@'localhost';

-- GRANT replication slave ON *.* TO 'AlmacenInterno'@'%';

show grants for AlmacenInterno@localhost;


-- Permisos de ChoferCamion
GRANT USAGE ON ocean.personas_token TO 'ChoferCamion'@'localhost';
GRANT USAGE ON ocean.camion TO 'ChoferCamion'@'localhost';
GRANT USAGE ON ocean.lotes TO 'ChoferCamion'@'localhost';
GRANT USAGE ON ocean.paquetes TO 'ChoferCamion'@'localhost';
GRANT USAGE ON ocean.lleva TO 'ChoferCamion'@'localhost';
GRANT USAGE ON ocean.recorrido TO 'ChoferCamion'@'localhost';
GRANT USAGE ON ocean.conduce TO 'ChoferCamion'@'localhost';
GRANT USAGE ON ocean.esta TO 'ChoferCamion'@'localhost';

GRANT SELECT ON ocean.personas_token TO 'ChoferCamion'@'localhost';

GRANT SELECT ON ocean.camion TO 'ChoferCamion'@'localhost';

GRANT SELECT ON ocean.lotes TO 'ChoferCamion'@'localhost';
GRANT SELECT, UPDATE (Estado) ON ocean.lotes TO 'ChoferCamion'@'localhost';

GRANT SELECT (codigo) ON ocean.paquetes TO 'ChoferCamion'@'localhost';
GRANT SELECT, UPDATE (Estado) ON ocean.paquetes TO 'ChoferCamion'@'localhost';

GRANT SELECT ON ocean.recorrido TO 'ChoferCamion'@'localhost';

GRANT SELECT ON ocean.conduce TO 'ChoferCamion'@'localhost';
GRANT SELECT, update (Demora) ON ocean.conduce TO 'ChoferCamion'@'localhost';
GRANT SELECT, update (fDemora) ON ocean.conduce TO 'ChoferCamion'@'localhost';

GRANT SELECT ON ocean.lleva TO 'ChoferCamion'@'localhost';
GRANT SELECT, UPDATE (fEntrega) ON ocean.lleva TO 'ChoferCamion'@'localhost';

GRANT SELECT ON ocean.esta TO 'ChoferCamion'@'localhost';


-- GRANT replication slave ON *.* TO 'ChoferCamion'@'%';

show grants for ChoferCamion@localhost;


-- Permisos de ChoferCamioneta
GRANT USAGE ON ocean.personas_token TO 'ChoferCamioneta'@'localhost';
GRANT USAGE ON ocean.camioneta TO 'ChoferCamioneta'@'localhost';
GRANT USAGE ON ocean.paquetes TO 'ChoferCamioneta'@'localhost';
GRANT USAGE ON ocean.transporta TO 'ChoferCamioneta'@'localhost';
GRANT USAGE ON ocean.conduce TO 'ChoferCamioneta'@'localhost';

GRANT SELECT ON ocean.personas_token TO 'ChoferCamioneta'@'localhost';

GRANT SELECT ON ocean.camioneta TO 'ChoferCamioneta'@'localhost';

GRANT SELECT ON ocean.paquetes TO 'ChoferCamioneta'@'localhost';
GRANT SELECT, update (Estado) ON ocean.paquetes TO 'ChoferCamioneta'@'localhost';

GRANT SELECT ON ocean.transporta TO 'ChoferCamioneta'@'localhost';
GRANT SELECT, update (fEntrega) ON ocean.transporta TO 'ChoferCamioneta'@'localhost';

GRANT SELECT ON ocean.conduce TO 'ChoferCamioneta'@'localhost';
GRANT SELECT, update (Demora) ON ocean.conduce TO 'ChoferCamioneta'@'localhost';
GRANT SELECT, update (fDemora) ON ocean.conduce TO 'ChoferCamioneta'@'localhost';

-- GRANT replication slave ON *.* TO 'ChoferCamioneta'@'%';

show grants for ChoferCamioneta@localhost;

flush privileges;
