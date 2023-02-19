<template>
    <div>
        <div id="pieByResolution" style="min-height: 365px;">
            <apexchart
                type="pie"
                height="350"
                :options="dataPieByResolution.chartOptions"
                :series="dataPieByResolution.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataPieByResolution,
} from "@/../data/apexChart";

export default {
//     components: {
// //        ChartCard,
//     },
    data() {
        return {
            dataPieByResolution,
        };
    },
    methods: {},
};
</script>
