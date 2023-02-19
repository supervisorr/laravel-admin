<template>
    <div class="charts">
        <search-between-dates v-model="form.search" class="w-full mr-4" @reset="reset">
        </search-between-dates>
        <area-by-hours-of-day class=""></area-by-hours-of-day>
        <area-by-hours-of-day-all class=""></area-by-hours-of-day-all>
        <bar-by-day-of-week class=""></bar-by-day-of-week>
        <bar-by-day-of-week-all class=""></bar-by-day-of-week-all>
        <bar-by-browser class=""></bar-by-browser>
        <bar-by-browser-all class=""></bar-by-browser-all>
        <pie-by-resolution class=""></pie-by-resolution>
        <pie-by-resolution-all class=""></pie-by-resolution-all>
        <pie-by-so class=""></pie-by-so>
        <pie-by-so-all class=""></pie-by-so-all>
    </div>
</template>

<script>

import Layout from '@/Layouts/DefaultLayout';

import SearchBetweenDates from '@/Shared/SearchBetweenDates'

import AreaByHoursOfDay from '@/Pages/Charts/ApexCharts/AreaByHoursOfDay'
import AreaByHoursOfDayAll from '@/Pages/Charts/ApexCharts/AreaByHoursOfDayAll'
import BarByDayOfWeek from '@/Pages/Charts/ApexCharts/BarByDayOfWeek'
import BarByDayOfWeekAll from '@/Pages/Charts/ApexCharts/BarByDayOfWeekAll'
import BarByBrowser from '@/Pages/Charts/ApexCharts/BarByBrowser'
import BarByBrowserAll from '@/Pages/Charts/ApexCharts/BarByBrowserAll'
import PieByResolution from '@/Pages/Charts/ApexCharts/PieByResolution'
import PieByResolutionAll from '@/Pages/Charts/ApexCharts/PieByResolutionAll'
import PieBySo from '@/Pages/Charts/ApexCharts/PieBySo'
import PieBySoAll from '@/Pages/Charts/ApexCharts/PieBySoAll'
import mapValues from "lodash/mapValues";

export default {
    metaInfo: {
        title: "Estadísticas",
    },
    layout: Layout,
    components: {
        SearchBetweenDates,
        AreaByHoursOfDay,
        AreaByHoursOfDayAll,
        BarByDayOfWeek,
        BarByDayOfWeekAll,
        BarByBrowser,
        BarByBrowserAll,
        PieByResolution,
        PieByResolutionAll,
        PieBySo,
        PieBySoAll,
    },
    props: {
        filters: Object,
    },
    data() {
        return {
            form: {
                search: this.filters.search,
                trashed: this.filters.trashed,
            },
        }
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null)
        },
    },
}

</script>
