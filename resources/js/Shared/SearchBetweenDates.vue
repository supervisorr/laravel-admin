<template>
  <div class="flex items-center w-full shadow rounded">
    <div class="w-full">
      <form class="bg-white shadow-md rounded px-2 pt-2 pb-2" @submit.prevent>
        <div class="w-full max-w-sm inline-block" style="margin: 0px 0px 0px 14px; display: inline-block; top: 0px; max-width: 300px; position: relative; left: 0; float: left">
          <label class="block text-gray-600 text-sm font-bold mb-2" for="searchStart">Fecha desde</label>
          <div class="flex w-full">
            <v-date-picker :locale="$page.props.locale" color="green" :max-date="new Date()" show-iso-weeknumbers v-model="searchStart" class="flex-grow" :select-attribute="selectAttribute">
              <template v-slot="{ inputValue, inputEvents }">
                <input id="searchStart" class="bg-white text-gray-700 w-full py-2 px-3 appearance-none border rounded-l focus:outline-none" :class="{ 'border-indigo-500': errorMessageStart }" :value="inputValue" v-on="inputEvents" />
              </template>
            </v-date-picker>
            <button type="button" class="text-white font-bold py-2 px-2 rounded-r user-select-none focus:outline-none" :class="searchStart ? 'bg-indigo-500' : 'bg-indigo-300'" :disabled="!searchStart" @click="searchStart = null">
              <icon name="backspace" class="w-4 h-4 mr-2 fill-indigo-700 group-hover:fill-white" />
            </button>
          </div>
          <div class="clear-both"></div>
        </div>

        <div class="w-full max-w-sm mx-5 inline-block" style="margin: 0px 0px 0px 14px; display: inline-block; top: 0px; max-width: 300px; position: relative; left: 0; float: left">
          <label class="block text-gray-600 text-sm font-bold mb-2" for="searchEnd">Fecha hasta</label>
          <div class="flex w-full">
            <v-date-picker :locale="$page.props.locale" color="green" show-iso-weeknumbers v-model="searchEnd" class="flex-grow" :select-attribute="selectAttribute">
              <template v-slot="{ inputValue, inputEvents }">
                <input id="searchEnd" class="bg-white text-gray-700 w-full py-2 px-3 appearance-none border rounded-l focus:outline-none" :class="{ 'border-indigo-500': errorMessageEnd }" :value="inputValue" v-on="inputEvents" />
              </template>
            </v-date-picker>
            <button type="button" class="text-white font-bold py-2 px-2 rounded-r user-select-none focus:outline-none" :class="searchEnd ? 'bg-indigo-500' : 'bg-indigo-300'" :disabled="!searchEnd" @click="searchEnd = null">
              <icon name="backspace" class="w-4 h-4 mr-2 fill-indigo-700 group-hover:fill-white" />
            </button>
          </div>
          <div class="clear-both"></div>
        </div>

        <div class="w-full max-w-sm inline-block pt-7" style="margin: 0px 0px 0px 14px; display: inline-block; top: 0px; max-width: 300px; position: relative; left: 0; float: left">
          <div class="flex w-full">
            <button type="button" class="text-white text-sm bg-indigo-500 font-bold py-2 px-4 rounded-xl user-select-none focus:outline-none" @click="$emit('reset')">Filtrar</button>
          </div>
        </div>
        <div class="clear-both"></div>
      </form>
    </div>
  </div>
</template>

<script>
import vDatePicker from 'v-calendar/lib/components/date-picker.umd'
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
    vDatePicker,
  },
  data() {
    return {
      searchStart: new Date(),
      searchEnd: null,
      masks: {
        input: 'DD/MM/YYYY',
      },
      selectAttribute: {
        dot: true,
      },
    }
  },
  computed: {
    errorMessageStart() {
      if (!this.date) return 'Date is required.'
      return ''
    },
    errorMessageEnd() {
      if (!this.date) return 'Date is required.'
      return ''
    },
  },
}
</script>
