<template>
    <div class="ml-4"
         style="margin-left: 2.5rem; margin-top: -1px; margin-bottom: -1px; display: flex; margin-right: 5px; padding: 0px 2px; text-align: center; word-wrap: break-word;">
        <inertia-link :href="route('language', 'es')" :class="classes">
            <div>ES</div>
        </inertia-link>
        <inertia-link :href="route('language', 'en')" :class="classes">
            <div>EN</div>
        </inertia-link>
        <inertia-link :href="route('language', 'ru')" :class="classes">
            <div>RU</div>
        </inertia-link>
    </div>
</template>

<script>
/**
 * @TODO - select...
 */
export default {

    name: "LanguageSelector.vue",
    computed: {
        selectable_locale() {
            if (this.$page.props.locale == 'fr') {
                return 'fr';
            }
            return 'en'
        },
        classes() {
            return 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-red-900 hover:text-red-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
        }
    },
}
</script>
