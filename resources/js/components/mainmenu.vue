<template>
     <component  v-bind:is="asignacionvista" :vuepermisos="permisosmain"></component>  
</template>
 
<script>
    export default {
      data (){
            return {
            asignacionvista:'welcome', 
            permisosmain:{}
            }
        }, 
        methods:{
         _vm2154_12186_135(id,titulo) { 
                return swal({ 
                    html: '<div id="framepdf" style="display:none;">'+
                    '<div style=" width: 100%; "><label style="display: inline;padding-left: 23px;font-weight: 500;float: left;">'+titulo+
                    '</label><div class="row justify-content-end"><button id="reloadedFrame" class="btn btn-sm btn-round btn-fab btn-link"><i style="font-size: 23px;" class="material-icons">refresh</i></button>'+
                    '<button id="close_id_swal" class="close" style="float: right; margin: 0 15px 2px 5px; ">X</button></div> </div>'+
                    '<iframe id="printpdf" name="printpdf" src="'+id+'" style="width:100%;height:800px;" allowfullscreen></iframe></div>',
                    showConfirmButton: false, 
                    showCancelButton: true,
                    allowOutsideClick: false,
                    allowEscapeKey:false,
                    confirmButtonText: 'Ok',
                    cancelButtonText:'Cerrar', 
                    confirmButtonColor: '#4dbd74',
                    cancelButtonColor: '#f86c6b', 
                    buttonsStyling: true,
                    reverseButtons: true,
                    onBeforeOpen: function() { 
                        swal.showLoading() ; 
                        swal.disableButtons();
                        $( "#close_id_swal" ).click(function() {
                        swal.close();  
                        });
                        $( "#reloadedFrame" ).click(function() {
                        $('#printpdf').attr("src", $('#printpdf').attr("src")); 
                        });
                
                        $('#printpdf').on('load', function() {
                        $("#framepdf").css("display", "inline"); 
                        swal.hideLoading() ; 
                        $(".swal2-popup").css("width", "85%"); 
                        $(".swal2-popup").css("padding", "0px 0px 20px 0px"); 
                        }); 
                    }
                    }); 
                }
        },
        mounted() { 
                this.$root.$on('sendtmainmenu', data => { 
                         this.asignacionvista=data.mod;
                         this.permisosmain=JSON.parse(data.per);
               });
               this.$root.$on('pdf', data => { 
                         this._vm2154_12186_135(data.url,data.titulo);
               });
        }
    }
</script>
