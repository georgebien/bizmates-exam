<template>
  <div>
    <main>
      <vue-select
        class="mt-5 vselect" 
        placeholder="Search city.." 
        v-model="selectedCity"
        label="name"
        :filterable="false"
        :options="cities"
        @search="onSearch"
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
      <weatherCard v-show="selectedCity"></weatherCard>
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
      cities: [],
      selectedCity: null
    }
  },

  watch: {
    selectedCity: function(value) {
      if (!value) {
        this.cities = [];
      }
    }
  },

  methods: {
    onSearch(search, loading) {
      if (search.length) {
        loading(true);

        getCities(search).then(({data:{data}}) => {
          this.cities = [];
          this.cities = data;
          loading(false);
        })
      }
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

.v-select .dropdown li {
  border-bottom: 1px solid rgba(112, 128, 144, 0.1);
}

.v-select .dropdown li:last-child {
  border-bottom: none;
}

.v-select .dropdown li a {
  padding: 10px 20px;
  width: 100%;
  font-size: 1.25em;
  color: #3c3c3c;
}

.v-select .dropdown-menu .active > a {
  color: #fff;
}

.vs__dropdown-toggle {
  height: 55px;
}
</style>