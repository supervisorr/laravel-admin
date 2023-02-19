<template>
  <base-card>
    <v-card-text>
      <div class="flex items-center">

        <v-avatar 
          size="56" 
          :class="[textColor, bgColor]"
          class="mr-4"
        >
          <v-icon :color="iconColor">{{ icon }}</v-icon>
        </v-avatar>
        <div class="">
          <h6 class="card-title mb-1">{{ title }}</h6>
          <p>{{ subTitle }}</p>
        </div>
      </div>
      <v-divider class="my-2"></v-divider>
      <base-hover-button 
        :text="buttonText"
        text-color="text-blue-600"
        bg-color="bg-blue-100"
        bg-hover="hover:bg-blue-600"
      />
    </v-card-text>
  </base-card>
</template>
<script>
  export default {
    props: {
      textColor: {
        type: String,
        default: 'text-red-600'
      },
      bgColor: {
        type: String,
        default: 'bg-red-600'
      },
      icon: {
        type: String,
        default: 'mdi-home'
      },
      iconColor: {
        type: String,
        default: ''
      },
      title: {
        type: String,
        default: ''
      },
      subTitle: {
        type: String,
        default: ''
      },
      buttonText: {
        type: String,
        default: '',
      }
    },
  }
</script>
