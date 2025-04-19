<script>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import axios from 'axios';

const props = defineProps({
    obras:{
        type: Object
    },
    id_o:{
        type: Number,
        default: 0
    },
    num_o:{
        type: Number,
        default: ""
    },
    nombre_o:{
        type: String,
        default: ""
    },
    clave_o:{
        type: String,
        default: ""
    },
    objeto_o:{
        type: Text,
        default: ""
    },
    direccion_o:{
        type: Text,
        default: ""
    },
    coordenadas_o:{
        type: Text,
        default: ""
    },
    imagenid_o:{
        type: Number,
        default: 0
    },
    incidenteid_o:{
        type: Number,
        default: 0
    },
    imagenes:{
        type: Object
    },
    incidentes:{
        type: Object
    },
    pagina_actual:{
        type: Number,
        default: 1
    },
});

//para ver todas las obras que esten registradas en la base de datos
async function getAll() {
  const api = 'get-all-obras?page=${props.pagina_actual}';
  const response = await axios.get(api);
  props.obras = response.data;
  //Recorremos las imagenes para ver la imagen_id
  for(const i in props.obras.data)
  {
    console.log(props.obras.data[i].imagen_id);
    for(const imagenes of props.imagenes)
    {   //Si los 2 id son iguales obtenemos las imagenes de la obra
        if(imagenes.id == props.obras.data[i].imagen_id)
        {
            props.obras.data[i].imagen = imagenes.imagen;
            props.obras.data[i].imagen = imagenes.autor;
            props.obras.data[i].imagen = imagenes.url;
            break;
        }
    }
    console.log(props.obras.data[i].incidente_id);
    for(const incidentes of props.incidentes)
    {   //para cada incidente_id, veremos que obra le corresponde
        if(incidentes.id == props.obras.data[i].incidente_id)
        {
            props.obras.data[i].incidentes = incidentes.tipo;
            props.obras.data[i].incidentes = incidentes.descripcion;
            props.obras.data[i].incidentes = incidentes.fecha;
            break;
        }
    }
  }
}

//agregamos la ruta para obtener todas las imagenes
async function getAllImagenes() {
    const api = 'get-all-imagenes-arreglo';
    const response = await axios.get(api);
    props.imagenes = response.data;
    console.log(props.imagenes)
    //hago este llamado para que obtenga primero los incidentes
    getAllIncidentes();
}

//agregamos la ruta para obtener todas los incidentes
async function getAllIncidentes() {
    const api = 'get-all-incidentes-arreglo';
    const response = await axios.get(api);
    props.incidentes = response.data;
    console.log(props.incidentes)
    //hacemos el llamado para obtener las obras con su respectivo enlace
    getAll();
}

const moverPagina = (pagina) => {
    console.log(pagina);
    pagina = (pagina == "Next &raquo")?props.pagina_actual + 1:pagina;
    console.log(pagina);

   pagina = (pagina == "&laquo; Previous")?props.pagina_actual - 1:pagina;

   pagina = (pagina <= 0 )?1:pagina;
   props.pagina_actual = pagina;

}

//para agregar una nueva obra

//Hacemos el llamado para obtener primero las imagenes de la base de datos
getAllImagenes();
</script>
<template>
    <AppLayout>
        <Head title="Obras" />
        <template #header>
            <h2 class="titulo">Consultar Obras</h2>
        </template>

    <main>
        <section v-for="(obras, d) in obras.data":key="d">
            <div class="container">
                <article>
                    <p class="">No.</p>
                    <p class="">{{ obras.id }}</p>
                </article>
            </div>
            <span id="boton" class="" @click="nuevo(obras,d)">
                Agregar Obra
            </span>
        </section>
        <section class="mostrar_nuevo">
            <div class="container">

            </div>
        </section>
        <section class="mostrar_edicion">
            <div class="container">

            </div>
        </section>
    </main>

    <footer>
        <div class="pie-pagina">
            <h6>“Photos provided by Pexels”</h6>
        </div>
    </footer>
    </AppLayout>
</template>
