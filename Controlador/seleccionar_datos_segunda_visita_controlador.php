<?php
//Segunda visita visita conecta con la funcion jquery que se encuentra en la vista de la segunda visita
if (isset($_GET['term'])){
	# conectare la base de datos
 include('./db_datos_controlador.php');
$db_handle = new DBController();

$return_arr = array();

$sqlc = "SELECT  * FROM tbl_personas p, tbl_empresas_practica ep WHERE  documento like '%".$_GET['term']."%' AND p.id_persona=ep.id_persona ";

$faq = $db_handle->runQuery($sqlc);

foreach($faq as $k=>$v) {
/* Recuperar y almacenar en conjunto los resultados de la consulta.*/		
	$row_array['value'] = $faq[$k]['documento'];
	$row_array['documento']=$faq[$k]['documento'];

	$row_array['cuenta_sv']=$faq[$k]['documento'];
	$row_array['empresa_sv']=$faq[$k]['nombre_empresa'];
	$row_array['jefe_sv']=$faq[$k]['jefe_inmediato'];
	$row_array['titulo_sv']=$faq[$k]['titulo_jefe_inmediato'];
	$row_array['correo_sv']=$faq[$k]['correo_jefe_inmediato'];
	$row_array['telefono_sv']=$faq[$k]['telefono_jefe_inmediato'];
	$row_array['estudiante_sv']=$faq[$k]['nombre'];


	
	array_push($return_arr,$row_array);
}
/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);
}

?>