<!DOCTYPE html>
<html>
<head>
<style>
     
    body{
            font-size: 10px;
    }
    .text-align-center { 
        width: 100%;    
        line-height: 100px;
        text-align: center;
        vertical-align: middle;
        }
       .tablet   {
  border-bottom: 1px solid gray;  
}
.center { 
         
	line-height:auto;
	padding: 20px 0 20px 0;
	text-align:center; 
}
.center img {
	vertical-align:middle;
}

 
.imgtt {
   margin: 15px 0 0 0;
  width: auto;
  height: 100%;
}
.table td, .table th {
    padding: 0.25rem !important;  
    vertical-align: middle;
    border-top: 1px solid black !important;
}
  </style> 
    <title>reporte</title> 
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" /> 
</head>
<body>  
        <main> 
        
       <table class="tablet" style="width: 100%;  ">
                <tr>
                                <td class="center"> <img src="{{$foto}}" width="100px"> </td>
                                <td style="text-align:center;"> <p style="line-height : 18px;">Asociación nacional de Suboficiales y Sargentos de las fuerzas armadas del estado</p><h4>CUADRO OFICIAL DE VOTOS ESCRUTADOS</h4></td>
                                <td class="center"> <img src="{{$foto}}" width="100px" > </td>
                </tr>
       </table>
       <label style="margin-top:5px; ">Cuadro estadistico - Ejercito</label>

<table class="table table-bordered" style="width: 100%;  margin-top:5px;font-size: 10px; ">
<tr class="table-secondary">
    <th style="text-align:center;">Frentes</th>
    <th style="text-align:center;">Votos</th>
    <th style="text-align:center;">Observaciones</th>
  </tr> 
@foreach ($votos as $voto) 
     @if ($voto->idfuerza == 3)
     <tr >  
        <td > {{ $voto->sigla }} </td>
        <td style="text-align:center;"> {{ $voto->total }} </td>
        
        @if ($voto->g)
            <td > {{ $voto->g }} </td>
        @else
           <td > </td>
        @endif
    </tr> 
      @endif
@endforeach
    <tr class="table-secondary">  
        <th scope="row" >Total</th>
        <td style="text-align:center;">{{ $t3 }}
        </td>
        <td >  
        </td>
    </tr> 
</table>


<label style="margin-top:5px; ">Cuadro estadistico - Aerea</label>

<table class="table table-bordered" style="width: 100%;  margin-top:5px;font-size: 10px; ">
<tr class="table-secondary">
    <th style="text-align:center;">Frentes</th>
    <th style="text-align:center;">Votos</th>
    <th style="text-align:center;">Observaciones</th>
  </tr> 
@foreach ($votos as $voto) 
     @if ($voto->idfuerza == 4)
     <tr >  
        <td > {{ $voto->sigla }} </td>
        <td style="text-align:center;"> {{ $voto->total }} </td>
        
        @if ($voto->g)
            <td > {{ $voto->g }} </td>
        @else
           <td > </td>
        @endif
    </tr> 
      @endif
@endforeach
    <tr class="table-secondary">  
        <th scope="row" >Total</th>
        <td style="text-align:center;">{{ $t4}}
        </td>
        <td >  
        </td>
    </tr> 
</table>

<label style="margin-top:5px; ">Cuadro estadistico - Armada</label>

<table class="table table-bordered" style="width: 100%;  margin-top:5px;font-size: 10px; ">
<tr class="table-secondary">
    <th style="text-align:center;">Frentes</th>
    <th style="text-align:center;">Votos</th>
    <th style="text-align:center;">Observaciones</th>
  </tr> 
@foreach ($votos as $voto) 
     @if ($voto->idfuerza == 5)
     <tr >  
        <td > {{ $voto->sigla }} </td>
        <td style="text-align:center;"> {{ $voto->total }} </td>
        
        @if ($voto->g)
            <td > {{ $voto->g }} </td>
        @else
           <td > </td>
        @endif
    </tr> 
      @endif
@endforeach
    <tr class="table-secondary">  
        <th scope="row" >Total</th>
        <td style="text-align:center;">{{ $t5}}
        </td>
        <td >  
        </td>
    </tr> 
</table>



<label style="margin-top:5px; ">Cuadro de socios que participaron en las elecciones</label>

<table class="table table-bordered" style="width: 100%;  margin-top:5px;font-size: 10px; ">
<tr class="table-secondary">
    <th style="text-align:center;">Detalle</th>
    <th style="text-align:center;">Ejercito</th>
    <th style="text-align:center;">Aerea</th>
    <th style="text-align:center;">Armada</th>
    <th style="text-align:center;">Total</th>
  </tr> 
@foreach ($tablaestadistica as $votoss) 
    
     <tr >  
     <th scope="row" >{{ $votoss->detalle }} </th> 
     <td style="text-align:center;"> {{ $votoss->ejercito }} </td>
     <td style="text-align:center;"> {{ $votoss->aerea }} </td>
     <td style="text-align:center;"> {{ $votoss->armada }} </td>
     <td style="text-align:center;"> {{ $votoss->total }} </td>  
    </tr> 
  
@endforeach
   
</table>



<label style="margin-top:5px; ">Grafico estadistico</label>
<table class="" style="width: 100%; border: 1px solid black;  margin-top:5px; ">
     <tr class="center" style="  height: 130px;">
        <td style="border: 1px solid black; ">
        <img class="imgtt" src="https://quickchart.io/chart?c={{$urlejercito}}" alt="Italian Trulli">
        </td>
      
        <td style="border: 1px solid black; ">
        <img class="imgtt" src="https://quickchart.io/chart?c={{$urlaerea}}" alt="Italian Trulli">
        </td>
        <td style="border: 1px solid black; ">
        <img class="imgtt" src="https://quickchart.io/chart?c={{$urlarmada}}" alt="Italian Trulli">
        </td>
        </tr> 
</table>

<label style="margin-top:5px; ">Grafico estadistico</label>
<table class="" style="width: 100%; border: 1px solid black;  margin-top:5px; ">
     <tr class="center" style="  height: 250px;">
        <td style="border: 1px solid black; ">
        <img class="imgtt" src="https://quickchart.io/chart?c={{$datapie}}" alt="Italian Trulli">
        </td>
       
   </tr> 
</table>

   </main>
      
</body>
</html>

