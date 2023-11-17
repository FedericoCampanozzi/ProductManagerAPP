import { createApp, h } from "vue";
import NProgress from "nprogress";
import { createInertiaApp, router } from "@inertiajs/vue3";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) }).use(plugin).mount(el);
    },
    title: () => 'ProdManAPP',
    progress: {
        delay: 250,
        color: "red",
        includeCSS: true,
    },
});

router.on("start", () => NProgress.start());
router.on("finish", () => NProgress.done());