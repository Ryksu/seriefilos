SELECT serie.*,usuarios_series.id_Usuarios FROM serie RIGHT JOIN usuarios_series on serie.id = usuarios_series.id_serie WHERE serie.Estado LIKE '%1%' ORDER BY serie.Titulo LIMIT 0,8
