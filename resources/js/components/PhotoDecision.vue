<script setup>
import {onMounted, ref} from "vue";
import axios from "axios";

const photo = ref(null)
const status = ref(null)

onMounted(() => fetchPhoto())

const fetchPhoto = () => {
    status.value = 'Loading Photo...'
    photo.value = null

    axios
        .get('/api/random-photo')
        .then(({data}) => {
            if ('error' in data) {
                status.value = data.error
            } else {
                status.value = null

                photo.value = data.photo;
            }
        })
        .catch(() => {
            status.value = 'Something went wrong!'
        })
}

const sendDecision = (type) => {
    axios
        .post(`/api/decision/${photo.value.id}`, { type })
        .then(() => fetchPhoto())
        .catch(() => {
            status.value = 'Something went wrong!'
            photo.value = null
        })
}
</script>

<template>
    <div class="decision">
        <div class="decision__body">
            <div class="decision__media">
                <img :src="photo.image_url" class="decision__image" v-if="photo">

                <div class="decision__message" v-else>
                    {{ status }}
                </div>
            </div>

            <div class="decision__actions">
                <button @click="sendDecision('approve')" class="decision__button decision__button--approve"
                        :disabled="status">
                    Approve
                </button>

                <button @click="sendDecision('deny')" class="decision__button decision__button--deny"
                        :disabled="status">
                    Deny
                </button>
            </div>
        </div>
    </div>
</template>

<style lang="postcss" scoped>
.decision__media {
    @apply mb-8 aspect-[4/3] bg-gray-900 rounded-md overflow-hidden flex items-center justify-center;
}

.decision__image {
    @apply rounded-md shadow-xl object-cover aspect-[4/3];
}

.decision__message {
    @apply text-gray-500;
}

.decision__actions {
    @apply flex items-center justify-center space-x-8;
}

.decision__button--approve {
    @apply bg-green-600;
}

.decision__button--deny {
    @apply bg-red-600;
}

.decision__button {
    @apply flex-1 font-medium text-white p-4 rounded shadow transform hover:shadow-xl hover:scale-105 transition duration-100 disabled:bg-gray-900 disabled:text-gray-600 disabled:scale-100 disabled:shadow-none;
}
</style>
