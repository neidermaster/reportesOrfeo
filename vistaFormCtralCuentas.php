<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* DEFINICION DE VARIABLES ESTADISTICA
 * 	var $tituloE String array  Almacena el titulo de la Estadistica Actual
 * var $subtituloE String array  Contiene el subtitulo de la estadistica
 * var $helpE String Almacena array Almacena la descripcion de la Estadistica.
 */
$fecha_ini = getdate();
$fecha_fin = getdate();

$tituloE[1] = "RADICACION - CONSULTA DE RADICADOS POR USUARIO";
$tituloE[2] = "RADICACION - ESTADISTICAS POR MEDIO DE RECEPCION-ENVIO";
$tituloE[3] = "RADICACION - ESTADISTICAS DE MEDIO ENVIO FINAL DE DOCUMENTOS";
$tituloE[4] = "RADICACION - ESTADISTICAS DE DIGITALIZACION DE DOCUMENTOS";
$tituloE[5] = "RADICADOS DE ENTRADA RECIBIDOS DEL AREA DE CORRESPONDENCIA";
$tituloE[6] = "RADICADOS ACTUALES EN LA DEPENDENCIA";
$tituloE[11] = "ESTADISTICA DE DIGITALIZACION";
$tituloE[17] = "ESTADISTICA POR RADICADOS Y SUS RESPUESTAS";
$tituloE[19] = "REPORTE FISICOS";
/*
  $subtituloE[1] = "ORFEO - Generada el: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
  $subtituloE[2] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
  $subtituloE[3] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
  $subtituloE[4] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
  $subtituloE[5] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
  $subtituloE[6] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
  $subtituloE[8] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
  $subtituloE[17] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
  $subtituloE[18] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
  $subtituloE[19] = "ORFEO - Fecha: " . date("Y/m/d H:i:s") . "\n Parametros de Fecha: Entre $fecha_ini y $fecha_fin";
 */
$helpE[1] = "Este reporte genera la cantidad de radicados por usuario. Se puede discriminar por tipo de radicaci&oacute;n. ";
$helpE[2] = "Este reporte genera la cantidad de radicados de acuerdo al medio de recepci&oacute;n o envio realizado al momento de la radicaci&oacute;n. ";
$helpE[3] = "Este reporte genera la cantidad de radicados enviados a su destino final por el &aacute;rea.  ";
$helpE[4] = "Este reporte genera la cantidad de radicados digitalizados por usuario y el total de hojas digitalizadas. Se puede seleccionar el tipo de radicaci&oacute;n.";
$helpE[5] = "Este reporte genera la cantidad de documentos de entrada radicados del &aacute;rea de correspondencia a una dependencia. ";
$helpE[6] = "Esta estadistica trae la cantidad de radicados \n generados por usuario, se puede discriminar por tipo de Radicacion. ";
$helpE[8] = "Este reporte genera la cantidad de radicados de entrada cuyo vencimiento esta dentro de las fechas seleccionadas. ";
$helpE[9] = "Este reporte muestra el proceso que han tenido los radicados tipo 2 que ingresaron durante las fechas seleccionadas. ";
$helpE[10] = "Este reporte muestra cuantos radicados de entrada han sido asignados a cada dependencia. ";
$helpE[11] = "Muestra la cantidad de radicados digitalizados por usuario y el total de hojas digitalizadas. Se puede seleccionar el tipo de radicaci&oacute;n y la fecha de digitalizaci&oacute;n.";
$helpE[12] = "Muestra los radicados que ten&iacute;an asignados un tipo documental(TRD) y han sido modificados";
$helpE[13] = "Muestra todos los expedientes agrupados por dependencia que con el n&uacute;mero de radicados totales";
$helpE[14] = "Muestra el total de radicados que tiene un usuario y 
				el detalle del radicado con respecto al Remitente(Detalle), 
				Predio(Detalle), ESP(Detalle) ";
$helpE[17] = "Este reporte genera la cantidad de documentos que han llegado al area o usuarios sin importar su origen. ";
$helpE[18] = "Este reporte refleja el Tramite que se les ha dado a los Radicados HASTA EL DIA INMEDIATAMENTE ANTERIOR
                      Puede filtrarse por la fecha de REASIGNACION y la dependencia ORIGEN y DESTINO ";

$helpE[19] = "Reporte de listado de radicados para translado físico. ";
?>

<html>
    <head>
        <title>principal</title>
        <link rel="stylesheet" href="estilos/orfeo.css">
        <link rel="stylesheet" type="text/css" href="js/spiffyCal/spiffyCal_v2_1.css">

        <?php include_once "./js/funtionImage.php"; ?>

        <script>
            function adicionarOp(forma, combo, desc, val, posicion) {
                o = new Array;
                o[0] = new Option(desc, val);
                eval(forma.elements[combo].options[posicion] = o[0]);
                //alert ("Adiciona " +val+"-"+desc );
            }
            function noPermiso() {
                alert("No tiene permiso para acceder");
            }
        </script>

        <script language="JavaScript" src="js/spiffyCal/spiffyCal_v2_1.js"></script>

        <script language="javascript">
<?php
//corrregido fecha inicial que se mostraba mal en enero rperilla
$ano_ini = date("Y");
$mes_ini = substr("00" . (date("m") - 1), - 2);
if ($mes_ini == "00") {
    $ano_ini = $ano_ini - 1;
    $mes_ini = "12";
}
$dia_ini = date("d");
if (!$fecha_ini)
    $fecha_ini = "$ano_ini/$mes_ini/$dia_ini";
$fecha_busq = date("Y/m/d");
if (!$fecha_fin)
    $fecha_fin = $fecha_busq;
?>
    var dateAvailable = new ctlSpiffyCalendarBox("dateAvailable", "formulario", "fecha_ini", "btnDate1", "<?= $fecha_ini ?>", scBTNMODE_CUSTOMBLUE);
            var dateAvailable2 = new ctlSpiffyCalendarBox("dateAvailable2", "formulario", "fecha_fin", "btnDate2", "<?= $fecha_fin ?>", scBTNMODE_CUSTOMBLUE);
        </script>

       <!-- <script>
            function limpiar()
            {
            document.Search.elements['s_RADI_NUME_RADI'].value = "";
                    document.Search.elements['s_RADI_NOMB'].value = "";
                    document.Search.elements['s_RADI_DEPE_ACTU'].value = "";
                    document.Search.elements['s_TDOC_CODI'].value = "9999";
                    /**
                     * Limpia el campo expediente
                     * Fecha de modificacion: 30-Junio-2006
                     * Modificador: Supersolidaria
                     */
                    document.Search.elements['s_SGD_EXP_SUBEXPEDIENTE'].value = "";
                 < ?
                             $dia = intval(date("d"));
                             $mes = intval(date("m"));
                             $ano = intval(date("Y"));
                             ? >
                             document.Search.elements['s_desde_dia'].value = "<?= $dia ?>";
                             document.Search.elements['s_hasta_dia'].value = "<?= $dia ?>";
                             document.Search.elements['s_desde_mes'].value = "<?= ($mes - 1) ?>";
                             document.Search.elements['s_hasta_mes'].value = "<?= $mes ?>";
                             document.Search.elements['s_desde_ano'].value = "<?= $ano ?>";
                             document.Search.elements['s_hasta_ano'].value = "<?= $ano ?>";
                             for (i = 4; i < document.Search.elements.length; i++) document.Search.elements[i].checked = 1;
                     }
                     < /</script>
        -->

    </head>

    <body>
        <div id="spiffycalendar" class="text"></div>
        <form name="formulario"  method="GET" action='./vistaFormConsulta.php?<?= session_name() . "=" . trim(session_id()) . "&fechah=$fechah" ?>'>
<?php ?>
            <a>modulo de reportes</a>
            <p><?php print_r($fecha_ini) ?></p>
            <div>
                <input type='hidden' name='summary[]' value='idL' />

                <fieldset id='right'><legend align="center">CENTRAL DE CUENTAS</legend>
                    <table>
                        <tr>
                            <td class="titulos5">Desde Fecha (dd/mm/yyyy)</td>
                            <td class="listado5">
                                <select class="select" name="s_desde_dia">
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        if ($i == $flds_desde_dia)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                                <select class="select" name="s_desde_mes">
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        if ($i == $flds_desde_mes)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                                <select class="select" name="s_desde_ano">
                                    <?php
                                    $agnoactual = Date('Y');
                                    for ($i = 1990; $i <= $agnoactual; $i++) {
                                        if ($i == $flds_desde_ano)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="titulos5">Hasta Fecha (dd/mm/yyyy)</td>
                            <td class="listado5">
                                <select class="select" name="s_hasta_dia">
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        if ($i == $flds_hasta_dia)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                                <select class="select" name="s_hasta_mes">
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        if ($i == $flds_hasta_mes)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                                <select class="select" name="s_hasta_ano">
                                    <?php
                                    for ($i = 1990; $i <= $agnoactual; $i++) {
                                        if ($i == $flds_hasta_ano)
                                            $option = "<option SELECTED value=\"" . $i . "\">" . $i . "</option>";
                                        else
                                            $option = "<option value=\"" . $i . "\">" . $i . "</option>";
                                        echo $option;
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="titulos2">RADICADO Desde fecha (aaaa/mm/dd) </td>
                            <td class="listado2">
                                <script language="javascript">
                                    dateAvailable.writeControl();
                                    dateAvailable.dateFormat = "yyyy/MM/dd";
                                </script>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="titulos2">RADICADO Hasta  fecha (aaaa/mm/dd) </td>
                            <td class="listado2">
                                <script language="javascript">
                                    dateAvailable2.writeControl();
                                    dateAvailable2.dateFormat = "yyyy/MM/dd";
                                </script>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="titulos2">Tipo Documental </td>
                            <td class="listado2">
                                <script language="javascript">
                                    dateAvailable2.writeControl();
                                    dateAvailable2.dateFormat = "yyyy/MM/dd";
                                </script>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="titulos2">
                        <center>
                            <input name="Submit" type="submit" class="botones_funcion" value="Limpiar"> 
                            <input type="submit" class="botones_funcion" value="Generar" name="generarOrfeo">
                        </center>
                        </td>
                        </tr>
                    </table>

                </fieldset>
            </div>
        </form>


    </body>
</html>