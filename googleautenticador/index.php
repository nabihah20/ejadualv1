<?php

	require_once( 'gerador.php' );

?>

<form action="verificador.php" method="post" autocomplete="off">
	
	<input type="text" name="codigo" placeholder="Codigo de Seguranca">

	<button>Verificar</button>

	<input type="hidden" value="<?php echo $codigo_secreto; ?>" name="codigosecreto">

</form>
