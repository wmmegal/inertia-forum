<script setup>
import {Head, router} from '@inertiajs/vue3';
import ForumLayout from "@/Layouts/ForumLayout.vue";
import Select from "@/Components/Select.vue";
import Discussion from "@/Components/Forum/Discussion.vue";
import Pagination from "@/Components/Pagination.vue";
import Navigation from "@/Components/Forum/Navigation.vue";
import _omitBy from 'lodash.omitby';
import _isEmpty from 'lodash.isempty';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import useCreateDiscussion from "@/Composables/useCreateDiscussion.js";

const props = defineProps({
    discussions: Object,
    query: Object
})

const filterTopic = (e) => {
    router.visit('/', {
        data: _omitBy({
            'filter[topic]': e.target.value
        }, _isEmpty),
        preserveScroll: true
    })
}

const {showCreateDiscussionForm} = useCreateDiscussion()
</script>

<template>
    <Head title="Forum"/>

    <ForumLayout>
        <div class="space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center space-x-3">
                    <Select id="topic" @change="filterTopic">
                        <option value="">All topics</option>
                        <option
                            :value="topic.slug"
                            v-for="topic in $page.props.topics"
                            :key="topic.id"
                            :selected="query.filter?.topic === topic.slug"
                        >
                            {{ topic.name }}
                        </option>
                    </Select>
                </div>
            </div>
            <div class="space-y-3">
                <template v-if="discussions.data.length">
                    <Discussion v-for="discussion in discussions.data" :key="discussion.id" :discussion="discussion"/>
                    <Pagination class="!mt-6" :pagination="discussions.meta"
                                v-if="discussions.meta.total > discussions.meta.per_page"/>
                </template>
            </div>
        </div>

        <template #side>
            <PrimaryButton @click="showCreateDiscussionForm" class="w-full flex justify-center h-10"
                           v-if="$page.props.auth.user">
                Start a discussion
            </PrimaryButton>
            <Navigation :query="query"/>
        </template>
    </ForumLayout>
</template>
