# mug-demo1

## Agradecimientos

¡Muchas gracias a **AgentCon Córdoba** por invitarme a la charla! 🎉

## WordPress Development Environment

Este proyecto contiene un entorno de desarrollo de WordPress utilizando Docker Compose con MySQL 8, phpMyAdmin, y un plugin demo.

### Servicios

- **WordPress**: Puerto 8080 (http://localhost:8080)
- **phpMyAdmin**: Puerto 8081 (http://localhost:8081)
- **MySQL 8**: Base de datos

### Inicio Rápido

1. Copiar el archivo de configuración:
```bash
cp .env.example .env
```

2. Iniciar los servicios:
```bash
docker-compose up -d
```

3. Acceder a WordPress:
   - WordPress: http://localhost:8080
   - phpMyAdmin: http://localhost:8081

### Plugin Incluido

**hello-copilot**: Plugin demo con menú de administración y shortcode `[hola_copilot]`

### Configuración

Las credenciales por defecto están en `.env.example`:
- Base de datos: wp
- Usuario: wp
- Contraseña: wp

### Detener los Servicios

```bash
docker-compose down
```

Para eliminar también los volúmenes:
```bash
docker-compose down -v
```