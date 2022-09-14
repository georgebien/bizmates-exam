<template>
  <div>
    <main>
      <vue-select
        class="mt-5 vselect" 
        placeholder="Type city" 
        :options="searchOptions"
      >
        
      </vue-select>
      <weatherCard></weatherCard>
    </main>

  </div>
</template>

<script>
import vueSelect from 'vue-select'
import weatherCard from '../components/weatherCard.vue'
import { getCities } from '../services/service';

export default {
  name: 'WeatherApp',
  
  components: {
    vueSelect,
    weatherCard
  },

  data() {
    return {
      searchOptions: ['Canada', 'United States']
    }
  },

  mounted() {
    getCities('Osaka');
  }
}
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: 'montserrat', sans-serif;
}

main {
  min-height: 100vh;
  padding: 25px;
  margin: auto;
  width: 50%;
}
</style>