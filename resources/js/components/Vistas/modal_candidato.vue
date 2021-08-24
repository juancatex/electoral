<template>
     <div class="modal fade backmodal" id="modalcandidato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title titulocards">{{datamodal.nombrefrente+' - '+datamodal.nombrecargo}}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body"> 
                
                    <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px;"> 
                      <div class="row justify-content-center">
                        <h4 class="col-md-3" style="text-align: end;margin-top: auto;   margin-bottom: auto;">Candidato :</h4>
                        <div class="col-md-9" style="margin-top: auto; margin-bottom: auto;">
  
                            <ajaxselect :ruta="'/buscasocio2?idfuerza='+datamodal.idfuerza+'&buscar='" @found="sociobuscado" @cleaning="cleansocio" resp_ruta="socios"
                              labels="nomgrado,nombre,apaterno,amaterno,numpapeleta"
                              placeholder="Ingrese Nombre, Apellido, CI, Numero de papeleta" 
                              idtabla="idsocio" :clearable="true">
                            </ajaxselect>
                          
                        </div> 
                      </div>
                    </div>
                    <div v-if="socioselected!=null" class="col-md-5" style="text-align: center;">
                      <h4 class="title" style="text-align: left;font-weight: bold;">Fotografia <span class="obli">*</span></h4>
                     
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="/img/default-avatar.png" id="pruebaaa" alt="...">
                        </div>

                         <!-- <div class="fileinput-preview fileinput-exists thumbnail"></div>   -->
                         <div  class="thumbnail" id="ppppppppp"></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Seleccionar fotografia</span>
                            <span class="fileinput-exists">Cambiar</span>
                            <input required="true" ref="fileon" type="file" name="fotofrente" accept="image/jpeg" @change="imagenView" />
                          </span>
                          <a href="#"   class="btn btn-danger btn-round fileinput-exists" @click="cancelar" id="btneliminart" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
                        </div>
                      </div>

                    
                    </div>


                        <div v-if="socioselected!=null" class="col-md-7 table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-center thtable">#</th>
                                <th class="thtable">Requisitos</th> 
                                <th class="text-right thtable">Cumple / No cumple</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr v-for="(rqs,index) in reqlista" :key="rqs.idreq" style="font-size: 12px;">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{rqs.nombrereq}}</td>   
                                        <td class="td-actions text-right">  
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input class="form-check-input" type="checkbox" 
                                              v-model="reqselected"  :value="rqs.idreq" >
                                              <span class="form-check-sign">
                                                <span class="check"></span>
                                              </span>
                                            </label>
                                          </div> 
                                        </td>
                                  </tr> 
                            </tbody>
                          </table>
                        </div>
</div>
                            </div>
                            <div class="modal-footer">
                              <button v-if="nuevafoto.length>0" type="button" class="btn btn-success" @click="save()" style="margin-right: 10px;" ><i class="material-icons">check</i>Registrar</button>
                              <button type="button" class="btn btn-danger" @click="close()"  ><i class="material-icons">close</i>Cancelar</button>
                            </div>
                          </div>
                        </div>
       
       </div> 
</template>

<script>
    export default {
      props:['datamodal'],    
      data (){
            return { 
              nuevafoto:'',
              reqlista:[], 
              socioselected:null,
              reqselected:[] 
            }
        }, 
        methods:{ 
          save(){ 
             let me=this;
                axios.post('/regcandidato', {
                'idfrente':this.datamodal.idfrente,
                'nombresocio':this.socioselected.nomgrado+' '+this.socioselected.nombre+' '+this.socioselected.apaterno+' '+this.socioselected.amaterno,
                'idcargo':this.datamodal.idcargo,
                'idsocio':this.socioselected.idsocio,
                'foto':this.nuevafoto,
                'req':this.reqselected})
                .then(res => {  
                  swal("¡Candidato registrado exitosamente!","", "success");
                  me.close();})
                .catch(function (response) {
                    console.log(response);
                    swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                });
 
         
          },
          sociobuscado(socio){ 
            this.socioselected=socio; 
          },
          cleansocio(socio){ 
            this.socioselected=null;
          },
          close(){  
           $('#modalcandidato').modal('hide');
          },
          inicializar(){
            this.nuevafoto='';
            let me=this;
              axios.get('/getRequisito').then(function (response) {  
                         me.reqlista=response.data; 
                     }).catch(function (response) {
                         console.log(response);
                     }); 
          } ,
          cancelar(){
            $('#idimagen').cropper('destroy');
            $('#ppppppppp').html('');
            this.nuevafoto='';
          },
          imagenView(){ 
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
          }
        }, 
        mounted() {
          this.inicializar();
              $('.modal').modal('hide');
              $('#modalcandidato').modal('show');
              let me=this;
             $('#modalcandidato').on('hidden.bs.modal', function (e) {
                me.$emit('closevue'); 
             });
        }
    }
</script>
<style scoped>
.backmodal{
   background: rgb(142 142 142 / 82%);
}
.thtable{
      font-weight: bold;
}
</style>