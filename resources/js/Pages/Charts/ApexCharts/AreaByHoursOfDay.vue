<template>
    <div>
        <div id="areaByHoursOfDay" style="min-height: 365px;">
            <apexchart
                type="area"
                height="350"
                :options="dataAreaByHoursOfDay.chartOptions"
                :series="dataAreaByHoursOfDay.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataAreaByHoursOfDay,
} from "@/../data/apexChart";

export default {
    // metaInfo: {
    //     // if no subcomponents specify a metaInfo.title, this title will be used
    //     title: "Apex - Area Charts",
    // },
    components: {
//        ChartCard,
    },
    data() {
        return {
            dataAreaByHoursOfDay,
        };
    },
    methods: {},
};
</script>
