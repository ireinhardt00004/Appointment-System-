// import { Carousel } from '/flowbite';

window.addEventListener('DOMContentLoaded', ()=>{



const Hero = document.querySelectorAll("#Effect")
// Hero.forEach(child =>{
//     child.classList.toggle('translate-x-[9999999999px]')
// })
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry=>{
       entry.target.classList.toggle("opacity-100", entry.isIntersecting)
       if(entry.isIntersecting){
        entry.target.classList.toggle("", entry.isIntersecting)
         observer.unobserve(entry.target)
         console.log("walang tingin")
       }
       
    })
}, {threshold: .5})

Hero.forEach(child => {
    observer.observe(child)
})
    const Slider = document.getElementById("data-carousel-item")
    console.log(Slider)
    // Slider.cycle()

    const items = [
{
position: 0,
el: document.getElementById('carousel-item-1')
},
{
position: 1,
el: document.getElementById('carousel-item-2')
},
{
position: 2,
el: document.getElementById('carousel-item-3')
},
{
position: 3,
el: document.getElementById('carousel-item-4')
},
];
const options = {
activeItemPosition: 1,
interval: 3000,
indicators: {
activeClasses: 'bg-white dark:bg-gray-800',
inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
items: [
{
    position: 0,
    el: document.getElementById('carousel-indicator-1')
},
{
    position: 1,
    el: document.getElementById('carousel-indicator-2')
},
{
    position: 2,
    el: document.getElementById('carousel-indicator-3')
},
{
    position: 3,
    el: document.getElementById('carousel-indicator-4')
},
]
},
// callback functions
onNext: () => {
console.log('next slider item is shown');
},
onPrev: ( ) => {
console.log('previous slider item is shown');
},
onChange: ( ) => {
console.log('new slider item has been shown');
}
};

const carousel = new Carousel(items, options);
carousel.cycle()


//pwd form 
const Pwd = document.querySelector('#Pwd')

Pwd.addEventListener('select', (e)=>{
    console.log(e.target.value)
})

})



