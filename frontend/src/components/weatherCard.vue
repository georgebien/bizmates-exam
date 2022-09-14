<template>
  <div>
    <div  class="card-1">
      <h5 style="display:inline">Current Weather</h5>

      <div class="cards">
        <div class="today">
          <h5>name 1</h5>

          <div class="daily">
            <img
              :src="require(`../assets/weather_elements/cloudy-day.svg`)"
              width="220px"
              alt
            />

            <p>1°</p>
          </div>

          <h5>test</h5>
        </div>

        <div class="todayDetails">
          <h3>Feels Like 33°</h3>
          <h3>
            <img width="64" src="../assets/weather_elements/humity.png" alt />
            1%
          </h3>
          <h3>
            <img src="../assets/weather_elements/down.png" alt />
            14°
          </h3>

          <h3>
            <img src="../assets/weather_elements/up.png" alt />
            14°
          </h3>
          <h3>
            <img src="../assets/weather_elements/wind.png" alt />
            100 km/h
          </h3>
        </div>
      </div>
    </div>

    <div  class="card-2">
      <!-- <div class="daysDetail">
        <span
          style="display:flex; flex-direction:column; align-items:center; padding-left:10px"
          v-for="data in seven.list"
          :key="data"
        >
        <p>
          Day1
        </p>
          <img
            :src="require(`../assets/weather_elements/cloudy.svg`)"
            width="100px"
            alt
          />
          <p>test</p>
          <p>33° / 36°</p>
        </span>
      </div> -->
    </div>
  </div>
</template>


<script>
export default {
  name: 'weatherCard'
 
}
  
</script>


<style>
.results {
  display: flex;
  flex-direction: column;
}

.cards {
  display: flex;
  width: 100%;
  margin-top: 20px;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
  flex-wrap: wrap;
}
.card-1 {
  width: 100%;
  background-color: white;
  border-radius: 10px;
  margin-top: 20px;
  padding: 20px;
}

.today {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.todayDetails {
  display: flex;
  margin-top: 30px;
  flex-direction: column;
  align-items: flex-start;
}
.daily {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  font-size: 90px;
}
.card-2 {
  width: 100%;
  height: 150px;
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
.days {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  font-size: 23px;
}
.daysDetail {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-around;
  font-size: 23px;
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
 