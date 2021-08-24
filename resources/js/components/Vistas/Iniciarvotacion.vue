<template>
     <div class="col-md-12 row">
           <div class="col-md-6"> 
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">date_range</i>
                  </div>
                  <h4 class="card-title">Proceso de votación</h4>
                </div>
            <form v-if="editable" class="form-horizontal" v-on:submit.prevent="submitForm">
                <div class="card-body "> 
                    <div class="row">
                      <label class="col-md-3 col-form-label">Fecha inicio</label>
                      <div class="col-md-9">
                        <div class="form-group has-default">
                          <input type="text" class="form-control datetimepicker1" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-3 col-form-label">Fecha fin</label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <input type="text" class="form-control datetimepicker2" id="datefin" required="true">
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <label class="col-md-3 col-form-label">Observaciones</label>
                      <div class="col-md-9">
                        <div class="form-group">
                                  <textarea class="form-control" name="descripcion" v-model="obs"    rows="4"  required="true"> 
                                </textarea>
                            </div>
                      </div>
                    </div>  
                </div>
                <div v-if="vuepermisos.agr==1" class="card-footer ">
                  <div class="row">
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-fill btn-rose">Registrar</button>
                    </div>
                  </div>
                </div>
            </form>
             <form v-if="!editable" class="form-horizontal" v-on:submit.prevent="submitFormupdate">
                <div class="card-body "> 
                    <div class="row">
                      <label class="col-md-3 col-form-label">Fecha inicio</label>
                      <div class="col-md-9">
                        <div class="form-group has-default">
                          <input type="text" class="form-control datetimepicker3" :value="time.inicio" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-3 col-form-label">Fecha fin</label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <input type="text" class="form-control datetimepicker4" :value="time.final" id="datefin" required="true">
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <label class="col-md-3 col-form-label">Observaciones</label>
                      <div class="col-md-9">
                        <div class="form-group">
                                  <textarea class="form-control" name="descripcion" v-model="obs"    rows="4"  required="true"> 
                                </textarea>
                            </div>
                      </div>
                    </div>  
                </div>
                <div v-if="vuepermisos.mod==1" class="card-footer ">
                  <div class="row">
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-fill btn-warning">Modificar</button>
                    </div>
                  </div>
                </div>
            </form>
              </div>
            </div>

        <!-- <div class="col-md-6"> 
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">date_range</i>
                  </div>
                  <h4 class="card-title">Conteo de votos</h4>
                </div>
            <form   class="form-horizontal" v-on:submit.prevent="submitForm">
                <div class="card-body "> 
                    <div class="row">
                      <label class="col-md-3 col-form-label">Fecha inicio</label>
                      <div class="col-md-9">
                        <div class="form-group has-default">
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-3 col-form-label">Fecha fin</label>
                      <div class="col-md-9">
                        <div class="form-group">
                        
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <label class="col-md-3 col-form-label">Observaciones</label>
                      <div class="col-md-9">
                        <div class="form-group">
                                
                            </div>
                      </div>
                    </div>  
                </div>
                <div  class="card-footer ">
                  <div class="row">
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-fill btn-rose">Registrar</button>
                    </div>
                  </div>
                </div>
            </form>
              </div>
            </div> -->
     </div>
</template>

<script>
    export default {
      props:['vuepermisos'],    
      data (){
            return {
              editable:true,  
              obs:'',
              time:null
            }
        }, 
        methods:{ 
          inti(){ 
 let me = this; 

            moment.locale('es-us');
                $('.datetimepicker1').datetimepicker({  
                  locale: moment.locale(), 
                  minDate:moment(),  
                  format:'YYYY-MM-DD HH:mm:ss',
                  icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                  }
                }); 
                $('.datetimepicker2').datetimepicker({  
                  locale: moment.locale(), 
                  minDate:moment(),  
                  format:'YYYY-MM-DD HH:mm:ss',
                  icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                  }
                }); 

                
                  axios.get('/gettime').then(function (response) {  
                         me.time =response.data;    
                         if(me.time.inicio!=null&&me.time.final!=null){  
                            me.editable=false;
                            me.obs=me.time.observacion_inicio;
        setTimeout(() => {       
              $('.datetimepicker3').datetimepicker({  
                  locale: moment.locale(),  
                  format:'YYYY-MM-DD HH:mm:ss', 
                  icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                  }
                }); 
                $('.datetimepicker4').datetimepicker({  
                  locale: moment.locale(),  
                  format:'YYYY-MM-DD HH:mm:ss', 
                  icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                  }
                });  
                 }, 1000); 
                         } else{
                            me.editable=true;
                         }
                     }).catch(function (response) {
                         console.log(response);
                     }); 


          },
          submitForm(){
            let me=this;
             swal({
                              title: "Registrando datos",
                              allowOutsideClick: () => false,
                              allowEscapeKey: () => false,
                              onOpen: function() {
                                swal.showLoading();
                              } 
                            }).catch(error => {
                              swal.showValidationError("Request failed: ${error}");
                            });
                axios.post('/reginicio', {
                'ini':$('.datetimepicker1').data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss'), 
                'fin':$('.datetimepicker2').data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss'),
                'obs':this.obs})
                .then(res => { 
                 
                 window.db.collection("contadores").doc("proceso").set({
                      ini: $('.datetimepicker1').data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss'),
                      fin: $('.datetimepicker2').data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss') 
                  })
                  .then(() => {
                        me.inti();
                       swal("¡Registrado exitosamente!","", "success");
                  })
                  .catch((error) => {
                      console.error("Error writing document: ", error);
                      swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                  });

                  })
                .catch(function (response) {
                    console.log(response);
                    swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                }); 
          },
          submitFormupdate(){
            let me=this;
             swal({
                              title: "Modificando datos",
                              allowOutsideClick: () => false,
                              allowEscapeKey: () => false,
                              onOpen: function() {
                                swal.showLoading();
                              } 
                            }).catch(error => {
                              swal.showValidationError("Request failed: ${error}");
                            });

                axios.post('/reginicio', {
                'ini':$('.datetimepicker3').data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss'), 
                'fin':$('.datetimepicker4').data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss'),
                'obs':this.obs})
                .then(res => { 
                 
                 window.db.collection("contadores").doc("proceso").set({
                      ini: $('.datetimepicker3').data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss'),
                      fin: $('.datetimepicker4').data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss') 
                  })
                  .then(() => {
                        me.inti();
                       swal("¡Modificado exitosamente!","", "success");
                  })
                  .catch((error) => {
                      console.error("Error writing document: ", error);
                      swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                  });

                  })
                .catch(function (response) {
                    console.log(response);
                    swal("¡Ocurrio un error al momento de realisar el proceso!","", "warning")
                }); 
          }
        }, 
        mounted() { 
           this.inti();
        }
    }
</script>
<style scoped>
 
</style>