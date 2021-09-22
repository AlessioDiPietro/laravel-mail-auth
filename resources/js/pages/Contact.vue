<template>
    <div class="container">
        <h1>Benvenuti alla Home Contact</h1>
            <form  @submit.prevent="sendForm">
                <div v-if="success" class="success">Messaggio inviato</div>
            <div class="mb-3">
                <label for="user-name" class="form-label">Nome Utente</label>
                <input type="text" v-model="name" class="form-control" id="user-name" name="name" aria-describedby="nome">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" v-model="email">
            </div>
            <div class="mb-3">
                <label for="msg" class="form-label">Messaggio</label>
                <textarea type="text" class="form-control" id="msg" name="message" v-model="message"></textarea>
                    
            </div>
            
            <button type="submit" class="btn btn-primary">{{sending ? 'invio in corso' : 'invia'}}</button>
        </form>
    </div>
</template>
<script>


export default {
    name: 'Contact',
    data(){
        return {
            name:'',
            email: '',
            message:'',
            errors:{},
            sending: false,
            success:false
        }
    },
    methods: {
        sendForm(){
            this.sending = true;
            axios.post('/api/contacts', {
                'name': this.name,
                'email': this.email,
                'message': this.message,
            })
            .then(res=>{
                console.log(res);
                this.success = true;
                this.sending = false;
                this.name = '',
                this.email = '',
                this.message = ''
                
            })
        }
    }
}
</script>