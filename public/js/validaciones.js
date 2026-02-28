document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('formSolicitud');
  const alerta = document.getElementById('alertaForm');

  // Si este JS se carga en otra página, no hacer nada
  if (!form || !alerta) return;

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

    if (!nombre || !departamento || !prioridad || !descripcion || !tipoSeleccionado) {
      e.preventDefault();
      mostrarAlerta('danger', 'Por favor complete todos los campos obligatorios.');
      return;
    }

    if (descripcion.length < 20) {
      e.preventDefault();
      mostrarAlerta('warning', 'La descripción debe tener al menos 20 caracteres.');
      return;
    }

    // OK: deja que el formulario se envíe a procesar.php
  });
});