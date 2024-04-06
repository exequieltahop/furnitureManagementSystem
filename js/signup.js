document.addEventListener('DOMContentLoaded', ()=>{
    // SHOW HIDE PASSWORD
    document.getElementById('showPass').addEventListener('change', (e)=>{
        const password = document.getElementById('password');
        if(e.target.checked){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
    });
});