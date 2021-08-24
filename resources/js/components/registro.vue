<template>
   <div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-10 col-sm-10 ml-auto mr-auto"> 
            <div class="card card-login text-center card-hidden">
                <div class="card-header " style="margin-bottom: 0px;    margin-left: 30%;  margin-right: 30%;">
                    <div class="card-avatar">
                        <img class="img" style="width: 40%;" src="img/icon.png">
                    </div>
                </div>
                <h3 class="card-title" style="margin: 0px;"> <span style="font-weight: 100;">Sistema Electoral</span>
                </h3>
                <h4 class="card-title" style="margin: 0px;">REGISTRO</h4>
                           
                            <div id="result" > 
                            </div>
                  
                   <div v-if="buscarsocio==1&&socioselected==null" class="col-md-12 mt-3 mb-3">
                     <!-- <template v-if="buscarsocio">
                            <ajaxselect :ruta="'/buscasocioupdate?buscar='" @found="sociobuscado" @cleaning="cleansocio" resp_ruta="socios"
                              labels="nomgrado,nombre,apaterno,amaterno,numpapeleta"
                              placeholder="Ingrese Nombre, Apellido, CI, Numero de papeleta" idtabla="idsocio" :clearable="true">
                            </ajaxselect>
                    </template>   -->
                        <div class="form-group" style="text-align: left;">
                            <label for="ciget" class="bmd-label-floating">Ingrese su carnet de identidad (sin extencion)</label>
                            <input type="number" class="form-control" v-model="ciin" id="ciget">
                        </div>
                         <button type="button" class="btn btn-fill btn-rose" @click="validaci">Validar carnet de identidad</button>
                   </div>
                   <div v-if="buscarsocio==2&&socioselected==null" class="col-md-12 mt-3 mb-3">
                     <!-- <template v-if="buscarsocio">
                            <ajaxselect :ruta="'/buscasocioupdate?buscar='" @found="sociobuscado" @cleaning="cleansocio" resp_ruta="socios"
                              labels="nomgrado,nombre,apaterno,amaterno,numpapeleta"
                              placeholder="Ingrese Nombre, Apellido, CI, Numero de papeleta" idtabla="idsocio" :clearable="true">
                            </ajaxselect>
                    </template>   -->
                    <div class="form-group" style="text-align: left;">
                            <label for="ciget" class="bmd-label-floating">Ingrese su carnet de identidad (sin extencion)</label>
                            <input type="number" class="form-control" v-model="ciin" id="ciget" readonly>
                        </div>

                        <div class="form-group" style="text-align: left;">
                            <label for="numpapeletaget" class="bmd-label-floating">Ingrese su carnet su numero de papeleta</label>
                            <input type="number" class="form-control" v-model="numpapeletauser" id="numpapeletaget">
                        </div>
                         <button type="button" class="btn btn-fill btn-rose" @click="validanum">Validar numero de papeleta</button>
                   </div>

                <form :class="socioselected!=null?'':'d-none'" class="form" v-on:submit.prevent="submitForm" >
                   
                    <div class="card-body ">
                   
                          <div class="row">
                            <label class="col-md-3 col-form-label">Socio</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                <input type="text" class="form-control" :value="socionom" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <label class="col-md-3 col-form-label">Fuerza</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                <input type="text" class="form-control" :value="nomfuerza" readonly>
                                </div>
                            </div>
                          </div>
                      
                         

                         <div class="row">
                            <label class="col-md-3 col-form-label">Carnet de identidad</label>
                            <div class="col-md-6">
                                <div class="form-group has-default">
                                <input type="number" class="form-control" v-model="ciin" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-default">
                                 <select class="form-control"  v-model="exten" required>
                                        <option value="1">CH</option> 
                                        <option value="2">LP</option> 
                                        <option value="3">CB</option> 
                                        <option value="4">OR</option> 
                                        <option value="5">PT</option> 
                                        <option value="6">TJ</option> 
                                        <option value="7">SC</option> 
                                        <option value="8">BN</option> 
                                        <option value="9">PD</option>  
                                   </select>
                                </div>
                            </div>
                          </div>
                             <div class="row">
                            <label class="col-md-3 col-form-label">Destino</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                  <select class="form-control"   v-model="destino" required>
                                         <option v-for="listValue in arraydestinos" :value="listValue.iddestino" :key="listValue.iddestino">
                                                            {{listValue.nomdestino}}
                                          </option>
                                   </select>
                                </div>
                            </div>
                          </div>
                           <div class="row">
                            <label class="col-md-3 col-form-label">Carnet Militar</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                <input type="text" class="form-control" v-model="carnetmilitar" required >
                                </div>
                            </div>
                          </div>
                          
                        
                         <div class="row">
                            <label class="col-md-3 col-form-label">Domicilio</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                <input type="text" class="form-control" v-model="domicilio" required >
                                </div>
                            </div>
                          </div>
                         
                         <div class="row">
                            <label class="col-md-3 col-form-label">Recidencia</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                  <select class="form-control"   v-model="recidencia" required>
                                       <option value="2">La Paz</option> 
                                        <option value="3">Cochabamba</option> 
                                        <option value="4">Oruro</option> 
                                        <option value="5">Potosi</option> 
                                        <option value="6">Tarija</option> 
                                        <option value="7">Santa Cruz</option> 
                                        <option value="8">Beni</option> 
                                        <option value="9">Pando</option>  
                                        <option value="1">Chuquisaca</option> 
                                   </select>
                                </div>
                            </div>
                          </div>
                        
                         <div class="row">
                            <label class="col-md-3 col-form-label">Celular</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                <input type="number" class="form-control" v-model="numerocel" required >
                                </div>
                            </div>
                          </div>
                         <div class="row">
                            <label class="col-md-3 col-form-label" style="color: blue;">Usuario</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                <input type="text" class="form-control" v-model="numpapeletauser" readonly >
                                </div>
                            </div>
                          </div>
                         <div class="row">
                            <label class="col-md-3 col-form-label" style="color: blue;">Contraseña</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                <input type="password" class="form-control" v-model="passs1" required >
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <label class="col-md-3 col-form-label" style="color: blue;">Repetir contraseña</label>
                            <div class="col-md-9">
                                <div class="form-group has-default">
                                <input type="password" class="form-control" v-model="passs2" required >
                                </div>
                            </div>
                          </div>
                          
                    </div>
                    <div id="contenedorsms" style="display: inline-grid;"> 
                     </div> 
                    <div class="card-footer justify-content-center">
                        <button v-if="desabilitar" type="submit" id="sign-in-button" style="    background: linear-gradient(to right,#03279e,#03a9f5,#d800b1);"
                            class="btn btn-primary btn-blue btn-round mt-4" >Registrar</button>
                        
                    </div>
                </form>
                 <div class="col-md-12"> 
                      <a class="btn btn-link btn-github" href="/">
                        <i class="material-icons">groups</i> ya tengo mi cuenta
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data (){
            return {
              
                buscarsocio:1, 
                desabilitar:false, 
                recaptchaVerifier:null,  
                recaptchaWidgetId:null, 
                socioselected:null, 
                numpapeletauser:'',
                nomfuerza:'',
                 ciin:'', 
                 exten:'',
                 destino:'',
                 carnetmilitar:'', 
                 socionom:'', 
                 domicilio:'',
                 recidencia:'',
                 numerocel:'', 
                 passs1:'', 
                passs2:'',   
                arraydestinos:[],
                
            }
        },  
        methods : {  
            validanum(){
  let me=this;
                $("#result").hide().html(''); 
                 swal({
                              title: "Validando Datos",
                              allowOutsideClick: () => false,
                              allowEscapeKey: () => false,
                              onOpen: function() {
                                swal.showLoading();
                              } 
                            }).catch(error => {
                              swal.showValidationError("Request failed: ${error}");
                            });
                 axios.get("/buscasocioupdateci2?ci="+this.ciin+"&numpapeleta="+this.numpapeletauser).then(function (response) {  
                    
                                  swal.close();  
                                 if(response.data.socio.length==1){
                                     $("#result").hide().html(''); 
                                  me.sociobuscado(response.data.socio[0]);
                                 }else{
                                     var output = `<div class="alert alert-danger" style="border-radius: 11px;border-radius: 11px;margin:15px 15px;"
                                                    role="alert"> 
                                                    <p style="margin: 0;padding: 0;"> Socio no encontrado.</p> 
                                                </div>`;
                                    $("#result").hide().html(output).slideDown();
                                 }
                        }).catch(function (response) {
                            console.log(response);
                            swal("¡Ocurrio un error al momento de validar los datos!","", "warning")
                        }); 
            },
            validaci(){
                let me=this;
                $("#result").hide().html(''); 
                 swal({
                              title: "Validando Datos",
                              allowOutsideClick: () => false,
                              allowEscapeKey: () => false,
                              onOpen: function() {
                                swal.showLoading();
                              } 
                            }).catch(error => {
                              swal.showValidationError("Request failed: ${error}");
                            });
                 axios.get("/buscasocioupdateci?ci="+this.ciin).then(function (response) {   
                                 console.log(response.data);
                                  swal.close();  
                                 if(response.data.socio.length==1){
                                     me.buscarsocio=2;
                                 }else{
                                     var output = `<div class="alert alert-danger" style="border-radius: 11px;border-radius: 11px;margin:15px 15px;"
                                                    role="alert"> 
                                                    <p style="margin: 0;padding: 0;"> Carnet de identidad no encontrado.</p> 
                                                </div>`;
                                    $("#result").hide().html(output).slideDown();
                                 }
                        }).catch(function (response) {
                            console.log(response);
                            swal("¡Ocurrio un error al momento de validar los datos!","", "warning")
                        }); 
            },
            sociobuscado(socio){
                this.socioselected=socio; 
               this.socionom= this.socioselected.nomgrado+' '+this.socioselected.nombre+' '+this.socioselected.apaterno+' '+this.socioselected.amaterno
               this.ciin=socio.ci;
               this.numpapeletauser=socio.numpapeleta;
               this.carnetmilitar=socio.carnetmilitar;
               this.nomfuerza=socio.nomfuerza;
               this.destino=socio.iddestino;
               this.domicilio=socio.direcciondomicilio;
               this.exten=socio.iddepartamentoexpedido;
                        let me=this;
                        axios.get("/getdestinos?idfuerza="+socio.idfuerza).then(function (response) {   
                                    me.arraydestinos=response.data;
                        }).catch(function (response) {
                            console.log(response);
                            swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                        });
            },
            cleansocio(){
                this.socioselected=null;
                this.recidencia='';
                this.numerocel='';
                this.passs1='';
                this.passs2=''; 
            },generapass(len) {
              let text = "";
              let chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890" 
              for( let i=0; i < len; i++ ) {
                text += chars.charAt(Math.floor(Math.random() * chars.length))
              } 
              return text;
            },
            submitForm(){
                let me=this; 
                if(this.passs1==this.passs2){
                if(this.numerocel.toString().length==8){
                                    $("#result").hide().html(''); 
                                       firebase.auth().signInWithPhoneNumber('+591'+this.numerocel, me.recaptchaVerifier)
                                        .then((confirmationResult) => {   
                                                    swal({
                                                        title: "Ingrese codigo",
                                                        text: 'Se envio un codigo a su numero de celular',
                                                        input: 'number', 
                                                        allowOutsideClick: () => false,
                                                        allowEscapeKey: () => false, 
                                                        preConfirm: (login) => { 
                                                            return confirmationResult.confirm(login).then((result) => {
                                                                        return result;
                                                                        }).catch((error) => {
                                                                         Swal.showValidationMessage('El código ingresado es incorrecto.')
                                                                        }); 
                                                        } 
                                                        }).then((result) => { 
                                                            me.desabilitar=false;
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
                                                                
                                                                           
                                                                               axios.post("/registroUser", {
                                                                                        idsocio:me.socioselected.idsocio, 
                                                                                        idfuerza:me.socioselected.idfuerza, 
                                                                                        carnetmilitar:me.carnetmilitar, 
                                                                                        ci:me.ciin, 
                                                                                        iddepartamentoexpedido:me.exten,
                                                                                        iddestino:me.destino,
                                                                                        direcciondomicilio:me.domicilio,  
                                                                                        papeleta:me.socioselected.numpapeleta, 
                                                                                        usuario:me.socioselected.nomgrado+' '+me.socioselected.nombre+' '+me.socioselected.apaterno+' '+me.socioselected.amaterno, 
                                                                                        dep:me.recidencia,
                                                                                        pass:me.passs1,  
                                                                                        telcelular:me.numerocel   
                                                                                }).then(function (response) {    
                                                                                        me.outcon();
                                                                                    }).catch(function (response) {
                                                                                        console.log(response);
                                                                                        swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                                                                                    });
                                                                 
                                                        }).catch(error => {
                                                        swal.showValidationError(`Request failed 2: ${error}`);
                                                        }); 

                                        }).catch((error) => {
                                            grecaptcha.reset(me.recaptchaWidgetId); 
                                             me.desabilitar=false;
                                            if(error.code=='auth/too-many-requests'){  
                                                 swal("¡Ocurrio un error!",'Excedio la cantidad maxima de peticiones, intentelo mas tarde porfavor.', "warning")
                                            }else{  
                                                 swal("¡Ocurrio un error!",error.code+'<br>'+error.message, "warning")
                                            }
                                        }); 

 
                    }else{
                        var output = `<div class="alert alert-danger" style="border-radius: 11px;border-radius: 11px;margin:15px 15px;"
                                    role="alert"> 
                                    <p style="margin: 0;padding: 0;"> Debe ingresar un número de celular válido</p> 
                                </div>`;
                    $("#result").hide().html(output).slideDown();
                    }
                }else{
                    var output = `<div class="alert alert-danger" style="border-radius: 11px;border-radius: 11px;margin:15px 15px;"
                                role="alert"> 
                                <p style="margin: 0;padding: 0;"> La contraseña no coincide, verifique los datos.</p> 
                            </div>`;
                $("#result").hide().html(output).slideDown();
                }
            }, 
            initsms(){
                let me=this;
                me.cleansocio();
               me.socioselected=null;
               me.desabilitar=false;
               me.buscarsocio=1;
               me.ciin='';
               me.socionom='';
               me.numpapeletauser='';
               me.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('contenedorsms', {
                        'size': 'normal',
                        'callback': function(response) {
                            me.validatedata(); 
                        },
                        'expired-callback': () => {
                            swal.close();
                            me.desabilitar=false;
                             grecaptcha.reset(me.recaptchaWidgetId);
                        }
                    });

                   me.recaptchaVerifier.render().then(function(widgetId) {
                        me.recaptchaWidgetId = widgetId;   
                    });
                 
            } ,
            validatedata(){
                this.desabilitar=true;
            },
            outcon(){
                window.db.collection('contadores').doc('socios').update({ socios: firebase.firestore.FieldValue.increment(1)}).then(() => {
                firebase.auth().signOut().then(() => {
                            window.location = '/sucess';
                            }).catch((error) => {
                            console.log(error);
                            });
                })
                .catch((error) => { 
                    console.error("Error updating document: ", error);
                });
            
            }
        } ,
        mounted() {  
            firebase.auth().signOut().then(() => {
              this.initsms();
            }).catch((error) => {
             console.log(error);
            });
           
        }
    }
</script>
<style >
  .spinner {
  animation: rotator 1.4s linear infinite;
} 
@keyframes rotator {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
} 
</style>

