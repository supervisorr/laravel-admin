<template>
  <base-card class="h-full">
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
                class="text--primary  font-semibold mb-1 hover:text-blue-500"
              > {{ title }} </a>
            </p>
            <p class="text-muted text-small m-0">
              {{ subTitle }}
            </p>
          </div>
        </div>
        <div>
          <v-btn
            class="ma-2 bg-blue-100 text-blue-600 hover:text-white hover:bg-blue-600 shadow-sm transition duration-300 ease-in-out "
            small
          >
            {{ primaryBtn }}
          </v-btn>
          <v-btn
            class="ma-2 bg-blue-100 text-blue-600 hover:text-white hover:bg-blue-600 shadow-sm transition duration-300 ease-in-out"
            small
          >
            {{ secondaryBtn }}
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
      primaryBtn: {
        type: String,
        default: 'Chat',
      },
      secondaryBtn: {
        type: String,
        default: 'Profile',
      },
    },
    data () {
      return {

      }
    },
  }
</script>
