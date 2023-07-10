<template>
    <div
        :id="`post-${post.id}`"
        class="relative bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 flex items-start space-x-3 border-2"
    >
        <div class="w-7 flex-shrink-0">
            <img :src="post.user?.avatar_url" class="w-7 h-7 rounded-full" v-if="post.user">
        </div>
        <div class="w-full">
            <div>
                <div>{{ post.user?.username || '[user deleted]' }}</div>
                <div class="text-sm text-gray-500">Posted <time :datetime="post.created_at.datetime" :title="post.created_at.datetime">{{ post.created_at.human }}</time></div>
            </div>
            <div class="mt-3">
                <div v-html="post.body_markdown" class="markdown"></div>
            </div>
            <ul class="flex items-center space-x-3 mt-6">
                <li v-if="post.discussion.user_can.reply">
                    <button @click="showCreatePostForm(post.discussion, post.user)" class="text-indigo-500 text-sm">Reply</button>
                </li>
<!--                <li v-if="post.user_can.edit">-->
<!--                    <button @click="editing = true" class="text-indigo-500 text-sm">Edit</button>-->
<!--                </li>-->
<!--                <li v-if="post.user_can.delete">-->
<!--                    <button @click="deletePost" class="text-indigo-500 text-sm">Delete</button>-->
<!--                </li>-->
<!--                <li v-if="post.discussion.user_can.solve">-->
<!--                    <button-->
<!--                        class="text-indigo-500 text-sm"-->
<!--                        @click="router.patch(route('discussions.solution.patch', post.discussion), { post_id: isSolution ? null : post.id }, { preserveScroll: true })"-->
<!--                    >-->
<!--                        {{ isSolution ? 'Unmark' : 'Mark' }} best solution-->
<!--                    </button>-->
<!--                </li>-->
            </ul>
        </div>
    </div>
</template>

<script setup>

import useCreatePost from '@/Composables/useCreatePost';

const { showCreatePostForm } = useCreatePost()

const props = defineProps({
    post: Object,
})


</script>
