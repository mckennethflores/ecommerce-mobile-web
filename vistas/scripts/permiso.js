var tabla;

function init(){
	mostrarform(false);
	listar();


}

	function mostrarform(flag){

		if (flag){
			$("#listadoregistros").hide();
			$("#formularioregistros").show();
			$("#btnGuardar").prop("disabled",false);
		}else{
			$("#listadoregistros").show();
			$("#formularioregistros").hide();
            $("#btnagregar").show();
            $("#btnagregar").hide();

		}
	}

	function listar(){
		tabla=$('#tbllistado').dataTable({
			"aProcessing": true,
			"aServerSide": true,
			dom: 'Bfrtip',
			buttons: [		          
						'copyHtml5',
						'excelHtml5',
						'csvHtml5',
						'pdf'
					],
			"ajax": 
					{
						url: '../ajax/permiso.php?op=listar',
						type: "get",
						dataType: "json",
						error: function(e){
							console.log(e.responseText);
						}

					},
					"language": {
						"lengthMenu": "Mostrar : _MENU_ registros",
						"buttons": {
						"copyTitle": "Tabla Copiada",
						"copySuccess": {
								_: '%d líneas copiadas',
								1: '1 línea copiada'
							}
						}
					},
					"bDestroy": true,
					"iDisplayLenght": 5,
					"order": [[0,"desc"]]	
			
		}).DataTable();
	}
 

init();
