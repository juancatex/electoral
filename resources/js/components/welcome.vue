<template>
     <div class="col-md-12">
       <div class="row">
              
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">Socios activos</p>
                    <h3 v-if="countsocios>0" class="card-title">{{countsocios}}</h3>
                     <i v-else class="material-icons spinner2">refresh</i>  
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> Datos oficiales ASCINALSS
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">alarm</i>
                    </div>
                    <p class="card-category">Tiempo electoral</p>
                    <h3 v-if="counttime!='00:00:00'"  class="card-title">{{counttime}}</h3>
                     <i v-else class="material-icons spinner2">refresh</i>  
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> Datos oficiales ASCINALSS
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                     <i class="material-icons">timeline</i>
                    </div>
                    <p class="card-category">Total votos</p>
                    <h3 v-if="countvotos>0" class="card-title">+{{countvotos}}</h3>
                     <i v-else class="material-icons spinner2">refresh</i>  
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                       <i class="material-icons">local_offer</i> Datos oficiales ASCINALSS
                    </div>
                  </div>
                </div>
              </div>


<div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                     <div class="card-icon" style="background: gray;    box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 0 0 / 40%);">
                      <i class="material-icons">hiking</i>
                    </div>
                    <p class="card-category">Frentes - EJERCITO</p>
                  
                    <h3 v-if="countfrentes3>0" class="card-title">{{countfrentes3}}</h3> 
                    <i v-else class="material-icons spinner2">refresh</i>  
                 
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> Datos oficiales ASCINALSS
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon" style="background: #151cffba;    box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 0 0 / 40%);">
                      <i class="material-icons">local_airport</i>
                    </div>
                    <p class="card-category">Frentes - AEREA</p>
                  
                    <h3 v-if="countfrentes4>0" class="card-title">{{countfrentes4}}</h3> 
                    <i v-else class="material-icons spinner2">refresh</i>  
                 
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> Datos oficiales ASCINALSS
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon" style="background: white;    box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 0 0 / 40%);">
                      <i class="material-icons" style="color: black;">directions_boat</i>
                    </div>
                    <p class="card-category">Frentes - ARMADA</p>
                  
                    <h3 v-if="countfrentes5>0" class="card-title">{{countfrentes5}}</h3> 
                    <i v-else class="material-icons spinner2">refresh</i>  
                 
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> Datos oficiales ASCINALSS
                    </div>
                  </div>
                </div>
              </div>


 <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">how_to_vote</i>
                  </div>
                  <h4 class="card-title">Conteo de Votos</h4>
                </div>
                <div class="card-body row">


                  <div class="table-responsive col-md-4"> 
                    <h3><strong>EJERCITO</strong> -  {{suma3}}</h3>
                    <table class="table"> 
                      <tbody v-if="votofrente3.length>0"> 
                        <template v-for="(frentes3,index) in votofrente3">
                         <tr :key="index" :class="frentes3.mayor?'trnormal table-success':'trnormal2'"> 
                          <td>{{frentes3.data.nom}}</td>
                          <td>{{frentes3.data.sigla}}</td>
                          <td class="text-right">{{frentes3.voto}}</td> 
                        </tr>
                        <tr v-if="frentes3.mayor" class="table-success" :key="index+'data'">
                              <td colspan="3">
                                  <table style="float: right;">
                                     <tr v-for="(cargoin) in ordencandidatos(frentes3)" :key="cargoin.idcandidato" style="border-left: 4px solid #4caf50;">
                                       
                                        <td style=" width: 50px; "><img :src="'storage/candidatos/'+cargoin.rutafoto" class="rounded-circle" style="width: 100%;"></td> 
                                        <td >{{cargoin.nombresocio}}</td>
                                         <td style="font-weight: bold;">{{'  '+cargoin.nombrecargo}}</td> 
                                    </tr>
                                  </table>
                              </td>
                          </tr> 
                        </template> 
                      </tbody>
                      <tbody v-else>
                        <tr>
                          <td colspan="3" style="text-align: center;"><i class="material-icons spinner2">refresh</i></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>



<div class="table-responsive col-md-4"> 
                    <h3><strong>AEREA</strong> -  {{suma4}}</h3>
                    <table class="table"> 
                      <tbody v-if="votofrente4.length>0"> 
                        <template v-for="(frentes3,index) in votofrente4">
                         <tr :key="index" :class="frentes3.mayor?'trnormal table-success':'trnormal2'"> 
                          <td>{{frentes3.data.nom}}</td>
                          <td>{{frentes3.data.sigla}}</td>
                          <td class="text-right">{{frentes3.voto}}</td> 
                        </tr>
                        <tr v-if="frentes3.mayor" class="table-success" :key="index+'data'">
                              <td colspan="3">
                                  <table style="float: right;">
                                     <tr v-for="(cargoin) in ordencandidatos(frentes3)" :key="cargoin.idcandidato" style="border-left: 4px solid #4caf50;">
                                       
                                        <td style=" width: 50px; "><img :src="'storage/candidatos/'+cargoin.rutafoto" class="rounded-circle" style="width: 100%;"></td> 
                                        <td >{{cargoin.nombresocio}}</td>
                                         <td style="font-weight: bold;">{{'  '+cargoin.nombrecargo}}</td> 
                                    </tr>
                                  </table>
                              </td>
                          </tr> 
                        </template> 
                      </tbody>
                      <tbody v-else>
                        <tr>
                          <td colspan="3" style="text-align: center;"><i class="material-icons spinner2">refresh</i></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

<div class="table-responsive col-md-4"> 
                    <h3><strong>ARMADA</strong> -  {{suma5}}</h3>
                    <table class="table"> 
                      <tbody v-if="votofrente5.length>0"> 
                        <template v-for="(frentes3,index) in votofrente5">
                         <tr :key="index" :class="frentes3.mayor?'trnormal table-success':'trnormal2'"> 
                          <td>{{frentes3.data.nom}}</td>
                          <td>{{frentes3.data.sigla}}</td>
                          <td class="text-right">{{frentes3.voto}}</td> 
                        </tr>
                        <tr v-if="frentes3.mayor" class="table-success" :key="index+'data'">
                              <td colspan="3">
                                  <table style="float: right;">
                                     <tr v-for="(cargoin) in ordencandidatos(frentes3)" :key="cargoin.idcandidato" style="border-left: 4px solid #4caf50;">
                                       
                                        <td style=" width: 50px; "><img :src="'storage/candidatos/'+cargoin.rutafoto" class="rounded-circle" style="width: 100%;"></td> 
                                        <td >{{cargoin.nombresocio}}</td>
                                         <td style="font-weight: bold;">{{'  '+cargoin.nombrecargo}}</td> 
                                    </tr>
                                  </table>
                              </td>
                          </tr> 
                        </template> 
                      </tbody>
                      <tbody v-else>
                        <tr>
                          <td colspan="3" style="text-align: center;"><i class="material-icons spinner2">refresh</i></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                   
                </div>
              </div>
            </div>


              <div class="col-lg-12 row">  
              <div class="col-lg-6">  
                 <div class="card card-stats">
                   <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                     <i class="material-icons">stacked_bar_chart</i>
                    </div>
                    <p class="card-category"></p>  
                  </div>
                   <div class="chart-container" style="position: relative; height:auto; width:100%;      padding: 15px;  margin-left: auto;  margin-right: auto;">
                            <canvas id="myChart"></canvas>
                    </div>
                    <div class="card-footer">
                    <div class="stats">
                       <i class="material-icons">local_offer</i> Datos oficiales ASCINALSS
                    </div>
                  </div>
                 </div>
              </div>
                 <div class="col-lg-6">  
                 <div class="card card-stats">
                   <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                     <i class="material-icons">incomplete_circle</i>
                    </div>
                    <p class="card-category"></p>  
                  </div>
                   <div class="chart-container" style="position: relative; height:auto; width:52%;      padding: 15px;  margin-left: auto;  margin-right: auto;">
                            <canvas id="myPie"></canvas>
                    </div>
                    <div class="card-footer">
                    <div class="stats">
                       <i class="material-icons">local_offer</i> Datos oficiales ASCINALSS
                    </div>
                  </div>
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
              countfrentes3:0,
              countfrentes4:0,
              countfrentes5:0,
              countsocios:0,
              countvotos:0,
              votofrente3:[],
              votofrente4:[],
              votofrente5:[],
              frenteslista:[],
              candidatoslist:[], 
              counttime: window.fechaacumulada, 
              time:null,
              myChart:null,
              myPie:null,
              deps:{1:'Chuquisaca', 2:'La Paz',  3:'Cochabamba',4:'Oruro',5:'Potosi',6:'Tarija',7:'Santa Cruz',8:'Beni',9:'Pando' }
            }
        },  
        computed:{
          suma3: function () { 
              return  _.sumBy(this.votofrente3, function(o) { return o.voto;});
            },
          suma4: function () { 
              return  _.sumBy(this.votofrente4, function(o) { return o.voto;}); 
            },
          suma5: function () { 
              return  _.sumBy(this.votofrente5, function(o) { return o.voto;});
            }
        },
        methods : {
          ordencandidatos(id){ 
             let out=[];
              for (let candidato of this.candidatoslist) {  
                 if(candidato.idfrente==id.idfrente){
                   out.push(candidato);
                 }   
              }
              return out;
           },  
      validateconteo(){
        var max3=_.maxBy(this.votofrente3, function(o) { return o.voto; });
        var max4=_.maxBy(this.votofrente4, function(o) { return o.voto; });
        var max5=_.maxBy(this.votofrente5, function(o) { return o.voto; });
          
            if(typeof max3 != 'undefined'){
              max3.mayor=true;
              this.votofrente3 = _.orderBy(this.votofrente3, ['voto'], ['desc']);
            }
            if(typeof max4 != 'undefined'){
              max4.mayor=true;
              this.votofrente4 = _.orderBy(this.votofrente4, ['voto'], ['desc']);
            }
            if(typeof max5 != 'undefined'){
              max5.mayor=true;
              this.votofrente5 = _.orderBy(this.votofrente5, ['voto'], ['desc']);
            }
      },
       conteovotos(frente){ 
         let me=this;
         
              switch (frente.idfuerza) {
                case 3:
                        var indexfrente3=_.findIndex(me.votofrente3, function(o) { return (o.idfrente==frente.idfrente); }); 
                        if(indexfrente3>=0){
                          me.votofrente3[indexfrente3].voto++; 
                        }else{
                          me.votofrente3.push({voto:1,idfrente:frente.idfrente,idfuerza:frente.idfuerza,data:frente,mayor:false});
                        }
                  break;
                  case 4:
                        var indexfrente4=_.findIndex(me.votofrente4, function(o) { return (o.idfrente==frente.idfrente); }); 
                        if(indexfrente4>=0){
                          me.votofrente4[indexfrente4].voto++; 
                        }else{
                          me.votofrente4.push({voto:1,idfrente:frente.idfrente,idfuerza:frente.idfuerza,data:frente,mayor:false});
                        }
                  break;
                   case 5:
                        var indexfrente5=_.findIndex(me.votofrente5, function(o) { return (o.idfrente==frente.idfrente); }); 
                        if(indexfrente5>=0){
                          me.votofrente5[indexfrente5].voto++; 
                        }else{
                          me.votofrente5.push({voto:1,idfrente:frente.idfrente,idfuerza:frente.idfuerza,data:frente,mayor:false});
                        }
                  break;
               
              }
            
       },
            init(){
          
              let me=this;
             window.unsubscribe = window.db.collection("frentes").onSnapshot((querySnapshot) => {
               me.countfrentes3=0;
               me.countfrentes4=0;
               me.countfrentes5=0;
               querySnapshot.forEach((doc) => { 
                   
                    switch (doc.data().idfuerza) {
                      case 3:
                         me.countfrentes3++;
                        break; 
                      case 4:
                         me.countfrentes4++;
                        break; 
                      case 5:
                         me.countfrentes5++;
                        break; 
                    }
                  }); 
              });

               window.unsubscribesocios = window.db.collection("contadores").doc("socios")
                .onSnapshot((doc) => { 
                    me.countsocios=doc.data().socios;
                });

               
            window.unsubscribevotos = window.db.collection("votos").onSnapshot((querySnapshot) => {
               me.countvotos=0;
               me.initchartpie();
               me.initchart();
               me.votofrente3=[],
               me.votofrente4=[],
               me.votofrente5=[],
               querySnapshot.forEach((doc) => { 
                    me.countvotos++;
                    me.addchart(doc.data().sigla);
                    me.addchartpie(doc.data().dep); 
                    me.conteovotos(doc.data());
                  }); 
               me.validateconteo();
               });
// setInterval(() => {
//   // window.db.collection('contadores').doc('socios').update({ socios: firebase.firestore.FieldValue.increment(1)});

// }, 1000);
          
   
            } ,chartts(){ 
              var ctx = document.getElementById('myChart').getContext('2d');
              var ctxpie = document.getElementById('myPie').getContext('2d');
this.myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Frentes'],
        datasets: [ ]
    },
    options: {
       responsive: true,
        plugins: {
            datalabels: {
        display: true,
        align: 'center',
        anchor: 'center',
        backgroundColor: '#ccc',
        borderRadius: 3,
        font: {
          size: 10,
          weight: 'normal',
        },
        formatter: (value) => {
          return value + ' votos';
        }
      } ,
        legend: {
        position: 'top',
        },
        title: {
        display: true,
        text: 'Votos por frente'
        }
        }
    }
});
this.myPie = new Chart(ctxpie, {
    type: 'pie',
    data: { 
        labels: [],
          datasets: [
            {
              label: 'Votos por departamento',
              backgroundColor: [], 
              data: [],
            } 
          ]
    },
    options: {
       responsive: true,
        plugins: {
     
     datalabels: {
        display: true,
        align: 'center',
        anchor: 'center',
        backgroundColor: '#ccc',
        borderRadius: 3,
        font: {
          size: 10,
          weight: 'normal',
        },
        formatter: (value) => {
          return value + ' votos';
        }
      } 
     ,
        legend: {
        position: 'right',
        },
        title: {
        display: true,
        text: 'Votos por Departamento'
        } 
        }
    }
});
            },addchart(sigla){ 

             let busq= _.find(this.myChart.data.datasets, function(o) { return (o.label==sigla); }); 
                 if(typeof busq === 'undefined'){
                          const randomBetween = (min, max) => min + Math.floor(Math.random() * (max - min + 1));
                          const r = randomBetween(0, 255);
                          const g = randomBetween(0, 255);
                          const b = randomBetween(0, 255);
                          const rgb = `rgba(${r},${g},${b},1)`;

                          this.myChart.data.datasets.push({
                          label: sigla,
                          backgroundColor: new Array(rgb), 
                          data: [1],
                          });
                    } else {
                  busq.data[0]++;
                 }  
              this.myChart.update(); 
            },initchart(){  
              this.myChart.data.datasets=[]; 
              this.myChart.update(); 
            },addchartpie(dep){  
              let me=this;
              let busq= _.findIndex(this.myPie.data.labels, function(o) { return (o==me.deps[dep]); }); 
                 if(busq>=0){
                    var settt =this.myPie.data.datasets[0];  
                       settt.data[busq]++; 
                    } else {
                       const randomBetween = (min, max) => min + Math.floor(Math.random() * (max - min + 1));
                          const r = randomBetween(0, 255);
                          const g = randomBetween(0, 255);
                          const b = randomBetween(0, 255);
                          const rgb = `rgba(${r},${g},${b},1)`;
                      
                       this.myPie.data.labels.push(this.deps[dep]); 
                       var data =this.myPie.data.datasets[0];  
                       data.data.push(1);
                       data.backgroundColor.push(rgb); 
                    } 
               this.myPie.update(); 
            }
             ,initchartpie(){  
              this.myPie.data.labels=[];
              this.myPie.data.datasets=[
                                            {
                                              label: 'Votos por departamento',
                                              backgroundColor: [], 
                                              data: [],
                                            } 
                                          ];
               this.myPie.update(); 
            },initfrentes(){
             let me = this; 
            axios.get('/getfrentes').then(function (response) {  
                                me.frenteslista=response.data; 
                            }).catch(function (response) {
                                console.log(response);
                            });
                 axios.get('/getCandidatosVoto').then(function (response) {  
                                  me.candidatoslist=response.data;  
                              }).catch(function (response) {
                                  console.log(response);
                              });             
          }
        } ,
        mounted() { 
          this.initfrentes();
            Chart.register(ChartDataLabels);
          let me=this; 
            setTimeout(() => {
              me.init();
              me.chartts();
            // me.gettime(); 
            }, 1000);  
          this.$root.$on('startvotacion', data => {   
                        me.counttime=data.date;
               });
        } 
    }
</script>
<style >
 

html,
body,
#main,
body > .main {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: arial;
}


.test-title {
    padding: 20px;
    background: #242424;
    color: #ddd;
    font-weight: normal;
    text-align: center;
    font-size: 16px;
}
.test-title-inner {
    display: inline-block;
    *display: inline;
    zoom: 1;
    text-align: left;
}
.test-title strong {
    color: yellow;
    font-weight: 700;
    text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000;
    padding-left: 2px;
    padding-right: 2px;
}
.test-buttons button {
    margin: 10px 5px;
}
.test-chart-block {
    position: relative;
}
.test-chart-block-has-right {
    overflow: hidden;
}
.test-chart-block-has-right .test-chart-block-right {
    position: absolute;
    right: 10px;
    background: #fff;
    z-index: 99;
    width: 300px;
    max-height: 99%;
    border-left: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
}
.test-chart-block-has-right .test-chart-block-left {
    margin-right: 320px;
}
.test-info {
    padding-left: 10px;
    overflow: auto;
}
pre.test-print-object {
    font-size: 12px;
    font-family: Menlo, Monaco, 'Courier New', monospace;
}
.test-chart {
    height: 400px;
}

.test-data-table {
    position: relative;
    text-align: center;
}
.test-data-table table {
    display: inline-block;
    vertical-align: top;
    border: 1px solid #ccc;
    border-spacing: 0;
    margin: 30px 15px;
}
.test-data-table td {
    border: 1px solid #ccc;
    color: #777;
    padding: 3px 5px;
    font-size: 13px;
}
td.test-data-table-key {
    font-size: 12px;
    color: rgb(69, 162, 238)
}

.record-canvas .content-area {
    display: none;
    position: absolute;
    background: #fff;
    left: 10px;
    top: 20px;
    border: 2px solid #000;
    padding: 10px;
    z-index: 9999;
    box-shadow: 0 0 3px #000;
}
.record-canvas textarea {
    width: 300px;
    height: 500px;
}

.control-frame-btn-panel {
    position: fixed;
    top: 10px;
    left: 10px;
    box-shadow: 0 0 3px #000;
    background: green;
    padding: 5px;
}
.control-frame-btn-panel .control-frame-info {
    display: block;
    color: #fff;
    font-size: 10px;
}
.spinner2 {
    color: gray;
    font-size: 25px !important; 
    width: 25px !important;
    height: 25px !important;
    line-height: 25px !important;
  animation: rotator 1s linear infinite;
} 
@keyframes rotator {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
} 
.trnormal{
  font-weight: bold;
}
.trnormal2{
  font-size: 10px;
  color: darkgray;
}
</style>