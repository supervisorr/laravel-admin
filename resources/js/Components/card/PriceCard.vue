<template>
  <div>
    <base-card class="d-flex flex-column">
      <v-card-text>
        <div class="flex justify-between align-center">
          <div><p class="m-0">{{priceTitle}}</p></div>
          
          <div>
            <v-menu left bottom>
              <template v-slot:activator="{ on }">
                <v-btn icon v-on="on">
                  <v-icon>mdi-dots-horizontal</v-icon>
                </v-btn>
              </template>

              <v-list>
                <v-list-item v-for="n in 4" :key="n" @click="() => {}">
                  <v-list-item-title>Option {{ n }}</v-list-item-title>
                </v-list-item>
              </v-list>
            </v-menu>
          </div>
        </div>
        <h4>{{ amount }}</h4>
        <div class="flex justify-between flex-wrap items-center">
          <div class=" items-center">
            <div class="mr-2 w-5 h-5 inline-flex align-center justify-center rounded-circle" :class="chipColor">
              <v-icon
                :class="colorIcon"
                class="text-xs"
              >{{ cardIcon }}</v-icon>
            </div>
            <span :class="chipTextColor">{{chipText}}</span>
          </div>
          <div><p class="m-0">{{footerText}}</p></div>
          
        </div>
      </v-card-text>
    </base-card>
  </div>
</template>
<script>
export default {
  name: "PriceCard",
  props: {
    cardIcon: {
      type: String,
      default: "mdi-chart-pie"
    },
    colorIcon: {
      type: String,
      default: "text-success"
    },
    chipColor: {
      type: String,
      default: "bg-green-200"
    },
    priceTitle: {
      type: String,
      default: "test"
    },
    chipText: {
      type: String,
      default: "A"
    },
    chipTextColor: {
      type: String,
      default: "text-danger"
    },
    amount: {
      type: String,
      default: "$41000"
    },
    footerText: {
      type: String,
      default: "Profit in this Period"
    }
  }
};
</script>
