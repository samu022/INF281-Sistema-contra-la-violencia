
use bdcontraviolencia;
INSERT INTO `persona` (`ci`, `nombre`, `apePaterno`, `apeMaterno`, `fechaNaci`, `sexo`, `direccion`, `estado_civil`, `profesion`) VALUES
(10001, 'Pedro', 'García', 'Lopez', '1985-05-20', 'Masculino', 'Calle 1 de Mayo #123', 'Casado', 'Ingeniero Civil'),
(10002, 'María', 'Rodríguez', 'Sánchez', '1990-09-15', 'Femenino', 'Avenida Murillo #456', 'Soltera', 'Médica'),
(10003, 'Javier', 'Pérez', 'Martínez', '1988-03-10', 'Masculino', 'Calle Sagárnaga #789', 'Soltero', 'Abogado'),
(10004, 'Luis', 'Fernández', 'Gutierrez', '1980-12-18', 'Masculino', 'Calle Illampu #567', 'Divorciado', 'Profesor'),
(10005, 'Laura', 'Chávez', 'Vargas', '1995-07-02', 'Femenino', 'Avenida Camacho #321', 'Casada', 'Contadora'),
(10006, 'Sofía', 'Morales', 'García', '1992-04-30', 'Femenino', 'Avenida 16 de Julio #890', 'Soltera', 'Ingeniera de Sistemas'),
(10007, 'Isabel', 'Gómez', 'Fernández', '1990-11-12', 'Femenino', 'Calle Bolívar #234', 'Soltera', 'Ingeniera de Software'),
(10008, 'Carolina', 'Pérez', 'López', '1988-07-05', 'Femenino', 'Avenida Sucre #789', 'Casada', 'Médica'),
(10009, 'Luis', 'Mendoza', 'Vargas', '1993-06-25', 'Masculino', 'Calle Murillo #789', 'Soltero', 'Ingeniero Electrónico'),
(10010, 'Ana', 'Fernández', 'Gómez', '1995-03-15', 'Femenino', 'Avenida Illimani #456', 'Soltera', 'Psicóloga');



INSERT INTO `administrador` (`ci`, `nombre_usuario`, `contrasenia`, `correo`, `privilegios`) VALUES
(10001, 'pedro', '123456', 'pedro@gmail.com', 'escritura'),
(10002, 'maria', '123456', 'maria@gmail.com', 'escritura');

INSERT INTO `usuario` (`ci_usuario`, `nombre_usuario`, `contrasenia`, `correo`) VALUES
(10007, 'isabel', '123456', 'isabel@gmail.com'),
(10008, 'carolina', '123456', 'carolina@gmail.com');

INSERT INTO `geolocalizacion` (`codGeo`, `latitud`, `longitud`) VALUES
(1, '-16.5000', '-68.1500'),
(2, '-16.5200', '-68.1193'),
(3, '-16.5083', '-68.1242'),
(4, '-16.5187', '-68.1369'),
(5, '-16.5005', '-68.1217');


INSERT INTO `agresor` (`ci`, `descripcion`) VALUES
(10003, 'Localizado'),
(10004, 'En busqueda');

INSERT INTO `alerta` (`codAlerta`, `estado`, `fecha`, `ci_usuario`, `codGeo`)
VALUES
  (1, 'Activa', '06-09-2023', 10007, 1),
  (2, 'Inactiva', '06-08-2023', 10008, 2),
  (3, 'Activa', '07-10-2023', 10007, 3),
  (4, 'Inactiva', '14-08-2023', 10007, 4),
  (5, 'Activa', '11-10-2023', 10008, 5);

INSERT INTO `centro_local` (`codCentro`, `nombre`, `telefono`, `ubicacion`, `ci`) VALUES
(1, 'Centro de Apoyo a la Mujer', '123-4567', 'Calle 1, Zona Norte, La Paz', 10002),
(2, 'Centro de Prevención de la Violencia', '234-5678', 'Avenida 2, Zona Sur, La Paz', 10001),
(3, 'Centro de Ayuda a Víctimas de Violencia', '345-6789', 'Calle 3, Zona Centro, La Paz', 10002),
(4, 'Centro Comunitario contra la Violencia', '456-7890', 'Avenida 4, Zona Este, La Paz', 10001);


INSERT INTO `contacto_emergencia` (`ci_contacto`, `parentesco`, `telefono`) VALUES
(10009, 'Padre', '591-75749393'),
(10010, 'Madre', '591-73446291');

INSERT INTO `denuncia` (`codDenuncia`, `tipo`, `descripcion`, `testigo`, `seguimiento`, `fecha`, `codGeo`)
VALUES
  (1, 'Violencia Doméstica', 'Agresión física', 'Ana Pérez', 'En proceso', '07-10-2023', 1),
  (2, 'Acoso Sexual', 'Acoso en el trabajo', 'Luisa Rodríguez', 'En investigación', '06-12-2023', 2),
  (3, 'Violencia de Género', 'Amenazas verbales', 'María García', 'Cerrada', '06-01-2023', 3),
  (4, 'Violencia Doméstica', 'Violencia psicológica', 'Carlos López', 'En proceso', '12-01-2023', 4),
  (5, 'Acoso Sexual', 'Acoso callejero', 'Pedro Martínez', 'En proceso', '18-02-2023', 5);


INSERT INTO `evaluacion_riesgo` (`codFormulario`, `url_cuestionario`, `consejo`, `ci`) VALUES
(1, 'https://forms.gle/ps8d58fb1i3jg6Kn9', 'Es mejor prevenir', 10002),
(2, 'https://forms.gle/iUH5exDGVoR5huoMA', 'Es mejor ver señales', 10002);


INSERT INTO `evento` (`codEvento`, `tipo`, `fecha`, `titulo`, `duracion`, `ci`) VALUES
(1, 'Seminario', '2023-09-09', 'Seminario sobre Violencia de Género', '2 horas', 10001),
(2, 'Charla', '2023-09-10', 'Charla de Prevención de Abuso', '3 horas', 10001);


INSERT INTO `prueba` (`codPrueba`, `tipo`, `descripcion`)
VALUES
  (1, 'Fotos', 'Fotos de lesiones'),
  (2, 'Grabación', 'Grabación de audio'),
  (3, 'Mensajes', 'Mensajes de amenazas'),
  (4, 'Testigo', 'Declaración de testigo'),
  (5, 'Certificado Médico', 'Certificado médico');

INSERT INTO incidente_prueba (codDenuncia, codPrueba)
VALUES
  (1, 1),
  (2, 2),
  (3, 3),
  (4, 4),
  (5, 5);


INSERT INTO `informacion_educativa` (`codInformacion`, `rutaDirectorio`, `tipo`, `ci`) VALUES
(1, 'https://youtu.be/YeVZNBHNO4I', 'Video Informativo', 10001),
(2, 'https://youtu.be/nFUBZXXjr3A', 'Video Informativo', 10001);

INSERT INTO `ley_normativa` (`codLey`, `nombre`, `fecha_promulgacion`, `tematica`, `informacion`, `ci`) VALUES
(1, 'Ley 348', '2013-03-09', 'Ley Integral para Garantizar a las Mujeres una Vida Libre de Violencia', 'https://bolivia.unfpa.org/sites/default/files/pub-pdf/Ley_348_0_1.pdf', 10001),
(2, 'Ley 243', '2012-07-20', 'Ley contra el Acoso y la Violencia Política hacia las Mujeres', 'https://www.ilo.org/dyn/natlex/docs/ELECTRONIC/90299/104007/F226460565/BOL90299.pdf', 10002);

INSERT INTO `llena` (`ci_usuario`, `codFormulario`)
VALUES
  (10007, 1),
  (10008, 2);


INSERT INTO mensaje (`codMensaje`, `fechaMesaje`, `horaMensaje`, `contenidoMensaje`, `ci_usuario`)
VALUES
  (1, '06-09-2023', '10:15 AM', 'Hola, ¿cómo estás?', 10007),
  (2, '06-09-2023', '11:30 AM', 'Estoy bien, gracias. ¿Y tú?', 10008),
  (3, '06-09-2023', '12:45 PM', 'Todo va bien por aquí. Nos vemos luego.', 10007);




INSERT INTO `realiza` (`ci_usuario`, `codDenuncia`, `ci`, `anonimo`)
VALUES
  (10007, 1, 10003, 'No'),
  (10007, 2, 10003, 'Sí'),
  (10007, 3, 10004, 'No'),
  (10008, 4, 10004, 'No'),
  (10008, 5, 10003, 'Sí');
INSERT INTO `recibe` (`codMensaje`, `ci_usuario`)
VALUES
  (1, 10008),
  (2, 10007),
  (3, 10008);

INSERT INTO `victima` (`ci`, `relacion_perpetrador`, `codDenuncia`)
VALUES
  (10002, 'Cónyuge', 1),
  (10004, 'Compañero de trabajo', 2),
  (10005, 'Ex pareja', 3),
  (10006, 'Padre', 4),
  (10007, 'Desconocido', 5);


INSERT INTO `tiene` (`ci_contacto`, `ci_usuario`)
VALUES
  (10009, 10007),
  (10010, 10008);








