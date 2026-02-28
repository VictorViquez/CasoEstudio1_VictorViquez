document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('formSolicitud');
  const alerta = document.getElementById('alertaForm');

  function mostrarAlerta(tipo, mensaje) {
    alerta.className = `alert alert-${tipo}`; // success | danger | warning | info
    alerta.textContent = mensaje;
    alerta.classList.remove('d-none');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function ocultarAlerta() {
    alerta.classList.add('d-none');
    alerta.textContent = '';
  }

  form.addEventListener('submit', (e) => {
    ocultarAlerta();

    const nombre = document.getElementById('nombre').value.trim();
    const departamento = document.getElementById('departamento').value;
    const prioridad = document.getElementById('prioridad').value;
    const descripcion = document.getElementById('descripcion').value.trim();
    const tipoSeleccionado = document.querySelector('input[name="tipo_problema"]:checked');

    // Campos obligatorios
    if (!nombre || !departamento || !prioridad || !descripcion || !tipoSeleccionado) {
      e.preventDefault();
      mostrarAlerta('danger', 'Por favor complete todos los campos obligatorios.');
      return;
    }

    // Longitud mínima descripción
    if (descripcion.length < 20) {
      e.preventDefault();
      mostrarAlerta('warning', 'La descripción debe tener al menos 20 caracteres.');
      return;
    }

    // Si todo OK, se envía al servidor (procesar.php)
  });
});