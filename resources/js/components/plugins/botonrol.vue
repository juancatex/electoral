<template>
     <li class="nav-item menuprincipal">
            <a class="nav-link" data-toggle="collapse" :href="'#'+idformtoogle">
              <i class="material-icons">{{icon}}</i>
              <p> {{nombreboton}}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" :id="idformtoogle">
              <ul class="nav">
                <li class="nav-item " v-for="menuscomponen in vistas" :key="menuscomponen.idvista">
                  <a class="nav-link" href="#" @click="open($event,menuscomponen.template,menuscomponen.permisos)"> 
                    <span class="sidebar-normal" style="text-align: right;"> {{menuscomponen.nombre}} </span>
                  </a>
                </li> 
              </ul>
            </div>
    </li>
</template>

<script>
    export default {
        props:['vistas','nombreB','idformtoogle','icon'], 
        data (){
            return {  
                nombreboton:''
            }
        },  
        methods : {  
          open(event,template,permisos){  
              // $(event.target.parentElement.parentNode).addClass('active');
            // $(event.target.parentElement.parentNode).parents('li.menuprincipal').addClass('active'); 
             this.$emit('openvue',template,permisos,);
          },
            
            getjson(injson){
              return JSON.parse(injson);
            }
        } ,
        mounted() { 
       // ver: https://fonts.google.com/icons
            this.nombreboton=this.nombreB; 
            console.log('se creo boton');
        }
    }
</script>
