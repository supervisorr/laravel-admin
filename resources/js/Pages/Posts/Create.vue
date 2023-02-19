<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link class="text-indigo-400 hover:text-indigo-600" :href="route('posts')">Posts</inertia-link>
      <span class="text-indigo-400 font-medium">/</span> Nuevo
    </h1>
    <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
      <form @submit.prevent="store">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <text-input v-model="form.title" :error="form.errors.title" class="pr-6 pb-8 w-full" label="Titulo" />
          <textarea-input v-model="form.content" :error="form.errors.content" class="pr-6 pb-8 w-full" label="Contenido" />
          <select-input v-model="form.userId" :error="form.errors.userId" class="pr-6 pb-8 w-full" label="Autor">
            <option :value="null" />
            <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
          </select-input>
       </div>
        <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end items-center">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Crear Post</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from '@/Layouts/DefaultLayout'
import TextInput from '@/Shared/TextInput'
import TextareaInput from '@/Shared/TextareaInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
  metaInfo: { title: 'Create Post' },
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    TextareaInput,
  },
  layout: Layout,
  props: {
    users: Array,
    defaultUser: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        title: null,
        content: null,
        userId: this.defaultUser.id,
      }),
    }
  },
  methods: {
    store() {
      this.form.post(this.route('posts.store'))
    },
  },
}
</script>
