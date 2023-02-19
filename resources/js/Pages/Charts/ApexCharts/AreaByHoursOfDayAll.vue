<template>
    <div>
        <div id="areaByHoursOfDayAll" style="min-height: 365px;">
            <apexchart
                type="area"
                height="350"
                :options="dataAreaByHoursOfDayAll.chartOptions"
                :series="dataAreaByHoursOfDayAll.series"
            />
        </div>
    </div>
</template>
<script>
// import ChartCard from "@/components/card/ChartCard";
import {
    dataAreaByHoursOfDayAll,
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
            dataAreaByHoursOfDayAll,
        };
    },
    methods: {},
};
</script>
