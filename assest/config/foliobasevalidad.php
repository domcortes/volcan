include_once '../controlador/FOLIO_ADO.php';

$FOLIO_ADO = new FOLIO_ADO();


$DISABLEDFOLIO = "";
$MENSAJEFOLIO = "";


$ARRAYFOLIO = "";
$ARRAYFOLIO2 = "";
$ARRAYFOLIO3 = "";

$ARRAYFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
$ARRAYFOLIO2 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($EMPRESAS, $PLANTAS, $TEMPORADAS);
$ARRAYFOLIO3 = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTmateriaprima($EMPRESAS, $PLANTAS, $TEMPORADAS);








if (empty($ARRAYFOLIO)) {
$DISABLEDFOLIO = "disabled";
$MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS PT </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}

if (empty($ARRAYFOLIO2)) {
$DISABLEDFOLIO = "disabled";
$MENSAJEFOLIO = $MENSAJEFOLIO."<br> NECESITA <b> CREAR LOS FOLIOS INDUSTRIAL </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}

if (empty($ARRAYFOLIO3)) {
$DISABLEDFOLIO = "disabled";
$MENSAJEFOLIO = " NECESITA <b> CREAR LOS FOLIOS MP </b> , PARA OCUPAR LA <b> FUNCIONALIDAD </b>. FAVOR DE <b> CONTACTARSE CON EL ADMINISTRADOR </b>";
}

<label id="val_mensaje" class="validacion"><?php echo $MENSAJEFOLIO; ?> </label>


<?php echo $DISABLEDFOLIO; ?>

FOLIOMANUAL = document.getElementById('FOLIOMANUAL').checked;
                    if (FOLIOMANUAL == true) {
                        NUMEROFOLIODEXPORTACION = document.getElementById("NUMEROFOLIODEXPORTACION").value;
                        document.getElementById('val_folio').innerHTML = "";

                        if (NUMEROFOLIODEXPORTACION == null || NUMEROFOLIODEXPORTACION.length == 0 || /^\s+$/.test(NUMEROFOLIODEXPORTACION)) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "NO HA INGRESADO EL FOLIO";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";
                        
                        if ( /^0/.test(NUMEROFOLIODEXPORTACION)) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE EMPEZAR CON 0";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";

                        if (NUMEROFOLIODEXPORTACION.length > 10) {
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.focus();
                            document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#FF0000";
                            document.getElementById('val_folio').innerHTML = "EL FOLIO NO PUEDE TENER MAS DE DIES DIGITOS";
                            return false;
                        }
                        document.form_reg_dato.NUMEROFOLIODEXPORTACION.style.borderColor = "#4AF575";
                    }