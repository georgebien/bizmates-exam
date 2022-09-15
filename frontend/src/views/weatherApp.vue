<template>
  <div>
    <main>
      <vue-select
        class="mt-3 vselect" 
        placeholder="Search city.." 
        v-model="selectedCity"
        label="name"
        :filterable="false"
        :options="cities"
        @input="onSelected"
      >
        <template slot="no-options">Type to see the results</template>
        <template slot="option" slot-scope="option">
          <div class="d-center">{{ option.name }}</div>
        </template>
        <template slot="selected-option" slot-scope="option">
          <div class="selected d-center">
            <div class="d-center">{{ option.name }}</div>
          </div>
        </template>
      </vue-select>
      
      <div class="alert alert-primary mt-3" role="alert" v-show="selectedCity && !weather">
        <div class="d-flex align-items-center">
          <div class="spinner-border" role="status" aria-hidden="true"></div>
          <strong style="margin-left: 10px;">Loading...</strong>
        </div>
      </div>

      <weatherCard 
        v-show="selectedCity && weather" 
        :weather="weather"
      ></weatherCard>

      <placesCard 
        v-show="selectedCity && weather" 
        :city="selectedCity"
      ></placesCard>
    </main>
  </div>
</template>

<script>
import vueSelect from 'vue-select'
import weatherCard from '../components/weatherCard.vue'
import placesCard from '../components/placesCard.vue'
import { getWeather } from '../services/service';

export default {
  name: 'WeatherApp',
  
  components: {
    vueSelect,
    weatherCard,
    placesCard
  },

  data() {
    return {
      cities: [
        'Tokyo', 
        'Yokohama', 
        'Kyoto', 
        'Osaka', 
        'Sapporo', 
        'Nagoya'
      ],
      selectedCity: null,
      weather: null
    }
  },

  watch: {
    selectedCity: function(value) {
      if (!value) {
        this.cities = [];
      }
    }
  },

  mounted() {
    this.cities = this.cities.sort()
  },

  methods: {
    onSelected() {
      this.weather = null;
      getWeather(this.selectedCity).then(({data: { data }}) => {
        this.weather = data;
      });
    }
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

.vs__dropdown-toggle {
  height: 70px !important;
}
</style>