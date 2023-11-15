use ocean;
 
CREATE TABLE `almacen` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `ubicacion` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL
);


CREATE TABLE `almacenexterno` (
  `idE` int(11) NOT NULL PRIMARY KEY,
  `Empresa` varchar(30) NOT NULL
);


CREATE TABLE `almaceninterno` (
  `idI` int(11) NOT NULL PRIMARY KEY,
  `ruta` int(11) not null
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
  `fRecibo` datetime default null,
  `fEntrega` date NOT NULL,
  `Destinatario` varchar(45) NOT NULL,
  `Destino` varchar(45) NOT NULL,
  `Departamento` varchar(45) NOT NULL,
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
  `FechaLlegada` datetime not NULL,
  PRIMARY KEY (`MatriculaC`,`FechaLlegada`)
);


CREATE TABLE `va_salida` (
  `MatriculaC` char(7) NOT NULL,
  `FechaSalida` datetime not NULL,
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
  MODIFY `IDL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `paquetes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


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

ALTER TABLE paquetes
ADD CONSTRAINT paquetes_departamento
CHECK (Departamento IN ('Canelones', 'Rivera', 'Tacuarembó', 'Salto', 'Artigas', 'Paysandú', 'Río Negro', 'Soriano', 'Colonia', 'Maldonado', 'Rocha', 'Lavalleja', 'Flores', 'Florida', 'Durazno', 'Cerro Largo', 'Treinta y Tres', 'San José'));

ALTER TABLE lotes
ADD CONSTRAINT lotes_destino
CHECK (Destino IN ('Montevideo', 'Canelones', 'Rivera', 'Tacuarembó', 'Salto', 'Artigas', 'Paysandú', 'Río Negro', 'Soriano', 'Colonia', 'Maldonado', 'Rocha', 'Lavalleja', 'Flores', 'Florida', 'Durazno', 'Cerro Largo', 'Treinta y Tres', 'San José'));

ALTER TABLE almacen
ADD CONSTRAINT almacen_ubicacion
CHECK (ubicacion IN ('Montevideo', 'Canelones', 'Rivera', 'Tacuarembó', 'Salto', 'Artigas', 'Paysandú', 'Río Negro', 'Soriano', 'Colonia', 'Maldonado', 'Rocha', 'Lavalleja', 'Flores', 'Florida', 'Durazno', 'Cerro Largo', 'Treinta y Tres', 'San José'));

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


-- trigger que verifica si el lote se puede relacionar con el recorrido
DELIMITER //
CREATE TRIGGER va_hacia_before_update_IDR
BEFORE UPDATE ON va_hacia
FOR EACH ROW
BEGIN
    IF NEW.IDL in (select IDL from lotes where enAlmacenExterno = 1) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Este lote externo no se puede relacionar con el recorrido.';
    END IF;
END;
//


-- Trigger para verificar si el paquete tiene el mismo destino que el lote
DELIMITER //
CREATE TRIGGER va_hacia_before_insert_destino
BEFORE INSERT ON va_hacia
FOR EACH ROW
BEGIN
    DECLARE lote_destino VARCHAR(255);
    DECLARE almacen_destino VARCHAR(255);
    
    SELECT ubicacion INTO almacen_destino FROM almacen WHERE id = NEW.IDA;
    SELECT Destino INTO lote_destino FROM lotes WHERE IDL = NEW.IDL;
    
     IF almacen_destino != lote_destino AND  NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: El lote no puede ir a un almacen con una ubicacion diferente.';    
    END IF;
END;
//


-- Trigger para verificar si el paquete tiene el mismo destino que el lote
DELIMITER //
CREATE TRIGGER va_hacia_before_update_destino
BEFORE UPDATE ON va_hacia
FOR EACH ROW
BEGIN
    DECLARE lote_destino VARCHAR(255);
    DECLARE almacen_destino VARCHAR(255);
    
    SELECT ubicacion INTO almacen_destino FROM almacen WHERE id = NEW.IDA;
    SELECT Destino INTO lote_destino FROM lotes WHERE IDL = NEW.IDL;
    
     IF almacen_destino != lote_destino AND  NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: El lote no puede ir a un almacen con una ubicacion diferente.';    
    END IF;
END;
//

-- Trigger para verificar si ya hay un almacen en una misma ubicación
DELIMITER //
CREATE TRIGGER almaceninterno_before_insert
BEFORE INSERT ON almaceninterno
FOR EACH ROW
BEGIN
    DECLARE ubicacion_existente INT;
    DECLARE destinoInterno varchar(100);

    SELECT ubicacion INTO destinoInterno
    FROM almacen
    WHERE id = NEW.idI;
    
    SELECT COUNT(*) INTO ubicacion_existente
    FROM almaceninterno ai
    JOIN almacen a ON ai.idI = a.id
    WHERE a.ubicacion = destinoInterno;

    IF ubicacion_existente > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe un almacen interno con la misma ubicación.';
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
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: Ya existe una camion con esa Matricula.';
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
       NEW.Matricula IN (SELECT Matricula FROM camion join vehiculo ON camion.Matricula = vehiculo.MatriculaV WHERE Disponibilidad = 'enRuta') OR
       NEW.Matricula NOT IN (SELECT MatriculaV FROM conduce) OR
       NEW.Matricula IN (SELECT v.MatriculaV FROM vehiculo v JOIN camion cam on cam.Matricula= v.MatriculaV  LEFT JOIN conduce c ON cam.Matricula = c.MatriculaV WHERE c.MatriculaV IS NULL) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación camion-lote no es válida.';
    END IF;
end;
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

-- trigger para verificar si el lote puede acceder a las relaciones  X
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

-- trigger que verifica si el lote esta en va_hacia
delimiter //
create trigger lleva_before_insert_lote_interno_recorrido
before insert on lleva
for each row
begin
    IF (SELECT enAlmacenExterno FROM lotes WHERE IDL = NEW.IDL) = 0 AND NEW.IDL NOT IN (SELECT IDL FROM va_hacia) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación lote-camión no es válida.';
    END IF;
end;
//
 
-- trigger para verificar si el peso total es mayor a 24000
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
create trigger va_salida_before_insert_camioneta
before insert on va_salida
for each row
begin
    IF NEW.MatriculaC IN (SELECT MatriculaC FROM camioneta join vehiculo ON camioneta.MatriculaC = vehiculo.MatriculaV WHERE Disponibilidad = 'enRuta') OR
       NEW.MatriculaC NOT IN (SELECT MatriculaV FROM conduce) THEN
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
    IF NEW.MatriculaC IN (SELECT MatriculaC FROM camioneta join vehiculo ON camioneta.MatriculaC = vehiculo.MatriculaV WHERE Disponibilidad != 'enRuta') OR
       NEW.MatriculaC NOT IN (SELECT MatriculaV FROM conduce) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La relación camioneta-llegada no es válida.';
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
       NEW.MatriculaC NOT IN (SELECT MatriculaV FROM conduce) OR
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


-- Trigger para verificar si el paquete tiene el mismo destino que el lote
DELIMITER //
CREATE TRIGGER contiene_before_insert_destino
BEFORE INSERT ON contiene
FOR EACH ROW
BEGIN
    DECLARE lote_destino VARCHAR(255);
    DECLARE paquete_ciudad VARCHAR(255);
    
    SELECT Departamento INTO paquete_ciudad FROM paquetes WHERE codigo = NEW.codigo;
    SELECT Destino INTO lote_destino FROM lotes WHERE IDL = NEW.IDL;
    
    IF lote_destino != paquete_ciudad AND NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: El paquete no puede ir a un lote con un destino diferente.';    
    END IF;
END;
//


DELIMITER //
CREATE TRIGGER contiene_before_update_destino
BEFORE UPDATE ON contiene
FOR EACH ROW
BEGIN
    DECLARE lote_destino VARCHAR(255);
    DECLARE paquete_ciudad VARCHAR(255);
    
    SELECT Departamento INTO paquete_ciudad FROM paquetes WHERE codigo = NEW.codigo;
    SELECT Destino INTO lote_destino FROM lotes WHERE IDL = NEW.IDL;
    
    IF lote_destino != paquete_ciudad AND NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: El paquete no puede ir a un lote con un destino diferente.';    
    END IF;
END;
//

-- Trigger para verificar si el paquete tiene la misma empresa que el lote
DELIMITER //
CREATE TRIGGER contiene_before_insert_Empresa
BEFORE INSERT ON contiene
FOR EACH ROW
BEGIN
    DECLARE lote_Empresa VARCHAR(255);
    DECLARE paquete_Empresa VARCHAR(255);
    
    SELECT Empresa INTO paquete_Empresa FROM paquetes WHERE codigo = NEW.codigo;
    SELECT Empresa INTO lote_Empresa FROM lotes WHERE IDL = NEW.IDL;
    
    IF lote_Empresa != paquete_Empresa AND NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno) = 1 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La empresa del paquete es difetrente que la del lote.';    
    END IF;
END;
//

DELIMITER //
CREATE TRIGGER contiene_before_update_Empresa
BEFORE UPDATE ON contiene
FOR EACH ROW
BEGIN
    DECLARE lote_Empresa VARCHAR(255);
    DECLARE paquete_Empresa VARCHAR(255);
    
    SELECT Empresa INTO paquete_Empresa FROM paquetes WHERE codigo = NEW.codigo;
    SELECT Empresa INTO lote_Empresa FROM lotes WHERE IDL = NEW.IDL;
    
    IF lote_Empresa != paquete_Empresa AND NEW.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno) = 1 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: La empresa del paquete es diferente que la del lote.';    
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

-- Trigger para actualizar el estado del paquete cuando se elimina de contiene
DELIMITER //
CREATE TRIGGER contiene_after_delete_paquete
AFTER DELETE ON contiene
FOR EACH ROW
BEGIN
    IF OLD.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno) = 0 THEN 
        UPDATE paquetes
        SET Estado = 'enCentral'
        WHERE codigo = OLD.codigo;
    END IF;
END;
//

-- Trigger para actualizar el estado del paquete cuando se elimina de contiene
DELIMITER //
CREATE TRIGGER contiene_after_delete_paqueteExterno
AFTER DELETE ON contiene
FOR EACH ROW
BEGIN
    IF OLD.IDL IN (SELECT IDL FROM lotes WHERE enAlmacenExterno) = 1 THEN
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


-- Trigger para actualizar el estado del paquete cuando se asigna a un loteExterno
DELIMITER //
CREATE TRIGGER contiene_after_insert_paquete_externo
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
        SET Estado = 'enCentral',
        fRecibo = now()
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
    UPDATE vehiculo
    SET disponibilidad = 'disponible'
    WHERE MatriculaV = new.MatriculaC;
END;
//

-- Trigger para actualizar la disponibilidad de un camion si este tiene una fecha de llegada
DELIMITER //
CREATE TRIGGER llegada_after_delete_camioneta
AFTER DELETE ON va_llegada
FOR EACH ROW
BEGIN 
	DECLARE maxima_llegada datetime;
    
    SELECT MAX(Fechallegada) INTO maxima_llegada
    FROM va_llegada
    WHERE MatriculaC = OLD.MatriculaC;
	
    IF maxima_llegada = OLD.FechaLlegada THEN
		UPDATE vehiculo
		SET disponibilidad = 'enRuta'
		WHERE MatriculaV = OLD.MatriculaC;
    END IF;
END;
//

-- Trigger para actualizar la disponibilidad de un camion si este tiene una fecha de llegada
DELIMITER //
CREATE TRIGGER salida_after_insert_camioneta
AFTER INSERT ON va_salida
FOR EACH ROW
BEGIN
    UPDATE vehiculo
    SET disponibilidad = 'enRuta'
    WHERE MatriculaV = new.MatriculaC;
END;
//


-- Trigger para actualizar la disponibilidad de un camion con la fecha de salida
DELIMITER //
CREATE TRIGGER salida_after_delete_camioneta
AFTER DELETE ON va_salida
FOR EACH ROW
BEGIN
    DECLARE maxima_salida datetime;

    SELECT MAX(FechaSalida) INTO maxima_salida
    FROM va_salida
    WHERE MatriculaC = OLD.MatriculaC;

	IF maxima_salida = OLD.FechaSalida THEN
		UPDATE vehiculo
		SET disponibilidad = 'disponible'
		WHERE MatriculaV = OLD.MatriculaC;
	END IF;
END;
//
DELIMITER ;


INSERT INTO `usuario` (`Mail`, `Contraseña`, `Estado`, `Rol`, `Empresa`) VALUES
('LuisFernando@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenExterno', 'Crecom'),
('CarlosEnrique@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenExterno', 'Crecom'),

('BrunoMars@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'Administrador', 'QuickCarry'),
('robertoSanchez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'Administrador', 'QuickCarry'),
('JeniferWang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'Administrador', 'QuickCarry'),
('DanubioCampeon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'Administrador', 'QuickCarry'),

('LuisHernandez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenInterno', 'QuickCarry'),
('MartinGarcia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenInterno', 'QuickCarry'),
('JuanPablo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenInterno', 'QuickCarry'),
('MariaFrancisca@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenInterno', 'QuickCarry'),
('AdrianaCarrera@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenInterno', 'QuickCarry'),
('AlejandroParra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'AlmacenInterno', 'QuickCarry'),

('MariaPerez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta', 'QuickCarry'),
('AdrianoToledo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta', 'QuickCarry'),
('JoseAngel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta', 'QuickCarry'),
('NataliaRodriguez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta', 'QuickCarry'),
('IreneMorales@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta', 'QuickCarry'),
('UxiaPino@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta', 'QuickCarry'),
('MaribelCasado@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamioneta', 'QuickCarry'),

('AbrahamAlvarez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamion', 'QuickCarry'),
('VictorJose@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamion', 'QuickCarry'),
('SalvadorGarrido@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamion', 'QuickCarry'),
('JoseLuis@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamion', 'QuickCarry'),
('JuanCaballero@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamion', 'QuickCarry'),
('LuisCarlos@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo', 'ChoferCamion', 'QuickCarry'),
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


INSERT INTO `almacen` (`id`, `ubicacion`, `Direccion`) VALUES
-- Almacenes Internos
(1, 'Montevideo', 'Montevideo Copacabana 2696'),
(2, 'Canelones', 'Santa Ana Lavalleja 7561'),
(3, 'Rivera', 'Minas De Corrales Monteadores 2344'),
(4, 'Tacuarembó', 'Paso Del Cerro Porongos 3014'),
(5, 'Salto', 'Termas Del Arapey Paysandu 7868'),
(6, 'Artigas', 'Palma Coquimbo 5415'),
(7, 'Paysandú', 'Cerro Chato Sarandi 8040'),
(8, 'Río Negro', 'Sarandí De Navarro Canelones 7060'),
(9, 'Soriano', 'Santa Catalina Joaquin Suarez 7981'),
(10, 'Colonia', 'Artilleros Joaquin Suarez 1536'),
(11, 'Maldonado', 'Garzón Tala 2568'),
(12, 'Rocha', 'Rocha Guipúzcoa 2854'),
(13, 'Lavalleja', 'Minas Monteadores 7521'),
(14, 'Flores', 'Trinidad Paso Rivero 3324'),
(15, 'Florida', 'Independencia Neptuno 1290'),
(16, 'Durazno', 'Centenario Leandro Gomez 1535'),
(17, 'Cerro Largo', 'Bañado De Medina Purificacion 9474'),
(18, 'Treinta y Tres', 'Treinta Y Tres Paso Rivero 5681'),
(19, 'San José', 'Rafael Perazza Costanera 7812'),

-- Almacenes Externos
(20, 'Montevideo', 'Montevideo Ibirapita 6052'),
(21, 'Montevideo', 'Montevideo Arenales 8261'),
(22, 'Montevideo', 'Montevideo Ibirapita 8731'),
(23, 'Montevideo', 'Montevideo Arenales 5755');

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
-- camiones
('6182HNP', 'buenEstado', 'disponible'),
('7934JJC', 'buenEstado', 'disponible'),
('7816TKD', 'buenEstado', 'disponible'),
('8828FDZ', 'buenEstado', 'disponible'),
('8907YWY', 'buenEstado', 'disponible'),
('7293HMN', 'malEstado', 'disponible'),
('8673ZWN', 'buenEstado', 'enRuta'),
('9748GGT', 'buenEstado', 'disponible'),

-- camionetas
('0916KND', 'buenEstado', 'disponible'),
('1278VSW', 'buenEstado', 'disponible'),
('2518NMZ', 'malEstado', 'disponible'),
('2722WKS', 'buenEstado', 'disponible'),
('1538JMH', 'buenEstado', 'disponible'),
('3455VGV', 'buenEstado', 'disponible'),
('1006TKH', 'buenEstado', 'disponible'),
('5972BSQ', 'buenEstado', 'disponible');


INSERT INTO `camion` (`Matricula`, `Peso`, `Alto`, `Ancho`, `Largo`, `Tipo`) VALUES
('7934JJC', 2, 3, 2, 9, '3'),
('8828FDZ', 2, 2, 2, 2, '2'),
('7816TKD', 2, 3, 2, 9, '3'),
('7293HMN', 2, 3, 2, 9, '3'),
('8673ZWN', 2, 2, 2, 2, '2'),
('9748GGT', 2, 3, 2, 9, '3'),
('8907YWY', 2, 2, 2, 2, '2'),
('6182HNP', 3500, 4, 2, 7, '7');

INSERT INTO `camioneta` (`MatriculaC`) VALUES
('3455VGV'),
('5972BSQ'),
('1538JMH'),
('0916KND'),
('1278VSW'),
('2518NMZ'),
('2722WKS'),
('1006TKH');


INSERT INTO `personas` (`CI`, `Nombre`, `Telefono`, `Direccion`, `Mail`) VALUES
-- Administrador
(74469698, 'Bruno Mars', '097283023', 'Bv Artigas', 'BrunoMars@gmail.com'),
(16093047, 'Roberto Sanchez', '095728392', 'Gral Rivera', 'robertoSanchez@gmail.com'),
(28030423, 'Jenifer Wang', '097287623', 'Bv Artigas', 'JeniferWang@gmail.com'),
(95123687, 'Jorge Álvarez', '095728392', 'Gral Rivera', 'DanubioCampeon@gmail.com'),

-- Almacen Interno
(66051354, 'Luis Hernández', '097283023', 'Bv Artigas', 'LuisHernandez@gmail.com'),
(54928301, 'Martín García', '096926710', 'Bv España 6927', 'MartinGarcia@gmail.com'),
(31195220, 'Juan Pablo', '097283023', 'Bv Artigas', 'JuanPablo@gmail.com'),
(98784612, 'Maria Francisca', '096926710', 'Bv España 6927', 'MariaFrancisca@gmail.com'),
(34880995, 'Adriana Carrera', '097283023', 'Bv Artigas', 'AdrianaCarrera@gmail.com'),
(94655213, 'Alejandro Parra', '096926710', 'Bv España 6927', 'AlejandroParra@gmail.com'),

-- chofer camion
(24618198, 'Abraham Alvarez', '095728392', 'Gral Rivera', 'AbrahamAlvarez@gmail.com'),
(73989524, 'Jose Ramon', '091829323', 'José Batlle y Ordóñez', 'JoseRamon@gmail.com'),
(40387408, 'Victor Jose', '095728392', 'Gral Rivera', 'VictorJose@gmail.com'),
(41644934, 'Salvador Garrido', '091829323', 'José Batlle y Ordóñez', 'SalvadorGarrido@gmail.com'),
(64637793, 'Jose Luis', '095728392', 'Gral Rivera', 'JoseLuis@gmail.com'),
(36033948, 'Juan Caballero', '091829323', 'José Batlle y Ordóñez', 'JuanCaballero@gmail.com'),
(87033948, 'Uxia del Pino', '091829323', 'José Batlle y Ordóñez', 'UxiaPino@gmail.com'),

-- chofer camioneta
(1119808, 'Adriano Toledo', '091829323', 'José Batlle y Ordóñez', 'AdrianoToledo@gmail.com'),
(25557139, 'Jose Angel', '091829323', 'José Batlle y Ordóñez', 'JoseAngel@gmail.com'),
(68383971, 'Natalia Rodriguez', '091829323', 'José Batlle y Ordóñez', 'NataliaRodriguez@gmail.com'),
(18925549, 'Irene Morales', '091829323', 'José Batlle y Ordóñez', 'IreneMorales@gmail.com'),
(94637793, 'Luis Carlos', '095794562', 'Gral Rivera', 'LuisCarlos@gmail.com'),
(26033948, 'Maribel Casado', '091824523', 'José Batlle y Ordóñez', 'MaribelCasado@gmail.com'),
(92132307, 'María Pérez', '091829323', 'José Batlle y Ordóñez', 'MariaPerez@gmail.com');


INSERT INTO `personal` (`CIP`, `Cargo`, `FechaNacimiento`) VALUES
(16093047, 'Gerente', '1998-07-07'),
(74469698, 'Gerente', '1998-07-07'),
(28030423, 'Gerente', '1998-07-07'),
(95123687, 'Gerente', '1998-07-07'),
(66051354, 'Empleado', '1998-07-07'),
(31195220, 'Empleado', '1998-07-07'),
(98784612, 'Empleado', '1998-07-07'),
(34880995, 'Empleado', '1998-07-07'),
(94655213, 'Empleado', '1998-07-07'),
(54928301, 'Empleado', '2001-04-21');

INSERT INTO `trabaja` (`IDA`, `CIP`) VALUES
(1, 66051354),
(2, 16093047),
(3, 28030423),
(4, 95123687),
(11, 74469698),
(17, 31195220),
(18, 98784612),
(13, 34880995),
(6, 94655213),
(15, 54928301);

INSERT INTO `camionero` (`CIC`, `FechaVL`, `Turno`) VALUES
-- camion
(73989524, '2025-11-05', 'Tarde'),
(24618198, '2025-11-05', 'Tarde'),
(40387408, '2025-11-05', 'Tarde'),
(41644934, '2025-11-05', 'Tarde'),
(64637793, '2025-11-05', 'Tarde'),
(36033948, '2025-11-05', 'Tarde'),
(87033948, '2025-11-05', 'Tarde'),

(26033948, '2025-11-05', 'Tarde'),

-- camioneta 
(1119808, '2025-11-05', 'Tarde'),
(25557139, '2025-11-05', 'Tarde'),
(68383971, '2025-11-05', 'Tarde'),
(18925549, '2025-11-05', 'Tarde'),
(94637793, '2025-11-05', 'Tarde'),
(92132307, '2026-03-02', 'Mañana');


INSERT INTO `conduce` (`CIC`, `MatriculaV`, `Demora`, `fDemora`) VALUES
-- chofer camion
(24618198, '6182HNP', 'se pinchó una llanta', '2023-12-22 10:31:00'),
(73989524, '8907YWY', null, null),
(40387408, '8828FDZ', null, null),
(41644934, '9748GGT', null, null),
(64637793, '7816TKD', 'se pinchó una llanta', '2023-12-22 10:31:00'),
(36033948, '7934JJC', null, null),
(87033948, '8673ZWN', null, null),

-- chofer camioneta 
(1119808, '5972BSQ', 'se pinchó una llanta', '2023-12-02 15:01:00'),
(68383971, '3455VGV', null, null),
(25557139, '1006TKH', null, null),
(18925549, '0916KND', 'se pinchó una llanta', '2023-12-02 15:01:00'),
(94637793, '1278VSW', null, null),
(26033948, '2722WKS', 'se pinchó una llanta', '2023-12-02 15:01:00'),
(92132307, '1538JMH', null, null);


INSERT INTO `recorrido` (`IDR`) VALUES
(1),
(2),
(3),
(4),
(6),
(5);

INSERT INTO `esta` (`IDR`, `IDA`, `Distancia`) VALUES
(1, 13, '04:01:00'),
(1, 18, '05:01:00'),
(2, 17, '03:41:00'),
(2, 18, '02:01:00'),
(3, 13, '01:01:00'),
(3, 18, '03:31:00'),
(4, 15, '01:21:00'),
(4, 17, '02:31:00'),
(4, 4, '03:51:00'),
(6, 2, '02:01:00'),
(6, 15, '03:01:00'),
(6, 16, '04:31:00'),
(5, 14, '02:01:00'),
(5, 19, '05:01:00');

INSERT INTO `lotes` (`IDL`, `Peso`, `Estado`, `Destino`, `tiempoEstimado`, `enAlmacenExterno`, `Empresa`) VALUES
(1, 0, 'noAsignado', 'Cerro Largo', '2023-07-12 21:03:00', 0, 'jk'),
(2, 0, 'noAsignado', 'Cerro Largo', '2023-07-14 21:05:00', 0, 'jk'),
(3, 0, 'noAsignado', 'Treinta y Tres', '2023-05-11 21:03:00', 0, 'jk'),
(4, 0, 'noAsignado', 'Lavalleja', '2023-07-12 21:05:00', 0, 'k'),
(5, 0, 'noAsignado', 'Canelones', '2023-05-13 21:03:00', 0, 'k'),
(6, 0, 'noAsignado', 'Florida', '2023-12-30 21:05:00', 0, 'l'),
(7, 0, 'noAsignado', 'Florida', '2023-05-22 21:03:00', 0, 'jk'),
(8, 0, 'noAsignado', 'Tacuarembó', '2023-05-20 21:05:00', 0, 'jk'),
(9, 0, 'noAsignado', 'Durazno', '2023-08-11 21:03:00', 0, 'jk'),
(10, 0, 'noAsignado', 'Maldonado', '2023-07-12 21:05:00', 0, 'k'),
(11, 0, 'noAsignado', 'Salto', '2023-07-13 21:03:00', 0, 'k'),
(12, 0, 'noAsignado', 'Artigas', '2023-12-30 21:05:00', 0, 'l'),

(13, 0, 'noAsignado', 's', '2023-12-22 21:03:00', 1, 'Crecom'),
(14, 0, 'noAsignado', 'd', '2023-12-30 21:05:00', 1, 'Crecom'),
(15, 0, 'noAsignado', 'd', '2023-12-30 21:05:00', 1, 'Crecom'),
(16, 0, 'noAsignado', 's', '2023-12-22 21:03:00', 1, 'Crecom'),
(17, 0, 'noAsignado', 'd', '2023-12-30 21:05:00', 1, 'Crecom'),
(18, 0, 'noAsignado', 'd', '2023-12-30 21:05:00', 1, 'Crecom'),
(19, 0, 'noAsignado', 'd', '2023-12-30 21:05:00', 1, 'Devoto'),
(20, 0, 'noAsignado', 'Montevideo', '2023-12-02 22:30:00', 1, 'Devoto');

INSERT INTO `va_hacia` (`IDL`, `IDR`, `IDA`) VALUES
(1, 2, 17), 
(3, 2, 18), 
(4, 3, 13), 
(2, 4, 17),
(7, 4, 15), 
(8, 4, 4),
(5, 6, 2), 
(6, 6, 15),
(9, 6, 16);


INSERT INTO `paquetes` (`codigo`, `Peso`, `Estado`, `fRecibo`, `fEntrega`, `Destinatario`, `Destino`, `Departamento`, `Empresa`) VALUES
(1, '6', 'enAlmacenExterno', null, '2023-05-10', 'Maria', 'Melo', 'Cerro Largo','Crecom'),
(2, '4', 'enAlmacenExterno', null, '2023-05-10', 'Bruno', 'Melo av12','Cerro Largo', 'Crecom'),
(3, '10', 'enAlmacenExterno', null, '2024-05-08', 'Agustín', '77', 'Cerro Largo', 'Crecom'),
(4, '6', 'enAlmacenExterno', null, '2024-05-08', 'Jesús', 'Melo av12','Cerro Largo', 'Crecom'),
(5, '34', 'enAlmacenExterno', null, '2024-05-08', 'Tiago', '8','Cerro Largo', 'Crecom'),
(6, '12', 'enAlmacenExterno', null, '2023-12-07', 'Ignacio', 'Melo av122','Cerro Largo', 'Crecom'),
(7, '20', 'enAlmacenExterno', null, '2023-12-08', 'Diago', 'Melo av12','Cerro Largo', 'Crecom'),
(8, '2', 'enAlmacenExterno', null, '2023-12-08', 'Mariano', '8','Cerro Largo', 'Crecom'),
(9, '5', 'enAlmacenExterno', null, '2023-12-07', 'Joaquín', 'Melo av122','Cerro Largo', 'Crecom'),
(10, '7', 'enAlmacenExterno', null, '2023-12-08', 'Diago', 'Melo av12','Cerro Largo','Crecom'),
(11, '2', 'enAlmacenExterno', null, '2023-12-08', 'Mariano', '8','Treinta y Tres', 'Crecom'),
(12, '5', 'enAlmacenExterno', null, '2023-12-07', 'Joaquín', 'Melo av122','Treinta y Tres', 'Crecom'),
(13, '6', 'enAlmacenExterno', null, '2023-12-10', 'Diego', '8','Treinta y Tres', 'Crecom'),
(14, '4', 'enAlmacenExterno', null, '2023-12-01', 'Guillermo', '6','Treinta y Tres', 'Crecom'),
(15, '9', 'enAlmacenExterno', null, '2023-12-08', 'Juan Manuel', '77','Treinta y Tres', 'Crecom'),
(16, '11', 'enAlmacenExterno', null, '2023-12-10', 'Lucas', '8','Lavalleja', 'Crecom'),
(17, '13', 'enAlmacenExterno', null, '2023-12-01', 'Mauricio', '6','Lavalleja', 'Crecom'),
(18, '14', 'enAlmacenExterno', null, '2023-12-08', 'Roberto', '77','Lavalleja', 'Crecom'),
(19, '23', 'enAlmacenExterno', null, '2023-12-08', 'Luis', 'Melo av12', 'Lavalleja','Crecom'),
(20, '19', 'enAlmacenExterno', null, '2023-12-08', 'Alberto', '8','Lavalleja', 'Crecom'),
(21, '18', 'enAlmacenExterno', null, '2023-12-07', 'Javier', 'Melo av122','Canelones', 'Crecom'),
(22, '16', 'enAlmacenExterno', null, '2023-07-07', 'Ezequiel', 'Melo av122', 'Canelones','Crecom'),
(23, '16', 'enAlmacenExterno', null, '2023-07-10', 'Ezequiel', 'Melo av122','Canelones', 'Crecom'),
(24, '6', 'enAlmacenExterno', null, '2023-12-10', 'Maria', '8','Canelones','Crecom'),
(25, '4', 'enAlmacenExterno', null, '2023-12-01', 'Bruno', '6','Canelones', 'Crecom'),
(26, '10', 'enAlmacenExterno', null, '2023-12-08', 'Agustín', '77', 'Florida','Crecom'),
(27, '6', 'enAlmacenExterno', null, '2023-12-08', 'Jesús', 'Melo av12', 'Florida','Crecom'),
(28, '34', 'enAlmacenExterno', null, '2023-12-08', 'Tiago', '8', 'Florida','Crecom'),
(29, '12', 'enAlmacenExterno', null, '2023-12-07', 'Ignacio', 'Melo av122', 'Florida','Crecom'),
(30, '20', 'enAlmacenExterno', null, '2023-12-08', 'Diago', 'Melo av12','Florida', 'Crecom'),
(31, '2', 'enAlmacenExterno', null, '2023-12-08', 'Mariano', '8','Florida', 'Crecom'),
(32, '5', 'enAlmacenExterno', null, '2023-12-07', 'Joaquín', 'Melo av122','Florida', 'Crecom'),
(33, '7', 'enAlmacenExterno', null, '2023-12-08', 'Diago', 'Melo av12', 'Florida','Crecom'),
(34, '2', 'enAlmacenExterno', null, '2023-12-08', 'Mariano', '8','Florida', 'Crecom'),
(35, '5', 'enAlmacenExterno', null, '2023-12-07', 'Joaquín', 'Melo av122', 'Florida','Crecom'),
(36, '6', 'enAlmacenExterno', null, '2023-12-10', 'Diego', '8','Tacuarembó', 'Crecom'),
(37, '4', 'enAlmacenExterno', null, '2023-12-01', 'Guillermo', '6','Tacuarembó', 'Crecom'),
(38, '9', 'enAlmacenExterno', null, '2023-12-08', 'Juan Manuel', '77', 'Tacuarembó','Crecom'),
(39, '11', 'enAlmacenExterno', null, '2023-12-10', 'Lucas', '8', 'Tacuarembó','Crecom'),
(40, '13', 'enAlmacenExterno', null, '2023-12-01', 'Mauricio', '6', 'Tacuarembó','Crecom'),
(41, '14', 'enAlmacenExterno', null, '2023-12-08', 'Roberto', '77','Durazno', 'Crecom'),
(42, '23', 'enAlmacenExterno', null, '2023-12-08', 'Luis', 'Melo av12','Artigas', 'Crecom'),
(43, '19', 'enAlmacenExterno', null, '2023-12-08', 'Alberto', '8','Artigas', 'Crecom'),
(44, '18', 'enAlmacenExterno', null, '2023-12-07', 'Javier', 'Melo av122', 'Artigas','Crecom'),
(45, '16', 'enAlmacenExterno', null, '2024-07-07', 'Ezequiel', 'Melo av122','Salto', 'Crecom'),
(46, '16', 'enAlmacenExterno', null, '2024-07-07', 'Ezequiel', 'Melo av122', 'Salto','Crecom'),
(47, '4', 'enAlmacenExterno', null, '2023-12-01', 'Guillermo', '6','Salto', 'Crecom'),
(48, '9', 'enAlmacenExterno', null, '2023-12-08', 'Juan Manuel', '77','Maldonado', 'Crecom'),
(49, '11', 'enAlmacenExterno', null, '2023-12-10', 'Lucas', '8','Maldonado', 'Crecom'),
(50, '3', 'enAlmacenExterno', null, '2024-07-08', 'Matías', 'Melo Av126','Maldonado', 'Crecom');

INSERT INTO `contiene` (`codigo`, `IDL`) VALUES
(1, 13),
(2, 13),
(3, 13),
(4, 13),
(5, 13),
(6, 13),
(7, 13),
(8, 13),
(9, 13),
(10, 14),
(11, 14),
(12, 14),
(13, 14),
(14, 14),
(15, 14),
(16, 14),
(17, 14),
(18, 14),
(19, 14),
(20, 15),
(21, 15),
(22, 15),
(23, 15),
(24, 15),
(25, 15),
(26, 15),
(27, 15),
(28, 15),
(29, 15),
(30, 16),
(31, 16),
(32, 16),
(33, 16),
(34, 16),
(35, 16),
(36, 16),
(37, 16),
(38, 16),
(39, 16),
(40, 17),
(41, 17),
(42, 17),
(43, 17),
(44, 17),
(45, 17);


 INSERT INTO `lleva` (`IDL`, `Matricula`, `fEntrega`) VALUES
 (13, '6182HNP', null),
 (14, '6182HNP', null),
 (15, '8828FDZ', null),
 (16, '8907YWY', null),
 (17, '7934JJC', null);
 

UPDATE lleva
SET fEntrega = '2024-09-16 19:32:30' 
WHERE IDL = 13;

UPDATE lleva
SET fEntrega = '2024-09-16 19:32:30' 
WHERE IDL = 14;

UPDATE lleva
SET fEntrega = '2023-09-16 19:32:30' 
WHERE IDL = 15;

UPDATE lleva
SET fEntrega = '2024-09-16 19:32:30' 
WHERE IDL = 16;

UPDATE lleva
SET fEntrega = '2024-09-16 19:32:30' 
WHERE IDL = 17;

INSERT INTO `contiene` (`codigo`, `IDL`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 7),
(32, 7),
(33, 7),
(34, 7),
(35, 7),
(36, 8),
(37, 8),
(38, 8),
(39, 8),
(40, 8),
(41, 9);

INSERT INTO `lleva` (`IDL`, `Matricula`, `fEntrega`) VALUES
 (1, '6182HNP', null),
 (2, '6182HNP', null),
 (3, '8828FDZ', null),
 (4, '8907YWY', null),
 (5, '6182HNP', null),
 (6, '6182HNP', null),
 (7, '6182HNP', null),
 (8, '8907YWY', null);


UPDATE lleva
SET fEntrega = '2022-09-16 19:32:30' 
WHERE IDL = 1;

UPDATE lleva
SET fEntrega = '2023-09-16 19:32:30' 
WHERE IDL = 2;

UPDATE lleva
SET fEntrega = '2023-06-16 19:32:30' 
WHERE IDL = 3;

UPDATE lleva
SET fEntrega = '2023-09-16 19:32:30' 
WHERE IDL = 4;

UPDATE lleva
SET fEntrega = '2024-06-16 19:32:30' 
WHERE IDL = 5;

UPDATE lleva
SET fEntrega = '2023-07-16 19:32:30' 
WHERE IDL = 6;

UPDATE lleva
SET fEntrega = '2023-07-16 19:32:30' 
WHERE IDL = 7;

UPDATE vehiculo
SET Disponibilidad = 'enRuta'
WHERE MatriculaV = '6182HNP';

UPDATE vehiculo
SET Disponibilidad = 'enRuta'
WHERE MatriculaV = '8907YWY';

INSERT INTO `transporta` (`codigo`, `MatriculaC`, `fEntrega`) VALUES
(1, '3455VGV', null),
(2, '3455VGV', null),
(3, '3455VGV', null),
(4, '3455VGV', null),
(5, '3455VGV', null),
(6, '1006TKH', null),
(7, '1006TKH', null),
(8, '1006TKH', null),
(9, '1006TKH', null),
(10, '1006TKH', null),
(11, '0916KND', null),
(12, '0916KND', null),
(13, '0916KND', null),
(14, '0916KND', null),
(15, '0916KND', null),
(16, '2722WKS', null),
(17, '2722WKS', null),
(18, '2722WKS', null),
(19, '2722WKS', null),
(20, '2722WKS', null),
(21, '1278VSW', null),
(22, '1278VSW', null),
(23, '1278VSW', null),
(24, '1278VSW', null),
(25, '1278VSW', null),
(26, '1538JMH', null),
(27, '1538JMH', null),
(28, '1538JMH', null),
(29, '1538JMH', null),
(30, '1538JMH', null);

UPDATE transporta
SET fEntrega = '2023-05-16 19:32:30'
WHERE codigo = 1;

UPDATE transporta
SET fEntrega = '2023-05-16 19:32:30'
WHERE codigo = 2;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 3;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 4;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 5;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 6;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 7;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 8;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 9;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 10;
UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 11;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 12;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 13;

UPDATE transporta
SET fEntrega = '2023-05-16 19:32:30'
WHERE codigo = 14;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 15;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 16;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 17;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 18;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 19;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 20;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 21;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 22;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 23;

UPDATE transporta
SET fEntrega = '2024-10-16 19:32:30'
WHERE codigo = 24;

UPDATE transporta
SET fEntrega = '2023-10-16 19:32:30'
WHERE codigo = 25;


INSERT INTO `va` (`MatriculaC`, `idI`) VALUES
('1538JMH', 15),
('5972BSQ', 15),
('3455VGV', 17),
('1006TKH', 17),
('0916KND', 18),
('2518NMZ', 4),
('1278VSW', 2),
('2722WKS', 13);  

INSERT INTO `va_salida` (`MatriculaC`, `FechaSalida`) VALUES
('1538JMH', '2023-09-22 18:01:00'),
('5972BSQ', '2023-09-17 18:30:00');

INSERT INTO `va_llegada` (`MatriculaC`,`FechaLlegada`) VALUES
('5972BSQ', '0088-06-08 08:08:00');

UPDATE paquetes
SET fRecibo = '2023-10-16 19:32:30'
WHERE codigo = 21;

UPDATE paquetes
SET fRecibo = '2024-10-16 19:32:30'
WHERE codigo = 22;

UPDATE paquetes
SET fRecibo = '2023-10-16 19:32:30'
WHERE codigo = 23;

UPDATE paquetes
SET fRecibo = '2024-10-16 19:32:30'
WHERE codigo = 24;

UPDATE paquetes
SET fRecibo = '2023-10-16 19:32:30'
WHERE codigo = 25;


-- Sentencias
-- 1V) Mostrar los paquetes entregados en el mes de mayo del 2023 con destino a la ciudad de Melo 
SELECT paquetes.*
FROM paquetes
JOIN transporta ON paquetes.codigo = transporta.codigo
WHERE YEAR(transporta.fEntrega) = 2023
  AND MONTH(transporta.fEntrega) = 5
  AND paquetes.Destino LIKE '%Melo%'
  AND paquetes.Estado = 'entregado';


-- 2AV) MOSTRAR TODOS LOS ALMACENES Y LOS PAQUETES QUE FUERON ENTREGADOS EN LOS MISMOS DURANTE EL 2023,
-- ORDENARLOS ADEMÁS DE LOS QUE RECIBIERON MAS PAQUETES A LOS QUE RECIBIERON MENOS. 
SELECT a.ubicacion AS Almacen, COUNT(*) AS Cantidad_de_Paquetes
FROM almacen a 
JOIN va_hacia vh ON vh.IDA = a.id
JOIN lotes lo ON lo.IDL = vh.IDL
JOIN lleva l ON l.IDL = lo.IDL
JOIN contiene c ON lo.IDL = c.IDL
JOIN paquetes p ON c.codigo = p.codigo
JOIN transporta t ON p.codigo = t.codigo
WHERE p.Estado = 'entregado' AND t.fEntrega IS NOT NULL AND year(t.fEntrega) = 2023
GROUP BY a.ubicacion
ORDER BY COUNT(*) DESC;

-- 2BV) MOSTRAR TODOS LOS ALMACENES Y LA CANTIDAD DE LOTES QUE TIENEN,
-- ORDENARLOS ADEMÁS DE LOS QUE TIENEN MÁS LOTES A LOS QUE MENOS TIENEN. 
SELECT a.ubicacion AS Almacen, COUNT(*) AS Cantidad_de_Lotes
FROM almacen a 
JOIN va_hacia vh ON vh.IDA = a.id
JOIN lotes lo ON lo.IDL = vh.IDL
JOIN lleva l ON l.IDL = lo.IDL
WHERE lo.Estado = 'entregado' AND l.fEntrega IS NOT NULL
GROUP BY a.ubicacion
ORDER BY COUNT(*) DESC;

-- 3V) Mostrar todos los camiones registrados y qué tarea se encuentran realizando en este momento
SELECT MatriculaV, Estado, Disponibilidad
FROM vehiculo
JOIN camion ON MatriculaV = Matricula;


-- 4V) Mostrar todos los camiones que visitaron durante el mes de junio un almacén dado X
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
WHERE Estado = 'enCentral' AND codigo NOT IN (SELECT codigo FROM contiene join lotes on contiene.IDL = lotes.IDL where enAlmacenExterno = 0);


-- 8AV) Mostrar matrícula de los camiones que se encuentran fuera de servicio
SELECT Matricula
FROM camion
JOIN vehiculo on camion.Matricula = vehiculo.MatriculaV 
WHERE Estado = 'malEstado';

-- 8BV) Mostrar matrícula de las camionetas que se encuentran fuera de servicio
SELECT MatriculaC
FROM camioneta
JOIN vehiculo on camioneta.MatriculaC = vehiculo.MatriculaV 
WHERE Estado = 'malEstado';

-- 9AV)Mostrar todos los camiones que no tienen un conductor asignado y su estado operativo
SELECT v.MatriculaV, v.Estado 
FROM vehiculo v
JOIN camion cam on cam.Matricula= v.MatriculaV 
LEFT JOIN conduce c ON cam.Matricula = c.MatriculaV
WHERE c.MatriculaV IS NULL;

-- 9BV)Mostrar todos las camionetas que no tienen un conductor asignado y su estado operativo
SELECT v.MatriculaV, v.Estado 
FROM vehiculo v
JOIN camioneta cam on cam.MatriculaC= v.MatriculaV 
LEFT JOIN conduce c ON cam.MatriculaC = c.MatriculaV
WHERE c.MatriculaV IS NULL;


-- 10V)Mostrar todos los almacenes que se encuentran en un recorrido dado 
SELECT a.*
FROM almacen a
JOIN esta e ON a.id = e.IDA
WHERE e.IDR = 6;

-- 11V) MOSTRAR LA LISTA DE LOS PAQUETES Y SU ESTADO, QUE SE ENCUENTREN EN UN ALMACÉN ESPECÍFICO. 
SELECT paquetes.*
FROM paquetes
INNER JOIN contiene ON paquetes.codigo = contiene.codigo
WHERE contiene.IDL IN (
    SELECT lotes.IDL
    FROM lotes
    INNER JOIN contiene ON lotes.IDL = contiene.IDL
    INNER JOIN va_hacia ON va_hacia.IDL = lotes.IDL
    WHERE va_hacia.IDA = 15 AND lotes.Estado = 'entregado'
) AND (Estado = 'loteDesarmado' OR Estado = 'camionetaAsignada');


-- 12V) MOSTRAR LOS LOTES QUE LLEGARON A UN ALMACÉN ESPECÍFICO DURANTE EL MES DE AGOSTO DEL 2023. 
SELECT lotes.*, lotes.IDL
FROM lotes
JOIN lleva ON lleva.IDL = lotes.IDL
WHERE lotes.IDL IN (
    SELECT va_hacia.IDL
    FROM va_hacia
    WHERE va_hacia.IDA = 15
)
AND YEAR(lleva.fEntrega) = 2023
AND MONTH(lleva.fEntrega) = 7;



-- 13V) MUESTRA LA INFORMACIÓN DE LOS CAMIONES QUE ACTUALMENTE SE ENCUENTREN EN RUTA, JUNTO CON SU CARGA, DESTINO Y HORARIO 
-- ESTIMADO DE LLEGADA.
SELECT v.MatriculaV, lotes.IDL, lotes.Peso, lotes.Destino, IDA, lotes.tiempoEstimado, v.Disponibilidad
FROM vehiculo v
JOIN lleva ON v.MatriculaV = lleva.Matricula
JOIN lotes on lotes.IDL = lleva.IDL 
JOIN va_hacia ON va_hacia.IDL = lotes.IDL
WHERE v.Disponibilidad = 'enRuta' AND lotes.Estado='asignado';



-- 14V) MUESTRE INFORMACIÓN DE UN PAQUETE ESPECÍFICO QUE YA HAYA SIDO ENTREGADO. ESTO IMPLICA, IDENTIFICADOR DE: LOTE, RECORRIDO, CAMIÓN 
-- QUE LO TRANSPORTÓ, ALMACÉN DONDE SE ALMACENÓ, CAMIONETA QUE HIZO EL ÚLTIMO TRAMO Y DIRECCIÓN FINAL.
SELECT p.codigo AS 'ID del Paquete', 
       contiene.IDL AS 'ID del Lote', 
       vh.IDR AS 'Recorrido', 
       lleva.Matricula AS 'Matrícula del Camión', 
       vh.IDA AS 'Almacén', 
       t.MatriculaC AS 'Matrícula de la Camioneta', 
       p.Destino AS 'Dirección'
FROM paquetes p
JOIN contiene ON contiene.codigo = p.codigo
JOIN lleva ON lleva.IDL = contiene.IDL
JOIN va_hacia vh ON lleva.IDL = vh.IDL
JOIN transporta t ON p.codigo = t.codigo
WHERE p.Estado = 'entregado'
  AND p.codigo = 8;


-- 15V) DADO UN CAMIÓN, MOSTRAR LOS RECORRIDOS REALIZADOS Y LOS ALMACENES VISITADOS EN EL ÚLTIMO MES. H
SELECT DISTINCT l.IDL, vh.IDR AS Recorrido, vh.IDA AS AlmacenVisitado
FROM camion c
JOIN lleva l ON l.Matricula = c.Matricula
JOIN va_hacia vh ON vh.IDL = l.IDL
WHERE c.Matricula = '6182HNP'
AND l.fEntrega >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH);



-- 16V) MOSTRAR LOS PAQUETES ENTREGADOS EN EL MES DE JULIO DE 2023, ORDENADOS POR FECHA DE ENTREGA DE FORMA DESCENDENTE. 
SELECT *
FROM paquetes
WHERE Estado = 'entregado'
    AND MONTH(fEntrega) = 7
    AND YEAR(fEntrega) = 2023
ORDER BY fEntrega DESC;



-- 17V) MOSTRAR LOS CAMIONES QUE NO HICIERON NINGÚN RECORRIDO ENTRE EL 10 Y 17 DE JULIO DE 2024.
SELECT DISTINCT c.Matricula
FROM camion c
JOIN lleva ON lleva.Matricula = c.Matricula
JOIN lotes ON lotes.IDL = lleva.IDL
JOIN va_hacia vh ON vh.IDL = lotes.IDL
WHERE c.Matricula NOT IN (
    SELECT DISTINCT c.Matricula
    FROM camion c
    JOIN lleva l ON l.Matricula = c.Matricula
    JOIN lotes lo ON lo.IDL = l.IDL
    WHERE lo.tiempoEstimado >= '2023-07-10 00:00:00' AND lo.tiempoEstimado <= '2023-07-17 23:59:59'
);


-- 18V) MOSTRAR LA LISTA DE ALMACENES QUE PERTENECEN A UN RECORRIDO DADO Y SU DISTANCIA CON EL CENTRO DE DISTRIBUCIÓN.
SELECT esta.IDA, esta.Distancia AS Distancia_Central
FROM esta
where IDR = 6;



-- 19V) MUESTRA LOS RECORRIDOS UTILIZADOS EN MAYO DEL 2023, ORDENADOS POR LA CANTIDAD DE CAMIONES QUE LO RECORRIERON DE MÁS A MENOS.
SELECT va_hacia.IDR, COUNT(DISTINCT lleva.Matricula) AS CantidadCamiones
FROM va_hacia
JOIN lleva ON va_hacia.IDL = lleva.IDL
JOIN lotes ON lotes.IDL = va_hacia.IDL 
WHERE YEAR(lotes.tiempoEstimado) = 2023 AND MONTH(lotes.tiempoEstimado) = 05 
GROUP BY va_hacia.IDR
ORDER BY CantidadCamiones DESC;


-- 20) MOSTRAR MATRÍCULA DEL CAMIÓN E IDENTIFICADOR DE ALMACÉN/ES Y RECORRIDO, DE LOS CAMIONES QUE EN SEPTIEMBRE DEL 2023 VIAJARON CON
-- MENOS DEL 100% DE SU CARGA.
SELECT l.Matricula, vh.IDA, vh.IDR, l.IDL
FROM camion c
JOIN lleva l ON c.Matricula = l.Matricula
JOIN va_hacia vh ON vh.IDL = l.IDL
JOIN lotes lo ON lo.IDL = vh.IDL
WHERE 
	MONTH(l.fEntrega) = 9 
    AND YEAR(l.fEntrega) = 2023
    AND lo.Estado = 'entregado'
    AND (c.Peso + (SELECT SUM(lotes.Peso) FROM lotes JOIN lleva ON lotes.IDL = lleva.IDL WHERE lleva.Matricula = l.Matricula)) < 21000;



-- vistas
-- view que muestra las personas que noestan en un camionero ni en un personal
CREATE VIEW vwpersonas AS
SELECT * 
FROM personas 
WHERE CI NOT IN (SELECT CIC FROM camionero) AND CI NOT IN (SELECT CIP FROM personal);

-- view que muestra los camioneros que no tienen un camion asignado
CREATE VIEW vwcamionero AS
SELECT CIC 
FROM camionero 
WHERE CIC NOT IN (SELECT CIC FROM conduce);

-- view que muestra los trabajadores que no tienen un almacen asignado
CREATE VIEW vwpersonal AS
SELECT CIP 
FROM personal 
WHERE CIP NOT IN (SELECT CIP FROM trabaja);

-- view que muestra los IDA de trabaja
CREATE VIEW vwidtrabaja AS
SELECT IDA 
FROM trabaja;

-- view que muestra los almacenes que no estan ni en un almacenInterno ni en un almacenExterno
CREATE VIEW vwalmacen AS
SELECT * 
FROM almacen 
WHERE id NOT IN (SELECT idE FROM almacenexterno) AND id NOT IN (SELECT idI FROM almaceninterno);

-- view que muestra las matriculas de conduce
CREATE VIEW vwmatriculaconduce AS
SELECT MatriculaV 
FROM conduce;

-- view que muestra los vehiculos que no estan en un camion ni en una camioneta
CREATE VIEW vwvehiculo AS
SELECT * 
FROM vehiculo 
WHERE MatriculaV NOT IN (SELECT MatriculaC FROM camioneta) AND MatriculaV NOT IN (SELECT Matricula FROM camion);

-- view que muestra los vehiculos con buenEstado y que están disponibles
CREATE VIEW vwbuenestadovehiculo AS
SELECT MatriculaV 
FROM vehiculo 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'disponible';

-- view que muestra los camiones con buenEstado y que están disponibles
CREATE VIEW vwbuenestadocamion AS
SELECT Matricula
FROM camion join vehiculo on Matricula = MatriculaV 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'disponible' AND camion.Matricula IN (SELECT MatriculaV FROM conduce);

-- view que muestra los camiones con buenEstado y que están en ruta
CREATE VIEW vwcamionenruta AS
SELECT Matricula
FROM camion join vehiculo on Matricula = MatriculaV 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'enRuta' AND camion.Matricula IN (SELECT MatriculaV FROM conduce);

-- view que muestra las camionetas con buenEstado y que están disponibles
CREATE VIEW vwbuenestadocamioneta AS
SELECT MatriculaC
FROM camioneta join vehiculo on MatriculaC = MatriculaV 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'disponible';

-- view que muestra las camionetas con buenEstado y que están en ruta
CREATE VIEW vwcamionetaenruta AS
SELECT MatriculaC
FROM camioneta join vehiculo on MatriculaC = MatriculaV 
WHERE Estado = 'buenEstado' AND Disponibilidad = 'enRuta';

-- view que muestra los camiones que estan en buen estado y la fEntrega = null
CREATE VIEW vwlleva AS
SELECT l.*
FROM lleva l JOIN vehiculo v ON l.Matricula = v.MatriculaV
WHERE v.Estado = 'buenEstado' AND v.Disponibilidad = 'disponible' AND l.fEntrega IS NULL;


-- view que te muestra todos los camiones que no llevan un lote externo
CREATE VIEW vwlleva_interno AS
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
CREATE VIEW vwlleva_externo AS
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
AND vehiculo.Estado = 'buenEstado' AND vehiculo.Disponibilidad = 'disponible' AND camion.Matricula IN (SELECT MatriculaV FROM conduce);

-- view que te muestra todos los camiones que no llevan un lote interno
CREATE VIEW vwcamion_externo AS
SELECT *
FROM camion join vehiculo on camion.Matricula = vehiculo.MatriculaV
WHERE camion.Matricula not in (select Matricula FROM lleva join lotes on lleva.IDL = lotes.IDL where enAlmacenExterno=0 and lleva.fEntrega IS NULL) 
AND vehiculo.Estado = 'buenEstado' AND vehiculo.Disponibilidad = 'disponible' AND camion.Matricula IN (SELECT MatriculaV FROM conduce);


-- view que muestra los lotes de QuickCarry
CREATE VIEW vwlotesinterno AS
SELECT * 
FROM lotes 
WHERE enAlmacenExterno = 0;

-- view que muestra los lotes sin asignar y que son de QuickCarry
CREATE VIEW vwlotesnoasignados AS
SELECT *
FROM lotes 
WHERE Estado = 'noAsignado' AND enAlmacenExterno = 0;

-- view que muestra los lotes sin asignar y que son de QuickCarry
CREATE VIEW vwlotesnoasignadosarecorridos AS
SELECT *
FROM lotes
WHERE Estado = 'noAsignado' AND enAlmacenExterno = 0 and lotes.IDL not in (SELECT IDL FROM va_hacia);

-- view que muestra los lotes de otros almacenes
CREATE VIEW vwlotesexterno AS
SELECT * 
FROM lotes 
WHERE enAlmacenExterno = 1;

-- view que muestra los lotes sin asignar y que son de otra empresa
CREATE VIEW vwlotesexternosnoasignados AS
SELECT *
FROM lotes 
WHERE Estado = 'noAsignado' AND enAlmacenExterno = 1;

-- view que muestra los lotes sin asignar y que son de otra empresa
CREATE VIEW vwlotesexternosnoasignadosencontiene AS
SELECT *
FROM lotes 
WHERE Estado = 'noAsignado' AND enAlmacenExterno = 1 AND IDL IN (SELECT IDL from contiene);

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwlotesentregados AS
SELECT * 
FROM lotes 
WHERE Estado = 'entregado';

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwlotesnoentregados AS
SELECT * 
FROM lotes 
WHERE Estado != 'entregado';

-- view que muestra los lotes sin asignar y que son de otra empresa
 CREATE VIEW vwrecorridosnoasignados AS
 SELECT *
 FROM recorrido 
 WHERE IDR not in (SELECT IDR FROM va_hacia);


-- view que muestra los paquetes en central o en lotes sin asignar
CREATE VIEW vwpaquetesenlotes AS 
SELECT paquetes.* 
FROM paquetes 
LEFT JOIN contiene ON paquetes.codigo = contiene.codigo
LEFT JOIN lotes ON lotes.IDL = contiene.IDL
WHERE 
    paquetes.Estado = 'enCentral' 
    OR paquetes.Estado = 'loteAsignado' 
    OR (lotes.Estado = 'noAsignado' AND lotes.enAlmacenExterno = 0);


-- view que muestra los paquetes en central
CREATE VIEW vwpaquetesencentral AS
SELECT * 
FROM paquetes 
WHERE Estado = 'enCentral';

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwpaquetesenalmacenexterno AS
SELECT * 
FROM paquetes 
WHERE Estado = 'enAlmacenExterno';

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwpaquetesentregados AS
SELECT * 
FROM paquetes 
WHERE Estado = 'entregado';

-- view que muestra los paquetes en almacenes externos
CREATE VIEW vwpaquetesnoentregados AS
SELECT * 
FROM paquetes 
WHERE Estado != 'entregado';


-- view que muestra los paquetes que no se han entregado
CREATE VIEW vwpaquetescamioneta AS
SELECT transporta.* 
FROM transporta join paquetes on transporta.codigo = paquetes.codigo 
where paquetes.Estado='camionetaAsignada' AND transporta.fEntrega IS NULL;

-- view que muestra los lotes sin asignar y que son de QuickCarry
CREATE VIEW vwpaquetescontiene AS
SELECT codigo, contiene.IDL
FROM contiene join lotes on contiene.IDL = lotes.IDL
WHERE lotes.Estado = 'noAsignado' AND lotes.enAlmacenExterno = 0;

-- view que muestra los paquetes que no se han entregado
CREATE VIEW vwpaquetecamioneta AS
SELECT * 
FROM transporta 
where fEntrega is null;