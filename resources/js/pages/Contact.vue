<template>
    <div class="container">
        <h1>Benvenuti alla Home Contact</h1>
            <form enctype="">

            <div class="mb-3">
                <label for="user-name" class="form-label">Nome Utente</label>
                <input type="text" class="form-control" id="user-name" name="name" aria-describedby="nome">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="password" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="msg" class="form-label">Messaggio</label>
                <textarea type="password" class="form-control" id="msg" name="message"></textarea>
                    
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
<script>


export default {
    name: 'Contact'
}
</script>