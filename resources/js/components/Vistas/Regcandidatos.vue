<template>
     <div class="row" style="width: 100%;"> 
            <div class="col-md-12" v-for="partidos in frenteslista" :key="partidos.idfrente">
              <div :class=" partidos.consolidado==2?'card observado':'card'">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-icon" style="padding: 7px;"> 
                    <img class="img imgfrente" :src="'storage/frente/'+partidos.rutafoto"> 
                  </div>
                  <h4 class="card-title titulocards" style="float: left;">{{partidos.nomfuerza}} - {{partidos.nombre}} 
                    <p :style="partidos.consolidado==1?'color:#4caf50;':(partidos.consolidado==2?'color: red;':'')">
                      {{partidos.consolidado==1?'Consolidado':(partidos.consolidado==2?'Observado':'')}}
                    </p>
                    <button v-if="partidos.consolidado==2" class="btn btn-warning btn-sm" @click="verobs(partidos.idfrente)">Ver observaciones</button>
                  </h4>
                  <h4 class="card-title" style="float: right;">Sigla : {{partidos.sigla}}</h4>
                </div>
                <div class="card-body ">
                 <div class="progress progress-line-primary">
                        <div class="progress-bar progress-bar-primary" role="progressbar" :id="'pro'+partidos.idfrente" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"> 
                        </div>
                 </div>   
                   <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-center thtable">#</th>
                                <th class="thtable">Fuerza</th>
                                <th class="thtable">Nombre del cargo</th>  
                                <th class="thtable">Nombre del candidato</th>  
                                <th class="text-right thtable">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <tr v-for="(cargoin,index) in getcandidatoscargo(partidos)" :key="cargoin.idcargo">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{cargoin.nomfuerza}}</td> 
                                        <td>{{cargoin.nombrecargo}}</td> 
                                        
                                        <template v-if="cargoin.socioid!=null">
                                          <td><img :src="'storage/candidatos/'+cargoin.rutafoto" class="rounded-circle" style="    width: 6%; margin-right: 11px;">{{cargoin.socio}}</td>   
                                          <template v-if="partidos.consolidado==1">
                                             <td  class="td-actions text-right textconso"> 
                                                 Consolidado
                                             </td>
                                          </template>
                                          <template v-else>
                                               <td v-if="vuepermisos.mod==1||vuepermisos.eli==1" class="td-actions text-right">  
                                                <button v-if="vuepermisos.mod==1" type="button" rel="tooltip" class="btn btn-info" @click="modiuser(cargoin.idcandidato,cargoin.socio,partidos.nombre,cargoin.nombrecargo)">
                                                  <i class="material-icons">done_all</i> Modificar
                                                </button>
                                                <button v-if="vuepermisos.eli==1" type="button" rel="tooltip" class="btn btn-danger" @click="desactivaruser(cargoin.idcandidato)">
                                                  <i class="material-icons">delete_forever</i> Eliminar
                                                </button>
                                              </td>
                                              <td v-else class="td-actions text-right texteli"> 
                                                      No disponible
                                              </td>
                                          </template>
                                         </template>
                                           
                                           <template v-else>
                                                <td></td>   
                                                <template v-if="partidos.consolidado==1">
                                                    <td  class="td-actions text-right textconso"> 
                                                        Consolidado
                                                    </td>
                                                </template>
                                                <template v-else>
                                                  <td v-if="vuepermisos.agr==1" class="td-actions text-right">  
                                                  <button  type="button" rel="tooltip" class="btn btn-success" @click="activaruser(partidos.idfrente,cargoin.idcargo,cargoin.idfuerza,partidos.nombre,cargoin.nombrecargo)">
                                                    <i class="material-icons">done</i> Registrar
                                                  </button> 
                                                </td>
                                                <td v-else class="td-actions text-right textpen"> 
                                                  Registro pendiente
                                                </td>
                                                </template>
                                           </template>
                                  </tr> 
                            </tbody>
                          </table>
                        </div>

                </div> 
              </div>
            </div>
  <component   v-bind:is="modal" :datamodal="modaldata"  @closevue="closemodal"></component> 
     </div>
</template>

<script>
    export default {
      props:['vuepermisos'],    
      data (){
            return {
              modal:'',
              modaldata:{},
              frenteslista:[],
              cargolista:[] ,
              candidatoslist:[] 

            }
        }, 
        methods:{ 
          verobs(idfrente){
            this.modaldata={idfrente:idfrente,ver:1};
             this.modal='modal_ver_observaciones';
          },
          activaruser(frente,cargo,idfuerza,nombrefrente,nombrecargo){ 
             this.modaldata={idfrente:frente,idcargo:cargo,idfuerza:idfuerza,nombrefrente:nombrefrente,nombrecargo:nombrecargo};
             this.modal='modal_candidato';

          }, modiuser(idcandidato,socio,nombrefrente,nombrecargo){ 
             this.modaldata={idcandidato:idcandidato,socio:socio,nombrefrente:nombrefrente,nombrecargo:nombrecargo};
             this.modal='modal_mod_candidato';

          }, closemodal(){
            this.modaldata={}; 
            this.modal='';  
            this.initcargos();
          },
          getcandidatoscargo(frente){
              let me = this; 
            var out =[]; 
            var count=0;
              for (let cargo of this.cargolista) {  
               
                 if(frente.idfuerza==cargo.idfuerza){
                     let busq= _.find(me.candidatoslist, function(o) { return (o.idfrente==frente.idfrente&&o.idcargo==cargo.idcargo); }); 
                    if(typeof busq === 'undefined'){ 
                          out.push({nombrecargo:cargo.nombrecargo,nomfuerza:cargo.nomfuerza,idfuerza:cargo.idfuerza,socioid:null,socio:null,idcandidato:null,rutafoto:null,idcargo:cargo.idcargo});
                      
                    } else {
                        
                          count++;
                          out.push({nombrecargo:cargo.nombrecargo,nomfuerza:cargo.nomfuerza,idfuerza:cargo.idfuerza,socioid:busq.idsocio,socio:busq.nombresocio,rutafoto:busq.rutafoto,idcandidato:busq.idcandidato,idcargo:cargo.idcargo});  
                      }
                  } 
              }
                
                var fa1=count*100;
                var f2=fa1/out.length; 
                setTimeout(() => {
                  $('#pro'+frente.idfrente).css('width',f2+"%"); 
                }, 300);
              return out;
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
                                 axios.post("/desactivarcandidato", {
                                          idcandidato: idcargoin 
                                  }).then(function (response) {  
                                          me.initcargos(); 
                                          swal("¡Candidato desactivado exitosamente!","", "success");
                                    }).catch(function (response) {
                                        console.log(response);
                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                    });
          },
          initcargos(){
            let me = this;  
                  axios.get('/getcargos').then(function (response) {  
                         me.cargolista=response.data; 
                         me.initcandidatos();
                     }).catch(function (response) {
                         console.log(response);
                     }); 
          },initcandidatos(){
             let me = this; 
            axios.get('/getCandidatos').then(function (response) {  
                                 me.candidatoslist=response.data; 
                                 me.initfrentes();
                            }).catch(function (response) {
                                console.log(response);
                            });
          },initfrentes(){
             let me = this; 
            axios.get('/getfrentes').then(function (response) {  
                                me.frenteslista=response.data; 
                            }).catch(function (response) {
                                console.log(response);
                            });
          }
        },
     
        mounted() {
             this.initcargos();
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
.imgfrente{
  width: 80px;
    height: 80px;
}
.thtable{
      font-weight: bold;
}
.textpen{
    font-style: italic;
    color: gray;
    font-size: smaller;
}
.texteli{
  font-style: italic;
    color: #0008ff8a;
    font-size: smaller;
}
.textconso{
  font-style: italic;
   color: #4caf50;
    font-size: smaller;
}
.observado{
  background: #f3c3736b !important;
}
</style>