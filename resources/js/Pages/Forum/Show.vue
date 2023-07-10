<script setup>
import {Head} from '@inertiajs/vue3';
import ForumLayout from "@/Layouts/ForumLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import Post from "@/Components/Forum/Post.vue";
import pluralize from "pluralize";
import Navigation from "@/Components/Forum/Navigation.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import useCreatePost from "@/Composables/useCreatePost.js";
import { onMounted, onUpdated, nextTick, watch } from 'vue';
import VueScrollTo from 'vue-scrollto'

const { showCreatePostForm } = useCreatePost()

const props = defineProps({
    discussion: Object,
    posts: Object,
    query: Object,
    postId: String
})

const scrollToPost = (postId) => {
    if (!postId) {
        return
    }

    nextTick(() => {
        VueScrollTo.scrollTo(`#post-${postId}`, 500, { offset: -50 })
    })
}

onMounted(() => {
    scrollToPost(props.postId)
})

watch(() => props.postId, (postId) => {
    scrollToPost(postId)
})

</script>

<template>
    <Head :title="discussion.title"/>

    <ForumLayout>
        <div class="space-y-3">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-0.5 text-sm text-gray-600">
                            {{ discussion.topic.name }}
                        </span>
                        <h1 class="text-lg font-medium">
                            <template v-if="discussion.is_pinned">
                                [Pinned]
                            </template>
                            {{ discussion.title }}
                        </h1>
                    </div>
                    <div class="text-sm">
                        {{ pluralize('reply', discussion.replies_count, true) }}
                    </div>
                </div>
            </div>

            <template v-if="posts.data.length">
                <Post v-for="post in posts.data" :key="post.id" :post="post" />
                <Pagination class="!mt-6" :pagination="posts.meta" v-if="posts.meta.total > posts.meta.per_page" />
            </template>
        </div>

        <template #side>
            <PrimaryButton @click="showCreatePostForm(discussion)" class="w-full flex justify-center h-10" v-if="discussion.user_can.reply">
                Reply to discussion
            </PrimaryButton>
            <Navigation :query="query"/>
        </template>
    </ForumLayout>
</template>
