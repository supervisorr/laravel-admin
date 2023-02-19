<template>
    <div>
        <div id="barByBrowserAll" style="min-height: 365px;">
            <apexchart
                type="bar"
                height="350"
                :options="dataBarByBrowserAll.chartOptions"
                :series="dataBarByBrowserAll.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataBarByBrowserAll,
} from "@/../data/apexChart";

export default {
//     components: {
// //        ChartCard,
//     },
    data() {
        return {
            dataBarByBrowserAll,
        };
    },
    methods: {},
};
</script>
