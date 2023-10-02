
use bdcontraviolencia;

INSERT INTO `persona` (`ci`, `nombre`, `apePaterno`, `apeMaterno`, `fechaNaci`, `sexo`, `direccion`, `estado_civil`, `profesion`, `telefono`) VALUES
(10001, 'Pedro', 'García', 'Lopez', '1985-05-20', 'Masculino', 'Calle 1 de Mayo #123', 'Casado', 'Ingeniero Civil', '+591 75749393'),
(10002, 'María', 'Rodríguez', 'Sánchez', '1990-09-15', 'Femenino', 'Avenida Murillo #456', 'Soltera', 'Médica', '+591 73446291'),
(10003, 'Javier', 'Pérez', 'Martínez', '1988-03-10', 'Masculino', 'Calle Sagárnaga #789', 'Soltero', 'Abogado', '+591 75749393'),
(10004, 'Luis', 'Fernández', 'Gutierrez', '1980-12-18', 'Masculino', 'Calle Illampu #567', 'Divorciado', 'Profesor', '+591 75749393'),
(10005, 'Laura', 'Chávez', 'Vargas', '1995-07-02', 'Femenino', 'Avenida Camacho #321', 'Casada', 'Contadora', '+591 75749393'),
(10006, 'Sofía', 'Morales', 'García', '1992-04-30', 'Femenino', 'Avenida 16 de Julio #890', 'Soltera', 'Ingeniera de Sistemas', '+591 75749393'),
(10007, 'Isabel', 'Gómez', 'Fernández', '1990-11-12', 'Femenino', 'Calle Bolívar #234', 'Soltera', 'Ingeniera de Software', '+591 75749393'),
(10008, 'Carolina', 'Pérez', 'López', '1988-07-05', 'Femenino', 'Avenida Sucre #789', 'Casada', 'Médica', '+591 75749393'),
(10009, 'Luis', 'Mendoza', 'Vargas', '1993-06-25', 'Masculino', 'Calle Murillo #789', 'Soltero', 'Ingeniero Electrónico', '+591 75749393'),
(10010, 'Ana', 'Fernández', 'Gómez', '1995-03-15', 'Femenino', 'Avenida Illimani #456', 'Soltera', 'Psicóloga', '+591 75749393');



INSERT INTO `administrador` (`ci`, `nombre_usuario`, `contrasenia`, `correo`) VALUES
(10001, 'pedro', '482c811da5d5b4bc6d497ffa98491e38', 'pedro@gmail.com'),
(10002, 'maria', '482c811da5d5b4bc6d497ffa98491e38', 'maria@gmail.com');

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(1, 'denuncia'),
(2, 'centrolocal'),
(3, 'leynormativa'),
(4, 'evento'),
(5, 'informacioneducativa'),
(6, 'administrador'),
(7, 'tablausuarios'),
(8, 'agresor'),
(9, 'geolocalizacion'),
(10, 'prueba'),
(11, 'victima');
INSERT INTO `tiene_rol` (`ci`, `idRol`) VALUES
(1231234, '2'),
(1231234, '3'),
(1231234, '4'),
(1231234, '5'),
(6, '1231234'),
(1, '1231234'),
(1231234, '1'),
(1231234, '11'),
(1231234, '6'),
(35235345, '4'),
(35235345, '5'),
(35235345, '8'),
(35235345, '9'),
(832572567, '5'),
(832572567, '6'),
(832572567, '8'),
(10001, '1'),
(10001, '3'),
(10001, '5'),
(10001, '6'),
(10001, '7'),
(10001, '8'),
(10001, '9'),
(10001, '10'),
(10001, '11');

INSERT INTO `usuario` (`ci_usuario`, `nombre_usuario`, `contrasenia`, `correo`) VALUES
(10007, 'isabel', '482c811da5d5b4bc6d497ffa98491e38', 'isabel@gmail.com'),
(10008, 'carolina', '482c811da5d5b4bc6d497ffa98491e38', 'carolina@gmail.com');

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

INSERT INTO `centro_local` (`codCentro`, `nombre`, `telefono`, `ubicacion`, `archivo`, `ci`) VALUES
(1, 'Centro de Apoyo a la Mujer', '123-4567', 'Calle 1, Zona Norte, La Paz', 'imagen1.jpg',10002),
(2, 'Centro de Prevención de la Violencia', '234-5678', 'Avenida 2, Zona Sur, La Paz','imagen2.jpg', 10001),
(3, 'Centro de Ayuda a Víctimas de Violencia', '345-6789', 'Calle 3, Zona Centro, La Paz','imagen3.jpg' , 10002),
(4, 'Centro Comunitario contra la Violencia', '456-7890', 'Avenida 4, Zona Este, La Paz', 'imagen4.jpg', 10001);


INSERT INTO `contacto_emergencia` (`ci_contacto`, `telefono`) VALUES
(10009,  '591-75749393'),
(10010,  '591-73446291');

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


INSERT INTO `evento` (`codEvento`, `tipo`, `fecha`, `titulo`, `descripcion`, `tipoViolencia`, `modalidad`, `horaInicio`, `horaFinal`, `detalleEvento`, `expositor`, `fechaSubida`, `rutaDirectorio`, `ci`) VALUES
(1, 'Seminario', '2023-09-09', 'Seminario sobre Violencia de Género', 'Este seminario nos informa sobre la violencia de genero esto con el fin de prevenirlo', 'Violencia Fisica','Presencial', '09:00 AM', '11:00 AM', 'Paraninfo UMSA', 'Pedro Mamani', '2023-09-08', 'imagen1.jpg', 10001),
(2, 'Charla', '2023-09-10', 'Charla de Prevención de Abuso', 'Esta charla es para la prevenciond del abuso', 'Violencia de genero', 'Virtual', '15:00 PM', '18:00 PM', 'https://meet.google.com/mpk-hmxx-tah?hs=187&authuser=0&ijlm=1694969969410&adhoc=1', 'Maria de los Angeles', '2023-09-08', 'imagen2.png', 10001);



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


INSERT INTO `informacion_educativa` (`codInformacion`, `titulo`, `descripcion`, `tipoViolencia`, `rutaDirectorio`, `tipo`, `fechaSubida`, `ci`) VALUES
(1, 'Post informativo para prevenir la violencia', 'Has oido o visto una persona que sufre violencia ayudalo informando sobre el mismo', 'Violencia de genero', 'imagen1.png', 'Imagen', '2023-09-15', 10001),
(2, 'No toleres mas la violencia!', 'Informate sobre los tipos de violencia que existen en el documento veras que no solo es la violencia fisica hay mas tipos de violencia como violencia psicologica entre otros', 'Violencia Fisica', 'afiche1.pdf', 'PDF', '2023-09-16', 10001);


INSERT INTO `ley_normativa` (`codLey`, `nombre`, `fecha_promulgacion`, `tematica`, `informacion`, `ci`) VALUES
(1, 'Ley 348', '2013-03-09', 'Ley Integral para Garantizar a las Mujeres una Vida Libre de Violencia', 'https://bolivia.unfpa.org/sites/default/files/pub-pdf/Ley_348_0_1.pdf', 10001),
(2, 'Ley 243', '2012-07-20', 'Ley contra el Acoso y la Violencia Política hacia las Mujeres', 'https://www.ilo.org/dyn/natlex/docs/ELECTRONIC/90299/104007/F226460565/BOL90299.pdf', 10002);

INSERT INTO `llena` (`ci_usuario`, `codFormulario`)
VALUES
  (10007, 1),
  (10008, 2);


INSERT INTO mensaje (`codMensaje`, `fechaMensaje`, `horaMensaje`, `contenidoMensaje`, `ci_usuario`)
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


INSERT INTO `victima` (`ci`, `relacion_perpetrador`, `codDenuncia`)
VALUES
  (10002, 'Cónyuge', 1),
  (10004, 'Compañero de trabajo', 2),
  (10005, 'Ex pareja', 3),
  (10006, 'Padre', 4),
  (10007, 'Desconocido', 5);


INSERT INTO `tiene` (`ci_contacto`,`parentesco`, `ci_usuario`)
VALUES
  (10009, 'Padre',10007),
  (10010, 'Madre',10008);





INSERT INTO `ley_normativa` (`codLey`, `nombre`, `fecha_promulgacion`, `tematica`, `informacion`, `ci`) VALUES
(3, 'Ley 263', '2012-07-31', 'Ley Integral contra la trata y tráfico de
personas', 'https://tsj.bo/wp-content/uploads/2019/11/ley-263-integral-contra-la-trata-y-tra%CC%81fico-de-personas.pdf', 10001),
(4, 'Ley 1443', '2022-07-04', 'Ley de protección a las víctimas de feminicidio, infanticidio y violación de infante, niña, niño o adolescente', 'https://www.ilo.org/dyn/natlex/docs/ELECTRONIC/90299/104007/F226460565/BOL90299.pdf', 10002),
(5, 'Ley 2033', '1999-10-29', 'Ley de proteccion a las victimas de delitos contra la libertad sexual', 'http://www.silep.gob.bo/norma/3936/ley_actualizada', 10001);

INSERT INTO `centro_local` (`codCentro`, `nombre`, `telefono`, `ubicacion`, `archivo`, `ci`) VALUES
(5, 'Fuerza Especial de Lucha Contra la Violencia', '2285495', 'Av. Sucre Nro 1122, Zona Centro, La Paz', 'imagen5.jpg', 10001),
(6, 'Fuerza Especial de Lucha Contra la Violencia', '800142031', 'Av. Fuerza Aerea Esq. Km 7 Nro 100, El Alto', 'imagen6.jpg',10002),
(7, 'Fuerza de Lucha Contra el Crimen', '2285776', 'Av. Sucre esquina Bolivar Nro 1122, Zona Centro,La Paz','imagen7.jpg' ,10001);

INSERT INTO `informacion_educativa` (`codInformacion`, `titulo`, `descripcion`, `tipoViolencia`, `rutaDirectorio`, `tipo`, `fechaSubida`, `ci`) VALUES
(3, 'Ley para garantizar a las mujeres una vida libre de violencia nro 348', '43 preguntas y respuestas acerca de la ley en favor de los derechos humanos', 'Todas', 'cartilla.pdf', 'PDF', '2023-09-17', 10002),
(4, 'Circulo de la violencia', 'Patrón de comportamiento que a menudo se repite en relaciones de pareja caracterizadas por la violencia', 'Violencia de genero', 'imagen2.png', 'Imagen', '2023-09-18', 10002),
(5, 'Prevención de la violencia contra la mujer', 'Explicacion de los tipos de violencias para niños que cursan 6to de Primaria', 'Violencia en la familia', 'video1.mp4', 'Video', '2023-09-19', 10002);


INSERT INTO `evento` (`codEvento`, `tipo`, `fecha`, `titulo`, `descripcion`, `tipoViolencia`, `modalidad`, `horaInicio`, `horaFinal`, `detalleEvento`, `expositor`, `fechaSubida`, `rutaDirectorio`, `ci`) VALUES
(3, 'Seminario', '2023-09-20', 'Empresa comprometida con una vida libre de violencia contra las mujeres en el Estado Plurinacional de Bolivia', 'Herramientas de prevención en las empresas','Violencia laboral','Presencial', '09:00 AM', '11:00 AM', 'Calle 9 de Calacoto. Edificio Cámara Nacional de Industrias No. 7898, piso 8', 'Laura Gonzalez', '2023-09-09', 'evento1.jpg', 10002),
(4, 'Conversatorio', '2022-10-11', 'Avanzamos hacia la educación despatriarcalizadora, prevención de violencia', 'Este seminario nos informa sobre la igualdad de género y la conciencia sobre la importancia de eliminar estereotipos', 'Violencia en la familia','Virtual', '18:00 PM', '19:00 PM', 'https://www.youtube.com/watch?v=WHq8rww-TeQ', 'Paola Ajnota', '2023-09-09', 'evento2.jpg', 10002),
(5, 'Seminario', '2022-11-25', 'Prevención de la violencia y discriminación en el ámbito de educación especial', 'Seminario sobre prevención de violencia y discriminación en educación especial', 'Violencia en el sistema educativo','Virtual', '14:00 PM', '15:45 PM', 'https://www.youtube.com/watch?v=qhlmZAYKwGw', 'Ingrid Cosio', '2023-09-09', 'evento3.jpg', 10002);


