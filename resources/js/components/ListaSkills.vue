<template>
    <ul class="flex flex-wrap justify-center">
        <li class="border border-gray-700 px-10 py-3 mb-3 rounded mr-4" v-for="( skill, i ) in this.skills" v-bind:key='i' @click="activar($event)">
           {{ skill }}
        </li>
    </ul>
</template>

<script>
export default {
    props: ['skills'],
    mounted(){
        console.log(this.skills);
    },
    data: function(){
        return {
            habilidades: new Set()
        }
    },
    methods:{
        activar(e){
            console.log('diste click', e.target.textContent);
            if(e.target.classList.contains('bg-teal-400')){
                //el skill esta activo
                e.target.classList.remove('bg-teal-400');

            }else{
                //no esta activo
                e.target.classList.add('bg-teal-400');
                //agregar al set de habilidad
                this.habilidades.add(e.target.textContent);
            }
        }
    }
    
}
</script>