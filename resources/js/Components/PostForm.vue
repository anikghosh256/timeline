<script setup>
  import { useForm } from '@inertiajs/inertia-vue3'

  const form = useForm({
    content: null
  })

  function successAction (data) {
    form.reset()
    window.scrollTo(0, document.body.scrollHeight);
  }

</script>
<template>
  <div class="fixed">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class='flex items-center justify-center mt-5'>  
            <div class="rounded-xl border p-5 shadow-md w-11/12 bg-white">
              <form  @submit.prevent="form.post('/post',{onSuccess: () => successAction()} )">
                  <div class="flex">
                    <input type="text" id="text" v-model="form.content" placeholder="I'm okay now. || sick, morning" class="w-full max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                    <input type="submit" :disabled="form.processing" value="Post" class="sub-btn ml-2 rounded-lg border border-slate-200 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40" />
                  </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</template>

<style scoped>
  .fixed {
    bottom: 0px;
    max-width: 650px;
    width: 100%;
    left: 50%;
    transform: translate(-50%, 0px);
  }
  .sub-btn {
    padding: 8px 20px;
    cursor: pointer;
  }
</style>