<template>
  <div v-if="places">
		<div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title mb-3">Places to visit in {{ city }}</h5>

				<div class="row">
					<div class="col-md-4 mt-4" v-for="place in places" :key="place.fsq_id">
						<div class="card place-card">
							<div class="card-body">
								<h5 class="card-title">{{ place.name }}</h5>
								<p class="card-text mt-3">Location: {{ place.location.formatted_address }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { getPlaces } from '../services/service';

export default {
	name: 'PlacesCard',

	props: {
		city : {
			type: String,
			required: false
		}
	},

	data() {
		return {
			places: null
		}
	},

	watch: {
		city: function(value) {
			if (value) {
				this.getPlaces(value);
			}
		}
	},

	methods: {
		getPlaces(city) {
      getPlaces(city).then(({data: { data: { results } }}) => {
        this.places = results;
      });
		}
	}
}
</script>

<style>
.row {
	display: flex;
	flex-wrap: wrap;
}
.row > div[class*='col-'] {
  display: flex;
}
.place-card {
	width: 23rem;
}

</style>