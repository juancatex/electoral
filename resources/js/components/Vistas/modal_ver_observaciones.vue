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
                                <th v-if="datamodal.ver==1" class="thtable">Usuario</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr v-for="(obs,index) in reqobservaciones" :key="obs.idobs">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{obs.observacion}}</td>   
                                        <td v-if="datamodal.ver==1">{{obs.user}}</td> 
                                  </tr> 
                            </tbody>
                          </table>
                        </div>
          </div> 
                            </div>
                            <div class="modal-footer">
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
              reqobservaciones:[] 
            }
        }, 
        methods:{ 
            
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