//[Data Table Javascript]

//Project:	Crypto Tokenizer UI Interface & Cryptocurrency Admin Template
//Primary use:   Used only for the Data Table

$(function () {
    "use strict";


    //Formato bases
    //Agrupados de modulos
    $('#modulo').DataTable({

        "scrollY": 450,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    });
    //listas de existencia
    $('#existencia').DataTable({
        "fixedHeader": true,
        "scrollY": 450,
        "scrollX": true,
        'paging': false,
        'lengthChange': true, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        "orderCellsTop": true,
        'info': true,
        'autoWidth': false,
        'responsive': false,        
        'order': [
            [0, 'desc'],
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    });
    //LISTAR GENERAL REGISTROS
    $('#listar').DataTable({
        "scrollY": 450,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'responsive': false,
        'order': [
            [0, 'asc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });
    //LISTA DE SELECION DE EXISTENCIA PARA LOS MODULOS
    $('#selecionExistencia').DataTable({
        "scrollY": 400,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });
    //DETALLE De REGISTROS
    //DETALLE SELECION REPALETIZAJE 
    $('#ingreso').DataTable({
        "scrollY": 400,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });
    $('#salida').DataTable({
        "scrollY": 400,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });
    //DETALLE De REGISTROS RECEPCION
    $('#detalle').DataTable({

        "scrollY": 300,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': false,
        'order': [
            [0, 'asc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });
    //Usuario
    //LISTAR ACTIVIDAD USUARIO
    $('#listarActividad').DataTable({
        "scrollY": 440,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });
    //consolidados exportadora    
    var tableCons = $('#consolidado').DataTable({

        "scrollY": 450,
        "scrollX": true,
        'scrollCollapse': true,
        //'deferRender':    true,
        //'scroller': true,
        'paging': false,
        'fixedHeader': true,
        'fixedColumns':   false,
        //especificar la columna que se mantiene
        /*
        'fixedColumns':   {
            //'left': 1, //desde la izquierda
            //'right': 1 //desde la derecha
        },*/
        'colReorder': true,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': true, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': false,
        'order': [
            [0, 'asc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad",
                "collection": "Colección",
                "colvisRestore": "Restaurar visibilidad",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %d fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmentemente"
            },
            "decimal": ",",
            "searchBuilder": {
                "add": "Añadir Filtro",
                "button": {
                    "0": "Filtros",
                    "_": "Filtros(%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                'delete': 'Quitar',
                'deleteTitle': 'Titulo Quitar',
                "conditions": {
                    "date": {
                        "after": "Despues",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "notBetween": "No entre",
                        "notEmpty": "No Vacio",
                        "not": "Diferente de"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacio",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual que",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío",
                        "not": "Diferente de"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina en",
                        "equals": "Igual a",
                        "notEmpty": "No Vacio",
                        "startsWith": "Empieza con",
                        "not": "Diferente de",
                        "notContains": "No Contiene",
                        "notStarts": "No empieza con",
                        "notEnds": "No termina con"
                    },
                    "array": {
                        "not": "Diferente de",
                        "equals": "Igual",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "notEmpty": "No Vacío",
                        "without": "Sin"
                    }
                },
                "data": "Filtrar Por",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Filtros",
                    "_": "Filtros (%d)"
                },
                "value": "Valor"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d",
                "showMessage": "Mostrar Todo",
                "collapseMessage": "Colapsar Todo"
            },
            "select": {
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "%d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                },
                "rows": {
                    "1": "1 fila seleccionada",
                    "_": "%d filas seleccionadas"
                }
            },
            "thousands": ".",
            "datetime": {
                "previous": "Anterior",
                "next": "Proximo",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "AM",
                    "PM"
                ],
                "months": {
                    "0": "Enero",
                    "1": "Febrero",
                    "10": "Noviembre",
                    "11": "Diciembre",
                    "2": "Marzo",
                    "3": "Abril",
                    "4": "Mayo",
                    "5": "Junio",
                    "6": "Julio",
                    "7": "Agosto",
                    "8": "Septiembre",
                    "9": "Octubre"
                },
                "weekdays": [
                    "Dom",
                    "Lun",
                    "Mar",
                    "Mie",
                    "Jue",
                    "Vie",
                    "Sab"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                }
            },
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
        },  
        
        /*
        dom: 'Plfrtip',  
        searchPanes: {
            clear: true,
        },*/
        buttons: [
            'excel',
            'searchBuilder'
        ],
        dom: 'Bfrtip',
                    
    });
    //tableCons.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)');

    //Modulo Estadistica cuadros de resuemen
    $('#resumen').DataTable({

        "scrollY": true,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': false,
        'autoWidth': true,
        'responsive': false,
        "pagingType": "full_numbers",
        'order': [
            [0, 'asc'], //desc ->descente asc -> ascedente
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    });    
    $('#stockmp').DataTable({

        "scrollY": true,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': false,
        'autoWidth': true,
        'responsive': false,
        "pagingType": "full_numbers",
        'order': [
            [0, 'asc'], //desc ->descente asc -> ascedente
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    });
    //Historial de existencia   
    // CONFIGURAR LAS CELLAS DEL FOOTER COMO INPUT
    $('#hexistencia tfoot th').each( function (i) {
        var title = $('#hexistencia thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="'+title+'" data-index="'+i+'" />' );
    } );
    var tableHe = $('#hexistencia').DataTable({
        "fixedHeader": true,
        "scrollY": 450,
        "scrollX": true,
        'paging': false,
        'lengthChange': true, //ordernar por 10 25 100 500
        'searching': true, //buscador
        'ordering': true,
        "orderCellsTop": true,
        'info': true,
        'autoWidth': false,
        'responsive': false,        
        'order': [
            [0, 'desc'],
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    });
    // EVENTO DE FILTRO
    $( tableHe.table().container() ).on( 'keyup', 'tfoot input', function () {
        tableHe
            .column( $(this).data('index') )
            .search( this.value )
            .draw();
    } );


/*
        /* initComplete: function(){
             this.api().columns().every( function (d) {
                 var column = this;
                 var theadname = $('#hexistencia  th').eq([d]).text();
                 var select = $('<select class="form-control select2 "><option value="">'+theadname+'</option></select>').appendTo( $(column.footer())).on( 'change', function () {
                         var val = $.fn.dataTable.util.escapeRegex($(this).val());
                         column.search( val ? '^'+val+'$' : '', true, false ).draw();
                     } );

                     $(select).click(function(e){
                         e.stopPropagation();
                     });

                 column.data().unique().sort().each( function ( d, j ) {
                     var val = $.fn.dataTable.util.escapeRegex(d);
                     if (column.search() === "^" + val + "$") {
                         select.append('<option value="' + d + '" selected="selected">' + d.substr(0,30) + "</option>");
                     } else {
                         select.append('<option value="' + d + '">' + d + "</option>");
                     }
                 });
             });
         },
         */




    // $('#existencia thead tr').clone(true).appendTo('#existencia thead');

    /*
    $('#hexistencia tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" title="' + title + '" placeholder=" ' + title + '" />');
    });

    

    var table = $('#hexistencia').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        },
        "fixedHeader": true,
        "scrollY": 450,
        "scrollX": true,
        'paging': false,
        'lengthChange': true, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        "orderCellsTop": true,
        'info': true,
        'autoWidth': false,
        'responsive': false,        
        'order': [
            [0, 'desc'],
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    }).buttons().container().appendTo('#existencia_wrapper .col-md-6:eq(0)');

    */


}); // End of use strict