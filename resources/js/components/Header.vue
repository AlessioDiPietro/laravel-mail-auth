<template>
    <div class="mb-4">
        <ul class="nav justify-content-center bg-success">
            <li class="nav-item">
                <router-link class="nav-link py-3" :to="{name: 'home'}">Boolpress</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link py-3" :to="{name: 'service'}">Servizi</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link py-3" :to="{name: 'contact'}">Contatti</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link py-3" :to="{name: 'product'}">Prodotti</router-link>
            </li>  
        </ul>
    </div>
</template>
<script>

export default {
    name: "Header"
}
</script>
<style lang="scss" scoped>

</style>

