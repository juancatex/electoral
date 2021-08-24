<template>
     <div class="col-md-12"> 
        
           <div class="col-md-12" v-if="vuepermisos.agr==1">
              <form v-if="refreshform" id="frenteform" v-on:submit.prevent="submitForm">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">fact_check</i>
                    </div>
                    <h4 class="card-title titulocards">Registro de frentes</h4>
                  </div>
                  <div class="card-body">
                    <div class="row"> 
                    <div class="col-md-7">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="Nombre" class="bmd-label-floating"> Nombre del frente <span class="obli">*</span></label>
                            <input type="text" class="form-control" v-model="nombre" id="Nombre" required="true" name="nombre">
                          </div> 
                        </div> 
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="Sigla" class="bmd-label-floating"> Sigla <span class="obli">*</span></label>
                            <input type="text" class="form-control" v-model="sigla" id="Sigla" required="true" name="sigla" v-uppercase>
                          </div>
                        </div> 
                        <div class="col-md-12"> 
                          <div class="form-group">
                            <label class=" col-form-label">Fuerza <span class="obli">*</span></label>
                             
                                  <select class="custom-select"   v-model="fuerza" required> 
                                   <option v-for="(fuerza,keyin) in fuerzalista" :key="keyin" v-bind:value="fuerza.idfuerza" v-text="fuerza.nomfuerza "></option> 
                                  </select>
 
                          </div>

                        </div> 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="dfescrip" class="bmd-label-floating"> Descripcion breve <span class="obli">*</span></label> 
                                <textarea class="form-control" name="descripcion" v-model="descrip"  id="dfescrip" rows="4"  required="true"> 
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                             <div class="form-group">
                                <label for="propu" class="bmd-label-floating"> Propuestas <span class="obli">*</span></label> 
                                <textarea class="form-control" name="propuestas"  v-model="propu"  id="propu" rows="4"  required="true"> 
                                </textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-5" style="text-align: center;">
                      <h4 class="title" style="text-align: left;">Imagen del frente <span class="obli">*</span></h4>
                     
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="/img/tuvoto.jpg" id="pruebaaa" alt="...">
                        </div>

                         <!-- <div class="fileinput-preview fileinput-exists thumbnail"></div>   -->
                         <div  class="thumbnail" id="ppppppppp"></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Seleccionar imagen del frente</span>
                            <span class="fileinput-exists">Cambiar</span>
                            <input required="true" ref="fileon" type="file" name="fotofrente" accept="image/jpeg" @change="imagenView" />
                          </span>
                          <a href="#"   class="btn btn-danger btn-round fileinput-exists" @click="cancelar" id="btneliminart" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
                        </div>
                      </div>

                    
                    </div>
                   
                </div>
                    <div class="category form-category">* Campos obligatorios</div>
                  </div>
                  <div v-if="nuevafoto.length>0" class="card-footer " style="justify-content: flex-end;"> 
                        <div> 
                          <button class="btn btn-success" type="submit" >
                            <span class="btn-label">
                              <i class="material-icons">check</i>
                            </span>
                            Registrar frente
                          </button>  
                        </div> 
                  </div>
                </div>
              </form>
            </div>



           <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">done_all</i>
                  </div>
                  <h4 class="card-title titulocards">Frentes registrados</h4>
                </div>
                <div class="card-body">
                   
            <div class="row">
              <div class="col-md-3" v-for="partidos in frenteslista" :key="partidos.idfrente">
                <div class="card card-product " style="background: linear-gradient(60deg, rgb(186 71 188), rgb(36 65 170));">
                  <div class="card-header card-header-image" style="border: 3px solid orange;" data-header-animation="false">
                    <a>
                      <img class="img" :src="'storage/frente/'+partidos.rutafoto">
                    </a>
                  </div>
                  <div class="card-body"> 
                    <h4 class="card-title">
                      <a style="color: white;
                          font-weight: bold;
                          font-size: larger;"   >{{partidos.nombre}}</a>
                    </h4>
                    <div class="card-description" style="color: white;">
                       {{partidos.descripcion}}
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="price" style="color:white"> 
                      <h4 style="font-weight: bold;">{{partidos.nomfuerza}}</h4>
                      <h4>Sigla : {{partidos.sigla}}</h4>
                    </div> 
                    <div class="stats" >
                      <p v-if="partidos.consolidado==0" class="card-category" style="color:cyan"><i class="material-icons">build</i> En configuración</p>
                      <p v-else-if="partidos.consolidado==1" class="card-category" style="color:white"><i class="material-icons">verified</i> Consolidado</p>
                      <p v-else class="card-category" style="color:yellow"><i class="material-icons">error_outline</i> Observado</p>
                      
                    </div>
                     
                  </div>
                  <button v-if="partidos.consolidado==0" class="btn btn-danger" style="margin: 10px;" @click="deletefrente(partidos.idfrente)">
                            <span class="btn-label">
                              <i class="material-icons">delete</i>
                            </span>
                            Eliminar frente
                          </button>
                </div>
              </div>
                
            </div>


                </div>
              </div>
              </div>
  
     </div>
</template>

<script>
 
    export default {
      props:['vuepermisos'],    
      data (){
            return {
              nuevafoto:'',
              nombre:'',
              sigla:'',
              fuerza:'',
              descrip:'',
              propu:'',
              frenteslista:[],
              fuerzalista:[] ,
              refreshform:true

            }
        }, 
        methods:{ 
          inicializar(){
            let me=this;
            this.refreshform=false;
            this.nuevafoto='';
            this.nombre='';
            this.sigla='';
            this.fuerza='';
            this.descrip='';
            this.propu='';
            this.frenteslista=[];
 
                                  
            setTimeout(() => {
              me.refreshform=true;
              me.initfrentes();
               
            }, 700);
             axios.get('/getfuerzas').then(function (response) {  
                         me.fuerzalista=response.data; 
                     }).catch(function (response) {
                         console.log(response);
                     });
          },deletefrente(idfrentee){
             let me=this;
            axios.post("/deletefrente", {
                                          idfrente: idfrentee, 
                                  }).then(function (response) {   
                                    me.inicializar();
                                      swal("¡Frente eliminado exitosamente!","", "success");     
                                    }).catch(function (response) {
                                        console.log(response);
                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
             });
          },
          submitForm(){
             let me=this;
                axios.post('/regfrente', {
                'nombre':this.nombre,
                'sigla':this.sigla.toUpperCase(),
                'descripcion':this.descrip,
                'fuerza':this.fuerza,
                'propuestas':this.propu,
                'fotofrente':this.nuevafoto})
                .then(res => { 
                  me.inicializar();
                  swal("¡Frente registrado exitosamente!","", "success");})
                .catch(function (response) {
                    console.log(response);
                    swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                });
 
          },
          cancelar(){
 $('#idimagen').cropper('destroy');
    $('#ppppppppp').html('');
    this.nuevafoto='';
          },
          imagenView(){console.log('entro a cargar foto');
              let me=this;
                   if(this.$refs.fileon.files.length==0){  
                              me.nuevafoto='';  
                              
                       return;
                   }else{ 
                   var file = this.$refs.fileon.files[0]; 
                    var reader = new FileReader();
                    reader.onload = function(event) { 
                     //me.nuevafoto=event.target.result;  
                    me.nuevafoto=''; 
                    $('#idimagen').cropper('destroy');
                    $('#ppppppppp').html(''); 

                  $(`<img src='${event.target.result}' id="idimagen">
                    <div style="padding: 9px;" id="fotoimagenbenecrood">
                    <button  type="button" class="btn btn-success btn-round" id="btnselecctbene"><i class="material-icons">check_circle</i> Seleccionar</button>   
                    </div>`).appendTo('#ppppppppp');



                     $("#idimagen").cropper({
                                  aspectRatio: 1/1,
                                  viewMode: 1,
                                  dragMode: 'move',
                                  autoCropArea: 1,
                                  restore: false, 
                                  guides: false, 
                                  rotatable: false,
                                  multiple: false
                                  });  
                   
                    $("#btnselecctbene").click(function(){ 
                        me.nuevafoto=$("#idimagen").cropper('getCroppedCanvas',{ width: 300, height: 300 }).toDataURL();   
                        $('#idimagen').cropper('destroy');
                        $("#idimagen").attr("src",me.nuevafoto);
                        $('#fotoimagenbenecrood').html(''); 
                    }); 

 
                    }
                    reader.readAsDataURL(file);
                   }
          },
          initfrentes(){
            let me = this; 
                 axios.get('/getfrentes').then(function (response) {  
                         me.frenteslista=response.data; 
                     }).catch(function (response) {
                         console.log(response);
                     });
          }
        },
     
        mounted() {
             this.inicializar();
        }
    }
</script>
<style scoped>
.obli{
    color: red;
    font-weight: 900;
    font-size: larger;
    vertical-align: middle;
}
</style>