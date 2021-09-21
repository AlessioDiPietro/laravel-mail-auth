<template>
<div class="container">
    <div class="row">
        <div class="col-6" v-for="post in  posts" :key="post.id">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ dataImp(post.created_at) }}</h6>
                    <p class="card-text">{{smallText(post.article, 120)}}</p>
                    <a href="#" class="card-link">Show more</a>
                    
                </div>
            </div>
        </div>
        
    </div>
    <div class="my-4">
        <h4><strong>Risultati {{currentPage}} di {{lastPage}} pagine</strong> </h4>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item" :class="{'disabled' : currentPage === 0 }"><button class="page-link"  href="#" @click="getPosts(currentPage - 1)">Prima</button></li>
                    
                <li class="page-item" v-for="i in lastPage" :key="i" @click="getPosts(i)"><a href="#" class="page-link">{{i}}</a>
                </li>


                <li class="page-item" :class="{'disabled' : currentPage === lastPage }"><button class="page-link"  href="#"  @click="getPosts(currentPage + 1)">Dopo</button></li>
            </ul>
        </nav>
    </div>
</div>
</template>
<script>

export default {
    name: "Main",
    data(){
        return {
            apiUrl: 'http://127.0.0.1:8000/api/posts',
            posts: [],
            lastPage: null,
            currentPage: 1
        }
    },
    created(){
        this.getPosts(1);
        },
    methods: {
        getPosts(move){
            axios.get(this.apiUrl, {
                params: {
                    page: move

                }
            })
                .then(res=> {
                    this.posts = res.data.results.data;
                    this.lastPage = res.data.results.last_page;
                    this.currentPage = res.data.results.current_page;
                    console.log(this.posts);
                })
        },
        smallText(text, maxlength){
            if(text.length > maxlength){
                return text.substr(0, maxlength) + '...Altro';
            }
            return text;
        },
        dataImp(data){
            const postData = new Date(data);
            let day = postData.getDate();
            let month = parseInt(postData.getMonth() +1);
            if(day < 10){
                day = '0' + day;
            }
            if(month < 10){
                month = '0' + month;
            }
            return day + '-' + month + '-' + postData.getFullYear();
        }

    }
}
</script>
<style lang="scss" scoped>

</style>
