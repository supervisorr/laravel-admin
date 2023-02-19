<template>
    <div>
        <div id="pieByResolutionAll" style="min-height: 365px;">
            <apexchart
                type="pie"
                height="350"
                :options="dataPieByResolutionAll.chartOptions"
                :series="dataPieByResolutionAll.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataPieByResolutionAll,
} from "@/../data/apexChart";

export default {
//     components: {
// //        ChartCard,
//     },
    data() {
        return {
            dataPieByResolutionAll,
        };
    },
    methods: {},
};
</script>
