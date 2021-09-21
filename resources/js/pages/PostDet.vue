<template>
    <div class="mt-4 container">
        <div class="card">
            <div class="card-header">
                {{ArrayDet.title}}
            </div>
            <div class="card-body">
                <h5 class="card-title" v-if="ArrayDet.catory.name">{{ArrayDet.category.name}}</h5>
                <p class="card-text">{{ArrayDet.article}}</p>
                <div v-if="ArrayDet.tags">

                </div>
                <span class="badge" v-for="(tag, index) in ArrayDet.tags" :key="index">{{tag.name}}</span>
                
            </div>
        </div>
    </div>
</template>
<script>


export default {
    name: 'PostDet',
    data() {
        return {
            ApiUri: '/api/post/',
            ArrayDet: []


        }
    },
    mounted(){
        axios.get(this.ApiUri + this.$route.params.slug)
            .then(res=>{
                this.ArrayDet = res.data.results
                console.log(this.ArrayDet);
            })
    }

}
</script>
<style scoped>
 
</style>