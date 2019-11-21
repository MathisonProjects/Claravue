import {store} from "@/stores";

export default {
	init() {
        var settings = [
            'settingsStore/getSettings',
            'pageStore/getPages',
            'fileStore/getFiles',
            'menuStore/getMenu',
            'blogStore/getBlogs',
            'interestCheckStore/getResults',
            'jsonStore/reset'
        ];

        for (var i in settings) {
            store.dispatch(settings[i]);
        }
	}
}