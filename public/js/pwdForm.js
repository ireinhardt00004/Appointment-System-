window.addEventListener('DOMContentLoaded', ()=>{
    const pwd = document.getElementsByName('pwd')
    const pwdType = document.querySelector('#pwdType')
    const cForm = document.querySelectorAll('#cForm')
    const dButton = document.querySelector('#dButton')

    console.log(pwd)
    dButton.addEventListener('click', ()=>{
        for (let index = 0; index < cForm.length; index++) {
            cForm[index].value = null
            console.log(cForm[index])
        }
    })
    
    pwd.addEventListener('change', (e)=>{
        pwd.value = e.target.value
        if(pwd.value == "Yes"){
            
            pwdType.classList.remove('hidden')
        }else if(pwd.value == "No"){
            pwdType.classList.toggle('hidden')
        }
    })

})