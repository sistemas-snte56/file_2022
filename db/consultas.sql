

SELECT
    archivos.id_archivo as idArchivo,
    usuario.nombre as nombreUsuario,
    usuario.apaterno as apaternoUsuario,
    usuario.materno as amaternoUsuario,
    categorias.nombre as categoria,
    archivos.nombre as nombreArchivo,
    archivos.tipo as tipoArchivo,
    archivos.ruta as rutaArchivo,
    archivos.fecha as fecha
FROM
    tbl_archivos AS archivos
INNER JOIN tbl_usuarios AS usuario
ON
    archivos.id_usuario = usuario.id_usuario
INNER JOIN tbl_categorias AS categorias
ON
    archivos.id_categoria = categorias.id_categoria AND archivos.id_usuario = 18;
    