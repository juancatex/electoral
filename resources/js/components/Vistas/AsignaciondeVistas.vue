<template>
     <div class="col-md-12"> 
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title titulocards">Asignación de Vistas</h4>
                </div>
                <div class="card-body">
                  <div class="col-md-12">
                      
                      <div class="row justify-content-center">
                        <h4 class="title">Rol :</h4>
                        <div class="col-lg-5 col-md-6 col-sm-3" style="margin-top: auto; margin-bottom: auto;">
 
                           <select class="custom-select"   v-model="rolselected" @change="cambiorol()">
                               <option selected value="0">Seleccione un rol</option>
                               <option v-for="roless in roles" :key="roless.idrol"
                                    :value="roless.idrol" v-text="roless.descripcion"></option>
                            </select>

                        </div> 
                      </div>
                    </div>
                  <div class="table-responsive" id="tabladatos" v-if="ides.length>0">
                    <table class="table ">
                      <thead class=" text-primary">
                        <tr> 
                          <th  rowspan="2" style="font-weight: 900;">Modulo</th> 
                          <th  rowspan="2" colspan="2" class="text-center" style="font-weight: 900;">Nombre Vista</th> 
                        
                          <th  colspan="3" class="text-center" style="font-weight: 900;">Permisos</th> 
                        </tr>
                        <tr> 
                          <th class="text-center" style="font-weight: 900;">Insertar</th> 
                          <th class="text-center" style="font-weight: 900;">Modificar</th> 
                          <th class="text-center" style="font-weight: 900;">Eliminar</th> 
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(menus) in ides"  :key="menus.idvista">
                           <td>{{menus.descripcion}}</td>
                        
                          <td class="text-center">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" 
                                v-model="vistasselected"  :value="menus.idvista" @change="clear(menus.idvista)" :disabled="!vuepermisos.mod">
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div> 
                          </td> 
                          <td>{{menus.nombre}}</td>
                          <td class="text-center">
                         <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox"
                              v-model="permisoss" :id="menus.idvista+'a'" :value="{per:'agr',menu:menus.idvista}" disabled> 
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          </td>
                          <td class="text-center">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox"
                              v-model="permisoss" :id="menus.idvista+'m'" :value="{per:'mod',menu:menus.idvista}" disabled>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          </td>
                          <td class="text-center"> 
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox"
                              v-model="permisoss" :id="menus.idvista+'e'" :value="{per:'eli',menu:menus.idvista}" disabled>
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

                <div v-if="vuepermisos.mod&&ides.length>0&&roles.length>0" class="card-footer ">
                  <button class="btn btn-danger" @click="cancelll">
                    <i class="material-icons">close</i> Cancelar
                  </button>
                   <button class="btn btn-success" @click="guardarpermisos">
                    <span class="btn-label">
                      <i class="material-icons">check</i>
                    </span>
                    Guardar cambios
                  </button>  
                </div>
              
              </div>
            </div>
</template>

<script>
    export default {
      props:['vuepermisos'],    
      data (){
            return {
              rolselected:0,
              roles:[],
              vistasselected: [], 
              permisoss: [], 
              ides: [],
            }
        }, 
        methods:{
          guardarpermisos(){
                            swal({
                              title: "Registrando los Datos",
                              allowOutsideClick: () => false,
                              allowEscapeKey: () => false,
                              onOpen: function() {
                                swal.showLoading();
                              } 
                            }).catch(error => {
                              swal.showValidationError("Request failed: ${error}");
                            });

                                   let me=this; 
                                    setTimeout(() => {
                                      me.regvistaspermiso(me.vistasselected,me.permisoss,me.rolselected).then((response)=>{ 
                                      if(response){  swal("¡Se registro los datos correctamente!","", "success");
                                      me.$root.$emit('aupdateMunesRol');}
                                      else{  swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning");  }   
                                    });
                                    }, 500); 
          },
        async regvistaspermiso(vistas, permisos,rol) { 
                            let responses = true;
                            try {  
                              await axios.post("/borrarpermisos", { rolin: rol});
                              for (var vistain of vistas) {
                                var out= _.reduce(permisos, function(result, value, key) {   
                                  if(value.menu==vistain){  result[value.per]=1;  } 
                                  return result;  }, {});
                                await axios.post("/guardarpermisos", {
                                                      rolin: rol,
                                                      vistas: vistain,
                                                      permisos: JSON.stringify(out)
                                  });
                                }; 
                            } catch (err) {
                              console.log(err);
                              responses = false;
                            }
                            return responses;
            },cancelll(){
              this.ides=[];
            this.vistasselected=[];
            this.permisoss=[]; 
            this.rolselected=0;
            },
          cambiorol(){
            this.ides=[];
            this.vistasselected=[];
            this.permisoss=[]; 
            if(this.rolselected!=0){ 
                   let me = this; 
                   axios.get('/getvistas?rol='+this.rolselected).then(function (response) { 
                     me.ides=response.data.vistas; 
                          _.forEach(response.data.permisos, function(valuein) { 
                            me.vistasselected.push(valuein.idvista);
                                    var json=JSON.parse(valuein.permisos);
                                    _.forEach(json, function(value, key) {
                                      me.permisoss.push({ "per": key, "menu": valuein.idvista });
                                    }); 
                          });

                     })
                     .catch(function (response) {
                         console.log(response);
                     });
            }
          },
         clear(id){  
            this.$nextTick(() => {
                this.permisoss = _.remove(this.permisoss, function(n) { 
                  return n.menu!=id;
                }); 

                if(_.findIndex(this.vistasselected, function(o) { return o == id; })<0){
                  $('#'+id+'a').prop( "disabled", true ); 
                  $('#'+id+'m').prop( "disabled", true ); 
                  $('#'+id+'e').prop( "disabled", true ); 
                }else{
                  $('#'+id+'a').prop( "disabled", false );
                  $('#'+id+'m').prop( "disabled", false );
                  $('#'+id+'e').prop( "disabled", false );
                }

            });

         } ,
         initi(){
               let me = this; 
                axios.get('/getrols').then(function (response) {  
                    me.roles=response.data;
                })
                .catch(function (response) {
                    console.log(response);
                });
         }
        },
     
        mounted() {
              this.initi(); 
              this.ides=[]; 
        }
    }
</script>
