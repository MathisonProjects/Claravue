import helpers from './modules'

export const Helper = {
	install: function(Vue) {
    	Object.defineProperty(Vue.prototype, '$Helper', { value: helpers });
	}
};