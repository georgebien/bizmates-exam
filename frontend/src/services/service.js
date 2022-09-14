import axios from "axios";

export function getCities(keyword) {
	return axios
		.get('/api/get-cities', {
			params: {
				search: keyword
			}
		})
		.then(response => response)
		.catch(error => error)
}