<template>
     <div class="row" style="width: 100%;"> 
            <div class="col-md-6" v-for="partidos in frenteslista" :key="partidos.idfrente">
              <div class="card " >
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-icon" style="padding: 7px;"> 
                    <img class="img imgfrente" :src="'storage/frente/'+partidos.rutafoto"> 
                  </div>
                  <!-- <h4 class="card-title titulocards" style="float: left;">{{partidos.nombre}}</h4> -->
                   <h4 class="card-title titulocards" style="float: left;">{{partidos.nomfuerza+' - '+partidos.nombre+' - '+partidos.sigla}}
                     </h4>
                
                <div v-if="uservoto.length==0" class="card-title" style="float: right;">
                      <button class="btn btn-success btn-round" @click="regvoto(partidos.idfrente,partidos.nombre,partidos.sigla,partidos.idfuerza)">
                        <i class="material-icons">check_circle_outline</i> Votar
                      </button>
                  </div>  
                <div v-else class="card-title" style="float: right;"> 
                        <i v-if="validate(partidos.idfrente)" class="material-icons" style="font-size: 45px;color: #4caf50;">check_circle_outline</i>  
                </div>  
                </div>
                <div class="card-body " style="padding: 0px;">
                 <div class="progress progress-line-primary" style=" margin-top: 15px; margin-bottom: 0px;">
                        <div class="progress-bar progress-bar-primary" role="progressbar"   aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> 
                        </div>
                 </div>   

                 <!-- ddd -->
             <div class="col-md-12" style="margin: 0px;  padding: 0px;">
              <div class="card " style="margin: 0px;"> 
                <div class="card-body ">
                  <div class="row">
                    <div class="col-lg-3 col-md-3">
                      <!--
                                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                            -->
                      <ul class="nav nav-pills nav-pills-info nav-pills-icons flex-column" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" :href="'#candidatos'+partidos.idfrente" role="tablist">
                            <i class="material-icons">group</i> Candidatos
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " data-toggle="tab" :href="'#descripcion'+partidos.idfrente" role="tablist">
                            <i class="material-icons">segment</i> Descripción
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" :href="'#propuestas'+partidos.idfrente" role="tablist">
                            <i class="material-icons">dashboard</i> Propuestas
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-9">
                      <div class="tab-content">
                        <div class="tab-pane active" :id="'candidatos'+partidos.idfrente">
                         <table>
                           <tr v-for="(cargoin) in ordencandidatos(partidos)" :key="cargoin.idcandidato" style="border-bottom-color: gray;border-bottom-style: solid;    border-bottom-width: 1px;">
                             <td style="font-weight: bold;">{{cargoin.nombrecargo+' : '}}</td>
                              <td >{{cargoin.nombresocio}}</td>
                              <td style="    width: 50px;  padding-left: 8px;"><img :src="'storage/candidatos/'+cargoin.rutafoto" class="rounded-circle" style="width: 100%;"></td> 
                           </tr>
                         </table>
                        </div>
                        <div class="tab-pane " :id="'descripcion'+partidos.idfrente">
                          {{partidos.descripcion}}
                           </div> 
                        <div class="tab-pane" :id="'propuestas'+partidos.idfrente">
                         {{partidos.propuestas}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                 <!-- ddd -->
                     
                </div>  
              </div>
            </div>
  <!-- <component   v-bind:is="modal" :datamodal="modaldata"  @closevue="closemodal"></component>  -->
     </div>
</template>

<script>
    export default {
      props:['vuepermisos'],    
      data (){
            return { 
              frenteslista:[], 
              candidatoslist:[], 
              uservoto:[{}], 

            }
        }, 
        methods:{
          validate(id){ 
            let me=this; 
            let busq= _.find(me.uservoto, function(o) { return (o.idfrente==id); }); 
                 if(typeof busq === 'undefined'){
                    return false;
                } else { 
                   return true;
                }  
           
          },regvoto(idfrente,nom,sigla,idfuerza){
               swal({
                              title: "Registrando voto",
                              allowOutsideClick: () => false,
                              allowEscapeKey: () => false,
                              onOpen: function() {
                                swal.showLoading();
                              } 
                            }).catch(error => {
                              swal.showValidationError("Request failed: ${error}");
                            });

                let me = this; 
                 

                                axios.post("/regvoto", {
                                   idfrente: idfrente  
                                  }).then(function (responsevoto) {   
                                                let qr = new QRious();  
                                                var valuesqr={};
                                                  valuesqr["pk"]=responsevoto.data.idvv;
                                                  valuesqr["user"]=responsevoto.data.user;  
                                                  valuesqr["nom"]=responsevoto.data.nom;  
                                                  valuesqr["ci"]=responsevoto.data.ci;  
                                                  valuesqr["pa"]=responsevoto.data.pa;  
                                                  qr.value =JSON.stringify(valuesqr);
                                                  qr.mime = 'image/jpeg'; 
                                                  qr.level= 'H';  
                                                  qr.size=200; 
                                            axios.post("/updateqrvoto", { 
                                              idvoto:responsevoto.data.idvv,
                                              qr:qr.toDataURL()
                                              }).then(function (response) {   
                                                    window.db.collection("votos").add({
                                                        idvv:responsevoto.data.idvv, 
                                                        user:responsevoto.data.user, 
                                                        idfrente:responsevoto.data.idfrente, 
                                                        idfuerza:idfuerza, 
                                                        nom:nom, 
                                                        sigla:sigla, 
                                                        dep:responsevoto.data.dep, 
                                                        date: firebase.firestore.Timestamp.fromDate(new Date())
                                                    })
                                                    .then((docRef) => {
                                                      me.initfrentes(); 
                                                      swal("Voto registrado exitosamente!","", "success");
                                                       me.$root.$emit('pdf', {
                                                            url: '/printvoto',
                                                            titulo: 'Certificado de votación'
                                                          });
                                                    })
                                                    .catch((error) => {
                                                        console.error("Error adding document: ", error);
                                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                                    });
                                                    
                                                }).catch(function (response) {
                                                    console.log(response);
                                                    swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                                });
                                         
                                    }).catch(function (response) {
                                        console.log(response);
                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                    });
          },
           ordencandidatos(id){
             let out=[];
              for (let candidato of this.candidatoslist) {  
                 if(candidato.idfrente==id.idfrente){
                   out.push(candidato);
                 }   
              }
              return out;
           },
            initfrentes(){ 
              let me = this; 
              axios.get('/getfrentesVoto').then(function (response) {  
                                  me.frenteslista=response.data; 
                              }).catch(function (response) {
                                  console.log(response);
                              });
            
              axios.get('/getCandidatosVoto').then(function (response) {  
                                  me.candidatoslist=response.data;  
                              }).catch(function (response) {
                                  console.log(response);
                              });

              axios.get('/getvotouser').then(function (response) {  
                                  me.uservoto=response.data;  
                              }).catch(function (response) {
                                  console.log(response);
                              });
            }
        },
     
        mounted() {
             this.initfrentes();
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
</style>