<template>
  <div v-if="places">
		<div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title mb-3">Places to visit in {{ city }}</h5>
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
      getPlaces(city).then(({data: { data }}) => {
        this.places = data;
      });
		}
	}
}
</script>

<style>

</style>