<script setup>
import PhotoDecision from "./components/PhotoDecision.vue";
</script>

<template>
    <div class="app">
        <main>
            <header>
                <h1>Face<span>Mash</span></h1>
            </header>

            <PhotoDecision />
        </main>
    </div>
</template>

<style lang="postcss" scoped>
.app {
    @apply min-h-screen w-full bg-gradient-to-br from-gray-800 to-gray-900 py-8 px-4 flex items-center justify-center;
}

main {
    @apply flex-1;
}

header {
    @apply mb-12;
}

h1 {
    @apply text-3xl md:text-4xl text-center font-semibold text-white;
}

h1 span {
    @apply text-indigo-600;
}

main {
    @apply max-w-[800px] mx-auto;
}
</style>
