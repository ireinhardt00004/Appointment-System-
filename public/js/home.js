window.addEventListener('DOMContentLoaded', ()=>{
const toastr = document.querySelector('#toastr');
const CloseToastr = document.querySelector('#Closetoastr')
const HideSide = document.querySelector('#headerToggler')
const Sider = document.querySelector('#Sider')
const navName = document.querySelectorAll('#SideContainer')
const Icons = document.querySelectorAll('i')


console.log(Icons)
const toggler = ()=>{
    toastr.classList.toggle("hidden")
    console.log("fire")
   
    
}

const closeToggle = ()=>{
    toastr.classList.remove("hidden")
    console.log("fire")
   
}
const hider =()=>{
    Sider.classList.toggle("w-[5%]")
    console.log("fire")
    for (let index = 0; index < navName.length; index++) {
        navName[index].classList.toggle('hidden')
        
    }
    for (let index = 0; index < Icons.length; index++) {
        Icons[index].classList.toggle('text-2xl')
        
    }
    
}


HideSide.addEventListener('click', hider)
toastr.addEventListener('click', toggler)
CloseToastr.addEventListener('click', closeToggle)
})




