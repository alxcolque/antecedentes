@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="content-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item" title="Mi registro" data-toggle="tooltip" data-html="true"><a class="nav-link active" href="#activity" data-toggle="tab">Antecedentes</a></li>

                    <li class="nav-item" title="Registrar nuevo antecedente" data-toggle="tooltip" data-html="true"><a class="nav-link" href="#settings" data-toggle="tab">Registrar Antecedente</a></li>
                </ul>
            </div><!-- /.card-header -->

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <div class="row">

                            <div class="ml-auto p-2">
                                <div class="">
                                    <a href="registrarimport" onclick="
return confirm('¿Seguro que quiere importar en la base de datos?')" class="btn btn-dark" data-toggle="tooltip" data-html="true" title="Clic para insertar en la base de datos"><i class="fas fa-database"></i> Guardar En la base datos</a>

                                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{1}}" data-original-title="Eliminar todos los registros de la tabla actual" class="btn btn-danger btn-sm deleteRecord">Limpiar tabla</a>
                                </div>


                            </div>
                        </div>

                        <table id="example" class="stripe row-border order-column" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Acciones</th>
                                    <th>Gestion</th>
                                    <th>Fecha Hecho</th>
                                    <th>Hora</th>
                                    <th>Mes</th>
                                    <th>Deptartamento</th>
                                    <th>Provincia</th>
                                    <th>Municipio</th>
                                    <th>Localidad</th>
                                    <th>Zona Barrio</th>
                                    <th>Lugar Hecho</th>
                                    <th>GPS</th>
                                    <th>Unidad</th>
                                    <th>Arrestado</th>
                                    <th>CI</th>
                                    <th>Nacido</th>
                                    <th>Nacionalidad</th>
                                    <th>Edad</th>
                                    <th>Genero</th>
                                    <th>Temperancia</th>
                                    <th>CausaArresto</th>
                                    <th>Naturaleza</th>
                                    <th>Arma</th>
                                    <th>Remitido a</th>
                                    <th>P. Policial</th>
                                    <th>Pertenencias</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>


                        </table>

                    </div>


                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal" action="{{ route('admin.antecedentes.store')}}" method="POST">
                            @csrf
                            <div class="row bg-light text-dark">

                                <div class="col-md-6 mt-2">
                                    <div class="form-group row">
                                        <label for="ARRESTADO" class="col-sm-4 col-form-label">ARRESTADO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="arrestado" class="form-control" placeholder="ARRESTADO" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ci" class="col-sm-4 col-form-label">ci</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="ci" class="form-control" placeholder="ci" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="NACIDO EN" class="col-sm-4 col-form-label">NACIDO EN</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nacido" value="ORURO" class="awesomplete form-control" placeholder="NACIDO EN" autocomplete="off" data-list="ORURO,LA PAZ,COCHABAMBA,SANTA CRUZ,POTOSI,TARIJA,CHUQUISACA,BENI,PANDO" data-minChars="1" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="NACIONALIDAD" class="col-sm-4 col-form-label">NACIONALIDAD</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="BOLIVIANO" name="nacionalidad" placeholder="NACIONALIDAD" class="awesomplete form-control" placeholder="NACIDO EN" autocomplete="off" data-list="VENEZOLANO,PERUANO,ARGENTINO,CHILENO,BRASILERO,BOLIVIANO" data-minChars="1" required>
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
                                            <input type="text" name="genero" value="VARON" class="awesomplete form-control" placeholder="GENERO" autocomplete="off" data-list="VARON,MUJER,OTRO" data-minChars="1" required>
                                        </div>
                                    </div>
                                    <div class="card bg-light text-dark">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">Foto</label>
                                            <div class="col-sm-4">
                                                <input id="foto" type="file" name="foto" accept="image/*" onchange="readURL(this);">
                                                <input type="hidden" name="hidden_image" id="hidden_image">
                                            </div>
                                        </div>
                                        <div class="center-block">
                                            <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6 mt-2">
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
                                            <input type="text" id="latinTextBox" name="mesregistro" class="awesomplete form-control" placeholder="MES REGISTRO" autocomplete="off" data-list="ENERO,FEBRERO,MARZO,ABRIL,MAYO,JUNIO,JULIO,AGOSTO,SEPTIEMBRE,OCTUBRE,NOVIEMBRE,DICIEMBRE" data-minChars="1" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="DEPARTAMENTOS" class="col-sm-4 col-form-label">DEPARTAMENTOS</label>
                                        <div class="col-sm-8">
                                            <input id="deptoid" type="text" name="departamento" class="awesomplete form-control" placeholder="DEPARTAMENTOS" value="ORURO" autocomplete="off" data-list="ORURO,LA PAZ,COCHABAMBA,SANTA CRUZ,POTOSI,TARIJA,CHUQUISACA,BENI,PANDO" data-minChars="1" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="PROVINCIA" class="col-sm-4 col-form-label">PROVINCIAS</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="soloprov" value="CERCADO" name="provincia" class="awesomplete form-control" autocomplete="off" data-list="SABAYA, CARANGAS, CERCADO, LADISLAO CABRERA, LITORAL, MEJILLONES, NOR CARANGAS, PANTALÉON DALENCE, POOPÓ, SAJAMA, PEDRO DE TOTORA, SAUCARÍ, SEBASTIÁN PAGADOR, SUD CARANGAS, TOMÁS BARRÓN" data-minChars="1" placeholder="PROVINCIAS" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="MUNICIPIOS" class="col-sm-4 col-form-label">MUNICIPIOS</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="soloMUN" name="municipio" class="form-control" placeholder="MUNICIPIOS" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="LOCALIDADES" class="col-sm-4 col-form-label">LOCALIDADES</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="localidad" class="form-control" placeholder="LOCALIDADES" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ZONA O BARRIO" class="col-sm-4 col-form-label">ZONA BARRIO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="zonabarrio" class="form-control" placeholder="ZONA BARRIO" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="LUGAR HECHO" class="col-sm-4 col-form-label">LUGAR HECHO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="lugarhecho" class="form-control" placeholder="LUGAR HECHO" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="UNIDAD" class="col-sm-4 col-form-label">UNIDAD</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="unidad" value="FELCC" class="form-control" placeholder="UNIDAD" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="TEMPERANCIA" class="col-sm-4 col-form-label">TEMPERANCIA</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="SOBRIO" name="temperancia" class="form-control" placeholder="TEMPERANCIA" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="CAUSA ARRESTO" class="col-sm-4 col-form-label">CAUSA ARRESTO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="causaarresto" class="awesomplete form-control" placeholder="CAUSA ARRESTO" autocomplete="off" data-list="POR COMISION DEL DELITO (F.E.L.C.C.), ADUANA, POR COMISION DEL DELITO (F.E.L.C.N),POR COMISION DEL DELITO (F.E.LC.C.)" data-minChars="1" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="NATHECHO" class="col-sm-4 col-form-label">NATHECHO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nathecho" class="form-control" placeholder="NATHECHO" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ARMA" class="col-sm-4 col-form-label">ARMA</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="NINGUNO" name="arma" class="form-control" placeholder="ARMA" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="REMITIDO A" class="col-sm-4 col-form-label">REMITIDO A</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="remitidoa" value="FELCC" class="awesomplete form-control" placeholder="REMITIDO A" placeholder="CAUSA ARRESTO" autocomplete="off" data-list="FELCC,FELCV,FELCN)" data-minChars="1" required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ACCION DIRECTA" class="col-sm-4 col-form-label">ACCION DIRECTA</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nombres" class="form-control" placeholder="ACCION DIRECTA" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="PERTENENCIAS" class="col-sm-4 col-form-label">PERTENENCIAS</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="NINGUNO" name="pertenencias" class="form-control" placeholder="PERTENENCIAS" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="GPS" class="col-sm-4 col-form-label">GPS</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="-17.969944,-67.115266" name="gps" class="form-control" placeholder="GPS" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" required> Estoy de acuerdo <a href="#">Con los cambios de esta acción</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


</div>

@endsection
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/css/awesomplete.base.css">
<link rel="stylesheet" href="/css/awesomplete.theme.css">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="/js/awesomplete.min.js"></script>
<script>
    var date = $("#mydate").datepicker({
        dateFormat: 'mm/dd/yy'
    }).val();
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
        return /^[a-z]*$/i.test(value);
    });
    setInputFilter(document.getElementById("deptoid"), function(value) {
        return /^[a-z]*$/i.test(value);
    });
    setInputFilter(document.getElementById("soloMUN"), function(value) {
        return /^[a-z]*$/i.test(value);
    });

    //Edad validacion
    setInputFilter(document.getElementById("edadArr"), function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 200);
    });

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
</script>
<script>
    document.querySelectorAll(".hora").forEach(el => el.addEventListener("keypress", setHora));

    function setHora(e) {
        e.preventDefault();
        if (this.value.length == 2) {

            this.value += ":";
        }
        // verificamos que el valor no supere los 5 caracteres,
        // que sea un numero y que no supere las 24:59

        if (this.value.length >= 5 || /[0-9]/.test(e.key) == false ||
            (this.value.length == 0 && e.key > 2) ||
            (this.value.length == 1 && e.key > 3) ||
            (this.value.length == 3 && e.key > 5)
        ) {
            return;
        }
        this.value += e.key;
    }
</script>
<script>
    function readURL(input, id) {
        id = id || '#modal-preview';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(id).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#modal-preview').removeClass('hidden');
            $('#start').hide();
        }
    }
</script>
@endsection