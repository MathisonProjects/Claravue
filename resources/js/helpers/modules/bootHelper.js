import {store} from "@/stores";
import alertHelper from "./alertHelper";

export default {
	init() {
        var settings = [
            'settingsStore/getSettings',
            'usersStore/getUsers',
            'roleStore/getRoles',
            'pageStore/getPages',
            'fileStore/getFiles',
            'menuStore/getMenu',
            'blogStore/getBlogs',
            'interestCheckStore/getResults',
            'notificationsStore/getNotificationsGeneral',
            'todoStore/refreshTasks',
            'jsonStore/reset',
            'shopStore/getCategories',
            'shopStore/getItems',
            'shopStore/getTransactions',
            'nodeStore/deactivateStore',
        ];

        for (var i in settings) {
            store.dispatch(settings[i]);
        }

        alertHelper.clearAlerts();
	}
}