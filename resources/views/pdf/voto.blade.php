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

.table {
  border: 1px solid gray;
}
  </style> 
    <title>voto</title> 
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" /> 
</head>
<body>  
        <main> 
        
       <table class="tablet" style="width: 100%;  ">
                <tr>
                                <td class="center"> <img src="{{$foto}}" width="100px"> </td>
                                <td style="text-align:center;"> <p style="line-height : 18px;">Asociación nacional de Suboficiales y Sargentos de las fuerzas armadas del estado</p><h3>Certificado de sufragio</h3></td>
                                <td class="center"> <img src="{{$qr}}" width="100px" > </td>
                </tr>
       </table>

<table class="table" style="width: 100%; border: 1px solid gray; margin-top:15px; ">
     <tr>
        <td style="width: 25%; font-weight: bold;">Socio :</td>
        <td style="text-align:left;" colSpan="3">{{$user}}</td> 
     </tr>
     <tr> 
        <td style="width: 25%; font-weight: bold;">Destino :</td>
        <td style="text-align:left;" colSpan="3">{{$nomdestino}}</td> 
     </tr>
     <tr> 
        <td style="width: 25%; font-weight: bold;">C.I. :</td>
        <td style="text-align:left;width: 25%;">{{$ci}} {{$abrvdep}}</td>
        <td style="width: 25%; font-weight: bold;">Num. Papeleta :</td>
        <td style="text-align:left;width: 25%;">{{$papeleta}}</td>
     </tr>
     <tr>  
        <td style="width: 25%; font-weight: bold;">Fuerza :</td>
        <td style="text-align:left;width: 25%;">{{$nomfuerza}}</td>
        <td style="width: 25%; font-weight: bold;">Carnet Militar :</td>
        <td style="text-align:left;width: 25%;">{{$carnetmilitar}}</td>
     </tr>
     <tr> 
        <td style="width: 25%; font-weight: bold;">Domicilio :</td>
        <td style="text-align:left;" colSpan="3">{{$direcciondomicilio}}</td> 
     </tr>
     <tr> 
        <td style="width: 25%; font-weight: bold;">Codigo de control :</td>
        <td style="text-align:left;" colSpan="3">{{$pk}}</td> 
     </tr>
     <tr> 
        <td style="width: 25%; font-weight: bold;">Fecha de sufragio :</td>
        <td style="text-align:left;" colSpan="3">{{$date}}</td> 
     </tr>
     </table>
  
       <p style="font-size: 10px;"> <b>Nota:</b>  El presente documento sera requerido para futuras solicitudes de prestamo dentro del periodo de 60 dias calendario, debe portar con este documento para realizar sus tramites en la institución.</p>
        </main>
      
</body>
</html>
