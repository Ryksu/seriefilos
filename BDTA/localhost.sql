-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2018 a las 16:09:31
-- Versión del servidor: 10.1.29-MariaDB-6
-- Versión de PHP: 7.2.3-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ajwedevckqmoucho`
--
CREATE DATABASE IF NOT EXISTS `ajwedevckqmoucho` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ajwedevckqmoucho`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `Poster` varchar(50) NOT NULL,
  `Titulo` varchar(36) NOT NULL,
  `Texto` text NOT NULL,
  `Categoria` varchar(16) NOT NULL,
  `Year` year(4) NOT NULL,
  `Temporada` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Puntuacion` int(11) DEFAULT NULL,
  `Trailer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`id`, `Poster`, `Titulo`, `Texto`, `Categoria`, `Year`, `Temporada`, `Estado`, `Puntuacion`, `Trailer`) VALUES
(1, '../../img/poster/merli_tv.jpg', 'Merlí', 'El profesor de filosofía Merlí Bergeron (Francesc Orella) escoge un grupo de alumnos de bachillerato para convertirlos en los peripatéticos del siglo XXI. Como si tratara de un nuevo Aristóteles, Merlí les enseñará a cuestionar las cosas y a reflexionar. Pero, por su carácter irónico e irritante, despierta antipatías en el instituto, porque no todos los profesores están dispuestos a aguantar sus manías. Ni tampoco su hijo, el alumno más difícil que ha tenido jamás y con el que intentará mejorar su relación. ', 'Drama', 2015, 3, 1, 100, ''),
(2, '../../img/poster/friends.jpg', 'F.r.i.e.n.d.s', '\"Friends\" narra las aventuras y desventuras de seis jóvenes de Nueva York. Rachel (Jennifer Aniston), Monica (Courteney Cox), Phoebe (Lisa Kudrow), Ross (David Schwimmer), Chandler (Matthew Perry) y Joey (Matt LeBlanc) forman una unida pandilla de amigos que viven en Manhattan y que suelen reunirse en sus apartamentos o en su bar habitual, el Central Perk. A pesar de los numerosos cambios que se producen en sus vidas, su amistad es inquebrantable en la dura batalla por salir adelante en sus periplos profesionales y personales.', 'Sitcom', 1994, 10, 1, 100, ''),
(3, '../../img/poster/la-casa-de-papel.jpg', 'La casa de papel', 'La Casa de Papel narra lo que se espera que sea el atraco perfecto al Museo de la Fábrica Nacional de Moneda y Timbre. La mente que idea este plan es El Profesor, un hombre que recluta a siete personas para llevar a cabo el gran golpe. Tokio es una joven atracadora muy buscada por la policía, Berlín asume el papel de \"el cabecilla\", Moscú es el experto en perforaciones, Río es \"el informático\", Nairobi  es la falsificadora, Denver es el hijo de Moscú y, como siempre, falta la fuerza bruta: Helsinki y Oslo.\r\n\r\nLa banda planea cada paso durante cinco meses, valoran todos los inconvenientes, todas las posibilidades y cuando llega el día, se encierran durante once días en la Fábrica Nacional de Moneda y Timbre con 67 rehenes. Su objetivo es salir de allí con su propio dinero de curso legal recién impreso y sin registrar, algo que será difícil ya que la policía ha sitiado el lugar.', 'Drama', 2015, 2, 1, 0, ''),
(4, '../../img/poster/AlteredCarbon.jpg', 'Black Mirror', '\'Black Mirror\' explora la capacidad de la tecnología en un mundo donde todo gira en torno a ella. Desde un punto de vista futurista, cada una de las historias que conforman la serie retrata varios casos donde las redes sociales y la alta tecnología son las protagonistas. Cada situación es llevada al extremo, sirviendo así como reflexión y alegato casi conspiranoico de una sociedad moderna que cada vez avanza más y más.', 'Ciencia ficción ', 2011, 4, 0, 0, '<iframe title=\"Black mirror\" width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/5ELQ6u_5YYM\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>'),
(5, '../../img/poster/black-mirror.jpg', 'Altered Carbon', 'Altered Carbon es una serie exclusiva de Netflix basada en la homónima novela de ciencia ficción escrita por Richard K. Morgan. Con un guión escrito por Laeta Kalogridis (Shutter Island), esta adaptación está producida por Skydance Television. Kalogridis, además, es la productora ejecutiva y \'showrunner\' de la serie, y se encuentra acompañada en la producción por los ejecutivos de Skydance Television: David Ellison, Dana Goldberg y Marcy Ross.\r\n\r\nPublicada en el año 2002, Altered Carbon está ambientada en un futuro distópico, donde se explora qué es lo que sucede cuando la mente humana puede ser almacenada digitalmente y descargada en nuevos cuerpos. Takeshi Kovacs, un ex guerrero interestelar de élite de las Naciones Unidas que ha sido mantenido prisionero durante 500 años, es descargado en un futuro que siempre intentó detener. Arrojado en Bay City (la ciudad anteriormente conocida como San Francisco), Kovacs debe mostrarse capaz de resolver un asesinato en un mundo donde los avances tecnológicos han convertido la muerte en un concepto obsoleto. ', 'Ciencia ficción', 2018, 1, 0, 0, '<iframe title=\"Altered Carbon\" width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dhFM8akm9a4\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>'),
(6, '../../img/poster/boJack_horseman.jpg', 'BoJack Horseman', '\'BoJack Horseman\' gira en torno a un caballo humanoide BoJack que bebe whisky sin parar (Will Arnett) y que se ocupa de sus crisis personales con la ayuda de su compañero humano Todd (Aaron Paul) y el agente y examante felino Princess Caroline (Amy Sedaris, \'The Best and The Brightest\'). Con su ayuda, Bojack está más que listo para volver a dejar su huella en el mundo del entretenimiento.\r\n\r\nBoJack fue una legendaria estrella de la famosa comedia familiar de la década de 1990 \'Horsin\' Around\', que echó a perder por culpa del alcohol, las relaciones fracasadas y el desprecio que se tiene a sí mismo.\r\n\r\nLa animación consta de 12 episodios en Netflix con protagonistas a Will Arnett (\'Teenage Mutant Ninja Turtles\') y Aaron Paul (\'Breaking Bad\'), que a su vez también son productores ejecutivos de la serie junto a Bob-Waksberg (\'Save me\'), Steven A. Cohen (\'Señora Presidenta\') y Noel Bright (\'Friends\').', 'Comedia', 2014, 4, 0, 0, ''),
(7, '../../img/poster/narcos_tv.jpg', 'Narcos', 'Serie que narra los esfuerzos de Estados Unidos, a través principalmente de la DEA y las autoridades y policía de Colombia, para luchar en la década de los 80 contra el narcotraficante Pablo Escobar y el cartel de Medellín, una de las organizaciones criminales más ricas y despiadadas en la historia de la delincuencia moderna. En la tercera temporada el objetivo de la DEA será acabar con el cartel de Cali.', 'Criminal', 2015, 4, 0, 0, '<iframe width=\"560\" title=\"narcos tv\" height=\"315\" src=\"https://www.youtube.com/embed/U7elNhHwgBU\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>'),
(8, '../../img/poster/family_guy.jpg', 'Padre de familia', ' Es una serie de televisión animada estadounidense para adolescentes y adultos creada por el director, guionista y cantante Seth MacFarlane en 1999. La serie se centra en los Griffin, una familia disfuncional cuyos componentes son: los padres Peter y Lois; sus hijos Meg, Chris, y Stewie; y su perro antropomorfo Brian. La serie está situada en la ciudad ficticia de Quahog, Rhode Island. La clasificación varía en TV PG y TV 14', 'Comedia', 1998, 15, 0, 0, ''),
(9, '../../img/poster/the_simpson.jpg', 'Los Simpson', 'Los Simpson (en inglés, The Simpsons) es una serie estadounidense de comedia, en formato de animación, creada por Matt Groening para Fox Broadcasting Company y emitida en varios países del mundo. La serie es una sátira de la sociedad estadounidense que narra la vida y el día a día de una familia de clase media de ese país (cuyos miembros son Homer, Marge, Bart, Lisa y Maggie Simpson) que vive en un pueblo ficticio llamado Springfield.1​\r\n\r\nLa familia fue concebida por Groening y poco después debutó en una serie de cortos de animación producidos por James L. Brooks.2​ Groening creó una familia disfuncional y nombró a sus personajes en honor a los miembros de su propia familia, sustituyendo su propio nombre por Bart.2​3​ Los cortos pasaron a formar parte de El show de Tracey Ullman el 19 de abril de 1987,4​ pero después de tres temporadas se decidió convertirlos en una serie de episodios de media hora en horario de máxima audiencia. Constituyó un éxito de la cadena Fox y fue la primera serie de este canal en llegar a estar entre los 30 programas más vistos en la temporada 1992-1993 en Estados Unidos.5​\r\n\r\nDesde su debut el 17 de diciembre de 1989, se han emitido más de 600 episodios, habiendo finalizado su vigésimoctava temporada.6​ En el final de la decimoctava temporada, el 20 de mayo de 2007, se emitió en Estados Unidos el episodio 400: You Kent Always Say What You Want. En la mayoría del mundo los días 26 y 27 de julio de 2007 se estrenó Los Simpson: la película, la cual recaudó cerca de 526 millones de dólares en todo el mundo.7​\r\n\r\nLos Simpson ha ganado numerosos premios desde su estreno como serie, incluyendo 25 premios Emmy, 24 premios Annie y un premio Peabody. La revista Time del 31 de diciembre de 1999 la calificó como la mejor serie del siglo XX,8​ y el 14 de enero de 2000 recibió una estrella en el Paseo de la Fama de Hollywood. Los Simpson es una de las series estadounidenses de dibujos animados de mayor duración9​ y el programa estadounidense de animación más largo.10​ El gruñido de fastidio de Homer «D\'oh!» ha sido incluido en el diccionario Oxford English Dictionary, mientras que la serie ha influido en muchas comedias de situación animadas para adultos.11​', 'Comedia', 1989, 29, 2, 0, ''),
(10, '../../img/poster/the_100.jpg', 'Los 100', 'Situada 97 años después de una guerra nuclear que ha destruido la civilización, los supervivientes de una nave espacial, que han sobrevivido durante tres generaciones en el espacio, envían 100 delincuentes juveniles \"para testear\" las condiciones de la Tierra, con la esperanza de eventualmente volver a poblar el planeta. El grupo de jóvenes tratará de sobrevivir en un entorno desconocido y hostil a pesar de las brechas que se abren entre ellos, unos partidarios de seguir en conexión con la nave, otros a favor de empezar de cero sin depender de nadie. Mientras, en la nave, las luchas por el poder político se recrudecen, llevando a los dirigentes a situaciones extremas y difíciles decisiones.', 'Ciencia ficción', 2014, 4, 2, 0, '<iframe title=\"the 100\" width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JQi2MAfpACI\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>'),
(11, '../../img/poster/the_it_crowd.jpg', 'The it Crowd', 'Ayudados por una jefa que no ha tocado un ordenador en su vida, dos cerebritos viven para la informática en el sótano de la empresa de un perfecto zopenco. La serie terminó en 2010, pero se dio por concluida con un episodio final emitido en septiembre de 2013. ', 'Sitcom', 2006, 5, 1, 0, ''),
(12, '../../img/poster/community_tv.jpg', 'Community (serie)', 'Comedia sobre un grupo de inadaptados que asisten a la Universidad Comunitaria de Greendale. En el grupo destaca Jeff Winger, un abogado carismático y sin escrúpulos cuyo título universitario ha sido invalidado. Con la ayuda de sus pintorescos compañeros de clase, Winger forma un grupo de estudio en el que dominan las discusiones y la camaradería.', 'Comedia', 2009, 6, 1, 0, ''),
(13, '../../img/poster/game_of_thrones.jpg', 'Game of thrones ', 'La historia se desarrolla en un mundo ficticio de carácter medieval donde hay Siete Reinos. Hay tres líneas argumentales principales: la crónica de la guerra civil dinástica por el control de Poniente entre varias familias nobles que aspiran al Trono de Hierro, la creciente amenaza de los Otros, seres desconocidos que viven al otro lado de un inmenso muro de hielo que protege el Norte de Poniente, y el viaje de Daenerys Targaryen, la hija exiliada del rey que fue asesinado en una guerra civil anterior, y que pretende regresar a Poniente para reclamar sus derechos. Tras un largo verano de varios años, el temible invierno se acerca a los Siete Reinos. Lord Eddard \'Ned\' Stark, señor de Invernalia, deja sus dominios para ir a la corte de su amigo, el rey Robert Baratheon en Desembarco del Rey, la capital de los Siete Reinos. Stark se convierte en la Mano del Rey e intenta desentrañar una maraña de intrigas que pondrá en peligro su vida y la de todos los suyos. Mientras tanto diversas facciones conspiran con un solo objetivo: apoderarse del trono', 'Aventura', 2011, 7, 2, 0, ''),
(14, '../../img/poster/Rick-and-Morty.jpg', 'Rick & Morty', ' Comedia animada que narra las aventuras de un científico loco, Rick Sánchez, que regresa después de 20 años para vivir con su hija, su marido y sus hijos, Morty y Summer.', 'Ciencia ficción', 2013, 3, 2, 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rTc-2KCJU3M\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>'),
(20, '../../img/poster/Swat.jpg', 'SWAT', 'S.W.A.T. es un equipo de militares altamente capacitados para trabajar en todo tipo de casos en Los Ángeles. Daniel Harrelson es el teniente afroamericano del grupo, que se debate a menudo entre la lealtad a sus compañeros y la que siente por la gente de la calle.', 'Accion', 2017, 1, 2, 0, ''),
(21, '../../img/poster/Modern_Family_S8_Poster-2.jpg', 'Modern Family', 'Aclamada serie -es la sitcom más premiada en los últimos años- que narra el día a día de una gran familias compuesta por Jay Pritchett (Ed O’Neill) y su joven mujer Gloria Delgado (Sofia Vergara), madre de Manny (Rico Rodriguez), y al mismo tiempo muestra la vida de las dos familias compuestas por sus hijos ya adultos: el abogado gay Mitchell (Jesse Tyler Ferguson), casado con Cameron Tucker (Eric Stonestreet) y padres adoptivos de la pequeña Lily, y su hija Claire (Julie Bowen), casada con Phil Dunphy (Ty Burrell) y que son padres de 3 hijos, la pija Haley (Sarah Hyland), la estudiosa Alex (Ariel Winter) y el simple Luke (Nolan Gould)', 'Comedia', 2009, 9, 2, 0, ''),
(29, '../../img/poster/StrangerThings.jpg', 'Stranger Things', 'Primera temporada: 8 episodios. Homenaje a los clásicos misterios sobrenaturales de los años 80, \"Stranger Things\" es la historia de un niño que desaparece en el pequeño pueblo de Hawkins, Indiana, sin dejar rastro en 1983. En su búsqueda desesperada, tanto sus amigos y familiares como el sheriff local se ven envueltos en un enigma extraordinario: experimentos ultrasecretos, fuerzas paranormales terroríficas y una niña muy, muy rara... ', 'Sobrenaturales', 2016, 2, 2, 0, ''),
(30, '../../img/poster/Doctorwho.jpg', 'Doctor who ', 'Continuación de la mítica y longeva serie británica que empezó en 1963 y duró hasta 1989. El Doctor es un aventurero que viaja por el tiempo y el espacio visitando desde fantasmas del pasado hasta alienígenas del futuro, desde el día que la Tierra murió en una bola de fuego hsta el fin del universo', 'Ciencia ficción', 2005, 11, 2, 0, ''),
(32, '../../img/poster/Por_trece_razones.jpg', 'Por trece razones', 'El adolescente Clay Jensen (Dylan Minnette) vuelve un día a casa después del colegio y encuentra una misteriosa caja con su nombre. Dentro descubre una cinta grabada por Hannah Baker (Katherine Langford), una compañera de clase por la que sentía algo especial y que se suicidó tan solo dos semanas atrás. En la cinta, Hannah cuenta que hay trece razones por las que ha decidido quitarse la vida. ¿Será Clay una de ellas? Si lo escucha, tendrá oportunidad de conocer cada motivo de su lista.', 'Drama', 2017, 1, 2, 0, ''),
(35, '', 'THE FLASH', 'AFADFDFAFD', 'DRAMA', 2014, 4, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Foto` varchar(60) DEFAULT NULL,
  `Usuario` varchar(8) NOT NULL,
  `Password` varchar(72) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nombre` varchar(36) DEFAULT NULL,
  `Apellidos` varchar(36) DEFAULT NULL,
  `Cumple` date DEFAULT NULL,
  `Rol` tinyint(1) DEFAULT NULL COMMENT '0  Usuarios sin permisos, 1 Para usuario de admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Foto`, `Usuario`, `Password`, `Email`, `Nombre`, `Apellidos`, `Cumple`, `Rol`) VALUES
('/img/perfiles/user-default.svg', 'Admin', '$2b$10$iGt4GlAob/ZA8tEPaPswruLOCkLeAQ65S2ENA/5VsZIAwN2SLindy', 'admin@admin.com', NULL, NULL, NULL, 1),
(NULL, 'Alexis', '$2y$10$ve1dHHexaVeULmMym6KRhOvoE9pUo1crlV0ZQmKFl.4pHTLTmCVyq', 'alesisjesus9@gmail.com', NULL, NULL, NULL, 0),
(NULL, 'ryksu', '$2y$10$IXZmYZVLGgyNhjxaEnky1.1YxeulnssuEhLiLeF0KVKbaKIFprId2', 'alesisjesus9@gmail.com', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_series`
--

CREATE TABLE `usuarios_series` (
  `id_Usuarios` varchar(8) NOT NULL,
  `id_Serie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Los usuarios  pude publicar una o más series \r\nLas series pude ser publicadas por uno o más usuarios ';

--
-- Volcado de datos para la tabla `usuarios_series`
--

INSERT INTO `usuarios_series` (`id_Usuarios`, `id_Serie`) VALUES
('Admin', 1),
('Admin', 35);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usuario`) USING BTREE;

--
-- Indices de la tabla `usuarios_series`
--
ALTER TABLE `usuarios_series`
  ADD KEY `FK_Usuarios_Series_serie` (`id_Serie`),
  ADD KEY `FK_Usuarios_Series_usuario` (`id_Usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios_series`
--
ALTER TABLE `usuarios_series`
  ADD CONSTRAINT `FK_Usuarios_Series_serie` FOREIGN KEY (`id_Serie`) REFERENCES `serie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Usuarios_Series_usuario` FOREIGN KEY (`id_Usuarios`) REFERENCES `usuarios` (`Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
