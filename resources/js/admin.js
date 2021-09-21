require('./bootstrap');

const deletePost = document.querySelectorAll('.delete_form');

deletePost.forEach(item =>{
    item.addEventListener('submit', function(event){
        const res = confirm('Sicuro di voler eliminare il dato selezionato?');

        if(!res){
            event.preventDefault();
        }
    })
});