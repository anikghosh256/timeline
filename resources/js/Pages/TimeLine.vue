<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import PostForm from '@/Components/PostForm.vue';
import { onMounted } from 'vue'

function getCategories(tags){
    if(tags && tags.length > 0){
         return tags?.split(',');
    } else {
        return [];
    }
}

onMounted(() => {
    // scroll down to the bottom of the page
    setTimeout(() => {
        window.scrollTo(0, document.body.scrollHeight);
    }, 500);
});

</script>

<template>
    <AppLayout title="TimeLine">
        <div class="py-2 main-content">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="post in $page.props.posts.data" :key="post.id" class='flex items-center justify-center mt-5'>  <div class="rounded-xl border p-5 shadow-md w-11/12 bg-white">
                    <div class="flex w-full items-center justify-between border-b pb-3">
                        <div class="flex items-center space-x-3">
                            <div :class="'h-8 w-8 rounded-full bg-slate-400 bg-[url('+$page.props.user.profile_photo_url+')]'"></div>
                            <div class="text-lg font-bold text-slate-700">{{ $page.props.user.name }}</div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button v-for="category in getCategories(post.tags)" :key="category" class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">{{ category }}</button>
                            <div class="text-xs text-neutral-500">{{ post.created_at }}</div>
                        </div>
                        </div>

                        <div class="mt-4 mb-6">
                            <div class="text-sm text-neutral-600">{{ post.content }}</div>
                        </div>

                        <div>
                        <div class="flex items-center justify-between text-slate-500">
                            <div class="flex space-x-4 md:space-x-8">
                            <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                <span>125</span>
                            </div>
                            <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                                <span>4</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <PostForm />
    </AppLayout>
</template>

<style>
    .main-content{
        max-width: 650px;
        margin: 0 auto;
        margin-bottom: 110px;
    }
</style>