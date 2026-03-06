<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="container" style="padding-top: 20px; padding-bottom: 40px; width:100%;">
    <div class="tarjeta-formulario">
        <h2 class="titulo-moderno">
            <div class="icono-titulo"><i class="fas fa-cart-plus"></i></div>
            Adicionar solicitud de compras
        </h2>
        
        <form id="purchaseRequestForm" novalidate>
            
            <style>
                /* --- MEJORA UI 1: TARJETA PRINCIPAL --- */
                .tarjeta-formulario {
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
                    padding: 30px;
                    position: relative; /* Para la barra pegajosa */
                }

                /* 1. Tipografía y Espaciado Global */
                #purchaseRequestForm {
                    font-family: 'Inter', 'Helvetica Neue', Helvetica, Arial, sans-serif;
                }
                .titulo-moderno {
                    font-family: 'Inter', sans-serif;
                    font-weight: 800 !important;
                    color: #111827 !important;
                    font-size: 24px !important; 
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    padding-bottom: 15px; 
                    border-bottom: 2px solid #F3F4F6;
                    margin-top: 0; 
                    margin-bottom: 20px; 
                }
                .titulo-moderno .icono-titulo {
                    background-color: #EFF6FF;
                    color: #3B82F6;
                    width: 42px; 
                    height: 42px; 
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius: 10px;
                    font-size: 18px;
                    box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.15);
                }
                #purchaseRequestForm .row { margin-bottom: 10px; }
                
                /* 2. Etiquetas Modernas */
                #purchaseRequestForm label {
                    font-weight: 600;
                    color: #6B7280;
                    font-size: 12px; 
                    margin-bottom: 4px; 
                    display: block; 
                }
                #purchaseRequestForm label i { margin-right: 4px; }
                
                /* 3. Estética de Inputs */
                #purchaseRequestForm .form-control {
                    border-radius: 6px;
                    border: 1px solid #D1D5DB;
                    height: 36px; 
                    padding: 6px 12px;
                    box-shadow: none;
                    font-size: 13px;
                }
                #purchaseRequestForm .form-control:focus {
                    border-color: #3B82F6;
                    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
                }
                
                /* MEJORA UI 2: Textareas expandibles sin scrollbar */
                textarea.form-control {
                    resize: none; /* Quitamos la flechita de arrastrar */
                    overflow: hidden; /* Ocultamos el scroll */
                    min-height: 36px;
                }

                /* --- ESTILIZACIÓN COMPLETA DE SELECT2 --- */
                .select2-container .select2-selection--single {
                    height: 36px !important; 
                    border: 1px solid #D1D5DB !important;
                    border-radius: 6px !important;
                    display: flex !important;
                    align-items: center !important;
                    font-family: 'Inter', sans-serif !important;
                }
                .select2-container--default.select2-container--focus .select2-selection--single,
                .select2-container--default.select2-container--open .select2-selection--single {
                    border-color: #3B82F6 !important;
                    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
                    outline: none !important;
                }
                .select2-container--default .select2-selection--single .select2-selection__arrow {
                    height: 34px !important;
                    top: 0 !important;
                }
                .select2-container--default .select2-selection--single .select2-selection__rendered {
                    color: #374151 !important;
                    font-size: 13px !important;
                    padding-left: 12px !important;
                    line-height: normal !important;
                }
                .select2-dropdown {
                    border: 1px solid #D1D5DB !important;
                    border-radius: 0 0 8px 8px !important;
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
                    font-family: 'Inter', sans-serif !important;
                    overflow: hidden !important;
                }
                .select2-container--default .select2-search--dropdown .select2-search__field {
                    border: 1px solid #D1D5DB !important;
                    border-radius: 6px !important;
                    padding: 6px 10px !important;
                    outline: none !important;
                    font-family: 'Inter', sans-serif !important;
                    font-size: 13px !important;
                    margin-top: 4px !important;
                }
                .select2-container--default .select2-search--dropdown .select2-search__field:focus {
                    border-color: #3B82F6 !important;
                    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
                }
                .select2-container--default .select2-results__option {
                    padding: 6px 12px !important;
                    font-size: 13px !important;
                    color: #374151 !important;
                }
                .select2-container--default .select2-results__option--highlighted[aria-selected],
                .select2-container--default .select2-results__option--highlighted[aria-selected]:hover {
                    background-color: #3B82F6 !important;
                    color: #FFFFFF !important;
                }

                /* 4. Gestión de Archivos Ocultos */
                .file-input-hidden { display: none !important; }

                /* 5. Tarjetas Compactas de Carga */
                #purchaseRequestForm label.file-card {
                    border: 2px dashed #D1D5DB;
                    background-color: #F9FAFB;
                    border-radius: 8px;
                    display: flex !important;
                    flex-direction: row; 
                    align-items: center;
                    justify-content: center;
                    height: 42px; 
                    cursor: pointer;
                    transition: all 0.2s;
                    color: #6B7280;
                    padding: 0 12px;
                    margin-bottom: 0;
                }
                #purchaseRequestForm label.file-card p,
                #purchaseRequestForm label.file-card i {
                    margin: 0 !important;
                    line-height: 1 !important;
                }
                /* MEJORA UX 3: Efecto visual al arrastrar y soltar (Drag & Drop) */
                .file-card:hover, .file-card.drag-over {
                    border-color: #3B82F6 !important;
                    background-color: #EFF6FF !important;
                    transform: scale(1.02);
                }
                .file-card .placeholder-info { display: flex; align-items: center; justify-content: center; width: 100%; gap: 6px; }
                .file-card i.main-icon { font-size: 16px; }
                .file-card .text-title { font-weight: 700; color: #1F2937; font-size: 12px; pointer-events: none; }
                .file-card .text-subtitle { color: #6B7280; font-size: 11px; pointer-events: none; }

                .file-card.has-file { border-style: solid; border-color: #10B981; background-color: #ECFDF5; color: #1F2937; transform: none;}
                .file-card.has-file i.main-icon { color: #10B981; }
                .file-card .file-info { display: none; }
                .file-card.has-file .placeholder-info { display: none; }
                .file-card.has-file .file-info { display: flex; align-items: center; width: 100%; font-weight: 600; gap: 8px; }
                .file-card.has-file .file-name { flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 12px; }
                .file-card.has-file .remove-file { background: none; border: none; color: #6B7280; font-size: 16px; cursor: pointer; padding: 0 0 0 10px; }
                .file-card.has-file .remove-file:hover { color: #EF4444; }

                /* 6. Panel y Grilla de Productos */
                #detalleProductosSection { margin-top: 10px; }
                #detalleProductosSection .panel { border-radius: 10px; border: none; box-shadow: 0 4px 10px rgba(0,0,0,0.03); overflow: visible; }
                #detalleProductosSection .panel-heading {
                    background-color: #fff;
                    color: #1F2937;
                    border-bottom: 1px solid #eee;
                    font-weight: 700;
                    padding: 10px 15px; 
                    font-size: 13px;
                }
                .fila-producto {
                    display: flex;
                    align-items: flex-end; 
                    flex-wrap: wrap; 
                    padding: 10px 15px; 
                    margin: 0;
                    border-bottom: 1px solid #E5E7EB;
                    transition: background-color 0.2s ease;
                }
                .fila-producto .form-group { margin-bottom: 0 !important; width: 100%; }
                .fila-producto ~ .fila-producto label { display: none !important; }
                .fila-producto ~ .fila-producto { padding-top: 6px; }

                .fila-producto[data-estado="pendiente"] { background-color: #F8FAFC; }
                .fila-producto[data-estado="confirmado"] { background-color: #FFFFFF; }

                .btn-accion-texto {
                    display: flex; align-items: center; justify-content: center; gap: 6px; 
                    height: 36px; font-weight: 600; font-size: 12px; border-radius: 6px; border: none; transition: all 0.2s; width: 100%;
                }

                .contenedor-resultados {
                    position: absolute; top: 100%; left: 0; right: 0; width: 100%; z-index: 9999;
                    background: white; border: 1px solid #D1D5DB; border-top: none; border-radius: 0 0 6px 6px; 
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); max-height: 180px; overflow-y: auto; display: none; padding: 0; margin: 0;
                }
                .contenedor-resultados .list-group-item {
                    cursor: pointer; border-left: none; border-right: none; border-radius: 0; margin-bottom: 0;
                    color: #374151; transition: background-color 0.1s; padding: 8px 12px !important;
                }
                .contenedor-resultados .list-group-item:hover,
                .contenedor-resultados .list-group-item.active { background-color: #3B82F6 !important; color: #FFFFFF !important; }
                .contenedor-resultados .list-group-item:hover span,
                .contenedor-resultados .list-group-item.active span { color: #E0E7FF !important; }

                /* 7. Observaciones */
                #observacion {
                    border-radius: 8px; border: 1px solid #D1D5DB; font-size: 13px; height: 60px; 
                }

                /* MEJORA UI 3: Barra Inferior "Pegajosa" (Sticky) */
                .barra-acciones {
                    position: sticky;
                    bottom: 0;
                    background-color: rgba(255, 255, 255, 0.95);
                    backdrop-filter: blur(5px);
                    z-index: 1000;
                    padding: 15px 30px; /* Recuperamos el padding de la tarjeta contenedora */
                    margin: 20px -30px -30px -30px; /* Negativo para estirarse a los bordes de la tarjeta */
                    border-top: 1px solid #E5E7EB;
                    border-radius: 0 0 12px 12px;
                    box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.05); /* Sombra hacia arriba */
                }
                .btn-moderno {
                    border-radius: 6px; font-weight: 700; font-size: 13px; transition: all 0.2s; display: inline-flex; align-items: center; padding: 8px 16px;
                }
                .btn-moderno i { margin-right: 6px; }
                .btn-moderno-defecto { background-color: #fff; color: #6B7280; border: 1px solid #D1D5DB; }
                .btn-moderno-defecto:hover { background-color: #F9FAFB; border-color: #D1D5DB; color: #1F2937; }
                .btn-moderno-primario { background-color: #3B82F6; color: #fff; border: 1px solid #3B82F6; }
                .btn-moderno-primario:hover { background-color: #2563EB; border-color: #2563EB; }

                /* --- SISTEMA DE NOTIFICACIONES TOAST --- */
                #toast-container { position: fixed; top: 20px; right: 20px; z-index: 10000; display: flex; flex-direction: column; gap: 10px; pointer-events: none; }
                .toast-msg {
                    min-width: 280px; background-color: #ffffff; color: #1F2937; padding: 14px 18px; border-radius: 8px;
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                    display: flex; align-items: center; gap: 12px; font-family: 'Inter', sans-serif; font-size: 13px; font-weight: 600;
                    border-left: 4px solid #3B82F6; animation: slideInRight 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) forwards; transition: opacity 0.3s ease, transform 0.3s ease;
                }
                .toast-msg.error { border-left-color: #EF4444; }
                .toast-msg.error i { color: #EF4444; font-size: 18px; }
                .toast-msg.success { border-left-color: #10B981; }
                .toast-msg.success i { color: #10B981; font-size: 18px; }
                @keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
                .input-error { border-color: #EF4444 !important; box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important; }
            </style>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="empresa"><i class="fas fa-building"></i> Empresa *</label>
                        <select id="empresa" name="empresa" class="form-control select2-busqueda" required>
                            <option value="">Seleccione Empresa</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="centroCostos"><i class="fas fa-chart-pie"></i> Centro de Costos *</label>
                        <select id="centroCostos" name="centroCostos" class="form-control select2-busqueda" required disabled>
                            <option value="">Seleccione Centro de Costos</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="categoria"><i class="fas fa-tag"></i> Categoría *</label>
                        <select id="categoria" name="categoria" class="form-control select2-busqueda" required>
                            <option value="">Seleccione Categoría</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><i class="fas fa-paperclip"></i> Adjunto 1 (PDF/Excel)</label>
                        <input type="file" id="adjunto1" name="adjunto1" class="file-input-hidden" accept=".pdf, .xlsx, .xls">
                        <label for="adjunto1" class="file-card">
                            <div class="placeholder-info">
                                <i class="fas fa-cloud-upload-alt main-icon"></i>
                                <p class="text-title">Subir o Arrastrar archivo</p>
                                <p class="text-subtitle">(Máx 5MB)</p>
                            </div>
                            <div class="file-info">
                                <i class="fas fa-file-pdf main-icon"></i>
                                <p class="file-name nombre-archivo-moderno">...</p>
                                <button type="button" class="remove-file quitar-archivo-moderno">&times;</button>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><i class="fas fa-paperclip"></i> Adjunto 2</label>
                        <input type="file" id="adjunto2" name="adjunto2" class="file-input-hidden" accept=".pdf, .xlsx, .xls">
                        <label for="adjunto2" class="file-card">
                            <div class="placeholder-info">
                                <i class="fas fa-cloud-upload-alt main-icon"></i>
                                <p class="text-title">Subir o Arrastrar archivo</p>
                                <p class="text-subtitle">(Máx 5MB)</p>
                            </div>
                            <div class="file-info">
                                <i class="fas fa-file-pdf main-icon"></i>
                                <p class="file-name nombre-archivo-moderno">...</p>
                                <button type="button" class="remove-file quitar-archivo-moderno">&times;</button>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><i class="fas fa-paperclip"></i> Adjunto 3</label>
                        <input type="file" id="adjunto3" name="adjunto3" class="file-input-hidden" accept=".pdf, .xlsx, .xls">
                        <label for="adjunto3" class="file-card">
                            <div class="placeholder-info">
                                <i class="fas fa-cloud-upload-alt main-icon"></i>
                                <p class="text-title">Subir o Arrastrar archivo</p>
                                <p class="text-subtitle">(Máx 5MB)</p>
                            </div>
                            <div class="file-info">
                                <i class="fas fa-file-pdf main-icon"></i>
                                <p class="file-name nombre-archivo-moderno">...</p>
                                <button type="button" class="remove-file quitar-archivo-moderno">&times;</button>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div id="detalleProductosSection" style="display: none;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong><i class="fas fa-list-ul"></i> Detalle de productos</strong> 
                        <span id="contador-productos-txt" class="text-muted" style="font-weight: normal; margin-left: 5px;">(0 de 100)</span>
                    </div>
                    <div class="panel-body" id="productosContainer" style="padding: 0;">
                        </div>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="observacion"><i class="fas fa-comment-dots"></i> Observación *</label>
                        <textarea id="observacion" name="observacion" class="form-control" rows="2" required></textarea>
                    </div>
                </div>
            </div>

            <div class="row barra-acciones">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-default btn-moderno btn-moderno-defecto" onclick="window.history.back()">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary btn-moderno btn-moderno-primario">
                        <i class="fas fa-paper-plane"></i> Enviar solicitud a aprobación
                    </button>
                </div>
            </div>
        </form>
    </div> </div>

<script>
// =====================================================================
// FUNCIONES DE UTILIDAD: TOAST, AUTORESIZE Y DIRTY GUARD
// =====================================================================

function mostrarAlerta(mensaje, tipo = 'error') {
    let container = document.getElementById('toast-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        document.body.appendChild(container);
    }
    const toast = document.createElement('div');
    toast.className = `toast-msg ${tipo}`;
    let icon = tipo === 'error' ? 'fa-exclamation-circle' : (tipo === 'success' ? 'fa-check-circle' : 'fa-info-circle');
    toast.innerHTML = `<i class="fas ${icon}"></i> <span>${mensaje}</span>`;
    container.appendChild(toast);
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => toast.remove(), 300);
    }, 3500);
}

// MEJORA UI 2: Textareas que crecen solos (Auto-expand)
function autoResizeTextarea(element) {
    element.style.height = 'auto'; // Resetea para recalcular
    element.style.height = (element.scrollHeight + 2) + 'px'; // Ajusta al scrollHeight real
}
document.addEventListener('input', function (e) {
    if (e.target.tagName.toLowerCase() === 'textarea') {
        autoResizeTextarea(e.target);
    }
}, false);

// MEJORA UX 2: Guardián contra pérdida de datos accidental
let formModificado = false;
document.getElementById('purchaseRequestForm').addEventListener('input', () => formModificado = true);
document.getElementById('purchaseRequestForm').addEventListener('change', () => formModificado = true);

window.addEventListener('beforeunload', (e) => {
    if (formModificado) {
        e.preventDefault();
        e.returnValue = 'Tiene cambios sin guardar. ¿Seguro que desea abandonar la página?';
    }
});

// MEJORA UX 4: Contador de Productos en Grilla
function actualizarContadorProductos() {
    const confirmados = document.querySelectorAll('.fila-producto[data-estado="confirmado"]').length;
    document.getElementById('contador-productos-txt').innerText = `(${confirmados} de 100)`;
}

// PERSONALIZACIÓN DE MENSAJES DE VALIDACIÓN HTML5
document.addEventListener("DOMContentLoaded", function() {
    const elementosRequeridos = document.querySelectorAll('[required]');
    elementosRequeridos.forEach(elemento => {
        elemento.addEventListener('invalid', function(e) {
            e.target.setCustomValidity(''); 
            if (!e.target.validity.valid) {
                if (e.target.tagName === 'SELECT') e.target.setCustomValidity('Por favor, seleccione una opción de la lista.');
                else e.target.setCustomValidity('Por favor, complete este campo obligatorio.');
            }
        });
        elemento.addEventListener('input', (e) => e.target.setCustomValidity(''));
        elemento.addEventListener('change', (e) => e.target.setCustomValidity(''));
    });
});

// =====================================================================
// INICIALIZACIÓN DE SELECT2
// =====================================================================
$(document).ready(function() {
    $('.select2-busqueda').select2({
        width: '100%',
        language: { noResults: function() { return "No se encontraron resultados"; } }
    });
    $('#empresa, #categoria').on('select2:select', function (e) {
        this.dispatchEvent(new Event('change'));
    });
    $('#categoria').on('select2:selecting', function (e) {
        const confirmados = document.querySelectorAll('#productosContainer .fila-producto[data-estado="confirmado"]');
        if (confirmados.length > 0) {
            e.preventDefault(); 
            mostrarAlerta('No puede cambiar la categoría si ya hay productos agregados. Quítelos primero.', 'error');
            const selectContainer = document.querySelector('[aria-labelledby="select2-categoria-container"]').parentElement;
            selectContainer.classList.add('input-error');
            setTimeout(() => selectContainer.classList.remove('input-error'), 2500);
        }
    });
});

// =====================================================================
// MANEJADORES DE ARCHIVOS (Con MEJORA UX 3: Drag & Drop)
// =====================================================================
function procesarArchivo(file, inputElement, cardElement) {
    if (file) {
        const maxSize = 5 * 1024 * 1024;
        const allowedTypes = ['application/pdf', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'];
        if (file.size > maxSize || !allowedTypes.includes(file.type)) {
            mostrarAlerta('Archivo no válido. Solo PDF/Excel hasta 5MB.', 'error');
            resetFilaArchivo(inputElement, cardElement);
            return;
        }
        cardElement.classList.add('has-file');
        cardElement.querySelector('.nombre-archivo-moderno').textContent = file.name;
    } else {
        resetFilaArchivo(inputElement, cardElement);
    }
}

function resetFilaArchivo(input, card) {
    input.value = '';
    card.classList.remove('has-file');
    card.querySelector('.nombre-archivo-moderno').textContent = '...';
}

document.querySelectorAll('.file-input-hidden').forEach(input => {
    // Al seleccionar click clásico
    input.addEventListener('change', function() {
        procesarArchivo(this.files[0], this, document.querySelector(`label.file-card[for="${this.id}"]`));
    });
});

// Eventos de arrastrar y soltar
document.querySelectorAll('.file-card').forEach(card => {
    card.addEventListener('dragover', (e) => {
        e.preventDefault();
        card.classList.add('drag-over');
    });
    card.addEventListener('dragleave', (e) => {
        e.preventDefault();
        card.classList.remove('drag-over');
    });
    card.addEventListener('drop', (e) => {
        e.preventDefault();
        card.classList.remove('drag-over');
        if (e.dataTransfer.files.length) {
            const inputId = card.getAttribute('for');
            const input = document.getElementById(inputId);
            input.files = e.dataTransfer.files; // Asignamos los archivos soltados al input nativo
            procesarArchivo(input.files[0], input, card);
        }
    });
});

document.querySelectorAll('.quitar-archivo-moderno').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault(); 
        const card = this.closest('.file-card');
        resetFilaArchivo(document.getElementById(card.getAttribute('for')), card);
    });
});

// =====================================================================
// FUNCIONES CORE, SELECTORES Y SUBMIT
// =====================================================================
const form = document.getElementById('purchaseRequestForm');
const selectEmpresa = document.getElementById('empresa');
const selectCC = document.getElementById('centroCostos');
const selectCat = document.getElementById('categoria');
const detalleSection = document.getElementById('detalleProductosSection');

fetchData('json.php?c=catalog&a=catalogo&cat=empresa_user', selectEmpresa);
fetchData('json.php?c=catalog&a=catalogo&cat=categoria_compra', selectCat);

selectEmpresa.addEventListener('change', (e) => {
    const id = e.target.value;
    selectCC.innerHTML = '<option value="">Cargando...</option>';
    $(selectCC).prop('disabled', !id).trigger('change.select2'); 
    if (id) fetchData(`json.php?c=catalog&a=catalogo&cat=cc_user&id=${id}`, selectCC);
});

selectCat.addEventListener('change', (e) => {
    const container = document.getElementById('productosContainer');
    if (e.target.value) {
        detalleSection.style.display = 'block';
        container.innerHTML = ''; 
        agregarFilaProducto();
    } else {
        detalleSection.style.display = 'none';
        container.innerHTML = ''; 
    }
});

async function fetchData(url, element) {
    try {
        const res = await fetch(url);
        const data = await res.json();
        element.innerHTML = '<option value="">Seleccione una opción</option>';
        const optgroups = {};
        if(data.exito && data.catalogo) {
            data.catalogo.forEach(item => {
                const opt = document.createElement('option');
                opt.value = item.keyCode;
                opt.textContent = item.keyValue;
                if (item.keyGroup) {
                    if (!optgroups[item.keyGroup]) {
                        const groupEl = document.createElement('optgroup');
                        groupEl.label = item.keyGroup;
                        element.appendChild(groupEl);
                        optgroups[item.keyGroup] = groupEl;
                    }
                    optgroups[item.keyGroup].appendChild(opt);
                } else { element.appendChild(opt); }
            });
            if (window.jQuery && $(element).hasClass("select2-hidden-accessible")) {
                $(element).trigger('change.select2');
            }
        }
    } catch (err) { console.error("Error cargando datos:", err); }
}

// =====================================================================
// LIMPIEZA DE ERRORES VISUALES AL ESCRIBIR/SELECCIONAR
// =====================================================================
// Si el usuario corrige la observación, le quitamos el borde rojo al instante
document.getElementById('observacion').addEventListener('input', function() {
    this.classList.remove('input-error');
});

// Si el usuario selecciona algo en los selects, les quitamos el borde rojo
$('#empresa, #centroCostos, #categoria').on('select2:select', function() {
    $(this).next('.select2-container').removeClass('input-error');
});

// =====================================================================
// VALIDACIÓN GENERAL Y ENVÍO DEL FORMULARIO
// =====================================================================
form.addEventListener('submit', async (e) => {
    e.preventDefault(); // Detenemos el envío nativo

    // 1. Validar Empresa
    if (selectEmpresa.value === '') {
        mostrarAlerta('Debe seleccionar una Empresa.', 'error');
        $(selectEmpresa).next('.select2-container').addClass('input-error');
        return;
    }

    // 2. Validar Centro de Costos
    if (selectCC.value === '') {
        mostrarAlerta('Debe seleccionar un Centro de Costos.', 'error');
        $(selectCC).next('.select2-container').addClass('input-error');
        return;
    }

    // 3. Validar Categoría
    if (selectCat.value === '') {
        mostrarAlerta('Debe seleccionar una Categoría.', 'error');
        $(selectCat).next('.select2-container').addClass('input-error');
        return;
    }

    // 4. Validar Productos (Mínimo 1)
    const container = document.getElementById('productosContainer');
    const confirmados = container.querySelectorAll('[data-estado="confirmado"]');
    const pendiente = container.querySelector('[data-estado="pendiente"]');
    
    if (confirmados.length === 0) {
        mostrarAlerta('Debe completar y Agregar (+) al menos un producto.', 'error');
        if (pendiente) pendiente.querySelector('.btn-success').focus();
        return;
    }

    // 5. Validar Observación (¡AQUÍ ESTÁ LA SOLUCIÓN AL BUG!)
    const inputObservacion = document.getElementById('observacion');
    if (inputObservacion.value.trim() === '') {
        mostrarAlerta('El campo de observación es obligatorio.', 'error');
        inputObservacion.classList.add('input-error');
        inputObservacion.focus();
        return; // Detenemos el envío
    }

    // --- Si todo está perfecto, preparamos el envío ---
    if (pendiente) pendiente.querySelectorAll('input, textarea, button').forEach(el => el.disabled = true);
    
    const formData = new FormData(form);

    console.log(formData);
    
    // Restauramos la fila por si hay error en el servidor
    if (pendiente) pendiente.querySelectorAll('input, textarea, button').forEach(el => el.disabled = false);
    
    try {
        const response = await fetch('/api/solicitudes/enviar', {
            method: 'POST',
            body: formData
        });
        if (response.ok) {
            formModificado = false; // Desactivar alerta de "perder cambios"
            mostrarAlerta('¡Solicitud enviada con éxito!', 'success');
            setTimeout(() => window.location.reload(), 1500);
        }
    } catch (error) {
        mostrarAlerta('Error al conectar con el servidor. Intente de nuevo.', 'error');
    }
});

// =====================================================================
// LÓGICA DE GRILLA INLINE Y BUSCADOR (Mantener igual)
// =====================================================================
let rowCount = 0;
const MAX_ITEMS = 100;

function agregarFilaProducto() {
    const container = document.getElementById('productosContainer');
    if (container.children.length >= MAX_ITEMS) return; 

    rowCount++;
    const rowId = `producto_row_${rowCount}`;
    const idCategoria = selectCat.value; 
    
    const html = `
        <div class="row fila-producto" id="${rowId}" data-estado="pendiente">
            <div class="col-md-2">
                <div class="form-group">
                    <label><i class="fas fa-hashtag"></i> Cant.</label>
                    <input type="number" name="productos[${rowCount}][cantidad]" class="form-control cantidad-input" min="1" step="1" value="1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="position: relative;">
                    <label><i class="fas fa-box"></i> Producto (Búsqueda)</label>
                    <input type="text" class="form-control producto-search" placeholder="Buscar..." autocomplete="off">
                    <input type="hidden" name="productos[${rowCount}][id_producto]" class="producto-id-hidden">
                    <ul class="list-group product-results contenedor-resultados"></ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label><i class="fas fa-align-left"></i> Descripción</label>
                    <textarea name="productos[${rowCount}][descripcion]" class="form-control descripcion-input" rows="1" placeholder="Detalles del producto..."></textarea>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group action-buttons">
                    <label class="hidden-xs hidden-sm">&nbsp;</label>
                    <button type="button" class="btn btn-success btn-accion-texto btn-accion" onclick="confirmarFila('${rowId}')" title="Agregar a la lista">
                        <i class="fas fa-plus"></i> Agregar
                    </button>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
    inicializarBuscadorFila(document.getElementById(rowId), idCategoria);
}

window.confirmarFila = function(rowId) {
    const row = document.getElementById(rowId);
    const inputCantidad = row.querySelector('.cantidad-input');
    const inputProducto = row.querySelector('.producto-search');
    const inputIdProducto = row.querySelector('.producto-id-hidden');
    const inputDescripcion = row.querySelector('.descripcion-input');

    const cantidad = inputCantidad.value;
    const producto = inputProducto.value.trim();
    const idProducto = inputIdProducto.value;
    const descripcion = inputDescripcion.value.trim();

    if (!cantidad || Number(cantidad) < 1 || !Number.isInteger(Number(cantidad))) {
        mostrarAlerta('La cantidad debe ser un entero mayor o igual a 1.', 'error');
        inputCantidad.classList.add('input-error'); inputCantidad.focus();
        setTimeout(() => inputCantidad.classList.remove('input-error'), 2500); 
        return;
    }

    if (producto === '' && descripcion === '') {
        mostrarAlerta('Debe seleccionar un Producto o escribir una Descripción.', 'error');
        inputProducto.classList.add('input-error'); inputDescripcion.classList.add('input-error'); inputProducto.focus();
        setTimeout(() => { inputProducto.classList.remove('input-error'); inputDescripcion.classList.remove('input-error'); }, 2500); 
        return;
    }

    if (producto !== '' && idProducto === '') {
        mostrarAlerta('Producto ingresado no existe. Seleccione uno de la lista o déjelo en blanco.', 'error');
        inputProducto.classList.add('input-error'); inputProducto.focus();
        setTimeout(() => inputProducto.classList.remove('input-error'), 2500); 
        return;
    }

    const filasConfirmadas = Array.from(document.querySelectorAll('#productosContainer .fila-producto[data-estado="confirmado"]'));

    if (idProducto !== '') {
        const idsConfirmados = filasConfirmadas.map(r => r.querySelector('.producto-id-hidden').value);
        if (idsConfirmados.includes(idProducto)) {
            mostrarAlerta('Este producto del catálogo ya está en la lista.', 'error');
            inputProducto.classList.add('input-error');
            setTimeout(() => inputProducto.classList.remove('input-error'), 3000);
            return;
        }
    } else {
        const descripcionesSinProducto = filasConfirmadas
            .filter(r => r.querySelector('.producto-id-hidden').value === '') 
            .map(r => r.querySelector('.descripcion-input').value.trim().toLowerCase());

        if (descripcionesSinProducto.includes(descripcion.toLowerCase())) {
            mostrarAlerta('Ya ingresó un ítem manual con esta misma descripción.', 'error');
            inputDescripcion.classList.add('input-error');
            inputDescripcion.focus();
            setTimeout(() => inputDescripcion.classList.remove('input-error'), 3000);
            return;
        }
    }

    row.dataset.estado = "confirmado";
    inputCantidad.readOnly = true;
    inputProducto.readOnly = true;
    inputDescripcion.readOnly = true;

    const actionContainer = row.querySelector('.action-buttons');
    actionContainer.innerHTML = `
        <label class="hidden-xs hidden-sm">&nbsp;</label>
        <button type="button" class="btn btn-danger btn-accion-texto btn-accion" onclick="eliminarFila('${rowId}')" title="Eliminar fila">
            <i class="fas fa-trash-alt"></i> Quitar
        </button>
    `;

    actualizarContadorProductos(); 
    agregarFilaProducto(); 
};

window.eliminarFila = function(rowId) {
    const row = document.getElementById(rowId);
    if (row) row.remove();
    
    actualizarContadorProductos(); 

    const container = document.getElementById('productosContainer');
    const pendingRow = container.querySelector('[data-estado="pendiente"]');
    if (!pendingRow && container.children.length < MAX_ITEMS) agregarFilaProducto();
};

function inicializarBuscadorFila(rowElement, idCategoria) {
    const inputSearch = rowElement.querySelector('.producto-search');
    const resultList = rowElement.querySelector('.product-results');
    const inputHiddenId = rowElement.querySelector('.producto-id-hidden');
    const inputDesc = rowElement.querySelector('.descripcion-input');
    
    let timeout = null; let currentFocus = -1;

    inputSearch.addEventListener('input', (e) => {
        clearTimeout(timeout);
        const query = e.target.value;
        currentFocus = -1;
        inputHiddenId.value = ''; 
        
        if (query.length < 3) { resultList.style.display = 'none'; return; }

        timeout = setTimeout(() => {
            const searchData = new FormData();
            searchData.append('search', query);

            fetch(`json.php?c=catalog&a=catalogo_search&cat=productos_cat&id=${idCategoria}`, {
                method: 'POST', body: searchData
            })
            .then(res => res.json())
            .then(data => renderizarResultados(data))
            .catch(err => console.error("Error buscando:", err));
        }, 500);
    });

    inputSearch.addEventListener('keydown', function(e) {
        let items = resultList.getElementsByTagName('li');
        if (resultList.style.display === 'none' || items.length === 0) return;

        if (e.key === "ArrowDown") { currentFocus++; manejarFocoVisible(items); } 
        else if (e.key === "ArrowUp") { currentFocus--; manejarFocoVisible(items); } 
        else if (e.key === "Enter") {
            e.preventDefault(); 
            if (currentFocus > -1 && items[currentFocus]) items[currentFocus].click();
        }
    });

    function renderizarResultados(data) {
        resultList.innerHTML = '';
        if (data.exito && Array.isArray(data.catalogo) && data.catalogo.length > 0) {
            data.catalogo.forEach((item, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item'; 
                li.innerHTML = `<strong>${item.keyValue}</strong><br/> <span style="color: #6B7280; font-size: 11px;">${item.keyDescription || ''}</span>`;

                li.addEventListener('mouseover', () => {
                    let items = resultList.getElementsByTagName('li');
                    for (let i = 0; i < items.length; i++) items[i].classList.remove("active");
                    li.classList.add('active');
                    currentFocus = index;
                });

                li.addEventListener('click', () => {
                    inputSearch.value = item.keyValue;
                    inputHiddenId.value = item.keyCode; 
                    inputDesc.value = item.keyDescription ? item.keyDescription : '';
                    autoResizeTextarea(inputDesc); 
                    resultList.style.display = 'none';
                    // Al autocompletar, quitamos el error visual si lo tuviera
                    inputSearch.classList.remove('input-error');
                });
                resultList.appendChild(li);
            });
            resultList.style.display = 'block';
            currentFocus = 0; 
            manejarFocoVisible(resultList.getElementsByTagName('li'));
        } else {
            resultList.innerHTML = '<li class="list-group-item text-muted" style="border: none; font-size: 11px; padding: 10px 15px;">Sin resultados...</li>';
            resultList.style.display = 'block';
            currentFocus = -1;
        }
    }

    function manejarFocoVisible(items) {
        for (let i = 0; i < items.length; i++) items[i].classList.remove("active");
        if (currentFocus >= items.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (items.length - 1);
        items[currentFocus].classList.add("active");
        items[currentFocus].scrollIntoView({ block: "nearest", behavior: "smooth" });
    }
}

document.addEventListener('click', (e) => {
    if (!e.target.classList.contains('producto-search')) {
        document.querySelectorAll('.contenedor-resultados').forEach(ul => ul.style.display = 'none');
    }
});
</script>