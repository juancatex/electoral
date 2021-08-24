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
  
                           <h3>{{datamodal.socio}}</h3>
                          
                        </div> 
                      </div>
                    </div>


                        <div   class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-center thtable">#</th>
                                <th class="thtable">Requisitos</th> 
                                <th class="text-right thtable">Cumple / No cumple</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr v-for="(rqs,index) in reqlista" :key="rqs.idreq">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{rqs.nombrereq}}</td>   
                                        <td class="td-actions text-right">  
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input class="form-check-input" type="checkbox" 
                                              v-model="reqselected"  :value="rqs.idreq" disabled>
                                              <span class="form-check-sign">
                                                <span class="check" style="background: #9c27b0;opacity: 1;"></span>
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
              reqlista:[], 
              socioselected:null,
              reqselected:[] 
            }
        }, 
        methods:{ 
           
          close(){  
           $('#modalcandidato').modal('hide');
          },
          inicializar(){
            let me=this;
              axios.get('/getRequisito').then(function (response) {  
                         me.reqlista=response.data; 
                     }).catch(function (response) {
                         console.log(response);
                     }); 
              axios.get('/getCandidatoRequisitos?idcandidato='+this.datamodal.idcandidato).then(function (response) {  
                         me.reqselected=_.map(response.data, 'idreq'); 
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