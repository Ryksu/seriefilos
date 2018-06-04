/* Para saber los usuarios con quien ha enviado mensajes*/
SELECT DISTINCT id_sala,usuario_para FROM `mensajes` WHERE usuario_de = 'ADMIN'
