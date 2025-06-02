<!-- Modal Editar Usuario -->
<div id="modalEditar" class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-sm hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-md">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Editar Usuario</h2>
        <form id="formEditarUsuario" class="space-y-4">
            <input type="hidden" id="edit-id">

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                <input type="text" id="edit-nombre" required
                    class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido</label>
                <input type="text" id="edit-apellido" required
                    class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Usuario</label>
                <input type="text" id="edit-username" required
                    class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rol</label>
                <select id="edit-rol"
                    class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="profesor">Profesor</option>
                    <option value="estudiante">Estudiante</option>
                </select>
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" onclick="cerrarModalEditar()"
                    class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
</div>