<template>
     <div class="col-md-12"> 
           <div class="col-md-12" v-if="vuepermisos.agr==1">
              <form v-if="refreshform" id="frenteform" v-on:submit.prevent="submitForm">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">fact_check</i>
                    </div>
                    <h4 class="card-title titulocards">Registro de Cargos</h4>
                  </div>
                  <div class="card-body">  
                          <div class="row">
                            <label class="col-md-2 col-form-label">Nombre del cargo</label>
                            <div class="col-md-9">
                              <div class="form-group">
                                <input type="text" class="form-control" v-model="nombrecargo" required="true" name="nombrecargo"> 
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <label class="col-md-2 col-form-label">Fuerza</label>
                            <div class="col-md-9">
                              <div class="col-lg-5 col-md-6 col-sm-3"> 
                                  <select class="custom-select"   v-model="fuerzaid" required> 
                                   <option v-for="(fuerza,keyin) in fuerzalista" :key="keyin" v-bind:value="fuerza.idfuerza" v-text="fuerza.nomfuerza "></option> 
                                  </select>

                                </div>
                            </div>
                          </div> 
                  </div>
                  <div class="card-footer " style="justify-content: flex-end;"> 
                        <div> 
                          <button class="btn btn-success" type="submit" >
                            <span class="btn-label">
                              <i class="material-icons">check</i>
                            </span>
                            Registrar cargo
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
                  <h4 class="card-title titulocards">Cargos registrados</h4>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th>Nombre del cargo</th>
                                <th>Fuerza</th>  
                                <th class="text-right">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr v-for="(cargoin,index) in cargolista" :key="cargoin.idcargo">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{cargoin.nombrecargo}}</td> 
                                        <td>{{cargoin.nomfuerza}}</td>  
                                        <td class="td-actions text-right">  
                                          <button v-if="vuepermisos.eli==1" type="button" rel="tooltip" class="btn btn-danger" @click="desactivaruser(cargoin.idcargo)">
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
              nombrecargo:'', 
              fuerzaid:1,  
              cargolista:[] , 
              fuerzalista:[] ,
               refreshform:true 
            }
        }, 
        methods:{  
          submitForm(){
             let me=this;
                axios.post('/regcargo', {
                'nombrecargo':this.nombrecargo,
                'fuerzaid':this.fuerzaid})
                .then(res => { 
                  me.inicializarcargos(); 
                  swal("¡Cargo registrado exitosamente!","", "success");})
                .catch(function (response) {
                    console.log(response);
                    swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                });
 
          }, desactivaruser(idcargoin){
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
                                 axios.post("/desactivarcargo", {
                                          idcargo: idcargoin 
                                  }).then(function (response) {  
                                    me.inicializarcargos(); 
                                          swal("¡Cargo desactivado exitosamente!","", "success");
                                    }).catch(function (response) {
                                        console.log(response);
                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                    });
          },
          inicializar(){
            let me = this;   
                 axios.get('/getfuerzas').then(function (response) {  
                         me.fuerzalista=response.data; 
                     }).catch(function (response) {
                         console.log(response);
                     });
            },
         inicializarcargos(){
           let me = this; 
            me.refreshform=false;
            me.nombrecargo='';
            me.fuerzaid=1; 
             me.refreshform=true; 
          
                 axios.get('/getcargos').then(function (response) {  
                         me.cargolista=response.data; 
                     }).catch(function (response) {
                         console.log(response);
                     }); 
            }
        },
     
        mounted() {
             this.inicializar();
             this.inicializarcargos();
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