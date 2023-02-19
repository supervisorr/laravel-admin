<template>
    <div>
        <div id="barByDayOfWeek" style="min-height: 365px;">
            <apexchart
                type="bar"
                height="350"
                :options="dataBarByDayOfWeek.chartOptions"
                :series="dataBarByDayOfWeek.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataBarByDayOfWeek,
} from "@/../data/apexChart";

export default {
//     components: {
// //        ChartCard,
//     },
    data() {
        return {
            dataBarByDayOfWeek,
        };
    },
    methods: {},
};
</script>
