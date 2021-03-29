@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Antecedentes</h1>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Importar</button>
<button type="button" class="btn btn-dark">Nuevo registro</button>
@stop

@section('content')
<importar />







<!--Modal para importar-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Importar datos a la base de datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    Upload Validation Error<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <div"><label>Seleccione un archivo Excel</label>
                        </div>
                        <div>
                            <input type="file" id="fileUpload" accept=".xls,.xlsx">
                        </div>
                        <div>
                            <button class="btn btn-primary" type="button" id="uploadExcel">Previsualizar</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos de excel</h3>
                </div>
                <div class="panel-body anyClass">
                    <div class="table-responsive">
                        <table id="Table" class="table">

                        </table>
                        <pre id="jsonData"></pre>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="importarTabla()" class="btn btn-success">Guardar en la base de
                        datos</button>
                </div>
            </div>
        </div>
    </div>

    @stop

    @section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        .anyClass {
            height: 300px;
            overflow-y: scroll;
        }
    </style>
    @stop

    @section('js')
    <script type="text/javascript" src="/js/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://appsforoffice.microsoft.com/lib/1/hosted/office.js"></script>
    <script>
        //Funcion para convertir el formato de fecha
        function formatoFecha(isodate) {
            return (
                new Date(isodate)
                    .toLocaleString('en-US', {
                        month: '2-digit',
                        day: '2-digit',
                        year: 'numeric'
                    })
                    .replace(/\//g, '-')
            );
        }
        function formatoFeckha(inputStr) {
            var timestamp = parseInt(inputStr, 10);
            var date = new Date(timestamp);
            var a = date.toISOString().substr(0, 10);
            var datePart = a.match(/\d+/g), year = datePart[0].substring(2), month = datePart[1], day = datePart[2]; return day + '-' + month + '-' + year;
        }
        //Subir y crear json
        var selectedFile;
        document
            .getElementById("fileUpload")
            .addEventListener("change", function (event) {
                selectedFile = event.target.files[0];
            });
        document
            .getElementById("uploadExcel")
            .addEventListener("click", function () {
                if (selectedFile) {
                    var fileReader = new FileReader();
                    fileReader.onload = function (event) {
                        var data = event.target.result;

                        var workbook = XLSX.read(data, {
                            type: "binary"
                        });
                        workbook.SheetNames.forEach(sheet => {
                            let rowObject = XLSX.utils.sheet_to_row_object_array(
                                workbook.Sheets[sheet]
                            );
                            let jsonObject = JSON.parse(JSON.stringify(rowObject));

                            //document.getElementById("jsonData").innerHTML = jsonObject;
                            var date = new Date(jsonObject);
                            console.log(jsonObject);
                            //console.log()
                            //console.log(jsonObject[1]["FECHA DEL HECHO"]);

                            $("#Table").append('<thead class="thead-dark">' +
                                '<tr><td>GESTION</td>' +
                                '<td>FECHA DEL HECHO</td>' +
                                '<td>HORA DEL HECHO</td>' +
                                '<td>MES REGISTRO</td>' +
                                '<td>DEPARTAMENTOS</td>' +
                                '<td>PROVINCIAS</td>' +
                                '<td>MUNICIPIOS</td>' +
                                '<td>LOCALIDADES</td>' +
                                '<td>ZONA O BARRIO</td>' +
                                '<td>LUGAR DEL HECHO</td>' +
                                '<td>GPS COORDENADAS</td>' +
                                '<td>UNIDADES</td>' +
                                '<td>ARRESTADO</td>' +
                                '<td>NACIDO EN</td>' +
                                '<td>NUMERO DE C.I.</td>' +
                                '<td>NACIONALIDAD</td>' +
                                '<td>EDAD</td>' +
                                '<td>GENERO</td>' +
                                '<td>TEMPERANCIA</td>' +
                                '<td>CAUSAS DEL ARRESTO</td>' +
                                '<td>NATURALEZA DEL HECHO</td>' +
                                '<td>ARMA O INSTRUMENTO</td>' +
                                '<td>REMITIDOS A</td>' +
                                '<td>POLICIA</td>' +
                                '<td>PERTENENCIAS</td></tr></thead>');
                            for (i = 0; i < jsonObject.length; i++) {

                                
                                
                                
                                
                                
                                
                                $("#Table").append('<tr>' +
                                    '<td>' + jsonObject[i]["GESTION"] + '</td>' +
                                    '<td>' + moment('/Date(' + jsonObject[i]["FECHA DEL HECHO"] + ')/').format('DD-MM-YYYY') + '</td>' +
                                    '<td>' + moment('/Date(' + jsonObject[i]["HORA DEL HECHO"] + ')/').format('HH:ss') + '</td>' +
                                    '<td>' + jsonObject[i]["MES REGISTRO"] + '</td>' +
                                    '<td>' + jsonObject[i]["DEPARTAMENTOS"] + '</td>' +
                                    '<td>' + jsonObject[i]["PROVINCIAS"] + '</td>' +
                                    '<td>' + jsonObject[i]["MUNICIPIOS"] + '</td>' +
                                    '<td>' + jsonObject[i]["LOCALIDADES"] + '</td>' +
                                    '<td>' + jsonObject[i]["ZONA O BARRIO"] + '</td>' +
                                    '<td>' + jsonObject[i]["LUGAR DEL HECHO DESCRIPCION (AVENIDA/CALLE)"] + '</td>' +
                                    '<td>' + jsonObject[i]["GPS COORDENADAS"] + '</td>' +
                                    '<td>' + jsonObject[i]["FELCC, FELCV, DIPROVE, TRANSITO, UNIDADES, EPIS Y OTROS"] + '</td>' +
                                    '<td>' + jsonObject[i]["NOMBRE Y APELLIDO DEL ARRESTADO"] + '</td>' +
                                    '<td>' + jsonObject[i]["NUMERO DE C.I."] + '</td>' +
                                    '<td>' + jsonObject[i]["NACIDO EN:"] + '</td>' +
                                    '<td>' + jsonObject[i]["NACIONALIDAD"] + '</td>' +
                                    '<td>' + jsonObject[i]["EDAD"] + '</td>' +
                                    '<td>' + jsonObject[i]["GENERO"] + '</td>' +
                                    '<td>' + jsonObject[i]["TEMPERANCIA"] + '</td>' +
                                    '<td>' + jsonObject[i]["CAUSAS DEL ARRESTO"] + '</td>' +
                                    '<td>' + jsonObject[i]["NATURALEZA DEL HECHO"] + '</td>' +
                                    '<td>' + jsonObject[i]["ARMA O INSTRUMENTO QUE UTILIZO"] + '</td>' +
                                    '<td>' + jsonObject[i]["REMITIDOS A:"] + '</td>' +
                                    '<td>' + jsonObject[i]["NOMBRE COMPLETO DEL POLICIA (ACCION DIRECTA)"] + '</td>' +
                                    '<td>' + jsonObject[i]["PERTENENCIAS DEL ARRESTADO"] + '</td>' +
                                    '</tr>');
                            }

                        });
                    };
                    fileReader.readAsBinaryString(selectedFile);
                }
            });
    </script>
    <!-- Importar tabla  a la base de datos -->
    <script>
        function importarTabla() {
            /*var fecha = $("#fecha").val();
            var operador = $("#idmip").val();
            var captura = $("#captura").val();*/
            var filas = [];
            $('#Table tbody tr').each(function () {
                //var codigo = $(this).find('td').eq(0).text();
                var fechahecho = $(this).find('td').eq(1).text();
                var hora = $(this).find('td').eq(2).text();
                var mesregistro = $(this).find('td').eq(3).text();

                var departamento = $(this).find('td').eq(4).text();
                var provincia = $(this).find('td').eq(5).text();
                var municipio = $(this).find('td').eq(6).text();

                var localidad = $(this).find('td').eq(7).text();
                var zonabarrio = $(this).find('td').eq(8).text();
                var lugarhecho = $(this).find('td').eq(9).text();
                var gps = $(this).find('td').eq(10).text();
                var unidad = $(this).find('td').eq(11).text();

                var arrestado = $(this).find('td').eq(11).text();
                var ci = $(this).find('td').eq(11).text();
                var nacido = $(this).find('td').eq(11).text();
                var nacionalidad = $(this).find('td').eq(11).text();
                var edad = $(this).find('td').eq(11).text();
                var genero = $(this).find('td').eq(11).text();


                var temperancia = $(this).find('td').eq(1).text();
                var nathecho = $(this).find('td').eq(1).text();
                var arma = $(this).find('td').eq(1).text();
                var remitidoa = $(this).find('td').eq(1).text();
                var pertenencias = $(this).find('td').eq(1).text();
                





                var mono = $(this).find('td').eq(1).text();
                var lineitem = $(this).find('td').eq(2).text();
                var pn = $(this).find('td').eq(3).text();
                var ordenado = $(this).find('td').eq(4).text();
                var pcspkg = $(this).find('td').eq(5).text();
                var operation = $(this).find('td').eq(6).text();
                var otiempo = $(this).find('td').eq(7).text();

                var fila = {
                    codigo,
                    mono,
                    lineitem,
                    pn,
                    ordenado,
                    pcspkg,
                    operation,
                    otiempo
                };
                filas.push(fila);
            });


            $.ajax({
                type: "get",
                url: "{{URL::to('import')}}",
                data: { valores: JSON.stringify(filas) },

                success: function (data) {
                    alert("Todo  Bien") //mensaje de envio correcto
                }
            });

        }
    </script>
    @stop