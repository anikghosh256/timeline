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
                <div v-for="post in $page.props.posts.data" :key="post.id" class='flex items-center justify-center mt-5'>
                    <div class="rounded-xl border p-5 shadow-md w-11/12 bg-white">
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