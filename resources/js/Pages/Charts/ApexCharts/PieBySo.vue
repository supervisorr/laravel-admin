<template>
    <div>
        <div id="pieBySo" style="min-height: 365px;">
            <apexchart
                type="pie"
                height="350"
                :options="dataPieBySo.chartOptions"
                :series="dataPieBySo.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataPieBySo,
} from "@/../data/apexChart";

export default {
//     components: {
// //        ChartCard,
//     },
    data() {
        return {
            dataPieBySo,
        };
    },
    methods: {},
};
</script>
