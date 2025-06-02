// Creamos el array donde se almacenaran los usuarios.
let usuarios = [];
let profesores = [];
let estudiantes = [];

// Función para llenar la tabla
function llenarTablaUsuarios(usuarios) {
  const tabla = document.querySelector("#table-usu tbody");
  tabla.innerHTML = "";

  usuarios.forEach((usuario) => {
    const fila = document.createElement("tr");
    fila.classList.add(
      "bg-white",
      "border-b",
      "dark:bg-gray-800",
      "dark:border-gray-700",
      "border-gray-200"
    );

    const celdaId = document.createElement("th");
    celdaId.scope = "row";
    celdaId.textContent = usuario.id_usuario;
    celdaId.classList.add(
      "px-6",
      "py-4",
      "font-medium",
      "text-gray-900",
      "whitespace-nowrap",
      "dark:text-white"
    );

    const celdaNombre = document.createElement("td");
    celdaNombre.textContent = usuario.nombre;
    celdaNombre.classList.add("px-6", "py-4");

    const celdaApellido = document.createElement("td");
    celdaApellido.textContent = usuario.apellido;
    celdaApellido.classList.add("px-6", "py-4");

    const celdaUsuario = document.createElement("td");
    celdaUsuario.textContent = usuario.username;
    celdaUsuario.classList.add("px-6", "py-4");

    const celdaRol = document.createElement("td");
    celdaRol.textContent = usuario.rol;
    celdaRol.classList.add("px-6", "py-4");

    // 👉 Nueva celda de acciones
    const celdaAcciones = document.createElement("td");
    celdaAcciones.classList.add("px-6", "py-4", "space-x-2");

    // Botón Modificar
    const btnEditar = document.createElement("button");
    btnEditar.textContent = "✏️ Modificar";
    btnEditar.classList.add("bg-orange-500", "hover:bg-orange-600", "text-white", "px-2", "py-1", "rounded");
    btnEditar.addEventListener("click", () => {
      editarUsuario(usuario); 
    });

    // Botón Eliminar
    const btnEliminar = document.createElement("button");
    btnEliminar.textContent = "🗑️ Eliminar";
    btnEliminar.classList.add("bg-red-700", "hover:bg-red-800", "text-white", "px-2", "py-1", "rounded");
    btnEliminar.addEventListener("click", () => {
      eliminarUsuario(usuario.id_usuario); 
    });

    celdaAcciones.appendChild(btnEditar);
    celdaAcciones.appendChild(btnEliminar);

    // Agregar celdas a la fila
    fila.appendChild(celdaId);
    fila.appendChild(celdaNombre);
    fila.appendChild(celdaApellido);
    fila.appendChild(celdaUsuario);
    fila.appendChild(celdaRol);
    fila.appendChild(celdaAcciones);

    tabla.appendChild(fila);
  });
}

 function editarUsuario(usuario) {
  document.getElementById("edit-id").value = usuario.id_usuario;
  document.getElementById("edit-nombre").value = usuario.nombre;
  document.getElementById("edit-apellido").value = usuario.apellido;
  document.getElementById("edit-username").value = usuario.username;
  document.getElementById("edit-rol").value = usuario.rol;
  document.getElementById("modalEditar").classList.remove("hidden");
}

function cerrarModalEditar() {
  document.getElementById("modalEditar").classList.add("hidden");
}

// Enviar datos editados
document.getElementById("formEditarUsuario").addEventListener("submit", function (e) {
  e.preventDefault();

  const id = document.getElementById("edit-id").value;
  const data = {
    accion:"modificar",
    id_usuario: id,
    nombre: document.getElementById("edit-nombre").value,
    apellido: document.getElementById("edit-apellido").value,
    username: document.getElementById("edit-username").value,
    rol: document.getElementById("edit-rol").value,
    
  };
  const jsonData = JSON.stringify(data);

  fetch(`http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerUsuario.php/${id}/`, {
    method: "POST", 
    headers: {
      "Content-Type": "application/json",
      "Cache-Control": "no-cache",
    },
    body: jsonData,
  })
    .then(response => response.json())
    .then(data => {
      if(data.success){
        swal("Good job!", "Usuario actualizado!", "success");
        cerrarModalEditar();
        obtenerUsuarios(); // vuelve a llenar la tabla
      }else{
        swal("Opss!", "Error al modificar el usuario", "warning");
      }
      
    });
});



function eliminarUsuario(id) {
  const confirmar = confirm("¿Estás seguro de que deseas eliminar este usuario?");
  if (confirmar) {
    const data = {
      accion: "eliminar",
      id_usuario: id
    };

    const jsonData = JSON.stringify(data);

    fetch(`http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerUsuario.php/${id}/`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Cache-Control": "no-cache"
      },
      body: jsonData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        swal("Good job!", "Usuario eliminado correctamente!", "success");
        obtenerUsuarios(); // actualiza la tabla
      } else {
        swal("Opss!", "Error al eliminar el usuario", "warning");
      }
    })
    .catch(error => {
      console.error("Error al eliminar el usuario:", error);
      swal("Opss!", "Error al conectar con el servidor", "error");
    });
  }
}





//Hacemos la solicitud para traer los datos del controlador.
fetch(
  "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerTableUsu.php",
  {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  }
)
  .then((response) => response.json())
  .then((data) => {
    console.log("Datos recibidos:", data);
    if (Array.isArray(data)) {
      usuarios = data;
      llenarTablaUsuarios(usuarios);
    } else {
      console.error("Error al obtener los usuarios:", data.message);
    }
  })
  .catch((error) => console.error("Error al obtener los usuarios:", error));

document.getElementById("generarPdf").addEventListener("click", () => {
  window.open(
    "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerTableUsu.php?action=pdfRTodos",
    "_blank" // Abre en una nueva pestaña
  );
});
document.getElementById("generarPdfP").addEventListener("click", () => {
  // window.open(
  //   "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerTableUsu.php?action=pdfRprofesores",
  //   "_blank" // Abre en una nueva pestaña
  // );
  swal({
    title: "Lo sentimos",
    text: "La opción no está disponible por el momento.",
    icon: "warning",
    button: "Entendido",
    dangerMode: true,
  });
});
document.getElementById("generarPdfE").addEventListener("click", () => {
  // window.open(
  //   "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerTableUsu.php?action=pdfRestudiantes",
  //   "_blank" // Abre en una nueva pestaña
  // );

  swal({
    title: "Lo sentimos",
    text: "La opción no está disponible por el momento.",
    icon: "warning",
    button: "Entendido",
    dangerMode: true,
  });


 

});
