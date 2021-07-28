<?php
if(isset($_POST['opt'])) {
    $opt = $_POST['opt'];
}
//Codigo de agenda
$agenHTML = '
<div class="calendar-wrapper">
    <div id="agenTorn" class="calendar">
    </div>
</div>
<div class="calendar-references">
    <div class="reference">
        <div style="width: 30px; height: 30px; border-radius: 20px; background-color: red; margin: auto;"></div>
        Comienzo de las inscripciones
    </div>
    <div class="reference">
        <div style="width: 30px; height: 30px; border-radius: 20px; background-color: orange; margin: auto;"></div>
        Fin de las inscripciones
    </div>
    <div class="reference">
        <div style="width: 30px; height: 30px; border-radius: 20px; background-color: green; margin: auto;"></div>
        Comienzo del torneo
    </div>
</div>
';

//Codigo de los tiempos
$tiemHTML = '
<div class="tiempo">
    <p>Tiempo para descalificar</p>
    <input type="text" id="tempDesc">
</div>
<div class="tiempo">
    <p>Tiempo total por jugador</p>
    <input type="text" id="tempJug" required>
</div>
<div class="tiempo">
    <p>Cantidad de partidas por día</p>
    <input type="number" id="partDia" required>
</div>
';

//Codigo de opciones avanzadas
$avanHTML = '

<p style="height: 10%; width: 100%;">Opciones avanzadas
<div style="display: flex; height: 90%; width: 100%;">
    <div style=" width: 50%; height: 100%;">
        <div style="margin-bottom: 5%;">
            <p style="width: 100%;">Limitar Jugadores</p>
            <input type="checkbox" id="siLim" value="siLim" onclick="quehacerRes()">
        </div>
        <div>
            <p style="width: 100%;">ELO maximo</p>
            <input type="number" id="eloMax">
        </div>
        <div>
            <p style="width: 100%;">ELO minimo</p>
            <input type="number" id="eloMin">
        </div>
        <div id="quehacerRes" style="margin-top: 10%; width: 100%;">
            
        </div>
    </div>

    <div style="width: 50%; height: 100%;">
        <div style="margin-bottom: 5%;">
        <p style="width: 100%;">Localidad</p>
            <select id="locTorn">
                <option disabled selected>Selecciona una localidad</option>
                <option value="x">Cualquiera</option>
                <option value="mtv">Montevideo</option>
                <option value="can">Canelones</option>
                <option value="etc">etc.</option>
            </select>
        </div>
        <div>
            <p style="width: 100%;">Edad maxima</p>
            <input type="number" id="edaMax">
        </div>
        <div>
            <p style="width: 100%;">Edad minima</p>
            <input type="number" id="edaMin">
        </div>
        <div id="penultOpt" style="margin-top: 44%; width: 100%;">
        </div>
    </div>
</div>

';

//Codigo de premio
$premHTML = '
<p><i class="fas fa-gift"></i> Premio</p>
<input type="text" id="prem" required>
';

//Codigo para guardar y crear
$guCrHTML = '
<div class="torneo-buttons">
    <button><i class="fas fa-save"></i> Guardar</button>
    <button onclick="envaPHP()"><i class="fas fa-calendar-plus"></i> Crear</button>
</div>
';

if($opt == 'norm') {

    echo '
    <div class="config-left">
        <div class="calendar-config">'.
//          Aca va la agenda
            $agenHTML
      .'</div>
        <div class="hora">
            <p><i class="fas fa-clock"></i> ¿A que hora debe cambiar?</p>
            <input id="hrCom" type="time">
        </div>
        <div class="tiempo-wrapper">'.
//          temp
            $tiemHTML
      .'</div>
    </div>
    <div class="config-right">
        <div class="advanced-wrapper">
            <p><i class="fas fa-ban"></i> Deshabilitado</p>
        </div>
        <div class="premio">'.
//          Premio
            $premHTML
      .'</div>
        <div style="height: 18%; border-radius: 20px; padding: 1%;">'.
//          Guardar/Crear
            $guCrHTML
      .'</div>
    </div>

    ';

} elseif($opt == 'avan') {
    
    echo '
    <div class="config-left">
        <div class="calendar-config">'.
//          Aca va la agenda
            $agenHTML
      .'</div>
        <div class="tiempo-wrapper">'.
//          temp
            $tiemHTML
      .'</div>
    </div>
    <div class="config-right">
        <div style="height: 58%; border-radius: 20px; padding: 1%;">'.
//          Aca va la parte avanzada
            $avanHTML
      .'</div>
        <div class="premio">'.
//          Premio
            $premHTML
      .'</div>
        <div style="height: 18%; border-radius: 20px; padding: 1%;">'.
//          Guardar/Crear
            $guCrHTML
      .'</div>
    </div>

    ';

} elseif($opt == 'pres') {
    echo 'Tendriamos que ver la BD';
} else {
    echo 'Hubo un error';
}

?>