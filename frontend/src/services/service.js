import axios from "axios";

export function getWeather(city) {
	return axios
		.get('/api/get-weather', {
			params: {
				city: city,
			}
		})
		.then(response => response)
		.catch(error => error)
}

export function getForecast(city) {
	return axios
		.get('/api/get-forecast', {
			params: {
				city: city,
			}
		})
		.then(response => response)
		.catch(error => error)
}

export function getPlaces(city) {
	return axios
		.get('/api/get-places', {
			params: {
				city: city,
			}
		})
		.then(response => response)
		.catch(error => error)
}