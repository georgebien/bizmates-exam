<template>
  <div v-if="weatherData && forecast">
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title mb-3">Weather today</h5>
        <div class="row">
          <div class="col-md-6 today">
            <h3>{{ weatherData.city }}</h3>
            <div class="today-weather">
              <img
                :src="require(`../assets/weather_elements/${weathers[weatherData.type]}.svg`)"
                width="220px"
                alt
              />
              <p>{{ weatherData.currentTemp }}°</p>
            </div>
            <h4>{{ weatherData.type }}</h4>
          </div>

          <div class="col-md-6 today-details">
            <p class="p-details">Feels like: {{weatherData.feelsLike }}°</p>
            <p class="p-details">Humidity: {{weatherData.humidity }}°</p>
            <p class="p-details">Min. temperature: {{weatherData.minTemp }}°</p>
            <p class="p-details">Max. temperature: {{weatherData.maxTemp }}°</p>
            <p class="p-details">Speed: {{weatherData.speed }} km/h</p>
            <p class="p-details">Gustiness: {{weatherData.gust }} km/h</p>
          </div>

        </div>
      </div>
    </div>
    <div  class="card-forecast">
      <div class="days-detail">
        <span
          style="display:flex; flex-direction:column; align-items:center; padding-left:10px"
          v-for="data in forecast"
          :key="data.dt"
        >
        <p>
          {{ data.day }}
        </p>
          <img
            :src="require(`../assets/weather_elements/${weathers[data.weather[0].main]}.svg`)"
            width="100px"
            alt
          />
          <p> {{ data.weather[0].main }}</p>
          <span class="day-night-temp">Day: {{ parseInt(data.temp.day) }}°</span>
          <span class="day-night-temp">Night: {{ parseInt(data.temp.night) }}°</span>
        </span>
      </div>
    </div>
  </div>
</template>


<script>
import { getForecast } from '../services/service';

export default {
  name: 'weatherCard',

  props: {
    weather: {
      type: Object,
      required: false
    }
  },

  data() {
    return {
      weatherData: null,
      weathers: {
        Snow: "snowy",
        Clouds: "cloudy",
        Rain: "rainy",
        Clear: "sunny",
        Thunderstorm: "thunder",
      },
      forecast: null,
      days: [
        'Sunday', 
        'Monday', 
        'Tuesday', 
        'Wednesday', 
        'Thursday', 
        'Friday', 
        'Saturday'
      ]
    }
  },

  mounted() {
    const currentDate = new Date();
    const nextWeek = new Date(
      currentDate.getTime() + 7 * 24 * 60 * 60 * 1000
    );
    let days = []

    while (currentDate <= nextWeek) {
      days.push(new Date(currentDate).getDay());
      currentDate.setDate(currentDate.getDate() + 1);
    }

    this.daysIndex = days.slice(1);
  },

  watch: {
    weather: function(value) {
      if (value) {
        this.formatData(value);
        this.getForecast();
      }
    },

    forecast: function(){
      for (let i = 0; i < this.daysIndex.length; i++) {
        this.forecast[i].day = this.days[this.daysIndex[i]]
      }
    }
  },

  methods: {
    formatData(data) {
      this.weatherData = {
        city: data.name,
        currentTemp: Math.round(data.main.temp),
        type: data.weather[0].main,
        feelsLike: Math.round(data.main.feels_like),
        humidity: Math.round(data.main.humidity),
        minTemp: Math.round(data.main.temp_min),
        maxTemp: Math.round(data.main.temp_max),
        speed: data.wind.speed,
        gust: data.wind.gust
      }
    },

    getForecast() {
      getForecast(this.weatherData.city).then(({data:{ data: { list } }}) => {
        this.forecast = list;
      })
    }
  }
}
  
</script>


<style>
.today {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.today-details {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
.today-weather {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  font-size: 80px;
}
.card-forecast {
  width: 100%;
  height: 300px;
  background-color: white;
  border-radius: 10px;
  margin-top: 20px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: stretch;
  overflow: auto;
}
.days-detail {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-around;
  font-size: 23px;
}

.p-details {
  font-size: x-large;
}

.day-night-temp {
  font-size: medium;
}

@media (max-width: 1300px) {
  .card-2{
    align-items: baseline;
  }
  .results{
    width: 90vw !important;
  }
  
}
</style>
 