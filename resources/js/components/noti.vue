<template>
    <ul class="navbar-nav"> 
         
        <template v-if="carganoti">
               <li v-if="cantidadnoti>0" class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">{{cantidadnoti}}</span> 
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#" @click="notifi">{{mensaje}}</a> 
                </div>
                </li> 
        </template>
        <template v-else>
             <li > 
                <a class="nav-link spinner">
               <i class="material-icons">refresh</i>  
               </a>
            </li>
        </template>
    </ul>
</template>

<script>
    export default {
        data (){
            return {
                mensaje:'prueba notificacion',
                cantidadnoti:0,
                carganoti:false
            }
        },  
        methods : {  
            notifi(event){
              event.preventDefault(); 
              console.log('notificacion abre nueva pantalla');
            },
            initnoti(){
                let me=this;
                 
                 window.notificaciones = window.db.collection("noti").onSnapshot((querySnapshot) => {
                    me.cantidadnoti=0;
                    me.carganoti=true;
                  querySnapshot.forEach((doc) => {
                            me.cantidadnoti++;
                        }); 
                    });

            } 
        } ,
        mounted() {
            // this.cantidadnoti=1;
            let me=this;
             me.carganoti=false;
            this.initnoti();
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

