<template>
  <base-card>
    <v-card-text>
      <div class="flex justify-between items-center flex-wrap mb-4">
        <div class="flex items-center">
          <img
            class="mr-md rounded-circle mr-2"
            height="44"
            width="44"
            :src="avatar"
          >
          <div>
            <p class="m-0">
              <a
                href="#"
                class="text--primary font-semibold mb-1 hover:text-blue-500"
              > {{ title }} </a>
            </p>
            <p class="text-muted text-small m-0">
              {{ subTitle }}
            </p>
          </div>
        </div>
        <div class="mt-4">
          <v-btn
            class="mr-2 bg-red-100 text-red-600 hover:text-red-100 hover:bg-red-600  shadow-sm"
            fab
            x-small
            dark
          >
            <v-icon>{{ buttonIconOne }}</v-icon>
          </v-btn>
          <v-btn  
            class="mr-2 bg-indigo-100 text-indigo-600 hover:text-indigo-100 hover:bg-indigo-600  shadow-sm"
            
            fab
            x-small
            dark
          >
            <v-icon>{{ buttonIconTwo }}</v-icon>
          </v-btn>
          <v-btn
          
            
            class="mr-1  bg-blue-100 text-blue-600 hover:text-blue-100 hover:bg-blue-600 shadow-sm"
            fab
            x-small
            dark
          >
            <v-icon>mdi-twitter</v-icon>
          </v-btn>
        </div>
      </div>
      <v-divider />
      <div class="flex justify-between items-center flex-wrap mt-4">
        <div class="mb-2">
          <div class="flex justify-between">
            <p class="pr-10">
              Progressbar
            </p>
            <p>40%</p>
          </div>
          <v-progress-linear
            :color="progressLinearColor"
            value="70"
          />
        </div>
        <div class="flex justify-end">
          <v-btn
            class="ma-2 bg-blue-100 text-blue-600 hover:text-white hover:bg-blue-600 shadow-sm transition duration-300 ease-in-out "
            small
          >
            {{ footerBtn }}
          </v-btn>
          <v-btn
            class="ma-2 bg-blue-100 text-blue-600 hover:text-white hover:bg-blue-600 shadow-sm transition duration-300 ease-in-out"
            small
          >
            {{ footerBtnTwo }}
          </v-btn>
        </div>
      </div>
    </v-card-text>
  </base-card>
</template>
<script>
  export default {
    props: {
      // Floating Button icon Color
      avatar: {
        type: String,
        default: require('@/assets/images/avatars/004-bald.svg'),
      },
      title: {
        type: String,
        default: 'Timothy Clarkson',
      },
      subTitle: {
        type: String,
        default: 'Vue Developer',
      },
      footerBtn: {
        type: String,
        default: 'Chat',
      },
      footerBtnTwo: {
        type: String,
        default: 'Profile',
      },
      buttonColorOne: {
        type: String,
        default: '',
      },
      buttonIconOne: {
        type: String,
        default: '',
      },
      buttonIconTwo: {
        type: String,
        default: '',
      },
      buttonColorTwo: {
        type: String,
        default: '',
      },
      buttonIconThree: {
        type: String,
        default: 'mdi-google',
      },
      buttonColorThree: {
        type: String,
        default: '',
      },
      progressLinearColor: {
        type: String,
        default: 'primary',
      },
    },
    data () {
      return {

      }
    },
  }
</script>
