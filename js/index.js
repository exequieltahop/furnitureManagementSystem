document.addEventListener('DOMContentLoaded', ()=>{
    // SHOW PASSWORD
    document.getElementById('showpassword').addEventListener('change', (e)=>{
        const password = document.getElementById('password');
        if(e.target.checked){
            password.type='text';
        }else{
            password.type='password';
        }
    });
});