<template>
    <div>
        <div id="pieBySoAll" style="min-height: 365px;">
            <apexchart
                type="pie"
                height="350"
                :options="dataPieBySoAll.chartOptions"
                :series="dataPieBySoAll.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataPieBySoAll,
} from "@/../data/apexChart";

export default {
//     components: {
// //        ChartCard,
//     },
    data() {
        return {
            dataPieBySoAll,
        };
    },
    methods: {},
};
</script>
