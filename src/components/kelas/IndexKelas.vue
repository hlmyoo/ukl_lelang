<template>
    <div>
        <navbar-component></navbar-component>
        <sidebar-component></sidebar-component>
        <div class="content-wrapper">            
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Kelas</h1>
                        </div>          
                    </div>
                </div>
            </div>
 
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-info card-outline">
                                <div class="card-body">
                                    <router-link class="btn btn-info mb-2" to="/kelas/tambah">
                                        <i class="fas fa-plus"></i> Tambah
                                    </router-link>
                                    
                                           
                                    
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Nama Kelas</th>
                                            <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="k in result" :key="k.id_kelas">
                                                <td>{{ k.id_kelas }}</td>
                                                <td>{{ k.nama_kelas }}</td>
                                               
                                                <td>
                                                    <div class="btn-group">
                                                        <router-link :to="{path: 'kelas/editkelas/'+k.id_kelas}" class="btn btn-warning"> Edit </router-link>
                                                    <button type="button" class="btn btn-danger" @click="remove(k)"> Hapus </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
    import axios from 'axios';
    Vue.use(axios);

export default {
   
        
    data() {
        return{
            result: {}
        }
    },
    created() {
        this.userLoad();
    },
    methods: {
        userLoad(){
            var page = "http://127.0.0.1:8000/api/getkelas";
            axios.get(page).then(
                ({data})=>{
                    console.log(data);
                    this.result = data;
                }
            );
        },
        remove(kelas){
            var url = 'http://127.0.0.1:8000/api/deletekelas/'+ kelas.id_kelas;
            axios.delete(url);
            alert("Sukses delete kelas");
            this.userLoad;
        }
    }
           
            
           
}
    
    </script>