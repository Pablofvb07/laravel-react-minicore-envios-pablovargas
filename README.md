# Mini Core - Sistema de Cálculo de Costos de Envíos

## Autor
Pablo Vargas

## Framework MVC Utilizado
- Backend: Laravel 12 (MVC)
- Frontend: React + Vite
- Base de Datos: PostgreSQL (Supabase)

## Descripción del Proyecto

Este proyecto implementa una aplicación web que permite calcular el costo total de los envíos realizados por cada repartidor dentro de un rango de fechas determinado.

El sistema utiliza la arquitectura MVC mediante Laravel para gestionar la lógica de negocio y el acceso a datos, mientras que React se encarga de la interfaz de usuario.

### Funcionalidades

- Filtrar envíos por rango de fechas.
- Calcular el costo de cada envío según:
  
  ```
  peso_kg × tarifa_por_kg
  ```

- Agrupar resultados por repartidor.
- Mostrar:
  - Nombre del repartidor.
  - Cantidad de envíos.
  - Total de kilogramos transportados.
  - Costo total generado.

---

## Tecnologías Utilizadas

### Backend
- Laravel 12
- PHP 8.4
- PostgreSQL
- Supabase

### Frontend
- React
- Vite
- Axios
- CSS

---

## Estructura del Proyecto

```text
Minicore-envios/
│
├── backend/
│   ├── app/
│   ├── routes/
│   ├── database/
│   └── ...
│
├── frontend/
│   ├── src/
│   │   ├── components/
│   │   ├── services/
│   │   └── styles/
│   └── ...
│
└── README.md
```

---

## Instrucciones para Ejecutar Localmente

### 1. Clonar el repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
```

---

### 2. Configurar Backend

Ingresar a la carpeta backend:

```bash
cd backend
```

Instalar dependencias:

```bash
composer install
```

Configurar las variables de entorno en el archivo `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=HOST_SUPABASE
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=TU_PASSWORD
```

Ejecutar migraciones:

```bash
php artisan migrate
```

Levantar servidor Laravel:

```bash
php artisan serve
```

El backend estará disponible en:

```text
http://127.0.0.1:8000
```

---

### 3. Configurar Frontend

Abrir una nueva terminal e ingresar a:

```bash
cd frontend
```

Instalar dependencias:

```bash
npm install
```

Ejecutar aplicación:

```bash
npm run dev
```

El frontend estará disponible en:

```text
http://localhost:5173
```

---

## Uso

1. Abrir la aplicación en el navegador.
2. Seleccionar una fecha de inicio.
3. Seleccionar una fecha de fin.
4. Presionar el botón **Consultar**.
5. Visualizar el reporte generado.

---

## Video Demostrativo

Video de funcionamiento:

**[PEGAR AQUÍ EL LINK DEL VIDEO]**

---

## Arquitectura MVC

### Modelo (Model)
- Repartidor
- Envio
- Zona

### Vista (View)
- Aplicación React

### Controlador (Controller)
- ReporteController

El controlador recibe el rango de fechas, consulta los envíos, realiza los cálculos correspondientes y devuelve los resultados al frontend mediante una API REST.

---
