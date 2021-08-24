<template>
     <div class="col-md-12"> 
           <div class="col-md-12" v-if="vuepermisos.agr==1">
              <form v-if="refreshform" id="frenteform" v-on:submit.prevent="submitForm">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">fact_check</i>
                    </div>
                    <h4 class="card-title titulocards">Registro de requisitos</h4>
                  </div>
                  <div class="card-body">  
                          <div class="row">
                            <label class="col-md-2 col-form-label">Nombre del requisito</label>
                            <div class="col-md-9">
                              <div class="form-group">
                                <input type="text" class="form-control" v-model="nombrerequisito" required="true" name="nombrerequisito"> 
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <label class="col-md-2 col-form-label">Codigo</label>
                            <div class="col-md-9">
                              <div class="form-group">
                                <input type="text" class="form-control" v-model="codigo" required="true" name="codigo" v-uppercase> 
                              </div>
                          </div> 
                  </div>
                    <div class="card-footer " style="justify-content: flex-end;"> 
                          <div> 
                            <button class="btn btn-success" type="submit" >
                              <span class="btn-label">
                                <i class="material-icons">check</i>
                              </span>
                              Registrar requisito
                            </button>  
                          </div> 
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
                  <h4 class="card-title titulocards">Requisitos registrados</h4>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th>Nombre del requisito</th>
                                <th>Codigo</th>  
                                <th class="text-right">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr v-for="(reqin,index) in reqlista" :key="reqin.idreq">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{reqin.nombrereq}}</td> 
                                        <td>{{reqin.codigoreq}}</td>  
                                        <td class="td-actions text-right">  
                                          <button v-if="vuepermisos.eli==1" type="button" rel="tooltip" class="btn btn-danger" @click="desactivaruser(reqin.idreq)">
                                            <i class="material-icons">delete_forever</i>
                                          </button>
                                        </td>
                                  </tr> 
                            </tbody>
                          </table>
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
              nombrerequisito:'', 
              codigo:'',  
              reqlista:[] ,  
               refreshform:true 
            }
        }, 
        methods:{  
          submitForm(){
             let me=this;
                axios.post('/regRequisito', {
                'nombrereq':this.nombrerequisito,
                'codigoreq':this.codigo.toUpperCase()})
                .then(res => { 
                  me.inireq(); 
                  swal("¡Cargo registrado exitosamente!","", "success");})
                .catch(function (response) {
                    console.log(response);
                    swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                });
 
          }, desactivaruser(idreq){
             swal({
                              title: "Actualizando los Datos",
                              allowOutsideClick: () => false,
                              allowEscapeKey: () => false,
                              onOpen: function() {
                                swal.showLoading();
                              } 
                            }).catch(error => {
                              swal.showValidationError("Request failed: ${error}");
                            });
                            let me=this;
                                 axios.post("/desactivarRequisito", {
                                          idreq: idreq 
                                  }).then(function (response) {  
                                    me.inireq(); 
                                          swal("¡Requisito desactivado exitosamente!","", "success");
                                    }).catch(function (response) {
                                        console.log(response);
                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                    });
          },
          
         inireq(){
           let me = this; 
            me.refreshform=false;
            me.nombrerequisito='';
            me.codigo=''; 
            me.refreshform=true;  
                 axios.get('/getRequisito').then(function (response) {  
                         me.reqlista=response.data; 
                     }).catch(function (response) {
                         console.log(response);
                     }); 
            }
        },
     
        mounted() { 
             this.inireq();
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