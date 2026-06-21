import { useState } from "react";
import { api } from "../services/api";
import "../styles/reporte.css";

export default function ReporteEnvios() {
  const [inicio, setInicio] = useState("");
  const [fin, setFin] = useState("");
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(false);

  const consultar = async () => {
    if (!inicio || !fin) return alert("Selecciona ambas fechas");

    try {
      setLoading(true);

      const res = await api.post("/reporte-envios", {
        fecha_inicio: inicio,
        fecha_fin: fin,
      });

      setData(res.data);
    } catch (err) {
        console.log("ERROR COMPLETO:", err);
  console.log("RESPONSE:", err.response);
    alert("Error al consultar API");
    } finally {
      setLoading(false);
    }
  };

  return (
    <section className="container">
      <header className="header">
        <h1>📦 Reporte de Envíos</h1>
        <p>Consulta costos por rango de fechas</p>
      </header>

      <form
        className="form"
        onSubmit={(e) => {
          e.preventDefault();
          consultar();
        }}
      >
        <input
          type="date"
          value={inicio}
          onChange={(e) => setInicio(e.target.value)}
        />

        <input
          type="date"
          value={fin}
          onChange={(e) => setFin(e.target.value)}
        />

        <button type="submit">
          {loading ? "Consultando..." : "Consultar"}
        </button>
      </form>

      <main>
        <table className="table">
          <thead>
            <tr>
              <th>Repartidor</th>
              <th>Envíos</th>
              <th>Total KG</th>
              <th>Costo Total</th>
            </tr>
          </thead>

          <tbody>
            {data.length === 0 ? (
              <tr>
                <td colSpan="4" className="empty">
                  No hay datos
                </td>
              </tr>
            ) : (
              data.map((item, i) => (
                <tr key={i}>
                  <td>{item.repartidor}</td>
                  <td>{item.envios}</td>
                  <td>{item.total_kg}</td>
                  <td>${item.costo_total}</td>
                </tr>
              ))
            )}
          </tbody>
        </table>
      </main>
    </section>
  );
}