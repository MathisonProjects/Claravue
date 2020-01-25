export default {
	init() {},
	firePost(endpoint, payload) {
		return axios.post(endpoint, payload);
	},
	checkout(payload) {
		const endpoint = '/api/store/checkout';
		return this.firePost(endpoint, payload);
	}
}