<template>
     <div class="modal fade backmodal" id="modalcandidato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title titulocards">Observaciones</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body"> 
                
          <div class="row" v-if="reqobservaciones.length>0">
                   
                        <div   class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-center thtable">#</th>
                                <th class="thtable">Observación</th> 
                                <th class="thtable">Usuario</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr v-for="(obs,index) in reqobservaciones" :key="obs.idobs">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{obs.observacion}}</td>   
                                        <td>{{obs.user}}</td> 
                                  </tr> 
                            </tbody>
                          </table>
                        </div>
          </div>
          <div class="row">
             <h4 class="modal-title titulocards" style="text-align: center; margin: 15px; width: 100%;">Registro</h4>
            <div class="form-group col-md-12">
                                <label for="dfescrip" class="bmd-label-floating" style="    color: black;font-size: medium;"> Observación <span class="obli">:</span></label> 
                                <textarea class="form-control" name="descripcion" v-model="obs"  id="dfescrip" rows="4"  required="true"> 
                                </textarea>
                            </div>
          </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" @click="save()" style="margin-right: 10px;" ><i class="material-icons">check</i>Registrar</button>
                              <button type="button" class="btn btn-danger" @click="close()"  ><i class="material-icons">close</i>Cerrar</button>
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
              reqobservaciones:[], 
              obs:'' 
            }
        }, 
        methods:{ 
          save(){ 
             let me=this;
                axios.post('/regobs', { 
                'idfrente':this.datamodal.idfrente,
                'obs':this.obs})
                .then(res => {  
                  swal("¡Candidato registrado exitosamente!","", "success");
                  me.obs='';
                  me.inicializar();
                  })
                .catch(function (response) {
                    console.log(response);
                    swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                });
  
          }, 
          close(){  
           $('#modalcandidato').modal('hide');
          },
          inicializar(){
            let me=this;
              axios.get('/getobs?idfrente='+this.datamodal.idfrente).then(function (response) {  
                         me.reqobservaciones=response.data; 
                }).catch(function (response) {
                         console.log(response);
                });  
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