Para el acceso a bbdd:
	Crear base de datos vacía llamada 'agenda' con codificación "utf8_spanish2_ci" e importar el archivo 'agenda.sql' adjuntado en la misma carpeta que este documento.
	Se puede cambiar la contraseña en el archivo "conexion.php.


Añadidos al contenido inicial del proyecto:
	Sistema de login. Hay usuarios creados y también se pueden registrar nuevos. 
		Cada usuario tiene sus propios contactos y no puede ver los de los demás usuarios ni modificar o borrarlos.
		Cada 30 minutos la sesión se cierra automáticamente y también hay botón para cerrarla.
	Sistema de mensajería. No todos los usuarios ya creados tienen mensajes.
		Los usuarios sólo pueden ver sus propios mensajes y el nombre del usuario que lo ha enviado. 

Usuarios de prueba que incorporan datos (tanto contactos como mensajes): 
	usuario1 / abc123.
	usuario2 / abc123.
	
Se pueden registrar usuarios nuevos para probar. 
Todos los usuarios admiten crear contactos nuevos. 
Todos los usuarios pueden enviar mensajes a todos menos a si mismo.
Desde el menú, los botones de "Mantenimiento" y "Mensajería" llevan a una página que te 
da las opciones respectivas de cada sub-menú. Además, dentro del propio menú también se despliega el sub-menú.

Rutas a las imágenes descargadas para este proyecto:
	https://www.bbva.com/wp-content/uploads/2017/05/Economia-finanzas-Libros-BBVA-1024x416.jpg
	https://www.shareicon.net/data/256x256/2016/10/01/837838_miscellaneous_512x512.png
	
	
Ruta principal (se te van a redirigir a iniciosesion.php si no hay ninguna sesión iniciada):
	http://localhost/Agenda
	