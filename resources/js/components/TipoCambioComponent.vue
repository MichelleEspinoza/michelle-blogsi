<template>
    <div class="container">
        <div class="cambs border-yellow">
            <h4 class="mt-4 mx-3 text-center">Tipo de cambio hoy <span class="text-success">{{result.date}}</span></h4>
            <div v-if="result" class="content">
               <h5 class="text-center mb-3"> <span class="fw-bold">1 </span> USD = <span class="fw-bold" v-if="result.rates">{{result.rates.MXN}}</span> MXN</h5>
               <img src="https://www.eldolar.info/c/el-dolar-384.png?pqudxw"  width="60" class="rounded mx-auto d-block" alt="...">
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    result: {}
  }),
  
/*  created() {
fetch('https://api.exchangeratesapi.io/latest?base=USD&symbols=MXN').then(response => response.json())
  .then(data => console.log(data));
  }
};*/
 created() {
axios.get("https://api.exchangeratesapi.io/latest?base=USD&symbols=MXN").then((result) => {

      this.result = result.data;
      
    })
  }
};
</script>
<style scoped  lang="css">
.cambs {
    background-color: white;
    position: absolute;
    margin-top: 375px;
    margin-left: 135;
    width:476;
    height:235;
}
</style>