<template>
    <div>
        <div id="barByBrowser" style="min-height: 365px;">
            <apexchart
                type="bar"
                height="350"
                :options="dataBarByBrowser.chartOptions"
                :series="dataBarByBrowser.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataBarByBrowser,
} from "@/../data/apexChart";

export default {
//     components: {
// //        ChartCard,
//     },
    data() {
        return {
            dataBarByBrowser,
        };
    },
    methods: {},
};
</script>
