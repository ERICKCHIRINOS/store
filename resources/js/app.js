import './bootstrap';
import * as bootstrap from 'bootstrap';

import TomSelect from 'tom-select';
import 'tom-select/dist/css/tom-select.css';

import '../scss/app.scss';

const toast = document.querySelector('.toast');
const clientesSelect = document.querySelector('#cliente_id');
const empleadosSelect = document.querySelector('#empleado_id');
const categoriasSelect = document.querySelector('#categoria_id');

if (toast) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast);
    toastBootstrap.show();
}

if (clientesSelect) {
    new TomSelect(clientesSelect, {
        create: false,
        placeholder: 'Buscar cliente por nombre o código...',
        maxOptions: 100,

        render: {
            no_results: function(data, escape) {
                return '<div class="no-results">No se encontraron clientes.</div>';
            }
        }
    });
}

if (empleadosSelect) {
    new TomSelect(empleadosSelect, {
        create: false,
        placeholder: 'Buscar empleado por nombre o código...',
        maxOptions: 100,

        render: {
            no_results: function(data, escape) {
                return '<div class="no-results">No se encontraron Empleados.</div>';
            }
        }
    });
}

if (categoriasSelect) {
    new TomSelect(categoriasSelect, {
        create: false,
        placeholder: 'Buscar categoria por nombre o id...',
        maxOptions: 100,

        render: {
            no_results: function(data, escape) {
                return '<div class="no-results">No se encontraron Categorias.</div>';
            }
        }
    });
}
