<template>
  <base-card>
    <v-card-title class="justify-between">
      <v-avatar>
        <img
          :src="avatar"
          alt="John"
        >
      </v-avatar>
      <v-menu offset-y>
        <template v-slot:activator="{ on, attrs }">
          <v-btn
            class="transparent"
            depressed
            x-small
            fab
            v-bind="attrs"
            v-on="on"
          >
            <v-icon>mdi-dots-horizontal</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item
            @click=""
          >
            <v-list-item-title class="text-sm">
              <v-icon class="mr-2">
                mdi-account-circle
              </v-icon>  View Profile
            </v-list-item-title>
          </v-list-item>
          <v-list-item
            @click=""
          >
            <v-list-item-title class="text-sm">
              <v-icon class="mr-2">
                mdi-account-multiple-plus
              </v-icon>  Add To Team
            </v-list-item-title>
          </v-list-item>
          <v-list-item
            @click=""
          >
            <v-list-item-title class="text-sm">
              <v-icon class="mr-2">
                mdi-pencil
              </v-icon>  Add To Team
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-card-title>
    <v-card-text>
      <a
        href="#"
        class="text--primary  font-semibold hover:text-blue-500"
      > {{ title }} </a>

      <p class="my-3">
        {{ subTitle }}
      </p>
      <div>
        <a
          href="#"
          class="font-semibold text-gray-600 "
        >
          <v-icon
            class="text-base"
            color="danger"
          >mdi-google</v-icon>
          ui-lib@gmail.com
        </a>
      </div>
      <div>
        <a
          href="#"
          class="font-semibold text-gray-600"
        >
          <v-icon
            class="text-base"
            color="blue lighten-1"
          >mdi-twitter</v-icon>
          ui-lib
        </a>
      </div>
      <div>
        <v-btn
          v-if="footerBtnColor"
          class="ma-2 transition duration-300 ease-in-out "
          small
          :class="footerBtnColor"
        >
          {{ footerBtn }}
        </v-btn>
        <v-btn
          v-if="footerBtnColorTwo"
          class="ma-2 transition duration-300 ease-in-out"
          small
          :class="footerBtnColorTwo"
        >
          {{ footerBtnTwo }}
        </v-btn>
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
      footerBtnColor: {
        type: String,
        default: '',
      },
      footerBtnColorTwo: {
        type: String,
        default: '',
      },
    },
    data () {
      return {

      }
    },
  }
</script>
