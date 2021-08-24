<template>
     <ul class="nav"> 
          <li class="nav-item ">
           
             <a class="nav-link" href="#" @click="funcionopenvue('welcome','{}')">
              <i class="material-icons">dashboard</i>
                 <p> Inicio </p>
            </a>
          </li>
          <botonrol v-for=" menu in arraymenus "  @openvue="funcionopenvue" :nombreB='menu.mod' 
          :vistas='menu.menus' :icon='menu.icono' :key="menu.id" :idformtoogle="menu.form"></botonrol>  
  
          <li v-if="botonvotacion.length>0" class="nav-item "> 
             <a class="nav-link" href="#" @click="funcionopenvue('voto','{}')">
              <i class="material-icons">grading</i>
                 <p> Voto </p>  
            </a>
          </li> 
          <li v-if="botonvotacion.length>0" class="nav-item " style=" position: fixed;   bottom: 0;    width: 100%;"> 
             <a class="nav-link"  >  <i class="material-icons">timer</i>
               <p style="font-size: xx-large;"> {{counttimereverse}}</p> 
            </a>
          </li> 
         
     </ul>
     
</template>

<script>
    export default { 
        data (){
            return {
              arraymenus:[],
              botonvotacion:'',
              counttime:'',
              counttimereverse:'',
            }
        },  
        methods : {  
            getvistas(){
                let me=this;
                   axios.get('/getvistasRoles').then(function (response) { 
                        me.arraymenus=response.data;   
                     })
                     .catch(function (response) {
                         console.log(response);
                     });
            },
            funcionopenvue(mod,permiso){ 
                window.dejar();
                this.$root.$emit('sendtmainmenu', {mod:mod,per:permiso});
            }, intervalcounter(i,f){
              let me = this;
                window.intervalcount=setInterval(()=>{me.gal(i,f)}, 1000);
            },
            gettime(){ 
               let me = this;  
               clearInterval(window.intervalcount);
                  axios.get('/gettime').then(function (response) {  
                         me.time =response.data;    
                         if(me.time.inicio!=null&&me.time.final!=null){ 
                            me.intervalcounter(me.time.inicio,me.time.final); 
                         }else{
                           clearInterval(window.intervalcount);
                           me.counttime= '00:00:00';
                           me.botonvotacion='';
                           me.$root.$emit('startvotacion',{date:me.counttime});
                         } 
                     }).catch(function (response) {
                         console.log(response);
                     }); 
            } ,
            gal(inicio,final){    
                moment.locale('es-us'); 
                let timefin=moment();    
                  if( (moment(final, "YYYY-MM-DD HH:mm:ss").diff(timefin))>0){
                      let dif = moment.duration(timefin.diff(moment(inicio, "YYYY-MM-DD HH:mm:ss")));
                      let dias=dif.days()>0?dif.days()*24:0;
                      let horas=dif.hours()+dias;
                      this.counttime=  (horas>0?(horas>=10?horas:'0'+horas):'00')+':'
                      +(dif.minutes()>0?(dif.minutes()>=10?dif.minutes():'0'+dif.minutes()):'00')+':'
                      +(dif.seconds()>0?(dif.seconds()>=10?dif.seconds():'0'+dif.seconds()):'00');  
                      this.$root.$emit('startvotacion',{date:this.counttime});
                      window.fechaacumulada=this.counttime;
                      if(this.botonvotacion.length==0)this.botonvotacion='voto';


                     let difffrr=moment.duration(moment(final, "YYYY-MM-DD HH:mm:ss").diff(timefin));
                      let diasffff=difffrr.days()>0?difffrr.days()*24:0;
                      let horasffff=difffrr.hours()+diasffff;
                      this.counttimereverse=  (horasffff>0?(horasffff>=10?horasffff:'0'+horasffff):'00')+':'
                      +(difffrr.minutes()>0?(difffrr.minutes()>=10?difffrr.minutes():'0'+difffrr.minutes()):'00')+':'
                      +(difffrr.seconds()>0?(difffrr.seconds()>=10?difffrr.seconds():'0'+difffrr.seconds()):'00');  

                  }else{
                    let dif = moment.duration(moment(final, "YYYY-MM-DD HH:mm:ss").diff(moment(inicio, "YYYY-MM-DD HH:mm:ss")));
                      let dias=dif.days()>0?dif.days()*24:0;
                      let horas=dif.hours()+dias;
                      this.counttime=  (horas>0?(horas>=10?horas:'0'+horas):'00')+':'
                      +(dif.minutes()>0?(dif.minutes()>=10?dif.minutes():'0'+dif.minutes()):'00')+':'
                      +(dif.seconds()>0?(dif.seconds()>=10?dif.seconds():'0'+dif.seconds()):'00'); 
                      this.$root.$emit('startvotacion',{date:this.counttime});
                      window.fechaacumulada=this.counttime;
                      this.counttimereverse= '';
                      if(this.botonvotacion.length>0)this.botonvotacion='';
                     clearInterval(window.intervalcount);
                  }   
            },
            initescu(){
                let me=this;
               window.unsubscribeinitvotos = window.db.collection("contadores").doc("proceso")
                .onSnapshot((doc) => { 
                     me.gettime(); 
                });
            }
        } ,
        mounted() {
            if(typeof window.unsubscribeinitvotos === 'function') {  
                window.unsubscribeinitvotos();
                console.log('cerro');
            }
           this.getvistas();
           this.initescu();
           this.$root.$on('aupdateMunesRol', () => { 
                    this.arraymenus=[];
                     this.getvistas();
               });
        }
    }
</script> 