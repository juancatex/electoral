<template>
     <div class="col-md-12"> 
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title titulocards">Asignación de Rol</h4>
                </div>
                <div class="card-body row">
                  <div class="col-md-12"> 
                      <div class="row justify-content-center">
                        <h4 class="title col-md-2" style="    text-align: end;margin-top: auto;   margin-bottom: auto;">Socio :</h4>
                        <div class="col-lg-6 col-md-7 col-sm-4" style="margin-top: auto; margin-bottom: auto;">
 
                         <template v-if="buscarsocio">
                            <ajaxselect :ruta="'/buscasocio?buscar='" @found="sociobuscado" @cleaning="cleansocio" resp_ruta="socios"
                              labels="nomgrado,nombre,apaterno,amaterno,numpapeleta"
                              placeholder="Ingrese Nombre, Apellido, CI, Numero de papeleta" idtabla="idsocio" :clearable="true">
                            </ajaxselect>
                          </template>

                        </div> 
                      </div>
                    </div>
                  <div class="col-md-12"> 
                      <div class="row justify-content-center">
                        <h4 class="title col-md-2" style="text-align: end;">Rol :</h4>
                        <div class="col-lg-6 col-md-7 col-sm-4" style="margin-top: auto; margin-bottom: auto;">
 
                          
               <template v-if="mostrarselect" >
                     <v-select   
                        label="descripcion" :options="roles"
                        v-model="rolselected" placeholder="Seleccione rol"
                        :reduce="roless => roless.idrol" :searchable="false" :clearable="false" >  
                        <template slot="no-options">
                          No se encontraron datos
                        </template>
                        <template slot="option" slot-scope="option">
                          <div class="d-center">  
                                <div >{{ option.descripcion }}   </div> 
                          </div>
                        </template>
                        <template slot="selected-option" slot-scope="option3">
                          <div class="selected d-center">  {{ option3.descripcion }} 
                          </div>
                        </template> 
                      </v-select>
                    </template>

                        </div> 
                      </div>
                    </div> 
                </div> 
                <div v-if="vuepermisos.mod&&rolselected!=0&&socioselected!=null" class="card-footer " style="justify-content: flex-end;">
                 <div>
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
               
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">supervisor_account</i>
                  </div>
                  <h4 class="card-title titulocards">Usuarios con roles</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Rol</th>
                          <th>Nombre socio</th> 
                          <th>Numero de papeleta</th> 
                          <th class="text-right">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(userr,index) in userrol" :key="userr.id">
                          <td class="text-center">{{index+1}}</td>
                          <td>{{userr.descripcion}}</td>
                          <td>{{userr.user}}</td>
                          <td>{{userr.papeleta}}</td> 
                          <td class="td-actions text-right"> 
                            <button type="button" rel="tooltip" class="btn btn-success" @click="cambiopass(userr.id)">
                              <i class="material-icons">change_circle</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger" @click="desactivaruser(userr.id)">
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
</template>

<script>
    export default {
      props:['vuepermisos'],    
      data (){
            return {
              rolselected:0,
              socioselected:null,
              buscarsocio:1,
              mostrarselect:1,
              roles:[], 
              userrol:[] 
            }
        }, 
        methods:{ 
          cambiopass(iduser){
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
                                      var password=this.generapass(10);
                                      let me=this;
                                 axios.post("/updatepass", {
                                          iduser: iduser,  pass: password
                                  }).then(function (response) {  
                                    me.inituserrol();
                                        swal({
                                          title: '¡Contraseña restablecida exitosamente!',
                                          html: `
                                                  <div class="col-sm-12">
                                                    <div class="form-group">
                                                      <label>Contraseña :</label>
                                                      <input type="text" class="form-control" style="    background: transparent;" value="${password}" readonly>
                                                    </div>
                                                  </div>`,
                                          type:"success",
                                          showCancelButton: false, 
                                          confirmButtonText: "Ok"  
                                          });
                                    }).catch(function (response) {
                                        console.log(response);
                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                    });

          },
           desactivaruser(iduser){
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
                                 axios.post("/desactivaruser", {
                                          iduser: iduser 
                                  }).then(function (response) {  
                                    me.inituserrol(); 
                                          swal("¡Usuario desactivado exitosamente!","", "success");
                                    }).catch(function (response) {
                                        console.log(response);
                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                    });
          },
          	generapass(len) {
              let text = " "
              let chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890" 
              for( let i=0; i < len; i++ ) {
                text += chars.charAt(Math.floor(Math.random() * chars.length))
              } 
              return text
            },
          sociobuscado(socio){ 
            this.socioselected=socio; 
          },
          cleansocio(socio){ 
            this.socioselected=null;
          },
           cancelll(){ 
            this.rolselected=0; 
            this.socioselected=null;  
             this.buscarsocio = 0;
                setTimeout(() => {
                  this.buscarsocio = 1;
                }, 300);

                this.mostrarselect = 0;
                setTimeout(() => {
                  this.mostrarselect = 1;
                }, 300);
            }, 
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
              var password=this.generapass(10);
              let me=this;
                axios.post("/asignarrol", {
                                          idrol: this.rolselected,
                                          iduser: this.socioselected.id, 
                                  }).then(function (response) { 
                                    me.inituserrol();  
                                    swal("¡Rol asignado exitosamente!","", "success");
                                    }).catch(function (response) {
                                        console.log(response);
                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                    });
            },
         initi(){
               let me = this; 
                 axios.get('/getrols').then(function (response) {  
                         me.roles=response.data; 
                     }).catch(function (response) {
                         console.log(response);
                     });
         },
         inituserrol(){
            let me = this; 
                 axios.get('/getuserRol').then(function (response) {  
                         me.userrol=response.data; 
                     }).catch(function (response) {
                         console.log(response);
                     });
         }
        },
     
        mounted() {
              this.initi();  
              this.inituserrol();  
        }
    }
</script>
