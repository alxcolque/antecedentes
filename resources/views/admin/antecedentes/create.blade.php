@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Registro de antecedentes</h1>
<a href="/admin/antecedentes" id="dasdasdf" class="pull-right btn btn-dark btm-sm"><i class="fas fa-arrow-left"></i> Volver atrás</a>
@stop

@section('content')
<div class="container-fluid">
    <div class="tab-pane" id="settings">
    
        <form class="form-horizontal" action="{{ route('admin.antecedentes.store')}}" method="POST">
            @csrf
            
            <div class="form-group row">
                <label for="gestion" class="col-sm-4 col-form-label">GESTION</label>
                <div class="col-sm-8">
                    <input type="text" name="gestion" id="intLimitTextBox" value="2021" class="form-control" placeholder="GESTION" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="FECHA" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                <div class="col-sm-8">
                    <input type="text" name="fechahecho" id="mydate" class="form-control" placeholder="FECHA" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="HORA" class="col-sm-4 col-form-label">HORA DEL HECHO</label>
                <div class="col-sm-8">
                    <input type="text" name="hora" class="form-control hora" value="00:00" placeholder="HORA DEL HECHO" maxlength="5" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="MES" class="col-sm-4 col-form-label">MES REGISTRO</label>
                <div class="col-sm-8">
                    <input type="text" 
                    id="latinTextBox"
                    name="mesregistro" 
                    class="awesomplete form-control" 
                    placeholder="MES REGISTRO"
                    autocomplete="off"
                    data-list="ENERO,FEBRERO,MARZO,ABRIL,MAYO,JUNIO,JULIO,AGOSTO,SEPTIEMBRE,OCTUBRE,NOVIEMBRE,DICIEMBRE"
                    data-minChars="1"
                    required
                    onkeyup="this.value = this.value.toUpperCase();"
                    >
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="DEPARTAMENTOS" class="col-sm-4 col-form-label">DEPARTAMENTOS</label>
                <div class="col-sm-8">
                    <input 
                    id="deptoid"
                    type="text" 
                    name="departamento" 
                    class="awesomplete form-control" 
                    placeholder="DEPARTAMENTOS"
                    value="ORURO"
                    autocomplete="off"
                    data-list="ORURO,LA PAZ,COCHABAMBA,SANTA CRUZ,POTOSI,TARIJA,CHUQUISACA,BENI,PANDO"
                    data-minChars="1"
                    required
                    onkeyup="this.value = this.value.toUpperCase();"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label for="PROVINCIA" class="col-sm-4 col-form-label">PROVINCIAS</label>
                <div class="col-sm-8">
                    <input type="text" 
                    id="soloprov"
                    value="CERCADO"
                    name="provincia" 
                    class="awesomplete form-control" 
                    autocomplete="off"
                    data-list="SABAYA, CARANGAS, CERCADO, LADISLAO CABRERA, LITORAL, MEJILLONES, NOR CARANGAS, PANTALÉON DALENCE, POOPÓ, SAJAMA, PEDRO DE TOTORA, SAUCARÍ, SEBASTIÁN PAGADOR, SUD CARANGAS, TOMÁS BARRÓN"
                    data-minChars="1"
                    placeholder="PROVINCIAS"
                    required
                    onkeyup="this.value = this.value.toUpperCase();"
                    >
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="MUNICIPIOS" class="col-sm-4 col-form-label">MUNICIPIOS</label>
                <div class="col-sm-8">
                    <input type="text" id="soloMUN" name="municipio" class="form-control" placeholder="MUNICIPIOS" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="LOCALIDADES" class="col-sm-4 col-form-label">LOCALIDADES</label>
                <div class="col-sm-8">
                    <input type="text" name="localidad" class="form-control"  placeholder="LOCALIDADES" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="ZONA O BARRIO" class="col-sm-4 col-form-label">ZONA BARRIO</label>
                <div class="col-sm-8">
                    <input type="text" name="zonabarrio" class="form-control"  placeholder="ZONA BARRIO" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="LUGAR HECHO" class="col-sm-4 col-form-label">LUGAR HECHO</label>
                <div class="col-sm-8">
                    <input type="text" name="lugarhecho" class="form-control" placeholder="LUGAR HECHO" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="UNIDAD" class="col-sm-4 col-form-label">UNIDAD</label>
                <div class="col-sm-8">
                    <input type="text" name="unidad" value="FELCC" class="form-control"  placeholder="UNIDAD" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="ARRESTADO" class="col-sm-4 col-form-label">ARRESTADO</label>
                <div class="col-sm-8">
                    <input type="text" name="arrestado" class="form-control"  placeholder="ARRESTADO" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="ci" class="col-sm-4 col-form-label">CI</label>
                <div class="col-sm-8">
                    <input type="text" name="ci" class="form-control"  placeholder="CEDULA DE IDENTIDAD" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="NACIDO EN" class="col-sm-4 col-form-label">NACIDO EN</label>
                <div class="col-sm-8">
                    <input type="text" 
                    name="nacido" 
                    value="ORURO"
                    class="awesomplete form-control" 
                    placeholder="NACIDO EN"
                    autocomplete="off"
                    data-list="ORURO,LA PAZ,COCHABAMBA,SANTA CRUZ,POTOSI,TARIJA,CHUQUISACA,BENI,PANDO"
                    data-minChars="1"
                    required
                    onkeyup="this.value = this.value.toUpperCase();"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label for="NACIONALIDAD" class="col-sm-4 col-form-label">NACIONALIDAD</label>
                <div class="col-sm-8">
                    <input type="text" 
                    value="BOLIVIANO"
                    name="nacionalidad" 
                    placeholder="NACIONALIDAD"
                    class="awesomplete form-control" 
                    placeholder="NACIDO EN"
                    autocomplete="off"
                    data-list="VENEZOLANO,PERUANO,ARGENTINO,CHILENO,BRASILERO,BOLIVIANO"
                    data-minChars="1"
                    required
                    onkeyup="this.value = this.value.toUpperCase();"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label for="EDAD" class="col-sm-4 col-form-label">EDAD</label>
                <div class="col-sm-8">
                    <input type="text" id="edadArr" name="edad" class="form-control" placeholder="EDAD" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="GENERO" class="col-sm-4 col-form-label">GENERO</label>
                <div class="col-sm-8">
                    <input type="text" 
                    name="genero" 
                    value="VARON"
                    class="awesomplete form-control" 
                    placeholder="GENERO"
                    autocomplete="off"
                    data-list="VARON,MUJER,OTRO"
                    data-minChars="1"
                    required
                    onkeyup="this.value = this.value.toUpperCase();"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label for="TEMPERANCIA" class="col-sm-4 col-form-label">TEMPERANCIA</label>
                <div class="col-sm-8">
                    <input type="text" value="SOBRIO" name="temperancia" class="form-control" placeholder="TEMPERANCIA" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="CAUSA ARRESTO" class="col-sm-4 col-form-label">CAUSA ARRESTO</label>
                <div class="col-sm-8">
                    <input type="text" 
                    name="causaarresto" 
                    class="awesomplete form-control" 
                    placeholder="CAUSA ARRESTO"
                    autocomplete="off"
                    data-list="POR COMISION DEL DELITO (F.E.L.C.C.), ADUANA, POR COMISION DEL DELITO (F.E.L.C.N),POR COMISION DEL DELITO (F.E.LC.C.)"
                    data-minChars="1"
                    required
                    onkeyup="this.value = this.value.toUpperCase();"
                    >
                </div>
            </div>

            <div class="form-group row">
                <label for="NATHECHO" class="col-sm-4 col-form-label">NATURALEZA DEL HECHO</label>
                <div class="col-sm-8">
                    <input type="text" name="nathecho" class="form-control" placeholder="ROBO, ASECINATO, ETC." required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="ARMA" class="col-sm-4 col-form-label">ARMA</label>
                <div class="col-sm-8">
                    <input type="text" value="NINGUNO" name="arma" class="form-control" placeholder="ARMA" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="REMITIDO A" class="col-sm-4 col-form-label">REMITIDO A</label>
                <div class="col-sm-8">
                    <input type="text" 
                    name="remitidoa" 
                    value="FELCC"
                    class="awesomplete form-control" 
                    placeholder="REMITIDO A" 
                    placeholder="CAUSA ARRESTO"
                    autocomplete="off"
                    data-list="FELCC,FELCV,FELCN)"
                    data-minChars="1"
                    required
                    onkeyup="this.value = this.value.toUpperCase();"
                    >

                </div>
            </div>
            <div class="form-group row">
                <label for="ACCION DIRECTA" class="col-sm-4 col-form-label">ACCION DIRECTA</label>
                <div class="col-sm-8">
                    <input type="text" name="nombres" class="form-control" placeholder="NOMBRE DEL OFICIAL EJ: SGTO JUAN" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="PERTENENCIAS" class="col-sm-4 col-form-label">PERTENENCIAS</label>
                <div class="col-sm-8">
                    <input type="text" value="NINGUNO" name="pertenencias" class="form-control" placeholder="PERTENENCIAS" required onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="form-group row">
                <label for="GPS" class="col-sm-4 col-form-label">GPS</label>
                <div class="col-sm-8">
                    <input type="text"  id="gps" value="-17.969944,-67.115266" name="gps" class="form-control" placeholder="GPS" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" required> Estoy de acuerdo <a>Con los cambios de esta acción</a>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-dark">REGISTRAR</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/css/awesomplete.base.css">
<link rel="stylesheet" href="/css/awesomplete.theme.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="/js/awesomplete.min.js"></script>
<script>
 var date = $("#mydate").datepicker({ dateFormat: 'mm/dd/yy' }).val();
</script>
<script>
        // Restricts input for the given textbox to the given inputFilter.
        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            });
        }

        setInputFilter(document.getElementById("intLimitTextBox"), function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 2025);
        });
        //Solo acepta El abecedario deptoid soloMUN edadArr
        setInputFilter(document.getElementById("soloprov"), function(value) {
            return /^[a-z]*$/i.test(value); });
        setInputFilter(document.getElementById("deptoid"), function(value) {
            return /^[a-z]*$/i.test(value); });
        setInputFilter(document.getElementById("soloMUN"), function(value) {
            return /^[a-z]*$/i.test(value); });
        //Solo acepta coordenadas
        setInputFilter(document.getElementById("gps"), function(value) {
                return /^(-?\d+(\.\d+)?),\s*(-?\d+(\.\d+)?)$/i.test(value);
            });
            //Edad validacion
        setInputFilter(document.getElementById("edadArr"), function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 200); });

        $(function() {

            const tiempoTranscurrido = Date.now();
            const hoy = new Date(tiempoTranscurrido);
            const anoActual = hoy.getFullYear();
            //console.log(anoActual); //2021

            var availableTags = [];
            var TagString = [];
            var year = anoActual
            for (i = 0; i <= 70; i++) {
                availableTags[i] = year--;
                TagString[i] = availableTags[i].toString();
            }
            $("#intLimitTextBox").autocomplete({
                source: TagString
            });
        });

        /*// Install input filters.
        //Solo enteros 
        setInputFilter(document.getElementById("intTextBox"), function(value) {
        return /^-?\d*$/.test(value); });
        //solo mayor a cero
            setInputFilter(document.getElementById("uintTextBox"), function(value) {
        return /^\d*$/.test(value); });

        //enteros entre 0 y 500
            setInputFilter(document.getElementById("intLimitTextBox3"), function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500); });
        //Separador de deciamal
            setInputFilter(document.getElementById("floatTextBox"), function(value) {
            return /^-?\d*[.,]?\d*$/.test(value); });
        //Solo acepta con dos decimales
            setInputFilter(document.getElementById("currencyTextBox"), function(value) {
            return /^-?\d*[.,]?\d{0,2}$/.test(value); });
        //Solo hora 
        setInputFilter(document.getElementById("horaTextBox"), function(value) {
            return /^[a-z]*$/i.test(value); });
        //Solo acepta El abecedario
            setInputFilter(document.getElementById("latinTextBox"), function(value) {
            return /^[a-z]*$/i.test(value); });
        //Solo hexadecimal
            setInputFilter(document.getElementById("hexTextBox"), function(value) {
            return /^[0-9a-f]*$/i.test(value); });*/
    </script>
    <script>

        document.querySelectorAll(".hora").forEach(el => el.addEventListener("keypress", setHora));

        function setHora(e) {
            e.preventDefault();
            if (this.value.length==2) {

                this.value+=":";
            }
            // verificamos que el valor no supere los 5 caracteres,
            // que sea un numero y que no supere las 24:59

            if (this.value.length>=5 || /[0-9]/.test(e.key)==false ||
                (this.value.length==0 && e.key>2) ||
                (this.value.length==1 && e.key>3) ||
                (this.value.length==3 && e.key>5)
            ) {
                return;
            }
            this.value+=e.key;
        }

    </script>

@stop