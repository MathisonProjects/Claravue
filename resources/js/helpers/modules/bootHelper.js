import {store} from "@/stores";
import alertHelper from "./alertHelper";

export default {
	init() {
        var settings = [
            'settingsStore/getSettings',
            'roleStore/getRoles',
            'pageStore/getPages',
            'fileStore/getFiles',
            'menuStore/getMenu',
            'blogStore/getBlogs',
            'interestCheckStore/getResults',
            'notificationsStore/getNotificationsGeneral',
            'jsonStore/reset',
            'nodeStore/deactivateStore'
        ];

        for (var i in settings) {
            store.dispatch(settings[i]);
        }

        alertHelper.clearAlerts();
	}
}