<script setup>
import {Head} from '@inertiajs/vue3';
import ForumLayout from "@/Layouts/ForumLayout.vue";
import Select from "@/Components/Select.vue";
import Discussion from "@/Components/Forum/Discussion.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    discussions: Object
})
</script>

<template>
    <Head title="Forum"/>

    <ForumLayout>
        <div class="space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center space-x-3">
                    <Select id="topic">
                        <option value="">All topics</option>
                        <option
                            :value="topic.slug"
                            v-for="topic in $page.props.topics"
                            :key="topic.id"
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
            side
        </template>
    </ForumLayout>
</template>
