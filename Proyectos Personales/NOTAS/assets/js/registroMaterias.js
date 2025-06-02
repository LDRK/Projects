// Primero, hacemos la solicitud para obtener los profesores
let profesores = [];

fetch(
  "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerMateria.php",
  {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  }
)
  .then((response) => response.json())
  .then((data) => {
    //console.log("Datos recibidos:", data);
    if (Array.isArray(data)) {
      profesores = data;
    } else {
      console.error("Error al obtener los profesores:", data.message);
    }
    //profesores = data;
  })
  .catch((error) => console.error("Error al obtener los profesores:", error));

/**Dinamismo del formulario den registro de materias */
document.getElementById("numMaterias").addEventListener("change", function () {
  const numMaterias = this.value;
  const formContainer = document.getElementById("materiasForm");
  formContainer.innerHTML = ""; // Limpiar el formulario anterior

  for (let i = 1; i <= numMaterias; i++) {
    // Crear un grupo de inputs para cada materia
    const formGroup = document.createElement("div");
    formGroup.classList.add("mb-3");

    formGroup.innerHTML = `
            <div class="space-y-6 items-center justify-center">
            
            <h5 for="Materia" class="text-xl text-center font-medium text-black dark:text-white">Materia ${i}</h5>
            
            
            <div>
              <label for="nombreMateria${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la Materia</label>
              <input type="text" class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500" id="nombreMateria${i}" name="nombreMateria${i}" required>
            </div>

            <div>
              <label for="semestreMateria${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semestre</label>
              <input type="number" class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500" id="semestreMateria${i}" name="semestreMateria${i}" required>
            </div>

            <div>
              <label for="profesorMateria${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profesor</label>
            <select class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500" id="profesorMateria${i}" name="profesorMateria${i}" required>
                  <option value="">Selecciona un profesor</option>
              </select>
            </div>
            
  
            
  
            
            </div>
            
        `;

    formContainer.appendChild(formGroup);

    // Agregar los profesores al select correspondiente
    const selectProfesor = document.getElementById(`profesorMateria${i}`);
    profesores.forEach((profesor) => {
      const option = document.createElement("option");
      option.value = profesor.id_usuario;
      option.textContent = `${profesor.nombre} ${profesor.apellido}`;
      selectProfesor.appendChild(option);
    });
  }
});

function registrarMaterias() {
  const formMaterias = document.getElementById("materiasForm");
  const materias = [];

  // Recorrer los campos dinámicos y construir el array de materias
  for (let i = 1; i <= formMaterias.childElementCount; i++) {
    const materia = document.getElementById(`nombreMateria${i}`).value;
    const semestre = document.getElementById(`semestreMateria${i}`).value;
    const profesor = document.getElementById(`profesorMateria${i}`).value;

    materias.push({
      materia: materia,
      semestre: semestre,
      profesor: profesor,
    });
  }

  const datos = {
    accion: "crear",
    materias: materias,
  };
  console.log(datos);
  try {
    fetch(
      "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerMateria.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Cache-Control": "no-cache", // Desactivar caché
        },
        body: JSON.stringify(datos), // Convertir los datos en un objeto JSON
        // Enviar el JSON con los datos de las materias
      }
    )
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          swal("Good job!", "Materias Registradas!", "success");
          formMaterias.reset(); // reseteo el formRegistro
        } else {
          alert("Error al registrar las materias: " + data.message);
        }
      })
      .catch((error) => console.error("Error:", error));
  } catch (error) {
    console.error("Error en la construcción del JSON:", error, data);
  }
}
