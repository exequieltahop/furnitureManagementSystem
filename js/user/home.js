document.addEventListener('DOMContentLoaded', ()=>{
    // BURGER MENU CLICK SHOW NAVIGATION
    document.getElementById('burger-menu').addEventListener('click', ()=>{
        const navi = document.getElementById('hidden-nav');
        if(navi.style.display == 'flex'){
            navi.style.display = 'none';
        }else{
            navi.style.display = 'flex';
        }
    });
});