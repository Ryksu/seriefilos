select serie.*, usuarios_series.id_Usuarios FROM serie RIGHT JOIN usuarios_series on serie.id = usuarios_series.id_serie ORDER by serie.id;
