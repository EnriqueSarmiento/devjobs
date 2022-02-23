<template>
<div>
    <ul class="flex flex-wrap justify-center">
        <li class="border border-gray-700 px-10 py-3 mb-3 rounded mr-4"
            :class="verificarClaseActiva(skill)"
         v-for="( skill, i ) in this.skills" v-bind:key="i" @click="activar($event)">{{skill}}</li>
    </ul>

    <input type="hidden" name="skills" id="skills">
</div>
</template>

<script>
export default {
    props: ['skills', 'oldskills'],
    mounted(){
        console.log(this.skills);
    },
    data: function(){
        return {
            habilidades: new Set()
        }
    },
    mounted: function(){
        document.querySelector('#skills').value = this.oldskills;
        console.log(this.oldskills)
    },
    created: function(){
        if(this.oldskills){
            const skillsArray = this.oldskills.split(',');
            skillsArray.forEach(skill => {
                this.habilidades.add(skill);
            });
            console.log(skillsArray);
        }
    },
    methods:{
        activar(e){
            console.log('diste click' + e.target.textContent);
            if(e.target.classList.contains('bg-teal-400')){
                //el skill esta activo
                e.target.classList.remove('bg-teal-400');
                //eliminar del set de habilidad
                this.habilidades.delete(e.target.textContent);
            }else{
                //no esta activo
                e.target.classList.add('bg-teal-400');
                //agregar al set de habilidad
                this.habilidades.add(e.target.textContent);
            }

            //agregar las habilidades al input hidden
            const stringHabilidades = [...this.habilidades]; // este es un string operaros porque no se puede agregar con this.habilidades, se deben convertir
            document.querySelector('#skills').value = stringHabilidades;
        },
        verificarClaseActiva(skill){
            return this.habilidades.has(skill) ? 'bg-teal-400' : '';
        }
    }
    
}
</script>