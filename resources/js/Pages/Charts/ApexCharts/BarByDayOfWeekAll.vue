<template>
    <div>
        <div id="barByDayOfWeekAll" style="min-height: 365px;">
            <apexchart
                type="bar"
                height="350"
                :options="dataBarByDayOfWeekAll.chartOptions"
                :series="dataBarByDayOfWeekAll.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataBarByDayOfWeekAll,
} from "@/../data/apexChart";

export default {
//     components: {
// //        ChartCard,
//     },
    data() {
        return {
            dataBarByDayOfWeekAll,
        };
    },
    methods: {},
};
</script>
