export default {
	formatCurrency(amount) {
		if (typeof amount === 'string') {
			amount = parseFloat(amount);
		}
		return amount.toFixed(2);
	},
	formatUpload(file) {
		return '/upload/' + file;
	}
}