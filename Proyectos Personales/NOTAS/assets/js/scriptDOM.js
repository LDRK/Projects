// /**Modal para registrar los usuarios que utlilizaran la aplicacion */
// const modalPedirUsuario = document.querySelector("#modalRegistroUsu");
// const btnPedirUsuario = document.querySelector("#btn-solicitarUsu");

// modalPedirUsuario.addEventListener("shown.bs.modal", () => {
//   btnPedirUsuario.focus();
//   /*Evito que este seleccionado un checks cuando se inicie el modal  */
//   checkProfesor.checked = false;
//   checkEstudiante.checked = false;
//});

/**CheckBox
 * Validar si es profesor o estudiante
 * desabilitar un check cundo uno ya este seleccionado, para evitar mandar los dos datos y generar error
 */

const checkProfesor = document.querySelector("#profesor");
const checkEstudiante = document.querySelector("#estudiante");
checkProfesor.checked = false;
checkEstudiante.checked = false;

// Desabilitar el check cuando se selecciona uno de los roles.
checkProfesor.addEventListener("change", (event) => {
  console.log("Profesor:" + checkProfesor.checked);
  checkEstudiante.disabled = event.target.checked;
  //checkEstudiante.disabled = document.querySelector("#profesor").checked;
});

checkEstudiante.addEventListener("change", (event) => {
  console.log("Estudiante:" + checkEstudiante.checked);
  checkProfesor.disabled = event.target.checked;
  //checkProfesor.disabled = document.querySelector("#estudiante").checked;
});
