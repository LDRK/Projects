document.addEventListener("DOMContentLoaded", function () {
  // Declaraciones globales
  let estudiantes = [];
  let materias = [];
  let periodos = [];
  let notas = [];

  const selectEstudiantes = document.getElementById("estudiantes");
  const selectMaterias = document.getElementById("materias");
  const selectPeriodos = document.getElementById("periodos");
  const notaInput = document.getElementById("notas");
  const verNotasDiv = document.getElementById("verNotas");
  const agregarNotaBtn = document.getElementById("btnAgregarNota");
  const registrarNotaBtn = document.getElementById("btnRegistrarNotas"); 

  // --- Cargar datos iniciales (estudiantes, materias, periodos) ---
  fetch("http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerNotas.php")
    .then((response) => {
      if (!response.ok) throw new Error("Error en la respuesta del servidor");
      return response.json();
    })
    .then((data) => {
      if (Array.isArray(data.estudiantes)) estudiantes = data.estudiantes;
      if (Array.isArray(data.materias)) materias = data.materias;
      if (Array.isArray(data.periodos)) periodos = data.periodos;

      // Llenar select estudiantes
      estudiantes.forEach((estudiante) => {
        const option = document.createElement("option");
        option.value = estudiante.id_usuario;
        option.textContent = `${estudiante.nombre} ${estudiante.apellido}`;
        selectEstudiantes.appendChild(option);
      });

      // Llenar select materias
      materias.forEach((materia) => {
        const option = document.createElement("option");
        option.value = materia.id_materia;
        option.textContent = materia.nombre;
        selectMaterias.appendChild(option);
      });

      // Llenar select periodos
      periodos.forEach((periodo) => {
        const option = document.createElement("option");
        option.value = periodo.id_periodo;
        option.textContent = periodo.n_periodo;
        selectPeriodos.appendChild(option);
      });
    })
    .catch((error) => console.error("Error al obtener datos iniciales:", error));

  // Actualizar materias según estudiante 
  selectEstudiantes.addEventListener("change", function () {
    const estudianteId = this.value;
    if (estudianteId) {
      fetch(`http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerNotas.php?id_estudiante=${estudianteId}`)
        .then((response) => response.json())
        .then((data) => {
          selectMaterias.innerHTML = "";
          data.forEach((materia) => {
            const option = document.createElement("option");
            option.value = materia.id_materia;
            option.textContent = materia.nombre;
            selectMaterias.appendChild(option);
          });
        })
        .catch((error) => console.error("Error al obtener materias:", error));
    }
  });

  // Agregar nota 
  agregarNotaBtn.addEventListener("click", function () {
    const nuevaNota = parseFloat(notaInput.value);
    if (isNaN(nuevaNota) || nuevaNota < 1 || nuevaNota > 10) {
    swal("Nota inválida", "Solo se permiten valores entre 1 y 10.", "warning");
    return;
  }

  notas.push(nuevaNota);
  notaInput.value = "";
  mostrarNotas();
  });

  //  Mostrar notas 
  function mostrarNotas() {
    verNotasDiv.innerHTML = "";
    notas.forEach((nota, index) => {
      const notaDiv = document.createElement("div");
      notaDiv.classList.add("nota-item");
      notaDiv.innerHTML = `
        <span>Nota ${index + 1}: ${nota}</span>
        <button class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded shadow-md transition duration-200 editar-btn" data-index="${index}">Editar</button>
        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow-md transition duration-200 eliminar-btn" data-index="${index}">Eliminar</button>
      `;
      verNotasDiv.appendChild(notaDiv);
    });
    agregarEventosBotones();
  }

  // Botones editar/eliminar 
  function agregarEventosBotones() {
  document.querySelectorAll(".editar-btn").forEach((btn) =>
    btn.addEventListener("click", function () {
      const index = this.dataset.index;
      const nuevaNota = prompt("Ingrese la nueva nota (1 a 10):", notas[index]);
      const notaNum = parseFloat(nuevaNota);
      if (nuevaNota !== null && !isNaN(notaNum)) {
        if (notaNum < 1 || notaNum > 10) {
          swal("Nota inválida", "Solo se permiten valores entre 1 y 10.", "warning");
          return;
        }
        notas[index] = notaNum;
        mostrarNotas();
      } else {
        swal("Nota inválida", "Debe ingresar un número válido.", "error");
      }
    })
  );

  document.querySelectorAll(".eliminar-btn").forEach((btn) =>
    btn.addEventListener("click", function () {
      const index = this.dataset.index;
      notas.splice(index, 1);
      mostrarNotas();
    })
  );
}

  //  Registrar notas 
  registrarNotaBtn.addEventListener("click", function (event) {
  event.preventDefault();

  const estudianteId = selectEstudiantes.value;
  const materiaId = selectMaterias.value;
  const periodoId = selectPeriodos.value;

  const nuevaNota = notaInput.value;
  if (nuevaNota && !isNaN(nuevaNota)) {
    notas.push(parseFloat(nuevaNota)); // 
    notaInput.value = "";
    mostrarNotas(); // Opcional: actualizar vista
  }

  if (!estudianteId || !materiaId || !periodoId || notas.length === 0) {
    alert("Por favor complete todos los campos y agregue al menos una nota.");
    return;
  }

  const notasArray = notas.map((valor) => ({
    estudianteId,
    materiaId,
    periodoId,
    valor,
  }));

  const datos = {
    accion: "crear",
    notas: notasArray,
  };

  console.log("Enviando datos:", datos); 

  fetch("http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerNotas.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(datos),
  })
    .then((response) => {
      if (!response.ok) throw new Error("Error al registrar notas");
      return response.json();
    })
    .then((data) => {
    console.log("Respuesta del servidor:", data);

    // Verifica que todas las respuestas tengan success = true
    const todoBien = Array.isArray(data) && data.every(item => item.success === true);

      if (todoBien) {
        swal("¡Buen trabajo!", "Notas registradas correctamente.", "success");

        // 🧹 Limpiar formulario correctamente
        selectEstudiantes.value = "";
        selectMaterias.innerHTML = "<option value=''>Seleccione materia</option>";
        selectPeriodos.value = "";
        notaInput.value = "";
        notas = [];
        verNotasDiv.innerHTML = "";
      } else {
        console.error("Error en una o más notas:", data);
        swal("Error", "Ocurrió un problema al registrar algunas notas.", "error");
      }
    })
    .catch((error) => console.error("Error en el registro de notas:", error));
});

});
