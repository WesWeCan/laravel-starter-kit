import { AxiosInstance } from 'axios';
import { route as ziggyRoute } from 'ziggy-js';
import type { SharedPageProps } from './app';

declare global {
    interface Window {
        axios: AxiosInstance;
    }

    /* eslint-disable no-var */
    var route: typeof ziggyRoute;
}

declare module 'vue' {
    interface ComponentCustomProperties {
        route: typeof ziggyRoute;
    }
}

declare module '@inertiajs/core' {
    export interface InertiaConfig {
        sharedPageProps: SharedPageProps;
    }
}
