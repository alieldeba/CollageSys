let loading = document.querySelector('.loading');
let body = document.querySelector('body');


window.addEventListener('load', () => {
    loading.classList.add('load-finish')    
    body.classList.remove('hidden')    
})
